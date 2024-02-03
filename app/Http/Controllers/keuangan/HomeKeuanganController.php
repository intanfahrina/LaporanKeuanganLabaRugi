<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inputjurnal;
use App\Models\Kodeakun;
use App\Models\Labarugi;

class HomeKeuanganController extends Controller
{
    //
    public function index()
    {
        $labarugi = DB::table('laba_rugi')->get();

        return view('keuangan.home.home', compact('labarugi'));
    }
}