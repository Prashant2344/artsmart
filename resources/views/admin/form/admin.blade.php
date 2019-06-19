@section('title')

    @if(isset($admin))
        Edit Profile
    @else
        Add Admin
    @endif

@endsection

@extends('admin/layouts/app')

@section('content')

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Admins
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
                        <a href="{{ url('/admin/admins') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                            Admins
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
                                    <?php if (isset($admin)) { echo"Edit Profile"; } else { echo "Add Admin"; } ?>
                                </h3>
                            </div>
                        </div>
                    </div>

                <?php
                if(isset($admin)) {
                    $action = url('/admin/admins/edit/'.$admin->id);
                } else {
                    $action = url('/admin/admins/add');
                } ?>

                <!--begin::Form-->
                    <form class="m-form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="pic">
                                        Profile Picture:
                                    </label>
                                    <div></div>
                                    <div class="custom-file" style="width:40%">
                                        <input type="file" name="image" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label selected" for="customFile">Choose file</label>
                                    </div>

                                    @if (!empty($admin->image))
                                        <hr>
                                        <img src="{{ asset('uploads/'.'admins/'.$admin->image) }}" alt="<?php if(isset($admin->fullname)) { echo $admin->fullname; } ?>" height="100" width="100">
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">
                                        Full Name:
                                    </label>
                                    <input type="text" name="fullname" class="form-control m-input" placeholder="Full Name" value="<?php if(isset($admin->fullname)) { echo $admin->fullname; } else { echo old('fullname'); } ?>">
                                </div>

                                <div class="form-group m-form__group">
                                    <label>
                                        Email:
                                    </label>
                                    <input type="text" name="email" class="form-control m-input" placeholder="Email" value="<?php if(isset($admin->email)) { echo $admin->email; } else { echo old('email'); } ?>">
                                </div>

                                <div class="form-group m-form__group">
                                    <label>
                                        Password:
                                    </label>
                                    <input type="password" name="password" class="form-control m-input" placeholder="Password" value="">
                                </div>

                                <div class="form-group m-form__group">
                                    <label>
                                        Confirm Password:
                                    </label>
                                    <input type="password" name="password_confirmation" class="form-control m-input" placeholder="Password" value="">
                                </div>

                                <div class="m-form__group form-group">
                                    <label for="">Status</label>
                                    <div class="m-radio-inline">
                                        <label class="m-radio">
                                            <input type="radio" name="status" value="0" <?php echo (isset($admin->status)?((isset($admin->status)&&($admin->status == 0))?'checked="checked"':''):'checked="checked"');?>>
                                            Banned
                                            <span></span>
                                        </label>
                                        <label class="m-radio">
                                            <input type="radio" name="status" value="1" <?php echo (isset($admin->status)&&($admin->status == 1))?'checked="checked"':'';?>>
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
                                <a href="{{ url('admin/admins') }}" class="btn btn-secondary">
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