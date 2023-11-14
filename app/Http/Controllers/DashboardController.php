<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kartu;
use App\Models\Pelanggan;
use App\Models\Jenis_Produk;
use DB;

class DashboardController extends Controller
{
    //fungsi index
    public function index(){
        
        $produk = produk::count();
        $pelanggan = Pelanggan::count();
        $jenis_produk = Jenis_Produk::count();
        $kartu = Kartu::count();
        $jenis_kelamin = DB::table('pelanggan')
        ->selectRaw('jk, count(jk) as jumlah')
        ->groupBy('jk')
        ->get();
        $hitung_harga = DB::table('produk')->select('nama', 'harga_jual')->get();
        return view('admin.dashboard', compact('produk', 'pelanggan', 'jenis_produk', 'kartu', 'jenis_kelamin','hitung_harga'));//mengarahkan ke file dashboard yang ada didalam admin

    }
}
