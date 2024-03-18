@extends('layouts.app')

@section('content')
 <div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
Add New Roles
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
<a href="{{ route('roles.index') }}" class="btn btn-primary shadow-md me-2">Roles List</a>
</div>
</div>
 <div class="intro-y box py-10 mt-5">
   <form method="POST" action="{{route('roles.store')}}" enctype="multipart/form-data">
    @csrf
   <div class="px-5 px-sm-20">
      <div class="grid columns-12 gap-4 gap-y-5">
         <div class="intro-y g-col-12 g-col-sm-6">
             <label for="name" class="form-label">Role Name</label>
             <input id="name" type="text" name="name" class="form-control" placeholder="Role Name" required>
         </div> 
         <div class="intro-y g-col-12 g-col-sm-6">
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



