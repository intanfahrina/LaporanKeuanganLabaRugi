<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Datamaster;
use App\Http\Controllers\Surat;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardSuratController;
use App\Http\Controllers\Datamaster\DashboardController;
use App\Http\Controllers\Datamaster\KaryawanController;
use App\Http\Controllers\Datamaster\JabatanController;
use App\Http\Controllers\Keuangan\HomeKeuanganController;
use App\Http\Controllers\Keuangan\BukuBesarController;
use App\Http\Controllers\Keuangan\BukuPembantuController;
use App\Http\Controllers\Keuangan\NeracaLajurController;
use App\Http\Controllers\Keuangan\KodeAkunController;
use App\Http\Controllers\Keuangan\KodeBantuController;
use App\Http\Controllers\Keuangan\JurnalUmumController;
use App\Http\Controllers\Keuangan\InputJurnalController;
use App\Http\Controllers\Keuangan\LabaRugiController;
use App\Http\Controllers\Keuangan\NeracaController;
use App\Http\Controllers\Keuangan\PerubahanModalController;
use App\Http\Controllers\Keuangan\PreviewJurnalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
Route::get('registration', [RegistrationController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [RegistrationController::class, 'customRegistration'])->name('register.custom');
Route::get('dashboardsurat', [DashboardSuratController::class, 'index'])->name('dashboardsurat')->middleware('auth');
Route::prefix('datamaster')->group(function(){
	Route::get('/dashboard', [App\Http\Controllers\Datamaster\DashboardController::class, 'index'])->name('datamaster.dashboard');

	Route::get('/karyawan', [Datamaster\KaryawanController::class, 'index'])->name('datamaster.karyawan');
	Route::get('/tambahdatakaryawan', [Datamaster\KaryawanController::class, 'create'])->name('datamaster.tambahdatakaryawan');
	Route::post('/karyawan/store', [Datamaster\KaryawanController::class, 'store'])->name('datamaster.storekaryawan');
	Route::get('/karyawan/edit/{id_karyawan}', [Datamaster\KaryawanController::class, 'edit'])->name('datamaster.editdatakaryawan');
	Route::post('/karyawan/update/{id_karyawan}', [Datamaster\KaryawanController::class, 'update'])->name('datamaster.updatedatakaryawan');
	Route::get('/karyawan/{id_karyawan}', [Datamaster\KaryawanController::class, 'destroy'])->name('datamaster.destroykaryawan');

	Route::get('/jabatan', [Datamaster\JabatanController::class, 'index'])->name('datamaster.jabatan');
	Route::get('/tambahdatajabatan', [Datamaster\JabatanController::class, 'create'])->name('datamaster.tambahdatajabatan');
	Route::post('/jabatan/store', [Datamaster\JabatanController::class, 'store'])->name('datamaster.storejabatan');
	Route::get('/jabatan/edit/{id_jabatan}', [Datamaster\JabatanController::class, 'edit'])->name('datamaster.editjabatan');
	Route::post('/jabatan/update/{id_jabatan}', [Datamaster\JabatanController::class, 'update'])->name('datamaster.updatedatajabatan');
	Route::get('/jabatan/{id_jabatan}', [Datamaster\JabatanController::class, 'destroy'])->name('datamaster.destroyjabatan');

});

Route::prefix('keuangan')->group(function(){

	Route::get('/home', [HomeKeuanganController::class, 'index'])->name('keuangan.home');
	Route::get('/kodeakun', [KodeAkunController::class, 'index'])->name('keuangan.kodeakun');
	Route::get('/perubahanmodal', [PerubahanModalController::class, 'index'])->name('keuangan.perubahanmodal');

	Route::get('/bukubesar', [BukuBesarController::class, 'index'])->name('keuangan.bukubesar');
	Route::get('/bukupembantu', [BukuPembantuController::class, 'index'])->name('keuangan.bukupembantu');
	Route::get('/labarugi', [LabaRugiController::class, 'index'])->name('keuangan.labarugi');
	Route::post('/laba_rugi/update/{id}', [LabaRugiController::class, 'update'])->name('keuangan.updatelabarugi');
	Route::get('/neraca', [NeracaController::class, 'index'])->name('keuangan.neraca');
	Route::get('/neracalajur', [NeracaLajurController::class, 'index'])->name('keuangan.neracalajur');

	//KODE AKUN
	Route::get('/kodeakun', [KodeAkunController::class, 'index'])->name('keuangan.kodeakun');
	Route::get('/tambahdatakodeakun', [KodeAkunController::class, 'create'])->name('keuangan.tambahdatakodeakun');
	Route::post('/kodeakun/store', [KodeAkunController::class, 'store'])->name('kodeakun.storedataakun');
	Route::get('/kodeakun/edit/{kode_akun}', [KodeAkunController::class, 'edit'])->name('kodeakun.editdatakodeakun');
	Route::post('/kodeakun/update/{kode_akun}', [KodeAkunController::class, 'update'])->name('kodeakun.updatedatakodeakun');
	Route::get('/kodeakun/{kode_akun}', [KodeAkunController::class, 'destroy'])->name('kodeakun.destroykodeakun');

	//KODE AKUN BANTU
	Route::get('/kodeakunbantu', [KodeBantuController::class, 'index'])->name('keuangan.kodeakunbantu');
	Route::get('/tambahdatakodeakunbantu', [KodeBantuController::class, 'create'])->name('keuangan.tambahdatakodeakunbantu');
	Route::post('/kodeakunbantu/store', [KodeBantuController::class, 'store'])->name('kodebantu.storedataakunbantu');
	Route::get('/kodeakunbantu/edit/{kode_akun_bantu}', [KodeBantuController::class, 'edit'])->name('kodebantu.editdatakodeakunbantu');
	Route::post('/kodeakunbantu/update/{kode_akun_bantu}', [KodeBantuController::class, 'update'])->name('kodebantu.updatedatakodeakunbantu');
	Route::get('/kodeakunbantu/{kode_akun_bantu}', [KodeBantuController::class, 'destroy'])->name('kodebantu.destroykodeakunbantu');

	//Input Jurnal
	Route::get('/inputjurnal', [InputJurnalController::class, 'index'])->name('keuangan.inputjurnal');
	Route::post('/inputjurnal/store', [InputJurnalController::class, 'store'])->name('keuangan.storeinputjurnal');

	//Preview Jurnal
	Route::get('/previewjurnal', [PreviewJurnalController::class, 'index'])->name('keuangan.previewjurnal');
	Route::get('/listbukubesar/{kode_akun}', [BukuBesarController::class, 'listBukuBesar'])->name('keuangan.listbukubesar');
	// Route::get('/bulanbukubesar/{tanggal}', [BukuBesarController::class, 'bulanBukuBesar'])->name('keuangan.bulanbukubesar');
	Route::get('/bulanbukubesar/{tanggal}', [BukuBesarController::class, 'bulanBukuBesar'])->name('keuangan.bulanbukubesar');

	Route::get('/listbukubantu/{kode_akun_bantu}', [BukuPembantuController::class, 'listBukuBantu'])->name('keuangan.listbukubantu');
	Route::get('/bulanbukubantu/{tanggal}', [BukuPembantuController::class, 'bulanBukuBantu'])->name('keuangan.bulanbukubantu');

	//Jurnal Umum
	Route::get('/jurnalumum', [JurnalUmumController::class, 'index'])->name('keuangan.jurnalumum');
	Route::post('/jurnalumum/store', [JurnalUmumController::class, 'store'])->name('keuangan.storejurnalumum');
	Route::post('/jurnalumum/update/{id_jurnal_umum}', [JurnalUmumController::class, 'update'])->name('keuangan.updatejurnalumum');
	Route::get('/jurnalumum/{id_jurnal_umum}', [JurnalUmumController::class, 'destroy'])->name('keuangan.destroyjurnalumum');
	Route::get('/jurnalumum/preview/{id_jurnal_umum}', [JurnalUmumController::class, 'show'])->name('keuangan.previewjurnalumum');	

});