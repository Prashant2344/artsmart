@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
        <p><strong><i class="fa fa-check-circle" aria-hidden="true"></i> {{ $message }}</strong></p>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
        <p><strong><i class="fa fa-ban" aria-hidden="true"></i> {{ $message }}</strong></p>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>

        @foreach ($errors->all() as $error)
            <p><i class="fa fa-ban" aria-hidden="true"></i>  {{ $error }}</p>
        @endforeach

    </div>
@endif