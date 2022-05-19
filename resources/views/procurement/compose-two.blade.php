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
                                <li><a href="{{ route('procurement.home') }}"> <i class="fa fa-inbox "></i> <span class="nav_text">  Inbox </span> <span class="count">5</span> </a></li>
                                <li><a href="{{ route('procurement.mailSend') }}"><i class="fa fa-paper-plane-o "></i>  <span class="nav_text"> Sent </span> </a></li>
                            </ul>

                        </div>
                    </div>

                    <div class="col_right_ca">
                        <h1 class="comm_title">Inbox</h1>
                        <div class="col_maii_middle">

                          <div class="col_maiil_left"  style="width:100%">
                            <div class="col uk-margin-small uk-card uk-card-default uk-card-small uk-card-body">
                                
                                
                                <div class="panel_header"> Generate Quote</div>
                                <form action="{{ route('procurement.mailSave') }}" method="post">
                                   @csrf
                                    <div class="uk-margin-bottom">
                                        <h3>Selected Services</h3>
                                        @forelse($services as $service)
                                            <span class="uk-badge uk-padding">{{ $service->name }}</span>
                                            <input type="hidden" name="services[]" value="{{ $service->id }}">
                                        @empty
                                        <div> Please select a category</div>
                                        @endforelse
                                    </div>
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
                                            <textarea id="summernote" name="body"></textarea>
                                        </div>
                                        @error('body')
								        <small class="error">{{ $message }}</small>
							            @enderror
                                    </div>


                                    <div  uk-grid>
                                                <div class="uk-width-1-3@m">
                                                <div class=" form_group">
                                                    <label class="uk-form-label" for="form-stacked-text">Time Frame </label>
                                                    <div class="uk-form-controls">
                                                        <input type="date" class="uk-input" name="timeframe" required>
                                                    </div>
                                                    @error('timeframe')
                                                    <small class="error">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                </div>
                                                <div class="uk-width-1-3@m">
                                                    <div class=" form_group">
                                                        <label class="uk-form-label" for="form-stacked-text">Choose Country</label>
                                                        <div class="uk-form-controls">
                                                            <div class="wrap_select_dropdown">
                                                           <select  id="country" name="country_id" class="drop_category uk-input  drop_select hide " style="width: 100%;">
                                                                <option value="">Choose Country</option>
                                                                    @foreach($countries as $key => $country)
                                                                    <option value="{{ $country->id }}">{{$country->name}}</option>
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
                                                        <label class="uk-form-label" for="form-stacked-text">Choose Region</label>
                                                        <div class="uk-form-controls">
                                                            <div class="wrap_select_dropdown">
                                                           <select name="region_id"  id="region" class="drop_category uk-input  drop_select hide " style="width: 100%;">
                                                               <option value="">Choose Region</option>
                                                              </select>
                                                           </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>

                                    <div class="uk-text-right">
                                        <button class="btn_com uk-modal-close" style="width: 150px;">Send</button>
                                         
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

@endpush
@endsection