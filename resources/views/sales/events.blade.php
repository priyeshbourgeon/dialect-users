@extends('procurement.layouts.app')
@section('content')
<section class="mail_wrap">
    <div>
        <div class="mail_grip_wrap mail_theme">
            <div class="col_maii_left toggle_sidebar">        
                <div class=" uk-card uk-card-default uk-card-small ">
                    <div class="side_anglebnt">
                        <div class="tog_btn">
                            <i class="fa fa-angle-left"></i>
                        </div>
                    </div>  
                   
                    <ul>
                        <li><a href="{{ route('sales.home') }}"> <i class="fa fa-inbox "></i> <span class="nav_text">  Inbox </span>  </a></li>
                        <li><a href="{{ route('sales.outbox') }}"><i class="fa fa-paper-plane-o "></i>  <span class="nav_text"> Outbox </span> </a></li>
                        <li><a href="{{ route('sales.draft') }}"><i class="fa fa-file-text-o"></i>  <span class="nav_text"> Draft </span> </a></li>
                        <li><a href="{{ route('sales.enquiry-timeout') }}"><i class="fa fa-calendar-times-o"></i>  <span class="nav_text"> Enquiry Timeout </span> </a></li>
                        <li class="{{ request()->is('sales/events') ? 'm-active' : '' }}"><a href="{{ route('sales.events') }}"><i class="fa fa-calendar"></i>  <span class="nav_text"> Upcoming Events </span> </a></li>
                    </ul>
                </div>
            </div>
            <div class="col_right_ca">          
                <div class="col_maii_middle">
                    <div class="col_maiil_left">
                        <div class="panel_header" style="padding-left:10px"><i class="fa fa-calendar"></i> Upcoming Events</div>
                        <ul uk-accordion>
                        <li class="uk-margin-remove">
                                <img src="{{ asset('assets/images/data/nodatafound.png') }}" style="margin-left:25%;"/>
                                <h4 style="margin-left:32%;">No Events Found!</h4>
                            </li>
                        </ul>
                    </div>
                    <div class="col_maii_right">
                        <div class="mail_expand uk-padding-right">
                            <h3 class="subject">
                                
                            </h3>
                            <div class="main_head">
                                <div class="mailer_box">
                                    <h3 class="mailer_name ">  </h3>
                                    <div class="date"></div>
                                    <div class="mail_id"></div>
                                </div>
                            </div>
                            <div class="mail_text uk-margin-top">
                               
                            </div>
                            <!-- nest Section  -->
                                 
                            
                        </div>
                        
                    </div>
                </div>        
            </div>            
        </div>          
    </div>
</div>
</section>
@endsection

       
