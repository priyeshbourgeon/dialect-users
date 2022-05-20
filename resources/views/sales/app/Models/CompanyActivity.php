<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyActivity extends Model
{
    public function services()
    {
        return $this->belongsTo(SubService::class,'service_id','id');
    }
    
}
