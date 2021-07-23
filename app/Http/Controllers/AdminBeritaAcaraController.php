<?php

namespace App\Http\Controllers;

use Alert;
use App\Absensi;
use App\Bap;
use App\Jadwal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminBeritaAcaraController extends Controller
{
    public function index()
    {
        
        $asistenUser = Auth::user()->asisten()->get();
        $instrukturUser = Auth::user()->instruktur()->get();
        $activeUser = $asistenUser->merge($instrukturUser);
        // dd($new);
        $jdwl_id = [];
        foreach ($activeUser as $usr) {
                if(!in_array($usr->jadwal_id, $jdwl_id)){
                    $jdwl_id[] = $usr->jadwal_id;
                }
            // }
            // foreach( $usr->instruktur as $ins){
            //     if(!in_array($ins->jadwal_id, $jdwl_id)){
            //         $jdwl_id[] = $ins->jadwal_id;
            //     }
            // }
        }
        // dd($jdwl_id);
        $data = Jadwal::with('matkul', 'kelas', 'instruktur.user', 'asisten.user')->whereIn('id', $jdwl_id)->get();
        // dd($cek);
        return view('admin.pages.berita-acara.index', [
            'data' => $data
        ]);
    }

    public function show($id)
    {
        // $data = Bap::where('jadwal_id', $id)->get();
        $uid = Auth::user()->id;
        // dd($uid);
        $jadwal = Jadwal::with('instruktur.user', 'asisten.user', 'bap.absensi')->findOrFail($id);
        // dd($jadwal);
        // if ($jadwal->asisten->where('user_id', $uid)) {
        //     dd('ada');
        // }
        // dd('gada');
        if ($jadwal->asisten->where('user_id', $uid)->isEmpty() && $jadwal->instruktur->first()->user->id != $uid) {
            return redirect()->route('admin.berita-acara.index');
        }

        return view('admin.pages.berita-acara.show', [
            'jadwal' => $jadwal,
            'id' => $id
        ]);
    }
    
    public function create($id)
    {
        $jadwal = Jadwal::with('matkul')->findOrFail($id);
        return view('admin.pages.berita-acara.create', [
            'id' => $id,
            'jadwal' => $jadwal,
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
        Alert::success('Berita acara berhasil dibuat', '');
        return redirect()->route('admin.berita-acara.show', $id);
    }

    public function edit($id, $bapid)
    {
        $item = Bap::with('jadwal.matkul')->findOrFail($bapid);

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
        Alert::success('Berita acara berhasil diubah', '');
        return redirect()->route('admin.berita-acara.show', $id);
    }
    public function selesai(Request $request, $id, $bapid)
    {
        Bap::findOrFail($bapid)->update([
            'status' => 'selesai'
        ]);
        Alert::success('Berita acara berhasil diubah', '');
        return redirect()->route('admin.berita-acara.show', $id);
    }
    public function delete(Request $request, $id, $bapid)
    {
        Bap::findOrFail($bapid)->delete();
        Absensi::where('bap_id', $bapid)->delete();
        Alert::success('Berita acara berhasil dihapus', '');
        return redirect()->route('admin.berita-acara.show', $id);
    }
}
