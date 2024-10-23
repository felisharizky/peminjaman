<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\PCController;
use App\Http\Controllers\DashboardController;



Route::get('/', function () {
    return view('welcome');
});


Route::controller(RegisterController::class)->group(function () {
    Route::get('/register/create', 'create')->name('register.create');
    Route::post('/register', 'store')->name('register.store');
    Route::get('/register', 'index')->name('register.index');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/authenticate', 'authenticate')->name('auth.authenticate');
});

Route::controller(WelcomeController::class)->group(function () {
    Route::get('/home', 'home')->name('welcome.home');
});

Route::controller(PinjamController::class)->group(function () {
    Route::get('/pinjam/create', 'create')->name('pinjam.create');
    Route::post('/pinjam', 'store')->name('pinjam.store');
    Route::get('/pinjam', 'index')->name('pinjam.index');
    Route::put('/pinjam/update/{id}', 'updateTanggalKembali')->name('pinjam.updateTanggal');
    Route::get('/pinjam/edit/{id}',  'edit')->name('pinjam.edit');
    Route::get('/pinjam/index_admin', 'indexAdmin')->name('pinjam.index_admin');
    // Route::post('/pinjam/konfirmasi/{id}', 'konfirmasi')->name('pinjam.konfirmasi');
    Route::resource('pinjam', PinjamController::class);
    Route::get('/pinjam/index_admin',  'indexAdmin')->name('pinjam.index_admin');
    Route::put('/pinjam/{id}/updateTanggal',  'updateTanggalKembali')->name('pinjam.updateTanggalKembali');

});

Route::controller(KonfirmasiController::class)->group(function () {
    Route::get('/konfirmasi/index',  'index')->name('admin.konfirmasi.index'); 
    Route::put('/konfirmasi/{id}/confirm', 'confirm')->name('konfirmasi.update');
    Route::put('/konfirmasi/{id}/tolak', 'tolak')->name('konfirmasi.tolak'); 
    Route::post('/konfirmasi/store/{pinjam_id}', 'store')->name('konfirmasi.store');
});

Route::controller(PCController::class)->group(function () {
    Route::get('/pcs', 'index')->name('pc.index');
    Route::get('/pcs/create', 'create')->name('pc.create');
    Route::post('/pcs', 'store')->name('pc.store');
    Route::delete('/pcs/{id}', 'destroy')->name('pc.destroy');
    Route::get('/pc/{id}/edit', 'edit')->name('pc.edit');
    Route::put('/pc/{id}', 'update')->name('pc.update');
    Route::get('/dashboard/index', 'index')->name('dashboard.index');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard/index', 'index')->name('dashboard.index');
});



Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');





