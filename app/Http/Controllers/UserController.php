<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facedes\Storage;
// use App\Models\Pelanggan;


class UserController extends Controller
{
    //
    public function index(){
        $user = DB::table('users')->get();
        return view('admin.user.index', compact('user'));
    }
    public function show(){
        // $pelanggan = DB::table('pelanggan')->get();
        $user = User::findOrFail(Auth::id());
        return view('admin.user.profile', compact('user'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|unique:users,email,' . $id . ',id',
            'old_password' => 'nullable|string',
            'password' => 'nullable|required_with:old_password|string|confirmed|min:6',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role' => 'nullable|string'
        ]);
    
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
    
        if ($request->filled('old_password')) {
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->password);
            } else {
                return back()
                    ->withErrors(['old_password' => __('Tolong Periksa Password')])
                    ->withInput();
            }
        }
    
        if ($request->hasFile('foto')) {
            if ($user->foto && file_exists(public_path('uploads/foto/' . $user->foto))) {
                // Hapus foto lama jika ada
                unlink(public_path('uploads/foto/' . $user->foto));
            }
    
            $file = $request->file('foto');
            $fileName = $file->hashName();
            $file->move(public_path('uploads/foto/'), $fileName);
            $user->foto = $fileName;
        }
    
        $user->role = $request->role;
        $user->save();
    
        return back()->with('status', 'Profil berhasil diperbarui!');
    }
    
    
}
