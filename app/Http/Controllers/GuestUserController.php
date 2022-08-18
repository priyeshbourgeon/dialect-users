<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\Company;
use App\Models\CompanyDocument;


use Illuminate\Http\Request;

class GuestUserController extends Controller
{
    public function index(){
        $countries = Country::all();
        return view('wologin.index',compact('countries'));
    }

    public function fetchCompany(Request $request){
        $company = Company::join('company_documents','company_documents.company_id','companies.id')
                            // ->where('companies.country_id',$request->country_id)
                            ->where('company_documents.doc_number',$request->customer_id)
                            ->first();
        if(!$company){
            return view('wologin.company-not-found');
        }   
        
        return view('wologin.company-info',compact('company'));
    } 

    
}
