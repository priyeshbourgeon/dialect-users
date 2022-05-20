<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function region()
    {
        return $this->belongsTo(Region::class,'region_id','id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }

    // public function sector()
    // {
    //     return $this->belongsTo(Sector::class,'sector_id','id');
    // }

    // public function service()
    // {
    //     return $this->belongsTo(Service::class,'service_id','id');
    // }

    // public function documents()
    // {
    //     return $this->hasMany(CompanyDocument::class,'company_id','id');
    // }

    // public function payments()
    // {
    //     return $this->hasMany(Payment::class,'company_id','id');
    // }
}
