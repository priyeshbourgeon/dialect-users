<!DOCTYPE html>
<html lang="en" dir="ltr" draggable="false">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Dailectb2b</title>
    <!-- fav icons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/fav-icons/fav-icon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/fav-icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/fav-icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/fav-icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/images/fav-icons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets/images/fav-icons/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- fav icons -->

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- css -->
    <link href="{{ asset('assets/plugin/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome-4.6.3/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/scss/site_style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/scss/responsive.css') }}">

    <!-- summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    
     

</head>
<body >
        <!-- header -->
        <header>
            <div class="uk_container"> 
                 
                    <div class="header_nav">
                        <div class="col brand">
                            <a href="{{ route('procurement.home') }}">    
                                <img src="{{ asset('assets/images/logo.png') }}" title="" alt=""></a>
                        </div>
                        <div class="col header_right header_dp_area">
                           <!-- <div>
                               <a href="" class="btn_com">Complaints</a></div> -->
                            <div>

                                <div class="uk-inline dp_wrap">

                                     <ul class="more_info">
                                        <!-- <li>
                                            <div class="icon_box">
                                              <i class="fa fa-bell-o"></i>
                                              <span>5</span>
                                            </div>
                                            <div uk-dropdown="pos: top-center" class="notification_box">
                                               <p> Notification</p>
                                                <div class="noti_item">
	
                                                    <a href="">
                                                        Lorem ipsum dolor sit amet, consectetur
                                                    </a>
                                                </div>
                                                <div class="noti_item">
	
                                                    <a href="">
                                                        Lorem ipsum dolor sit amet, consectetur
                                                    </a>
                                                </div>
                                                <div class="noti_item">
	
                                                    <a href="">
                                                        Lorem ipsum dolor sit amet, consectetur
                                                    </a>
                                                </div>
                                                <div class="noti_item">
	<a href="">
                                                    Lorem ipsum dolor sit amet, consectetur
                                                </a>
                                                </div>

                                                <a class="view_all" href="">View All</a>

                                            </div>
                                        </li>
                                         <li> 
                                             <div class="icon_box">
                                             <i class="fa fa-envelope-o "></i>
                                             <span>5</span>
                                            </div>

                                              <div uk-dropdown="pos: top-center" class="notification_box">
                                               <p> Inbox</p>
                                                <div class="noti_item">
	
                                                    <a href="">
                    consectetur Nunc non ultricies enim, dignissim faucibus quam. D
                                                    </a>
                                                </div>
                                                <div class="noti_item">
	
                                                    <a href="">
                                                        Lorem ipsum dolor sit amet, consectetur
                                                    </a>
                                                </div>
                                                <div class="noti_item">
	
                                                    <a href="">
                                                        Lorem ipsum dolor sit amet, consectetur
                                                    </a>
                                                </div>
                                                <div class="noti_item">
	<a href="">
                                                    Lorem ipsum dolor sit amet, consectetur
                                                </a>
                                                </div>

                                                <a class="view_all" href="">View All</a>

                                            </div>
                                        
                                        </li> -->
                                     </ul>
                                    <div class="dp_name">Hi,  {{ Auth::user()->name }} </div>
                                    <div class="dp_profile">  </div>
                                     
                                    <div uk-dropdown>
                                        <ul class="uk-nav uk-dropdown-nav">
                                            <li class="uk-align-center">
                                                {{ Auth::user()->name }}<br>
                                                <span class="uk-badge">{{ Auth::user()->designation ?? '' }}</span>
                                            </li>
                                            <li class="uk-align-center uk-margin-small">
                                                <a href="{{ route('profile') }}" uk-margin-small> 
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                  Manage Profile</a>
                                                </a>
                                            </li>
                                            <li class="uk-align-center uk-margin-small">
                                                <a href="{{ route('change-password') }}" uk-margin-small> 
                                                <i class="fa fa-key" aria-hidden="true"></i>
                                                  Change Password</a>
                                                </a>
                                            </li>
                                            <li class="uk-align-center uk-margin-small">
                                                <a href="#" uk-margin-small> 
                                                <i class="fa fa-paint-brush" aria-hidden="true"></i>
                                                  Change Color Theme</a>
                                                </a>
                                            </li>
                                            <li class="uk-align-center uk-margin-small">
                                                <a href="#" uk-margin-small> 
                                                <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                                  Feedback</a>
                                                </a>
                                            </li>
                                            <li  class="uk-align-center">
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"> 
												<i class="fa fa-power-off" aria-hidden="true"></i>
                                                   {{ __('Logout') }}</a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                    </div>

            </div>

        </header>
        <!--end header -->
     
        @yield('content')
					
							<footer>
            <div class="uk_container">
                        <a href="">Copyright © dialectb2b.com. All rights reserved </a>

            </div>
        </footer>



       
   <!-- --> 
   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
    </form>

    <input id="fetch_parent_url" type="hidden"  value="{{ route('getParent')}}">
    <input id="fetch_subcat_url" type="hidden"  value="{{ route('getSubCategory')}}">
    <input id="fetch_region_url" type="hidden"  value="{{ route('getRegion')}}">
    <input id="fetch_area_url" type="hidden"  value="{{ route('getArea')}}">
	<!-- / -->
    
    @if(session()->has('success'))    
        <script>
            UIkit.notification({message: '{{ session()->get('success') }}'})
        </script>    
        @endif   
        @if(session()->has('failed'))    
        <script>
             UIkit.notification({message: '{{ session()->get('failed') }}'})
        </script>    
    @endif  

 <!-- js -->     
<!-- <script src="{{ asset('assets/user/js/jquery-3.6.0.min.js') }}"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/uikit.min.js') }}"></script>
<script src="{{ asset('assets/js/uikit-icons.min.js') }}"></script>
<script src="{{ asset('assets/plugin/select2/js/select2.min.js') }}"></script>     

<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@stack('scripts')
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
    
  </script>
  <script>
            $(document).ready(function() {
                     $('.drop_category').select2();
                      theme: "classic"
                  });

                  $(document).ready(function(){
                    $(".toggle_sidebar").toggleClass("nav_small");
                $(".tog_btn").click(function(){
                    $(".toggle_sidebar").toggleClass("nav_small");
                });
                });
     
     </script> 
      <script>
        function mainNav() {
          var x = document.getElementById("myTopnav");
          if (x.className === "topnav") {
            x.className += " responsive";
          } else {
            x.className = "topnav";
          }
        }
        </script> 
       
</body>
</html>