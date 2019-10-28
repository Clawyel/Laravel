<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class kitaplar extends Model
{
    //
    protected $primaryKey ="id";
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'baslik','sayfaSayisi'
    ];
    const CREATED_AT = "olusturma_tarihi";
    const UPDATED_AT = "guncelleme_tarihi";

    public function yazarlar()
    {
        return $this->belongsToMany('App\Entities\yazarlar','yazarkitaps');
    }


}
