<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\CompanyActivity;
use App\Models\CompanyLocation;
use App\Models\Country;
use App\Models\Region;
use App\Models\Area;
use App\Models\Mail;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\CategorySubCategory;
use App\Models\Enquiry;

class SalesController extends Controller
{

    public function inbox()
    {
        $user = Auth::user();
        $enquiry = Enquiry::with('category')
                            ->where('to_id', $user->id)
                            ->latest()
                            ->get();
                            //->paginate(10);
        return view('sales.inbox',compact('enquiry','user'));
    }

    public function outbox(){
        $user = Auth::user();
        
        $company = Company::findOrFail($user->company_id);
        $mails = Enquiry::where('from_id',$company->id)
                        ->where('sender_type','Sales')
                        ->where('is_draft','!=',1)
                        ->latest()
                        ->paginate(10);
        return view('sales.outbox',compact('company','user','mails'));
    }

    public function draft(){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $mails = Enquiry::where('from_id',$company->id)
                       ->where('sender_type','Sales')
                       ->where('is_draft',1)
                       ->latest()
                       ->paginate(10);
        return view('sales.draft',compact('company','user','mails'));
    }

    public function enquiryTimeout(Request $request){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $mails = Enquiry::where('to_id','!=',$user->id)
                      ->where('is_draft','!=',1)
			          ->where('enquiries.created_at','>',$company->created_at)
                      ->whereDate('enquiries.timeframe','<',date('Y-m-d'))
                      ->latest()
                      ->paginate(10);
        return view('sales.timeout',compact('user','mails'));
    } 

    public function events(){
        return view('sales.events');
    }

    public function editDraft($id){
        $mail = Enquiry::find($id);
        return view('sales.edit-draft',compact('mail'));
    }

    public function salesEnquiryTimeout(Request $request){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $companyActivities = CompanyActivity::where('company_id',$company->id)->pluck('service_id')->toArray();
        $company_id = Auth::user()->company_id;
        \DB::enableQueryLog();
        $mails = Enquiry::where('from_company_id','!=',$company->id)
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
        $mail = Enquiry::find($id);
        return view('sales.enquiry-timeout-show',compact('company','user','mail'));
    } 

    public function composeReply($id){
        $mail = Enquiry::find($id);
        return view('sales.compose-mail',compact('mail'));
    }

    public function sendReply(Request $request){
        $mail_id = $request->mail_id;
        
        $user = Auth::user();
        $enquiry = Enquiry::find($mail_id);
        $company_id = Auth::user()->company_id;
        $company = Company::find($company_id);
        $ref_no = rand(1000000,9000000);
        $is_draft = ($request->submit == 'draft') ? 1 : 0;

        $imageUrl  = '';
        if($request->hasFile('attachment')){
             $imageName = time().'.'.$request->attachment->extension();  
             $request->attachment->move(public_path('attachment'), $imageName);
             $path = asset('attachment/');
             $imageUrl = $path.'/'.$imageName;
        }

        $mail = new Enquiry();
        $mail->company_id = $enquiry->company_id;
        $mail->service_id = $enquiry->service_id;
        $mail->country_id = $enquiry->country_id;
        $mail->region_id = $enquiry->region_id;
        $mail->subject = $request->subject;
        $mail->body = $request->body;
        $mail->from_id = $user->id;
        $mail->to_id = $enquiry->from_id;
        $mail->from_email = $user->email;
        $mail->to_email = $enquiry->from_email;
        $mail->timeframe = $enquiry->timeframe;
        $mail->sender_type = $user->designation;
        $mail->reference_no = $ref_no;
        $mail->parent_reference_no = $enquiry->is_limited == 1 ? $enquiry->parent_reference_no : $enquiry->reference_no;
        $mail->verified_by = 1;
        $mail->is_draft = $is_draft;
        $mail->is_limited = $enquiry->is_limited;
        $mail->limited_status = 1;
        $mail->is_external = $enquiry->is_external;
        $mail->is_read = 0;
        $mail->is_replied = 0;
        $mail->mail_type = 1;
        $mail->approve_status = 1;
        $mail->save();

        $enquiry->status = 1;
        $enquiry->is_replied = 1;
        $enquiry->save();

        return redirect()->route('sales.home')->with('success','Mail Send!');
    }

    public function sendDraftReply(Request $request){
        $mail_id = $request->mail_id;
        $maildetails = Enquiry::findOrFail($mail_id);
        $mode = ($request->submit == 'draft') ? '1' : '0';
        $imageUrl  = '';
        $company_id = Auth::user()->company_id;
        $company = Company::find($company_id);
        $mail  =  Enquiry::find($mail_id);
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

    public function limittedEnquiry()
    {
        return redirect()->route('sales.home')->with('success','Your Interest is noted!');
    }

    public function setInterested($id){
      
        $user = Auth::user();
        $enquiry = Enquiry::find($id);
        $company_id = Auth::user()->company_id;
        $company = Company::find($company_id);

        $ref_no = rand(1000,9000);    

        $mail                          = new Enquiry();
        $mail->company_id              = $enquiry->company_id;
        $mail->service_id              = $enquiry->service_id;
        $mail->country_id              = $enquiry->country_id;
        $mail->region_id               = $enquiry->region_id;
        $mail->subject                 = "I'm Interested!";
        $mail->body                    = "<div><h2>I'm Interested!</h2><p>Company Name :".$company->name."</p>
                                          <p>Website : '.$company->website.'</p></div>'";
        $mail->from_id                 = $enquiry->to_id;
        $mail->to_id                   = $enquiry->from_id;
        $mail->from_email              = $user->email;
        $mail->to_email                = $enquiry->from_email;
        $mail->timeframe               = $enquiry->timeframe;
        $mail->sender_type             = $user->designation;
        $mail->reference_no            = $ref_no;
        $mail->parent_reference_no     = $enquiry->reference_no;
        $mail->verified_by             = 1;
        $mail->is_draft                = 0;
        $mail->is_limited              = 1;
        $mail->limited_status          = 0;
        $mail->is_external             = 0;
        $mail->is_read = 0;
        $mail->is_replied = 0;
        $mail->mail_type = 1;
        $mail->approve_status = 0;
        $mail->save();

        $enquiry->status = 1;
        $enquiry->is_replied = 1;
        $enquiry->limited_status = 1;
        $enquiry->save();
        return redirect()->route('sales.home')->with('success','Your Interest is noted!');
    } 

    public function sendInterest(Request $request)
    {
        dd(123);
    }

}
