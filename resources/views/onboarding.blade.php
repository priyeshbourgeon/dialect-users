@extends('layouts.app')
@section('content')
 <!-- banner -->
        <section class="banner">
            <div class="inner_banner">
                <div class="uk_container "> 
                        <div class="wrap_home_hero_login_block">
                            <div class="home_hero_login_block ">

                                <div class="uk-align-center">
                                    <div>
                                    <h2 class="uk-align-center ">Welcome to DialectB2B</h2>
                                     <p>You are requested to set your Password. The new Password should be of:<p>
                                     <div style="text-align:left">
                                       <small> At least 8 characters—the more characters, the better.</small><br>  
                                       <small> A mixture of both uppercase and lowercase letters.</small><br>  
                                       <small> A mixture of letters and numbers.</small><br>  
                                       <small> Inclusion of at least one special character, e.g., ! @ # ? ]</small><br>  
                                       <small> Note: do not use < or > in your password, as both can cause  
                                       problems in Web browsers.</small>
                                     </div>  
                                    </div>
                                    <form class="uk-form-stacked" action="{{ route('registration.setPassword') }}" method="post">
                                        @csrf
                                        <div class="uk-margin">
                                            <div class="uk-inline">
                                                <span class="uk-form-icon" > <img src="images/icon-phone.svg" alt=""></span>
                                                <input class="uk-input" type="password" name="password" placeholder="Password">    
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">      
                                            </div>
                                            @error('password')
                                                <div class="error_msg">{{ $message }}</div>
                                            @enderror  
                                        </div>
                                        <div class="uk-margin">
                                            <div class="uk-inline">
                                                <span class="uk-form-icon" > <img src="images/icon-phone.svg" alt=""></span>
                                                <input class="uk-input" type="password" name="confirm_password" placeholder="Confirm Password">         
                                            </div>
                                        </div>
                                        <div class="uk-margin uk-margin-remove-bottom">
                                            <div class="uk-inline">
                                                <button class="btn_com">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </section>
<!-- banner -->   
@endsection
