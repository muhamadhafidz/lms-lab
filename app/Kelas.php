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

    public function user()
    {
        return $this->hasMany('App\User', 'kelas_id');
    }
}
