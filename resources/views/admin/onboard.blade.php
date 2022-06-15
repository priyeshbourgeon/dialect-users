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
            <h3 class="uk-card-title">Welcome to the world of opportunities</h3>
            <!-- <p>Lorem ipsum sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
            <ul uk-accordion>
                <li class="{{ !$user->role ? 'uk-open' : '' }}">
                    <a class="uk-accordion-title acc_head" href="#" uk-tooltip="title: clich here to open your profile">#1 Your Profile</a>
                    <div class="uk-accordion-content">
                        @include('admin.admin-profile')   
                    </div>
                </li>
                <li class="{{ !$procurement ? 'uk-open' : '' }}">
                    <a class="uk-accordion-title acc_head" href="#" uk-tooltip="title: clich here to open procurement profile">
                       <span class="uk-align-left">#2 Procurement </span> 
                        @if($procurement)
                            @if($procurement->password =='')
                            <span class="uk-label uk-align-right" style="background-color:yellow;color:#000">
                                Activation Pending
                            </span>
                            @else
                            <span class="uk-label uk-align-right" style="background-color:green">
                                Active
                            </span>
                            @endif
                        @endif  
                    </a>
                    <div class="uk-accordion-content">
                        @if($procurement)
                           @include('admin.procurement-profile-view')  
                        @else
                           @include('admin.procurement-profile')  
                        @endif   
                    </div>
                </li>
                <li class="{{ !$sales ? 'uk-open' : '' }}">
                    <a class="uk-accordion-title acc_head" href="#" uk-tooltip="title: clich here to open sales profile">
                        <span class="uk-align-left">#3 Sales</span>
                        @if($sales)
                            @if($sales->password =='')
                            <span class="uk-label uk-align-right" style="background-color:yellow;color:#000">
                                Activation Pending</span>
                            @else
                            <span class="uk-label uk-align-right" style="background-color:green">
                                Active</span>
                            @endif
                        @endif 
                        
                    </a>
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