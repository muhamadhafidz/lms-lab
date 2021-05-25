<?php

namespace App\Http\Controllers;

use App\Absensi;
use App\Bap;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AdminAbsenController extends Controller
{
    public function index()
    {
        $data = Bap::with('jadwal.matkul')->get();
        $absensi = Absensi::get();
        // $asisten = Auth::user();

        // dd($asisten);
        return view('admin.pages.absensi.index', [
            'data' => $data,
            'absensi' => $absensi
        ]);
    }

    public function absen(Request $request, $user, $bap)
    {   
        
        $status = Bap::with('jadwal.instruktur')->findOrFail($bap);
        $status = $status->jadwal->instruktur->user_id == $user ? 'instruktur' : 'asisten';
        Absensi::create([
            'user_id' => $user,
            'bap_id' => $bap,
            'status' => $status,
        ]);

        return redirect()->route('admin.absensi.index');
    }

    public function izin(Request $request, $bap, $user)
    {
        $asisten = $request->validate([
            'asisten' => 'required'
        ]);

        $cek = Absensi::where('bap_id', $bap)->where('user_id', $asisten)->first();

        if ( $cek != null ) {

            $cek->update([
                'status' => 'instruktur'
            ]);
            
        }else {
            Absensi::create([
                'user_id' => $asisten,
                'bap_id' => $bap,
                'status' => 'instruktur',
            ]);
        }
        Absensi::create([
            'user_id' => $user,
            'bap_id' => $bap,
            'status' => 'izin',
        ]);

        return redirect()->route('admin.absensi.index');
    }

    public function show($user, $bap)
    {
        $data = User::findOrFail($user)->instruktur()->with('asisten.user')->first();
        
        return view('admin.pages.absensi.show', [
            'data' => $data,
            'bap' => $bap
        ]);
    }
}
