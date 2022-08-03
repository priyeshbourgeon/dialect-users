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
                                    <!-- <h2>Thank you for verifying your email.</h2> -->
                                    <p>Your company registration process is currently under review and once the verification is completed, all your registered account users will be acknowledged by an email.</p>
                                <div>
                                <a href="{{ url('/') }}" ><button class="btn_com">Back To Home</button> </a>
                            </div>                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</section>
 @endsection