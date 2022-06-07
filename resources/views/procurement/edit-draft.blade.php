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
                                <li><a uk-tooltip="title: Inbox" href="{{ route('procurement.home') }}"> <i class="fa fa-inbox "></i> <span class="nav_text">  Inbox </span> </a></li>
                                <li><a uk-tooltip="title: Sent" href="{{ route('procurement.outbox') }}"><i class="fa fa-paper-plane-o "></i>  <span class="nav_text"> Sent </span> </a></li>
                                <li><a uk-tooltip="title: Draft" href="{{ route('procurement.draft') }}"><i class="fa fa-file-text-o"></i>  <span class="nav_text"> Draft </span> </a></li>
                                <li><a uk-tooltip="title: Upcoming Events" href="{{ route('procurement.events') }}"><i class="fa fa-calendar"></i>  <span class="nav_text"> Upcoming Events </span> </a></li>
                            </ul>

                        </div>
                    </div>

                    <div class="col_right_ca">
                        <h1 class="comm_title">Generate Quote</h1>
                        <div class="col_maii_middle">

                          <div class="col_maiil_left"  style="width:100%">
                            <div class="col uk-margin-small uk-card uk-card-default uk-card-small uk-card-body">
                                
                                
                                <div class="panel_header"> Compose Quote</div>
                                <form action="{{ route('procurement.send.draft',$mail->id) }}" method="post" enctype="multipart/form-data">
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
                                            <input name="subject" class="uk-input" id="form-stacked-text" type="text" placeholder="Some text..." 
                                            value="{{ $mail->subject }}">
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


                                    <div  uk-grid>
                                                <div class="uk-width-1-3@m">
                                                <div class=" form_group">
                                                    <label class="uk-form-label" for="form-stacked-text">Time Frame </label>
                                                    <div class="uk-form-controls">
                                                        <input type="date" class="uk-input" name="timeframe" value="{{ $mail->request_time }}" required>
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
                                                                    <option {{ $mail->country_id == $country->id ? 'selected' : '' }}
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
                                                        <label class="uk-form-label" for="form-stacked-text">Choose Region</label>
                                                        <div class="uk-form-controls">
                                                            <div class="wrap_select_dropdown">
                                                           <select name="region_id"  id="region" class="drop_category uk-input  drop_select hide " style="width: 100%;">
                                                               <option value="">Choose Region</option>
                                                               @if($mail->region_id)
                                                                   @foreach($regions as $key => $region)
                                                                        <option {{ $mail->region_id == $region->id ? 'selected' : '' }}
                                                                        value="{{ $region->id }}">{{$region->name}}</option>
                                                                    @endforeach
                                                               @endif
                                                              </select>
                                                           </div>
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
@push('scripts')
<script>
    $("body").on("change","#country",function(){
		var fetch_region_url = $("#fetch_region_url").val();
		var countryID = $('#country').val();  
		var token = $('meta[name="csrf-token"]').attr('content');   
		if(countryID){
			$.ajax({
				type:"POST",
				url: "{{ route('getRegion') }}",
				data:{
					'_token':token,
					'country_id':countryID
				},
				beforeSend: function() {
					$("#region").empty();
					$("#region").append('<option>Please Wait! Loading...</option>');
				},
				success:function(res){        
					if(res){
						$("#region").empty();
						$("#region").append('<option>Select Region</option>');
						$.each(res,function(key,value){
							$("#region").append('<option value="'+key+'">'+value+'</option>');
						});
					}else{
						$("#region").empty();
					}
				}
			});
		}
		else{
			$("#region").empty();
		}
	});

</script>
@endpush
@endsection