@extends('sales.layouts.app')
@section('content')
<section class="mail_wrap">
    <div>
        <div class="mail_grip_wrap mail_theme">
            @include('sales.layouts.sidemenu')
            <div class="col_right_ca">
                <div class="col_maii_middle">
                    <div class="col_maiil_left">
                        <div class="panel_header" style="padding-left:10px"><i class="fa fa-calendar"></i> Upcoming
                            Events</div>
                        <ul uk-accordion>
                            <li class="uk-margin-remove">
                                <img src="{{ asset('assets/images/data/nodatafound.png') }}" style="margin-left:25%;" />
                                <h4 style="margin-left:32%;">No Events Found!</h4>
                            </li>
                        </ul>
                    </div>
                    <div class="col_maii_right">
                        <div class="mail_expand uk-padding-right">
                            <h3 class="subject">

                            </h3>
                            <div class="main_head">
                                <div class="mailer_box">
                                    <h3 class="mailer_name "> </h3>
                                    <div class="date"></div>
                                    <div class="mail_id"></div>
                                </div>
                            </div>
                            <div class="mail_text uk-margin-top">

                            </div>
                            <!-- nest Section  -->


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection