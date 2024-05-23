<link rel="stylesheet" href="{{ asset('dist/css/fullcalendar.min.css') }}" />
<link rel="stylesheet" href="{{ asset('dist/css/fullcalendar.print.css') }}" />

 <!-- BEGIN: Calendar Content -->
<div class="g-col-12 g-col-xl-12 g-col-xxl-12 mt-5">
    <div class="box p-5">
        <div class="full-calendar" id="calendar"></div>
    </div>
</div>

<script src="{{ asset('dist/js/fullcalendar.min.js') }} "></script> 
<script type="text/javascript">
var date = new Date();
var month = date.getMonth()+1;
var day = date.getDate();
var todayDate = date.getFullYear() + '-' + ((''+month).length<2 ? '0' : '') + month + '-' +((''+day).length<2 ? '0' : '') + day;
var initialLocaleCode = 'en';
    // alert(todayDate);

$('#calendar').fullCalendar({
header: {
    left: 'prev,next',
    right: 'title',
},
defaultDate: todayDate,
locale: initialLocaleCode,
buttonIcons: false,
// navLinks: true,
editable: true,
eventLimit: true,

});
</script>