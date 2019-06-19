@section('title')

Pages | Prashant Silpakar

@endsection

@extends('admin/layouts/app')

@section('content')

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Pages
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
                        <a href="{{ url('/admin/pages') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                            Pages
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
                                    <?php if (isset($page)) { echo"Edit"; } else { echo "Add"; } ?> Page
                                </h3>
                            </div>
                        </div>
                    </div>

                    <?php 
                        if(isset($page)) {
                            $action = url('/admin/pages/'.$page->id.'/edit');
                        } else {
                            $action = url('/admin/pages/add');
                        } ?>

                    <!--begin::Form-->
                    <form class="m-form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">
                                        Name:
                                    </label>
                                        <input type="text" name="name" class="form-control m-input" placeholder="Name" value="<?php if(isset($page->name)) { echo $page->name; } else { echo old('name'); } ?>">
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">
                                        Email:
                                    </label>
                                    <input type="text" name="email" class="form-control m-input" placeholder="Email" value="<?php if(isset($page->email)) { echo $page->email; } else { echo old('email'); } ?>">
                                </div>
                                <div class="form-group m-form__group">
                                    <label>
                                        Page Template:
                                    </label>
                                        <input type="text" name="template" class="form-control m-input" placeholder="Page Template" value="<?php if(isset($page->template)) { echo $page->template; } else { echo old('template'); } ?>">
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="description">
                                    Description
                                    </label>
                                    <textarea class="form-control m-input tinymce" name="description" rows="25" placeholder="Description"><?php if(isset($page->description)) { echo $page->description; } else { echo old('description'); } ?></textarea>
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="pic">
                                        Profile Picture
                                    </label>
                                    <div></div>
                                    <div class="custom-file" style="width:40%">
                                        <input type="file" name="image" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label selected" for="customFile">Choose file</label>
                                    </div>

                                    @if (!empty($page->pic))
                                    <hr>
                                        <img src="{{ asset('uploads/'.'pages/'.$page->pic) }}" alt="<?php if(isset($page)) { echo $page->name; } ?>" height="100" width="100">
                                    @endif

                                </div>
                                <div class="m-form__group form-group">
                                    <label for="">Status</label>
                                    <div class="m-radio-inline">
                                        <label class="m-radio">
                                            <input type="radio" name="status" value="0" <?php echo (isset($page->status)?((isset($page->status)&&($page->status == 'Banned'))?'checked="checked"':''):'checked="checked"');?>>
                                            Banned
                                            <span></span>
                                        </label>
                                        <label class="m-radio">
                                            <input type="radio" name="status" value="1" <?php echo (isset($page->status)&&($page->status == 'Active'))?'checked="checked"':'';?>>
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
                                <a href="{{ url('admin/pages') }}" class="btn btn-secondary">
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