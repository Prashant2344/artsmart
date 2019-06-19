<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="title" content="{{ $seo_title }}">
    <meta name="keywords" content="{{ $seo_keyword }}">
    <meta name="description" content="{{ $seo_description }}">
    <meta name="author" content="swadesh sandesh">
    
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{asset('')}}uploads/settings/{{$setting->image}}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('') }}assets/css/animate.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/owl/owl.carousel.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/owl/owl.theme.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/owl/owl.transitions.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/colorbox.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/hover-min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/dialog.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/dialog-wilma.css">
    <link href="{{ asset('') }}assets/css/main.css" rel="stylesheet">
    <script src="{{ asset('') }}assets/js/jquery3.3.1.min.js"></script>
    <script src="{{ asset('') }}assets/js/popper.min.js"></script>
    <script src="{{ asset('') }}assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('') }}assets/js/modernizr.custom.js"></script>

    @yield('header')
</head>

<body>
<div id="mySidenav" class="sidenav" style="z-index:99999">
    <div class="nav-side">
        <a href="{{url('/')}}">
            <img src="{{ asset('') }}assets/images/logo.fw.png" class="side-logo" alt="swadesh sandesh">
        </a>
        <div class="mobile-search">
        </div>
        <div class="side-cat-wrap">
            <h3 class="cats-title">CATEGORIES</h3>
            <ul class="nav navbar-nav">
                @foreach($categories as $category)
                    <li class="active">
                        <a href="{{url('/'.$category->permalink)}}" class="hvr-float">{{strtoupper($category->name)}} </a>
                    </li>
                @endforeach
                <li class="active"><a href="{{url('/gallery')}}"><i class="fas fa-image" style="margin-right:5px; color:#17A2B8"></i>Photo Gallery</a></li>
                <li><a href="{{url('/edition-nepal')}}"><i class="fab fa-youtube" style="margin-right:5px; color:#ed2939"></i>Edition Nepal</a></li>
            </ul>
        </div>
    </div>

    <div class="close-btn-wrap">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    </div>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.left = "0";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.left = "-380px";
        }
    </script>
</div>

<!-- Header -->
<header>
    <!-- header top -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 top-left desktop">
                    <div class="content-search">
                        <form>
                            <button type="submit"><i class="fas fa-search"></i></button>
                            <input type="text" id="search" name="search" placeholder="Search content..." value="">
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 top-mid left-align right-align text-center">
                    <div class="logo-wrap img-container">
                        <a href="{{url('/')}}">
                        <img src="{{ asset('') }}assets/images/logo.png" alt="swa" height="60px">
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 top-left mobile">
                    <div class="content-search">
                        <form>
                            <button type="submit"><i class="fas fa-search"></i></button>
                            <input type="search" placeholder="Search content..." value="">
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 top-right">

                    @if(auth()->guard('web')->check())
                        <a href="{{url('posts')}}" class="normal-link" style="border-right:2px solid #EEEEEE; padding-right:15px;"><i class="fas fa-user"> Posts</i></a>
                    @else
                        <a href="{{url('/signup')}}" class="normal-link" style="border-right:2px solid #EEEEEE; padding-right:15px;"><i class="fas fa-user"></i> Sign Up</a>
                    @endif

                    <a href="#" class="normal-link"><i class="fas fa-bullhorn"></i> Support</a>

                    @if(auth()->guard('web')->check())
                        <a href="{{url('/profile')}}" class="login-btn">{{ auth()->guard('web')->user()->fullname }}</a>
                    @else
                        <a href="javascript:void(0)" class="login-btn trigger" data-dialog="login">Login</a>
                    @endif

                    <div id="login" class="dialog">
                        <div class="dialog__overlay"></div>
                        <div class="dialog__content">
                            <div class="morph-shape">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 560 280" preserveAspectRatio="none">
                                    <rect x="3" y="3" fill="none" width="556" height="276"/>
                                </svg>
                            </div>
                            <div class="dialog-inner" style="position:relative">
                                <button type="button" class="action login-close" data-dialog-close><i class="far fa-times-circle"></i></button>

                                <div class="loader" style="display: none; width: 100%; height: 100%; position: absolute; top:0; left: 0; z-index:9999; background:rgba(255,255,255,0.7); padding-top:26%; text-align:center">
                                    <img src="https://www.swadeshsandesh.com/images/loader.gif" alt="loading..." width="100px">
                                </div>
                                <img src="{{asset('')}}uploads/images/banners/swadesh.png" class="login-logo" alt="swadesh sandesh" width="300px">
                                <div class="log-form-wrap">
                                    <h2>Writer Login </h2>

                                    <!-- messages -->
                                    <div id="message"></div>

                                @include('admin/layouts/error')

                                    <!--method="post" action="{{url('/login')}}"-->

                                    <form class="common-form" id="login-form" name="login">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="email" placeholder="Email" id="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="Password" id="password">
                                        </div>
                                        <div>
                                            <button type="submit" id="ajaxSubmit" class="action form-btn btn-submit" style="float:none; margin-top:5px;">LOGIN</button>
                                            <a href="login/github" class="form-btn" style="float:none; margin-top:5px; background-color:#09cdd4;">Login with Github</a>
                                            <a href="login/facebook" class="form-btn" style="float:none; margin-top:5px; background-color:#09cdd4;">Login with Facebook</a>
                                        </div>
                                    </form>
                                </div>

                                <a href="{{route('password.request')}}" class="custom-control-description forgottxt_clr" style="margin-top:10px;">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:void(0)" class="menu-bar" onClick="openNav()"><i class="fas fa-bars"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>

@yield('content')

<footer class="pad-bot">
    <footer class="pad-bot">
        <div class="container text-center">
            <p class="copyright-text">Copyright  @ Swadesh Sandesh 2019. All Rights Reserved. Powered By:
                <a href="https://www.rewasoft.com.np/" target="_blank">REWA SOFT</a>
            </p>
        </div>
    </footer>
</footer>

<script src="{{ asset('') }}assets/owl/owl.carousel.js"></script>

<!-- Only for home page and gallery page -->
<script>
//    $(document).ready(function(){
//        //Examples of how to assign the Colorbox event to elements
//        $(".group1").colorbox({rel:'group1'});
//        $(".group2").colorbox({rel:'group2', transition:"fade"});
//        $(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
//        $(".group4").colorbox({rel:'group4', slideshow:true});
//        $(".ajax").colorbox();
//        $(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
//        $(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
//        $(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
//        $(".inline").colorbox({inline:true, width:"50%"});
//        $(".callbacks").colorbox({
//            onOpen:function(){ alert('onOpen: colorbox is about to open'); },
//            onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
//            onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
//            onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
//            onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
//        });
//
//        $('.non-retina').colorbox({rel:'group5', transition:'none'})
//        $('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
//
//        //Example of preserving a JavaScript event for inline calls.
//        $("#click").click(function(){
//            $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
//            return false;
//        });
//    });
</script>
<script src="{{ asset('') }}assets/js/jquery.colorbox.js"></script>
<script src="{{ asset('') }}assets/js/plugins.min.js"></script>
<script src="{{ asset('') }}assets/js/classie.js"></script>
<script src="{{ asset('') }}assets/js/dialogFx.js"></script>
<script>
    (function() {

        var dlgtrigger = document.querySelector( '[data-dialog]' ),
            somedialog = document.getElementById( dlgtrigger.getAttribute( 'data-dialog' ) ),
            dlg = new DialogFx( somedialog );

        dlgtrigger.addEventListener( 'click', dlg.toggle.bind(dlg) );

    })();
</script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".btn-submit").click(function(e){
        e.preventDefault();
        var password = $("input[name=password]").val();
        var email = $("input[name=email]").val();

        $.ajax({
           type:'POST',
           url:'/userlogin',
           dataType: 'JSON',
           data:{password:password, email:email},

           success: function(response) {
               
            if(response.success) {
                    $('.loginloader').fadeOut();
                     document.getElementById("message").className = "";
                     document.getElementById("message").className = "alert alert-success alert-dismissible";
                   
                    $('.div-message').fadeIn(200).show();
                    $("#message").fadeIn(200).html(response.success);
                    window.location.href = "/profile";
                }

                if(response.error) {
                    $('.loginloader').fadeOut();
                    document.getElementById("message").className = "";
                    document.getElementById("message").className = "alert alert-danger alert-dismissible";
                    
                    $('.div-message').fadeIn(200).show();
                    $("#message").fadeIn(200).html(response.error); 
                }
            }
        });
	});

</script>


@yield('footer')

</body>
</html>