<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class page extends Model
{
    //
    protected $table = "page";
    protected $primaryKey = "id";
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['baslik','keywords','description','sira'];
}
