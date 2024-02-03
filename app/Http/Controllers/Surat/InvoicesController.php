<?php
  
namespace App\Http\Controllers\Surat;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Invoices;
  
class InvoicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if($request->has('search')){
            $invoices = DB::table('t_invoice')->where('total_harag', 'LIKE', '%' .$request->search.'%');
        }else{
            $invoices = DB::table('t_invoice');
        }
        $invoices = $invoices->get();

        $q = DB::table('t_invoice')->select(DB::raw('MAX(RIGHT(id_invoice,5)) as kode'));
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

        $data = DB::table('t_invoice')
            ->join('t_surat', 't_surat.id_surat', '=', 't_invoice.id_surat')
            ->get();

        $surats = DB::table('t_surat')->get();

        return view('surat.invoice.invoice', compact('invoices', 'kd', 'surats', 'data'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'id_surat' => 'required',
            'total_harga' => 'required'
        ]);

        $invoice = Invoices::create([
        'id_surat' => $request->id_surat,
        'total_harga' => $request->total_harga
        ]);

        if($invoice){
        //redirect dengan pesan sukses
            return redirect()->route('surat.invoices')->with(['success' => 'Data Saved Successfully!']);
        }else{
        //redirect dengan pesan error
            return redirect()->route('surat.invoices')->with(['error' => 'Data Save Failed!']);
        }

    }

    public function edit($id_invoice)
    {
        $invoices = Invoice::where('id_invoice',$id_invoice)->get();

        return view('surat.invoice', compact('invoices'));
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
        DB::table('t_invoice')->where('id_invoice',$request->id_invoice)->update([
        'id_invoice' => $request->id_invoice,
        'total_harga' => $request->total_harga
        ]);

        return redirect('/surat/invoices')->with(['success' => 'Data Updated Successfully!']);
    }

    public function destroy($id_invoice)
    {
        DB::table('t_invoice')->where('id_invoice', $id_invoice)->delete();

        return redirect ('/surat/invoices')->with(['success' => 'Data Deleted Successfully!']);
    }
}