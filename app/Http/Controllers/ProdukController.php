<?php

namespace App\Http\Controllers;
use App\Models\Produk;
Use App\Models\Jenis_Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //porduk berelasi dengan Jenis_Produk
        $produk = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
        ->select('produk.*','jenis_produk.nama as jenis')
        ->get();
        return view ('admin.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $jenis_produk = DB::table('jenis_produk')->get();
        return view ('admin.produk.create',compact('jenis_produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'kode'=> 'required|unique:produk|max:10',
            'nama'=> 'required|max:45',
            'harga_beli'=> 'required|numeric',
            'harga_jual'=> 'required|numeric',
            'stok' => 'required|numeric',
            'min_stok'=> 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,jpeg,gif,png,svg|max:2048',
            'deskripsi'=> 'nullable|string|min:10',
            'jenis_produk_id'=> 'required|integer' 
        ],
        [
            'kode.max' => 'Kode maksimal 10 karakter',
            'kode.required' => 'Kode Wajib diisi',
            'kode.unique' => 'Kode Sudah terisi pada data lain',
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 45 karakter',
            'harga_beli.required' => 'Harga beli harus diisi',
            'harga_beli.numeric' => 'Harus angka',
            'harga_jual.required' => 'Harga jual harus diisi',
            'harga_jual.numeric' => 'Harus angka',
            'stok.required' => 'Stok harus diisi',
            'min_stok.required' => 'Minimal stok harus diisi',
            'foto.max' => 'Maksimal 2 MB',
            'foto.image'=> 'File eksternal harus jpg, jpeg, gif, svg',
        ]    
    );
        //proses upload foto
        if(!empty($request->foto)){
            $fileName = 'foto-'. uniqid().'.' . $request->foto->extension();
            $request->foto->move(public_path('admin/img'), $fileName);
        }else{
            $fileName = '';
        }
        //
        DB::table('produk')->insert([
            'kode'=>$request->kode,
            'nama'=>$request->nama,
            'harga_beli'=>$request->harga_beli,
            'harga_jual'=>$request->harga_jual,
            'stok'=>$request->stok,
            'min_stok'=>$request->min_stok,
            'foto'=>$fileName,
            'deskripsi'=>$request->deskripsi,
            'jenis_produk_id'=>$request->jenis_produk_id,
        ]);
        return redirect('admin/produk');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $produk = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
        ->select('produk.*','jenis_produk.nama as jenis')
        ->where('produk.id',$id)
        ->get();
        return view ('admin.produk.detail', compact('produk'));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $jenis_produk = DB::table('jenis_produk')->get();
        $produk = DB::table('produk')->where('id',$id)->get();
        return view ('admin.produk.edit',compact('produk','jenis_produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=> 'required|max:45',
            'harga_beli'=> 'required|numeric',
            'harga_jual'=> 'required|numeric',
            'stok' => 'required|numeric',
            'min_stok'=> 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,jpeg,gif,png,svg|max:2048',
            'deskripsi'=> 'nullable|string|min:10',
            'jenis_produk_id'=> 'required|integer', 
        ],
        [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 45 karakter',
            'harga_beli.required' => 'Harga beli harus diisi',
            'harga_beli.numeric' => 'Harus angka',
            'harga_jual.required' => 'Harga jual harus diisi',
            'harga_jual.numeric' => 'Harus angka',
            'stok.required' => 'Stok harus diisi',
            'min_stok.required' => 'Minimal stok harus diisi',
            'foto.max' => 'Maksimal 2 MB',
            'foto.image'=> 'File eksternal harus jpg, jpeg, gif, svg',
        ]    
    );


 

         // Update Foto
         $foto = DB::table('produk')->select('foto')->where('id', $request->id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->foto;
        }
        if(!empty($request->foto)){
            //jika ada foto lama maka hapus fotonya 
        if(!empty($namaFileFotoLama->foto)) unlink('admin/img'.$namaFileFotoLama->foto);
        //proses ganti foto
        $fileName = 'foto-'.$request->id . '.' . $request->foto->extension();
        $request->foto->move(public_path('admin/img'), $fileName);
        } else {
            $fileName = '';
        }
 
         // Update data produk
         DB::table('produk')->where('id', $request->id)->update([
             'kode' => $request->kode,
             'nama' => $request->nama,
             'harga_beli' => $request->harga_beli,
             'harga_jual' => $request->harga_jual,
             'stok' => $request->stok,
             'min_stok' => $request->min_stok,
             'foto' => $fileName,
             'deskripsi' => $request->deskripsi,
             'jenis_produk_id' => $request->jenis_produk_id,
         ]);
        return redirect('admin/produk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('produk')->where('id',$id)->delete();
        return redirect('admin/produk');
    }
}
