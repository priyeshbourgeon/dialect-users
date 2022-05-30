@extends(strtolower(auth()->user()->designation).'.layouts.app')
@section('content')
<!-- banner -->
<section class="mail_wrap">
    <div class="uk_container">
        <div class="ad_profile">
            <div class="">
                <form action="{{ route('profile.save') }}" method="post">
                    @csrf
                <div class=" uk-card uk-card-default uk-card-small uk-card-body">
                    <div class="inner">
                        <a href="{{ route('profile') }}" class="btn_back">   <i class="fa fa-arrow-left"></i> Back </a>
                            <div class="form_wraper uk-card-large uk-margin-medium-top">
                                <div class=" form_group">
                                    <label class="uk-form-label" for="form-stacked-text">Edit Profile </label>
                                    <div class="uk-form-controls">                         
                                        <div class="uk-margin  uploads"  uk-margin>
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" />
                                            <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">                             
                                                <input name="name" style="width: 100%;" class="uk-input uk-form-width-medium" type="text" placeholder="Name" value="{{ auth()->user()->name ?? '' }}">
                                            </div>
                                            <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">                         
                                                <input name="designation" style="width: 100%;" class="uk-input uk-form-width-medium" type="text" placeholder="Designation" value="{{ auth()->user()->role ?? '' }}">
                                            </div>
                                            <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">             
                                                <input name="email" style="width: 100%;" class="uk-input uk-form-width-medium" type="text" placeholder="Email" value="{{ auth()->user()->email ?? '' }}">
                                            </div>
                                            <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">             
                                                <input name="mobile" style="width: 100%;" class="uk-input uk-form-width-medium" type="text" placeholder="Mobile" value="{{ auth()->user()->mobile ?? '' }}">
                                            </div>
                                            <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">             
                                                <input name="landline" style="width: 100%;" class="uk-input uk-form-width-medium" type="text" placeholder="Landline" value="{{ auth()->user()->landline ?? '' }}">
                                            </div>  
                                            <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">             
                                                <input name="extension" style="width: 100%;" class="uk-input uk-form-width-medium" type="text" placeholder="Extension" value="{{ auth()->user()->extension ?? '' }}">
                                            </div>  
                                            <div class="uk-text-center">  
                                                <a href="{{ route('profile') }}"><button class="  btn_com">Back</button></a>
                                                <button type="submit" class="btn_com">Submit</button>
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            </div>             
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>
    @endsection