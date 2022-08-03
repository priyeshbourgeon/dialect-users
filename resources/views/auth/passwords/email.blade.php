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
                            <h2 class="uk-align-center "> {{ __('Reset Password') }}</h2>
                            <p>Cras ultricies mauris velit, vitae ornare ex tristique id. Morbi congue commodo lacinia. </p>
                        </div>
                        <form method="POST" action="{{ route('password.email') }}" class="uk-form-stacked">
                        @csrf
                        @if (session('status'))
                            <span>{{ session('status') }}</span>
                        @endif           
                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <span class="uk-form-icon" ><img src="{{ asset('assets/images/user.svg') }}" alt=""></span>
                                    <input class="uk-input  @error('email') uk-form-danger uk-animation-shake @enderror" id="email" type="email" name="email" placeholder="Email Address">
                                    @error('email')
                                        <div class="error_msg">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="uk-margin uk-margin-remove-bottom">
                                <div class="uk-inline">
                                    <button class="btn_com submit" type="submit"> {{ __('Send Password Reset Link') }}</button>
                                </div>
                            </div>
                            <div class="go_signup uk-margin">
                                <a href="{{ url('/') }}">Back to home</a> 
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
