<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Mail extends Model
{
    use SoftDeletes;

    public function category(){
        return $this->belongsTo(SubCategory::class,'service','id');
    }

    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }

    public function user(){
        return $this->belongsTo(CompanyUser::class,'sender_user','id');
    }
}
