@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
Update Teacher
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
<a href="{{ route('teachers.index') }}" class="btn btn-primary shadow-md me-2">Teacher List</a>
<a href="{{ route('teachers.show',$teacher->id) }}" class="btn btn-primary shadow-md me-2">Teacher Details</a>
</div>
</div>
 <div class="intro-y box py-10 mt-5">
   <form method="POST" action="{{ route('teachers.update', ['teacher' => $teacher->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="px-5">
   @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
      <div class="grid columns-12 gap-4 gap-y-5">
      <div class="intro-y g-col-12 g-col-sm-3">
             <label for="name" class="form-label">Shift Type</label>
             <select class="form-select me-sm-2" placeholder="Select Class" name="shift_type_id">
                 <option value""">Select Shift</option>
                @foreach ($shiftTypes as $shiftType)
                <option value="{{ $shiftType['id'] }}">{{ $shiftType['name'] }}</option>
                @endforeach
            </select>     
        </div> 
         <div class="intro-y g-col-12 g-col-sm-3">
             <label for="name" class="form-label">Teacher Name</label>
             <input id="name" type="text" name="name" class="form-control" placeholder="Teacher Name" value="{{$teacher->name}}" required>
         </div> 
         <div class="intro-y g-col-12 g-col-sm-3">
             <label for="name" class="form-label">Contact No.</label>
             <input id="contact" type="number" name="contact" class="form-control" placeholder="Contact No." value="{{$teacher->contact}}" required>
         </div> 
         <div class="intro-y g-col-12 g-col-sm-3">
             <label for="name" class="form-label">Qualification</label>
             <input id="qualification" type="text" name="qualification" class="form-control" placeholder="Qualification" value="{{$teacher->qualification}}" required>
         </div> 
         <div class="intro-y g-col-12 g-col-sm-3">
            <label for="name" class="form-label">Gender</label>
            <select class="form-select me-sm-2" aria-label="Default select example" name="gender" required>
                <option>Select Gender</option>
                <option value="male" {{($teacher->gender == 'male') ? 'selected' : ''}}>Male</option>
                <option value="female" {{($teacher->gender == 'female') ? 'selected' : ''}}>Female</option>
            </select>
        </div> 
        <div class="intro-y g-col-12 g-col-sm-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" class="form-control" name="email" placeholder="Email / Username" value="{{$teacher->email}}" required>
        </div> 
        <div class="intro-y g-col-12 g-col-sm-3">
            <label for="name" class="form-label">Subjects</label>
            <select class="jSelectbox form-select me-sm-2" placeholder="Select Subject" name="subjects[]" multiple="true">
                @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}" {{ in_array($subject->id, $selectedSubjectIds->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>
        <!-- <div class="intro-y g-col-12 g-col-sm-3">
            <label for="name" class="form-label">Assign Classes</label>
            <select class="jSelectbox form-select me-sm-2" placeholder="Select Class" name="learn_spaces[]" multiple="true">
                @foreach ($assignClasses as $assignClass)
                <option value="{{ $assignClass['id'] }}" {{ in_array($assignClass['id'], $selectedClassIds->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $assignClass['class_name'] }}</option>
                @endforeach
            </select>
        </div> -->
        <div class="intro-y g-col-12 g-col-sm-3">
             <label for="name" class="form-label">Status</label>
             <div class="d-flex justify-content-start align-items-center">
                <div class="mt-2">
                    <div class="form-check form-switch"> 
                        <input id="checkbox-switch-7"class="form-check-input" type="checkbox" name="active"  {{$active = ($teacher->active == 1) ? 'checked' : '';}}> 
                    <label class="form-check-label" for="checkbox-switch-7"></label> </div>
                </div>

            </div>
         </div>
        <div class="intro-y g-col-12 g-col-sm-12">
            <label for="name" class="form-label">Address</label>
            <textarea id="address" name="address" class="form-control">{{$teacher->address}}</textarea>
        </div>
        <?php
            $firstImage = $teacher->profile_img;
            $id = $teacher->id;
            $imagePath = $firstImage ? asset("files/teachers/profile_img/".$id."/".$firstImage."") : asset('dist/images/admin-pic.jpg');
            // echo $imagePath;
        ?>   
         <div class="intro-y g-col-12 g-col-sm-3">
            <div class="border-2 border-dashed shadow-sm border-gray-200 dark-border-dark-5 rounded-2 p-5">
                <div class="h-40 position-relative image-fit cursor-pointer zoom-in mx-auto">
                    <img class="rounded-2" alt=" " id="blah" src="{{$imagePath}}">
                </div>
                <div class="mx-auto cursor-pointer position-relative mt-5">
                    <button type="button" class="btn btn-primary w-full">Change Photo</button>
                    <input type="file" class="w-full h-full top-0 start-0 position-absolute opacity-0" id="imageFile" name="profile_img">
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
 <script type="text/javascript">
    imageFile.onchange = evt => {
        const [file] = imageFile.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
    
  
</script>
@endsection



