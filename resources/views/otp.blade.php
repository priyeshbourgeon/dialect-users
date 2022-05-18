@extends('layouts.app')
@section('content')
<!-- banner -->
<style>
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
</style>   
<section class="banner banner_light">
    <div class="inner_banner">
        <div class="uk_container "> 
            <div class="wrap_home_hero_login_block ">
                <div class="home_hero_login_block  otp_box">
                    <div class="uk-align-center">
                        <div>
                            <h3>An OTP has been sent to your email. Please enter the OTP below</h3>
                            <p>We've send you the verification code on <strong> {{ $registation['email'] ?? "your registered email address"}}  </strong></p>
                        </div>
                        <form onsubmit="formControl()" class="uk-form-stacked" action="{{ route('registration.verifyOtp') }}" method="post">
                            @csrf
                            <div class="uk-margin">
                                <div class="uk-inline otp_input_div">
                                    <input class="uk-input input-key @error('digit1') uk-form-danger uk-animation-shake @enderror" type="number" min="0" max="9" step="1" placeholder="" name="digit1" maxlength="1" autofocus>
                                    <input class="uk-input input-key @error('digit2') uk-form-danger uk-animation-shake @enderror" type="number" min="0" max="9" step="1" placeholder="" name="digit2" maxlength="1">
                                    <input class="uk-input input-key @error('digit3') uk-form-danger uk-animation-shake @enderror" type="number" min="0" max="9" step="1" placeholder="" name="digit3" maxlength="1">
                                    <input class="uk-input input-key @error('digit4') uk-form-danger uk-animation-shake @enderror" type="number" min="0" max="9" step="1" placeholder="" name="digit4" maxlength="1">
                                    <input class="uk-input input-key @error('digit5') uk-form-danger uk-animation-shake @enderror" type="number" min="0" max="9" step="1" placeholder="" name="digit5" maxlength="1">
                                    <input class="uk-input input-key @error('digit6') uk-form-danger uk-animation-shake @enderror" type="number" min="0" max="9" step="1" placeholder="" name="digit6" maxlength="1">
                                </div>
                            </div>
                            <div class="uk-margin uk-margin-remove-bottom">
                                <div class="uk-inline">
                                    <button type="submit" class="btn_com submit">Proceed</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end Otp -->
        </div>
    </div>
    </div>
</section>
<!-- banner -->
@push('scripts')
<script>
    $(".input-key").keyup(function() {
        if ($(this).val().length == $(this).attr("maxlength")) {
            $(this).next('.input-key').focus();
        }
    });
</script>
@endpush
@endsection