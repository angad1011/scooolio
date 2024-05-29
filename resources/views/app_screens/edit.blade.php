@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
Update Screen
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
<a href="{{ route('app_screens.index') }}" class="btn btn-primary shadow-md me-2">Screen List</a>
</div>
</div>
 <div class="intro-y box py-10 mt-5">
   <form method="POST" action="{{ route('app_screens.update', ['app_screen' => $screen->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
   <div class="px-5">
      <div class="grid columns-12 gap-4 gap-y-5">
         <div class="intro-y g-col-12 g-col-sm-4">
             <label for="name" class="form-label">Order</label>
             <input id="name" type="number" name="order" class="form-control" value="{{$screen->order}}" placeholder="Order" required>
         </div>
         <div class="intro-y g-col-12 g-col-sm-4">
             <label for="name" class="form-label">Title</label>
             <input id="name" type="text" name="title" class="form-control"  value="{{$screen->title}}" placeholder="Title" required>
         </div> 
         <div class="intro-y g-col-12 g-col-sm-4">
             <label for="name" class="form-label">Status</label>
             <div class="d-flex justify-content-start align-items-center">
                <div class="mt-2">
                    <div class="form-check form-switch"> 
                        <input id="checkbox-switch-7"class="form-check-input" type="checkbox" name="active"  <?php echo ($screen->active == 1) ? 'checked' : ''; ?>> 
                    <label class="form-check-label" for="checkbox-switch-7"></label> </div>
                </div>

            </div>
         </div>
          <div class="intro-y g-col-12 g-col-sm-12">
             <label for="name" class="form-label">Description</label>
             <!-- <input id="name" type="text" name="description" class="form-control" placeholder="Stream Name" required> -->
             <textarea name="description" class="form-control">{{$screen->description}}</textarea>
         </div>
         <div class="g-col-6 g-col-xxl-3" style="margin-top: 15px;">
            <div class="border-2 border-dashed shadow-sm border-gray-200 dark-border-dark-5 rounded-2 p-5">
                <label for="fileInput" class="form-label">Upload Screen Image</label>
                <input type="file" class="form-control" id="fileInput" name="image_file">
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



