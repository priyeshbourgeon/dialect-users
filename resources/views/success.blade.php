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
                                    <h2>Thank you for verifying your email.</h2>
                                    <p>You can continue with the registration process through "PROCEED" or if you wish to do registration process later, please click "DO IT LATER", you will receive registration link in your verified email and can continue the registration process at your convenience.</p>
                                <div>
                                
                                <a href="{{ route('registration.companyInfo') }}" ><button class="btn_com" style="background-color:#079b31">Proceed</button></a>
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