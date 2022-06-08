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
                        <li><a href="{{ route('sales.outbox') }}"><i class="fa fa-paper-plane-o "></i>  <span class="nav_text"> Sent </span> </a></li>
                        <!-- <li><a href=""><i class="fa fa-file-text-o"></i>  <span class="nav_text"> Draft </span> </a></li> -->
                        <li><a href="{{ route('sales.enquiry-timeout') }}"><i class="fa fa-calendar-times-o"></i>  <span class="nav_text"> Enquiry Timeout </span> </a></li>
                        <li><a href="{{ route('sales.events') }}"><i class="fa fa-calendar"></i>  <span class="nav_text"> Upcoming Events </span> </a></li>
                    </ul>
                </div>
            </div>
            <div class="col_right_ca">          
                <div class="col_maii_middle">
                    <div class="col_maiil_left">
                        <div class="panel_header" style="padding-left:10px"><i class="fa fa-paper-plane-o "></i> Outbox</div>
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
                                            <a  data-id="{{ $mail->id }}" class="readmail">  
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
                                <img src="{{ asset('assets/images/data/nodatafound.png') }}" style="margin-left:25%;"/>
                                <h4 style="margin-left:32%;">No Enquiries Found!</h4>
                            </li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="col_maii_right">
                    <div class="mail_expand uk-padding-right">
                            <h3 class="subject">
                                
                            </h3>
                            <div class="main_head">
                                
                                <div class="mailer_box">
                                    <h3 class="mailer_name"> </h3>
                                    <div class="date"></div>
                                    <div class="mail_id"></div>
                                </div>
                                <div class="mailer_box_params" style="margin-left: 85px;">
                                     <div class="mailer_category"> </div>
                                     <div class="mailer_country"> </div>
                                     <div class="mailer_region"> </div>
                                </div>
                            </div>
                            <div class="mail_text uk-margin-top mail_content">
                                
                            </div>
                            <div class="mail_attachment">

                            </div>
                            <!-- nest Section  -->
                            <div class="uk-margin-top editbutton">
                                
                            </div>           
                            
                      </div>
                    </div>
                </div>        
            </div>            
        </div>          
    </div>
</div>
<input type="hidden" id="fetch_mail_url" value="{{ route('procurement.getMailContent') }}" />
</section>
@push('scripts')
<script>
    $("body").on("click",".readmail",function(){
        $('div').removeClass('current_mail');
		var fetch_mail_url = $("#fetch_mail_url").val();
		var mailId = $(this).data('id'); 
        $(this).parent().parent().addClass('current_mail');
		var token = $('meta[name="csrf-token"]').attr('content');   
		if(mailId){
			$.ajax({
				type:"POST",
				url: fetch_mail_url,
				data:{
					'_token':token,
					'id':mailId
				},
				beforeSend: function() {
                    $('.subject').empty().addClass('skeleton skeleton-text');
                    $('.mailer_name').empty().addClass('skeleton skeleton-text skeleton-footer');
                    $('.date').empty().addClass('skeleton skeleton-text skeleton-footer');
                    $('.mail_id').empty().addClass('skeleton skeleton-text skeleton-footer');
                    $('.mail_attachment').empty();
					$('.mail_content').empty().addClass('skeleton skeleton-text skeleton-text__body');
                    $('.mailer_category').empty().addClass('skeleton skeleton-text');
                    $('.mailer_country').empty().addClass('skeleton skeleton-text');
                    $('.mailer_region').empty().addClass('skeleton skeleton-text');
				},
				success:function(res){        
					if(res){
                        obj = jQuery.parseJSON(res);
						$('.subject').text(obj.subject).removeClass('skeleton skeleton-text');
                        $('.mailer_name').text(obj.sender_name).removeClass('skeleton skeleton-text skeleton-footer');
                        $('.date').text(obj.created_at).removeClass('skeleton skeleton-text skeleton-footer');
                        $('.mail_id').text(obj.request_time).removeClass('skeleton skeleton-text skeleton-footer');
                        $('.mail_content').html(obj.description).removeClass('skeleton skeleton-text skeleton-text__body');
                        if(obj.attachment){
                           $('.mail_attachment').html('<a href="'+obj.attachment+'" download  uk-tooltip="title: Download Attachment" ><i class="fa fa-paperclip mr-2" aria-hidden="true"></i>Download Attachment</a>')
                        }
                        else{
                            $('.mail_attachment').empty();
                        }
                        $('.mailer_category').text('Category : '+obj.category.name).removeClass('skeleton skeleton-text skeleton-footer');
                        $('.mailer_country').text('Country : '+obj.country.name).removeClass('skeleton skeleton-text skeleton-footer');
                        var regionname = !obj.region ?  'All Region' : obj.region.name; 
                        $('.mailer_region').text('Region : '+regionname).removeClass('skeleton skeleton-text skeleton-footer');
                    }else{
						$('.subject').empty();
                        $('.mailer_name').empty();
                        $('.date').empty();
                        $('.mail_id').empty();
                        $('.mail_attachment').empty();
                        $('.mail_content').empty();
                        }
				}
			});
		}
		else{
			
		}
	});

</script>
@endpush  
@endsection

       
