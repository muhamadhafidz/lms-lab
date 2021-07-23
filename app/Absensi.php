<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = [
        'jadwal_id', 'user_id', 'bap_id', 'status'
    ];

    protected $hidden = [
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    protected $table = 'absensi';
}
