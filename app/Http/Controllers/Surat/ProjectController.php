<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\Client;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        
        if($request->has('search')){
            $projects = DB::table('t_project')->where('nama_project', 'LIKE', '%' .$request->search.'%');
        }else{
            $projects = DB::table('t_project');
        }

        $projects = $projects->get();

        $q = DB::table('t_project')->select(DB::raw('MAX(RIGHT(nomor_project,5)) as kode'));
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

        $clients = DB::table('m_client')->get();

        $data = DB::table('t_project')
                    ->join('m_client', 'm_client.id_client', '=', 't_project.id_client')
                    ->get();

        return view('surat.project.project', compact('projects' , 'kd' ,'clients', 'data'));
    }

    public function create()
    {
       $q = DB::table('m_project')->select(DB::raw('MAX(RIGHT(id_project,5)) as kode'));
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

        $clients = DB::table('m_client')->get();
        return view('surat.project.tambahdataproject',compact('clients','kd'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'id_project' => 'required',
            'id_client' => 'required',
            'nomor_project' => 'required',
            'nama_project' => 'required',
            'tgl_mulai'=> 'required',
            'tgl_selesai'=> 'required',
            'lokasi'=> 'required',
            'nilai_project'=> 'required',
        ]);

        $project = Project::create([
        'id_project'=>$request->id_project,
        'id_client' => $request->id_client,
        'nomor_project' => $request->nomor_project,
        'nama_project' => $request->nama_project,
        'tgl_mulai' => $request->tgl_mulai,
        'tgl_selesai' => $request->tgl_selesai,
        'lokasi' => $request->lokasi,
        'nilai_project' => $request->nilai_project
        ]);

        if($project){
        //redirect dengan pesan sukses
            return redirect()->route('surat.project')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
        //redirect dengan pesan error
            return redirect()->route('surat.tambahdataproject')->with(['error' => 'Data Gagal Disimpan!']);
        }

    }

    public function edit($id_project)
    
    {
        $clients = Client::all();
        $projects = Tipesurat::where('id_project',$id_project)->get();

        return view('surat.project.editdataproject', compact('projects','clients'));
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
        DB::table('t_project')->where('id_project',$request->id_project)->update([
            'id_client' => $request->id_client,
            'nomor_project' => $request->nomor_project,
            'nama_project' => $request->nama_project,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'lokasi' => $request->lokasi,
            'nilai_project' => $request->nilai_project
        ]);

        return redirect('/surat/project')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy($id_project)
    {
        DB::table('t_project')->where('id_project', $id_project)->delete();

        return redirect ('/surat/project')->with(['success' => 'Data Berhasil Didelete!']);
    }
}
