<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\AntarSuratController;
use App\Http\Controllers\KelolaUserController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\KelolaSuratController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PersetujuanController;
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

Route::get('generate-pdf', [PDFController::class, 'generatePDF']);

//hak akses
Route::group(['middleware' => 'admin'], function() {
    Route::get('/skeluar', [SuratKeluarController::class, 'index']);

    Route::get('/disposisi', [DisposisiController::class, 'index'])->name('disposisi');
    Route::get('/disposisi/add', [DisposisiController::class, 'add'])->name('add_disposisi');
    Route::post('/disposisi/insert', [DisposisiController::class, 'insert'])->name('insert_disposisi');
    Route::get('/disposisi/edit/{id}', [DisposisiController::class, 'edit'])->name('edit_disposisi');
    Route::post('/disposisi/update/{id}', [DisposisiController::class, 'update'])->name('update_disposisi');
    Route::get('/disposisi/delete/{id}', [DisposisiController::class, 'delete'])->name('delete_disposisi');

    Route::get('/surat', [KelolaSuratController::class, 'index'])->name('surat_index');
    Route::get('/surat/generate/{id}', [KelolaSuratController::class, 'generate'])->name('surat_generate');

    Route::get('/smasuk', [SuratMasukController::class, 'index'])->name('smasuk');
    Route::get('/smasuk/detail/{id_suratmasuk}', [SuratMasukController::class, 'detail']);

    Route::get('/setuju', [PersetujuanController::class, 'index'])->name('index_setuju');
    Route::get('/setujuAdmin', [PersetujuanController::class, 'indexAdmin'])->name('index_setujuAdmin');
    Route::get('/setuju/{id}', [PersetujuanController::class, 'accepted'])->name('surat_setuju');
    Route::get('/setuju/delete/{id}', [PersetujuanController::class, 'delete'])->name('surat_delete');

    // Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
    

    Route::get('/antar', [AntarSuratController::class, 'index']);

    Route::group(['prefix'=>'surat','namespace' => 'App\Http\Controllers\Surat'], function() {
      Route::group(['prefix'=>'sktm'], function() {
        Route::get('index', [SuratKetTidakMampuController::class, 'index']);
        Route::get('create', [SuratKetTidakMampuController::class, 'create'])->name('create_sktm');
        Route::post('store', [SuratKetTidakMampuController::class, 'store'])->name('store_sktm');
        Route::get('edit', [SuratKetTidakMampuController::class, 'edit']);
      });
    });

    Route::group(['middleware' => 'superAdmin'], function() {
        Route::get('/user', [KelolaUserController::class, 'index'])->name('user');
        Route::get('/user/add', [KelolaUserController::class, 'add']);
        Route::post('/user/insert', [KelolaUserController::class, 'insert']);
        Route::get('/user/edit/{id}', [KelolaUserController::class, 'edit']);
        Route::post('/user/update/{id}', [KelolaUserController::class, 'update'])->name('user_update');
        Route::get('/user/delete/{id}', [KelolaUserController::class,'delete'])->name('user_delete');

        Route::get('/smasuk/add', [SuratMasukController::class, 'add']);
        Route::post('/smasuk/insert', [SuratMasukController::class, 'insert']);
        Route::get('/smasuk/edit/{id_suratmasuk}', [SuratMasukController::class, 'edit']);
        Route::post('/smasuk/update/{id_suratmasuk}', [SuratMasukController::class, 'update']);
        Route::get('/smasuk/delete/{id_suratmasuk}', [SuratMasukController::class,'delete']);
    });

    Route::group(['middleware' => 'kepalaDesa'], function() {

    });

    Route::group(['middleware' => 'kurir'], function() {

    });
});
