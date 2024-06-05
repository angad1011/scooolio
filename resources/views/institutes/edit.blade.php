@extends('layouts.app')

@section('content')
 <div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
Update {{$instituteName}}
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
<?php if($school->its_college == 1){ ?>    
    <a href="{{ route('colleges') }}" class="btn btn-primary shadow-md me-2">{{$instituteName}} Detail</a>
<?php }else{ ?>
<a href="{{ route('institutes.show',$school->id) }}" class="btn btn-primary shadow-md me-2">{{$instituteName}} Detail</a>    
<?php } ?>    
</div>
</div>
 <div class="intro-y box py-10 mt-5">
   <form method="POST" action="{{route('institutes.update',['institute' => $school->id])}}" enctype="multipart/form-data">
    @csrf
     @method('PUT')
   <div class="px-5">
     <div class="grid columns-12 gap-4 gap-y-5">
        <div class="intro-y g-col-12 g-col-sm-4">
        <label for="name" class="form-label">{{$instituteName}} Name</label>
        <input id="name" name="name" type="text" class="form-control " placeholder="{{$instituteName}} Name" value="{{$school->name}}" required>
        </div>
        <div class="intro-y g-col-12 g-col-sm-4">
        <label for="email" class="form-label">Email ID</label>
        <input id="email" name="email" type="email" class="form-control" placeholder="example@gmail.com" value="{{$school->email}}" required>
        </div>
        <div class="intro-y g-col-12 g-col-sm-4">
        <label for="phone" class="form-label">Phone Number</label>
        <input id="phone" name="contact_no" type="tel" class="form-control" placeholder="Contact No" value="{{$school->contact_no}}" required>
        </div>
        <div class="intro-y g-col-12 g-col-sm-4">
        <label for="schoolcode" class="form-label">{{$instituteName}} Code</label>
        <input id="schoolcode" name="code" type="text" class="form-control" readonly value="{{$school->code}}">
        </div>
        <div class="intro-y g-col-12 g-col-sm-4">
        <label for="principalname" class="form-label">Principal Name</label>
        <input id="principalname" name="principal_name" type="text" class="form-control" placeholder="Principal Name" value="{{$school->principal_name}}" required>
        </div>
        <div class="intro-y g-col-12 g-col-sm-4">
        <label for="input-wizard-4" class="form-label">Est. Since</label>
        <div class="input-group w-100 mx-auto">
        <div id="input-group-email" class="input-group-text"> <i data-feather="calendar"
        class="w-4 h-4"></i> </div> <input type="text" name="est_since" class="datepicker form-control"
        data-single-mode="true" value="{{$school->est_since}}" required>
        </div>
        </div>
        <div class="intro-y g-col-12 g-col-sm-3">
        <label for="branch" class="form-label">Branch</label>
        <input id="branch" name="branch" type="text" class="form-control" placeholder="Branch" value="{{$school->branch}}" required>
        </div>
        <div class="intro-y g-col-12 g-col-sm-3">
        <label for="state" class="form-label">State</label>
        <input id="state" name="state" type="text" class="form-control" placeholder="State" value="{{$school->state}}" required>
        </div>
        <div class="intro-y g-col-12 g-col-sm-3">
        <label for="city" class="form-label">City</label>
        <input id="city" name="city" type="text" class="form-control" placeholder="City" value="{{$school->city}}" required>
        </div>
        <div class="intro-y g-col-12 g-col-sm-3">
        <label for="pincode" class="form-label">Pincode</label>
        <input id="pincode" name="pin_code" type="text" class="form-control" placeholder="Pincode" value="{{$school->pin_code}}">
        </div>
        <div class="intro-y g-col-12 g-col-sm-12">
        <label for="validation-form-6" class="form-label w-full d-flex flex-column flex-sm-row">
        Address
        </label> <textarea id="validation-form-6" class="form-control" name="address"
        placeholder="Enter Address"  required>{{$school->address}}</textarea>
        </div>

        <div class="intro-y g-col-12 g-col-sm-4">
        <label for="board" class="form-label">{{$instituteName}} Board</label>
        <select class="form-select me-sm-2" aria-label="Default select example" name="board_id">
         
         <option>Select Board</option>
          <?php foreach ($boards as $key => $board) { 
            $selected = ($board->id == $school->board_id) ? 'selected' : '';
          ?>
         <option value="{{ $board->id }}" <?php echo $selected;?>>{{ $board->name }}</option>
         <?php } ?>
        </select>
        </div>
        <div class="intro-y g-col-12 g-col-sm-4">
        <label for="instituteType" class="form-label">{{$instituteName}} Type</label>
        <select class="form-select me-sm-2" aria-label="Default select example" name="institute_type_id">
         <option>Select Type</option>   
          <?php foreach ($instituteTypes as $key => $instituteType) { 
            $selected = ($instituteType->id == $school->institute_type_id) ? 'selected' : '';
          ?>
         <option value="{{ $instituteType->id }}" <?php echo $selected;?>>{{ $instituteType->name }}</option>
         <?php } ?>
        </select>
        </div>
        <div class="intro-y g-col-12 g-col-sm-4">
        <label for="medium" class="form-label">Medium</label>
        <select class="form-select me-sm-2" aria-label="Default select example" name="medium_id">
        <option>Select Medium</option>
         <?php foreach ($mediums as $key => $medium) { 
            $selected = ($medium->id == $school->medium_id) ? 'selected' : '';
          ?>
         <option value="{{ $medium->id }}" <?php echo $selected;?>>{{ $medium->name }}</option>
        <?php } ?>

        </select>
        </div>
            
        <div class="intro-y g-col-12 g-col-sm-3">
        <label for="morning_shift_start" class="form-label">Morning Shift From</label>
        <input id="morning_shift_start" name="morning_shift_start" type="time" class="form-control" value="{{$school->morning_shift_start}}" placeholder="Morning Shift From">
        </div>
        <div class="intro-y g-col-12 g-col-sm-3">
        <label for="morning_shift_end" class="form-label">Morning Shift End</label>
        <input id="morning_shift_end" name="morning_shift_end" type="time" class="form-control" value="{{$school->morning_shift_end}}" placeholder="Morning Shift End">
        </div>    
        <div class="intro-y g-col-12 g-col-sm-3">
        <label for="afternoon_shift_start" class="form-label">Afternoon Shift From</label>
        <input id="afternoon_shift_start" name="afternoon_shift_start" value="{{$school->afternoon_shift_start}}" type="time" class="form-control" placeholder="Afternoon Shift From">
        </div>
        <div class="intro-y g-col-12 g-col-sm-3">
        <label for="afternoon_shift_end" class="form-label">Afternoon Shift End</label>
        <input id="afternoon_shift_end" name="afternoon_shift_end" type="time" value="{{$school->afternoon_shift_end}}" class="form-control" placeholder="Afternoon Shift End">
        </div>

        <div class="intro-y g-col-12 g-col-sm-4">
        <!-- <label for="fileInput" class="form-label">Choose Logo</label>
        <input type="file" class="form-control" id="fileInput" name="image_file"> -->
         @php
            $firstImage = $school->image_file;
            $id = $school->id;
            $imagePath = $firstImage ? asset("files/school/image_file/{$id}/{$firstImage}") : null;
        @endphp
         <div class="border-2 border-dashed shadow-sm border-gray-200 dark-border-dark-5 rounded-2 p-5">
        <div class="h-40 position-relative image-fit cursor-pointer zoom-in mx-auto">
            <img class="rounded-2" alt=" " id="blah" src="{{$imagePath}}">
        </div>
            <div class="mx-auto cursor-pointer position-relative mt-5">
                <button type="button" class="btn btn-primary w-full">Change Photo</button>
                <input type="file" class="w-full h-full top-0 start-0 position-absolute opacity-0" id="imageFile" name="image_file">
            </div>
        </div>
        </div>
         <div class="g-col-4 g-col-xxl-4">
            <label for="name" class="form-label">Status</label>
             <div class="d-flex justify-content-start align-items-center">
                <div class="mt-2">
                    <div class="form-check form-switch"> 
                        <input id="checkbox-switch-7" class="form-check-input" type="checkbox" name="active"  {{$active = ($school->active == 1) ? 'checked' : '';}}> 
                    <label class="form-check-label" for="checkbox-switch-7"></label> </div>
                </div>

            </div>
        </div>
        <div class="intro-y g-col-12 d-flex align-items-center justify-content-center justify-content-sm-end mt-5">
        <button class="btn btn-primary w-24 ms-2" type="submit">submit</button>
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

    $('#name').on('input', function(){ 
        var name = $(this).val();
    // Convert name to uppercase and remove spaces
        var code = name.substring(0, 2).toUpperCase();
        var codeId = "<?php echo $school->id;?>";
        var uniqueCode = code+'<?php echo $charector; ?>'+codeId;
        $('#schoolcode').val(uniqueCode);
    });
 </script>
@endsection



