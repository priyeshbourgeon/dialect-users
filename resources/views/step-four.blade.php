@extends('layouts.app')
@section('content')
<!-- banner -->
<section class="inner_page uk-clearfix">
    <div class="uk_container">
        <div class="uk-card uk-card-default uk-card-body">
            <div class="tab_wraper">
            <ul data-uk-tab="{connect:'#my-id'}" uk-tab="media:1-2@s">
                    <li class="uk-disabled"><a href=""> <i class="fa fa-user"></i> Basic Information</a></li>
                    <li class="uk-disabled"><a href=""> <i class="fa fa-file"></i>  Documents</a></li>
                    <li class="uk-disabled"><a href=""> <i class="fa fa-diamond"></i> Business Category</a></li>
                    <li class="uk-active"><a href="" style="background-color:#EC2531;"> <i class="fa fa-credit-card"></i> Account Verification</a></li>
                </ul>
                <ul id="my-id"  class="uk-switcher uk-margin">
                    <li></li>
                    <!-- end teb content -->
                    <li></li> 
                    <!-- end teb content -->
                    <li></li>
                    <!-- end teb content -->
                <li class="uk-active">
                <small>* All fields are mandatory!</small>  
                        <div class="pay_sec">
                            <h4 class="uk-text-center">Thank you for interest with Dialect B2B. In order to complete your company registration process, please choose any one of the following verification options</h4>
                            <div uk-grid>
                                <div class="uk-width-1-2@m uk-text-center">
                                <div class="col_pay">
                                <form action="{{ route('registration.paymentTransferSave') }}" method="post">
                                    @csrf
                                    <h3>Lorem ipsum dolor sit amet, consectetur </h3>
                                    <p>Please transfer the amount X to the below mentioned Dialect B2B account to verify your company identity.</p>
                                    <h4>Account Details</h4>
                                    <p><strong>A/c No :</strong> </p>
                                    <p><strong>Name of Bank & Branch :</strong> </p>
                                    <p><strong>Swift Code :</strong> </p>

                                    <p>After successful payment transfer, please submit the transfer reference number for verification.</p>
                                    <div class="uk-margin" uk-margin>
                                    <div uk-form-custom="target: true">
                                        <input class="uk-input uk-form-width-medium @error('reference_no') uk-form-danger uk-animation-shake @enderror" type="text" placeholder="Transaction Reference No." name="reference_no">
                                    </div>
                                    <button type="submit" class="btn_com">Submit</button>
                                </form>
                                </div>
                                @error('reference_no')
                                <small style="color:red"> {{$message }}</small>
                                @enderror
                                </div>
                            </div>
                            <div class="uk-width-1-2@m uk-text-center"> 
                                <div class="col_pay">
                                <form action="{{ route('registration.paymentUploadSave') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <h3>Lorem ipsum dolor sit amet, consectetur </h3>
                                    <h4>Instructions </h4>
                                    <p>Lorem ipsum dolor sit amet, Lorem ipsum dolor sit a</p>
                                    <p>Lorem ipsum dolor sit amet, Lorem ipsum dolor sit a</p>
                                    <p>Lorem ipsum dolor sit amet, Lorem ipsum dolor sit a</p>
                                    <p>Lorem ipsum dolor sit amet, Lorem ipsum dolor sit a</p>
                                    <a href="{{ route('registration.downloadApplication') }}" class="btn_com">Download</a>
                                    <div class="uk-margin" uk-margin>
                                    <div uk-form-custom="target: true">
                                        <input name="doc_file" type="file">
                                        <input class="uk-input uk-form-width-medium @error('doc_file') uk-form-danger uk-animation-shake @enderror" type="text" placeholder="Select file" disabled>
                                    </div>
                                    <button type="submit" class="btn_com">Submit</button>
                                </form>    
                                </div>
                                <small>Format: pdf, jpg, png, jpeg | Max-Size : 4MB</small>
                                @error('doc_file')
                                <br><small style="color:red"> {{$message }}</small>
                                @enderror
                            </div>
                        </div>
            </li>
           <!-- end teb content -->
        </ul>
            </div>
        </div>
    </div>
</section>
@endsection