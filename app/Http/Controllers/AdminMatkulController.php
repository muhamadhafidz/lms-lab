<?php

namespace App\Http\Controllers;

use App\Matkul;
use File;
use Illuminate\Http\Request;

class AdminMatkulController extends Controller
{
    public function index()
    {
        $data = Matkul::get();
        return view('admin.pages.matkul.index', [
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('admin.pages.matkul.create');
    }

    public function store(Request $request)
    {
        $item = $request->validate([
            'nama_matkul' => 'required',
            'file_sap' => 'required',
        ]);
        $file = $request->file('file_sap');
        // dd($file);
        $file_name = str_replace(" ", "",$item['nama_matkul'])."-SAP".".".$file->getClientOriginalExtension();
        $file_location = "sap";
        $stored_file = $file->move($file_location, $file_name);

        $item['nama_file_sap'] = $stored_file->getPathname();
        Matkul::create($item);

        return redirect()->route('admin.matkul.index');
    }

    public function edit($id)
    {
        $data = Matkul::findOrFail($id);
        return view('admin.pages.matkul.edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = $request->validate([
            'nama_matkul' => 'required',
            'file_sap' => '',
        ]);
        $data = Matkul::findOrFail($id);

        if (isset($item['file_sap']) ) {
            
            File::delete($data->nama_file_sap);

            $file = $request->file('file_sap');
            $file_name = str_replace(" ", "",$item['nama_matkul'])."-SAP".".".$file->getClientOriginalExtension();
            $file_location = "sap";
            $stored_file = $file->move($file_location, $file_name);

            $item['nama_file_sap'] = $stored_file->getPathname();
        }
        
        $data->update($item);

        return redirect()->route('admin.matkul.index');
    }

    public function delete(Request $request, $id)
    {
        $item = Matkul::findOrFail($id);
        File::delete($item->nama_file_sap);
        $item->delete();

        return redirect()->route('admin.matkul.index');
    }

    public function download($id)
    {
        $file = Matkul::findOrFail($id);
        return response()->download($file->nama_file_sap);
        return redirect()->back();
    }
}
