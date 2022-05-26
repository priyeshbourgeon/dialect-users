<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyUser;

class ProfileController extends Controller
{
    public function profile(){
        $company = Company::where('id',auth()->user()->company_id)->first();
        return view('profile',compact('company'));
    }

    public function profileEdit(){
        return view('profile-edit');
    }

    public function profileSave(Request $request){
         
    }

    public function changeDp(){
        $company = Company::where('id',auth()->user()->company_id)->first();
        return view('change-dp',compact('company'));
    } 

    public function changePassword(){
        $company = Company::where('id',auth()->user()->company_id)->first();
        return view('change-password',compact('company'));
    }

    public function updatePassword(Request $request){

    }


}
