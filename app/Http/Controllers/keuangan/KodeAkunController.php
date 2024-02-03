<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kodeakun;


class KodeAkunController extends Controller
{
    //
    public function index(){
        $kodeakuns= DB::table('m_kode_akun')->get();
        $data = DB::table('m_kode_akun')->get();
        return view('keuangan.kode_akun.kodeakun',compact('kodeakuns','data'));
    }
    public function create()
    {

        return view('keuangan.kode_akun.tambahdatakodeakun');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'kode_akun' => 'required',
            'nama_akun' => 'required',
            'tabel_bantuan' => 'required',
            'kategori' => 'required',
            'pos_saldo' => 'required',
            'pos_laporan' => 'required',
            'debit' => 'required',
            'kredit' => 'required'
        ]);

        $kode_akun = Kodeakun::create([
        'kode_akun' => $request->kode_akun,
        'nama_akun' => $request->nama_akun,
        'tabel_bantuan' => $request->tabel_bantuan,
        'kategori' => $request->kategori,
        'pos_saldo' => $request->pos_saldo,
        'pos_laporan' => $request->pos_laporan,
        'debit' => $request->debit,
        'kredit' => $request->kredit
       
        ]);

        if($kode_akun){
        //redirect dengan pesan sukses
            return redirect()->route('keuangan.kodeakun')->with(['success' => 'Data Saved Successfully!']);
        }else{
        //redirect dengan pesan error
            return redirect()->route('keuangan.tambahdatakodeakun')->with(['error' => 'Data Save Failed!']);
        }

    }

    public function edit($kode_akun)
    {
        $kodeakuns = Kodeakun::where('kode_akun',$kode_akun)->get();

        return view('keuangan.kode_akun.kodeakun', compact('kodeakuns'));
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
        DB::table('m_kode_akun')->where('kode_akun',$request->kode_akun)->update([
            'nama_akun' => $request->nama_akun,
            'tabel_bantuan' => $request->tabel_bantuan,
            'kategori' => $request->kategori,
            'pos_saldo' => $request->pos_saldo,
            'pos_laporan' => $request->pos_laporan,
            'debit' => $request->debit,
            'kredit' => $request->kredit
        ]);

        return redirect('/keuangan/kodeakun')->with(['success' => 'Data Updated Successfully!']);
    }

    public function destroy($kode_akun)
    {
        DB::table('m_kode_akun')->where('kode_akun', $kode_akun)->delete();

        return redirect ('/keuangan/kodeakun')->with(['success' => 'Data Deleted Successfully!']);
    }
}
