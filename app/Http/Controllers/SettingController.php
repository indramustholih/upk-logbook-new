<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

use App\Helpers\Arrays;
use App\Helpers\Integration;
use App\Models\ApiIntegrasi;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Penilaian;
use App\Models\PerangkatDaerah;
use App\Models\RiwayatDiklat;
use stdClass;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        return view('setting.index');
    }

    // opd
    public function storeOPD(Request $request)
    {
        $apiOPD = new ApiIntegrasi();
        $row = [
            'id' => 1,
            'name' => 'OPD',
            'url' => $request['inputUrlOPD'],
            'access_key' => Crypt::encryptString($request['inputAccessKeyOPD']),
            'user_agent' => Crypt::encryptString($request['inputUserAgentOPD']),
        ];
        $apiOPD->upsert($row, ['id']);

        return response()->json([
            'status' => 'success',
            'message' => 'Success, Berhasil Menyimpan Data'
        ],  200);
    }

    public function testOPD(Request $request)
    {
        $getURL = new Integration;
        $opd = ApiIntegrasi::find(1);
        $list = array();
        if ($opd !== null) {
            try {
                $list = array(
                    'url' => $opd->url,
                    'parameter' => "kode_skpd=2.10.01&nip=199302062015031001",
                    'access_key' => Crypt::decryptString($opd->access_key),
                    'user_agent' => Crypt::decryptString($opd->user_agent),
                );
            } catch (DecryptException $e) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Warning, Gagal mengambil data'
                ],  404);
            }
        } elseif ($request !== null) {
            $list = array(
                'url' => $request['inputUrlOPD'],
                'parameter' => "kode_skpd=2.10.01&nip=199302062015031001",
                'access_key' => $request['inputAccessKeyOPD'],
                'user_agent' => $request['inputUserAgentOPD'],
            );
        } else {
            return response()->json([
                'status' => 'warning',
                'message' => 'Warning, Harap isi inputan form Perangkat Daerah atau simpan data.'
            ],  404);
        }

        try {
            $url = $getURL->getIntegrating(
                $list['url'],
                $list['parameter'],
                $list['user_agent'],
                $list['access_key']
            );
            // return $url;
            if ($url['response']['code'] == 200 && $url['response']['status'] == 1) {
                $data = $url['response']['data'];
                if ($data['statusCode'] == 200) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Success, Berhasil Terhubung'
                    ],  200);
                } elseif ($url['response']['http_code']  == 404) {
                    return response()->json([
                        'status' => 'warning',
                        'message' => 'Warning, Parameter salah'
                    ],  404);
                }
            } elseif ($url['response']['code'] == 10003) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Warning, Accesskey atau User-agent salah'
                ],  404);
            } elseif ($url['response']['code'] == 10006) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Warning, Seluruh parameter operasi API wajib diisi'
                ],  404);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error, Tidak bisa tehubung dengan perangkat daerah.'
            ],  400);
        }
    }

    public function syncOPD()
    {
        $getURL = new Integration;
        $arrays = new Arrays;
        $jabatan = new Jabatan;
        $pegawai = new Pegawai;

        $pegawais = $pegawai->get();


        $api = ApiIntegrasi::find(1);
        $opd = PerangkatDaerah::select('kode_opd')->get();

        $listAPi = array();
        $listJabatan = array();
        $listPegawai = array();

        if ($opd) {
            try {
                foreach ($opd as $list) {
                    $listAPi = array(
                        'url' => $api->url,
                        'parameter' => "kode_skpd=" . $list->kode_opd . "&nip=all",
                        'access_key' => Crypt::decryptString($api->access_key),
                        'user_agent' => Crypt::decryptString($api->user_agent),
                    );
                    try {
                        $url = $getURL->getIntegrating(
                            $listAPi['url'],
                            $listAPi['parameter'],
                            $listAPi['user_agent'],
                            $listAPi['access_key']
                        );
                        if ($url['response']['code'] == 200 && $url['response']['status'] == 1) {
                            $data = $url['response']['data'];
                            if ($data['statusCode'] == 200) {
                                foreach ($data['data'] as $dataList) {
                                    if ($dataList['kode_jabatan']) {
                                        // jabatan
                                        $rowJabatan = array(
                                            "kode_jabatan" => $dataList['kode_jabatan'],
                                            "nama_jabatan" => $dataList['nama_jabatan']
                                        );
                                        array_push($listJabatan, $rowJabatan);

                                        if (count($pegawais) > 0) {
                                            // return 'ada';
                                            // pegawai
                                            $checkPegawai = $pegawai->whereRaw(
                                                " nip = '" . $dataList['nip'] . "' AND " .
                                                    "( kode_opd != '" . $dataList['kode_skpd'] . "' OR " .
                                                    " kode_jabatan != '" . $dataList['kode_jabatan'] . "')"
                                            )->get();

                                            if (count($checkPegawai) > 0) {
                                                foreach ($checkPegawai as $key => $value) {
                                                    // return $value;
                                                    $pegawai->whereRaw("id = " . $value['id'] . "")
                                                        ->update(['status' => 'archive']);
                                                    $rowPegawai = array(
                                                        "nip" => $dataList['nip'],
                                                        "nama" => $dataList['nama'],
                                                        "kode_opd" => $dataList['kode_skpd'],
                                                        "kode_jabatan" => $dataList['kode_jabatan'],
                                                        "status" => 'aktif'
                                                    );
                                                    array_push($listPegawai, $rowPegawai);
                                                }
                                            } else {
                                                continue;
                                            }
                                        } else {
                                            // return 'tidak';
                                            // pegawai
                                            $rowPegawai = array(
                                                "nip" => $dataList['nip'],
                                                "nama" => $dataList['nama'],
                                                "kode_opd" => $dataList['kode_skpd'],
                                                "kode_jabatan" => $dataList['kode_jabatan'],
                                                "status" => 'aktif'
                                            );
                                            array_push($listPegawai, $rowPegawai);
                                        }
                                    }
                                }
                            } elseif ($url['response']['http_code']  == 404) {
                                continue;
                            }
                        } elseif ($url['response']['code'] == 10003) {
                            return response()->json([
                                'status' => 'warning',
                                'message' => 'Warning, Accesskey atau User-agent salah'
                            ],  404);
                        }
                    } catch (\Throwable $th) {
                        return response()->json([
                            'status' => 'error',
                            'message' => 'Error, Tidak bisa tehubung dengan perangkat daerah.'
                        ],  400);
                    }
                }

                $uniqueJabatan = $arrays->unique($listJabatan, 'kode_jabatan');
                $chunksJabatan = array_chunk($uniqueJabatan, 500);
                foreach ($chunksJabatan as $chunk) {
                    $jabatan->upsert($chunk, ['kode_jabatan']);
                }

                // return $listPegawai;
                // $uniquePegawai = $arrays->unique($listPegawai, 'nip');
                $chunksPegawai = array_chunk($listPegawai, 500);
                foreach ($chunksPegawai as $chunk) {
                    $pegawai->upsert($chunk, ['']);
                }

                return response()->json([
                    'status' => 'success',
                    'message' => 'Success, Berhasil Menyimpan Data'
                ],  200);
            } catch (DecryptException $e) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Warning, Gagal mengambil data'
                ],  404);
            }
        } else {
            return response()->json([
                'status' => 'warning',
                'message' => 'Warning, Harap isi inputan form Perangkat Daerah atau simpan data.'
            ],  404);
        }
    }

    public function showOPD()
    {
        $api = ApiIntegrasi::select(
            'url AS URL_OPD',
            'access_key AS Access_Key_OPD',
            'user_agent AS User_Agent_OPD'
        )->find(1);
        return response()->json($api);
    }

    // riwayat teknis
    public function storeRiwayatTeknis(Request $request)
    {
        $apiOPD = new ApiIntegrasi();
        $row = [
            'id' => 2,
            'name' => 'Riwayat Teknis',
            'url' => $request['inputUrlRiwayatTeknis'],
            'access_key' => Crypt::encryptString($request['inputAccessKeyRiwayatTeknis']),
            'user_agent' => Crypt::encryptString($request['inputUserAgentRiwayatTeknis']),
        ];
        $apiOPD->upsert($row, ['id']);

        return response()->json([
            'status' => 'success',
            'message' => 'Success, Berhasil Menyimpan Data'
        ],  200);
    }

    public function testRiwayatTeknis(Request $request)
    {
        $getURL = new Integration;
        $opd = ApiIntegrasi::find(2);
        $list = array();
        if ($opd !== null) {
            try {
                $list = array(
                    'url' => $opd->url,
                    'parameter' => "nip=199302062015031001&kode_skpd=2.10.01",
                    'access_key' => Crypt::decryptString($opd->access_key),
                    'user_agent' => Crypt::decryptString($opd->user_agent),
                );
            } catch (DecryptException $e) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Warning, Gagal mengambil data'
                ],  404);
            }
        } elseif ($request !== null) {
            $list = array(
                'url' => $request['inputUrlOPDTeknis'],
                'parameter' => "nip=199302062015031001&kode_skpd=2.10.01",
                'access_key' => $request['inputAccessKeyRiwayatTeknis'],
                'user_agent' => $request['inputUserAgentRiwayatTeknis'],
            );
        } else {
            return response()->json([
                'status' => 'warning',
                'message' => 'Warning, Harap isi inputan form API Riwayat Diklat SIMPEG.'
            ],  404);
        }

        try {
            $url = $getURL->getIntegrating(
                $list['url'],
                $list['parameter'],
                $list['user_agent'],
                $list['access_key']
            );
            // return $url;
            if ($url['response']['code'] == 200 && $url['response']['status'] == 1) {
                $data = $url['response']['data'];
                if ($data['statusCode'] == 200) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Success, Berhasil Terhubung'
                    ],  200);
                } elseif ($url['response']['http_code']  == 404) {
                    return response()->json([
                        'status' => 'warning',
                        'message' => 'Warning, Parameter salah'
                    ],  404);
                }
            } elseif ($url['response']['code'] == 10003) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Warning, Accesskey atau User-agent salah'
                ],  404);
            } elseif ($url['response']['code'] == 10006) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Warning, Seluruh parameter operasi API wajib diisi'
                ],  404);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error, Tidak bisa tehubung dengan perangkat daerah.'
            ],  400);
        }
    }

    public function syncRiwayatTeknis(Request $request)
    {
        $getURL = new Integration;
        $arrays = new Arrays;
        $riwayat = new RiwayatDiklat;

        $api = ApiIntegrasi::find(2);
        $opd = PerangkatDaerah::select('kode_opd')->get();
        $listAPi = array();
        $listRiwayat = array();

        if ($opd) {
            try {
                foreach ($opd as $list) {
                    $listAPi = array(
                        'url' => $api->url,
                        'parameter' => "nip=all&kode_skpd=" . $list->kode_opd,
                        'access_key' => Crypt::decryptString($api->access_key),
                        'user_agent' => Crypt::decryptString($api->user_agent),
                    );
                    try {
                        $url = $getURL->getIntegrating(
                            $listAPi['url'],
                            $listAPi['parameter'],
                            $listAPi['user_agent'],
                            $listAPi['access_key']
                        );
                        if ($url['response']['code'] == 200 && $url['response']['status'] == 1) {
                            $data = $url['response']['data'];
                            if ($data['statusCode'] == 200) {
                                foreach ($data['data'] as $dataList) {
                                    if ($dataList['kode_jabatan']) {
                                        $rowRiwayat = array(
                                            "id" => $dataList['diklat_id'],
                                            "kode_opd" => $dataList['kode_skpd'],
                                            "kode_jabatan" => $dataList['kode_jabatan'],
                                            "nip" => $dataList['nip'],
                                            "nama" => $dataList['nama'],
                                            "nama_diklat" => $dataList['diklat_nama'],
                                            "mulai" => $dataList['diklat_mulai'],
                                            "selesai" => $dataList['diklat_selesai'],
                                            "penyelenggara" => $dataList['diklat_penyelenggara'],
                                            "tempat" => $dataList['diklat_tempat'],
                                            "jumlah_jam" => $dataList['diklat_jumlah_jam'],
                                            "sttp_no" => $dataList['diklat_sttp_no'],
                                            "sttp_tgl" => $dataList['diklat_sttp_tgl'],
                                            "sttp_pej" => $dataList['diklat_sttp_pej'],
                                        );
                                        array_push($listRiwayat, $rowRiwayat);
                                    }
                                }
                            } elseif ($url['response']['http_code']  == 404) {
                                continue;
                            }
                        } elseif ($url['response']['code'] == 10003) {
                            return response()->json([
                                'status' => 'warning',
                                'message' => 'Warning, Accesskey atau User-agent salah'
                            ],  404);
                        }
                    } catch (\Throwable $th) {
                        return response()->json([
                            'status' => 'error',
                            'message' => 'Error, Tidak bisa tehubung dengan perangkat daerah.'
                        ],  400);
                    }
                }

                $uniquePegawai = $arrays->unique($listRiwayat, 'id');
                $chunksPegawai = array_chunk($uniquePegawai, 500);
                foreach ($chunksPegawai as $chunk) {
                    $riwayat->upsert($chunk, ['id']);
                }

                return response()->json([
                    'status' => 'success',
                    'message' => 'Success, Berhasil Menyimpan Data'
                ],  200);
            } catch (DecryptException $e) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Warning, Gagal mengambil data'
                ],  404);
            }
        } else {
            return response()->json([
                'status' => 'warning',
                'message' => 'Warning, Harap synchronize form API Perangkat Daerah SIMPEG.'
            ],  404);
        }
    }

    public function showRiwayatTeknis()
    {
        $api = ApiIntegrasi::select(
            'url AS URL_OPD',
            'access_key AS Access_Key_OPD',
            'user_agent AS User_Agent_OPD'
        )->find(2);
        return response()->json($api);
    }

    // riwayat manajerial
    public function storeRiwayatManajerial(Request $request)
    {
        $apiOPD = new ApiIntegrasi();
        $row = [
            'id' => 4,
            'name' => 'Riwayat Manajerial',
            'url' => $request['inputUrlRiwayatManajerial'],
            'access_key' => Crypt::encryptString($request['inputAccessKeyRiwayatManajerial']),
            'user_agent' => Crypt::encryptString($request['inputUserAgentRiwayatManajerial']),
        ];
        $apiOPD->upsert($row, ['id']);

        return response()->json([
            'status' => 'success',
            'message' => 'Success, Berhasil Menyimpan Data'
        ],  200);
    }

    public function testRiwayatManajerial(Request $request)
    {
        $getURL = new Integration;
        $opd = ApiIntegrasi::find(4);
        $list = array();
        if ($opd !== null) {
            try {
                $list = array(
                    'url' => $opd->url,
                    'parameter' => "nip=197112141995032001&kode_skpd=2.10.01",
                    'access_key' => Crypt::decryptString($opd->access_key),
                    'user_agent' => Crypt::decryptString($opd->user_agent),
                );
            } catch (DecryptException $e) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Warning, Gagal mengambil data'
                ],  404);
            }
        } elseif ($request !== null) {
            $list = array(
                'url' => $request['inputUrlOPD'],
                'parameter' => "nip=199302062015031001&kode_skpd=2.10.01",
                'access_key' => $request['inputAccessKeyRiwayatManajerial'],
                'user_agent' => $request['inputUserAgentRiwayatManajerial'],
            );
        } else {
            return response()->json([
                'status' => 'warning',
                'message' => 'Warning, Harap isi inputan form API Riwayat Diklat SIMPEG.'
            ],  404);
        }

        try {
            $url = $getURL->getIntegrating(
                $list['url'],
                $list['parameter'],
                $list['user_agent'],
                $list['access_key']
            );
            // return $url;
            if ($url['response']['code'] == 200 && $url['response']['status'] == 1) {
                $data = $url['response']['data'];
                if ($data['statusCode'] == 200) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Success, Berhasil Terhubung'
                    ],  200);
                } elseif ($url['response']['http_code']  == 404) {
                    return response()->json([
                        'status' => 'warning',
                        'message' => 'Warning, Parameter salah'
                    ],  404);
                }
            } elseif ($url['response']['code'] == 10003) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Warning, Accesskey atau User-agent salah'
                ],  404);
            } elseif ($url['response']['code'] == 10006) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Warning, Seluruh parameter operasi API wajib diisi'
                ],  404);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error, Tidak bisa tehubung dengan perangkat daerah.'
            ],  400);
        }
    }

    public function syncRiwayatManajerial(Request $request)
    {
        $getURL = new Integration;
        $arrays = new Arrays;
        $riwayat = new RiwayatDiklat;

        $api = ApiIntegrasi::find(2);
        $opd = PerangkatDaerah::select('kode_opd')->get();
        $listAPi = array();
        $listRiwayat = array();

        if ($opd) {
            try {
                foreach ($opd as $list) {
                    $listAPi = array(
                        'url' => $api->url,
                        'parameter' => "nip=all&kode_skpd=" . $list->kode_opd,
                        'access_key' => Crypt::decryptString($api->access_key),
                        'user_agent' => Crypt::decryptString($api->user_agent),
                    );
                    try {
                        $url = $getURL->getIntegrating(
                            $listAPi['url'],
                            $listAPi['parameter'],
                            $listAPi['user_agent'],
                            $listAPi['access_key']
                        );
                        if ($url['response']['code'] == 200 && $url['response']['status'] == 1) {
                            $data = $url['response']['data'];
                            if ($data['statusCode'] == 200) {
                                foreach ($data['data'] as $dataList) {
                                    if ($dataList['kode_jabatan']) {
                                        $rowRiwayat = array(
                                            "id" => $dataList['diklat_id'],
                                            "kode_opd" => $dataList['kode_skpd'],
                                            "kode_jabatan" => $dataList['kode_jabatan'],
                                            "nip" => $dataList['nip'],
                                            "nama" => $dataList['nama'],
                                            "nama_diklat" => $dataList['diklat_nama'],
                                            "mulai" => $dataList['diklat_mulai'],
                                            "selesai" => $dataList['diklat_selesai'],
                                            "penyelenggara" => $dataList['diklat_penyelenggara'],
                                            "tempat" => $dataList['diklat_tempat'],
                                            "jumlah_jam" => $dataList['diklat_jumlah_jam'],
                                            "sttp_no" => $dataList['diklat_sttp_no'],
                                            "sttp_tgl" => $dataList['diklat_sttp_tgl'],
                                            "sttp_pej" => $dataList['diklat_sttp_pej'],
                                        );
                                        array_push($listRiwayat, $rowRiwayat);
                                    }
                                }
                            } elseif ($url['response']['http_code']  == 404) {
                                continue;
                            }
                        } elseif ($url['response']['code'] == 10003) {
                            return response()->json([
                                'status' => 'warning',
                                'message' => 'Warning, Accesskey atau User-agent salah'
                            ],  404);
                        }
                    } catch (\Throwable $th) {
                        return response()->json([
                            'status' => 'error',
                            'message' => 'Error, Tidak bisa tehubung dengan perangkat daerah.'
                        ],  400);
                    }
                }

                $uniquePegawai = $arrays->unique($listRiwayat, 'id');
                $chunksPegawai = array_chunk($uniquePegawai, 500);
                foreach ($chunksPegawai as $chunk) {
                    $riwayat->upsert($chunk, ['id']);
                }

                return response()->json([
                    'status' => 'success',
                    'message' => 'Success, Berhasil Menyimpan Data'
                ],  200);
            } catch (DecryptException $e) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Warning, Gagal mengambil data'
                ],  404);
            }
        } else {
            return response()->json([
                'status' => 'warning',
                'message' => 'Warning, Harap synchronize form API Perangkat Daerah SIMPEG.'
            ],  404);
        }
    }

    public function showRiwayatManajerial()
    {
        $api = ApiIntegrasi::select(
            'url AS URL_OPD',
            'access_key AS Access_Key_OPD',
            'user_agent AS User_Agent_OPD'
        )->find(4);
        return response()->json($api);
    }

    // penilaian
    public function storePenilaian(Request $request)
    {
        $apiPenilaian = new ApiIntegrasi();
        $row = [
            'id' => 3,
            'name' => 'Penilaian',
            // 'url' => $request['inputUrlPenilaian1'] . "|" .$request['inputUrlTahun'] . "|" . $request['inputUrlPenilaian2'],
            'url' => $request['inputUrlPenilaian1'],
            'user_agent' => "",
            'access_key' => ""
        ];
        $apiPenilaian->upsert($row, ['id']);

        return response()->json([
            'status' => 'success',
            'message' => 'Success, Berhasil Menyimpan Data'
        ],  200);
    }

    public function testPenilaian(Request $request)
    {
        $getURL = new Integration;
        $api = ApiIntegrasi::find(3);
        $list = array();
        if ($api !== null) {
            try {
                // $explode = explode("|tahun|",$api->url);

                $list = array(
                    // 'url' => $explode[0]."2020".$explode[1],
                    'url' => $api->url,
                    'parameter' => "kode_skpd=2.10.01&nip=199302062015031001",
                    'user_agent' => "",
                    'access_key' => ""
                );
            } catch (DecryptException $e) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Warning, Gagal mengambil data'
                ],  404);
            }
        } elseif ($request !== null) {
            $list = array(
                // 'url' => $request['inputUrlPenilaian1'] . "2020" . $request['inputUrlPenilaian2'],
                'url' => $request['inputUrlPenilaian1'],
                'parameter' => "nip=199302062015031001&kode_skpd=2.10.01",
                'user_agent' => "",
                'access_key' => ""
            );
        } else {
            return response()->json([
                'status' => 'warning',
                'message' => 'Warning, Harap isi inputan form API Penilaian SKP.'
            ],  404);
        }

        // try {
        $url = $getURL->postIntegrating(
            $list['url'],
            $list['parameter'],
            $list['user_agent'],
            $list['access_key']
        );
        if ($url['status_code'] == 200) {
            return response()->json([
                'status' => 'success',
                'message' => 'Success, Berhasil Terhubung.'
            ],  200);
        } elseif ($url['status_code'] == 400) {
            return response()->json([
                'status' => 'warning',
                'message' => 'Warning, Bad Request'
            ],  404);
        }
        // } catch (\Throwable $th) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Error, Tidak bisa tehubung dengan API Penilaian SKP.'
        //     ],  400);
        // }
    }

    public function syncPenilaian()
    {
        // 197508222009011003
        $getURL = new Integration;
        $api = ApiIntegrasi::find(3);
        $penilaian = new Penilaian;
        $opd = PerangkatDaerah::select('kode_opd')
            ->where('kode_opd', '!=', '1.01.01') // 1.01.01 = Dinas Pendidikan
            ->where('kode_opd', '!=', '1.02.01') // 1.02.01 = Dinas Kesehatan
            ->where('kode_opd', '!=', '1.03.01') // 1.03.01 = Dinas Pekerjaan Umum
            ->where('kode_opd', '!=', '1.03.02') // 1.03.02 = Dinas Cipta Karya, Bina Konstruksi dan Tata Ruang
            ->where('kode_opd', '!=', '1.05.01') // 1.05.01 = Satuan Polisi Pamong Praja
            ->where('kode_opd', '!=', '2.09.01') // 2.09.01 = Dinas Perhubungan
            ->where('kode_opd', '!=', '4.02.03') // 4.02.03 = Badan Pendapatan Daerah
            ->where('kode_opd', '!=', '4.05.02') // 4.05.02 = Sekretariat Daerah
            ->where('kode_opd', '!=', '1.04.01') // 1.04.01 = Dinas Perumahan dan Kawasan Permukiman
            ->get();
        $listAPi = array();
        $dataResponse = array();


        if (!$api) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error, Harap isi dan simpan form API Penilaian SKP.'
            ],  400);
        }
        // if ($opd) {
        // try {
        foreach ($opd as $list) {
            // $explode = explode("|tahun|", $api->url);
            error_log($list->kode_opd);

            $listAPi = array(
                // 'url' => $explode[0] . $tahun . $explode[1],
                'url' => $api->url,
                'parameter' => "kode_skpd=" . $list->kode_opd,
                'user_agent' => $api->access_key,
                "access_key" => $api->user_agent
            );
            // try {
            $url = $getURL->postIntegrating(
                $listAPi['url'],
                $listAPi['parameter'],
                $listAPi['user_agent'],
                $listAPi['access_key']
            );

            if ($url == "failed") {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Error, Server failed.' . $list->kode_opd
                ],  400);
            }

            if ($url['status_code'] == 200) {
                $data = $url['data'];
                if ($data) {
                    foreach ($data as $dataList) {
                        $periode = str_replace("Periode ", "", $dataList["periode"]);
                        $row = array(
                            "tahun" => $url['tahun'],
                            "id" => $dataList["nip"] . '-' . $url['tahun'] . '-' . $periode,
                            "nip" => $dataList["nip"],
                            "nama" => $dataList["nama"],
                            "jabatan" => $dataList["jabatan"]["jabatan"],
                            "eselon" => $dataList["jabatan"]["eselon"],
                            "eselon_kd" => $dataList["jabatan"]["eselon_kd"],
                            "jenis_jabatan" => $dataList["jabatan"]["jenis_jabatan"],
                            "kelas_jabatan" => $dataList["jabatan"]["kelas_jabatan"],
                            "nilai_jabatan" => $dataList["jabatan"]["nilai_jabatan"],
                            "kode_jabatan" => $dataList["jabatan"]["kode_jabatan"],
                            "kode_opd" => $dataList["jabatan"]["kode_lokasi"],
                            "periode" => $dataList["periode"],
                            "nilai_skp" => $dataList["nilai_skp"],
                            "nilai_perilaku" => $dataList["nilai_perilaku"],
                            "nilai_total" => $dataList["nilai_total"]
                        );
                        array_push($dataResponse, $row);
                    }
                }
            } elseif ($url['status_code'] == 400) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Warning, Bad Request'
                ],  404);
            }
            // } catch (\Throwable $th) {
            //     return response()->json([
            //         'status' => 'error',
            //         'message' => 'Error, Tidak bisa tehubung dengan API Penilaian SKP.'
            //     ],  400);
            // }
        }

        $chunksPegawai = array_chunk($dataResponse, 500);
        foreach ($chunksPegawai as $chunk) {
            $penilaian->upsert($chunk, ['id']);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Success, Berhasil Menampilkan Data',
            'data' => $dataResponse
        ],  200);

        // } catch (DecryptException $e) {
        //     return response()->json([
        //         'status' => 'warning',
        //         'message' => 'Warning, Gagal mengambil data'
        //     ],  404);
        // }
        // } else {
        //     return response()->json([
        //         'status' => 'warning',
        //         'message' => 'Warning, Harap synchronize form API Perangkat Daerah SIMPEG.'
        //     ],  404);
        // }
    }

    public function showPenilaian()
    {
        $api = ApiIntegrasi::select(
            'url AS URL_OPD',
            'access_key AS Access_Key_OPD',
            'user_agent AS User_Agent_OPD'
        )->find(3);
        // $explode = explode("|tahun|",$api->URL_OPD);
        $res = new stdClass;
        // $res->URL_OPD1 = $explode[0];
        // $res->URL_OPD2 = $explode[1];
        $res->URL_OPD1 = $api->URL_OPD;
        $res->access_key = $api->Access_Key_OPD;
        $res->User_Agent_OPD = $api->User_Agent_OPD;
        return response()->json($res);
    }
}
