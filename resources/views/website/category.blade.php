@extends('website.app')

@section('title')
    {{$category_title->permalink}}
@endsection

@section('content')

<section class="pad-top pad-bot standard-news-whole">
        <div class="container">
            <h3 class="heading-mid">{{strtoupper($category_title->name)}}</h3>
            <div class="row standard-news-wrap">
                <!-- small news -->
                <div class="col-lg-3 col-md-3">
                    <!-- news -->
                    @php($count=0)
                    @foreach($data as $row)
                        @if($count < 2)
                    <div class="common-news text-center">
                        <div class="img-container">
                            <a href="{{asset('')}}uploads/arts/{{$row->image}}" class="image-overlay cboxElement group2" title="Title of the image here..."></a>
                            <img src="{{asset('')}}uploads/arts/{{$row->image}}" class="img-fitted" alt="gallery">
                        </div>
                        <div class="common-caption">
                            <h4 class="heading-vsm">{{ucwords($row->title)}}</h4>
                            <span class="news-time"><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</span>
                        </div>
                    </div>
                            @php($count++)
                        @endif
                    @endforeach
                </div>

                <!-- big news -->
                <div class="col-lg-6 col-md-6 standard-news">
                    @php($count=0)
                    @foreach($data as $row)
                        @if($count>1 and $count<3)
                    <div class="standard-news-in text-center">
                        <div class="img-container">
                            <a href="{{asset('')}}uploads/arts/{{$row->image}}" class="image-overlay cboxElement group2" title="Title of the image here..."></a>
                            <img src="{{asset('')}}uploads/arts/{{$row->image}}" class="img-fitted" alt="gallery">
                        </div>
                        <div class="standard-caption">
                            <h3>{{ucwords($row->title)}}</h3>
                            <span class="news-time"><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</span>
                        </div>
                    </div>
                        @endif
                        @php($count++)
                    @endforeach
                </div>

                <!-- small news -->
                <div class="col-lg-3 col-md-3">
                    <!-- news -->
                    @php($count=0)
                    @foreach($data as $row)
                        @if($count>2 and $count < 5)
                    <div class="common-news text-center">
                        <div class="img-container">
                            <a href="{{asset('')}}uploads/arts/{{$row->image}}" class="image-overlay cboxElement group2" title="Title of the image here..."></a>
                            <img src="{{asset('')}}uploads/arts/{{$row->image}}" class="img-fitted" alt="gallery">
                        </div>
                        <div class="common-caption">
                            <h4 class="heading-vsm">{{ucwords($row->title)}}</h4>
                            <span class="news-time"><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</span>
                        </div>
                    </div>
                        @endif
                        @php($count++)
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- other news -->

    <section class="pad-top pad-bot other-wrap">
        <div class="container">
            <div class="other-news row">
                <!-- small news -->
                @php($count=0)
                @foreach($data as $row)
                    @if($count>4 and $count < 9)
                <div class="col-sm-3 other-news-in">
                    <!-- news -->
                    <div class="common-news text-center">
                        <div class="img-container">
                            <a href="{{asset('')}}uploads/arts/{{$row->image}}" class="image-overlay cboxElement group2" title="Title of the image here..."></a>
                            <img src="{{asset('')}}uploads/arts/{{$row->image}}" class="img-fitted" alt="gallery">
                        </div>
                        <div class="common-caption">
                            <h4 class="heading-vsm">{{ucwords($row->title)}}</h4>
                            <span class="news-time"><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
                    @endif
                    @php($count++)
                @endforeach
            </div>
        </div>
    </section>

@endsection