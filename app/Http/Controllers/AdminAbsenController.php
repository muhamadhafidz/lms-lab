<?php

namespace App\Http\Controllers;

use App\Absensi;
use App\Bap;
use Illuminate\Http\Request;

class AdminAbsenController extends Controller
{
    public function index()
    {
        $data = Bap::with('jadwal.matkul')->get();
        $absensi = Absensi::get();
        // dd($absensi);
        return view('admin.pages.absensi.index', [
            'data' => $data,
            'absensi' => $absensi
        ]);
    }

    public function absen(Request $request)
    {
        Absensi::create([
            'user_id' => 1,
            'bap_id' => 2,
            'status' => 'instruktur',
        ]);
        return redirect()->route('admin.absensi.index');
    }
}
