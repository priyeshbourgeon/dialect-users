<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;
    protected $table='enquiries';  
    protected $fillable=['company_id','service_id','from_id','to_id','from_email','to_email','timeframe','status','reference_no','country_id','region_id','subject','body','sender_type','verified_by','is_draft','is_limited','is_external','is_read','is_replied','mail_type'];
    
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id','id');
    }

    public function category()
    {
        return $this->belongsTo(SubCategory::class,'service_id','id');
    }

    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }

    public function region(){
        return $this->belongsTo(Region::class,'region_id','id');
    }

    public function user(){
        return $this->belongsTo(CompanyUser::class,'sender_user','id');
    }

    public function reply(){
        return $this->hasMany(Mail::class,'ref_id','id')->where('is_draft','!=',1);
    }

    public function myreply(){
        return $this->belongsTo(Mail::class,'id','ref_id')->where('is_draft','!=',1)->where('from_company_id',auth()->user()->company_id);
    }

    public function replies(){
        return $this->hasMany(Enquiry::class,'parent_reference_no','reference_no')->where('is_draft',0)->where('from_id','!=',auth()->user()->id);
    }
}
  