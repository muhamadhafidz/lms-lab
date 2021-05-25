<?php

namespace App\Http\Controllers;

use App\Asisten;
use App\Instruktur;
use App\Jadwal;
use App\Kelas;
use App\Matkul;
use App\User;
use Illuminate\Http\Request;
use Builder;

class AdminJadwalController extends Controller
{
    public function index()
    {
        $data = Jadwal::with(['instruktur.user','asisten.user', 'kelas', 'matkul'])->get();
        // dd($data);
        $data_senin = Jadwal::where('hari', 'senin')->count();
        $senin = 'sedia';
        $selasa = 'sedia';
        $rabu = 'sedia';
        $kamis = 'sedia';
        $jumat = 'sedia';
        if ($data_senin == 4) {
            $senin = 'full';
        }
        $data_selasa = Jadwal::where('hari', 'selasa')->count();
        if ($data_selasa == 4) {
            $selasa = 'full';
        }
        $data_rabu = Jadwal::where('hari', 'rabu')->count();
        if ($data_rabu == 4) {
            $rabu = 'full';
        }
        $data_kamis = Jadwal::where('hari', 'kamis')->count();
        if ($data_kamis == 4) {
            $kamis = 'full';
        }
        $data_jumat = Jadwal::where('hari', 'jumat')->count();
        if ($data_jumat == 4) {
            $jumat = 'full';
        }
        $kelas = Kelas::get();
        $matkul = Matkul::get();
        $users = User::get();
        return view('admin.pages.jadwal.index',[
            'data' => $data,
            'kelas' => $kelas,
            'matkul' => $matkul,
            'users' => $users,
            'senin' => $senin,
            'selasa' => $selasa,
            'rabu' => $rabu,
            'kamis' => $kamis,
            'jumat' => $jumat,
        ]);
    }

    // public function create()
    // {
    //     return view('admin.pages.jadwal.create');
    // }

    public function getMatkul(Request $request)
    {
        $value = $request->value;
        $data = Jadwal::select('matkul_id')->where('kelas_id', $value)->get();
        $result = "";
        $id_matkul = [];
        foreach ($data as $item)
        {
            $id_matkul[] = $item->matkul_id;
        }
        $matkul = Matkul::whereNotIn('id', $id_matkul)->get();
        foreach ($matkul as $mtkl) {
            $result .= '<option value="'.$mtkl->id.'">'.$mtkl->nama_matkul.'</option>';
        }
        echo $result;
    }

    public function getShift(Request $request)
    {
        $value = $request->value;
        $data = Jadwal::where('hari', $value)->get();
        $result = "";
        $shift = [];
        
        if($data->isEmpty()){
            for ($i=1; $i <= 4 ; $i++) { 
                $result .= '<option value="'.$i.'">'.$i.'</option>';
            }
        }else {
            foreach ($data as $item)
            {
                $shift[] = $item->shift;
            }
            
            $len_shift = count($shift);
            for ($i=1; $i <= 4 ; $i++) { 
                $a = 0;
                $b = [];
                for ($j=0; $j < $len_shift ; $j++) { 
                    if ($i == $shift[$j]) {
                        $a = 0;
                        break;
                    }else {
                        $a = $i;
                    }
                }
                if ($a != 0 ){
                    $result .= '<option value="'.$a.'">'.$a.'</option>';
                }
            }
        }
        
        // // $matkul = Matkul::whereNotIn('id', $id_matkul)->get();
        // foreach ($b as $x) {
        //     $result .= '<option value="'.$x.'">'.$x.'</option>';
        // }
        echo $result;
    }

    public function getAsisten(Request $request)
    {
        // $asisten = Asisten::with('user')->whereNotIn('jadwal_id', $request->id_matkul)->get();
        // $user = find(5);
        $result = '';
        $id_asisten = [];
        $jadwal = Jadwal::with('asisten')->find($request->id_jadwal);
        foreach ($jadwal->asisten as $jdwl) {
            $id_asisten[] = $jdwl->user_id;
        }
        $id_instruktur = $request->id_instruktur;
        $user = User::whereDoesntHave('asisten', function ($query) use($id_asisten){
            $query->whereIn('user_id', $id_asisten);
        })->whereDoesntHave('instruktur', function ($query) use($id_instruktur){
            $query->where('user_id', $id_instruktur);
        })->get();
        $result .= '<option>Pilih Asisten</option>';
        foreach ($user as $usr) {
            $result .= '<option value="'.$usr->id.'">'.$usr->nama.'</option>';
        }
        // echo $asisten->count();
        // $result = [];
        // if (!$asisten->isEmpty()) {
        //     foreach ($asisten as $getAsisten) { 
        //         $result[] = $getAsisten->user->nama;
        //     }
        // }
        // dump($result);
        echo $result;
    }

    public function storeAsisten(Request $request)
    {
        $item = $request->validate([
            'asisten' => 'required',
            'jadwal_id' => 'required',
        ]);
        $item['user_id'] = $item['asisten'];
        // $item['matkul_id'] = $item['matkul'];
        // $item['kelas_id'] = $item['kelas'];
        // unset($item['matkul']);
        // unset($item['kelas']);
        Asisten::create($item);
        // $instruktur['user_id'] = $item['instruktur'];
        // $instruktur['jadwal_id'] = $jadwal['id'];
        // Instruktur::create($instruktur);
        return redirect()->route('admin.jadwal.index');
    }

    public function store(Request $request)
    {
        $item = $request->validate([
            'kelas' => 'required',
            'matkul' => 'required',
            'hari' => 'required',
            'shift' => 'required',
            'instruktur' => 'required',
        ]);
        // dd("wow");
        $item['matkul_id'] = $item['matkul'];
        $item['kelas_id'] = $item['kelas'];
        unset($item['matkul']);
        unset($item['kelas']);
        $jadwal = Jadwal::create($item);
        $instruktur['user_id'] = $item['instruktur'];
        $instruktur['jadwal_id'] = $jadwal['id'];
        Instruktur::create($instruktur);
        return redirect()->route('admin.jadwal.index');
    }

    public function delete(Request $request, $id)
    {
        $item = Jadwal::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.jadwal.index');
    }
}
