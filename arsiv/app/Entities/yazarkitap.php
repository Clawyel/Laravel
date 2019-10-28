<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class yazarkitap extends Model
{
    protected $table = "yazarkitaps";
    protected $primaryKey ="id";
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'kitapID','yazarID'
    ];
    const CREATED_AT = "olusturma_tarihi";
    const UPDATED_AT = "guncelleme_tarihi";
}
