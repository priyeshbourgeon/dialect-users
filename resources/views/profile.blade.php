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
        <div class="mail_grip_wrap">
            <div class="col_maii_left toggle_sidebar">        
                <div class=" uk-card uk-card-default uk-card-small ">
                    <div class="side_anglebnt">
                        <div class="tog_btn">
                            <i class="fa fa-angle-left"></i>
                        </div>
                    </div>  
                    <div class="compose_mail">
                        <a  href="{{ route('procurement.compose-one') }}"> <i class="fa fa-plus"></i> <span> Generate Quote </span></a>
                    </div>
                    <hr>
                    <ul>
                       <li><a uk-tooltip="title: Inbox" href="{{ route('procurement.home') }}"> <i class="fa fa-inbox "></i> <span class="nav_text">  Inbox </span> </a></li>
                       <li><a uk-tooltip="title: Sent" href="{{ route('procurement.outbox') }}"><i class="fa fa-paper-plane-o "></i>  <span class="nav_text"> Outbox </span> </a></li>
                       <li><a uk-tooltip="title: Draft" href="{{ route('procurement.draft') }}"><i class="fa fa-file-text-o"></i>  <span class="nav_text"> Draft </span> </a></li>
                       <li><a uk-tooltip="title: Upcoming Events" href="{{ route('procurement.events') }}"><i class="fa fa-calendar"></i>  <span class="nav_text"> Upcoming Events </span> </a></li>
                    </ul>
                </div>
            </div>
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
                                        <a href="#" class="btn_com"> Change Background Image</a>
                                        <a href="{{ route('change-password') }}" class="btn_com"> Change Password</a>
                                    </div> 
                                    <hr>          
                                    <div class="profile_information">
                                         <h3 class="name">Business Categories
                                         <a href="{{ url()->previous() }}" class="btn_com uk-align-right">Edit</a>
                                         </h3>
                                         <div>
                                         @foreach($subcategories as $key => $val)
                                             <span class="uk-label">{{ $val->name ?? ''}}</span>
                                         @endforeach    
                                         </div>										 
                                    </div>                  
                                </div>
                            </div>
                </div>
				</div>
			</div>
            
			
        </section>
    @endsection