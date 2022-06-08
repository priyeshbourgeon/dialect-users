@extends('procurement.layouts.app')
@section('content')
<!-- CONTAINER -->
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
                                <a  href="{{ URL::previous() }}"> <i class="fa fa-arrow-left"></i> <span> Go Back </span></a>
                            </div>
                            <hr>
                            <ul>
                                <li class="{{ request()->is('sales/inbox') ? 'm-active' : '' }}"><a href="{{ route('sales.home') }}"> <i class="fa fa-inbox "></i> <span class="nav_text">  Inbox </span>  </a></li>
                                <li><a href="{{ route('sales.outbox') }}"><i class="fa fa-paper-plane-o "></i>  <span class="nav_text"> Outbox </span> </a></li>
                                <!-- <li><a href=""><i class="fa fa-file-text-o"></i>  <span class="nav_text"> Draft </span> </a></li> -->
                                <li><a href="{{ route('sales.enquiry-timeout') }}"><i class="fa fa-calendar-times-o"></i>  <span class="nav_text"> Enquiry Timeout </span> </a></li>
                                <li><a href="{{ route('sales.events') }}"><i class="fa fa-calendar"></i>  <span class="nav_text"> Upcoming Events </span> </a></li>
                            </ul>

                        </div>
                    </div>

                    <div class="col_right_ca">
                        
                        <div class="col_maii_middle">

                          <div class="col_maiil_left"  style="width:100%">
                            <div class="col uk-margin-small uk-card uk-card-default uk-card-small uk-card-body">
                                
                                
                                <div class="panel_header">Reply to mail : {{ $mail->reference_no ?? ''}} </div>
                                <form action="{{ route('sales.sendreply') }}" method="post"  enctype="multipart/form-data">
                                 @csrf
                                 <input type="hidden" name="mail_id" value="{{ $mail->id }}" /> 
                                <div class=" form_wraper">
                                <div class=" form_group">
                                        <label class="uk-form-label" for="form-stacked-text">Subject</label>
                                        <div class="uk-form-controls">
                                            <input name="subject" class="uk-input" id="form-stacked-text" type="text" placeholder="Some text...">
                                        </div>
                                        @error('subject')
								        <small class="error">{{ $message }}</small>
							            @enderror
                                    </div>

                                    <div class=" form_group">
                                        <label class="uk-form-label" for="form-stacked-text">Body</label>
                                        <div class="uk-form-controls">
                                            <textarea id="summernote" name="reply_body"></textarea>
                                        </div>
                                        @error('body')
								        <small class="error">{{ $message }}</small>
							            @enderror
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
                                    </div>

                                    <div class="uk-text-right">
                                        <button name="submit" value="draft" class="btn_com uk-modal-close" style="width: 200px;">Save As Draft</button>
                                        <button name="submit" value="save" class="btn_com uk-modal-close" style="width: 150px;">Send</button>
                                         
                                    </div>

                                </div>
                          </div>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
</section>
@endsection