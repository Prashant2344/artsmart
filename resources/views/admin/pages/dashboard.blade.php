@section('title')

Dashboard | Art Smart

@endsection

@extends('admin/layouts/app')

@section('content')

    <!-- BEGIN: Subheader -->
    <div class="m-subheader">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                Dashboard
                </h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="m-content">

        @include('admin/layouts/error')
    </div>

    <!-- Service summmary -->
    <div class="row">
        <div class="col-xl-4">
			<div class="m-portlet m--bg-success m-portlet--bordered-semi m-portlet--full-height ">
				<div class="m-portlet__head">
				
                </div>
				<div class="m-portlet__body">
					<div class="m-widget29">
						<div class="m-widget_content">
							<h3 class="m-widget_content-title">
								Services
							</h3>
							<div class="m-widget_content-items">
								<div class="m-widget_content-item">
									<span>
										Total
									</span>
									<span class="m--font-accent">
										50
									</span>
								</div>
								<div class="m-widget_content-item">
									<span>
										Pending
									</span>
									<span class="m--font-brand">
										20
									</span>
								</div>
								<div class="m-widget_content-item">
									<span>
										Completed
									</span>
									<span>
										30
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
        <!-- Summary Two -->
        <div class="col-xl-4">
			<div class="m-portlet m--bg-warning m-portlet--bordered-semi m-portlet--full-height ">
				<div class="m-portlet__head">
				
                </div>
				<div class="m-portlet__body">
					<div class="m-widget29">
						<div class="m-widget_content">
							<h3 class="m-widget_content-title">
								Pages
							</h3>
							<div class="m-widget_content-items">
								<div class="m-widget_content-item">
									<span>
										Total
									</span>
									<span class="m--font-accent">
										50
									</span>
								</div>
								<div class="m-widget_content-item">
									<span>
										Active
									</span>
									<span class="m--font-brand">
										20
									</span>
								</div>
								<div class="m-widget_content-item">
									<span>
										Deactive
									</span>
									<span>
										30
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

        <!-- Summary three -->
        <div class="col-xl-4">
			<div class="m-portlet m--bg-danger m-portlet--bordered-semi m-portlet--full-height ">
				<div class="m-portlet__head">
				
                </div>
				<div class="m-portlet__body">
					<div class="m-widget29">
						<div class="m-widget_content">
							<h3 class="m-widget_content-title">
								Sliders
							</h3>
							<div class="m-widget_content-items">
								<div class="m-widget_content-item">
									<span>
										Total
									</span>
									<span class="m--font-accent">
										50
									</span>
								</div>
								<div class="m-widget_content-item">
									<span>
										Active
									</span>
									<span class="m--font-brand">
										20
									</span>
								</div>
								<div class="m-widget_content-item">
									<span>
										Deactive
									</span>
									<span>
										30
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div>
        
    </div>

    
   

@endsection


@section('footer')

    <!--begin::Page Snippets -->
    <script src="{{ asset('administrator/app/js/dashboard.js') }}" type="text/javascript"></script>
    <!--end::Page Snippets -->
    
    <script src="{{ asset('administrator/demo/default/custom/components/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('administrator/demo/default/custom/components/forms/widgets/bootstrap-timepicker.js') }}" type="text/javascript"></script>

    
        
@endsection