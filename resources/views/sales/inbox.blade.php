@extends('sales.layouts.app')
@section('content')
<section class="mail_wrap">
    <div>
        <div class="mail_grip_wrap mail_theme">
            @include('sales.layouts.sidemenu')
            <div class="col_right_ca">
                <div class="col_maii_middle">
                    <div class="col_maiil_left">
                        <div class="panel_header" style="padding-left:10px"><i class="fa fa-inbox "></i> Inbox</div>
                        <ul uk-accordion>
                            @foreach($enquiry as $key => $value)
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
                                            <a data-id="{{ $value->id }}" class="readmail">
                                                <span
                                                    class="inb_date">{{ \Carbon\Carbon::parse($value->created_at)->diffForhumans() }}</span>
                                                <h4 class="sm_text"></h4>
                                                <h4 class="sm_text sub">{{ $value->subject }}</h4>
                                                <div class="text-pr">{{ $value->category->name ?? '' }}</div>
                                                <div class="posted_date">Posted Date:
                                                    {{ \Carbon\Carbon::parse($value->created_at)->format('d F Y') }}
                                                </div>
                                            </a>
                                            </hr>
                                      
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col_maii_right">
                        <div id="mail-placeholder" class="mail_expand uk-padding-right">
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
                    var html = '<div>';
                         html += '<div class="mail_expand uk-padding-right">';
                          html += '<h3 class="subject">'+obj.subject+'</h3>';
                          html += '<div class="main_head">';
                           html += '<div class="mailer_box">';
                            html += '<h3 class="mailer_name">'+obj.company.name+'</h3>';
                            html += '<div class="date">'+obj.created_at+'</div>';
                            html += '<div class="mail_id">'+obj.timeframe+'</div>';
                           html += '</div>';
                           html += '<div class="mailer_box_params" style="margin-left: 85px;">';
                            html += '<div class="mailer_category">Category : ' + obj.category.name+'</div>';
                            html += '<div class="mailer_country">Country : ' + obj.country.name+'</div>';
                            html += '<div class="mailer_region">'+regionname+'</div>';
                           html += '</div>';
                         html += '</div>';
                         html += '<div class="mail_text uk-margin-top mail_content">'+obj.body+'</div>';
                         html += '<div class="mail_attachment"></div>';
                         html += '<div class="uk-margin-top editbutton"><hr>';
                         if(obj.is_limited == 1){
                            if(obj.limited_status == 0){
                                html += '<p>This is a limited participant enquiry. Do you want to participate ?<p>';
                                html += '<a href="" class="uk-button uk-button-default "> I`m interested</a>';
                                html += '<a href="" class="uk-button uk-button-default "> I`m not interested</a>';
                            }
                            else{
                                html += '<p>Thank you for showing your interest.<p>';
                            }
                         } 
                         else{
                            html += '<a href="" class="uk-button uk-button-default "> Reply</a>';
                         }
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