@extends('layouts.app')
@section('content')
<!-- banner -->
<section class="banner">
    <div class="inner_banner">
        <div class="uk_container "> 
            <div class="wrap_home_hero_login_block">
                <div class="home_hero_login_block ">
                    <div class="uk-align-center">
                    <div>
                        <h2 class="uk-align-center ">New User ? Register here</h2>
                        <!-- <p>Cras ultricies mauris velit, vitae ornare ex tristique id. Morbi congue commodo lacinia. </p> -->
                    </div>
                    <form  onsubmit="formControl()" action="{{ route('registrations') }}"  method="post" class="uk-form-stacked">
                        @csrf
                        <div class="uk-margin">
                            <div class="uk-inline">
                                <span class="uk-form-icon" > <img src="{{ asset('assets/images/user.svg') }}" alt=""></span>
                                <input class="uk-input @error('name') uk-form-danger uk-animation-shake @enderror" type="text" name="name" placeholder="Company Name *" value="{{ old('name') }}">
                                @error('name')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror  
                            </div>
                        </div>
                        <div class="uk-margin">
                            <div class="uk-inline eye_wrap">
                                <span class="uk-form-icon" > <img src="{{ asset('assets/images/globe.png') }}" alt=""></span>
                                <select class="uk-input  @error('country_id') uk-form-danger uk-animation-shake @enderror" name="country_id"  id="country">
                                    <option value=" ">Select Country *</option>
                                    @foreach($countries as $key => $country)
                                    <!-- <option {{ old('country_id') == $country->id ? 'selected' : '' }} value="{{ $country->id }}">{{$country->name}}</option> -->
                                    <option {{ $country->id == 179 ? 'selected' : '' }} value="{{ $country->id }}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror 
                            </div>
                        </div>
                        <div class="uk-margin">
                            <div class="uk-inline">
                                <span class="uk-form-icon" > <img src="{{ asset('assets/images/email.svg') }}" alt=""></span>
                                <input class="uk-input  @error('email') uk-form-danger uk-animation-shake @enderror" type="email" name="email" placeholder="Email *" value="{{ old('email') }}">
                                @error('email')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="uk-margin">
                            <div class="uk-inline">
                                <div class="uk-flex country_code_div">
                                    <div id="phone_load" class="" style="flex-grow: 1">
                                        <input id="code" class="uk-input code_input" type="text"value="+974" placeholder="Code" readonly>
                                    </div>
                                    <div style="position: relative; flex-grow: 8 ">
                                        <span class="uk-form-icon" > <img src="images/icon-phone.svg" alt=""></span>
                                        <input id="phone" class="uk-input  @error('phone') uk-form-danger uk-animation-shake @enderror" type="text" name="phone" placeholder="Mobile *" value="{{ old('phone') }}"> 
                                    </div>
                                </div>
                                <input type="hidden" id="oldcode" name="code" value="{{ old('code') }}" />
                                @error('phone')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror   
                            </div>
                        </div>
                        <!-- <div class="uk-margin">
                            <div class="uk-inline eye_wrap">
                                <span class="uk-form-icon" ><img src="{{ asset('assets/images/globe.png') }}" alt=""></span>
                                <select class="uk-input  @error('region_id') uk-form-danger uk-animation-shake @enderror" name="region_id"   id="region">
                                    <option value=" ">Select Location *</option>
                                    @if(old('region_id'))
                                        @foreach($regions as $key => $region)
                                        <option {{ old('region_id') == $region->id ? 'selected' : '' }} value="{{ $region->id }}">{{ $region->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('region_id')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> -->
                        <div class="uk-margin">
                            <div class="uk-inline">
                                <span class="uk-form-icon" > <img src="{{ asset('assets/images/icon-map.svg') }}" alt=""></span>
                                <input class="uk-input  @error('pobox') uk-form-danger uk-animation-shake @enderror" type="text" name="pobox" placeholder="PO Box *" value="{{ old('pobox') }}">
                                @error('pobox')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="uk-margin">
                            <div class="uk-text-right">
                                <small class="uk-text-meta">* All fields are mandatory</small>
                            </div>    
                            <div class="uk-inline">
                                <button class="btn_com submit" type="submit">Proceed</button>
                            </div>
                        </div>
                        <div class="go_signup">
                            Already Registered ?   
                            <a href="{{ route('login') }}">  Click here to Login</a> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner -->    
@push('scripts')
<script>
$('#country').on("change",function(){
	var fetch_country_url_website = '{{ route('registration.getCountry') }}';
	var fetch_region_url = '{{ route('registration.getRegion') }}';
     var countryID = $(this).val();  
	 var token = $('meta[name="csrf-token"]').attr('content');
	 
     if(countryID){
		$.ajax({
			type:"POST",
			url: fetch_country_url_website,
			data:{
				  '_token':token,
				  'country_id':countryID
			 },
			 beforeSend: function() {
				 $("#phone_load").empty();
				 $('#phone_load').append('<div uk-spinner="ratio: 1"></div>');
			 },
			success:function(res){        
			   if(res){
				    $("#phone_load").empty();
				    $('#phone_load').append(' <input class="uk-input code_input" type="text" value="'+res.phonecode+'" readonly>');
					$('#oldcode').val(res.phonecode);
			   }
			}
		 });
        
		$.ajax({
           type:"POST",
           url: fetch_region_url,
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
                  $("#region").append('<option value="">Select Location</option>');
                  $.each(res,function(key,value){
                     $("#region").append('<option value="'+key+'">'+value+'</option>');
                  });
              }else{
                 	 $("#region").empty();
              }
           }
        });
 	 }
});
</script>
@endpush

@endsection