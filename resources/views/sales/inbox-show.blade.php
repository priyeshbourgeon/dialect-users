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
                       <li><a href="{{ route('sales.home') }}"> <i class="fa fa-inbox "></i> <span class="nav_text">  Inbox </span> </a></li>
                       <li><a href="{{ route('sales.outbox') }}"><i class="fa fa-paper-plane-o "></i>  <span class="nav_text"> Sent </span> </a></li>
                       <li><a href=""><i class="fa fa-file-text-o"></i>  <span class="nav_text"> Draft </span> </a></li>
                       <li><a href="{{ route('sales.enquiry-timeout') }}"><i class="fa fa-calendar-times-o"></i>  <span class="nav_text"> Enquiry Timeout </span> </a></li>
                       <li><a href=""><i class="fa fa-calendar"></i>  <span class="nav_text"> Upcoming Events </span> </a></li>
                    </ul>
                </div>
            </div>
            <div class="col_right_ca">
                        <h1 class="comm_title">Hi, {{ Auth::user()->name ?? '' }}</h1>
                        <div class="col_maii_middle">

                          <div class="col_maiil_left">
                            <div class="col uk-margin-small uk-card uk-card-default uk-card-small uk-card-body">
                                <div class="panel_header"> Inbox</div>
                               
    
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
                        <form action="{{ route('sales.sendreply') }}" method="post"  enctype="multipart/form-data">
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
                        </form>
                    </div>
                        </article>
                                
                    </div>
                              </div>
                          </div>
                        </div>


                        
    
                       
                        

                    <div class="col_maii_right">
                        <div class=" uk-card uk-card-default uk-card-small uk-card-body">
                            <div class="panel_header"> Details</div>
                            <div class="uk-child-width-1-1@s">
                                @if($mail->request_time > \Carbon\Carbon::today())
                                <p class="uk-article-meta"><strong>Valid Upto : </strong> {{ \Carbon\Carbon::parse($mail->request_time)->format('d F Y') }}</p>
                                @else
                                <p class="uk-article-meta"><strong>Expired On :</strong> {{ \Carbon\Carbon::parse($mail->request_time)->format('d F Y') }}</p>
                                @endif
                                <p class="uk-article-meta"><strong>Category : </strong> {{ $mail->category->name ?? '' }}</p>
                                <p class="uk-article-meta"><strong>Country : </strong> {{ $mail->country->name ?? '' }}</p>
                                <p class="uk-article-meta"><strong>Region : </strong> {{ $mail->region->name ?? '' }}</p>
                                <p class="uk-article-meta"><strong>Sent On :</strong> {{ \Carbon\Carbon::parse($mail->created_at)->format('d F Y') }}</p>
                                <p class="uk-article-meta"><strong>Sent By :</strong> {{ $mail->user->name ?? '' }}</p>
                                <hr class="uk-divider-icon">
                                @if($mail->attachment)
                                    <a href="{{ $mail->attachment ?? '' }}" download>
                                    <i class="fa fa-download mr-2" aria-hidden="true"></i>Download Attachment</a>
                                @endif
                            </div>  
                        </div>
                    </div>

                    
                  

                </div>
                </div>
                </div>
            </div>
        </section>
    
@endsection

       
