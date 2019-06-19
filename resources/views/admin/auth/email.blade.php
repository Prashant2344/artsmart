@extends('layouts.app')

@section('title')
    Admin Password Reset
@endsection

@section('content')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}administrator/css/admin-login.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!------ Include the above in your HEAD tag ---------->
    <b style="color: #0d6aad"> <center> ADMIN Reset Password </center></b>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="{{asset('')}}uploads/images/banners/usericon.png" id="icon" alt="User Icon" />
            </div>

            @include('admin/layouts/error')
            <!-- Login Form -->
            <form method="POST" action="{{ route('admin.password.email') }}">
                @csrf
                <input type="text" id="login" class="fadeIn second" name="email" placeholder="Email">
                <input type="submit" class="fadeIn fourth" value="Sent Link" style="background-color: #2e76ea">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="{{url('/admin/login')}}">Login</a>
            </div>

        </div>
    </div>
@endsection
