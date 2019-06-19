@extends('website.app')

@section('title')
    Art Smart | Add Post
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
                            @include('user.error')
                                <!-- add new post/article -->
                                <h4>Post Arts</h4>
                                <form class="common-form" method="post" action="{{url('post/add')}}" enctype="multipart/form-data">
                                    @csrf
                                        <input type="hidden" name="artist_id" value="{{ auth()->guard('web')->user()->id }}">
                                    <!-- news title -->
                                    <div class="form-group">
                                        <label>Title:</label>
                                        <input type="text" name="title" placeholder="Title" value="">
                                    </div>

                                    <!-- image -->

                                    <div class="form-group">
                                        <label>Upload Image:</label>
                                        <input type="file" name="image" placeholder="" value="">
                                    </div>

                                    <!-- submit -->
                                    <div class="form-group">
                                        <button type="submit" class="form-btn">POST</button>
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
