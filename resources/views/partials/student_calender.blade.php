 <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
<div class="box p-5">
    <div class="full-calendar" id="calendar"></div>
</div>
 <!-- BEGIN: JS Assets-->
<script src="{{ asset('dist/select2/jquery.select2.min.js') }} "></script> 
 <script type="text/javascript">
      @if (session()->has('calendar'))
            var eventData = {!! session('calendar') !!};
        @else
            var eventData = null;
        @endif

        console.log(eventData);
        var currentDate = new Date();
 </script> 
<script src="{{ asset('dist/js/app.js') }} "></script> 


