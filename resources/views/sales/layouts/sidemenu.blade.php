<div class="col_maii_left toggle_sidebar">
    <div class=" uk-card uk-card-default uk-card-small ">
        <div class="side_anglebnt">
            <div class="tog_btn">
                <i class="fa fa-angle-left"></i>
            </div>
        </div>
        <ul>
            <li><a href="{{ route('sales.home') }}"> <i class="fa fa-inbox "></i> <span class="nav_text"> Received
                        Enquiries </span> </a></li>
            <li class="{{ request()->is('sales/outbox') ? 'm-active' : '' }}"><a href="{{ route('sales.outbox') }}"><i
                        class="fa fa-paper-plane-o "></i> <span class="nav_text"> Replied Enquiries </span> </a></li>
            <li><a href="{{ route('sales.draft') }}"><i class="fa fa-file-text-o"></i> <span class="nav_text"> Draft
                    </span> </a></li>
            <li><a href="{{ route('sales.enquiry-timeout') }}"><i class="fa fa-calendar-times-o"></i> <span
                        class="nav_text"> Enquiry Timeout </span> </a></li>
            <li><a href="{{ route('sales.events') }}"><i class="fa fa-calendar"></i> <span class="nav_text"> Upcoming
                        Events </span> </a></li>
            
        </ul>
    </div>
</div>