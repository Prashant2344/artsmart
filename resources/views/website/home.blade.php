@extends('website.app')

@section('title')
    Art Smart | Online Platform for Nepelese Artist
@endsection

@section('content')

    <!-- slider -->
    <section class="slider-wrap">
        <div class="row slider">
            <div class="col-lg-6">
                <div id="slider1" class="carousel carousel-fade slide large-slider" data-interval="10000" data-ride="carousel" data-pause="false">
                    <div class="carousel-inner">
                        @php($count=0)
                        @foreach($features as $feature)
                            @if($count == 0)
                        <div class="carousel-item <?php if($count == 0 ) { echo "active"; } ?>">
                            <img src="{{ asset('') }}uploads/arts/{{$feature->image}}" alt="Los Angeles" class="img-fitted">
                            <!-- news -->
                            <div class="carousel-caption animated fadeIn" style="animation-delay:1s">
                                <div class="caption-news text-left">
                                    <a href="{{url('/'.$feature->permalink)}}" class="news-cat bg-<?php {echo "$feature->color";} ?>">{{$feature->category}}</a>
                                    <h3 class="heading-sm"><a href="{{url('/article/'.$feature->slug)}}">{{ucwords($feature->title)}}</a></h3>
                                    <span class="news-time"><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($feature->created_at)->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                                @php($count++)
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- second slider -->
            <div class="col-lg-3 col-md-6">
                <div id="slider2" class="carousel carousel-fade slide small-slider" data-ride="carousel" data-interval="10000" data-pause="false">
                    <div class="carousel-inner">
                        @php($count=0)
                        @foreach($features as $feature)
                            @if($count == 1)
                        <div class="carousel-item <?php if($count == 1 ) { echo "active"; } ?>">
                            <img src="{{ asset('') }}uploads/arts/{{$feature->image}}" alt="Los Angeles" class="img-fitted">
                            <!-- news -->
                            <div class="carousel-caption animated fadeIn" style="animation-delay:2s">
                                <div class="caption-news text-left">
                                    <a href="{{url('/'.$feature->permalink)}}" class="news-cat bg-<?php {echo "$feature->color";} ?>">{{$feature->category}}</a>
                                    <h3 class="heading-sm"><a href="{{url('/article/'.$feature->slug)}}">{{ucwords($feature->title)}}</a></h3>
                                    <span class="news-time"><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($feature->created_at)->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                            @endif
                            @php($count++)
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- third slider -->
            <div class="col-lg-3 col-md-6">
                <div id="slider3" class="carousel carousel-fade slide small-slider" data-ride="carousel" data-interval="10000" data-pause="false">
                    <div class="carousel-inner">
                        @php($count=0)
                        @foreach($features as $feature)
                            @if($count == 2)
                        <div class="carousel-item <?php if($count == 2 ) { echo "active"; } ?>">
                            <img src="{{ asset('') }}uploads/arts/{{$feature->image}}" alt="Los Angeles" class="img-fitted">
                            <!-- news -->
                            <div class="carousel-caption animated fadeIn" style="animation-delay:3s">
                                <div class="caption-news text-left">
                                    <a href="{{url('/'.$feature->permalink)}}" class="news-cat bg-<?php {echo "$feature->color";} ?>">{{$feature->category}}</a>
                                    <h3 class="heading-sm"><a href="{{url('/article/'.$feature->slug)}}">{{ucwords($feature->title)}} </a></h3>
                                    <span class="news-time"><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($feature->created_at)->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                            @endif
                            @php($count++)
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- latest -->
    <section class="pad-top stylish-whole pad-bot">
        <div class="container">
            <h3 class="heading-mid">LATEST</h3>
            <div class="row stylish-news-wrap">
                @php($count=0)
                @foreach($latest as $row)
                <div class="stylish-news col-lg-4 col-md-6">
                    <div class="img-container">
                    <a href="{{asset('')}}uploads/arts/{{$row->image}}" class="image-overlay cboxElement group2" title="Title of the image here..."></a>
                        <img src="{{ asset('') }}uploads/arts/{{$row->image}}" alt="swadesh" class="img-fitted">
                        <div class="stylish-caption">
                            <a href="{{url('/'.$row->permalink)}}" class="news-cat bg-<?php {echo "$row->color";} ?>">{{$row->category}}</a>
                            <h3><a href="{{asset('')}}uploads/arts/{{$row->image}}">{{ucwords($row->title)}}</a></h3>
                            <span class="news-time"><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
                    @php($count++)
                @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- popular -->
    <section class="pad-top pad-bot standard-news-whole">
        <div class="container">
            <h3 class="heading-mid">POPULAR</h3>
            <div class="row standard-news-wrap">
                <!-- small news -->
                <div class="col-lg-3 col-md-3">
                    <!-- news -->
                    @php($count=0)
                    @foreach($popular as $row)
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
                    @foreach($popular as $row)
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
                    @foreach($popular as $row)
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
                @foreach($popular as $row)
                    @if($count>4 and $count<9)
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

   {{--gallery--}}
    <section class="gallery-albums pad-bot inner-page pad-top">
        <div class="container">
            <h3 class="heading-mid text-center">GALLERY</h3>
            <div class="row gallery-home">
                @foreach($galleries as $gallery)
                <div class="col-lg-3 col-md-6 gallery-in album">
                    <div class="img-container">
                        <a href="{{url('/gallery/'.$gallery->slug)}}" class="image-overlay"><i class="far fa-images"></i> <br>{{$gallery->name}}</a>
                        <img src="{{asset('')}}uploads/galleries/{{$gallery->image}}" class="img-fitted" alt="gallery">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection