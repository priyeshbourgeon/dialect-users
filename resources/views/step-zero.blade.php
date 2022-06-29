@extends('layouts.app')
@section('content')
<!-- banner -->
<section class="inner_page uk-clearfix">
    <div class="uk_container">
        <div class="uk-card uk-card-default uk-card-body">
            <div class="tab_wraper">
                <ul data-uk-tab="{connect:'#my-id'}" uk-tab="media:1-2@s">
                    <li class="uk-active"><a href=""> <i class="fa fa-user"></i> Basic Information</a></li>
                    <li class="uk-disabled"><a href=""> <i class="fa fa-file"></i>  Documents</a></li>
                    <li class="uk-disabled"><a href=""> <i class="fa fa-diamond"></i> Business Category</a></li>
                    <li class="uk-disabled"><a href=""> <i class="fa fa-diamond"></i> Account Verification</a></li>
                </ul>
                <ul id="my-id"  class="uk-switcher uk-margin">
                    <li class="uk-active"> 
                        <small>* All fields are mandatory!</small>
                        <form  action="{{ route('registration.saveCompanyInfo') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="uk-form-stacked">
                            <div class="form_wraper" uk-grid>
                                <div class="uk-width-1-12@m uk-margin-small-top">
                                    <div class=" form_group">
                                        <label class="uk-form-label" for="form-stacked-text">Company *</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input @error('name') uk-form-danger uk-animation-shake @enderror" id="name" name="name" type="text" placeholder="Company Name" value="{{ old('name') ?? $company->name }}">
                                        </div>
                                        @error('name')
                                            <small class="error" style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="uk-width-1-2@m uk-margin-small-top">
                                    <div class=" form_group">
                                        <label class="uk-form-label" for="form-stacked-text">Address *</label>
                                        <div class="uk-form-controls">
                                        <input class="uk-input @error('address') uk-form-danger uk-animation-shake @enderror" id="address" name="address" type="text" placeholder="Address" value="{{ old('address') ?? $company->address ?? '' }}">
                                        </div>
                                        @error('address')
                                            <small class="error" style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="uk-width-1-2@m uk-margin-small-top">
                                    <div class=" form_group">
                                        <label class="uk-form-label" for="form-stacked-text">Zone No *</label>
                                        <div class="uk-form-controls">
                                        <input class="uk-input @error('zone') uk-form-danger uk-animation-shake @enderror" id="zone" name="zone" type="text" placeholder="Zone" value="{{ old('zone') ?? $company->zone ?? '' }}">
                                        </div>
                                        @error('zone')
                                            <small class="error" style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="uk-width-1-3@m uk-margin-small-top">
                                    <div class=" form_group">
                                        <label class="uk-form-label" for="form-stacked-text">Street No*</label>
                                        <div class="uk-form-controls">
                                        <input class="uk-input @error('street') uk-form-danger uk-animation-shake @enderror" id="street" name="street" type="text" placeholder="Street" value="{{ old('street') ?? $company->street ?? '' }}">
                                        </div>
                                        @error('street')
                                            <small class="error" style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="uk-width-1-3@m uk-margin-small-top">
                                    <div class=" form_group">
                                        <label class="uk-form-label" for="form-stacked-text">Building No.*</label>
                                        <div class="uk-form-controls">
                                        <input class="uk-input @error('building') uk-form-danger uk-animation-shake @enderror" id="building" name="building" type="text" placeholder="Building" value="{{ old('building') ?? $company->building ?? '' }}">
                                        </div>
                                        @error('building')
                                            <small class="error" style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="uk-width-1-3@m uk-margin-small-top">
                                    <div class=" form_group">
                                        <label class="uk-form-label" for="form-stacked-text">Unit No</label>
                                        <div class="uk-form-controls">
                                        <input class="uk-input @error('unit') uk-form-danger uk-animation-shake @enderror" id="unit" name="unit" type="text" placeholder="Unit" value="{{ old('unit') ?? $company->unit ?? '' }}">
                                        </div>
                                        @error('unit')
                                            <small class="error" style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- <div class="uk-width-1-2@m uk-margin-small-top">
                                    <div class=" form_group">
                                        <label class="uk-form-label" for="form-stacked-text">Region *</label>
                                        <div class="uk-form-controls">
                                        <input class="uk-input @error('region') uk-form-danger uk-animation-shake @enderror" id="region" name="region" type="text" placeholder="Region" value="{{ old('region') ?? $company->region->name ?? '' }}" readonly>
                                        </div>
                                        @error('region')
                                            <small class="error" style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div> -->
                                <div class="uk-width-1-2@m uk-margin-small-top">
                                    <div class=" form_group">
                                        <label class="uk-form-label" for="form-stacked-text">Country *</label>
                                        <div class="uk-form-controls">
                                        <input class="uk-input @error('country') uk-form-danger uk-animation-shake @enderror" id="country" name="country" type="text" placeholder="Country" value="{{ old('country') ?? $company->country->name ?? '' }}" readonly>
                                        </div>
                                        @error('country')
                                            <small class="error" style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="uk-width-1-2@m uk-margin-small-top">
                                    <div class=" form_group">
                                        <label class="uk-form-label" for="form-stacked-text">PO Box *</label>
                                        <div class="uk-form-controls">
                                        <input class="uk-input @error('pobox') uk-form-danger uk-animation-shake @enderror" id="pobox" name="pobox" type="text" placeholder="Country" value="{{ old('ZIP / Postal Code') ?? $company->pobox ?? '' }}" readonly>
                                        </div>
                                        @error('pobox')
                                            <small class="error" style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="uk-width-1-1@m uk-margin-small-top">
                                    <div class=" form_group">
                                        <label class="uk-form-label" for="form-stacked-text">Operating Countries *</label>
                                        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                        @foreach($regions as $key => $region)
                                            <label><input class="uk-checkbox" type="checkbox" name="regions[]"
                                            value="{{ $region->id }}" checked> {{ $region->name }}</label>
                                        @endforeach    
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-width-1-3@m uk-margin-small-top">
                                        <div class=" form_group">
                                            <label class="uk-form-label" for="form-stacked-text">Website</label>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline input_group">  
                                                    <div>
                                                        <span class="input-group-text">https://www.</span>
                                                    </div>
                                                    <input class="uk-input @error('domain') uk-form-danger uk-animation-shake @enderror" id="form-stacked-text" name="domain" type="text" placeholder="" value="{{ old('domain') ?? $company->domain ?? '' }}">
                                                </div>    
                                            </div>
                                        </div>
                                        @error('domain')
                                            <small class="error" style="color:red">{{ $message }}</small>
                                        @enderror
                                </div>
                                <div class="uk-width-1-3@m uk-margin-small-top">
                                    <div class=" form_group">
                                        <label class="uk-form-label" for="form-stacked-text">Fax</label>
                                        <div>
                                            <div class="uk-flex country_code_div ">
                                                <div class="">
                                                    <input class="uk-input code_input" type="text" value="{{ $company->country->phonecode }}" readonly>
                                                </div>
                                                <div style="position: relative; flex-grow: 8 ">
                                                    <span class="uk-form-icon"> <img src="images/icon-phone.svg" alt=""></span>
                                                    <input class="uk-input @error('fax') uk-form-danger uk-animation-shake @enderror" type="text" placeholder="Fax" id="fax" name="fax" value="{{ old('fax') ?? $company->fax ?? '' }}">
                                                </div>
                                            </div>   
                                        </div>
                                        @error('fax')
                                             <small class="error" style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="uk-width-1-2@m uk-margin-small-top">
                                    <div class=" form_group">
                                        <label class="uk-form-label" for="form-stacked-text">Logo</label>
                                        <div class="uk-form-controls">
                                            <div uk-form-custom>
                                                <input type="file" name="logo" id="uploadImage">
                                                <button class="uk-button uk-button-default @error('logo') uk-form-danger uk-animation-shake @enderror" type="button" tabindex="-1">Select</button>
                                            </div>
                                        </div>
                                        <small>Format: jpeg,png,jpg,gif,svg | Max-Size : 2MB</small>
                                        @error('logo')
                                            <small class="error" style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="uk-width-1-3@m uk-margin-small-top">
                                    @php $image = $company->logo != '' ? $company->logo : asset('assets/img/noimage.jpg') @endphp
                                    <img id="uploadPreview" class="uk-height-small" src="{{ $image }}" uk-img="loading: eager" />
                                </div>
                                <div class="uk-width-1-1@m uk-margin-small-top uk-text-right">
                                    <div class=" form_group">
                                        <button type="submit" class="btn_com">Proceed</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </li>
                    <!-- end teb content -->
                    <li></li>
                    <!-- end teb content -->
                    <li></li>
                    <li></li>
                    <!-- end teb content -->
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection