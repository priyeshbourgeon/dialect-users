@extends(auth()->user()->designation.'.layouts.app')
@section('content')
 <!-- banner -->
 <section class="mail_wrap">
            <div class="uk_container">
                <div class="ad_profile">
                        <div class="">
                            <div class=" uk-card uk-card-default uk-card-small uk-card-body">
                                <div class="inner">
                                    <a href="profile.html" class="btn_back">   <i class="fa fa-arrow-left"></i> Back </a>
                                        <div class="form_wraper uk-card-large uk-margin-medium-top">
                                            <div class=" form_group">

                                            
                                                <label class="uk-form-label" for="form-stacked-text">Upload File </label>
                                                <div class="uk-form-controls">
                                                 
                                                    
                                                    <div class="uk-margin  uploads"  uk-margin>
                                                        <div uk-form-custom="target: true" style="width: 100%;">
                                                            <input type="file">
                                                            <input style="width: 100%;" class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled>
                                                        </div>
                                                        <p> (150x150 pixels)</p>
                                                     <div class="uk-text-center">   <button class="  btn_com">Submit</button></div>
                                                    </div>
                    
                                                 
                                                </div>
                                            </div>


                                        </div>
                                      
                                    <!-- <div class="footer">
                                        <a href="" class="btn_com"> change Background Image</a>
                                        <a href="" class="btn_com"> change Password</a>
                                        
                                    </div>                     -->
     
                                </div>
                            </div>
                        </div>

                </div>
 
            </div>
        </section>
    @endsection