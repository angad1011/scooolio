@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
Update Medium
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
<a href="{{ route('mediums.index') }}" class="btn btn-primary shadow-md me-2">Medium List</a>
</div>
</div>
 <div class="intro-y box py-10 mt-5">
   <form method="POST" action="{{ route('mediums.update', ['medium' => $medium->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
   <div class="px-5 px-sm-20">
      <div class="grid columns-12 gap-4 gap-y-5">
         <div class="intro-y g-col-12 g-col-sm-6">
             <label for="name" class="form-label">Medium Name</label>
             <input id="name" type="text" name="name" class="form-control" placeholder="Medium Name" value="{{ $medium->name }}" required>
         </div> 
         <div class="intro-y g-col-12 g-col-sm-6">
             <label for="name" class="form-label">Status</label>
             <div class="d-flex justify-content-start align-items-center">
                <div class="mt-2">
                    <div class="form-check form-switch"> 
                        <input id="checkbox-switch-7"class="form-check-input" type="checkbox" name="active" <?php echo ($medium->active == 1) ? 'checked' : ''; ?>> 
                    <label class="form-check-label" for="checkbox-switch-7"></label> </div>
                </div>
            </div>
         </div>   
         <div class="intro-y g-col-12 d-flex align-items-center justify-content-center justify-content-sm-end mt-5">
          <button class="btn btn-primary w-24 ms-2" type="submit" >Submit</button>
      </div>
      </div>
   </div>
   </form>
 </div>

@endsection



