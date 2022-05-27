<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyActivity;
use App\Models\CompanyUser;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeMail;
use App\Mail\ApproveMail;
use Illuminate\Support\Str;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($role)
    {
        $company = Company::where('id',auth()->user()->company_id)->first();
        $user = CompanyUser::where('company_id',$company->id)->where('designation',$role)->first();
        return view('admin.staff.index',compact('company','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company_id = Auth::user()->company_id;
        $request->validate([  
            'name' => 'required',
            'email' => 'required|unique:company_users,email',
            'designation' => 'required',
            'mobile' => 'required',
        ]);
        $plaintext = Str::random(32);
        $companyuser = new CompanyUser();
        $companyuser->company_id    = $company_id;
        $companyuser->name          = $request->name;
        $companyuser->role          = $request->designation;
        $companyuser->mobile        = $request->mobile;
        $companyuser->landline      = $request->landline;
        $companyuser->designation   = $request->role;
        $companyuser->email         = $request->email;
        $companyuser->password      = '';
        $companyuser->status        = 0;
        $companyuser->token         = hash('sha256', $plaintext);
        $companyuser->save();

        \Mail::to($companyuser->email)->send(new \App\Mail\ApproveMail($companyuser));

       

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company_id = Auth::user()->company_id;
        $request->validate([  
            'name' => 'required',
            'email' => 'required|unique:company_users,email,'.$id,
            'designation' => 'required',
            'mobile' => 'required',
        ]);
        
        $companyuser =  CompanyUser::find($id);
        $companyuser->company_id    = $company_id;
        $companyuser->name          = $request->name;
        $companyuser->role          = $request->designation;
        $companyuser->mobile        = $request->mobile;
        $companyuser->landline      = $request->landline;
        $companyuser->designation   = $request->role;
        $companyuser->email         = $request->email;
        $companyuser->password      = '';
        $companyuser->status        = 1;
       
        $companyuser->save();


        return redirect('/home')->with('success','Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
