<?php

namespace App\Http\Controllers;

use Alert;
use App\Asisten;
use App\Instruktur;
use App\Mail\KirimAkunAsisten;
use App\Mail\KirimResetPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Mail;

class AdminAsistenController extends Controller
{
    public function index()
    {
        $data = User::get();
        return view('admin.pages.asisten.index', [
            'data' => $data
        ]);
    }

    // public function create()
    // {
    //     return view('admin.pages.kelas.create');
    // }

    public function store(Request $request)
    {
        $item = $request->validate([
            'nama' => 'required',
            'npm' => 'required|numeric|unique:App\User,npm',
            'email' => 'required|email|unique:App\User,email',
            'no_telp' => 'numeric|unique:App\User,no_telp',
            'dir_foto' => 'image|mimes:jpeg,jpg,png'
        ]);
        $pass = Str::random(8);
        $item['password'] = Hash::make($pass);
        $item['role'] = 'asisten';
        $item['active'] = 'y';
        
        $file = $request->file('dir_foto');
        // dd($file);
        if ($file == null) {
            $item['dir_foto'] = 'assets/admin/img/users/default/user-avatar.jpg';
        }else {
            $file_name = str_replace(" ", "",$item['npm']).".".$file->getClientOriginalExtension();
            $file_location = "assets/admin/img/users";
            $stored_file = $file->move($file_location, $file_name);
            $item['dir_foto'] = $stored_file->getPathname();
        }
        User::create($item);
        Mail::to($item['email'])->send(new KirimAkunAsisten($item, $pass));
        Alert::success('Akun asisten berhasil dibuat', 'Informasi akun telah dikirim ke email '.$item['email']);
        return redirect()->route('admin.asisten.index');
    }

    // public function edit($id)
    // {
    //     $data = Kelas::findOrFail($id);
    //     return view('admin.pages.kelas.edit', [
    //         'data' => $data
    //     ]);
    // }

    // public function update(Request $request, $id)
    // {
    //     $item = $request->validate([
    //         'kelas' => 'required',
    //         'jurusan' => 'required',
    //         'jumlah_mhs' => ''
    //     ]);
    //     $item['jumlah_mhs'] = $item['jumlah_mhs'] == null ? 0 : $item['jumlah_mhs'];
    //     $data = Kelas::findOrFail($id);
    //     $data->update($item);

    //     return redirect()->route('admin.kelas.index');
    // }

    public function delete(Request $request, $id)
    {
        $instruktur = Instruktur::where('user_id', $id)->count();
        if ($instruktur > 0) {
            Alert::warning('Gagal menghapus akun asisten', 'Asisten tersebut sedang menjadi instruktur praktikum');
        }else {
            $item = User::findOrFail($id);

            if ($item->dir_foto != 'assets/admin/img/users/default/user-avatar.jpg') {
                File::delete($item->dir_foto);
            }
            $item->delete();
            Alert::success('Akun asisten berhasil dihapus', '');
        }
        
        return redirect()->route('admin.asisten.index');
    }

    public function resetPassword(Request $request, $id)
    {
        $data = User::findOrFail($id)->toArray();
        $pass = Str::random(8);
        $data['pass'] = $pass;
        $data['password'] = Hash::make($pass);
        $user = User::findOrFail($id);
        $user->update([
            'password' => $data['password']
        ]);
        Mail::to($data['email'])->send(new KirimResetPassword($data));
        Alert::success('Reset password berhasil dilakukan', 'password telah terkirim ke email '.$data['email']);        
        return redirect()->route('admin.asisten.index');
    }
}
