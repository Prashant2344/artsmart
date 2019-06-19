@extends('website.app')

@section('title')
    Art Smart | Artist Dashboard
@endsection

@section('content')

    <section class="user-dash pad-bot inner-page pad-top">
        <div class="container">
            <div class="row">
                <!-- sidebar -->
                @include('user.sidebar')

                <!-- user-contents -->
                <div class="userdash-content col-lg-9 col-md-9">
                    <div class="dash-inner">
                        <div class="dash-main">
                            <!-- profile -->
                            <div class="user-profile row">
                                <!-- profile image -->
                                <div class="user-image col-lg-4">
                                    <div class="img-container">
                                    @if(Auth::guard('web')->user()->provider_id > 0)
                                        <img src="{{ auth()->guard('web')->user()->image }}" alt="username" class="img-fitted">
                                    @else
                                        <img src="{{asset('')}}uploads/users/{{ auth()->guard('web')->user()->image }}" alt="username" class="img-fitted">
                                    @endif

                                    </div>
                                </div>
                                <!-- profile details -->
                                <div class="user-details col-lg-8">
                                    <ul class="user-details-list">
                                        <li><span>Email:</span> {{ auth()->guard('web')->user()->email }}</li>
                                    </ul>

                                    <!-- links -->
                                    <div class="posts-thumb">
                                        <h4>You have submitted <span class="color-blue">{{$count}}</span> posts...</h4>
                                        <a href="{{url('post/add')}}" class="btn-common">NEW POST</a>
                                        <a href="{{url('posts')}}" class="btn-stylish">RECENT POSTS</a>
                                    </div>
                                </div>



                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    @endsection