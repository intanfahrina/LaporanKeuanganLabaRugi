<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inputjurnal;
use App\Models\Kodeakun;

class BukuBesarController extends Controller
{
    //
    public function index(Request $request)
    {
        $inputjurnals= DB::table('t_jurnal_umum')->get();
        $kodeakuns= DB::table('m_kode_akun')->get();
        $data = DB::table('t_jurnal_umum')
            ->join('m_kode_akun', 'm_kode_akun.kode_akun', '=', 't_jurnal_umum.kode_akun')
            ->join('m_kode_bantu', 'm_kode_bantu.kode_akun_bantu', '=', 't_jurnal_umum.kode_akun_bantu')
            ->join('m_karyawan', 'm_karyawan.id_karyawan', '=', 't_jurnal_umum.id_karyawan1')
            ->get();

        return view('keuangan.buku_besar.bukubesar', compact('inputjurnals', 'kodeakuns', 'data'));
    }

    public function listBukuBesar(Request $request, $kode_akun)
    {
        $data = DB::table('t_jurnal_umum')->where('kode_akun', $request->kode_akun)->get();
        return response()->json($data);
    }

    public function bulanBukuBesar(Request $request, $tanggal)
    {
        $data = DB::table('t_jurnal_umum')->whereMonth('tanggal', $request->tanggal)->get();

        return response()->json($data);
    }

}
