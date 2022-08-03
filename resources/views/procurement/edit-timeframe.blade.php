@extends('procurement.layouts.app')
@section('content')
<!-- CONTAINER -->
<section class="mail_wrap">
    <div>
        <div class="mail_grip_wrap">
            @include('procurement.layouts.sidemenu')
            <div class="col_right_ca">
                <div class="col_maii_middle">
                    <div class="col_maiil_left" style="width:100%">
                        <div class="col uk-margin-small uk-card uk-card-default uk-card-small uk-card-body">
                            <div class="panel_header" style="background:#fff;color:#000;">Edit Timeframe </div>
                            <form action="{{ route('procurement.outbox.update-timeframe') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="mail_id" value="{{ $mail->id }}" />
                                <div class="panel_header" style="background:#fff;color:#000;">Reference No:
                                    {{ $mail->reference_no ?? ''}} </div>
                                <div class=" form_wraper">
                                    <div class="uk-width-1-1@m">
                                        <div class=" form_group">
                                            <label class="uk-form-label" for="form-stacked-text">Time Frame </label>
                                            <div class="uk-form-controls">
                                                <input type="date" class="uk-input" name="timeframe"
                                                    min="{{ date('Y-m-d') }}" value="{{ $mail->request_time }}"
                                                    required>
                                            </div>
                                            @error('timeframe')
                                            <small class="error">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-text-right">
                                    <button name="submit" value="save" class="btn_com uk-modal-close"
                                        style="width: 150px;">Save</button>
                                </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col_maii_middle">
                    <div class="col_maiil_left" style="width:100%">
                        <div class="col uk-margin uk-card uk-card-default uk-card-small uk-card-body"
                            style="margin-top:20px">
                            <div class="mail_expand uk-padding-right">
                                <h3 class="subject">
                                    {{ $mail->subject ?? '' }}
                                </h3>
                                <div class="main_head">
                                    <div class="mailer_box">
                                        <h3 class="mailer_name">{{ $mail->sender_name ?? '' }} </h3>
                                        <div class="date">{{ $mail->created_at ?? '' }}</div>
                                        <div class="mail_id">{{ $mail->request_time ?? '' }}</div>
                                    </div>
                                    <div class="mailer_box_params" style="margin-left: 85px;">
                                        <div class="mailer_category">Category : {{ $mail->category->name ?? '' }} </div>
                                        <div class="mailer_country">Country : {{ $mail->country->name ?? '' }} </div>
                                        <div class="mailer_region">Region : {{ $mail->region->name ?? 'All Region' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mail_text uk-margin-top mail_content">
                                    {!! $mail->description !!}
                                </div>
                                <!-- nest Section  -->
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