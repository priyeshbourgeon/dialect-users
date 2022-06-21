@extends(strtolower(auth()->user()->designation).'.layouts.app')
@section('content')
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
                            @php $url = strtolower(auth()->user()->designation) == 'admin' ? 'admin/home' : strtolower(auth()->user()->designation).'/inbox'; @endphp    
                            <a href="{{ url($url) }}" style="background: #20285b;width:70%;" class="btn_com uk-align-center"> Back to inbox</a>
                                <div class="inner">
                                    <div class="profile_dp">
                                            <div class="dp" style="background: url(images/dp_150x150.png);">
                                                <a href="{{ route('profile.change-dp') }}"> <i class="fa fa-edit"></i> </a>
                                            </div>
                                            <h3 class="name">{{ Auth::user()->name ?? '' }}</h3>
                                            <p class="description">{{ Auth::user()->designation ?? '' }}</p>
                                    </div> 
                                    <hr>          
                                    <div class="profile_information">
                                    <ul>
                                                 <li>
                                                    <div>   <i class="fa fa-tag"></i></div>
                                                    <div> {{ Auth::user()->role ?? '' }} </div>
                                                </li>
                                                <li>
                                                    <div>   <i class="fa fa-mobile"></i></div>
                                                    <div> {{ Auth::user()->mobile ?? '' }} </div>
                                                </li>

                                                <li>
                                                    <div>   <i class="fa fa-envelope-o"></i></div>
                                                    <div> {{ Auth::user()->email ?? '' }}</div>
                                                </li>

                                                <li>
                                                    <div>   <i class="fa fa-phone"></i></div>
                                                    <div> {{ Auth::user()->landline ?? '' }} </div>
                                                </li>
                                            </ul>
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
									    <a href="{{ route('profile.edit') }}" class="btn_com">Edit Profile</a>
                                        <a href="{{ route('profile.theme') }}" class="btn_com"> Change Color Theme</a>
                                        <a href="{{ route('change-password') }}" class="btn_com"> Change Password</a>
                                    </div> 
                                    <hr>   
                                    <div class="profile_information">
                                    <div class="">
                                    <form action="{{ route('update-password') }}" method="post">
                    @csrf
               
                    
                    <div class="inner">
                        
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
                                        <input style="width: 100%;" class="uk-input uk-form-width-medium" type="password" placeholder="Current Password" name="current-password" required >
                                    </div>
                                    <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">                     
                                        <input style="width: 100%;" class="uk-input uk-form-width-medium" type="password" placeholder="New Password" name="new-password" required>
                                    </div>
                                    <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">
                                        <input style="width: 100%;" class="uk-input uk-form-width-medium" type="password" placeholder="Confirm Password"  name="new-password_confirmation" required>
                                    </div>                 
                                    <div class="uk-text-center">  
                                        <a href="{{ route('profile') }}"><button class="  btn_com">Back</button></a>
                                        <button class="btn_com">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </form>
                </div>								 
                                    </div>    
                                        
                                           
                                </div>
                            </div>
                </div>
				</div>
			</div>
            
			
        </section>
    @endsection

@extends(strtolower(auth()->user()->designation).'.layouts.app')
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
                                        <input style="width: 100%;" class="uk-input uk-form-width-medium" type="password" placeholder="Current Password" name="current-password" required >
                                    </div>
                                    <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">                     
                                        <input style="width: 100%;" class="uk-input uk-form-width-medium" type="password" placeholder="New Password" name="new-password" required>
                                    </div>
                                    <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">
                                        <input style="width: 100%;" class="uk-input uk-form-width-medium" type="password" placeholder="Confirm Password"  name="new-password_confirmation" required>
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