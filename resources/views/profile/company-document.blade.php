@extends(strtolower(auth()->user()->designation).'.layouts.app')
@section('content')
<section class=" uk-padding-small uk-clearfix">
            <div class="uk_container ">
                <ul class="uk-breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Profile</a></li>
                    
                </ul>
            </div>

 

        </section>
        
        <section class="mail_wrap">
		    <div uk-grid>
			    <div>
					<div class="uk_container">
                <div class="ad_profile">
                        <div class="">
                            <div class=" uk-card uk-card-default uk-card-small uk-card-body">
                            @php $url = strtolower(auth()->user()->designation) == 'admin' ? 'admin/home' : strtolower(auth()->user()->designation).'/inbox'; @endphp    
                            <a href="{{ url($url) }}" style="background: #20285b;width:70%;" class="btn_com uk-align-center"> Back to inbox</a>
                                <div class="inner">
                                    <div class="profile_dp">
                                            <div class="dp" style="background: url(images/dp_150x150.png);">
                                                <a href="{{ route('profile.change-dp') }}"> <i class="fa fa-edit"></i> </a>
                                            </div>
                                            <h3 class="name">{{ Auth::user()->name ?? '' }}</h3>
                                            <p class="description">{{ Auth::user()->designation ?? '' }}</p>
                                    </div> 
                                    <hr>          
                                    <div class="profile_information">
                                    <ul>
                                                 <li>
                                                    <div>   <i class="fa fa-tag"></i></div>
                                                    <div> {{ Auth::user()->role ?? '' }} </div>
                                                </li>
                                                <li>
                                                    <div>   <i class="fa fa-mobile"></i></div>
                                                    <div> {{ Auth::user()->mobile ?? '' }} </div>
                                                </li>

                                                <li>
                                                    <div>   <i class="fa fa-envelope-o"></i></div>
                                                    <div> {{ Auth::user()->email ?? '' }}</div>
                                                </li>

                                                <li>
                                                    <div>   <i class="fa fa-phone"></i></div>
                                                    <div> {{ Auth::user()->landline ?? '' }} </div>
                                                </li>
                                            </ul>
                                    </div>                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				</div>
				<div class="uk-width-expand@m">
					<div class="uk_container">
                            <div class=" uk-card uk-card-default uk-card-small uk-card-body">
                                <div class="inner">
                                    <div class="profile_dp">
                                        <a href="{{ url()->previous() }}" class="btn_com"> Back</a>
									    <a href="{{ route('profile.edit') }}" class="btn_com">Edit Profile</a>
                                        <a href="{{ route('profile.theme') }}" class="btn_com"> Change Color Theme</a>
                                        <a href="{{ route('change-password') }}" class="btn_com"> Change Password</a>
                                    </div> 
                                    <hr>   
                                    <div class="profile_information">
                                       <form  action="{{ route('profile.saveDocument') }}" method="post" enctype="multipart/form-data">
                                         @csrf
                                         <h3 class="name">Document
                                         @if(strtolower(auth()->user()->designation) == 'admin')   
                                         <a href="{{ url()->previous() }}" class="btn_com uk-align-right">Back</a>
                                         @endif
                                         </h3>
                                         <div uk-grid>
                                         <div class="uk-form-controls">                         
                                        <div class="uk-margin  uploads"  uk-margin>
                                            <input type="hidden" name="company_id" value="{{ auth()->user()->company_id }}" />
                                            <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">                             
                                            <select  name="doc_type" id="doc_type" class="drop_category uk-input  drop_select hide  @error('doc_type') uk-form-danger uk-animation-shake @enderror" style="width: 100%;">
                                                <option value=" ">Select Document Type</option>
                                                @foreach($documents as $key => $document)
                                                <option {{ old('doc_type') == $document->id ? 'selected' : '' }} value="{{ $document->id }}">{{$document->name}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                            <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">                         
                                            <input class="uk-input  @error('doc_number') uk-form-danger uk-animation-shake @enderror" id="doc_number"   name="doc_number" type="text" value="{{ old('doc_number') }}" placeholder="Document Number">
                                            </div>
                                            <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">             
                                            <input class="uk-input  @error('expiry_date') uk-form-danger uk-animation-shake @enderror" id="expiry_date"   name="expiry_date" type="date" value="{{ old('expiry_date') }}" min="{{ date('Y-m-d') }}">
                                            </div>
                                            <div class="uk-margin-small-bottom">         
                                                <div class="uk-form-controls">    
                                                    <input class="uk-input upload" id="doc_file"   name="doc_file" type="file" value="{{ old('doc_file') }}">
                                                </div>
                                            </div>
                                            <div class="uk-margin-small-bottom"  uk-form-custom="target: true" style="width: 100%;">             
                                            <small>Format: pdf, jpg, png, jpeg | Max-Size : 4MB</small>
                                            </div>   
                                            <div class="uk-text-center">  
                                                <a href="{{ route('profile') }}"><button class="  btn_com">Back</button></a>
                                                <button type="submit" class="btn_com">Submit</button>
                                            </div>
                                        </div> 
                                      </form>   	 							 
                                    </div>    
                                         
                                                  
                                </div>
                            </div>
                </div>
				</div>
			</div>
            
			
        </section>
    @endsection