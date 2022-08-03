@extends('procurement.layouts.app')
@section('content')
<!-- CONTAINER -->
<section class="mail_wrap">
    <div>
        <div class="mail_grip_wrap">
            @include('procurement.layouts.sidemenu')

            <div class="col_right_ca">
                <h1 class="comm_title">Generate Quote</h1>
                <div class="col_maii_middle">

                    <div class="col_maiil_left" style="width:100%">
                        <div class="col uk-margin-small uk-card uk-card-default uk-card-small uk-card-body">


                            <div class="panel_header" style="background:#fff;color:#000;"> Compose Quote</div>
                            <form action="{{ route('procurement.send.draft',$mail->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="uk-margin-bottom">
                                    <h3>Selected Services</h3>
                                    @if($category)
                                    <span class="uk-badge uk-padding">{{ $category->name }}</span>
                                    <input type="hidden" name="services" value="{{ $category->id }}">
                                    @else
                                    <div> Please select a category</div>
                                    @endif
                                </div>
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
                                            <textarea id="summernote" name="body">{{ $mail->description }}</textarea>
                                        </div>
                                        @error('body')
                                        <small class="error">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div uk-grid>
                                        <div class="uk-width-1-3@m">
                                            <div class=" form_group">
                                                <label class="uk-form-label" for="form-stacked-text">Time Frame </label>
                                                <div class="uk-form-controls">
                                                    <input type="date" class="uk-input" name="timeframe"
                                                        value="{{ $mail->request_time }}">
                                                </div>
                                                @error('timeframe')
                                                <small class="error">{{ $message }}</small>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="uk-width-1-3@m">
                                            <div class=" form_group">
                                                <label class="uk-form-label" for="form-stacked-text">Choose
                                                    Country</label>
                                                <div class="uk-form-controls">
                                                    <div class="wrap_select_dropdown">
                                                        <select id="country" name="country_id"
                                                            class="drop_category uk-input  drop_select hide "
                                                            style="width: 100%;">
                                                            <option value="">Choose Country</option>
                                                            @foreach($countries as $key => $country)
                                                            <option
                                                                {{ $mail->country_id == $country->id ? 'selected' : '' }}
                                                                value="{{ $country->id }}">{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('country_id')
                                                    <small class="error">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>


                                        </div>
                                        <div class="uk-width-expand@m">

                                            <div class=" form_group">
                                                <label class="uk-form-label" for="form-stacked-text">Choose
                                                    Region</label>
                                                <div class="uk-form-controls">
                                                    <div class="wrap_select_dropdown">
                                                        <select name="region_id" id="region"
                                                            class="drop_category uk-input  drop_select hide "
                                                            style="width: 100%;">
                                                            <option value="0"
                                                                {{ $mail->region_id == 0 ? 'selected' : '' }}>All Region
                                                            </option>
                                                            @if($mail->region_id)
                                                            @foreach($regions as $key => $region)
                                                            <option
                                                                {{ $mail->region_id == $region->id ? 'selected' : '' }}
                                                                value="{{ $region->id }}">{{$region->name}}</option>
                                                            @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if($mail->attachment)
                                        <div class="uk-width-expand@1-1">
                                            <span uk-icon="icon: folder; ratio: 3.5"></span>
                                        </div>
                                        @endif
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
@push('scripts')
<script>
$("body").on("change", "#country", function() {
    var fetch_region_url = $("#fetch_region_url").val();
    var countryID = $('#country').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    if (countryID) {
        $.ajax({
            type: "POST",
            url: "{{ route('getRegion') }}",
            data: {
                '_token': token,
                'country_id': countryID
            },
            beforeSend: function() {
                $("#region").empty();
                $("#region").append('<option>Please Wait! Loading...</option>');
            },
            success: function(res) {
                if (res) {
                    $("#region").empty();
                    $("#region").append('<option>All Region</option>');
                    $.each(res, function(key, value) {
                        $("#region").append('<option value="' + key + '">' + value +
                            '</option>');
                    });
                } else {
                    $("#region").empty();
                }
            }
        });
    } else {
        $("#region").empty();
    }
});
</script>
@endpush
@endsection