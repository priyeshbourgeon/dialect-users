<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    //use SoftDeletes;
    //use HasFactory;

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }
}
