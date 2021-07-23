<?php

namespace App\Http\Controllers;

use Alert;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Support\Facades\Hash;

class AdminProfilController extends Controller
{
    public function index()
    {
        // $data = User::with('kelas')->first();
        return view('admin.pages.profil.index');
    }


    public function edit()
    {
        
        $data = Auth::user();

        return view('admin.pages.profil.edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {
        $item = $request->validate([
            'nama' => 'required',
            'npm' => 'required|numeric|unique:App\User,npm,'.Auth::user()->id,
            'email' => 'required|email|unique:App\User,email,'.Auth::user()->id,
            'no_telp' => 'numeric|unique:App\User,no_telp,'.Auth::user()->id,
        ]);

        $data = Auth::user();
        
        $data->update($item);
        Alert::success('Profil berhasil diubah', '');
        return redirect()->route('admin.profil.index');
    }

    public function updateFoto(Request $request)
    {
        $item = $request->validate([
            'file_foto' => 'required',
        ]);
        
        $file = $request->file('file_foto');
        if ($file->getClientOriginalExtension() == "jpg" || $file->getClientOriginalExtension() == "jpeg" || $file->getClientOriginalExtension() == "png") {
            // dd($file);
            $user = Auth::user();
            if ($user->dir_foto != 'assets/admin/img/users/default/user-avatar.jpg') {
                File::delete($user->dir_foto);
            }
            $file_location = "assets/admin/img/users";
            $file_name = str_replace(" ", "",$user->npm).".".$file->getClientOriginalExtension();
            $stored_file = $file->move($file_location, $file_name);
            $item['dir_foto'] = $stored_file->getPathname();
        
            $data = Auth::user();
            $data->update($item);
            Alert::success('Foto berhasil diganti', '');
        }else {
            Alert::error('Foto gagal diganti', 'File harus berupa foto ( jpg, jpeg, png)');
        }
        
        return redirect()->route('admin.profil.index');
    }

    public function updatePassword(Request $request)
    {
        $item = $request->validate([
            'password_old' => 'required|min:8|max:16',
            'password_new' => 'required|min:8|max:16',
            'password_confirm' => 'required',
        ]);

        $activeUser = Auth::user();
        if ($item['password_new'] == $item['password_confirm']) {
            if (Hash::check($item['password_old'],$activeUser->password)) {
                $activeUser->update([
                    'password' => Hash::make($item['password_new']),
                ]);
                Alert::success('Password berhasil diubah', '');
            }else {
                Alert::error('Gagal merubah password', 'password lama yang anda masukan salah');
            }
        }else {
            Alert::error('Gagal merubah password', 'konfirmasi password tidak cocok');
        }
        
        return redirect()->route('admin.profil.index');
        

    }
}
