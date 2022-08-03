@extends('sales.layouts.app')
@section('content')
<!-- CONTAINER -->
<section class="mail_wrap">
    <div>
        <div class="mail_grip_wrap">
            @include('sales.layouts.sidemenu')
            <div class="col_right_ca">
                <div class="col_maii_middle">
                    <div class="col_maiil_left" style="width:100%">
                        <div class="col uk-margin-small uk-card uk-card-default uk-card-small uk-card-body">
                            <div class="panel_header">Reply to mail : {{ $mail->procurement_reference ?? ''}} </div>
                            <form action="{{ route('sales.senddraftreply') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="mail_id" value="{{ $mail->id }}" />
                                <div class=" form_wraper">
                                    <div class=" form_group">
                                        <label class="uk-form-label" for="form-stacked-text">Subject</label>
                                        <div class="uk-form-controls">
                                            <input name="subject" class="uk-input" id="form-stacked-text" type="text"
                                                placeholder="Some text..." value="{{ $mail->subject }}">
                                        </div>
                                        @error('subject')
                                        <small class="error">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class=" form_group">
                                        <label class="uk-form-label" for="form-stacked-text">Body</label>
                                        <div class="uk-form-controls">
                                            <textarea id="summernote"
                                                name="reply_body">{{ $mail->description ?? '' }}</textarea>
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
                                    <button name="submit" value="draft" class="btn_com uk-modal-close"
                                        style="width: 200px;">Save As Draft</button>
                                    <button name="submit" value="save" class="btn_com uk-modal-close"
                                        style="width: 150px;">Send</button>
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