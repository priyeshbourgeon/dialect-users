@extends(auth()->user()->designation.'.layouts.app')
@section('content')
<!-- banner -->
<section class="mail_wrap">
    <div class="uk_container">
        <div class="ad_profile">  
        
            <div class="">
                <form action="{{ route('update-password') }}" method="post">
                    @csrf
                <div class=" uk-card uk-card-default uk-card-small uk-card-body">
                    
                    <div class="inner">
                        <a href="{{ route('profile') }}" class="btn_back">   <i class="fa fa-arrow-left"></i> Back </a>
                        <div class="form_wraper uk-card-large uk-margin-medium-top">
                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if($errors)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif 
                        <div class=" form_group">
                            <label class="uk-form-label" for="form-stacked-text">Change Password </label>
                            <div class="uk-form-controls">
                                <div class="uk-margin  uploads"  uk-margin>
                                    <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">                     
                                        <input style="width: 100%;" class="uk-input uk-form-width-medium" type="text" placeholder="Current Password" name="current-password" required >
                                    </div>
                                    <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">                     
                                        <input style="width: 100%;" class="uk-input uk-form-width-medium" type="text" placeholder="New Password" name="new-password" required>
                                    </div>
                                    <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">
                                        <input style="width: 100%;" class="uk-input uk-form-width-medium" type="text" placeholder="Confirm Password"  name="new-password_confirmation" required>
                                    </div>                 
                                    <div class="uk-text-center">  
                                        <a href="{{ route('profile') }}"><button class="  btn_com">Back</button></a>
                                        <button class="btn_com">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>    
@endsection