@extends('procurement.layouts.app')
@section('content')
<section class="mail_wrap">
    <div>
        <div class="mail_grip_wrap mail_theme">
            @include('procurement.layouts.sidemenu')
            <div class="col_right_ca">
                <div class="col_maii_middle">
                    <div class="col_maiil_left">
                        <div class="panel_header" style="padding-left:10px"><i class="fa fa-file-text-o"></i> Draft
                        </div>
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
                                            <a data-id="{{ $mail->id }}" class="readmail">
                                                <span
                                                    class="inb_date">{{ \Carbon\Carbon::parse($mail->created_at)->diffForhumans() }}</span>
                                                <h4 class="sm_text">{{ $mail->category->name ?? 'fetching cetgory...' }}
                                                </h4>
                                                <h4 class="sm_text sub">{{ $mail->reference_no }}</h4>
                                                <div class="text-pr">{{ $mail->subject }}</div>
                                                <div class="posted_date">Posted Date:
                                                    {{ \Carbon\Carbon::parse($mail->created_at)->format('d F Y') }}
                                                </div>
                                                <div class="posted_date">
                                                    @if($mail->request_time > \Carbon\Carbon::today())
                                                    Valid Upto :
                                                    {{ \Carbon\Carbon::parse($mail->request_time)->format('d F Y') }}
                                                    @else
                                                    Expired On :
                                                    {{ \Carbon\Carbon::parse($mail->request_time)->format('d F Y') }}
                                                    @endif
                                                </div>
                                            </a>
                                            </hr>
                                            @if($mail->attachment)
                                            <a href="{{ $mail->attachment ?? '' }}" download
                                                uk-tooltip="title: Download Attachment">
                                                <i class="fa fa-paperclip mr-2" aria-hidden="true"></i>
                                                Download Attachment</a>
                                            <a href="{{ $mail->attachment ?? '' }}" target="_blank"
                                                uk-tooltip="title: View Attachment">
                                                <i class="fa fa-paperclip mr-2" aria-hidden="true"></i>
                                                View Attachment</a>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @empty
                            <li class="uk-margin-remove">
                                <img src="{{ asset('assets/images/data/nodatafound.png') }}" style="margin-left:25%;" />
                                <h4 style="margin-left:32%;">No Enquiries Found!</h4>
                            </li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="col_maii_right">
                        <div id="mail-placeholder" class="mail_expand uk-padding-right">
                           

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
$("body").on("click", ".readmail", function() {
    $('div').removeClass('current_mail');
    var fetch_mail_url = $("#fetch_mail_url").val();
    var mailId = $(this).data('id');
    $(this).parent().parent().addClass('current_mail');
    var token = $('meta[name="csrf-token"]').attr('content');
    if (mailId) {
        $.ajax({
            type: "POST",
            url: fetch_mail_url,
            data: {
                '_token': token,
                'id': mailId
            },
            beforeSend: function() {
                $('.subject').empty().addClass('skeleton skeleton-text');
                $('.mailer_name').empty().addClass('skeleton skeleton-text skeleton-footer');
                $('.date').empty().addClass('skeleton skeleton-text skeleton-footer');
                $('.mail_id').empty().addClass('skeleton skeleton-text skeleton-footer');
                $('.mail_attachment').empty();
                $('.mail_content').empty().addClass('skeleton skeleton-text skeleton-text__body');
                $('.editbutton').empty().addClass('skeleton skeleton-text skeleton-footer');
                $('.mailer_category').empty().addClass('skeleton skeleton-text');
                $('.mailer_country').empty().addClass('skeleton skeleton-text');
                $('.mailer_region').empty().addClass('skeleton skeleton-text');
            },
            success: function(res) {
                if(res){
                    obj = jQuery.parseJSON(res);
                    var regionname = !obj.region ? 'All Region' : obj.region.name;
                    var company_name = !obj.company ? '' : obj.company.name;
                    var category_name = !obj.category ? '' : obj.category.name;
                    var country_name = !obj.country ? '' : obj.country.name;
                    var html = '<div>';
                         html += '<div class="mail_expand uk-padding-right">';
                          html += '<h3 class="subject">'+obj.subject+'</h3>';
                          html += '<div class="main_head">';
                           html += '<div class="mailer_box">';
                            html += '<h3 class="mailer_name">'+company_name+'</h3>';
                            html += '<div class="date">'+obj.created_at+'</div>';
                            html += '<div class="mail_id">'+obj.timeframe+'</div>';
                           html += '</div>';
                           html += '<div class="mailer_box_params" style="margin-left: 85px;">';
                            html += '<div class="mailer_category">Category : ' + category_name+'</div>';
                            html += '<div class="mailer_country">Country : ' + country_name+'</div>';
                            html += '<div class="mailer_region">'+regionname+'</div>';
                           html += '</div>';
                         html += '</div>';
                         html += '<div class="mail_text uk-margin-top mail_content">'+obj.body+'</div>';
                         html += '<div class="mail_attachment"></div>';
                         html += '<div class="uk-margin-top editbutton"><hr>';
                          html += '<a href="" class="uk-button uk-button-default "> Edit</a>';
                          html += '<a href="" class="uk-button uk-button-default "> Discard</a>';
                        html += '</div></div>'; 
                        //console.log(html);
                    $('#mail-placeholder').html(html);             
                }
            }
        });
    } else {

    }
});
</script>
@endpush
@endsection