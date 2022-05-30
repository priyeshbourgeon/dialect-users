@extends(strtolower(auth()->user()->designation).'.layouts.app')
@section('content')
 <!-- banner -->
        <section class="mail_wrap">
            <div class="uk_container">
                <div class="ad_profile">
                        <div class="">
                            <div class=" uk-card uk-card-default uk-card-small uk-card-body">
                                <div class="inner">
                                    <h3>Business Categories</h3>
                                    <div class="profile_information">
                                            <ul>
                                                @foreach($subcategories as $key => $val)
                                                 <li>
                                                    {{ $val->name ?? ''}}
                                                </li>
                                                @endforeach
                                            </ul>
                                    </div> 
                                    <div class="footer">
                                        <a href="{{ url()->previous() }}" class="btn_com"> Back</a>
                                    </div>                    
     
                                </div>
                            </div>
                        </div>

                </div>
                
 
            </div>
        </section>
    @endsection