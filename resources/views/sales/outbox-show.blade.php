@extends('sales.layouts.app')
@section('content')
<section class="mail_wrap">
    <div>
        <div class="mail_grip_wrap">
            @include('sales.layouts.sidemenu')

            <div class="col_right_ca">
                <h1 class="comm_title">Hi, {{ Auth::user()->name ?? '' }}</h1>
                <div class="col_maii_middle">

                    <div class="col_maiil_left">
                        <div class="col uk-margin-small uk-card uk-card-default uk-card-small uk-card-body">


                            <div class="panel_header"> Sent</div>


                            <div class="uk-overflow-auto table_ct">
                                <div class="uk-overflow-auto table_ct">
                                    <article class="uk-article">
                                        <h3 class="uk-card-title"><a class="uk-link-reset"
                                                href="">{{ $mail->subject }}</a></h3>
                                        <div class="uk-child-width-1-2@s" uk-grid>
                                            <h4 class="uk-text-bold">{{ ucfirst($mail->sender_name) }}</h4>
                                            <div class="uk-article-meta uk-text-right">
                                                {{ \Carbon\Carbon::parse($mail->created_at)->diffForhumans() }}</div>
                                        </div>
                                        <p class="uk-text-lead">{!! $mail->description !!}</p>

                                        <hr class="uk-divider-icon">
                                        @if($mail->attachment)
                                        <a href="{{ $mail->attachment ?? '' }}" download>Download Attachment</a>
                                        @endif
                                    </article>

                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="col_maii_right">
                        <div class=" uk-card uk-card-default uk-card-small uk-card-body">
                            <div class="panel_header"> Details</div>
                            <div class="uk-child-width-1-1@s">
                                @if($mail->request_time > \Carbon\Carbon::today())
                                <p class="uk-article-meta"><strong>Valid Upto : </strong>
                                    {{ \Carbon\Carbon::parse($mail->request_time)->format('d F Y') }}</p>
                                @else
                                <p class="uk-article-meta"><strong>Expired On :</strong>
                                    {{ \Carbon\Carbon::parse($mail->request_time)->format('d F Y') }}</p>
                                @endif
                                <p class="uk-article-meta"><strong>Category : </strong>
                                    {{ $mail->category->name ?? '' }}</p>
                                <p class="uk-article-meta"><strong>Country : </strong> {{ $mail->country->name ?? '' }}
                                </p>
                                <p class="uk-article-meta"><strong>Region : </strong> {{ $mail->region->name ?? '' }}
                                </p>
                                <p class="uk-article-meta"><strong>Sent On :</strong>
                                    {{ \Carbon\Carbon::parse($mail->created_at)->format('d F Y') }}</p>
                                <p class="uk-article-meta"><strong>Sent By :</strong> {{ $mail->user->name ?? '' }}</p>
                                <hr class="uk-divider-icon">
                                @if($mail->attachment)
                                <a href="{{ $mail->attachment ?? '' }}" download>
                                    <i class="fa fa-download mr-2" aria-hidden="true"></i>Download Attachment</a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </div>

    </div>
</section>

@endsection