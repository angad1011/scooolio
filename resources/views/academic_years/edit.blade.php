@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
Update Acadmic Year
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
<a href="{{ route('academic_years.index') }}" class="btn btn-primary shadow-md me-2">Acadmic Year</a>
</div>
</div>
 <div class="intro-y box py-10 mt-5">
   <form method="POST" action="{{ route('academic_years.update', ['academic_year' => $academicYear->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
   <div class="px-5">
      <div class="grid columns-12 gap-4 gap-y-5">
      <div class="intro-y g-col-12 g-col-sm-6">
             <label for="name" class="form-label">Academic Year</label>
             <input id="year" type="text" name="year" class="form-control" placeholder="Academic Year" value="{{$academicYear->year}}"  required>
         </div> 

         <div class="intro-y g-col-12 g-col-sm-3">
             <label for="name" class="form-label">Its Default Year</label>
             <div class="d-flex justify-content-start align-items-center">
                <div class="mt-2">
                    <div class="form-check form-switch"> 
                        <input id="checkbox-switch-7"class="form-check-input" type="checkbox" name="its_current_year" <?php echo ($academicYear->its_current_year == 1) ? 'checked' : ''; ?>> 
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



