<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class BerandaController extends Controller
{
    public function index()
    {
        // Mengambil data produk dengan jenis_produk_id sebesar 
        $produk = Produk::where('jenis_produk_id', 4)->get();

        // Mengirim data produk ke tampilan beranda.blade.php
        return view('beranda', ['produk' => $produk]);
    }
}
