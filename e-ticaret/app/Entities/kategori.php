<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $primaryKey ="id";
    protected $table="kategoris";
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'baslik','sira'
    ];
    const CREATED_AT = "olusturma_tarihi";
    const UPDATED_AT = "guncelleme_tarihi";

    public function urunler()
    {
        return $this->belongsToMany('App\Entities\urun','kategori_uruns','kategoriler_id','urunler_id');
    }
}
