@extends('layouts.app')
@section('content')
<!-- banner -->
<section class="inner_page uk-clearfix">
            <div class="uk_container ">
                <div class="uk-card uk-card-default uk-card-body">
                    <h3>Selected Services</h3>
                    <div class="uk-overflow-auto">
                        @foreach($companyActivities  as $key => $ca)
                        <span class="uk-label uk-padding uk-margin" uk-tooltip="title: Click here to remove {{ $ca->name }}">{{ $ca->name ?? ''  }}</span>
                        @endforeach
                    </div>

                <div class="uk-width-1-1@m uk-margin-medium-top uk-text-right">
                    <div class=" form_group">
                    <a href="{{ route('registration.selectService') }}"><button type="button" class="btn_com">Back</button></a>
                    <a href="{{ route('registration.makePayment') }}"><button type="button" class="btn_com">Confirm & Proceed</button></a>
                    </div>
                   </div>

                </div>


                
            </div>

        </section>
@endsection