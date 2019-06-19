@section('title')

    @if(isset($advertisement))
        Edit
    @else
        Add
    @endif Advertisement

@endsection

@extends('admin/layouts/app')

@section('content')

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Advertisements
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
                        <a href="{{ url('/admin/advertisements') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                            Advertisements
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
                                    <?php if (isset($advertisement)) { echo"Edit"; } else { echo "Add"; } ?> Advertisement
                                </h3>
                            </div>
                        </div>
                    </div>

                <?php
                if(isset($advertisement)) {
                    $action = url('/admin/advertisements/edit/'.$advertisement->id);
                } else {
                    $action = url('/admin/advertisements/add');
                } ?>

                <!--begin::Form-->
                    <form class="m-form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="pic">
                                        Advertisement Image:
                                    </label>
                                    <div></div>
                                    <div class="custom-file" style="width:40%">
                                        <input type="file" name="image" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label selected" for="customFile">Choose file</label>
                                    </div>

                                    @if (!empty($advertisement->image))
                                        <hr>
                                        <img src="{{ asset('uploads/'.'advertisements/'.$advertisement->image) }}" alt="<?php if(isset($advertisement->name)) { echo $advertisement->name; } ?>" height="100" width="100">
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">
                                        Advertisement Name:
                                    </label>
                                    <input type="text" name="name" class="form-control m-input" placeholder="Advertisement Name" value="<?php if(isset($advertisement->name)) { echo $advertisement->name; } else { echo old('name'); } ?>">
                                </div>

                                <div class="form-group m-form__group">
                                    <label>
                                        Advertisement Link:
                                    </label>
                                    <input type="text" name="link" class="form-control m-input" placeholder="Advertisement Link" value="<?php if(isset($advertisement->link)) { echo $advertisement->link; } else { echo old('link'); } ?>">
                                </div>

                                <div class="form-group m-form__group">
                                    <label>
                                        Advertisement Order:
                                    </label>
                                    <input type="text" name="order" class="form-control m-input" placeholder="Advertisement Order" value="<?php if(isset($advertisement->order)) { echo $advertisement->order; } else { echo old('order'); } ?>">
                                </div>

                                <div class="m-form__group form-group">
                                    <label for="">Status</label>
                                    <div class="m-radio-inline">
                                        <label class="m-radio">
                                            <input type="radio" name="status" value="0" <?php echo (isset($advertisement->status)?((isset($advertisement->status)&&($advertisement->status == 0))?'checked="checked"':''):'checked="checked"');?>>
                                            Banned
                                            <span></span>
                                        </label>
                                        <label class="m-radio">
                                            <input type="radio" name="status" value="1" <?php echo (isset($advertisement->status)&&($advertisement->status == 1))?'checked="checked"':'';?>>
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
                                <a href="{{ url('admin/advertisements') }}" class="btn btn-secondary">
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

    <script src="{{ asset('administrator/demo/default/custom/components/forms/widgets/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>

    <script>
        $("#m_datetimepicker_2").datetimepicker({todayHighlight:!0,autoclose:!0,pickerPosition:"bottom-left",format:"yyyy-mm-dd hh:ii:00"})
    </script>
@endsection