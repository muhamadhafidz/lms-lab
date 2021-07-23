<?php

namespace App\Http\Controllers;

use App\Absensi;
use App\User;
use Illuminate\Http\Request;

class AdminRekapAbsensiController extends Controller
{
    public function index()
    {
        $data = User::with(['absensi'])->get();
        return view('admin.pages.rekap-absensi.index',[
            'data' => $data,
        ]);
    }
    public function getRekap(Request $request)
    {
        $tgl = $request->tgl;
        $arr = explode(" - ",$tgl);
        $min = date('Y-m-d', strtotime($arr[0]));
        $max = date('Y-m-d', strtotime($arr[1]. ' +1 day'));
        // dd($max);
        $data = User::with(['absensi' => function($q) use ($max, $min){
            $q->where('created_at', '<=', $max)->where('created_at', '>=', $min);
        }])->get();
        // dd($data);
        return view('admin.pages.rekap-absensi.index',[
            'data' => $data,
            'tgl' => $tgl
        ]);
    }
}
