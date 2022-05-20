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


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $user = Auth::user();
        if($user->designation == 'Admin'){
            return redirect()->route('admin.home');
        }
        else if($user->designation == 'Procurement'){
            return redirect()->route('procurement.home');
        }
        else if($user->designation == 'Sales'){
            return redirect()->route('sales.home');
        }
    }
    public function admin(){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $company_users = CompanyUser::where('company_id',$user->company_id)->where('status',1)->get();
        if($company_users->count('id') == 3){
            return view('admin-home',compact('company'));
        }
        else{
            $procurement = CompanyUser::where('company_id',$user->company_id)->where('designation','Procurement')->first();
            $sales = CompanyUser::where('company_id',$user->company_id)->where('designation','Sales')->first();
            return view('admin.onboard',compact('user','company','procurement','sales'));
        }
        
    }

    public function procurement(){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $mailids = Mail::where('from_company_id',$company->id)->get(['id']);
        $mails = Mail::where('from_company_id','!=',$company->id)->whereIn('ref_id',$mailids)->latest()->paginate(10);
        return view('procurement-home',compact('company','user','mails'));
    }

    public function proOutBox(){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $mails = Mail::where('from_company_id',$company->id)->latest()->paginate(10);
        return view('procurement.outbox',compact('company','user','mails'));
    }

    public function salesOutBox(){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $mails = Mail::where('from_company_id',$company->id)->latest()->paginate(10);
        return view('sales.outbox',compact('company','user','mails'));
    }

    public function proOutBoxShow($id){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $mail = Mail::withTrashed()->find($id);
        return view('procurement.outbox-show',compact('company','user','mail'));
    }



    public function composeOne(){
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
        $company = Company::find($company_id);
        $mode = ($request->submit == 'draft') ? '1' : '0';
        $mail                          = new Mail();
        $mail->service                 = $request->services;
        $mail->country_id              = $request->country_id;
        $mail->region_id               = $request->region_id;
        $mail->cc                      = $request->cc;
        $mail->subject                 = $request->subject;
        $mail->description             = $request->body;
        $mail->from_company_id         = $company_id;
        $mail->sender_name             = $company->name; 
        $mail->sender_type             = 'procurement';
        $mail->verified_at             = date('Y-m-d h:i:s');
        $mail->request_time            = $request->timeframe;
        $mail->is_draft                = $mode;
        $mail->attachment              = $imageUrl;
        $mail->save();

        return redirect()->route('procurement.home')->with('success','Mail Send!');
    }

    public function sales(){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $companyActivities = CompanyActivity::where('company_id',$company->id)->pluck('service_id')->toArray();
        $company_id = Auth::user()->company_id;
        $mails = Mail::where('from_company_id','=',$company->id)
                      ->where('is_draft','!=',1)
                      ->where('country_id',$company->country_id)
                      //->whereIn('service',$companyActivities)
                      ->latest()->paginate(10);
        return view('sales-home',compact('company','user','mails'));
    }


    public function getRegion(Request $request){
        $regions = Region::where("country_id",$request->country_id)
        ->pluck("name","id");
return response()->json($regions);
    }


    public function searchService(Request $request){
        if($request->keyword != ''){
        $cat = Category::where("name",'like','%'.$request->keyword.'%')->get();
        }
        else{
            $cat = Category::all();
        }
        return $cat->toArray();
    } 

    public function searchAlphaService(Request $request){
        if($request->keyword != ''){
        $cat = Category::where("name",'like',$request->keyword.'%')->get();
        }
        else{
            $cat = Category::all();
        }
        return $cat->toArray();
    } 

    public function getSubService(Request $request){
        $sql = "SELECT * FROM `sub_categories` WHERE id IN (SELECT subcategory_id FROM category_sub_categories WHERE category_id = $request->cat_id)";
        $services = \DB::select($sql);
        return response()->json($services);
    }

    public function saveMailCatService(Request $request){

        $company_id = Auth::user()->company_id;
        $subcat_id = $request->subcat_id;
        if (session()->has('selected')){
            session()->push('selected', $subcat_id);
        }
        $selected = SubCategory::whereIn('id',session('selected'))->get();
        return response()->json($selected);
    }

}
