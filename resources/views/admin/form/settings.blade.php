@section('title')

Edit Setting

@endsection

@extends('admin/layouts/app')

@section('content')

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Settings
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
                        <a href="{{ url('/admin/settings') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                            Settings
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
                                    <?php if (isset($setting)) { echo"Edit"; } else { echo "Add"; } ?> Settings
                                </h3>
                            </div>
                        </div>
                    </div>

                    <?php 
                        if(isset($setting)) {
                            $action = url('/admin/settings/edit/'.$setting->id);
                        } else {
                            $action = url('/admin/settings/add');
                        } ?>

                    <!--begin::Form-->
                    <form class="m-form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">

                                <div class="form-group m-form__group">
                                    <label for="pic">
                                        Logo:
                                    </label>
                                    <div></div>
                                    <div class="custom-file" style="width:40%">
                                        <input type="file" name="image" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label selected" for="customFile">Choose file</label>
                                    </div>

                                    @if (!empty($setting->image))
                                        <hr>
                                        <img src="{{ asset('uploads/'.'settings/'.$setting->image) }}" alt="<?php if(isset($setting)) { echo $setting->name; } ?>" height="100" width="100">
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="pic">
                                        Logo 2:
                                    </label>
                                    <div></div>
                                    <div class="custom-file" style="width:40%">
                                        <input type="file" name="image1" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label selected" for="customFile">Choose file</label>
                                    </div>

                                    @if (!empty($setting->image1))
                                        <hr>
                                        <img src="{{ asset('uploads/'.'settings/'.$setting->image1) }}" alt="<?php if(isset($setting)) { echo $setting->name; } ?>" height="100" width="100">
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">
                                        Site Name:
                                    </label>
                                        <input type="text" name="site_name" class="form-control m-input" placeholder="Name" value="<?php if(isset($setting->site_name)) { echo $setting->site_name; } else { echo old('site_name'); } ?>">
                                </div>

                                <div class="form-group m-form__group">
                                    <label>
                                        Email:
                                    </label>
                                        <input type="text" name="email" class="form-control m-input" placeholder="Page Template" value="<?php if(isset($setting->email)) { echo $setting->email; } else { echo old('email'); } ?>">
                                </div>

                                <div class="form-group m-form__group">
                                    <label>
                                        Phone:
                                    </label>
                                    <input type="text" name="phone" class="form-control m-input" placeholder="Page Template" value="<?php if(isset($setting->phone)) { echo $setting->phone; } else { echo old('phone'); } ?>">
                                </div>

                                <div class="form-group m-form__group">
                                    <label>
                                        Mobile:
                                    </label>
                                    <input type="text" name="mobile" class="form-control m-input" placeholder="Page Template" value="<?php if(isset($setting->mobile)) { echo $setting->mobile; } else { echo old('mobile'); } ?>">
                                </div>

                                <div class="form-group m-form__group">
                                    <label>
                                        Address:
                                    </label>
                                    <input type="text" name="address" class="form-control m-input" placeholder="Page Template" value="<?php if(isset($setting->address)) { echo $setting->address; } else { echo old('address'); } ?>">
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">
                                        Seo Title:
                                    </label>
                                        <input type="text" name="seo_title" class="form-control m-input" placeholder="Seo Title" value="<?php if(isset($setting->seo_title)) { echo $setting->seo_title; } else { echo old('seo_title'); } ?>">
                                </div>
                                <div class="form-group m-form__group">
                                    <label>
                                        Seo Keyword:
                                    </label>
                                        <textarea class="form-control m-input tinymce" name="seo_keyword" rows="25" placeholder="Seo Keyword"><?php if(isset($setting->seo_keyword)) { echo $setting->seo_keyword; } else { echo old('seo_keyword'); } ?></textarea>
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="seo_description">
                                        Seo Description
                                    </label>
                                    <textarea class="form-control m-input tinymce" name="seo_description" rows="25" placeholder="Seo Description"><?php if(isset($setting->seo_description)) { echo $setting->seo_description; } else { echo old('seo_description'); } ?></textarea>
                                </div>

                                <div class="form-group m-form__group">
                                    <label>
                                        Facebook Link:
                                    </label>
                                    <input type="text" name="facebook" class="form-control m-input" placeholder="Page Template" value="<?php if(isset($setting->facebook)) { echo $setting->facebook; } else { echo old('facebook'); } ?>">
                                </div>

                                <div class="form-group m-form__group">
                                    <label>
                                        Twitter Link:
                                    </label>
                                    <input type="text" name="twitter" class="form-control m-input" placeholder="Page Template" value="<?php if(isset($setting->twitter)) { echo $setting->twitter; } else { echo old('twitter'); } ?>">
                                </div>

                                <div class="form-group m-form__group">
                                    <label>
                                        Instagram Link:
                                    </label>
                                    <input type="text" name="instagram" class="form-control m-input" placeholder="Page Template" value="<?php if(isset($setting->instagram)) { echo $setting->instagram; } else { echo old('instagram'); } ?>">
                                </div>

                                <div class="form-group m-form__group">
                                    <label>
                                        Youtube Link:
                                    </label>
                                    <input type="text" name="youtube" class="form-control m-input" placeholder="Page Template" value="<?php if(isset($setting->youtube)) { echo $setting->youtube; } else { echo old('youtube'); } ?>">
                                </div>

                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                                <a href="{{ url('/admin') }}" class="btn btn-secondary">
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