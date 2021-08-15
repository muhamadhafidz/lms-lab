<?php

namespace App\Http\Controllers;

use Alert;
use App\Jadwal;
use App\Kelas;
use Illuminate\Http\Request;

class AdminKelasController extends Controller
{
    public function index()
    {
        $data = Kelas::get();
        return view('admin.pages.kelas.index', [
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('admin.pages.kelas.create');
    }

    public function store(Request $request)
    {
        $item = $request->validate([
            'kelas' => 'required',
            'jurusan' => 'required|not_in:pilih',
            'jumlah_mhs' => ''
        ]);
        // if ($request->jurusan == "0") {
        //     return redirect()->route('admin.kelas.create');
        // }

        $item['jumlah_mhs'] = $item['jumlah_mhs'] == null ? 0 : $item['jumlah_mhs'];

        Kelas::create($item);
        Alert::success('Kelas berhasil ditambahkan', '');
        return redirect()->route('admin.kelas.index');
    }

    public function edit($id)
    {
        $data = Kelas::findOrFail($id);
        return view('admin.pages.kelas.edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = $request->validate([
            'kelas' => 'required',
            'jurusan' => 'required',
            'jumlah_mhs' => ''
        ]);
        $item['jumlah_mhs'] = $item['jumlah_mhs'] == null ? 0 : $item['jumlah_mhs'];
        $data = Kelas::findOrFail($id);
        $data->update($item);
        Alert::success('Kelas berhasil diubah', '');
        return redirect()->route('admin.kelas.index');
    }

    public function delete(Request $request, $id)
    {
        $jadwal = Jadwal::where('kelas_id', $id)->count();

        if ($jadwal > 0 ) {
            Alert::warning('Kelas gagal dihapus', 'Kelas telah terdaftar pada jadwal aktif');
        }else {
            $item = Kelas::findOrFail($id);
            $item->delete();
            Alert::success('Kelas berhasil dihapus', '');
        }
        
        return redirect()->route('admin.kelas.index');
    }
}
