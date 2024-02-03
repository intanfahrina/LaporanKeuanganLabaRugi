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
use App\Models\Iteminvoices;
use App\Models\Invoices;
  
class SuratinvoicesController extends Controller
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

        //kode surat
        $bulan = date('n');
        $romawi = getRomawi($bulan);
        $tahun = date ('Y');
        $nomor = "/PT-CROP/".$romawi."/".$tahun;
        $w = DB::table('t_surat')->select(DB::raw('MAX(RIGHT(id_surat,3)) as kode'));
        $ks="";
        if($w->count()>0)
        {
            foreach($w->get() as $k)
            {
                $tmp = ((int)$k->kode)+1;
                $ks = sprintf("%03s",$tmp);
            }
        }
        else {
            $ks = "001";
        }
        $nomorbaru = $ks.$nomor; 

        $data = DB::table('t_surat')
            ->join('m_tipe_surat', 't_surat.id_tipe_surat', '=', 'm_tipe_surat.id_tipe_surat')
            ->join('m_client', 'm_client.id_client', '=', 't_surat.id_client')
            ->join('m_karyawan', 'm_karyawan.id_karyawan', '=', 't_surat.id_karyawan')
            ->get();

        $clients = DB::table('m_client')->get();
        $karyawans = DB::table('m_karyawan')->get();
        $iteminvoices = DB::table('t_item_invoice')->get();
        $invoices = DB::table('t_invoice')->get();


        return view('surat.invoice.create', compact('surats', 'clients', 'karyawans', 'data', 'kd', 'nomorbaru', 'iteminvoices', 'invoices'));
    }

    public function store(Request $request)
    {
        $datas = $request->all();

        $this->validate(request(), [
            'id_surat' => 'required',
            'id_tipe_surat' => 'required',
            'id_client' => 'required',
            'id_karyawan' => 'required',
            'nomor_surat' => 'required',
            'tgl_surat' => 'required',
            'perihal_surat' => 'required',
            'deskripsi_atas' => 'required',
            'deskripsi_bawah' => 'required',
        ]);
        try {

            \DB::beginTransaction();

            $surat = new Surat();
        $surat->id_surat = $request->post('id_surat');
        $surat->id_tipe_surat = $request->post('id_tipe_surat');
        $surat->id_client = $request->post('id_client');
        $surat->id_karyawan = $request->post('id_karyawan');
        $surat->nomor_surat = $request->post('nomor_surat');
        $surat->tgl_surat = $request->post('tgl_surat');
        $surat->perihal_surat = $request->post('perihal_surat');
        $surat->deskripsi_atas = $request->post('deskripsi_atas');
        $surat->deskripsi_bawah = $request->post('deskripsi_bawah');
        $surat->save();

        //$iteminvoices->id_surat = $request->post('id_surat');
        //$iteminvoices->nama_item = $datas['nama_item'];
        //$iteminvoices->harga_item = $datas['harga_item'];
        //$iteminvoices->save();
        if (count($datas['nama_item']) >= 0) {
            foreach ($datas['nama_item'] as $item => $value) {
                $data2 = array(
                    'id_surat' => $surat->id_surat,
                    'nama_item' => $datas['nama_item'][$item],
                    'harga_item' => $datas['harga_item'][$item],
                );
                Iteminvoices::create($data2);
            }
        }

        $invoice = new Invoices();
        $invoice->id_surat = $request->post('id_surat');
        $invoice->nama_bank = $request->post('nama_bank');
        $invoice->cabang = $request->post('cabang');
        $invoice->nomor_rekening = $request->post('nomor_rekening');
        $invoice->atas_nama = $request->post('atas_nama');
        $invoice->ppn = $request->post('ppn');
        $invoice->total_harga = collect($datas['harga_item'])->sum();
        $invoice->save();
            
        \DB::commit();

        } catch (Exception $e) {
            \DB::rollback();
        }

        return redirect()->route('invoice.cetak', $surat->id_surat);

    }

    public function show($id_surat)
    {
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

}