@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
    <h2 class="fs-lg fw-medium me-auto"> {{$instituteName}} Details </h2>
    <div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
        <?php if($school->its_college == 1){ ?>  
         <a href="{{ route('colleges') }}" class="btn btn-primary shadow-md me-2">{{$instituteName}} List</a>   
        <?php }else{ ?>    
        <a href="{{ route('institutes.index') }}" class="btn btn-primary shadow-md me-2">{{$instituteName}} List</a>
        <?php } ?>
        <a href="{{ route('institute_user', $school->id) }}" class="btn btn-primary shadow-md me-2">Add {{$instituteName}} User</a>
    </div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box p-5 mt-5">
  @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif   
<div class="intro-y g-col-12 ooverflow-x-auto overflow-lg-visible mt-5">
    <table class="table table-bordered table-report mt-n2">
         <tbody>
             <tr>
                 <th class="">Medium</th>
                 <td>{{ $school->mediums->name }}</td>
             </tr>
             <tr>
                 <th class="">Board</th>
                 <td>{{ $school->boards->name }}</td>
             </tr>
             <tr>
                 <th class="">Institute Type</th>
                 <td>{{ $school->institute_types->name }}</td>
             </tr>
             <tr>
                 <th class="">{{$instituteName}} Name</th>
                 <td>{{ $school->name }}</td>
             </tr>
             <tr>
                 <th class="">{{$instituteName}} Code</th>
                 <td>{{ $school->code }}</td>
             </tr>
             <tr>
                 <th class="">Principal Name</th>
                 <td>{{ $school->principal_name }}</td>
             </tr>
             <tr>
                 <th class="">Est Since</th>
                 <td>{{ $school->est_since }}</td>
             </tr>
             <tr>
                 <th class="">Email</th>
                 <td>{{ $school->email }}</td>
             </tr>
             <tr>
                 <th class="">Contact No.</th>
                 <td>{{ $school->contact_no }}</td>
             </tr>
             <tr>
                 <th class="">Branch.</th>
                 <td>{{ $school->branch }}</td>
             </tr>
              <tr>
                 <th class="">City.</th>
                 <td>{{ $school->city }}</td>
             </tr>
              <tr>
                 <th class="">State.</th>
                 <td>{{ $school->state }}</td>
             </tr>
              <tr>
                 <th class="">Pin Code.</th>
                 <td>{{ $school->pin_code }}</td>
             </tr>
             <tr>
                 <th class="">Address.</th>
                 <td>{{ $school->address }}</td>
             </tr>
             <tr>
                 <th class="">Morning Shift Start.</th>
                 <td>{{ $school->morning_shift_start }}</td>
             </tr>
             <tr>
                 <th class="">Morning Shift End.</th>
                 <td>{{ $school->morning_shift_end }}</td>
             </tr>
             <tr>
                 <th class="">Afternoon Shift Start.</th>
                 <td>{{ $school->afternoon_shift_start }}</td>
             </tr>
             <tr>
                 <th class="">Afternoon Shift End.</th>
                 <td>{{ $school->afternoon_shift_end }}</td>
             </tr>
             <tr>
                 <th class="col-sm-3">Logo</th>
                 <td> 
                 <p>
                    @php
                        $firstImage = $school->image_file;
                        $id = $school->id;
                        $imagePath = $firstImage ? asset("files/school/image_file/{$id}/{$firstImage}") : null;
                    @endphp

                    @if(!empty($imagePath))
                        <img src="{{ $imagePath }}" height="100px" width="100px">
                    @endif
                             
                 </p>
                </td>
             </tr>
         </tbody>
    </table>
    <?php if(!empty($users)){ ?>
    <hr>
    <br>
    <h2 class="fs-lg fw-medium me-auto"> {{$instituteName}} Users </h2>
    <table class="table table-bordered table-condensed table-report mt-n2">
        <thead>
              <th class="text-nowrap">Name</th>
              <th class="text-nowrap">Email/Usrename</th>
              <th class="text-nowrap">Contact</th>
              <th class="text-nowrap">Active</th>
        </thead>
        <tbody>
                 @foreach ($users as $user)   
                  <tr class="intro-x">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->contact_no }}</td>
                    <td>
                        @php if($user->active == '1'){
                        $class = 'activelabel';
                        $data = 'Active';
                        }
                        else{
                        $class = 'inactivelabel';
                        $data = 'Inactive';
                        } @endphp
                        <div class="{{ $class; }}">{{ $data }}</div>
                    </td>
                  </tr>
                  @endforeach
             </tbody>
    </table>
    <?php } ?> 
</div>
</div>
@endsection

