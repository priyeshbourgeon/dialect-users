@extends(strtolower(auth()->user()->designation).'.layouts.app')
@section('content')
<section class=" uk-padding-small uk-clearfix">
    <div class="uk_container ">
        <ul class="uk-breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Profile</a></li>

        </ul>
    </div>



</section>

<section class="mail_wrap">
    <div uk-grid>
        <div>
            <div class="uk_container">
                <div class="ad_profile">
                    <div class="">
                        <div class=" uk-card uk-card-default uk-card-small uk-card-body">
                            @php $url = strtolower(auth()->user()->designation) == 'admin' ? 'admin/home' :
                            strtolower(auth()->user()->designation).'/inbox'; @endphp
                            <a href="{{ url($url) }}" style="background: #20285b;width:70%;"
                                class="btn_com uk-align-center"> Back to inbox</a>
                            <div class="inner">
                                <div class="profile_dp">
                                    <div class="dp" style="background: url(images/dp_150x150.png);">
                                        <a href="{{ route('profile.change-dp') }}"> <i class="fa fa-edit"></i> </a>
                                    </div>
                                    <h3 class="name">{{ Auth::user()->name ?? '' }}</h3>
                                    <p class="description">{{ Auth::user()->designation ?? '' }}</p>
                                </div>
                                <hr>
                                <div class="profile_information">
                                    <ul>
                                        <li>
                                            <div> <i class="fa fa-tag"></i></div>
                                            <div> {{ Auth::user()->role ?? '' }} </div>
                                        </li>
                                        <li>
                                            <div> <i class="fa fa-mobile"></i></div>
                                            <div> {{ Auth::user()->mobile ?? '' }} </div>
                                        </li>

                                        <li>
                                            <div> <i class="fa fa-envelope-o"></i></div>
                                            <div> {{ Auth::user()->email ?? '' }}</div>
                                        </li>

                                        <li>
                                            <div> <i class="fa fa-phone"></i></div>
                                            <div> {{ Auth::user()->landline ?? '' }} </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-width-expand@m">
            <div class="uk_container">
                <div class=" uk-card uk-card-default uk-card-small uk-card-body">
                    <div class="inner">
                        <div class="profile_dp">
                            <a href="{{ url()->previous() }}" class="btn_com"> Back</a>
                            <a href="{{ route('profile.edit') }}" class="btn_com">Edit Profile</a>
                            <a href="{{ route('profile.theme') }}" class="btn_com"> Change Color Theme</a>
                            <a href="{{ route('change-password') }}" class="btn_com"> Change Password</a>
                        </div>
                        <hr>
                        <div class="profile_information">
                            <h3 class="name">Document
                                @if(strtolower(auth()->user()->designation) == 'admin')
                                <a href="{{ route('profile.document') }}" class="btn_com uk-align-right">Edit</a>
                                @endif
                            </h3>
                            <div uk-grid>
                                <div>
                                    <ul>
                                        <li>Document : {{ $document->document->name ?? '' }}</li>
                                        <li>Document No: {{ $document->doc_number ?? '' }} </li>
                                        <li>Expiry Date : {{ $document->expiry_date ?? '' }}</li>
                                        <li>Status : {{ $document->expiry_date > date('Y-m-d') ? 'active' : 'expired' }}
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <a href="{{ $document->doc_file }}" target="popup"
                                        uk-tooltip="title: Click here to preview"
                                        onclick="window.open('{{ $document->doc_file }}','{{ $document->document->name ?? '' }}','width=1600,height=2400,directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no')">
                                        <embed src="{{ $document->doc_file }}" width="150px" height="200px" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="profile_information">
                            <h3 class="name">Business Categories
                                @if(strtolower(auth()->user()->designation) == 'admin')
                                <a href="{{ route('profile.categories') }}" class="btn_com uk-align-right">Add New
                                    Category</a>
                                @endif
                            </h3>
                            <div>
                                <table class="uk-table">
                                    @foreach($subcategories as $key => $val)
                                    <tr>
                                        <td>
                                            @if(strtolower(auth()->user()->designation) == 'admin')
                                            <a class="del-category">{{ $val->name ?? ''}}</a>
                                            @else
                                            <a class="">{{ $val->name ?? ''}}</a>
                                            @endif
                                            <a href="#" class="uk-align-right"
                                                uk-tooltip="title: Delete {{ $val->name ?? ''}}"
                                                onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
@endsection