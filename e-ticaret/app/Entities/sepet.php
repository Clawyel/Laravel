<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class sepet extends Model
{
    protected $primaryKey ="id";
    protected $table="sepets";
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'kullaniciID','siparisDurum'
    ];
    const CREATED_AT = "olusturma_tarihi";
    const UPDATED_AT = "guncelleme_tarihi";
}
