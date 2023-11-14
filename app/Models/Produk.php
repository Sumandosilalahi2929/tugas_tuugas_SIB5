<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jenis_Produk;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = [
        'kode','nama','harga_beli','harga_jual','stok','min_stok','jenis_produk_id'
    ];
    public $timestamps =false;
    //relasi one to many ke table yang berhubungan dengan produk
    public function jenis_produk(){
        return $this->belongsTo(Jenis_Produk::class);
    }
}
