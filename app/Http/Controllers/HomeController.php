<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JabatanKerja;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $setting = Setting::find(1);
        // $awal    = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('y')));
        // $akhir   = date('Y-m-d');
        // $tanggal = $awal;
        // $data_tanggal = array();
        // $data_pendapatan = array();

        // while(strtotime($tanggal) <= strtotime($akhir)){
        //     $data_tanggal[] = (int)substr($tanggal, 8, 2);
        //     $pendapatan = Penjualan::where('created_at', 'LIKE', "$tanggal%")
        //         ->sum('bayar');
        //     $data_pendapatan[] =(int) $pendapatan;
        //     $tanggal = date('Y-m-d', strtotime("+1 day", strtotime($tanggal)));
        // }
        $id_jabatan = Auth::user()->id_jabatan;
        $jabatan = JabatanKerja::where('id','=',$id_jabatan)->first();
        
        $user = User::count();
        // $produk = Produk::count();
        // $supplier = Supplier::count();
        // $member = Member::count();

        if (Auth::user()->level == 1) return view('home.admin', compact('user', 'jabatan'));
        if (Auth::user()->level == 2) return view('home.user', compact('user', 'jabatan'));

    }
}
