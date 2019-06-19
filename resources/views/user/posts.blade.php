@extends('website.app')

@section('title')
    Art Smart | User Post
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
                <div class="userdash-common user-posts-wrap">
                    <h4>My Posts <a href="{{url('post/add')}}" class="btn-common" style="float:right; font-size: 12px; padding:10px 30px;">NEW POST</a></h4>
                    <div class="user-posts row">
                        <!-- news -->
                        @foreach($posts as $row)
                        <div class="col-lg-4 col-md-6">
                            <!-- news -->
                            <div class="common-news text-center">
                                <div class="img-container"> <a href="{{url('/post/'.$row->id)}}" class="image-overlay"></a> <img src="{{asset('')}}uploads/arts/{{$row->image}}" class="img-fitted" alt="swadesh">
                                    <!-- status-->
                                    @if($row->status == 0)
                                        <span class="not-approved s-status">
                     	                    <i class="far fa-times-circle"></i>
                                        </span>
                                    @else
                                        <span class="approved s-status">
                                            <i class="far fa-check-circle"></i>
                                        </span>
                                    @endif
                                </div>
                                <div class="common-caption">
                                    <h4 class="heading-vsm">{{ucwords($row->title)}}</h4>
                                </div>
                            </div>
                        </div>
                        @endforeach
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

