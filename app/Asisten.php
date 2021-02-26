<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asisten extends Model
{
    protected $fillable = [
        'user_id', 'instruktur_id'
    ];

    protected $hidden = [
    ];

    protected $table = 'asisten';

    
}
