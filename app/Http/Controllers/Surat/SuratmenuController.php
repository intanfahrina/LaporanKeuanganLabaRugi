<?php
  
namespace App\Http\Controllers\Surat;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tipesurat;
  
class SuratmenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $tipesurats = DB::table('m_tipe_surat')->get();

        return view('surat.dashboard', compact('tipesurats'));
    }
}