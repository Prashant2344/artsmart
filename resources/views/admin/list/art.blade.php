@section('title')

    Arts

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
                        <a href="{{url('/admin')}}" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">
                        -
                    </li>
                    <li class="m-nav__item">
                        <a href="{{url('/admin/arts')}}" class="m-nav__link">
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

        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Art
                            <small>
                                Total art.
                            </small>
                        </h3>
                    </div>
                </div>


                <div class="m-portlet__head-tools">
                    <a class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" href="{{url('/admin/arts/create')}}">Add</a>
                </div>


            </div>
            <div class="m-portlet__body">
                <!--begin::Section-->
                <div class="m-section">
                    <div class="m-section__content">
                        <div class="table-responsive m_datatable m-datatable m-datatable--default m-datatable--brand m-datatable--loaded">
                            <table class="table m-table m-table--head-bg-success">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; ?>
                                @foreach($arts as $row)
                                    <tr>
                                        <th scope="row"> {{$i}} </th>
                                        <td>{{$row->title}}</td>
                                        <td>
                                            <img src="{{asset('')}}uploads/arts/{{$row->image}}" alt="{{$row->title}}" height="50" width="50">
                                        </td>
                                        <td>{{$row->name}}</td>
                                        <td>
                                            @if($row->status == 1)
                                                <span class="m-badge m-badge--success">
                                                Active
                                            </span>
                                            @else
                                                <span class="m-badge m-badge--danger">
                                                Banned
                                            </span>
                                            @endif
                                        </td>
                                        <td data-field="Actions" class="m-datatable__cell">
                                            <span style="overflow: visible; width: 110px;">
                                                <a href="{{url('admin/arts/edit/'.$row->slug)}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit order">
                                                    <i class="la la-edit"></i>
                                                </a>
                                                <a href="{{url('admin/arts/delete/'.$row->slug)}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit order" onclick="return confirm('Do You Really Wanna Delete?')">
                                                    <i class="la la-trash"></i>
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end::Section-->

            </div>
        </div>
    </div>

@endsection