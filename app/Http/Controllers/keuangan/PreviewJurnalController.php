<?php

namespace App\Http\Controllers\Keuangan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inputjurnal;
use App\Models\Kodeakun;
use App\Models\Kodebantu;
use App\Models\Karyawan;

class PreviewJurnalController extends Controller
{
    public function index(){
        $inputjurnals= DB::table('t_jurnal_umum')->get();
        $kodeakuns= DB::table('m_kode_akun')->get();
        $akunbantus= DB::table('m_kode_bantu')->get();
        return view('keuangan.input_jurnal.previewjurnal', compact('inputjurnals', 'kodeakuns', 'akunbantus'));
    }
}
