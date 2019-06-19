@extends('website.app')

@section('title')
    Art Smart | Edit Artist
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

                            <div class="new-post">
                                <!-- add new post/article -->
                                <h4>Edit Profile</h4>
                                @include('user.error')


                                <form class="common-form" name="profile" method="post" action="{{url('profile/edit')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-groups row">
                                        <div class="form-groups-side col-lg-6 col-md-6">
                                            <!-- firstname -->
                                            <div class="form-group">
                                                <label>Name:</label>
                                                <input type="text" name="fullname" placeholder="Name" value="{{$user->fullname}}">
                                            </div>
                                            <!-- Email -->
                                            <div class="form-group">
                                                <label>Email:</label>
                                                <input type="text" name="email" placeholder="Email" value="{{$user->email}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Number:</label>
                                                <input type="text" name="number" placeholder="Email" value="{{$user->number}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Password:</label>
                                                <input type="password" name="password" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <label>Password Confirmation:</label>
                                                <input type="password" name="password_confirmation" placeholder="Password Confirmation">
                                            </div>
                                        </div>
                                        <!-- image -->
                                        <div class="form-groups-side col-lg-6 col-md-6">
                                            <div class="img-container">

                                                <img src="{{asset('')}}uploads/users/{{$user->image}}" alt="{{$user->fullname}}" class="img-fitted">

                                            </div>
                                            <div class="form-group">
                                                <label>Upload Image:</label>
                                                <input type="file" name="image">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- submit -->
                                    <div class="form-group">
                                        <button type="submit" class="form-btn">UPDATE</button>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection