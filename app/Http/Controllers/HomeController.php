<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Company;
use App\Models\CompanyUser;
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
        $mails = array();
        return view('procurement-home',compact('company','user','mails'));
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

    public function sales(){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        return view('sales-home',compact('company','user'));
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
