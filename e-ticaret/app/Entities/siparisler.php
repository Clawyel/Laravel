<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class siparisler extends Model
{
    protected $primaryKey ="id";
    protected $table="siparislers";
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'adSoyad','adres','adresTarif','telefon','telefonYedek',"odemeTuru",'onayDurum','teslimDurum','email','sepetID','toplamTutar','siparisTuru','urunler'
    ];
    const CREATED_AT = "olusturma_tarihi";
    const UPDATED_AT = "guncelleme_tarihi";
}
