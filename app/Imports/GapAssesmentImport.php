<?php

namespace App\Imports;

use App\Models\GapAssesment;
use App\Models\GapAssesmentPotensi;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class FirstSheetImport implements ToCollection, WithStartRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $r_jpm = str_replace("%", "", $row[15] *100 );
            $r_jpm_proyeksi = str_replace("%", "", $row[16] * 100);

            GapAssesment::create([
                'nip' => isset($row[0]) ? $row[0] : '',
                'nama' => isset($row[1]) ? $row[1] : '',
                'jabatan' => isset($row[2]) ? $row[2] : '',
                'perangkat_daerah' => isset($row[3]) ? $row[3] : '',
                'integritas' => isset($row[4]) ? (float) $row[4] : '0',
                'kerjasama' => isset($row[5]) ? (float) $row[5] : '0',
                'komunikasi' => isset($row[6]) ? (float) $row[6] : '0',
                'orientasi' => isset($row[7]) ? (float) $row[7] : '0',
                'pelayanan_publik' => isset($row[8]) ? (float) $row[8] : '0',
                'pengembangan_diri' => isset($row[9]) ? (float) $row[9] : '0',
                'mengelola_perubahan' => isset($row[10]) ? (float) $row[10] : '0',
                'pengambilan_keputusan' => isset($row[11]) ? (float) $row[11] : '0',
                'perekat_bangsa' => isset($row[12]) ? (float) $row[12] : '0',
                'total' => isset($row[13]) ? (float) $row[13] : '0',
                'kategori' => isset($row[14]) ? $row[14] : '',
                'jpm' => isset($r_jpm) ? $r_jpm : '0',
                'jpm_proyeksi' =>  isset($r_jpm_proyeksi) ? $r_jpm_proyeksi : '0',
                'saran_pengembangan1' => isset($row[17]) ? $row[17] : '',
                'saran_pengembangan2' => isset($row[18]) ? $row[18] : '',
                'saran_pengembangan3' => isset($row[19]) ? $row[19] : '',
                'saran_pengembangan4' => isset($row[20]) ? $row[20] : '',
                'saran_pengembangan5' => isset($row[21]) ? $row[21] : '',
                'saran_pengembangan6' => isset($row[22]) ? $row[22] : '',
                'saran_pengembangan7' => isset($row[23]) ? $row[23] : '',
                'saran_pengembangan8' => isset($row[24]) ? $row[24] : '',
                'saran_pengembangan9' => isset($row[25]) ? $row[25] : '',
                'saran_pengembangan10' => isset($row[26]) ? $row[26] : '',
                'kekuatan_1' => isset($row[27]) ? $row[27] : '',
                'kekuatan_2' => isset($row[28]) ? $row[28] : '',
                'kekuatan_3' => isset($row[29]) ? $row[29] : '',
                'kekuatan_4' => isset($row[30]) ? $row[30] : '',
                'kekuatan_5' => isset($row[31]) ? $row[31] : '',
                'kekuatan_6' => isset($row[32]) ? $row[32] : '',
                'kekuatan_7' => isset($row[33]) ? $row[33] : '',
                'kekuatan_8' => isset($row[34]) ? $row[34] : '',
                'kekuatan_9' => isset($row[35]) ? $row[35] : '',
                'kekuatan_10' => isset($row[36]) ? $row[36] : '',
                'saran_penempatan_1' => isset($row[37]) ? $row[37] : '',
                'saran_penempatan_2' => isset($row[38]) ? $row[38] : '',
                'saran_penempatan_3' => isset($row[39]) ? $row[39] : '',
                'area_pengembangan_1' => isset($row[40]) ? $row[40] : '',
                'area_pengembangan_2' => isset($row[41]) ? $row[41] : '',
                'area_pengembangan_3' => isset($row[42]) ? $row[42] : '',
                'area_pengembangan_4' => isset($row[43]) ? $row[43] : '',
                'area_pengembangan_5' => isset($row[44]) ? $row[44] : '',
                'area_pengembangan_6' => isset($row[45]) ? $row[45] : '',
                'area_pengembangan_7' => isset($row[46]) ? $row[46] : '',
                // 'tanggal_assesment'  => isset($row[26]) ? $row[26] : null
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}


class SecondSheetImport implements ToCollection, WithStartRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            GapAssesmentPotensi::create([
                'nip'                => isset($row[0]) ? $row[0] : '',
                'nama'               => isset($row[1]) ? $row[1] : '',
                'jabatan'            => isset($row[2]) ? $row[2] : '',
                'perangkat_daerah'   => isset($row[3]) ? $row[3] : '',
                'kemampuan_berpikir_kritis'     => isset($row[4]) ? $row[4] : '',
                'kemampuan_berpikir_konseptual' => isset($row[5]) ? $row[5] : '',
                'kemampuan_berpikir_analitis'   => isset($row[6]) ? $row[6] : '',
                'sistematika'       => isset($row[7]) ? $row[7] : '',
                'ketelitian'        => isset($row[8]) ? $row[8] : '',
                'pengambilan_keputusan' => isset($row[9]) ? $row[9] : '',
                'motivasi'          => isset($row[10]) ? $row[10] : '',
                'kepatuhan_aturan'  => isset($row[11]) ? $row[11] : '',
                'komitmen'          => isset($row[12]) ? $row[12] : '',
                'daya_tahan_kerja'  => isset($row[13]) ? $row[13] : '',
                'asertiv'           => isset($row[14]) ? $row[14] : '',
                'adaptasi'          => isset($row[15]) ? $row[15] : '',
                'kemampuan_mengarahkan' => isset($row[16]) ? $row[16] : '',
                'relasi_sosial'         => isset($row[17]) ? $row[17] : '',
                'kemampuan_kerjasama'   => isset($row[18]) ? $row[18] : '',
                'deskripsi_potensi'     => isset($row[19]) ? $row[19] : '',
                // 'tanggal_assesment'     => isset($row[20]) ? $row[20] : null
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}

class GapAssesmentImport implements WithMultipleSheets
{
    use WithConditionalSheets;

    public function conditionalSheets(): array
    {
        return [
            'Kompetensi' => new FirstSheetImport(),
            'Potensi' => new SecondSheetImport()
        ];
    }
}
