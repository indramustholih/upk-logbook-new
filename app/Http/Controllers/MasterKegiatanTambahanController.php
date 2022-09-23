<?php

namespace App\Http\Controllers;

use DB;
use App\Models\MasterKegiatanTambahan;
use App\Models\KegiatanJabatanTambahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterKegiatanTambahanController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    public function index()
    {
        //
    }

    public function listData()
    {

        $id_user = Auth::user()->id;
        $tahun = date('Y');
        
        $master_kegiatan = DB::table('master_kegiatan_tambahans')
        ->select('master_kegiatan_tambahans.*', 'b.jumlah')
        ->leftJoin(DB::raw('
        (SELECT
            sum(jumlah) as jumlah, id_master_kegiatan_tambahan, id_user
        FROM
            log_kegiatan_tambahans a
            where year(tanggal_kegiatan)='.$tahun.' and id_user='.$id_user.'
        group by id_master_kegiatan_tambahan, id_user) b
        '), 
        function($join)
        {
           $join->on('master_kegiatan_tambahans.id_master_kegiatan_tambahan', '=', 'b.id_master_kegiatan_tambahan');
        })
        ->where([
            ['master_kegiatan_tambahans.tahun', '=', $tahun],
            ['master_kegiatan_tambahans.id_user', '=', $id_user]
            ])
        ->orderBy('master_kegiatan_tambahans.nama_kegiatan', 'ASC')
        ->get();

        $no = 0;
        $data = array();
        foreach ($master_kegiatan as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->tahun;
            $row[] = $list->nama_kegiatan;
            $row[] = ($list->jumlah == '') ? 0 : $list->jumlah;
            $row[] = $list->output;
            $row[] = $list->satuan;
            $row[] = '<div class = "btn-group">
                <a onclick = "editForm(' . $list->id_master_kegiatan_tambahan . ')" class = "btn btn-primary btn-sm" >
                    <i class = "fa fa-pencil"></i>
                </a>
                <a onclick = "deleteData(' . $list->id_master_kegiatan_tambahan . ')" class = "btn btn-danger btn-sm" >
                    <i class = "fa fa-trash"></i>
                </a>
            </div>';
            $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $master_kegiatan_tambahan = new MasterKegiatanTambahan();
        $master_kegiatan_tambahan->id_user = $request['id_user_tambahan'];
        $master_kegiatan_tambahan->tahun = $request['tahun_tambahan'];
        $master_kegiatan_tambahan->id_kegiatan_jabatan_tambahan = $request['id_kegiatan_jabatan_tambahan'];
        $master_kegiatan_tambahan->nama_kegiatan = $request['nama_kegiatan_tambahan'];
        $master_kegiatan_tambahan->angka_kredit = $request['angka_kredit_tambahan'];
        $master_kegiatan_tambahan->output = $request['output_tambahan'];
        $master_kegiatan_tambahan->satuan = $request['satuan_tambahan'];
        $master_kegiatan_tambahan->mutu = $request['mutu_tambahan'];
        $master_kegiatan_tambahan->waktu = $request['waktu_tambahan'];
        $master_kegiatan_tambahan->biaya = $request['biaya_tambahan'];
        $master_kegiatan_tambahan->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
