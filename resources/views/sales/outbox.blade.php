@extends('sales.layouts.app')
@section('content')
<section class="mail_wrap">
    <div>   
        <div class="mail_grip_wrap">
            <div class="col_maii_left toggle_sidebar">        
                <div class=" uk-card uk-card-default uk-card-small ">
                    <div class="side_anglebnt">
                        <div class="tog_btn">
                            <i class="fa fa-angle-left"></i>
                        </div>
                    </div>  
                    
                    <hr>
                    <ul>
                       <li><a href="{{ route('sales.home') }}"> <i class="fa fa-inbox "></i> <span class="nav_text">  Inbox </span>  </a></li>
                       <li><a href="{{ route('sales.outbox') }}"><i class="fa fa-paper-plane-o "></i>  <span class="nav_text"> Sent </span> </a></li>
                       <li><a href=""><i class="fa fa-file-text-o"></i>  <span class="nav_text"> Draft </span> </a></li>
                       <li><a href=""><i class="fa fa-calendar-times-o"></i>  <span class="nav_text"> Enquiry Timeout </span> </a></li>
                       <li><a href=""><i class="fa fa-calendar"></i>  <span class="nav_text"> Upcoming Events </span> </a></li>
                    </ul>
                </div>
            </div>
            <div class="col_right_ca">
                <h1 class="comm_title">Hi, {{ Auth::user()->name ?? '' }}</h1>
                <div class="col_maii_middle">
                    <div class="col_maiil_left">
                        <div class="col uk-margin-small uk-card uk-card-default uk-card-small uk-card-body">        
                            <div class="panel_header"> Sent</div>
                                <div class="uk-overflow-auto table_ct">
                                    <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">   
                                      <tbody>
                                      @forelse( $mails as $key => $mail )
                                          <tr>
                                          <td class="uk-text-nowrap">
                                                    <a class="uk-link-reset" href="{{ route('sales.outbox.show',$mail->id) }}">
                                                        {{ ucfirst($mail->sender_name) }}
                                                    </a>    
                                                </td>                               
                                                <td class="uk-table-link">
                                                    <a class="uk-link-reset" href="{{ route('sales.outbox.show',$mail->id) }}">
                                                        {{ $mail->subject }}
                                                    
                                                    </a>
                                                </td>
                                                <td class="uk-text-nowrap mail_date">
                                                    {{ \Carbon\Carbon::parse($mail->created_at)->diffForhumans() }}
                                                </td>
                                          </tr>
                                          @empty
                                          <tr>
                                              <td></td>
                                          </tr>
                                          @endforelse 
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                        </div>


                          <div class="col_maii_right">
                            <div class=" uk-card uk-card-default uk-card-small uk-card-body">
                                <div class="panel_header">Notification & Approvals</div>
    
                            </div>
    
    
                        </div>  
    
                        </div>
                        

                    </div>

                    
                  

                </div>
 
            </div>
        </section>
    
@endsection

       
