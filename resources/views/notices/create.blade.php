@extends('layouts.app')

@section('content')
 <div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
Add New Notice
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
<a href="{{ route('notices.index') }}" class="btn btn-primary shadow-md me-2">Notice List</a>
</div>
</div>
 <div class="intro-y box py-10 mt-5">
   <form method="POST" action="{{route('notices.store')}}" enctype="multipart/form-data">
    @csrf
   <div class="px-5">
      <div class="grid columns-12 gap-4 gap-y-5">
         <div class="intro-y g-col-12 g-col-sm-12">
             <label for="title" class="form-label">Title</label>
             <input id="title" type="text" name="title" class="form-control" placeholder="Title" required>
         </div> 
         <div class="intro-y g-col-12 g-col-sm-12">
             <label for="title" class="form-label">Message</label>
            <textarea id="message" name="message" class="form-control" required></textarea>
         </div>
     

         <div class="intro-y g-col-12 g-col-sm-4">
              <label for="input-wizard-4" class="form-label">Start Date</label>
              <div class="input-group w-100 mx-auto">
                  <div id="input-group-email" class="input-group-text"> <i data-feather="calendar" class="w-4 h-4"></i> </div> 
                  <input type="text" class="datepicker form-control" data-single-mode="true" name="start_date">
              </div>
          </div>
          <div class="intro-y g-col-12 g-col-sm-4">
              <label for="input-wizard-4" class="form-label">End Date</label>
              <div class="input-group w-100 mx-auto">
                  <div id="input-group-email" class="input-group-text"> <i data-feather="calendar" class="w-4 h-4"></i> </div> 
                  <input type="text" class="datepicker form-control" data-single-mode="true" name="end_date">
              </div>
          </div>
         <div class="intro-y g-col-12 g-col-sm-4">
             <label for="name" class="form-label">Status</label>
             <br>
              <label class="radio-inline">
               <input type="radio" name="active" value="1">Active
             </label>
             <label class="radio-inline">
               <input type="radio" name="active" value="0" checked>In-active
             </label>
         </div>   
         <div class="intro-y g-col-12 d-flex align-items-center justify-content-center justify-content-sm-end mt-5">
          <button class="btn btn-primary w-24 ms-2" type="submit" >Submit</button>
      </div>
      </div>
   </div>
   </form>
 </div>
@endsection



