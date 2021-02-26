<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bap extends Model
{
    protected $fillable = [
        'pertemuan', 'alfa', 'izin', 'sakit', 'lap_awal', 'lap_akhir', 'tanggal'
    ];

    protected $hidden = [
    ];

    protected $table = 'bap';

    public function absensi()
    {
        return $this->hasMany('App/Absensi', 'bap_id');
    }
}
