@extends('layouts.app')
@section('content')
<!-- banner -->
<section class="inner_page uk-clearfix">
    <div class="uk_container ">
        <div class="uk-card uk-card-default uk-card-body">
            <div class="tab_wraper">
                <ul data-uk-tab="{connect:'#my-id'}" uk-tab="media:1-2@s">
                    <li class="uk-disabled"><a href=""> <i class="fa fa-user"></i> Basic Information</a></li>
                    <li class="uk-active"><a href="" style="background-color:#EC2531;"> <i class="fa fa-file"></i>  Documents</a></li>
                    <li class="uk-disabled"><a href=""> <i class="fa fa-diamond"></i> Business Category</a></li>
                    <li class="uk-disabled"><a href=""> <i class="fa fa-diamond"></i> Account Verification</a></li>
                </ul>
                <ul id="my-id"  class="uk-switcher uk-margin">
                    <li></li>
                    <!-- end teb content -->
                    <li class="uk-active"> 
                    <small>* All fields are mandatory!</small>    
                    @if(count($companyDocuments) < 1)
                    <form  action="{{ route('registration.saveDocument') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form_wraper" uk-grid>
                        <div class="uk-width-1-3@m uk-margin-small-top">
                            <div class=" form_group">
                                <label class="uk-form-label" for="form-stacked-text">Document *</label>
                                <div class="uk-form-controls">
                                    <div class="wrap_select_dropdown">
                                        <select  name="doc_type" id="doc_type" class="drop_category uk-input  drop_select hide  @error('doc_type') uk-form-danger uk-animation-shake @enderror" style="width: 100%;">
                                            <option value=" ">Select Document Type</option>
                                            @foreach($documents as $key => $document)
                                            <option {{ old('doc_type') == $document->id ? 'selected' : '' }} value="{{ $document->id }}">{{$document->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @error('doc_type')
                                    <small style="color:red"> {{$message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="uk-width-1-3@m uk-margin-small-top">
                            <div class=" form_group">
                                <label class="uk-form-label" for="form-stacked-text">Document Number *</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input  @error('doc_number') uk-form-danger uk-animation-shake @enderror" id="doc_number"   name="doc_number" type="text" value="{{ old('doc_number') }}" placeholder="Document Number">
                                </div>
                                @error('doc_number')
                                    <small style="color:red"> {{$message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="uk-width-1-3@m uk-margin-small-top">
                            <div class=" form_group">
                                <label class="uk-form-label" for="form-stacked-text">Document Expiry Date *</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input  @error('expiry_date') uk-form-danger uk-animation-shake @enderror" id="expiry_date"   name="expiry_date" type="date" value="{{ old('expiry_date') }}" min="{{ date('Y-m-d') }}">
                                </div>
                                @error('expiry_date')
                                    <small style="color:red"> {{$message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="uk-width-1-3@m uk-margin-small-top">
                            <div class=" form_group">
                                <label class="uk-form-label" for="form-stacked-text">Upload Document *</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input  @error('doc_file') uk-form-danger uk-animation-shake @enderror" id="doc_file"   name="doc_file" type="file" value="{{ old('doc_file') }}">
                                </div>
                                <small>Format: pdf, jpg, png, jpeg | Max-Size : 4MB</small>
                                @error('doc_file')
                                    <small style="color:red"> {{$message }}</small>
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
                <table class="uk-table">
                    <caption></caption>
                    <thead>
                        <tr>
                            <th>Document Name</th>
                            <th>Expiry Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companyDocuments  as $key => $company_doc)
                        <tr>
                            <td>{{ $company_doc->document->name }}</td>
                            <td>{{ Carbon\Carbon::parse($company_doc->expiry_date)->format('d-m-Y') }}
                            </td>
                            <td>
                            <ul class="uk-iconnav">
                                <li><a href="{{ asset($company_doc->doc_file) }}" target="_blank" uk-icon="icon: file-pdf"></a></li>
                                <li><a href="{{ route('registration.deleteDocument',$company_doc->id) }}" uk-icon="icon: trash"></a></li>
                            </ul>
							</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="uk-width-1-1@m uk-margin-small-top uk-text-right">
                    <div class=" form_group">
                        <a href="{{ route('registration.companyInfo') }}"><button type="button" class="btn_com">Back</button></a>
                        <a href="{{ route('registration.selectService') }}"><button type="submit" class="btn_com">Proceed</button></a>
                    </div>
                </div>
                @endif
                </li>
                <!-- end teb content -->
                <li></li>
                <!-- end teb content -->
                <li></li>
                <!-- end teb content -->
            </ul>
        </div>
    </div>
</section>
@endsection