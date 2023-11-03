<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LihatNilaiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PagenotController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/salam', function(){
    return "Selamat Belajar Laravel";
});


//tambah routing
Route::get('/staff/{nama}/{divisi}', function($nama, $divisi){
    return 'Nama Pegawai : '.$nama. '<br> Departemen : '.$divisi;
});


//menambahkan routing dengan memanggnil nama file dari view
Route::get('/kondisi',function(){
    return view('kondisi');
});

Route::get('/nilai', function(){
    return view('coba.nilai');
});

Route::get('/daftarnilai', function(){
    return view('coba.daftar');
});

//memanggil route dari control dan view

Route::get('/datamahasiswa', [LihatNilaiController::class, 'dataMahasiswa']);



Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/notfound', [PagenotController::class, 'index']);
