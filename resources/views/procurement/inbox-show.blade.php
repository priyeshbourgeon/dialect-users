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
                                <li><a href="{{ route('procurement.home') }}"> <i class="fa fa-inbox "></i> <span class="nav_text">  Inbox </span> <span class="count">5</span> </a></li>
                                <li><a href="{{ route('procurement.outbox') }}"><i class="fa fa-paper-plane-o "></i>  <span class="nav_text"> Sent </span> </a></li>
                            </ul>

                        </div>
                    </div>

                    <div class="col_right_ca">
                        <h1 class="comm_title">Mail</h1>
                        <div class="col_maii_middle">

                          <div class="col_maiil_left">
                            <div class="col uk-margin-small uk-card uk-card-default uk-card-small uk-card-body">
                                
                                
                                <div class="panel_header"> Notification</div>
                               
    
                                <div class="uk-overflow-auto table_ct">
                                <div class="uk-overflow-auto table_ct">
                    <article class="uk-article">
                        <h3 class="uk-card-title"><a class="uk-link-reset" href="">{{ $mail->subject }}</a></h3>
                        <div class="uk-child-width-1-2@s" uk-grid>
                            <h4 class="uk-text-bold">{{ ucfirst($mail->sender_name) }}</h4>
                            <div class="uk-article-meta uk-text-right">{{ \Carbon\Carbon::parse($mail->created_at)->diffForhumans() }}</div>
                        </div>    
                        <p class="uk-text-lead">{!! $mail->description !!}</p>

                        <hr class="uk-divider-icon">
                        @if($mail->attachment)
                            <a href="{{ $mail->attachment ?? '' }}" download>Download Attachment</a>
                        @endif
                        <div class="uk-overflow-auto table_ct">
                   <!--     <form action="{{ route('sales.sendreply') }}" method="post"  enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="mail_id" value="{{ $mail->id }}" /> 
                            <div class="uk-child-width-expand@s uk-text-center" uk-grid>
                                    <div>
                                        <div class=" form_group">
                                            <label class="uk-form-label" for="form-stacked-text">Reply</label>
                                            <div class="uk-form-controls">
                                                <textarea id="summernote" name="reply_body"></textarea>
                                            </div>
                                            @error('body')
                                            <small class="error">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                            </div>
                            <div class="uk-width-expand@1-1">
                                                            <div class=" form_group">
                                                                <label class="uk-form-label" for="form-stacked-text">Attachment</label>
                                                                <div class="uk-form-controls">
                                                                    <div class="wrap_select_dropdown">
                                                                    <input type="file" name="attachment" />
                                                                   </div>
                                                                </div>
                                                            </div>
                                                            </div>
                            <div class="uk-child-width-expand@s uk-text-center uk-margin" uk-grid>
                                <br><br>
                                <button type="submit" class="btn_com">Send</button>
                            </div>
                        </form> -->
                    </div>
                        </article>
                                
                    </div>
                              </div>
                          </div>
                        </div>


                        
    
                        </div>
                        

                    </div>

                    
                  

                </div>
 
            </div>
        </section>
    
@endsection

       
