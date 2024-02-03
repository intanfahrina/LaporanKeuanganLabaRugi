<?php

namespace App\Http\Controllers\Keuangan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inputjurnal;
use App\Models\Kodeakun;

class NeracaController extends Controller
{
    //
    public function index()
    {
        $inputjurnals= DB::table('t_jurnal_umum')->get();
        $kodeakuns= DB::table('m_kode_akun')->get();

        $aset = DB::table('m_kode_akun')
           ->where('kategori', '=', 'Aset')
           ->get();

        $liabilitas= DB::table('m_kode_akun')
           ->where('kategori', '=', 'Liabilitas')
           ->get();

        $ekuitas= DB::table('m_kode_akun')
           ->where('kategori', '=', 'Ekuitas')
           ->get();

        return view('keuangan.neraca.neraca', compact('inputjurnals', 'kodeakuns', 'aset', 'liabilitas', 'ekuitas'));
    }
}
