@section('title')

    @if(isset($art))
        Edit
    @else
        Add
    @endif Article

@endsection

@extends('admin/layouts/app')

@section('content')

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Arts
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
                        <a href="{{ url('/admin/arts') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                            Arts
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
                                    <?php if (isset($art)) { echo"Edit"; } else { echo "Add"; } ?> Art
                                </h3>
                            </div>
                        </div>
                    </div>

                <?php
                if(isset($art)) {
                    $action = url('/admin/arts/edit/'.$art->id);
                } else {
                    $action = url('/admin/arts/add');
                } ?>

                <!--begin::Form-->
                    <form class="m-form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="pic">
                                        Art Image:
                                    </label>
                                    <div></div>
                                    <div class="custom-file" style="width:40%">
                                        <input type="file" name="image" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label selected" for="customFile">Choose file</label>
                                    </div>

                                    @if (!empty($art->image))
                                        <hr>
                                        <img src="{{ asset('uploads/'.'arts/'.$art->image) }}" alt="<?php if(isset($art)) { echo $art->name; } ?>" height="100" width="100">
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label>
                                        Category:
                                    </label>
                                    <select name="category_id" class="form-control m-input">

                                        @foreach($categories as $row)

                                            <option <?php if(isset($art) && $row->id == $art->id) {
                                                echo "selected";
                                            } ?> value="{{ $row->id }}">{{ ucwords($row->name) }}</option>

                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group m-form__group">
                                    <label>
                                        Artist Name:
                                    </label>
                                    <select name="artist_id" class="form-control m-input">

                                        @foreach($users as $row)

                                            <option <?php if(isset($art) && $row->id == $art->id) {
                                                echo "selected";
                                            } ?> value="{{ $row->id }}">{{ ucwords($row->fullname) }}</option>

                                        @endforeach

                                    </select>
                                </div>


                                <div class="form-group m-form__group">
                                    <label>
                                        Art Title:
                                    </label>
                                    <input type="text" name="title" class="form-control m-input" placeholder="Article Title" value="<?php if(isset($art->title)) { echo $art->title; } else { echo old('title'); } ?>">
                                </div>

                                <div class="form-group m-form__group">
                                    <label>
                                        Date:
                                    </label>
                                    <input type="text" name="date" class="form-control m-input dpc1" placeholder="Date"  value="<?php if(isset($art->date)) { echo $art->date; } else { echo old('date'); } ?>" >
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="description">
                                        SEO Title:
                                    </label>
                                    <textarea class="form-control m-input tinymce" name="seo_title" rows="25" placeholder=""><?php if(isset($art->seo_title)) { echo $art->seo_title; } else { echo old('seo_title'); } ?></textarea>
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="description">
                                        SEO Keyword:
                                    </label>
                                    <textarea class="form-control m-input tinymce" name="seo_keyword" rows="25" placeholder=""><?php if(isset($art->seo_keyword)) { echo $art->seo_keyword; } else { echo old('seo_keyword'); } ?></textarea>
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="description">
                                        SEO Description:
                                    </label>
                                    <textarea class="form-control m-input tinymce" name="seo_description" rows="25" placeholder="Description"><?php if(isset($art->seo_description)) { echo $art->seo_description; } else { echo old('seo_description'); } ?></textarea>
                                </div>

                                <div class="m-form__group form-group">
                                    <label for="">Status</label>
                                    <div class="m-radio-inline">
                                        <label class="m-radio">
                                            <input type="radio" name="status" value="0" <?php echo (isset($art->status)?((isset($art->status)&&($art->status == 0))?'checked="checked"':''):'checked="checked"');?>>
                                            Banned
                                            <span></span>
                                        </label>
                                        <label class="m-radio">
                                            <input type="radio" name="status" value="1" <?php echo (isset($art->status)&&($art->status == 1))?'checked="checked"':'';?>>
                                            Active
                                            <span></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="m-form__group form-group">
                                    <label for="">Featured</label>
                                    <div class="m-radio-inline">
                                        <label class="m-radio">
                                            <input type="radio" name="featured" value="0" <?php echo (isset($art->featured)?((isset($art->featured)&&($art->featured == 0))?'checked="checked"':''):'checked="checked"');?>>
                                            Banned
                                            <span></span>
                                        </label>
                                        <label class="m-radio">
                                            <input type="radio" name="featured" value="1" <?php echo (isset($art->featured)&&($art->featured == 1))?'checked="checked"':'';?>>
                                            Active
                                            <span></span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                                <a href="{{ url('admin/arts') }}" class="btn btn-secondary">
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

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBML_Ov79KveE_ZOIL9LfKbf6P3D5Q_NPk&libraries=places&callback=init"></script>

    <!-- date picker -->
    <script src="{{asset('')}}administrator/js/bootstrap-datepicker.js"></script>
    <script>

        $(function(){

            $(document).on("focusin",".dpc1", function () {
                var nowTemp = new Date();
                var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

                var checkin = $('.dpc1').datepicker().on('changeDate', function(ev) {

                    var newDate = new Date(ev.date)
                    checkin.hide();
                }).data('datepicker');
            });

        });
    </script>
@endsection