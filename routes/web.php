<?php

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\LevelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TuController;
use App\Http\Controllers\DirekturController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TtdController;
// use App\Http\Controllers\MasterController;
// use App\Http\Controllers\KabagController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    if(Route::has('login')){
        return redirect(route('beranda'));
    }
    else{
        return view('auth.login');
    }
});

Auth::routes();
Route::get('/beranda', [HomeController::class, 'beranda'])->name('beranda');
Route::get('super/beranda/{id}/{nama}', [HomeController::class, 'pilih_bidang'])->name('pilih-bidang');
// Route::get('super/beranda/{id}', [HomeController::class, 'pilih_bidang'])->name('pilih-bidang');

Route::get('super/level', [LevelController::class, 'level'])->name('level');
Route::post('super/tambah-level', [LevelController::class, 'tambah_level'])->name('tambah-level');
Route::post('super/edit-level', [LevelController::class, 'edit_level'])->name('edit-level');
Route::delete('super/hapus-level/{id}', [LevelController::class, 'hapus_level'])->name('hapus-level');

Route::get('super/bidang', [UnitController::class, 'index'])->name('bidang');
Route::post('super/tambah-bidang', [UnitController::class, 'tambah_bidang'])->name('tambah-bidang');
Route::post('super/edit-bidang', [UnitController::class, 'edit_bidang'])->name('edit-bidang');
Route::delete('super/hapus-bidang/{id}', [UnitController::class, 'hapus_bidang'])->name('hapus-bidang');

Route::get('super/unit/{id}', [UnitController::class, 'unit'])->name('unit');
Route::post('super/tambah-unit/{id}', [UnitController::class, 'tambah_unit'])->name('tambah-unit');
Route::post('super/edit-unit/{id}', [UnitController::class, 'edit_unit'])->name('edit-unit');
Route::delete('super/hapus-unit/{id}/{id_unit}', [UnitController::class, 'hapus_unit'])->name('hapus-unit');

Route::get('super/users', [UserController::class, 'index'])->name('users');
Route::post('super/tambah-users', [UserController::class, 'store'])->name('tambah-users');
Route::post('super/edit-users', [UserController::class, 'update'])->name('edit-users');
Route::delete('super/hapus-users/{id}', [UserController::class, 'hapus_user'])->name('hapus-users');

Route::get('super/macam', [MasterController::class, 'macam_perbaikan'])->name('macam-perbaikan');
Route::post('super/tambah-macam', [MasterController::class, 'tambah_macam'])->name('tambah-macam');
Route::post('super/edit-macam', [MasterController::class, 'edit_macam'])->name('edit-macam');
Route::delete('super/hapus-macam/{id}', [MasterController::class, 'hapus_macam'])->name('hapus-macam');

Route::get('super/kondisi', [MasterController::class, 'kondisi_barang'])->name('kondisi-barang');
Route::post('super/tambah-kondisi', [MasterController::class, 'tambah_kondisi'])->name('tambah-kondisi');
Route::post('super/edit-kondisi', [MasterController::class, 'edit_kondisi'])->name('edit-kondisi');
Route::delete('super/hapus-kondisi/{id}', [MasterController::class, 'hapus_kondisi'])->name('hapus-kondisi');

Route::get('super/surat-masuk', [SuratController::class, 'surat_perbaikan'])->name('surat-perbaikan');
Route::post('super/tindaklanjut-surat', [SuratController::class, 'tindaklanjut_surat'])->name('tindaklanjut-surat');
Route::post('super/ttd/{id}', [TtdController::class, 'upload'])->name('upload-ttd');
// Route::get('/exportlaporan', [LaporanController::class, 'export']);
Route::get('exportlaporan/{id}', [LaporanController::class, 'export']);

Route::get('user/surat-perbaikan', [SuratController::class, 'index'])->name('index');
Route::get('user/surat-masuk', [SuratController::class, 'surat_perbaikan'])->name('surat-perbaikan');
Route::post('user/ajukan-surat', [SuratController::class, 'ajukan_surat'])->name('ajukan-surat');
Route::post('user/edit-surat', [SuratController::class, 'edit_surat'])->name('edit-surat');
Route::delete('user/hapus-surat/{id}', [SuratController::class, 'hapus_surat'])->name('hapus-surat');
Route::get('user/catatan-surat/{id}', [SuratController::class, 'catatan_surat'])->name('catatan-surat');
Route::post('user/tambah-catatan/{id}', [SuratController::class, 'tambah_catatan'])->name('tambah_catatan');
Route::post('user/edit-catatan/{id}', [SuratController::class, 'edit_catatan'])->name('edit_catatan');



// Route::get('super/master-barang', [MasterController::class, 'master'])->name('master-barang');
// Route::post('super/tambah-master', [MasterController::class, 'tambah_master'])->name('tambah-master');
// Route::get('super/detail-merk/{id}', [MasterController::class, 'detail_merk'])->name('detail-merk');
// Route::post('super/edit-master', [MasterController::class, 'edit_kategori'])->name('edit-master');
// Route::delete('super/hapus-master/{id}', [MasterController::class, 'destroy'])->name('hapus-master');

// Route::post('super/tambah-merk/{id}', [MasterController::class, 'tambah_merk'])->name('tambah-merk');
// Route::post('super/edit-merk/{id}', [MasterController::class, 'edit_merk'])->name('edit-merk');
// Route::delete('super/hapus-merk/{id}/{id_merk}', [MasterController::class, 'hapus_merk'])->name('hapus-merk');

// Route::get('super/tipe/{id}/{id_merk}', [MasterController::class, 'detail_tipe'])->name('detail-tipe');
// Route::post('super/tambah-tipe/{id}/{id_merk}', [MasterController::class, 'tambah_tipe'])->name('tambah-tipe');
// Route::post('super/edit-tipe/{id}/{id_merk}', [MasterController::class, 'edit_tipe'])->name('edit-tipe');
// Route::delete('super/hapus-tipe/{id}/{id_merk}/{id_tipe}', [MasterController::class, 'hapus_tipe'])->name('hapus-tipe');

Route::get('admin/barang', [BarangController::class, 'index'])->name('barang');
Route::get('/getmerk', [BarangController::class, 'merk'])->name('merk');
Route::get('/gettipe', [BarangController::class, 'tipe'])->name('tipe');


// Route::get('/logout', [Auth\LoginController::class, 'logout']);
