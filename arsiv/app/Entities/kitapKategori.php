<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class kitapKategori extends Model
{
    protected $table = "kitap_kategoris";
    protected $primaryKey ="id";
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'kitaplar_id','kategoriler_id'
    ];
    const CREATED_AT = "olusturma_tarihi";
    const UPDATED_AT = "guncelleme_tarihi";
}
