@section('title')

    @if(isset($gallery))
        Edit
    @else
        Add
    @endif Gallery

@endsection

@extends('admin/layouts/app')

@section('content')

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Galleries
                </h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="{{ url('/admin') }}" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">
                        -
                    </li>
                    <li class="m-nav__item">
                        <a href="{{ url('/admin/galleries') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                            Galleries
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">

        @include('admin/layouts/error')

        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    <?php if (isset($gallery)) { echo"Edit"; } else { echo "Add"; } ?> Gallery
                                </h3>
                            </div>
                        </div>
                    </div>

                <?php
                if(isset($gallery)) {
                    $action = url('/admin/galleries/edit/'.$gallery->id);
                } else {
                    $action = url('/admin/galleries/add');
                } ?>

                <!--begin::Form-->
                    <form class="m-form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="pic">
                                        Gallery Cover:
                                    </label>
                                    <div></div>
                                    <div class="custom-file" style="width:40%">
                                        <input type="file" name="image" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label selected" for="customFile">Choose Photo</label>
                                    </div>

                                    @if (!empty($gallery->image))
                                        <hr>
                                        <img src="{{ asset('uploads/'.'galleries/'.$gallery->image) }}" alt="<?php if(isset($gallery->name)) { echo $gallery->name; } ?>" height="100" width="100">
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">
                                        Gallery Name:
                                    </label>
                                    <input type="text" name="name" class="form-control m-input" placeholder="Gallery Name" value="<?php if(isset($gallery->name)) { echo $gallery->name; } else { echo old('name'); } ?>">
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="pic">
                                        Images:
                                    </label>
                                    <div></div>
                                    <div class="custom-file" style="width:40%">
                                        <input type="file" name="photo[]"  multiple="multiple" class="custom-file-input" id="customFile" >
                                        <label class="custom-file-label selected" for="customFile">Select Photos</label>
                                    </div>


                                    @if (!empty($gallery))
                                        <div class="m-demo">
                                            <div class="m-demo__preview">
                                                <div class="m-list-pics m-list-pics--rounded m--margin-bottom-10">
                                                    @foreach($photos as $photo)
                                                        <img src="{{ asset('uploads/'.'photos/'.$photo->photo) }}" alt="<?php if(isset($photo->id)) { echo $photo->id; } ?>" height="100" width="100" >
                                                        <a href="{{url('/admin/photo/delete/'.$photo->id)}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" onclick="return confirm('Do You Really Wanna Delete?')">
                                                            <i class="la la-trash"></i>
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif


                                </div>

                            </div>
                        </div>

                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                                <a href="{{ url('admin/galleries') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->

            </div>

        </div>

    </div>

@endsection

@section('footer')
    @include('admin/layouts/tinymce')
@endsection