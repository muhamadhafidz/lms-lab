<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = [
        'kelas', 'jurusan', 'jumlah_mhs'
    ];

    protected $hidden = [
    ];

    protected $table = 'kelas';
}
