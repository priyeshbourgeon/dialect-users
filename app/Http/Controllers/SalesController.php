<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\CompanyActivity;
use App\Models\Country;
use App\Models\Region;
use App\Models\Area;
use App\Models\Mail;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\CategorySubCategory;

class SalesController extends Controller
{
    public function inbox(){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $companyActivities = CompanyActivity::where('company_id',$company->id)->pluck('service_id')->toArray();
        $company_id = Auth::user()->company_id;
        $mails = Mail::doesntHave('myreply')->where('from_company_id','!=',$company->id)
                      ->where('is_draft','!=',1)
                      ->where('country_id',$company->country_id)
                      ->whereIn('service',$companyActivities)
                      ->whereNull('ref_id')
			          ->where('mails.created_at','>',$company->created_at)
                      ->whereDate('mails.request_time','>=',date('Y-m-d'))
                      ->orderBy('mails.created_at','desc')->paginate(10);
                 //ddd($mails);     
        return view('sales.inbox',compact('company','user','mails'));            
    }

    public function outbox(){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $mails = Mail::where('from_company_id',$company->id)
                       ->where('sender_type','sales')
                       ->where('is_draft','!=',1)
                       ->latest()->paginate(10);
        return view('sales.outbox',compact('company','user','mails'));
    }

    public function draft(){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $mails = Mail::where('from_company_id',$company->id)
                       ->where('sender_type','sales')
                       ->where('is_draft',1)
                       ->latest()->paginate(10);
        return view('sales.draft',compact('company','user','mails'));
    }

    public function editDraft($id){
        $mail = Mail::withTrashed()->find($id);
        return view('sales.edit-draft',compact('mail'));
    }

    public function events(){
        return view('sales.events');
    }

    public function salesEnquiryTimeout(Request $request){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $companyActivities = CompanyActivity::where('company_id',$company->id)->pluck('service_id')->toArray();
        $company_id = Auth::user()->company_id;
        \DB::enableQueryLog();
        $mails = Mail::where('from_company_id','!=',$company->id)
                      ->where('is_draft','!=',1)
                      ->where('country_id',$company->country_id)
                      ->whereIn('service',$companyActivities)
                      ->whereNull('ref_id')
			          ->where('mails.created_at','>',$company->created_at)
                      ->whereDate('mails.request_time','<',date('Y-m-d'))
                      ->orderBy('mails.created_at','desc')->paginate(10);
       // dd(\DB::getQueryLog());
        return view('sales.timeout',compact('company','user','mails'));
    } 

    public function salesEnquiryTimeoutShow($id){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $mail = Mail::withTrashed()->find($id);
        return view('sales.enquiry-timeout-show',compact('company','user','mail'));
    } 

    public function composeReply($id){
        $mail = Mail::withTrashed()->find($id);
        return view('sales.compose-mail',compact('mail'));
    }

    public function sendReply(Request $request){
        $mail_id = $request->mail_id;
       
        $maildetails = Mail::findOrFail($mail_id);
        $mode = ($request->submit == 'draft') ? '1' : '0';
        $imageUrl  = '';
         if($request->hasFile('attachment')){
             $imageName = time().'.'.$request->attachment->extension();  
             $request->attachment->move(public_path('attachment'), $imageName);
             $path = asset('attachment/');
             $imageUrl = $path.'/'.$imageName;
         }
        
        $company_id = Auth::user()->company_id;
        $company = Company::find($company_id);
        $mail                          = new Mail();
        $mail->sector_id               = $maildetails->sector_id;
        $mail->service_parent_id       = $maildetails->service_id;
        $mail->type                    = 2;
        $mail->service                 = $maildetails->service;
        $mail->country_id              = $maildetails->country_id;
        $mail->region_id               = $maildetails->region_id;
        $mail->cc                      = $request->cc;
        $mail->subject                 = $request->subject;
        $mail->description             = $request->reply_body;
        $mail->from_company_id         = $company_id;
        $mail->sender_name             = $company->name;
        $mail->sender_type             = 'sales';
        $mail->sender_user             = Auth::user()->id;
        $mail->ref_id                  = $maildetails->id;
        $mail->verified_at             = date('Y-m-d h:i:s');
        $mail->is_draft                = $mode;
        $mail->attachment              = $imageUrl;
        $mail->save();
        return redirect()->route('sales.home')->with('success','Mail Send!');
    }

    public function sendDraftReply(Request $request){
        $mail_id = $request->mail_id;
        $maildetails = Mail::findOrFail($mail_id);
        $mode = ($request->submit == 'draft') ? '1' : '0';
        $imageUrl  = '';
        $company_id = Auth::user()->company_id;
        $company = Company::find($company_id);
        $mail  =  Mail::find($mail_id);
         if($request->hasFile('attachment')){
             $imageName = time().'.'.$request->attachment->extension();  
             $request->attachment->move(public_path('attachment'), $imageName);
             $path = asset('attachment/');
             $imageUrl = $path.'/'.$imageName;
         }
         else{
            $imageUrl = $mail->attachment;
         }
        
       
        $mail->sector_id               = $maildetails->sector_id;
        $mail->service_parent_id       = $maildetails->service_id;
        $mail->type                    = 2;
        $mail->service                 = $maildetails->service;
        $mail->country_id              = $maildetails->country_id;
        $mail->region_id               = $maildetails->region_id;
        $mail->cc                      = $request->cc;
        $mail->subject                 = $request->subject;
        $mail->description             = $request->reply_body;
        $mail->from_company_id         = $company_id;
        $mail->sender_name             = $company->name;
        $mail->sender_type             = 'sales';
        $mail->sender_user             = Auth::user()->id;
        $mail->ref_id                  = $maildetails->ref_id;
        $mail->verified_at             = date('Y-m-d h:i:s');
        $mail->is_draft                = $mode;
        $mail->attachment              = $imageUrl;
        $mail->save();
        //dd($mail);
        return redirect()->route('sales.home')->with('success','Mail Send!');
    }

}
