@extends('admin.layouts.app')
@section('content')
 <!-- banner -->
 <section class=" uk-padding-small uk-clearfix">
            <div class="uk_container ">
                <ul class="uk-breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Profile</a></li>
                    
                </ul>
            </div>

 

        </section>
        
        <section class="mail_wrap">
		    <div uk-grid>
			    <div>
					<div class="uk_container">
                <div class="ad_profile">
                        <div class="">
                            <div class=" uk-card uk-card-default uk-card-small uk-card-body">
                                <div class="inner">
                                    <div class="profile_dp">
                                            <div class="dp" style="background: url(images/dp_150x150.png);">
                                                <a href="{{ route('profile.change-dp') }}"> <i class="fa fa-edit"></i> </a>
                                            </div>
                                            <h3 class="name">{{ $user->name ?? '' }}</h3>
                                            <p class="description">{{ $user->designation ?? '' }}</p>
                                    </div> 
                                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				</div>
				<div class="uk-width-expand@m">
					<div class="uk_container">
                            <div class=" uk-card uk-card-default uk-card-small uk-card-body">
                                <div class="inner">
                                    <div class="profile_dp">
                                        <a href="{{ url()->previous() }}" class="btn_com"> Back</a>
                                        <a href="#" class="btn_com"> Change Password</a>
                                    </div> 
                                    <hr>          
                                    <div class="profile_information">
                                         <h3 class="name">Edit Profile</h3>
                                         <form  action="{{ route('staff.update',$user->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                         <div class="uk-margin  uploads"  uk-margin>
                                            <input type="hidden" name="user_id" value="{{ $user->id }}" />
                                            <input type="hidden" name="role" value="{{ $user->designation }}" />
                                            <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">                             
                                                <input name="name" style="width: 100%;" class="uk-input uk-form-width-medium" type="text" placeholder="Name" value="{{ $user->name ?? '' }}">
                                            </div>
                                            <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">                         
                                                <input name="designation" style="width: 100%;" class="uk-input uk-form-width-medium" type="text" placeholder="Designation" value="{{ $user->role ?? '' }}">
                                            </div>
                                            <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">             
                                                <input name="email" style="width: 100%;" class="uk-input uk-form-width-medium" type="text" placeholder="Email" value="{{ $user->email ?? '' }}">
                                            </div>
                                            <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">             
                                                <input name="mobile" style="width: 100%;" class="uk-input uk-form-width-medium" type="text" placeholder="Mobile" value="{{ $user->mobile ?? '' }}">
                                            </div>
                                            <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">             
                                                <input name="landline" style="width: 100%;" class="uk-input uk-form-width-medium" type="text" placeholder="Landline" value="{{ $user->landline ?? '' }}">
                                            </div>  
                                            <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">             
                                                <input name="extension" style="width: 100%;" class="uk-input uk-form-width-medium" type="text" placeholder="Extension" value="{{ $user->extension ?? '' }}">
                                            </div>  
                                            <div class="uk-text-center">  
                                                <button type="submit" class="btn_com">Submit</button>
                                            </div>
                                        </div> 
                                       </form>									 
                                    </div>                  
                                </div>
                            </div>
                        </div>
				    </div>
			    </div>
        </section>
    @endsection