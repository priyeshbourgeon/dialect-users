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
use App\Models\Enquiry;
use App\Models\CategorySubCategory;
use App\Jobs\PreRegisteredEnquiryEmailJob;
use App\Jobs\LimittedEnquiryMailJob;
use App\Http\Requests\User\EnquiryRequest;
class ProcurementController extends Controller
{
    public function inbox(){
        $user = Auth::user();
        $mails = Enquiry::whereHas('replies')->with('replies')
                 ->where('from_id',$user->id)
                 ->groupBy('reference_no')
                 ->paginate(10);
        return view('procurement.inbox',compact('user','mails'));               
    }

    public function outbox(){
        $user = Auth::user();
        $mails = Enquiry::where('from_id',$user->id)
                        ->where('sender_type','Procurement')
                        ->where('is_draft',0)
                        ->latest()
                        ->groupBy('reference_no')
                        ->paginate(10);
        return view('procurement.outbox',compact('user','mails'));
    }

    public function draft(Request $request){
        $user = Auth::user();
        $mails = Enquiry::where('from_id',$user->id)
                     ->where('sender_type','Procurement')
                     ->where('is_draft',1)
                     ->latest()
                     ->paginate(10);
        return view('procurement.draft',compact('user','mails'));
    } 

    public function events(){
        return view('procurement.events');
    }

    public function getMailContent(Request $request){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        //$mail = Mail::with('category','country','region','myreply')->withTrashed()->find($request->id)->toJson();
        $mail = Enquiry::with('category','country','region','myreply','company')->find($request->id)->toJson();
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

    public function sendMail(EnquiryRequest $request, Enquiry $enquiry)
    {
        $designation = 'Sales';
        $authuser = Auth::user();
                          
        $ref_no = rand(1,90);    
        $input = $request->validated();     
        $Is_Drafted = $request->submit == 'draft' ? 1 : 0;
        $Is_External = !$request->Is_External ? 0 : 1; 
        $verified_by =  $authuser->id; 
        $is_Limited = !$request->is_limited ? 0 : 1;
        $parent_ref = !$request->parent_ref ? '' : $request->parent_ref;
        $input['company_id'] = $authuser->company_id;
        $input['from_id'] = $authuser->id;
        $input['from_email'] = $authuser->email;
        $input['reference_no'] = $ref_no;
        $input['parent_reference_no'] = $parent_ref;
        $input['sender_type'] = $authuser->designation;
        $input['verified_by'] = $verified_by;
        $input['is_limited'] = $is_Limited;
        $input['limited_status'] = 0;
        $input['is_read'] = 0;
        $input['is_replied'] = 0;
        $input['mail_type'] = 1;
        $input['is_draft'] = $Is_Drafted;
        $input['is_external'] = $Is_External;

        if($Is_Drafted == 1){
            $enquiry->create($input);
            return redirect()->route('procurement.outbox')->with('success','Notification Send SuccessFully!');
        }

        $limitted_users = Company::join('company_users', 'company_users.company_id', '=', 'companies.id')
                                    ->select( 'company_users.company_id', 'company_users.designation', 'company_users.email', 'companies.id', 'companies.country_id', 'companies.region_id')
                                    ->where('company_users.designation', '=', $designation)
                                    ->get();
        foreach ($limitted_users as $key => $user) 
        {               
            $input['to_id'] = $user->id;
            $input['to_email'] = $user->email;
            $enquiry->create($input);
        }   
        return redirect()->route('procurement.outbox')->with('success','Notification Send SuccessFully!');
           
    }

    public function setApproved($id){
      
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
        $mail->subject                 = "Your Interest has been approved";
        $mail->body                    = "<div><p>Your Interest has been approved.Now you can submit you quote!</p></div>'";
        $mail->from_id                 = $user->id;
        $mail->to_id                   = $enquiry->from_id;
        $mail->from_email              = $user->email;
        $mail->to_email                = $enquiry->from_email;
        $mail->timeframe               = $enquiry->timeframe;
        $mail->sender_type             = $user->designation;
        $mail->reference_no            = $ref_no;
        $mail->parent_reference_no     = $enquiry->parent_reference_no;
        $mail->verified_by             = 1;
        $mail->is_draft                = 0;
        $mail->is_limited              = 1;
        $mail->limited_status          = 0;
        $mail->is_external             = 0;
        $mail->is_read = 0;
        $mail->is_replied = 0;
        $mail->mail_type = 1;
        $mail->approve_status = 1;
        $mail->save();

        $enquiry->status = 1;
        $enquiry->is_replied = 1;
        $enquiry->limited_status = 1;
        $enquiry->save();
        return redirect()->route('procurement.home')->with('success','Request has been approved!');
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
