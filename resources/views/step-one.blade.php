@extends('website.layouts.app')
@section('content')
<!-- banner -->
<section class="inner_page uk-clearfix">
    <div class="uk_container ">
        <div class="uk-card uk-card-default uk-card-body">
            <div class="tab_wraper">
                <ul data-uk-tab="{connect:'#my-id'}" uk-tab="media:1-2@s">
                    <li class="uk-disabled"><a href=""> <i class="fa fa-user"></i> Basic Information</a></li>
                    <li class="uk-active"><a href="" style="background-color:#EC2531;"> <i class="fa fa-user"></i> User Information</a></li>
                    <li class="uk-disabled"><a href=""> <i class="fa fa-file"></i>  Documents</a></li>
                    <li class="uk-disabled"><a href=""> <i class="fa fa-diamond"></i> Business Category</a></li>
                    <li class="uk-disabled"><a href=""> <i class="fa fa-diamond"></i> Account Verification</a></li>
                </ul>
                <ul id="my-id"  class="uk-switcher uk-margin">
                    <li></li>
                    <!-- end teb content -->
                    <li class="uk-active">
                    <small>* All fields are mandatory!</small>     
                    @if(count($companyUsers) < 1)
                    <form  action="{{ route('registration.saveUserInfo') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form_wraper" uk-grid>
                        <div class="uk-width-1-12@m uk-margin-small-top">
                            <h3 class="uk-heading-divider">Administrator</h3>
                        </div>    
                        <div class="uk-width-1-3@m uk-margin-small-top">
                            <div class=" form_group">
                                <label class="uk-form-label" for="form-stacked-text">Name *</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input  @error('admin_name') uk-form-danger uk-animation-shake @enderror" id="admin_name"   name="admin_name" type="text" value="{{ old('admin_name') }}" placeholder="Name">
                                </div>
                                @error('admin_name')
                                    <small style="color:red"> {{$message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="uk-width-1-3@m uk-margin-small-top">
                            <div class=" form_group">
                                <label class="uk-form-label" for="form-stacked-text">Designation *</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input  @error('admin_designation') uk-form-danger uk-animation-shake @enderror" id="admin_designation"   name="admin_designation" type="text" value="{{ old('designation') }}" placeholder="Designation" >
                                </div>
                                @error('admin_designation')
                                    <small style="color:red"> {{$message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="uk-width-1-3@m uk-margin-small-top">
                            <div class=" form_group">
                                <label class="uk-form-label" for="form-stacked-text">Email *</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input  @error('admin_email') uk-form-danger uk-animation-shake @enderror" id="admin_email"   name="admin_email" type="email" value="{{ old('admin_email') }}" placeholder="Email">
                                </div>
                                @error('admin_email')
                                    <small style="color:red"> {{$message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="uk-width-1-3@m uk-margin-small-top">
                            <div class=" form_group">
                                <label class="uk-form-label" for="form-stacked-text">Mobile</label>
                                <div>
                                    <div class="uk-flex country_code_div ">
                                        <div class="">
                                            <input class="uk-input code_input" type="text" value="{{ $company->country->phonecode }}" readonly>
                                        </div>
                                        <div style="position: relative; flex-grow: 8 ">
                                            <span class="uk-form-icon"> <img src="images/icon-phone.svg" alt=""></span>
                                            <input class="uk-input @error('admin_mobile') uk-form-danger uk-animation-shake @enderror" type="text" placeholder="Mobile" id="admin_mobile" name="admin_mobile" value="{{ old('admin_mobile') }}">
                                        </div>
                                    </div>   
                                </div>
                                @error('admin_mobile')
                                        <small class="error" style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="uk-width-1-3@m uk-margin-small-top">
                            <div class=" form_group">
                                <label class="uk-form-label" for="form-stacked-text">Landline / Extension</label>
                                <div>
                                    <div class="uk-flex country_code_div ">
                                        <div class="">
                                            <input class="uk-input code_input" type="text" value="{{ $company->country->phonecode }}" readonly>
                                        </div>
                                        <div style="position: relative; flex-grow: 8 ">
                                            <span class="uk-form-icon"> <img src="images/icon-phone.svg" alt=""></span>
                                            <input class="uk-input @error('admin_landline') uk-form-danger uk-animation-shake @enderror" type="text" placeholder="Landline / Extension" id="admin_landline" name="admin_landline" value="{{ old('admin_landline') }}">
                                        </div>
                                    </div>   
                                </div>
                                @error('admin_landline')
                                        <small class="error" style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="uk-width-1-12@m uk-margin-small-top">
                            <hr class="uk-divider-icon">
                        </div>
                        <div class="uk-width-1-12@m uk-margin-small-top">
                            <h3 class="uk-heading-divider">Procurement</h3>
                        </div>   
                        <div class="uk-width-1-3@m uk-margin-small-top">
                            <div class=" form_group">
                                <label class="uk-form-label" for="form-stacked-text">Name *</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input  @error('pro_name') uk-form-danger uk-animation-shake @enderror" id="pro_name"   name="pro_name" type="text" value="{{ old('pro_name') }}" placeholder="Name">
                                </div>
                                @error('pro_name')
                                    <small style="color:red"> {{$message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="uk-width-1-3@m uk-margin-small-top">
                            <div class=" form_group">
                                <label class="uk-form-label" for="form-stacked-text">Designation *</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input  @error('pro_designation') uk-form-danger uk-animation-shake @enderror" id="pro_designation"   name="pro_designation" type="text" value="{{ old('pro_designation') }}" placeholder="Designation" >
                                </div>
                                @error('pro_designation')
                                    <small style="color:red"> {{$message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="uk-width-1-3@m uk-margin-small-top">
                            <div class=" form_group">
                                <label class="uk-form-label" for="form-stacked-text">Email *</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input  @error('pro_email') uk-form-danger uk-animation-shake @enderror" id="pro_email"   name="pro_email" type="email" value="{{ old('pro_email') }}" placeholder="Email">
                                </div>
                                @error('pro_email')
                                    <small style="color:red"> {{$message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="uk-width-1-3@m uk-margin-small-top">
                            <div class=" form_group">
                                <label class="uk-form-label" for="form-stacked-text">Mobile *</label>
                                <div>
                                    <div class="uk-flex country_code_div ">
                                        <div class="">
                                            <input class="uk-input code_input" type="text" value="{{ $company->country->phonecode }}" readonly>
                                        </div>
                                        <div style="position: relative; flex-grow: 8 ">
                                            <span class="uk-form-icon"> <img src="images/icon-phone.svg" alt=""></span>
                                            <input class="uk-input @error('pro_mobile') uk-form-danger uk-animation-shake @enderror" type="text" placeholder="Mobile" id="pro_mobile" name="pro_mobile" value="{{ old('pro_mobile') }}">
                                        </div>
                                    </div>   
                                </div>
                                @error('pro_mobile')
                                        <small class="error" style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="uk-width-1-3@m uk-margin-small-top">
                            <div class=" form_group">
                                <label class="uk-form-label" for="form-stacked-text">Landline / Extension</label>
                                <div>
                                    <div class="uk-flex country_code_div ">
                                        <div class="">
                                            <input class="uk-input code_input" type="text" value="{{ $company->country->phonecode }}" readonly>
                                        </div>
                                        <div style="position: relative; flex-grow: 8 ">
                                            <span class="uk-form-icon"> <img src="images/icon-phone.svg" alt=""></span>
                                            <input class="uk-input @error('pro_landline') uk-form-danger uk-animation-shake @enderror" type="text" placeholder="Landline / Extension" id="pro_landline" name="pro_landline" value="{{ old('pro_landline') }}">
                                        </div>
                                    </div>   
                                </div>
                                @error('pro_landline')
                                        <small class="error" style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="uk-width-1-12@m uk-margin-small-top">
                            <hr class="uk-divider-icon">
                        </div>
                        <div class="uk-width-1-12@m uk-margin-small-top">
                            <h3 class="uk-heading-divider">Sales</h3>
                        </div>   
                        <div class="uk-width-1-3@m uk-margin-small-top">
                            <div class=" form_group">
                                <label class="uk-form-label" for="form-stacked-text">Name *</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input  @error('sales_name') uk-form-danger uk-animation-shake @enderror" id="sales_name"   name="sales_name" type="text" value="{{ old('sales_name') }}" placeholder="Name">
                                </div>
                                @error('sales_name')
                                    <small style="color:red"> {{$message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="uk-width-1-3@m uk-margin-small-top">
                            <div class=" form_group">
                                <label class="uk-form-label" for="form-stacked-text">Designation *</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input  @error('sales_designation') uk-form-danger uk-animation-shake @enderror" id="sales_designation"   name="sales_designation" type="text" value="{{ old('sales_designation') }}" placeholder="Designation" >
                                </div>
                                @error('sales_designation')
                                    <small style="color:red"> {{$message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="uk-width-1-3@m uk-margin-small-top">
                            <div class=" form_group">
                                <label class="uk-form-label" for="form-stacked-text">Email *</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input  @error('sales_email') uk-form-danger uk-animation-shake @enderror" id="sales_email"   name="sales_email" type="email" value="{{ old('sales_email') }}" placeholder="Email">
                                </div>
                                @error('sales_email')
                                    <small style="color:red"> {{$message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="uk-width-1-3@m uk-margin-small-top">
                            <div class=" form_group">
                                <label class="uk-form-label" for="form-stacked-text">Mobile *</label>
                                <div>
                                    <div class="uk-flex country_code_div ">
                                        <div class="">
                                            <input class="uk-input code_input" type="text" value="{{ $company->country->phonecode }}" readonly>
                                        </div>
                                        <div style="position: relative; flex-grow: 8 ">
                                            <span class="uk-form-icon"> <img src="images/icon-phone.svg" alt=""></span>
                                            <input class="uk-input @error('sales_mobile') uk-form-danger uk-animation-shake @enderror" type="text" placeholder="Mobile" id="sales_mobile" name="sales_mobile" value="{{ old('sales_mobile') }}">
                                        </div>
                                    </div>   
                                </div>
                                @error('sales_mobile')
                                        <small class="error" style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="uk-width-1-3@m uk-margin-small-top">
                            <div class=" form_group">
                                <label class="uk-form-label" for="form-stacked-text">Landline / Extension</label>
                                <div>
                                    <div class="uk-flex country_code_div ">
                                        <div class="">
                                            <input class="uk-input code_input" type="text" value="{{ $company->country->phonecode }}" readonly>
                                        </div>
                                        <div style="position: relative; flex-grow: 8 ">
                                            <span class="uk-form-icon"> <img src="images/icon-phone.svg" alt=""></span>
                                            <input class="uk-input @error('sales_landline') uk-form-danger uk-animation-shake @enderror" type="text" placeholder="Landline / Extension" id="sales_landline" name="sales_landline" value="{{ old('sales_landline') }}">
                                        </div>
                                    </div>   
                                </div>
                                @error('sales_landline')
                                        <small class="error" style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="uk-width-1-1@m uk-margin-small-top uk-text-right">
                            <div class=" form_group">
                                <a href="{{ route('registration.companyInfo') }}"><button type="button" class="btn_com">Back</button></a>
                                <button type="submit" class="btn_com">Proceed</button>
                            </div>
                        </div>
                    </div>
                </form>
                @else
                <div class="uk-width-1-1@m uk-margin-small-top">
                    <div class="uk-child-width-expand@s" uk-grid>
                        @foreach($companyUsers  as $key => $cu)
                        <div class="uk-card uk-card-default uk-width-1-1@m uk-margin uk-margin-left">
                            <div class="uk-card-header">
                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                    <div class="uk-width-expand">
                                        <h3 class="uk-card-title uk-margin-remove-bottom">{{ $cu->name }}</h3>
                                        <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00">{{ $cu->designation }}</time></p>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-card-body">
                                <p><span uk-icon="icon: user"></span>  {{ $cu->role }}</p>
                                <p><span uk-icon="icon: mail"></span>  {{ $cu->email }}</p>
                                <p><span uk-icon="icon: phone"></span>  {{ $cu->mobile }}</p>
                                <p><span uk-icon="icon: receiver"></span>  {{ $cu->landline ?? 'Not Available' }}</p>
                            </div>
                            <!-- <div class="uk-card-footer">
                                <a href="#" class="uk-button uk-button-text">Read more</a>
                            </div> -->
                        </div>
                        @endforeach
                    </div>    
                </div>
                <div class="uk-width-1-1@m uk-margin-small-top uk-text-right">
                    <div class=" form_group">
                        <a href="{{ route('registration.companyInfo') }}"><button type="button" class="btn_com">Back</button></a>
                        <a href="{{ route('registration.documentUpload') }}"><button type="submit" class="btn_com">Proceed</button></a>
                    </div>
                </div>
                @endif
                </li>
                <!-- end teb content -->
                <li></li>
                <li></li>
                <!-- end teb content -->
                <li></li>
                <!-- end teb content -->
            </ul>
        </div>
    </div>
</section>
@endsection