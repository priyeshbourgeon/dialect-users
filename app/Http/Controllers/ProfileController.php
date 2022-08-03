<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\CompanyActivity;
use App\Models\CompanyDocument;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Document;
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
        // $categories = CompanyActivity::where('company_id',$company->id)->pluck('service_id')->toArray();
        // $subcategories = SubCategory::whereIn('id',$categories)->get();
        // return view('categories',compact('company','subcategories','categories'));
        $categories = Category::all();
        return view('categories',compact('company','categories'));
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

    public function chooseDocument(){
        $company = Company::where('id',auth()->user()->company_id)->first();
        $documents  = Document::where('country_id',$company->country_id)->get();
        $document = CompanyDocument::with('document')->where('company_id',$company->id)->first();
        return view('profile.company-document',compact('company','document','documents'));
    }

    public function saveDocument(Request $request){
        $request->validate([  
            'doc_type' =>'required',
            'doc_number' => 'required',
            'doc_file' => 'required|mimes:pdf,jpeg,png,jpg|max:5000',
         ]);
       
         $imageUrl  = '';
         if($request->hasFile('doc_file')){
             $imageName = time().'.'.$request->doc_file->extension();  
             $request->doc_file->move(public_path('uploads/company_document'), $imageName);
             $path = asset('uploads/company_document/');
             $imageUrl = $path.'/'.$imageName;
         }

        $company = Company::where('id',auth()->user()->company_id)->first();
        $document = CompanyDocument::with('document')->where('company_id',$company->id)->first();
        $document->company_id = $company->id;
        $document->doc_type = $request->doc_type;
        $document->doc_file = $imageUrl;
        $document->expiry_date = $request->expiry_date;
        $document->doc_number = $request->doc_number;
        $document->status = 1;
        $document->save();
        return redirect()->route('profile')->with('success','Document has been updated!');
    }

    public function addCategory (Request $request){
        $company = Company::where('id',auth()->user()->company_id)->first();
        $subcat_id = $request->subcat_id;
        $companyServicesExist = CompanyActivity::where('service_id',$subcat_id)->where('company_id',$company->id)->first();
        if(!$companyServicesExist){
            $service = new CompanyActivity();
            $service->service_id = $subcat_id;
            $service->company_id = $company->id;
            $service->save();
        }
        $companyActivities = CompanyActivity::where('company_id',$company->id)->get();
        return response()->json($companyActivities);
    }

    public function delProfileCategories ($id){
        $company = Company::where('id',auth()->user()->company_id)->first();
        $companyActivities = CompanyActivity::where('service_id',$id)->where('company_id',$company->id)->delete();
        return redirect()->route('profile')->with('success','Category has been updated!');
    }

}
