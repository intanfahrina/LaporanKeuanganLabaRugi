<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inputjurnal;
use App\Models\Kodeakun;
use App\Models\Labarugi;

class PerubahanModalController extends Controller
{
    //
    public function index()
    {
        $labarugi = DB::table('laba_rugi')->get();

        $modalawal= DB::table('m_kode_akun')
           ->where('nama_akun', '=', 'Modal Awal')
           ->get();

        return view('keuangan.perubahan_modal.perubahanmodal', compact('labarugi', 'modalawal'));
    }
}
