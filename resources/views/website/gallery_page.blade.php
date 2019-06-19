@extends('website.app')

@section('title')
    {{strtoupper($gallery_name->name)}}
@endsection

@section('content')

    <section class="gallery-albums pad-bot inner-page pad-top">
        <div class="container">
            <h3 class="heading-mid text-center">{{strtoupper($gallery_name->name)}}</h3>
            <div class="row gallery-home">
            @foreach($photos as $photo)
                <div class="col-lg-3 col-md-6 gallery-in album">
                    <div class="img-container">
                        <a href="{{asset('')}}uploads/photos/{{$photo->photo}}" class="image-overlay cboxElement group2" title="Title of the image here..."></a>
                        <img src="{{asset('')}}uploads/photos/{{$photo->photo}}" class="img-fitted" alt="gallery">
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>

@endsection