<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LimittedEnquiryMail extends Model
{
    use HasFactory;
    protected $table='limitted_enquirymail';  
    protected $fillable=['company_id','from_mail','to_mail','service','timeframe','status'];  
}
