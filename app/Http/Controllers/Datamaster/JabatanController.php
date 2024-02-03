<?php

namespace App\Http\Controllers\Datamaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jabatan;

class JabatanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if($request->has('search')){
            $jabatans = DB::table('m_jabatan')->where('nama_jabatan', 'LIKE', '%' .$request->search.'%');
        }else{
            $jabatans = DB::table('m_jabatan');
        }
        $jabatans = $jabatans->get();

        $q = DB::table('m_jabatan')->select(DB::raw('MAX(RIGHT(id_jabatan,5)) as kode'));
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

        return view('datamaster.jabatan.jabatan', compact('jabatans', 'kd'));
    }

    public function create()
    {

        $q = DB::table('m_jabatan')->select(DB::raw('MAX(RIGHT(id_jabatan,5)) as kode'));
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

        return view('datamaster.jabatan.tambahdatajabatan',compact('kd'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'id_jabatan' => 'required',
            'nama_jabatan' => 'required',
        ]);

        $jabatan = Jabatan::create([
        'id_jabatan' => $request->id_jabatan,
        'nama_jabatan' => $request->nama_jabatan
        ]);

        if($jabatan){
        //redirect dengan pesan sukses
            return redirect()->route('datamaster.jabatan')->with(['success' => 'Data Saved Successfully!']);
        }else{
        //redirect dengan pesan error
            return redirect()->route('datamaster.createjabatan')->with(['error' => 'Data Save Failed!']);
        }

    }

    public function edit($id_jabatan)
    {

        $jabatans = Jabatan::where('id_jabatan',$id_jabatan)->get();

        return view('datamaster.jabatan.editdatajabatan', compact('jabatans'));
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
        $request->validate([
            'nama_jabatan' => 'required',
        ]);

        DB::table('m_jabatan')->where('id_jabatan',$request->id_jabatan)->update([
            'id_jabatan' => $request->id_jabatan,
            'nama_jabatan' => $request->nama_jabatan
        ]);

        return redirect('/datamaster/jabatan')->with(['success' => 'Data Updated Successfully!']);
    }

    public function destroy($id_jabatan)
    {
        DB::table('m_jabatan')->where('id_jabatan', $id_jabatan)->delete();

        return redirect ('/datamaster/jabatan')->with(['success' => 'Data Deleted Successfully!']);
    }
}
