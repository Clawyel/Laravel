<?php

namespace App\Entities;

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
        'name', 'email', 'password','yoneticimi','aktifmi'
    ];
    protected $hidden = ['password','activationcode'];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function detay()
    {
        return $this->hasMany('App\Entities\kullaniciDetay','userID','id');
    }
    public function kisisel()
    {
        return $this->belongsTo('App\Entities\kullaniciDetay','userID','id');
    }
}
