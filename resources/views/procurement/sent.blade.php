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
                        <a  href="{{ route('user.procurement.create') }}"> <i class="fa fa-plus"></i> <span> Generate Quote </span></a>
                    </div>
                    <hr>
                    <ul>
                        <li><a href="{{ route('user.procurement.index') }}"> <i class="fa fa-inbox "></i> <span class="nav_text">  Inbox </span> <span class="count">5</span> </a></li>
                        <li><a href="{{ route('user.procurement.mailSend') }}"><i class="fa fa-paper-plane-o "></i>  <span class="nav_text"> Sent </span> </a></li>
                   </ul>
                </div>
            </div>
            <div class="col_right_ca">
                <h1 class="comm_title">Sent</h1>
                <div class="col_maii_middle">
                    <div class="col_maiil_left">
                        <div class="col uk-margin-small uk-card uk-card-default uk-card-small uk-card-body">        
                            <div class="panel_header"> Notification</div>
                                <div class="uk-overflow-auto table_ct">
                                    <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">   
                                      <tbody>
                                      @forelse( $mails as $key => $mail )
                                          <tr>
                                          <td class="uk-text-nowrap">
                                                    <a class="uk-link-reset" href="{{ route('user.procurement.emailView',$mail->id) }}">
                                                        {{ ucfirst($mail->sender_name) }}
                                                    </a>    
                                                </td>                               
                                                <td class="uk-table-link">
                                                    <a class="uk-link-reset" href="{{ route('user.procurement.emailView',$mail->id) }}">
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
                                <div class="panel_header"> General Statics</div>
    
                            </div>
    
    
                        </div>  
    
                        </div>
                        

                    </div>

                    
                  

                </div>
 
            </div>
        </section>
    
@endsection

       
