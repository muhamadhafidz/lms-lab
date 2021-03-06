<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'npm', 'kelas_id', 'no_telp', 'email', 'password', 'roles', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    
    public function asisten()
    {
        return $this->hasMany('App\Asisten', 'user_id');
    }

    public function instruktur()
    {
        return $this->hasMany('App\Instruktur', 'user_id');
    }

    public function absensi()
    {
        return $this->hasMany('App\Absensi', 'user_id');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }
}
