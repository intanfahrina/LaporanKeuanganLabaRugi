<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inputjurnal;
use App\Models\Kodeakun;
use App\Models\Labarugi;
  
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $labarugi = DB::table('laba_rugi')->get();

        return view('home', compact('labarugi'));
    }
}