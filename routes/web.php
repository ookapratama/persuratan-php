<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\AntarSuratController;
use App\Http\Controllers\ArsipKeluarController;
use App\Http\Controllers\ArsipMasukController;
use App\Http\Controllers\KelolaUserController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\KelolaSuratController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\Surat\SuratKetHilangController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\Surat\SuratKetTidakMampuController;

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

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//hak akses
Route::group(['middleware' => 'admin'], function () {
  Route::get('/skeluar', [SuratKeluarController::class, 'index']);

  Route::get('/disposisi', [DisposisiController::class, 'index'])->name('disposisi');
  Route::get('/disposisi/accept/{id}', [DisposisiController::class, 'disposisi'])->name('accept_disposisi');
  Route::get('/disposisi/show/{id}', [DisposisiController::class, 'show'])->name('show_disposisi');
  Route::get('/disposisi/add', [DisposisiController::class, 'add'])->name('add_disposisi');
  Route::post('/disposisi/insert', [DisposisiController::class, 'insert'])->name('insert_disposisi');
  Route::get('/disposisi/edit/{id}', [DisposisiController::class, 'edit'])->name('edit_disposisi');
  Route::post('/disposisi/update/{id}', [DisposisiController::class, 'update'])->name('update_disposisi');
  Route::get('/disposisi/delete/{id}', [DisposisiController::class, 'delete'])->name('delete_disposisi');
  Route::post('/arsip/upload/{id}', [DisposisiController::class, 'uploadFile'])->name('upload_arsip');
  Route::get('/arsip/viewUpload/{id}', [DisposisiController::class, 'viewUpload'])->name('viewUpload_arsip');

  Route::get('/surat', [KelolaSuratController::class, 'index'])->name('surat_index');
  Route::get('/surat/generate/{id}', [KelolaSuratController::class, 'generate'])->name('surat_generate');
  Route::get('/surat/arsip/{id}', [KelolaSuratController::class, 'arsip'])->name('suratKeluar_arsip');
  // Route::get('/arsip/viewUpload/{id}', [KelolaSuratController::class, 'viewUpload'])->name('viewUpload_arsipKeluar');
  // Route::post('/arsip/upload/{id}', [KelolaSuratController::class, 'uploadFile'])->name('upload_arsipKeluar');

  Route::get('/arsipKeluar', [ArsipKeluarController::class, 'index'])->name('arsip_keluar');

  Route::get('/arsipMasuk', [ArsipMasukController::class, 'index'])->name('arsip_masuk');
  Route::get('/arsipMasuk/search', [ArsipMasukController::class, 'search'])->name('search_masuk');
  Route::get('/arsipMasuk/filter', [ArsipMasukController::class, 'filter'])->name('filter_masuk');
  // Route::get('/arsipKeluar', [ArsipKeluarController::class, 'edit'])->name('arsip_editKeluar');
  Route::get('/smasuk/detail/{id_suratmasuk}', [SuratMasukController::class, 'detail']);

  Route::get('/setuju', [PersetujuanController::class, 'index'])->name('index_setuju');
  Route::get('/setuju/{id}', [PersetujuanController::class, 'accepted'])->name('surat_setuju');
  Route::get('/setujuAdmin', [PersetujuanController::class, 'indexSetuju'])->name('index_setujuSurat');
  Route::get('/setujuAdmin/arsip/{id}', [PersetujuanController::class, 'arsip'])->name('surat_arsip');
  Route::get('/setuju/delete/{id}', [PersetujuanController::class, 'delete'])->name('surat_delete');

  // Route::get('generate-pdf', [PDFController::class, 'generatePDF']);


  Route::get('/antar', [AntarSuratController::class, 'index'])->name('index_antar');
  Route::get('/antar/confirm/{id}', [AntarSuratController::class, 'antar'])->name('confirm_antar');

  Route::group(['prefix' => 'surat', 'namespace' => 'App\Http\Controllers\Surat'], function () {
    Route::group(['prefix' => 'sktm'], function () {
      // Route::get('index', [SuratKetTidakMampuController::class, 'index']);
      Route::get('create', [SuratKetTidakMampuController::class, 'create'])->name('create_sktm');
      Route::post('store', [SuratKetTidakMampuController::class, 'store'])->name('store_sktm');
      Route::get('show/{id}', [SuratKetTidakMampuController::class, 'show'])->name('show_sktm');
      Route::get('edit/{id}', [SuratKetTidakMampuController::class, 'edit'])->name('edit_sktm');
      Route::post('update/{id}', [SuratKetTidakMampuController::class, 'update'])->name('update_sktm');
      Route::get('delete/{id}', [SuratKetTidakMampuController::class, 'destroy'])->name('destroy_sktm');
    });

    Route::group(['prefix' => 'hilang'], function () {
      Route::get('create', [SuratKetHilangController::class, 'create'])->name('create_hilang');
      Route::post('store', [SuratKetHilangController::class, 'store'])->name('store_hilang');
      Route::get('show/{id}', [SuratKetHilangController::class, 'show'])->name('show_hilang');
      Route::get('edit/{id}', [SuratKetHilangController::class, 'edit'])->name('edit_hilang');
      Route::post('update/{id}', [SuratKetHilangController::class, 'update'])->name('update_hilang');
      Route::get('delete/{id}', [SuratKetHilangController::class, 'delete'])->name('delete_hilang');
    });
  });

  Route::group(['middleware' => 'superAdmin'], function () {
    Route::get('/user', [KelolaUserController::class, 'index'])->name('user');
    Route::get('/user/add', [KelolaUserController::class, 'add'])->name('user_add');
    Route::get('/user/read', [KelolaUserController::class, 'read'])->name('user_read');
    Route::post('/user/insert', [KelolaUserController::class, 'insert'])->name('user_insert');
    Route::get('/user/edit/{id}', [KelolaUserController::class, 'edit'])->name('user_edit');
    Route::post('/user/update/{id}', [KelolaUserController::class, 'update'])->name('user_update');
    Route::get('/user/delete/{id}', [KelolaUserController::class, 'delete'])->name('user_delete');

    Route::get('/smasuk/add', [SuratMasukController::class, 'add']);
    Route::post('/smasuk/insert', [SuratMasukController::class, 'insert']);
    Route::get('/edit/{id_suratmasuk}', [SuratMasukController::class, 'edit']);
    Route::post('/smasuk/update/{id_suratmasuk}', [SuratMasukController::class, 'update']);
    Route::get('/smasuk/delete/{id_suratmasuk}', [SuratMasukController::class, 'delete']);
  });

  Route::group(['middleware' => 'kepalaDesa'], function () {
  });

  Route::group(['middleware' => 'kurir'], function () {
  });
});
