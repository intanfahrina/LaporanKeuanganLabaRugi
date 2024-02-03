<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Surat;
use App\Models\Client;
use App\Models\Karyawan;
use App\Models\Iteminvoices;
use App\Models\Invoices;
use App\Models\Tipesurat;

class DatainvoiceController extends Controller
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
            ->join('t_invoice', 't_invoice.id_surat', '=', 't_surat.id_surat')
            ->get();

        $clients = DB::table('m_client')->get();
        $karyawans = DB::table('m_karyawan')->get();

        $datas = DB::table('t_surat')
            ->rightJoin('t_item_invoice', 't_surat.id_surat', '=', 't_item_invoice.id_surat')
            ->get();

        return view('surat.datasurat.invoice', compact('surats', 'clients', 'karyawans', 'kd', 'data', 'datas'));
    }

    
    public function show($id_surat)
    {   
        $surats = Surat::where('id_surat',$id_surat)->get();

        $data = DB::table('t_surat')
            ->join('m_tipe_surat', 't_surat.id_tipe_surat', '=', 'm_tipe_surat.id_tipe_surat')
            ->join('m_client', 'm_client.id_client', '=', 't_surat.id_client')
            ->join('m_karyawan', 'm_karyawan.id_karyawan', '=', 't_surat.id_karyawan')
            ->where('id_surat',$id_surat)->get()->first();

        $datas = Iteminvoices::where('id_surat',$id_surat)->get();
        $datat = Invoices::where('id_surat',$id_surat)->get();
        $datag = DB::table('t_surat')
                    ->join('m_karyawan', 'm_karyawan.id_karyawan', '=', 't_surat.id_karyawan')
                    ->join('m_jabatan', 'm_jabatan.id_jabatan', '=', 'm_karyawan.id_jabatan')
                    ->where('id_surat',$id_surat)->get();

        $surat = Surat::findOrFail($id_surat);
        if ($surat) {
            return view('surat.invoice.cetak', compact('surat', 'data', 'datas', 'datat', 'datag'));
        } else {
            return redirect('surat/dashboard')->with('errors', 'Data tidak ditemukan');
        }
    }


    public function edit($id_surat)
    {
        $surats = Surat::where('id_surat',$id_surat)->get();

        $data = DB::table('t_surat')
            ->join('m_tipe_surat', 't_surat.id_tipe_surat', '=', 'm_tipe_surat.id_tipe_surat')
            ->join('m_client', 'm_client.id_client', '=', 't_surat.id_client')
            ->join('m_karyawan', 'm_karyawan.id_karyawan', '=', 't_surat.id_karyawan')
            ->where('id_surat',$id_surat)->get();

        $datas = Iteminvoices::where('id_surat',$id_surat)->get();
        $datat = Invoices::where('id_surat',$id_surat)->get();
        $datag = DB::table('t_surat')
                    ->join('m_karyawan', 'm_karyawan.id_karyawan', '=', 't_surat.id_karyawan')
                    ->join('m_jabatan', 'm_jabatan.id_jabatan', '=', 'm_karyawan.id_jabatan')
                    ->where('id_surat',$id_surat)->get();

        $clients = DB::table('m_client')->get();
        $karyawans = DB::table('m_karyawan')->get();

        $surat = Surat::findOrFail($id_surat);

        return view('surat.invoice.edit', compact('surat', 'clients', 'karyawans', 'data', 'datas', 'datat', 'datag'));
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
        $datas = $request->all();

        DB::table('t_surat')->where('id_surat',$request->id_surat)->update([
            'id_surat' => $request->id_surat,
            'id_tipe_surat' => $request->id_tipe_surat,
            'id_client' => $request->id_client,
            'id_karyawan' => $request->id_karyawan,
            'nomor_surat' => $request->nomor_surat,
            'tgl_surat' => $request->tgl_surat,
            'perihal_surat' => $request->perihal_surat,
            'deskripsi_atas' => $request->deskripsi_atas,
            'deskripsi_bawah' => $request->deskripsi_bawah
        ]);

        Iteminvoices::where('id_surat', $id_surat)->delete();

        if (count($datas['nama_item']) >= 0) {
            foreach ($datas['nama_item'] as $item => $value) {
                $data2 = array(
                    'id_surat' => $request->id_surat,
                    'nama_item' => $datas['nama_item'][$item],
                    'harga_item' => $datas['harga_item'][$item],
                );
                Iteminvoices::create($data2);
            }
        }

        Invoices::where('id_surat', $id_surat)->delete();

        $invoice = new Invoices();
        $invoice->id_surat = $request->post('id_surat');
        $invoice->nama_bank = $request->post('nama_bank');
        $invoice->cabang = $request->post('cabang');
        $invoice->nomor_rekening = $request->post('nomor_rekening');
        $invoice->atas_nama = $request->post('atas_nama');
        $invoice->ppn = $request->post('ppn');
        $invoice->total_harga = collect($datas['harga_item'])->sum();
        $invoice->save();

        return redirect('/surat/datasurat/invoice')->with(['success' => 'Data Updated Successfully!']);
    }

    public function destroy($id_surat)
    {
        DB::table('t_surat')->where('id_surat', $id_surat)->delete();

        return redirect ('/surat/datasurat/invoice')->with(['success' => 'Data Deleted Successfully!']);
    }

    // public function show(Request $request,$id_client)
    // {
    //     $cli = Client::find($id_client);
    //     return view('datamaster.client.showclient',compact('clients'))->renderSections()['content'];
    // }
}
