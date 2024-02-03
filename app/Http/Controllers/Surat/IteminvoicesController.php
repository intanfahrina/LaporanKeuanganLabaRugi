<?php
  
namespace App\Http\Controllers\Surat;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Iteminvoices;
  
class IteminvoicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if($request->has('search')){
            $iteminvoices = DB::table('t_item_invoice')->where('nama_item', 'LIKE', '%' .$request->search.'%');
        }else{
            $iteminvoices = DB::table('t_item_invoice');
        }
        $iteminvoices = $iteminvoices->get();

        $q = DB::table('t_item_invoice')->select(DB::raw('MAX(RIGHT(id_item,5)) as kode'));
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

        $surats = DB::table('t_surat')->get();

        return view('surat.invoice.item', compact('iteminvoices', 'kd', 'surats'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'id_surat' => 'required',
            'nama_item' => 'required',
            'harga_item' => 'required'
        ]);

        $iteminvoices = Iteminvoices::create([
        'id_surat' => $request->id_surat,
        'nama_item' => $request->nama_item,
        'harga_item' => $request->harga_item
        ]);

        if($iteminvoices){
        //redirect dengan pesan sukses
            return redirect()->route('surat.iteminvoices')->with(['success' => 'Data Saved Successfully!']);
        }else{
        //redirect dengan pesan error
            return redirect()->route('surat.iteminvoices')->with(['error' => 'Data Save Failed!']);
        }

    }

    public function edit($id_item)
    {
        $iteminvoices = Iteminvoice::where('id_item',$id_item)->get();

        return view('surat.iteminvoice', compact('iteminvoices'));
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
        DB::table('t_item_invoice')->where('id_item',$request->id_item)->update([
        'nama_item' => $request->nama_item,
        'harga_item' => $request->harga_item
        ]);

        return redirect('/surat/iteminvoices')->with(['success' => 'Data Updated Successfully!']);
    }

    public function destroy($id_item)
    {
        DB::table('t_item_invoice')->where('id_item', $id_item)->delete();

        return redirect ('/surat/iteminvoices')->with(['success' => 'Data Deleted Successfully!']);
    }
}