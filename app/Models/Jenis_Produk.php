<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Produk extends Model
{
    use HasFactory;
    //memanggil table
    protected $table = 'jenis_produk';
    //mapping kolom dan field
    protected $fillable = ['nama'];
    //relasi antara table

    public function produk(){
        return $this->hasMany(Produk::class);
    }
}
