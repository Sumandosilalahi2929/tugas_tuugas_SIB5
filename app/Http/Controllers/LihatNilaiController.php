<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LihatNilaiController extends Controller
{
    //
    public function dataMahasiswa(){
        $mhs1 = 'lino'; $asal1 = 'Jakarta';
        $mhs2 = 'bruno'; $asal2 = 'Papua';
        return view('coba.data ', compact('mhs1','mhs2','asal1','asal2'));
    }
}
