<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kodebantu;

class KodeBantuController extends Controller
{
    //
    public function index(){
        $akunbantus= DB::table('m_kode_bantu')->get();
        return view('keuangan.kode_bantu.kodebantu',compact('akunbantus'));
    }
    public function create()
    {

        return view('keuangan.kode_bantu.tambahdatakodebantu');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'kode_akun_bantu' => 'required',
            'nama_akun_bantu' => 'required',
            'saldo_normal' => 'required',
            'tabel_bantuan' => 'required',
            'saldo_awal' => 'required',
            'kategori' => 'required'

           
        ]);

        $kode_akun_bantu = Kodebantu::create([
        'kode_akun_bantu' => $request->kode_akun_bantu,
        'nama_akun_bantu' => $request->nama_akun_bantu,
        'tabel_bantuan' => $request->tabel_bantuan,
        'kategori' => $request->kategori,
        'saldo_normal' => $request->saldo_normal,
        'saldo_awal' => $request->saldo_awal
       
       
        ]);

        if($kode_akun_bantu){
        //redirect dengan pesan sukses
            return redirect()->route('keuangan.kodeakunbantu')->with(['success' => 'Data Saved Successfully!']);
        }else{
        //redirect dengan pesan error
            return redirect()->route('keuangan.tambahdatakodeakunbantu')->with(['error' => 'Data Save Failed!']);
        }

    }

    public function edit($kode_akun_bantu)
    {
        $akunbantus = Kodebantu::where('kode_akun_bantu',$kode_akun_bantu)->get();

        return view('keuangan.kode_bantu.kodebantu', compact('akunbantus'));
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
        DB::table('m_kode_bantu')->where('kode_akun_bantu',$request->kode_akun_bantu)->update([
            'nama_akun_bantu' => $request->nama_akun_bantu,
            'tabel_bantuan' => $request->tabel_bantuan,
            'kategori' => $request->kategori,
            'saldo_normal' => $request->saldo_normal,
            'saldo_awal' => $request->saldo_awal
        ]);

        return redirect('/keuangan/kodeakunbantu')->with(['success' => 'Data Updated Successfully!']);
    }

    public function destroy($kode_akun_bantu)
    {
        DB::table('m_kode_bantu')->where('kode_akun_bantu', $kode_akun_bantu)->delete();

        return redirect ('/keuangan/kodeakunbantu')->with(['success' => 'Data Deleted Successfully!']);
    }
}
