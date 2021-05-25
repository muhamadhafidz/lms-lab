<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asisten extends Model
{
    protected $fillable = [
        'user_id', 'jadwal_id'
    ];

    protected $hidden = [
    ];

    protected $table = 'asisten';

    public function jadwal()
    {
        return $this->belongsTo('App\Jadwal');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
