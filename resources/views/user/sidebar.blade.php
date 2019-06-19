<div class="userdash-sidebar col-lg-3 col-md-3">
    <div class="user-title bg-blue">
        <span>Welcome!</span>
        <h3>{{ auth()->guard('web')->user()->fullname }}</h3>
    </div>
    <ul class="user-nav">
        <li class="active"><a href="{{url('profile')}}"><i class="fas fa-user"></i>Home<span class="fas fa-angle-right"></span></a></li>
        <li><a href="{{url('posts')}}"><i class="fas fa-edit"></i>Posts<span class="fas fa-angle-right"></span></a></li>
        <li><a href="{{url('profile/edit')}}"><i class="fas fa-cog"></i>Edit Profile<span class="fas fa-angle-right"></span></a></li>
        <li><a href="{{url('logout')}}"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
    </ul>
</div>