<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inputjurnal;
use App\Models\Kodeakun;

class NeracaLajurController extends Controller
{
    //
    public function index()
    {
        $inputjurnals= DB::table('t_jurnal_umum')->get();
        $kodeakuns= DB::table('m_kode_akun')->get();

        $saldo_debit = Inputjurnal::groupBy('kode_akun')->select('kode_akun', DB::raw('sum(debit_jurnal) as total'))->get();

        $neraca = DB::table('m_kode_akun')
           ->whereBetween('kode_akun', [1000, 3999])
           ->get();

        $laba_rugi= DB::table('m_kode_akun')
           ->whereBetween('kode_akun', [4000, 9999])
           ->get();

        return view('keuangan.neraca_lajur.neracalajur', compact('kodeakuns', 'inputjurnals', 'saldo_debit', 'laba_rugi', 'neraca'));
    }
}
