<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    protected $fillable = [
        'nama_matkul', 'nama_file_sap'
    ];

    protected $hidden = [
    ];

    protected $table = 'matkul';

    public function jadwal()
    {
        return $this->hasMany('App\Jadwal', 'matkul_id');
    }
}
