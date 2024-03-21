<!-- BEGIN: Top Bar -->
<div class="top-bar">
<!-- BEGIN: Breadcrumb -->
<div class="-intro-x breadcrumb me-auto d-none d-sm-flex"> <a href="">Admin</a> <i
data-feather="chevron-right" class="breadcrumb__icon"></i> <a href=""
class="breadcrumb--active">Dashboard</a> </div>
<!-- END: Breadcrumb -->

<!-- BEGIN: Notifications -->
<div class="intro-x dropdown me-auto me-sm-6" id="notification-section">

</div>
<!-- END: Notifications -->
<?php if(Auth::user()->role_id != 1){ ?>   
<div class="text-center" style="margin-right: 10px"><a href="{{ route('institutes.show',Auth::user()->institute_id) }}">{{Auth::user()->institutes->name}}</a></div>
<?php } ?>
<!-- BEGIN: Account Menu -->
<div class="intro-x dropdown w-8 h-8" id="right-profile-section">
@include('partials.profile')	
</div>
<!-- END: Account Menu -->
</div>
<!-- END: Top Bar -->