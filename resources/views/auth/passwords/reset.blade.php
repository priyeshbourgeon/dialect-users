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
                        <form method="POST" action="{{ route('password.update') }}" class="uk-form-stacked">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        @if (session('status'))
                            <span>{{ session('status') }}</span>
                        @endif           
                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <span class="uk-form-icon" ><img src="{{ asset('assets/images/user.svg') }}" alt=""></span>
                                    <input class="uk-input  @error('email') uk-form-danger uk-animation-shake @enderror" id="email" type="email" name="email" placeholder="Email Address" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <div class="error_msg">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <span class="uk-form-icon" ><img src="{{ asset('assets/images/user.svg') }}" alt=""></span>
                                    <input class="uk-input  @error('password') uk-form-danger uk-animation-shake @enderror" id="password" type="password"  name="password" required autocomplete="new-password" placeholder="New Password">
                                    @error('password')
                                        <div class="error_msg">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <span class="uk-form-icon" ><img src="{{ asset('assets/images/user.svg') }}" alt=""></span>
                                    <input class="uk-input  @error('password_confirmation') uk-form-danger uk-animation-shake @enderror" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                    @error('password_confirmation')
                                        <div class="error_msg">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="uk-margin uk-margin-remove-bottom">
                                <div class="uk-inline">
                                    <button class="btn_com submit" type="submit"> {{ __('Reset Password') }}</button>
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

