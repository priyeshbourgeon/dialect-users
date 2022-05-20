<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Document extends Model
{
    use SoftDeletes;

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }
}
