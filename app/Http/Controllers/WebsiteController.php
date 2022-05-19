<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Region;

class WebsiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    public function index()
    {
        $countries = Country::all();
        $regions = Region::all();
        return view('welcome',compact('countries','regions'));
    }

    


}
