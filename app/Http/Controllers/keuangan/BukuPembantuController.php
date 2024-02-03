<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inputjurnal;
use App\Models\Kodeakun;
use App\Models\Kodebantu;

class BukuPembantuController extends Controller
{
    //
    public function index(){
        $inputjurnals= DB::table('t_jurnal_umum')->get();
        $kodeakuns= DB::table('m_kode_akun')->get();
        $akunbantus= DB::table('m_kode_bantu')->get();
        $data = DB::table('t_jurnal_umum')
            ->join('m_kode_akun', 'm_kode_akun.kode_akun', '=', 't_jurnal_umum.kode_akun')
            ->join('m_kode_bantu', 'm_kode_bantu.kode_akun_bantu', '=', 't_jurnal_umum.kode_akun_bantu')
            ->join('m_karyawan', 'm_karyawan.id_karyawan', '=', 't_jurnal_umum.id_karyawan1')
            ->get();
        return view('keuangan.buku_pembantu.bukupembantu', compact('inputjurnals', 'kodeakuns', 'data', 'akunbantus'));
    }

    public function listBukuBantu(Request $request, $kode_akun_bantu)
    {
        $data = DB::table('t_jurnal_umum')->where('kode_akun_bantu', $request->kode_akun_bantu)->get();
        return response()->json($data);
    }

    public function bulanBukuBantu(Request $request, $tanggal)
    {
        $data = DB::table('t_jurnal_umum')->whereMonth('tanggal', $request->tanggal)->get();
        return response()->json($data);
    }
}
