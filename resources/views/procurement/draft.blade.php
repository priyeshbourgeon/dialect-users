@extends('procurement.layouts.app')
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
                <h1 class="comm_title">Hi, {{ Auth::user()->name ?? '' }}</h1>
                <div class="col_maii_middle">
                    <div class="col_maiil_left">
                        <div class="col uk-margin-small uk-card uk-card-default uk-card-small uk-card-body">        
                            <div class="panel_header"> Draft</div>
                                <div class="uk-overflow-auto table_ct">
                                    <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">   
                                      <tbody>
                                      @forelse( $mails as $key => $mail )
                                          <tr>                         
                                                <td class="uk-table-link">
                                                    <a class="uk-link-reset" href="{{ route('procurement.draft.show',$mail->id) }}">
                                                    <strong> {{ $mail->subject }}</strong>
                                                    </a>
                                                </td>
                                                <td>
                                                <a class="uk-link-reset" href="{{ route('procurement.draft.show',$mail->id) }}">
                                                @if($mail->request_time > \Carbon\Carbon::today())
                                                <p class="uk-article-meta"><strong>Valid Upto : </strong> {{ \Carbon\Carbon::parse($mail->request_time)->format('d F Y') }}</p>
                                                @else
                                                <p class="uk-article-meta"><strong>Expired On :</strong> {{ \Carbon\Carbon::parse($mail->request_time)->format('d F Y') }}</p>
                                                @endif
                                                </a>
                                                </td>
                                                <td class="uk-text-nowrap mail_date">
                                                <a class="uk-link-reset" href="{{ route('procurement.draft.show',$mail->id) }}">
                                                    {{ \Carbon\Carbon::parse($mail->created_at)->diffForhumans() }}
                                                </a>
                                                </td>
                                          </tr>
                                          @empty
                                          <tr>
                                              <td style="height:250px;text-align:center;" colspan="3">No Mails Found!</td>
                                          </tr>
                                          @endforelse 
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                        </div>


                          <div class="col_maii_right">
                            <div class=" uk-card uk-card-default uk-card-small uk-card-body">
                                <div class="panel_header"> Notification & Approvals</div>
    
                            </div>
    
    
                        </div>  
    
                        </div>
                        

                    </div>

                    
                  

                </div>
 
            </div>
        </section>
    
@endsection

       
