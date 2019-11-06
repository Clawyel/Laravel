<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class kullaniciDetay extends Model
{
    protected $table = "kullanici_detays";
    protected $primaryKey ="id";
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'userID','adresBaslik','adres','adresTarif','telefon','telefonYedek'
    ];
    const CREATED_AT = "olusturma_tarihi";
    const UPDATED_AT = "guncelleme_tarihi";
    public function kullanici()
    {
        return $this->hasOne('App\Entities\User','id','userID');
    }
}
