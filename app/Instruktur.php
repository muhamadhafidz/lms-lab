<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruktur extends Model
{
    protected $fillable = [
        'user_id'
    ];

    protected $hidden = [
    ];

    protected $table = 'instruktur';

    public function asisten()
    {
        return $this->hasMany('App/Asisten', 'instruktur_id');
    }
}
