<?php

namespace App\Models;

use App\Models\Kartu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use RealRashid\SweetAlert\Facades\Alert;


class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';
    protected $fillable = [
        'kode','nama','jk','tmp_lahir','tgl_lahir','email','kartu_id'
    ];
    public $timestamps =false;

    //relasi one to one ke table yang berhubungan dengan pelanggan
    public function kartu(){
        return $this->belongsTo(Kartu::class);
    }
}
