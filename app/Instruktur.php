<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruktur extends Model
{
    protected $fillable = [
        'user_id', 'jadwal_id'
    ];

    protected $hidden = [
    ];

    protected $table = 'instruktur';

    public function asisten()
    {
        return $this->hasMany('App\Asisten', 'instruktur_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function jadwal()
    {
        return $this->belongsTo('App\Jadwal');
    }
}
