<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Surat;
use App\Models\Client;
use App\Models\Karyawan;
use App\Models\Jabatan;
use App\Models\Tipesurat;
use App\Models\Project;

class DatabastController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request->has('search')){
            $surats = DB::table('t_surat')->where('deskripsi_atas', 'LIKE', '%' .$request->search.'%');
        }else{
            $surats = DB::table('t_surat');
        }
        $surats = $surats->get();

        $q = DB::table('t_surat')->select(DB::raw('MAX(RIGHT(id_surat,5)) as kode'));
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

        $data = DB::table('t_surat')
            ->join('m_tipe_surat', 't_surat.id_tipe_surat', '=', 'm_tipe_surat.id_tipe_surat')
            ->join('m_client', 'm_client.id_client', '=', 't_surat.id_client')
            ->join('m_karyawan', 'm_karyawan.id_karyawan', '=', 't_surat.id_karyawan')
            ->join('m_jabatan', 'm_jabatan.id_jabatan', '=', 'm_karyawan.id_jabatan')
            ->join('t_project', 't_project.id_project', '=', 't_surat.id_project')
            ->get();

        $clients = DB::table('m_client')->get();
        $karyawans = DB::table('m_karyawan')->get();
        

        return view('surat.datasurat.bast', compact('surats', 'clients', 'karyawans', 'kd', 'data'));
    }

    public function show($id_surat)
    {   
        $surats = Surat::where('id_surat',$id_surat)->get();
        $projects = DB::table('t_project')->get();

        $data = DB::table('t_surat')
        ->join('m_tipe_surat', 't_surat.id_tipe_surat', '=', 'm_tipe_surat.id_tipe_surat')
        ->join('m_client', 'm_client.id_client', '=', 't_surat.id_client')
        ->join('m_karyawan', 'm_karyawan.id_karyawan', '=', 't_surat.id_karyawan')
        ->join('t_project', 't_project.id_project', '=', 't_surat.id_project')
        ->where('id_surat',$id_surat)->get()->first();

        $datag = DB::table('t_surat')
                    ->join('m_karyawan', 'm_karyawan.id_karyawan', '=', 't_surat.id_karyawan')
                    ->join('m_jabatan', 'm_jabatan.id_jabatan', '=', 'm_karyawan.id_jabatan')
                    ->where('id_surat',$id_surat)->get();

        return view('surat.bast.cetakbast', compact('surats', 'data','projects', 'datag'));
    }
    
    public function edit($id_surat)
    {   
        $surats = Surat::where('id_surat',$id_surat)->get();

        $data = DB::table('t_surat')
            ->join('m_tipe_surat', 't_surat.id_tipe_surat', '=', 'm_tipe_surat.id_tipe_surat')
            ->join('m_client', 'm_client.id_client', '=', 't_surat.id_client')
            ->join('m_karyawan', 'm_karyawan.id_karyawan', '=', 't_surat.id_karyawan')
            ->join('t_project', 't_project.id_project', '=', 't_surat.id_project')
            ->where('id_surat',$id_surat)->get();

        $datag = DB::table('t_surat')
                    ->join('m_karyawan', 'm_karyawan.id_karyawan', '=', 't_surat.id_karyawan')
                    ->join('m_jabatan', 'm_jabatan.id_jabatan', '=', 'm_karyawan.id_jabatan')
                    ->where('id_surat',$id_surat)->get();

        $clients = DB::table('m_client')->get();
        $karyawans = DB::table('m_karyawan')->get();
        $projects = DB::table('t_project')->get();

        $surat = Surat::findOrFail($id_surat);

        return view('surat.bast.edit', compact('surats', 'data', 'datag', 'surat', 'clients', 'karyawans', 'projects'));
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_surat)
    {
        DB::table('t_surat')->where('id_surat',$request->id_surat)->update([
            'id_surat' => $request->id_surat,
            'id_tipe_surat' => $request->id_tipe_surat,
            'id_client' => $request->id_client,
            'id_karyawan' => $request->id_karyawan,
            'tgl_surat' => $request->tgl_surat,
            'deskripsi_atas' => $request->deskripsi_atas,
            'deskripsi_bawah' => $request->deskripsi_bawah,
            'id_project' => $request->id_project,
        ]);

        return redirect('/surat/datasurat/bast')->with(['success' => 'Data Updated Successfully!']);
    }

    public function destroy($id_surat)
    {
        DB::table('t_surat')->where('id_surat', $id_surat)->delete();

        return redirect ('/surat/datasurat/bast')->with(['success' => 'Data Deleted Successfully!']);
    }

    // public function show(Request $request,$id_client)
    // {
    //     $cli = Client::find($id_client);
    //     return view('datamaster.client.showclient',compact('clients'))->renderSections()['content'];
    // }
}
