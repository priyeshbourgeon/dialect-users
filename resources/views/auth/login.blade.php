@extends('layouts.app')
@section('content')
<!-- banner -->
<!-- banner -->
<section class="banner">
    <div class="inner_banner">
        <div class="uk_container "> 
            <div class="wrap_home_hero_login_block">
                <div class="home_hero_login_block ">
                    <div class="uk-align-center">
                        <div>
                            <h2 class="uk-align-center "> Login</h2>
                            <!-- <p>Cras ultricies mauris velit, vitae ornare ex tristique id. Morbi congue commodo lacinia. </p> -->
                        </div>
                        <form method="POST" action="{{ route('login') }}" class="uk-form-stacked">
                        @csrf
                        @if(session()->has('message'))
                            <span>{{ session()->get('message') }}</span>
                        @endif           
                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <span class="uk-form-icon" ><img src="{{ asset('assets/images/user.svg') }}" alt=""></span>
                                    <input class="uk-input  @error('email') uk-form-danger uk-animation-shake @enderror" type="email" name="email" placeholder="Email Address">
                                    @error('email')
                                        <div class="error_msg">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="uk-margin">
                                <div class="uk-inline eye_wrap">
                                    <span class="uk-form-icon" > <img src="{{ asset('assets/images/lock.svg') }}" alt=""></span>
                                    <input class="uk-input  @error('password') uk-form-danger uk-animation-shake @enderror" type="password" name="password" id="password" placeholder="Password">
                                    <span class="eye_password"></span> 
                                        <!-- show_pass -->
                                    @error('password')
                                    <div class="error_msg">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="uk-margin uk-margin-remove-bottom">
                                <div class="uk-form-controls remember">
                                    <label><input class="uk-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>&nbsp;&nbsp;{{ __('Remember Me') }}</label><br>   
                                </div>
                                <div class="uk-inline">
                                    <button class="btn_com submit" type="submit">{{ __('Login') }}</button>
                                </div>
                            </div>
                            <div class="uk-text-right forgot" id="forgotPass"> 
                                <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }} </a> 
                            </div>
                            <div class="go_signup">
                                Not registered ? 
                                <a href="{{ url('/company/register') }}"> Click here to register</a> 
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
