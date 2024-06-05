@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
Reset Password
</h2>
</div>
 @if($errors->any())
<div class="alert alert-danger alert-dismissible">
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 @foreach ($errors->all() as $error)
 {{ $error }}.
@endforeach 
</div>
@endif
<div class="intro-y box py-10 mt-5">
 <form method="POST" action="{{route('new_password')}}" enctype="multipart/form-data">
   @csrf
   <!-- @method('PUT') -->
   <div class="px-5">
      <div class="grid columns-12 gap-4 gap-y-5">
         <div class="intro-y g-col-12 g-col-sm-4">
            <label for="name" class="form-label">Old Password</label>
            <input id="name" type="password" class="form-control" name="password" placeholder="Old Password" required>
        </div>
        <div class="intro-y g-col-12 g-col-sm-4">
            <label for="name" class="form-label">New Password</label>
            <input id="name" type="password" class="form-control" name="new_password" placeholder="New Password" required>
        </div>
        <div class="intro-y g-col-12 g-col-sm-4">
            <label for="name" class="form-label">Confirm Password</label>
            <input id="name" type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
        </div>
      </div>
      <div class="intro-y g-col-12 d-flex align-items-center justify-content-center justify-content-sm-end mt-5">
          <button class="btn btn-primary w-24 ms-2" type="submit" >Submit</button>
       </div>
   </div>
</form>
</div>  
@endsection


