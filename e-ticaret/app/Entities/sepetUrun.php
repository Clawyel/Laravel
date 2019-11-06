<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class sepetUrun extends Model
{
    protected $primaryKey ="id";
    protected $table="sepet_uruns";
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'sepetID','urunID','adet'
    ];
    const CREATED_AT = "olusturma_tarihi";
    const UPDATED_AT = "guncelleme_tarihi";
    public function urun()
    {
        return $this->belongsToMany('App\Entities\urun','sepet_uruns','sepetID','urunID');
    }
    public  function urunCek()
    {
        return $this->belongsTo('App\Entities\urun');
    }
}
