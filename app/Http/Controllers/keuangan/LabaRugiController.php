<?php

namespace App\Http\Controllers\Keuangan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inputjurnal;
use App\Models\Kodeakun;
use App\Models\Labarugi;

class LabaRugiController extends Controller
{
    //
    public function index()
    {
        $inputjurnals= DB::table('t_jurnal_umum')->get();
        $kodeakuns= DB::table('m_kode_akun')->get();

        $pendapatan = DB::table('m_kode_akun')
           ->where('kategori', '=', 'Pendapatan')
           ->get();

        $biaya= DB::table('m_kode_akun')
           ->where('kategori', '=', 'Biaya')
           ->get();

        $pendll = DB::table('m_kode_akun')
           ->where('kategori', '=', 'Pendapatan Lain-Lain')
           ->get();

        $biayall = DB::table('m_kode_akun')
           ->where('kategori', '=', 'Biaya Lain-Lain')
           ->get();

         $labarugi = DB::table('laba_rugi')->get();

        return view('keuangan.laba_rugi.labarugi', compact('inputjurnals', 'kodeakuns', 'pendapatan', 'biaya', 'pendll', 'biayall', 'labarugi'));
    }

    public function update(Request $request)
    {
        DB::table('laba_rugi')->where('id',$request->id)->update([
            'pajak_pph' => $request->pajak_pph,
        ]);

        return redirect('/keuangan/labarugi')->with(['success' => 'Data Updated Successfully!']);
    }
}
