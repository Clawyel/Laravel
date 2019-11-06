<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class urun extends Model
{
    protected $primaryKey ="id";
    protected $table="uruns";
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'baslik','sira','fiyati','aciklama','resim',"slug"
    ];
    const CREATED_AT = "olusturma_tarihi";
    const UPDATED_AT = "guncelleme_tarihi";
   /* public function urunler()
    {
        return $this->belongsToMany('App\Entities\urun');
    }*/
    public function kategoriler()
    {
        return $this->belongsToMany('App\Entities\kategori','kategori_uruns','urunler_id','kategoriler_id');
    }
}
