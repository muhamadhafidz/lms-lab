<?php

namespace App\Http\Controllers;

use Alert;
use App\Absensi;
use App\Bap;
use App\Instruktur;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAbsenController extends Controller
{
    public function index()
    {
        $data = Bap::with('jadwal.matkul', 'jadwal.asisten', 'jadwal.instruktur')->get();
        $absensi = Absensi::get();
        // $asisten = Auth::user();

        // dd($asisten);
        return view('admin.pages.absensi.index', [
            'data' => $data,
            'absensi' => $absensi
        ]);
    }

    public function absen(Request $request, $bap)
    {   
        
        $status = Bap::with('jadwal.instruktur')->findOrFail($bap);
        $user = Auth::user()->id;
        $status = $status->jadwal->instruktur->first()->user_id == $user ? 'instruktur' : 'asisten';
        Absensi::create([
            'user_id' => $user,
            'bap_id' => $bap,
            'status' => $status,
        ]);
        Alert::success('Absensi berhasil dilakukan', '');    
        return redirect()->route('admin.absensi.index');
    }

    public function izin(Request $request, $bap)
    {
        $asisten = $request->validate([
            'asisten' => 'required'
        ]);

        $cek = Absensi::where('bap_id', $bap)->where('user_id', $asisten)->first();
        $user = Auth::user()->id;
        if ( $cek != null ) {

            $cek->update([
                'status' => 'instruktur'
            ]);
            
        }else {
            // dd($cek);
            Absensi::create([
                'user_id' => $asisten['asisten'],
                'bap_id' => $bap,
                'status' => 'instruktur',
            ]);
            
        }
        Absensi::create([
            'user_id' => $user,
            'bap_id' => $bap,
            'status' => 'izin',
        ]);
        Alert::success('Anda telah izin untuk pertemuan ini', 'Instruktur telah berhasil diganti');
        return redirect()->route('admin.absensi.index');
    }

    public function show($user, $bap)
    {
        // $data = User::findOrFail($user)->instruktur()->with('asisten.user')->first();
        $data = Instruktur::with('jadwal.asisten.user')->where('user_id', $user)->first();
        // dd($data);
        return view('admin.pages.absensi.show', [
            'data' => $data,
            'bap' => $bap
        ]);
    }
}
