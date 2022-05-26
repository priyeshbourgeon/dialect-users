@extends(auth()->user()->designation.'.layouts.app')
@section('content')
<!-- banner -->

        
        <section class="mail_wrap">
            <div class="uk_container">
                <div class="ad_profile">
                        <div class="">
                            <div class=" uk-card uk-card-default uk-card-small uk-card-body">
                                <div class="inner">
                                    <a href="{{ route('profile') }}" class="btn_back">   <i class="fa fa-arrow-left"></i> Back </a>
                                        <div class="form_wraper uk-card-large uk-margin-medium-top">
                                            <div class=" form_group">

                                            
                                                <label class="uk-form-label" for="form-stacked-text">Change Password </label>
                                                <div class="uk-form-controls">
                                                 
                                                    
                                                    <div class="uk-margin  uploads"  uk-margin>
                                                        <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">
                                                         
                                                            <input style="width: 100%;" class="uk-input uk-form-width-medium" type="text" placeholder="Current Password" >
                                                        </div>
                                                        <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">
                                                         
                                                            <input style="width: 100%;" class="uk-input uk-form-width-medium" type="text" placeholder="New Password" >
                                                        </div>
                                                        <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">
                                                         
                                                            <input style="width: 100%;" class="uk-input uk-form-width-medium" type="text" placeholder="Confirm Password" >
                                                        </div>
                                                     
                                                     <div class="uk-text-center">  
                                                          <a href="{{ route('profile') }}"><button class="  btn_com">Back</button></a>
                                                          <button class="  btn_com">Submit</button>
                                                     </div>
                                                    </div>
                    
                                                 
                                                </div>
                                            </div>


                                        </div>
                                      
                                     
                            </div>
                        </div>

                </div>
 
            </div>
        </section>
    
    @endsection