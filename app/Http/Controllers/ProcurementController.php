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

class ProcurementController extends Controller
{
    public function inbox(){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $mails = Mail::whereHas('reply')->with('reply')->where('from_company_id',$company->id)->latest()->paginate(10);
        return view('procurement.inbox',compact('company','user','mails'));               
    }

    public function proOutBox(){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $mails = Mail::where('from_company_id',$company->id)
                       ->where('sender_type','procurement')
                       ->where('is_draft','!=',1)
                       ->latest()->paginate(10);
        return view('procurement.outbox',compact('company','user','mails'));
    }

    public function getMailContent(Request $request){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $mail = Mail::with('category','country','region')->withTrashed()->find($request->id)->toJson();
        return $mail;
    }

    public function composeOne(){
        \Session::forget('selected'); 
        $categories   = Category::all();
        session()->put('selected', []);
        return view('procurement.compose-one',compact('categories'));
    }

    public function composeTwo(){
        $countries  = Country::where('status',1)->get();
        $services = SubCategory::whereIn('id',session('selected'))->get();
        return view('procurement.compose-two',compact('countries','services'));
    }

    public function sendMail(Request $request){
        $request->validate([  
            'country_id'=> 'required',
            'region_id' => 'required',
            'body' => 'required',
            'subject'=> 'required',
            'timeframe'=> 'required',
        ]);
        

        $imageUrl  = '';
         if($request->hasFile('attachment')){
             $imageName = time().'.'.$request->attachment->extension();  
             $request->attachment->move(public_path('attachment'), $imageName);
             $path = asset('attachment/');
             $imageUrl = $path.'/'.$imageName;
         }
 
        $company_id = Auth::user()->company_id;


        $refno = 'DB2B/'.$company_id.'/'.date('dmyhis').'/'.rand('1000','9999');
        $company = Company::find($company_id);
        $mode = ($request->submit == 'draft') ? '1' : '0';
        $mail                          = new Mail();
        $mail->reference_no            = $refno;
        $mail->service                 = $request->services;
        $mail->country_id              = $request->country_id;
        $mail->region_id               = $request->region_id;
        $mail->cc                      = $request->cc;
        $mail->subject                 = $request->subject;
        $mail->description             = $request->body;
        $mail->from_company_id         = $company_id;
        $mail->sender_name             = $company->name; 
        $mail->sender_type             = 'procurement';
        $mail->sender_user             = Auth::user()->id;
        $mail->verified_at             = date('Y-m-d h:i:s');
        $mail->request_time            = $request->timeframe;
        $mail->type                    = 1;
        $mail->is_draft                = $mode;
        $mail->attachment              = $imageUrl;
        $mail->save();

        return redirect()->route('procurement.outbox')->with('success','Mail Send!');
    }

    public function events(){
        return view('procurement.events');
    }

    public function proDraft(Request $request){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $mails = Mail::where('from_company_id',$company->id)->where('sender_type','procurement')->where('is_draft',1)->latest()->paginate(10);
        return view('procurement.draft',compact('company','user','mails'));
    } 

    public function proDraftShow($id){
        $user = Auth::user();;
        $company = Company::findOrFail($user->company_id);
        $mail = Mail::withTrashed()->find($id);
        $category = SubCategory::find($mail->service);        
        $countries  = Country::where('status',1)->get();
        $regions  = Region::where('country_id',$mail->country_id)->where('status',1)->get();
        return view('procurement.edit-draft',compact('category','company','user','mail','countries','regions'));
    } 

    public function saveDraft(Request $request,$id){
        $request->validate([  
            'country_id'=> 'required',
            'region_id' => 'required',
            'body' => 'required',
            'subject'=> 'required',
            'timeframe'=> 'required',
        ]);

        $imageUrl  = '';
         if($request->hasFile('attachment')){
             $imageName = time().'.'.$request->attachment->extension();  
             $request->attachment->move(public_path('attachment'), $imageName);
             $path = asset('attachment/');
             $imageUrl = $path.'/'.$imageName;
         }
 
        $company_id = Auth::user()->company_id;
        $company = Company::find($company_id);
        $mode = ($request->submit == 'draft') ? '1' : '0';
        $mail                          = Mail::find($id);
        $mail->service                 = $request->services;
        $mail->country_id              = $request->country_id;
        $mail->region_id               = $request->region_id;
        $mail->cc                      = $request->cc;
        $mail->subject                 = $request->subject;
        $mail->description             = $request->body;
        $mail->from_company_id         = $company_id;
        $mail->sender_name             = $company->name; 
        $mail->sender_type             = 'procurement';
        $mail->sender_user             = Auth::user()->id;
        $mail->verified_at             = date('Y-m-d h:i:s');
        $mail->request_time            = $request->timeframe;
        $mail->is_draft                = $mode;
        $mail->attachment              = $imageUrl;
        $mail->save();

        return redirect()->route('procurement.home')->with('success','Mail Send!');
    }


    public function editTimeFrame($id){
        $mail = Mail::withTrashed()->find($id);
        return view('procurement.edit-timeframe',compact('mail'));
    } 

    public function updateTimeframe(Request $request){
        $id = $request->mail_id;
        $mail = Mail::find($id);
        $mail->request_time = $request->timeframe;
        $mail->save();
        return redirect()->route('procurement.outbox');
    }
}
