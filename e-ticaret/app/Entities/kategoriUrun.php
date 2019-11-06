<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class kategoriUrun extends Model
{
    protected $table = "kategori_uruns";
    protected $primaryKey ="id";
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'urunler_id','kategoriler_id'
    ];
    const CREATED_AT = "olusturma_tarihi";
    const UPDATED_AT = "guncelleme_tarihi";
}
