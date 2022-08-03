<div class="col_maii_left toggle_sidebar">
    <div class=" uk-card uk-card-default uk-card-small sidecolor">
        <div class="side_anglebnt">
            <div class="tog_btn">
                <i class="fa fa-angle-left"></i>
            </div>
        </div>
        <div class="compose_mail">
            <a href="{{ route('procurement.compose-one') }}"> <i class="fa fa-plus"></i> <span> Generate Quote
                </span></a>
        </div>
        <hr>
        <ul>
            <li><a uk-tooltip="title: Inbox" href="{{ route('procurement.home') }}" class="tcolor"> <i
                        class="fa fa-inbox "></i> <span class="nav_text"> Inbox </span> </a></li>
            <li><a uk-tooltip="title: Sent" href="{{ route('procurement.outbox') }}" class="tcolor"><i
                        class="fa fa-paper-plane-o "></i> <span class="nav_text"> Outbox </span> </a></li>
            <li><a uk-tooltip="title: Draft" href="{{ route('procurement.draft') }}" class="tcolor"><i
                        class="fa fa-file-text-o"></i> <span class="nav_text"> Draft </span> </a></li>
            <li><a uk-tooltip="title: Upcoming Events" href="{{ route('procurement.events') }}" class="tcolor"><i
                        class="fa fa-calendar"></i> <span class="nav_text"> Upcoming Events </span> </a></li>
        </ul>
    </div>
</div>