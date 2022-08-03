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
                            <h2 class="uk-align-center ">Enquiry</h2>
                            <!-- <p>Cras ultricies mauris velit, vitae ornare ex tristique id. Morbi congue commodo lacinia. </p> -->
                        </div>
                        <form method="POST" action="{{ route('fetchCompanyDetails') }}" class="uk-form-stacked">
                        @csrf      
                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <span class="uk-form-icon" ><img src="{{ asset('assets/images/user.svg') }}" alt=""></span>
                                    <select class="uk-input  @error('email') uk-form-danger uk-animation-shake @enderror">
                                         <option value="">Select Country</option>
                                         @foreach($countries as $key => $country)
                                         <option value="{{ $country->id }}">{{ $country->name }}</option>
                                         @endforeach
                                    </select>
                                    @error('country_id')
                                        <div class="error_msg">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <span class="uk-form-icon" ><img src="{{ asset('assets/images/user.svg') }}" alt=""></span>
                                    <input class="uk-input  @error('customer_id') uk-form-danger uk-animation-shake @enderror" type="text" name="customer_id" placeholder="Enter Customer ID">
                                    @error('customer_id')
                                        <div class="error_msg">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="uk-margin uk-margin-remove-bottom">
                                <div class="uk-inline">
                                    <button class="btn_com submit" type="submit">Continue</button>
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
