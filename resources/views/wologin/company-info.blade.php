@extends('layouts.app')
@section('content')
<section class="banner banner_light">
    <div class="inner_banner">
        <div class="uk_container "> 
            <div class="wrap_home_hero_login_block ">
                <div class="home_hero_login_block  otp_box">
                    <div class="uk-align-center">                                    
                            <div class="wrap_pop">
                                <div class="popup_text">
                                    <h2>{{ $company->name }}</h2>
                                    <p>{{ $company->domain }}</p>
                                <div>
                                
                                <a href="{{ url('/') }}" ><button class="btn_com" style="background-color:#079b31">Proceed</button></a>
                                <a href="{{ url('/') }}" ><button class="btn_com">Do it later</button> </a>
                            </div>                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</section>
 @endsection