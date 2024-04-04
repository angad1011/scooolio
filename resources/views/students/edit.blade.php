@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
Update Student
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
<a href="{{ route('students.index') }}" class="btn btn-primary shadow-md me-2">Student List</a>
<a href="{{ route('students.show',$student->id) }}" class="btn btn-primary shadow-md me-2">Student Details</a>
</div>
</div>
 <div class="intro-y box py-10 mt-5">
   <form method="POST" action="{{ route('students.update', ['student' => $student->id]) }}" enctype="multipart/form-data">
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
             <label for="name" class="form-label">Student Name</label>
             <input id="name" type="text" name="name" class="form-control" value="{{$student->name}}" placeholder="Student Name" required>
         </div> 
         <div class="intro-y g-col-12 g-col-sm-3">
             <label for="name" class="form-label">GR NO.</label>
             <input id="gr_no" type="number" name="gr_no" class="form-control" value="{{$student->gr_no}}" placeholder="GR No." required>
         </div>
         <div class="intro-y g-col-12 g-col-sm-3">
             <label for="name" class="form-label">Email</label>
             <input id="email" type="email" name="email" class="form-control" value="{{$student->email}}" placeholder="Email" required>
         </div> 
         <div class="intro-y g-col-12 g-col-sm-3">
             <label for="contact_no" class="form-label">Contact No.</label>
             <input id="contact_no" type="number" name="contact_no" class="form-control" value="{{$student->contact_no}}" placeholder="Contact No." required>
         </div> 
         <div class="intro-y g-col-12 g-col-sm-3">
             <label for="date_of_birth" class="form-label">Date Of Birth</label>
             <input id="date_of_birth" type="date" name="date_of_birth" class="form-control" value="{{$student->date_of_birth}}" placeholder="Date Of Birth" required>
         </div> 
        
         <div class="intro-y g-col-12 g-col-sm-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select me-sm-2" aria-label="Default select example" name="gender" required>
            <option>Select Gender</option>
                <option value="male" {{($student->gender == 'male') ? 'selected' : ''}}>Male</option>
                <option value="female" {{($student->gender == 'female') ? 'selected' : ''}}>Female</option>
            </select>
        </div> 
        <div class="intro-y g-col-12 g-col-sm-3">
            <label for="blood_group" class="form-label">Blood Group</label>
            <input id="blood_group" type="text" class="form-control" name="blood_group" value="{{$student->blood_group}}" placeholder="Blood Group">
        </div> 
    
        <div class="intro-y g-col-12 g-col-sm-3">
             <label for="name" class="form-label">Status</label>
             <div class="d-flex justify-content-start align-items-center">
                <div class="mt-2">
                    <div class="form-check form-switch"> 
                        <input id="checkbox-switch-7"class="form-check-input" type="checkbox" name="active" {{$active = ($student->active == 1) ? 'checked' : '';}}> 
                    <label class="form-check-label" for="checkbox-switch-7"></label> </div>
                </div>

            </div>
        </div>
        <div class="intro-y g-col-12 g-col-sm-12"><hr></div>

        <div class="intro-y g-col-12 g-col-sm-3">
             <label for="father_name" class="form-label">Father Name</label>
             <input id="father_name" type="text" name="father_name" class="form-control" value="{{$student->father_name}}" placeholder="Father Name" required>
         </div>

         <div class="intro-y g-col-12 g-col-sm-3">
             <label for="father_qualification" class="form-label">Father Qualification</label>
             <input id="father_qualification" type="text" name="father_qualification" class="form-control" value="{{$student->father_qualification}}" placeholder="Father Qualification">
         </div>

         <div class="intro-y g-col-12 g-col-sm-3">
             <label for="mother_name" class="form-label">Mother Name</label>
             <input id="mother_name" type="text" name="mother_name" class="form-control" value="{{$student->mother_name}}" placeholder="Mother Name" required>
         </div>

         <div class="intro-y g-col-12 g-col-sm-3">
             <label for="mother_qualification" class="form-label">Mother Qualification</label>
             <input id="mother_qualification" type="text" name="mother_qualification" class="form-control" value="{{$student->mother_qualification}}" placeholder="Mother Qualification">
         </div>

         <div class="intro-y g-col-12 g-col-sm-3">
             <label for="date_of_admission" class="form-label">Date Of Admission</label>
             <input id="date_of_admission" type="date" name="date_of_admission" class="form-control" value="{{$student->date_of_admission}}" placeholder="Date Of Admission">
         </div>

         <div class="intro-y g-col-12 g-col-sm-3">
             <label for="date_of_admission" class="form-label">Date Of Leaving</label>
             <input id="date_of_leaving" type="date" name="date_of_leaving" class="form-control" value="{{$student->date_of_leaving}}" placeholder="Date Of Admission">
         </div>

        <div class="intro-y g-col-12 g-col-sm-12">
            <label for="name" class="form-label">Address</label>
            <textarea id="address" name="address" class="form-control">{{$student->address}}</textarea>
        </div>
        <?php
            $firstImage = $student->profile_img;
            $id = $student->id;
            $imagePath = $firstImage ? asset("files/students/profile_img/".$id."/".$firstImage."") : asset('dist/images/admin-pic.jpg');
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



