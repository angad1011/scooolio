<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ucfirst($PageTitle)}}</title>
    <!-- ========== All CSS files linkup ========= -->
    
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/css/fullcalendar.min.css') }}" />
<!--     <link rel="stylesheet" href="{{ asset('dist/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/select2/select2-bootstrap.css') }}" /> -->
   <link rel="stylesheet" href="{{ asset('toastr/build/toastr.min.css') }}">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <style>
       .Absent{
        background: red;
       }

       .Present{
        background: Green;
       }

   </style>
</head>
<body class="main" page-name="dashboard">  
<script src="{{ asset('toastr/build/toastr.min.js') }}"></script>
    <script>
        @if (session('success'))
            toastr.success('{{ session('success') }}');
        @elseif (session('error'))
            toastr.error('{{ session('error') }}');
        @endif

        // Toastr configuration (optional)
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    </script>  
<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu d-md-none" id="mobile-menu">
@include('partials.mobileMenu')   
</div> 
<!-- END: Mobile Menu -->
<div class="d-flex">
<!-- BEGIN: Side Menu -->
<nav class="side-nav" id="side-nav">
 <?php if(Auth::user()->role_id == 1){ ?>   
  @include('partials.sidemenu')   
 <?php }else{?>
    @include('partials.sidemenu_school')
 <?php } ?>   
</nav>
<!-- END: Side Menu -->
<!-- BEGIN: Content -->
<div class="content">
<!-- BEGIN: Top Bar -->
 @include('partials.topBar')   
<!-- END: Top Bar -->
 @yield('content')
</div>

 <!-- END: Content -->
</div>

 <!-- BEGIN: JS Assets-->
<script src="{{ asset('dist/select2/jquery.select2.min.js') }} "></script> 
 <script type="text/javascript">
      @if (session()->has('calendar'))
        var eventData = {!! session('calendar') !!};
     @else
        var eventData = null;
     @endif
     var currentDate = new Date();

     console.log(eventData);

     // $('.fc-daygrid-day')
 </script> 
<script src="{{ asset('dist/js/app.js') }} "></script> 
</body>
</html>    