<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inputjurnal;
use App\Models\Kodeakun;
use App\Models\Kodebantu;
use App\Models\Karyawan;

class JurnalUmumController extends Controller
{
    //
    public function index(){
        $inputjurnals= DB::table('t_jurnal_umum')->get();
        $kodeakuns= DB::table('m_kode_akun')->get();
        $akunbantus= DB::table('m_kode_bantu')->get();
        $karyawans=DB::table('m_karyawan')->get();
        $data = DB::table('t_jurnal_umum')
            ->join('m_kode_akun', 'm_kode_akun.kode_akun', '=', 't_jurnal_umum.kode_akun')
            ->join('m_kode_bantu', 'm_kode_bantu.kode_akun_bantu', '=', 't_jurnal_umum.kode_akun_bantu')
            ->join('m_karyawan', 'm_karyawan.id_karyawan', '=', 't_jurnal_umum.id_karyawan1')
            ->get();
        return view('keuangan.jurnal_umum.jurnalumum', compact('inputjurnals', 'data', 'kodeakuns', 'akunbantus', 'karyawans'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'tanggal' => 'required',
            'no_bukti' => 'required',
            'keterangan' => 'required',
            'kode_akun' => 'required',
            'kode_akun_bantu' => 'required',
            'debit' => 'required',
            'kredit' => 'required',
            'id_karyawan1' => 'required',
        ]);

        $Inputjurnal = Inputjurnal::create([
        'tanggal' => $request->tanggal,
        'no_bukti' => $request->no_bukti,
        'keterangan' => $request->keterangan,
        'kode_akun' => $request->kode_akun,
        'kode_akun_bantu' => $request->kode_akun_bantu,
        'debit' => $request->debit,
        'kredit' => $request->kredit,
        'id_karyawan1' => $request->id_karyawan1

        ]);

        if($inputjurnal){
        //redirect dengan pesan sukses
            return redirect()->route('keuangan.jurnalumum')->with(['success' => 'Data Saved Successfully!']);
        }else{
        //redirect dengan pesan error
            return redirect()->route('keuangan.jurnalumum')->with(['error' => 'Data Save Failed!']);
        }

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
        DB::table('t_jurnal_umum')->where('id_jurnal_umum',$request->id_jurnal_umum)->update([
            'tanggal' => $request->tanggal,
            'no_bukti' => $request->no_bukti,
            'keterangan' => $request->keterangan,
            'kode_akun' => $request->kode_akun,
            'kode_akun_bantu' => $request->kode_akun_bantu,
            'debit_jurnal' => $request->debit_jurnal,
            'kredit_jurnal' => $request->kredit_jurnal,
            'id_karyawan1' => $request->id_karyawan1,
            'saldo_jurnal' => ($request->debit_jurnal) - ($request->kredit_jurnal)
        ]);

        return redirect('/keuangan/jurnalumum')->with(['success' => 'Data Updated Successfully!']);
    }

    public function show($id_jurnal_umum)
    {   
        $inputjurnals= DB::table('t_jurnal_umum')->get();
        $kodeakuns= DB::table('m_kode_akun')->get();
        $akunbantus= DB::table('m_kode_bantu')->get();
        $karyawans=DB::table('m_karyawan')->get();

        $data = DB::table('t_jurnal_umum')
            ->join('m_kode_akun', 'm_kode_akun.kode_akun', '=', 't_jurnal_umum.kode_akun')
            ->join('m_kode_bantu', 'm_kode_bantu.kode_akun_bantu', '=', 't_jurnal_umum.kode_akun_bantu')
            ->join('m_karyawan', 'm_karyawan.id_karyawan', '=', 't_jurnal_umum.id_karyawan1')
            ->join('m_jabatan', 'm_jabatan.id_jabatan', '=', 'm_karyawan.id_jabatan')
            ->where('id_jurnal_umum',$id_jurnal_umum)->get()->first();

        $jurnal = Inputjurnal::findOrFail($id_jurnal_umum);
        if ($jurnal) {
            return view('keuangan.input_jurnal.previewjurnal', compact('jurnal', 'data','inputjurnals', 'kodeakuns', 'akunbantus', 'karyawans'));
        } else {
            return redirect('surat/dashboard')->with('errors', 'Data tidak ditemukan');
        }
    }

    public function destroy($id_jurnal_umum)
    {
        DB::table('t_jurnal_umum')->where('id_jurnal_umum', $id_jurnal_umum)->delete();

        return redirect ('/keuangan/jurnalumum')->with(['success' => 'Data Deleted Successfully!']);
    }
}
