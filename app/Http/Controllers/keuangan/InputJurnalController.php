<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inputjurnal;
use App\Models\Kodeakun;
use App\Models\Kodebantu;
use App\Models\Karyawan;

class InputJurnalController extends Controller
{
    //
    public function index(){
        $inputjurnals= DB::table('t_jurnal_umum')->get();
        $kodeakuns= DB::table('m_kode_akun')->get();
        $akunbantus= DB::table('m_kode_bantu')->get();
        $karyawans=DB::table('m_karyawan')->get();
        return view('keuangan.input_jurnal.inputjurnal', compact('inputjurnals', 'kodeakuns', 'akunbantus', 'karyawans'));
    }

    public function create()
    {

        return view('keuangan.input_jurnal.tambahinputjurnal');
    }

    public function store(Request $request)
    {
        foreach ($request->kode_akun as $key => $kode_akun) {
            $inputjurnal = new Inputjurnal();
            $inputjurnal->tanggal = $request->tanggal;
            $inputjurnal->no_bukti = $request->no_bukti;
            $inputjurnal->keterangan = $request->keterangan;
            $inputjurnal->id_karyawan1 = $request->id_karyawan1;
            $inputjurnal->kode_akun = $kode_akun;
            $inputjurnal->kode_akun_bantu = $request->kode_akun_bantu[$key];
            $inputjurnal->debit_jurnal = $request->debit_jurnal[$key];
            $inputjurnal->kredit_jurnal = $request->kredit_jurnal[$key];
            $inputjurnal->saldo_jurnal = ($request->debit_jurnal[$key]) - ($request->kredit_jurnal[$key]);
            $inputjurnal->save();
        }

        return redirect()->route('keuangan.inputjurnal')->with(['success' => 'Data Saved Successfully!']);

        // $inputjurnal = Inputjurnal::create([
        // 'tanggal' => $request->tanggal,
        // 'no_bukti' => $request->no_bukti,
        // 'keterangan' => $request->keterangan,
        // 'kode_akun' => $request->kode_akun,
        // 'kode_akun_bantu' => $request->kode_akun_bantu,
        // 'debit' => $request->debit,
        // 'kredit' => $request->kredit,
       
        // ]);

        // if($inputjurnal){
        // //redirect dengan pesan sukses
        //     return redirect()->route('keuangan.inputjurnal')->with(['success' => 'Data Saved Successfully!']);
        // }else{
        // //redirect dengan pesan error
        //     return redirect()->route('keuangan.inputjurnal')->with(['error' => 'Data Save Failed!']);
        // }

    }

    public function edit($id_jurnal_umum)
    {
        $inputjurnals = Inputjurnal::where('id_jurnal_umum', $id_jurnal_umum)->get();

        return view('keuangan.inputjurnal', compact('inputjurnals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('t_jurnal_umum')->where('id_jurnal_umum', $request->id_jurnal_umum)->update([
            'tanggal' => $request->tanggal,
            'no_bukti' => $request->no_bukti,
            'keterangan' => $request->keterangan,
            'kode_akun' => $request->kode_akun,
            'kode_akun_bantu' => $request->kode_akun_bantu,
            'debit_jurnal' => $request->debit_jurnal,
            'kredit_jurnal' => $request->kredit_jurnal
        ]);

        return redirect('/keuangan/jurnalumum')->with(['success' => 'Data Updated Successfully!']);
    }

    public function destroy($id_jurnal_umum)
    {
        DB::table('t_jurnal_umum')->where('id_jurnal_umum', $id_jurnal_umum)->delete();

        return redirect ('/keuangan/inputjurnal')->with(['success' => 'Data Deleted Successfully!']);
    }
}
