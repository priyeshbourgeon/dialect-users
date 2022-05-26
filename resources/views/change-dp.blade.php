@extends(auth()->user()->designation.'.layouts.app')
@section('content')
 <!-- banner -->
 <style>
     #id{
        background-size:cover;
        background-position: center;
        max-height:25px;
     }
 </style>
 <section class="mail_wrap">
            <div class="uk_container">
                <div class="ad_profile">
                        <div class="">
                            <div class=" uk-card uk-card-default uk-card-small uk-card-body">
                                <div class="inner">
                                    <a href="{{ route('profile') }}" class="btn_back">   <i class="fa fa-arrow-left"></i> Back </a>
                                        <div class="form_wraper uk-card-large uk-margin-medium-top">
                                            <div class=" form_group">
                                                <label class="uk-form-label" for="form-stacked-text">Upload File </label>
                                                <div class="profile_dp">
                                                    <div class="uk-form-controls">    
                                                        <div  id="dp" class="dp" style="background: url(images/dp_150x150.png);">
                                                    </div>
                                                </div>
                                                    <div class="uk-margin  uploads"  uk-margin>
                                                        
                                                        <div uk-form-custom="target: true" style="width: 100%;">
                                                            <input id='getval' type="file">
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
        <script>
            document.getElementById('getval').addEventListener('change', readURL, true);
            function readURL(){
                var file = document.getElementById("getval").files[0];
                var reader = new FileReader();
                reader.onloadend = function(){
                    document.getElementById('dp').style.backgroundImage = "url(" + reader.result + ")";        
                }
                if(file){
                    reader.readAsDataURL(file);
                    }else{
                    }
            }
        </script>
    @endsection