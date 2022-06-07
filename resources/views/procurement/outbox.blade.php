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
                    <div class="compose_mail">
                        <a  href="{{ route('procurement.compose-one') }}"> <i class="fa fa-plus"></i> <span> Generate Quote </span></a>
                    </div>
                    <hr>
                    <ul>
                       <li><a uk-tooltip="title: Inbox" href="{{ route('procurement.home') }}"> <i class="fa fa-inbox "></i> <span class="nav_text">  Inbox </span> </a></li>
                       <li><a uk-tooltip="title: Sent" href="{{ route('procurement.outbox') }}"><i class="fa fa-paper-plane-o "></i>  <span class="nav_text"> Sent </span> </a></li>
                       <li><a uk-tooltip="title: Draft" href="{{ route('procurement.draft') }}"><i class="fa fa-file-text-o"></i>  <span class="nav_text"> Draft </span> </a></li>
                       <li><a uk-tooltip="title: Upcoming Events" href="{{ route('procurement.events') }}"><i class="fa fa-calendar"></i>  <span class="nav_text"> Upcoming Events </span> </a></li>
                    </ul>
                </div>
            </div>
            <div class="col_right_ca">          
                <div class="col_maii_middle">
                    <div class="col_maiil_left">
                        <ul uk-accordion>
                            @forelse($mails as $key => $mail)
                            <li class="uk-margin-remove">
                                <a class="" href="#">
                                    <div class="main_sml_box">
                                        <div class="sort_text">
                                            <!-- dropdow -->   
                                            <!-- <div class="more_inb"> <i class="fa fa-ellipsis-v"></i> </div>
                                            <div uk-dropdown="pos: bottom-right" >
                                                <ul class="uk-nav uk-dropdown-nav">
                                                    <li>Delete</li>
                                                </ul>
                                            </div> -->
                                            <!-- dropdow -->
                                            <a href="" data-id="{{ $mail->id }}">
                                            <span class="inb_date">{{ \Carbon\Carbon::parse($mail->created_at)->diffForhumans() }}</span>
                                            <h4 class="sm_text">{{ $mail->category->name ?? 'fetching cetgory...' }}</h4>
                                            <h4 class="sm_text sub">{{ $mail->reference_no }}</h4>
                                            <div class="text-pr">{{ $mail->subject }}</div>
                                            <div class="posted_date">Posted Date: {{ \Carbon\Carbon::parse($mail->created_at)->format('d F Y') }}</div>
                                            <div class="posted_date">
                                                @if($mail->request_time > \Carbon\Carbon::today())
                                                Valid Upto : {{ \Carbon\Carbon::parse($mail->request_time)->format('d F Y') }}
                                                @else
                                                Expired On : {{ \Carbon\Carbon::parse($mail->request_time)->format('d F Y') }}
                                                @endif
                                            </div>
                                            </a>
                                            </hr>
                                            @if($mail->attachment)
                                                <a href="{{ $mail->attachment ?? '' }}" download  uk-tooltip="title: Download Attachment" >
                                                    <i class="fa fa-paperclip mr-2" aria-hidden="true"></i>
                                                     Download Attachment</a>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @empty
                            <li class="uk-margin-remove">
                                <a class="uk-accordion-title" href="#">
                                    <div class="main_sml_box">                                      
                                        <div class="sort_text">
                                        <!-- dropdow -->   
                                        <!-- <div class="more_inb"> <i class="fa fa-ellipsis-v"></i> </div>
                                                <div uk-dropdown="pos: bottom-right" >
                                                    <ul class="uk-nav uk-dropdown-nav">
                                                        <li>Delete</li>
                                                    </ul>
                                                </div> -->
                                        <!-- dropdow -->       
                                            <span class="inb_date">Sun.8:08 AM</span>
                                            <h4 class="sm_text">Muhammed Shareef</h4>
                                            <h4 class="sm_text sub">Lorem ipsum dolor sit amet </h4>
                                            <div class="text-pr">
                                                roin sem augue, maximus nec dictum vel,
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="uk-accordion-content uk-margin-remove-top">
                                    <div class="main_sml_box sub">
                                        <div class="mail_dp">
                                            <img src="images/profile_dp.jpg" alt="">
                                        </div>
                                        <div class="sort_text">        
                                            <span class="inb_date">Sun.8:08 AM</span>
                                            <h4 class="sm_text">Muhammed Shareef  <span class="uk-badge">New</span></h4>
                                            <h4 class="sm_text sub">Lorem ipsum dolor sit amet </h4>
                                            <div class="text-pr">
                                                roin sem augue, maximus nec dictum vel,
                                            </div>
                                            <div class="posted_date">Posted Date: Tue, 27 ,2022 : 08:00 AM</div>
                                        </div>
                                    </div>
                                    <div class="main_sml_box sub">
                                        <div class="mail_dp">
                                            <img src="images/profile_dp.jpg" alt="">
                                        </div>
                                        <div class="sort_text">                    
                                            <span class="inb_date">Sun.8:08 AM</span>
                                            <h4 class="sm_text">Muhammed Shareef  <span class="uk-badge">New</span></h4>
                                            <h4 class="sm_text sub">Lorem ipsum dolor sit amet </h4>
                                            <div class="text-pr">
                                                roin sem augue, maximus nec dictum vel,
                                            </div>
                                            <div class="posted_date">Posted Date: Tue, 27 ,2022 : 08:00 AM</div>
                                        </div>
                                    </div>
                                    <div class="main_sml_box sub">
                                        <div class="mail_dp">
                                            <img src="images/profile_dp.jpg" alt="">
                                        </div>   
                                        <div class="sort_text">        
                                            <span class="inb_date">Sun.8:08 AM</span>
                                            <h4 class="sm_text">Muhammed Shareef  <span class="uk-badge">New</span></h4>
                                            <h4 class="sm_text sub">Lorem ipsum dolor sit amet </h4>
                                            <div class="text-pr">
                                                roin sem augue, maximus nec dictum vel,
                                            </div>
                                            <div class="posted_date">Posted Date: Tue, 27 ,2022 : 08:00 AM</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="col_maii_right">
                        <div class="mail_expand uk-padding-right">
                            <h3 class="subject">
                                roin sem augue, maximus nec dictum vel,
                            </h3>
                            <div class="main_head">
                                <div class="mail_dp">
                                    <img src="images/profile_dp.jpg" alt="">
                                </div>
                                <div class="mailer_box">
                                    <h3 class="mailer_name ">  Bourgeon Technologies Pvt. Ltd.  </h3>
                                    <div class="date"> Fri, 26, 2022, 9.05 AM</div>
                                    <div class="mail_id">info@123tech.com</div>
                                </div>
                            </div>
                            <div class="mail_text uk-margin-top">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla feugiat leo a lectus molestie varius non eget erat. Nulla tristique nisl in convallis pretium. Nullam maximus, nunc sit amet fermentum tincidunt, velit libero tincidunt ante, eget bibendum ipsum ligula at erat. Nunc tempor augue ut eros porttitor, in vehicula tortor faucibus. Donec rutrum, justo et ornare placerat, velit neque iaculis magna, in ullamcorper erat eros ut neque. Vivamus lacinia ligula tellus, sit amet scelerisque nibh interdum vitae. Phasellus vestibulum ligula a nulla auctor tincidunt at mattis sem. Maecenas mollis blandit facilisis. Quisque luctus justo nec mi luctus tempus. Sed risus nulla, elementum in vulputate ac, commodo sit amet nibh. Nulla a quam ut lacus consectetur pretium              
                            </div>
                            <!-- nest Section  -->
                            <div class="uk-margin-top">
                                <button class="uk-button uk-button-default "><i class="fa fa-reply" aria-hidden="true"></i> Replay</button>
                            </div>           
                            <div class="main_head uk-margin-medium-top">
                                <div class="mail_dp">
                                    <img src="images/profile_dp.jpg" alt="">
                                </div>
                                <div class="mailer_box">
                                <h3 class="mailer_name ">  Bourgeon Technologies Pvt. Ltd.  </h3>
                                <div class="date"> Fri, 26, 2022, 9.05 AM</div>
                                <div class="mail_id">info@123tech.com</div>
                            </div>
                        </div>
                        <div class="mail_text uk-margin-top">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla feugiat leo a lectus molestie varius non eget erat. Nulla tristique nisl in convallis pretium. Nullam maximus, nunc sit amet fermentum tincidunt, velit libero tincidunt ante, eget bibendum ipsum ligula at erat. Nunc tempor augue ut eros porttitor, in vehicula tortor faucibus. Donec rutrum, justo et ornare placerat, velit neque iaculis magna, in ullamcorper erat eros ut neque. Vivamus lacinia ligula tellus, sit amet scelerisque nibh interdum vitae. Phasellus vestibulum ligula a nulla auctor tincidunt at mattis sem.                    
                        </div>
                    </div>
                </div>        
            </div>            
        </div>          
    </div>
</div>
</section>
@endsection

       
