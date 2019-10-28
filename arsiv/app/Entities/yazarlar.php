<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class yazarlar extends Model
{
    //
    protected $primaryKey ="id";
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'baslik'
    ];
    const CREATED_AT = "olusturma_tarihi";
    const UPDATED_AT = "guncelleme_tarihi";

    public function kitaplar()
    {
        return $this->belongsToMany('App\Entities\kitaplar','yazarkitaps');
    }
}
