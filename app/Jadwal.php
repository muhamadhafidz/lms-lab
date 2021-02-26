<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'matkul_id', 'kelas_id', 'instruktur_id', 'hari', 'shift'
    ];

    protected $hidden = [
    ];

    protected $table = 'jadwal';

    public function absensi()
    {
        return $this->hasMany('App/Absensi', 'jadwal_id');
    }
}
