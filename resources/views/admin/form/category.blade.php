@section('title')

    @if(isset($category))
        Edit
    @else
        Add
    @endif Category

@endsection

@extends('admin/layouts/app')

@section('content')

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Categories
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
                        <a href="{{ url('/admin/categories') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                            Categories
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
                                    <?php if (isset($category)) { echo"Edit"; } else { echo "Add"; } ?> Category
                                </h3>
                            </div>
                        </div>
                    </div>

                <?php
                if(isset($category)) {
                    $action = url('/admin/categories/edit/'.$category->id);
                } else {
                    $action = url('/admin/categories/add');
                } ?>

                <!--begin::Form-->
                    <form class="m-form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="pic">
                                        Category Image:
                                    </label>
                                    <div></div>
                                    <div class="custom-file" style="width:40%">
                                        <input type="file" name="image" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label selected" for="customFile">Choose file</label>
                                    </div>

                                    @if (!empty($category->image))
                                        <hr>
                                        <img src="{{ asset('uploads/'.'categories/'.$category->image) }}" alt="<?php if(isset($category)) { echo $category->name; } ?>" height="100" width="100">
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">
                                        Category Name:
                                    </label>
                                    <input type="text" name="name" class="form-control m-input" placeholder="Category Name" value="<?php if(isset($category->name)) { echo $category->name; } else { echo old('name'); } ?>">
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">
                                        Category Permalink:
                                    </label>
                                    <input type="text" name="permalink" class="form-control m-input" placeholder="Category Permalink" value="<?php if(isset($category->permalink)) { echo $category->permalink; } else { echo old('permalink'); } ?>">
                                </div>

                                <div class="form-group m-form__group">
                                    <label>
                                        Category Color:
                                    </label>
                                    <input type="text" name="color" class="form-control m-input" placeholder="Category Color" value="<?php if(isset($category->color)) { echo $category->color; } else { echo old('color'); } ?>">
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="description">
                                        Category Description:
                                    </label>
                                    <textarea class="form-control m-input tinymce" name="description" rows="25" placeholder=""><?php if(isset($category->description)) { echo $category->description; } else { echo old('description'); } ?></textarea>
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="description">
                                        SEO Title:
                                    </label>
                                    <textarea class="form-control m-input tinymce" name="seo_title" rows="25" placeholder=""><?php if(isset($category->seo_title)) { echo $category->seo_title; } else { echo old('seo_title'); } ?></textarea>
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="description">
                                        SEO Keyword:
                                    </label>
                                    <textarea class="form-control m-input tinymce" name="seo_keyword" rows="25" placeholder=""><?php if(isset($category->seo_keyword)) { echo $category->seo_keyword; } else { echo old('seo_keyword'); } ?></textarea>
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="description">
                                        SEO Description:
                                    </label>
                                    <textarea class="form-control m-input tinymce" name="seo_description" rows="25" placeholder="Description"><?php if(isset($category->seo_description)) { echo $category->seo_description; } else { echo old('seo_description'); } ?></textarea>
                                </div>

                                <div class="form-group m-form__group">
                                    <label>
                                        Order:
                                    </label>
                                    <input type="number" name="order" class="form-control m-input" placeholder="Page Template" value="<?php if(isset($category->order)) { echo $category->order; } else { echo old('order'); } ?>">
                                </div>

                                <div class="m-form__group form-group">
                                    <label for="">Status</label>
                                    <div class="m-radio-inline">
                                        <label class="m-radio">
                                            <input type="radio" name="status" value="0" <?php echo (isset($category->status)?((isset($category->status)&&($category->status == 0))?'checked="checked"':''):'checked="checked"');?>>
                                            Banned
                                            <span></span>
                                        </label>
                                        <label class="m-radio">
                                            <input type="radio" name="status" value="1" <?php echo (isset($category->status)&&($category->status == 1))?'checked="checked"':'';?>>
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
                                <a href="{{ url('admin/categories') }}" class="btn btn-secondary">
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