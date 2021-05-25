<?php

namespace App\Http\Controllers;

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
            'jurusan' => 'required',
            'jumlah_mhs' => ''
        ]);
        $item['jumlah_mhs'] = $item['jumlah_mhs'] == null ? 0 : $item['jumlah_mhs'];

        Kelas::create($item);

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

        return redirect()->route('admin.kelas.index');
    }

    public function delete(Request $request, $id)
    {
        $item = Kelas::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.kelas.index');
    }
}
