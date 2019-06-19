<!DOCTYPE html>
<html lang="en" >
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->
    <!--begin::Base Styles -->
    <link href="{{ asset('administrator/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('administrator/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Base Styles -->
    <link rel="shortcut icon" href="{{asset('')}}uploads/settings/{{$setting->image}}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <style>
    /*.m-input-icon.m-input-icon--left .form-control {padding-left:15px !important;}*/
        @media(max-width:842px){
            .m-portlet__head-text small {padding-left:0 !important; padding-top:3px; margin-right:15px !important;}
           
        }
        
        @media(max-width:768px){
            .m-form__group .col-md-3 {margin-bottom:10px;}
            .custom-file {width:100% !important;}
        } 
        
          @media(max-width:575px){
           .m-portlet__head {padding:15px !important;}
           .m-portlet .m-portlet__body {padding:15px !important; padding-bottom:1px !important;}
           .m-widget1 {padding:10px 0 !important;}
           .m-widget5 {padding:15px 0 !important; margin-left:-15px;}
           .m-portlet.m-portlet--full-height {margin-bottom:0 !important;} 
        } 
    </style>
    @yield('header')

</head>
<!-- end::Head -->
<!-- end::Body -->
<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
    <!-- begin:: Page -->

<style>
#error-msg {background:#cf2338; padding:15px 0;}
#error-msg h4 {color:#fff; font-size:14px;}
#error-msg h4 i {margin-right:10px;}
#error-msg h4 a {float:right; font-size:30px; color:#fff; margin-top:-12px;}
</style>    
<div id="error-msg" style="display:none">
   <div class="container">
        <h4 style="margin:0"><i class="fas fa-info-circle"></i>This browser may not support all the Features of the Website. Please use Chrome, Firefox, Opera or similar browsers for better User Experience.</h4>
   </div>
</div>

<script>
isIE = false || !!document.documentMode;
if(isIE == true){
    document.getElementById("error-msg").style.display = "block";
    
}
</script>
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <!-- BEGIN: Header -->
        <header id="m_header" class="m-grid__item    m-header "  m-minimize-offset="200" m-minimize-mobile-offset="200" >
            <div class="m-container m-container--fluid m-container--full-height">
                <div class="m-stack m-stack--ver m-stack--desktop">
                    <!-- BEGIN: Brand -->
                    <div class="m-stack__item m-brand  m-brand--skin-dark ">
                        <div class="m-stack m-stack--ver m-stack--general">
                            <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                <a href="#" class="m-brand__logo-wrapper">
                                <!-- Side Bar Image -->
                                    <img alt="Logo Image" src="{{asset('')}}uploads/admins/{{Auth::guard('admin')->user()->image}}" style="max-width:50px;" />
                                </a>
                            </div>
                            <div class="m-stack__item m-stack__item--middle m-brand__tools">
                                <!-- BEGIN: Left Aside Minimize Toggle -->
                                <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block">
                                    <span></span>
                                </a>
                                <!-- END -->
                                <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                                <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                    <span></span>
                                </a>
                                <!-- END -->
                                <!-- BEGIN: Topbar Toggler -->
                                <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                    <i class="flaticon-more"></i>
                                </a>
                                <!-- BEGIN: Topbar Toggler -->
                            </div>
                        </div>
                    </div>
                    <!-- END: Brand -->
                    <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                        <!-- BEGIN: Horizontal Menu -->
                        <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
                            <i class="la la-close"></i>
                        </button>
                        <!-- END: Horizontal Menu -->                               
                        <!-- BEGIN: Topbar -->
                        <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                            <div class="m-stack__item m-topbar__nav-wrapper">
                                <ul class="m-topbar__nav m-nav m-nav--inline">
                                <img src="{{asset('')}}uploads/admins/{{Auth::guard('admin')->user()->image}}" class="m--img-rounded m--marginless m--img-centered" alt="" style="max-width:50px;"/>
                                    <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                        <a href="#" class="m-nav__link m-dropdown__toggle">
                                            <span class="m-topbar__userpic">
                                             Rewasoft
                                            </span>
                                            <span class="m-topbar__username m--hide">
                                            Rewasoft
                                            </span>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__header m--align-center" style="background: url({{ asset('administrator/app/media/img/misc/user_profile_bg.jpg') }}); background-size: cover;">
                                                    <div class="m-card-user m-card-user--skin-dark">
                                                        <div class="m-card-user__pic">
                                                        <img src="{{asset('uploads/admin/fav.png')}}" class="m--img-rounded m--marginless" alt=""/>
                                                        </div>
                                                        <div class="m-card-user__details">
                                                            <span class="m-card-user__name m--font-weight-500">
                                                            Rewasoft
                                                            </span>
                                                            <a href="" class="m-card-user__email m--font-weight-300 m-link">
                                                            rewasoft@gmail.com
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav m-nav--skin-light">
                                                            <li class="m-nav__section m--hide">
                                                                <span class="m-nav__section-text">
                                                                    Section
                                                                </span>
                                                            </li>
                                                            <li class="m-nav__item">
                                                            <a href="#" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                                    <span class="m-nav__link-title">
                                                                        <span class="m-nav__link-wrap">
                                                                            <span class="m-nav__link-text">
                                                                                My Profile
                                                                            </span>
                                                                            <!-- <span class="m-nav__link-badge">
                                                                                <span class="m-badge m-badge--success">
                                                                                    2
                                                                                </span>
                                                                            </span> -->
                                                                        </span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__separator m-nav__separator--fit"></li>
                                                            <li class="m-nav__item">
                                                            <a href="{{url('/admin/logout')}}" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                                    Logout
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- END: Topbar -->
                    </div>
                </div>
            </div>
        </header>
        <!-- END: Header -->
        
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

            @include('admin/layouts/sidebar')
            
            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                <!-- begin::Body -->
                <div id="app" style="position:relative">

                    <noscript>

                        <div style="position: absolute;width: 100%;height: 100%;background: rgba(255,255,255,0.5);text-align: center;z-index: 999999;">
                            <div class="alert alert-danger" style="font-size: 14px;font-weight: 400;padding: 10px;margin-bottom: 0;margin-top: 20%;background-position: center;box-shadow: 0 1px 15px 1px rgba(69,65,78,.08);color:#fff;display: inline-block;">
                                <i class="la la-warning"></i><strong>Your browser does not support JavaScript!</strong>
                            </div>
                        </div>

                    </noscript>

                    <flash message=""></flash>
                    
                    @yield('content')
                    
                </div>
                <!-- end:: Body -->
            </div>

        </div>

        <!-- begin::Footer -->
        <footer class="m-grid__item m-footer ">
            <div class="m-container m-container--fluid m-container--full-height m-page__container">
                <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                    <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                        <span class="m-footer__copyright">
                            {{ date('Y') }} &copy; Rewa Soft Pvt. Ltd
                            <a href="http://rewasoft.com.np/" class="m-link">
                                Rewa Soft Pvt. Ltd
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </footer>
          <!-- end::Footer -->
      </div>
      <!-- end:: Page -->
      
      <!-- begin::Scroll Top -->
      <div id="m_scroll_top" class="m-scroll-top">
        <i class="la la-arrow-up"></i>
    </div>
    <!-- end::Scroll Top -->
    
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    <!--begin::Base Scripts -->
    <script src="{{ asset('administrator/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('administrator/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
    <!--end::Base Scripts -->

    @yield('footer')
    
</body>
<!-- end::Body -->
</html>