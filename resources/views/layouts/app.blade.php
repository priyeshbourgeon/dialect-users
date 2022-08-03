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
    <style>
          .ui-effects-transfer { border: 2px dotted gray; }
    </style>
</head>
<body>
    <!-- header -->
    <header>
        <div class="uk_container ">          
            <div class="header_nav">
                <div class="col brand">
                    <a href="{{ url('/') }}">    
                        <img src="{{asset('assets/images/logo.png') }}" title="" alt="">
                    </a>
                </div>
                <div class="col header_right">
                    <a href="{{ route('withoutLogin') }}" class="btn_com">Send Enquiry</a>
                </div>
            </div>
        </div>
    </header>
    <!--end header --> 
    <!-- Main Content -->
      @yield('content')
    <!-- End Main Content -->
    <footer>
        <div class="uk_container">
            <a href="">Copyright © dialectb2b.com. All rights reserved</a>
        </div>
    </footer>
    <!-- js -->     
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/uikit.min.js') }}"></script>
    <script src="{{ asset('assets/js/uikit-icons.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/select2/js/select2.min.js') }}"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    @stack('scripts')
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
    <script>
        $(document).ready(function() {
            $('#confirm').hide();
            $('.drop_category').select2();
            theme: "classic"
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
    <script>
        $(".eye_password").click(function(){
            $(this).toggleClass("show_pass");
            var type = $('#password').attr('type');
            if(type == 'password'){
                $('#password').attr('type','text');
            }
            else{
                $('#password').attr('type','password');
            }
        });
        
        function formControl(){
            $('.submit').attr('disabled','disabled');
            UIkit.modal.dialog('<p class="uk-text-center"><i uk-spinner="ratio: 5"></i> <br>Processing! Please Wait...</p>');
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#uploadPreview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#uploadImage").change(function(){
            readURL(this);
        });
        
    </script>
</body>
</html>