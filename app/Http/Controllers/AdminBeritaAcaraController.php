<?php

namespace App\Http\Controllers;

use App\Bap;
use App\Jadwal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminBeritaAcaraController extends Controller
{
    public function index()
    {
        $data = Jadwal::with('matkul', 'kelas', 'instruktur.user', 'instruktur.asisten')->get();
        // dd($data);
        return view('admin.pages.berita-acara.index', [
            'data' => $data
        ]);
    }

    public function show($id)
    {
        $data = Bap::where('jadwal_id', $id)->get();
        $uid = Auth::user()->id;
        // dd($uid);
        $jadwal = Jadwal::with('instruktur.asisten')->findOrFail($id)->instruktur;
        // dd( $uid);
        
        if ($jadwal->user_id !== $uid && $jadwal->asisten->where('user_id', $uid)->count() == 0) {
            return redirect()->route('admin.berita-acara.index');
        }
        return view('admin.pages.berita-acara.show', [
            'data' => $data,
            'id' => $id
        ]);
    }
    
    public function create($id)
    {
        return view('admin.pages.berita-acara.create', [
            'id' => $id
        ]);

    }

    public function store(Request $request, $id)
    {
        $items = $request->validate([
            'pertemuan' => 'required',
            'alfa' => 'required',
            'izin' => 'required',
            'sakit' => 'required',
            'lap_awal' => '',
            'lap_akhir' => '',
        ]);
        $items['jadwal_id'] = $id;
        if ( $items['lap_awal'] == null){
            $items['lap_awal'] = '-';
        }
        if ( $items['lap_akhir'] == null){
            $items['lap_akhir'] = '-';
        }
        Bap::create($items);

        return redirect()->route('admin.berita-acara.show', $id);
    }

    public function edit($id, $bapid)
    {
        $item = Bap::findOrFail($bapid);

        return view('admin.pages.berita-acara.edit', [
            'id' => $id,
            'bapid' => $bapid,
            'item' => $item
        ]);
    }

    public function update(Request $request, $id, $bapid)
    {
        $items = $request->validate([
            'pertemuan' => 'required',
            'alfa' => 'required',
            'izin' => 'required',
            'sakit' => 'required',
            'lap_awal' => '',
            'lap_akhir' => '',
        ]);
        $items['jadwal_id'] = $id;
        Bap::findOrFail($bapid)->update($items);

        return redirect()->route('admin.berita-acara.show', $id);
    }

    public function delete(Request $request, $id, $bapid)
    {
        Bap::findOrFail($bapid)->delete();
        return redirect()->route('admin.berita-acara.show', $id);
    }
}
