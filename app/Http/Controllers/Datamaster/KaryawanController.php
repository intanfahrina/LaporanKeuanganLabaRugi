<?php

namespace App\Http\Controllers\Datamaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Karyawan;
use App\Models\Jabatan;

class KaryawanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if($request->has('search')){
            $karyawans = DB::table('m_karyawan')->where('nama_karyawan', 'LIKE', '%' .$request->search.'%');
        }else{
            $karyawans = DB::table('m_karyawan');
        }
        $karyawans = $karyawans->get();

        $q = DB::table('m_karyawan')->select(DB::raw('MAX(RIGHT(id_karyawan,5)) as kode'));
        $kd="";
        if($q->count()>0)
        {
            foreach($q->get() as $k)
            {
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%05s",$tmp);
            }
        }
        else {
            $kd = "00001";
        }

        $jabatans = DB::table('m_jabatan')->get();

        $data = DB::table('m_karyawan')
                    ->join('m_jabatan', 'm_jabatan.id_jabatan', '=', 'm_karyawan.id_jabatan')
                    ->get();

        return view('datamaster.karyawan.karyawan', compact('karyawans' , 'kd' ,'jabatans', 'data'));
    }

    public function create()
    {
        $jabatans = DB::table('m_jabatan')->get();

        return view('datamaster.karyawan.tambahdatakaryawan', compact('jabatans'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'id_karyawan' => 'required',
            'id_jabatan' => 'required',
            'nama_karyawan' => 'required',
            'email' => 'required',
            'telepon' => 'required',
            'tgl_mulai_bekerja' => 'required',
            'tgl_selesai_bekerja' => 'required'
        ]);

        $karyawan = Karyawan::create([
        'id_karyawan' => $request->id_karyawan,
        'id_jabatan' => $request->id_jabatan,
        'nama_karyawan' => $request->nama_karyawan,
        'email' => $request->email,
        'telepon' => $request->telepon,
        'tgl_mulai_bekerja' => $request->tgl_mulai_bekerja,
        'tgl_selesai_bekerja' => $request->tgl_selesai_bekerja
        ]);

        if($karyawan){
        //redirect dengan pesan sukses
            return redirect()->route('datamaster.karyawan')->with(['success' => 'Data Saved Successfully!']);
        }else{
        //redirect dengan pesan error
            return redirect()->route('datamaster.tambahdatakaryawan')->with(['error' => 'Data Save Failed!']);
        }

    }

    public function edit($id_karyawan)
    {
        $karyawans = Karyawan::where('id_karyawan',$id_karyawan)->get();

        return view('datamaster.karyawan.editdatakaryawan', compact('karyawans'));
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
        DB::table('m_karyawan')->where('id_karyawan',$request->id_karyawan)->update([
	    'id_jabatan' => $request->id_jabatan,
        'nama_karyawan' => $request->nama_karyawan,
        'email' => $request->email,
        'telepon' => $request->telepon,
        'tgl_mulai_bekerja' => $request->tgl_mulai_bekerja,
        'tgl_selesai_bekerja' => $request->tgl_selesai_bekerja,
        ]);

        return redirect('/datamaster/karyawan')->with(['success' => 'Data Updated Successfully!']);
    }

    public function destroy($id_karyawan)
    {
        DB::table('m_karyawan')->where('id_karyawan', $id_karyawan)->delete();

        return redirect ('/datamaster/karyawan')->with(['success' => 'Data Deleted Successfully!']);
    }
}
