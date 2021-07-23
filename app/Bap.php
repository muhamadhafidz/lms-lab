<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bap extends Model
{
    protected $fillable = [
        'pertemuan', 'alfa', 'izin', 'sakit', 'lap_awal', 'lap_akhir', 'jadwal_id', 'status'
    ];

    protected $hidden = [
    ];

    protected $table = 'bap';

    public function absensi()
    {
        return $this->hasMany('App\Absensi', 'bap_id');
    }

    public function jadwal()
    {
        return $this->belongsTo('App\Jadwal');
    }
}
