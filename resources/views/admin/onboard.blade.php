@extends('admin.layouts.app')
@section('content')
<style>
    .acc_head{
        background-color: #ec2531;
        color: #ffffff;
        margin: 5px;
        padding: 10px;
    }
</style>
    <div class="uk-container uk-width-expand">
        <div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
            <h3 class="uk-card-title">Welcome to the world of oportunities</h3>
            <p>Lorem ipsum sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <ul uk-accordion>
                <li>
                    <a class="uk-accordion-title acc_head" href="#">#1 Your Profile</a>
                    <div class="uk-accordion-content">
                        @include('admin.admin-profile')   
                    </div>
                </li>
                <li>
                    <a class="uk-accordion-title acc_head" href="#">#2 Procurement</a>
                    <div class="uk-accordion-content">
                        @if($procurement)
                           @include('admin.procurement-profile-view')  
                        @else
                           @include('admin.procurement-profile')  
                        @endif   
                    </div>
                </li>
                <li>
                    <a class="uk-accordion-title acc_head" href="#">#3 Sales</a>
                    <div class="uk-accordion-content">
                        @if($sales)
                           @include('admin.sales-profile-view') 
                        @else
                           @include('admin.sales-profile')  
                        @endif     
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="uk-margin"></div>
@endsection