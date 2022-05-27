@extends('admin.layouts.app')
@section('content')
 <!-- banner -->
        <section class="mail_wrap">
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
                                    <hr>          
                                    <div class="profile_information">
                                            <ul>
                                                 <li>
                                                    <div>   <i class="fa fa-tag"></i></div>
                                                    <div> {{ $user->role ?? '' }} </div>
                                                </li>
                                                <li>
                                                    <div>   <i class="fa fa-mobile"></i></div>
                                                    <div> {{ $user->mobile ?? '' }} </div>
                                                </li>

                                                <li>
                                                    <div>   <i class="fa fa-envelope-o"></i></div>
                                                    <div> {{ $user->email ?? '' }}</div>
                                                </li>

                                                <li>
                                                    <div>   <i class="fa fa-phone"></i></div>
                                                    <div> {{ $user->landline ?? '' }} </div>
                                                </li>
                                            </ul>
                                    </div> 
                                    <div class="footer">
                                        <a href="{{ url()->previous() }}" class="btn_com"> Back</a>
                                        <a href="#" class="btn_com"> Change Password</a>
                                        <a href="{{ route('profile.edit') }}" class="btn_com"> Edit Profile</a>
                                    </div>                    
     
                                </div>
                            </div>
                        </div>

                </div>
 
            </div>
        </section>
    @endsection