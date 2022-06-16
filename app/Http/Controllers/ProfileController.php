<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\CompanyActivity;
use App\Models\CompanyDocument;
use App\Models\SubCategory;
use Hash;
use Auth;

class ProfileController extends Controller
{
    public function profile(){
        $company = Company::where('id',auth()->user()->company_id)->first();
        $categories = CompanyActivity::where('company_id',$company->id)->pluck('service_id')->toArray();
        $subcategories = SubCategory::whereIn('id',$categories)->get();
        $document = CompanyDocument::with('document')->where('company_id',$company->id)->first();
        return view('profile',compact('company','subcategories','document'));
    }

    public function profileEdit(){
        $company = Company::where('id',auth()->user()->company_id)->first();
        return view('profile-edit',compact('company'));
    }

    public function profileSave(Request $request){
        $company = Company::where('id',auth()->user()->company_id)->first();
        $companyuser = CompanyUser::find($request->user_id);
        $companyuser->company_id    = $company->id;
        $companyuser->name          = $request->name;
        $companyuser->role          = $request->designation;
        $companyuser->mobile        = $request->mobile;
        $companyuser->landline      = $request->landline;
        $companyuser->email         = $request->email;
        $companyuser->status        = 1;
        $companyuser->save();
        return redirect()->route('profile')->with('success','Profile has been updated!');
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
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password successfully changed!");
    }

    public function profileCategories(){
        $company = Company::where('id',auth()->user()->company_id)->first();
        $categories = CompanyActivity::where('company_id',$company->id)->pluck('service_id')->toArray();
        $subcategories = SubCategory::whereIn('id',$categories)->get();
        return view('categories',compact('company','subcategories'));
    }

    public function chooseTheme(){
        $company = Company::where('id',auth()->user()->company_id)->first();
        return view('theme',compact('company'));
    }

    public function updateTheme(Request $request){
        $user = Auth::user();
        $user->color = $request->color;
        $user->save();
        return redirect()->back();
    }

}
