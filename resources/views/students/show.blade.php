@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
    <h2 class="fs-lg fw-medium me-auto"> Student Profile </h2>
    <div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
    <a class="d-flex align-items-center me-3" href="{{ route('students.index') }}"> 
        <button class="btn btn-primary shadow-md me-2"><i data-feather="list"></i> Student List</button>
    </a>
</div>
</div>
<!-- BEGIN: HTML Table Data -->
<!-- BEGIN: Profile Info -->
<div class="intro-y box px-5 pt-5 mt-5">
     <div class="d-flex flex-column flex-lg-row border-bottom border-gray-200 dark-border-dark-5 pb-5 mx-n5">
         <div class="d-flex flex-1 px-5 align-items-center justify-content-center justify-content-lg-start">
            <div class="w-20 h-20 w-sm-24 h-sm-24 flex-none w-lg-32 h-lg-32 image-fit position-relative">
                 @php
                    $firstImage = $student->profile_img;
                    $id = $student->id;
                    $localImage = ($student->gender == 'male') ? asset('dist/images/student_male_icon.png') : asset('dist/images/female_student_icon.png'); 
                    $imagePath = $firstImage ? asset("files/students/profile_img/".$id."/".$firstImage."") : $localImage;

                    @endphp

                    @if(!empty($imagePath))
                     <img alt=" " class="rounded-circle" src="{{ $imagePath }}">
                    @endif

            </div>
             <div class="ms-5">
                  <div class="w-24 w-sm-40 truncate white-space-sm-wrap fw-medium fs-lg">{{ $student->name }}</div>
                  <div class="text-gray-600">GR No. {{ $student->gr_no }}</span></div>
                  <div class="text-gray-600">UDISE : {{ $student->udise_no }}</span></div>
             </div>
         </div>
         <div class="mt-6 mt-lg-0 flex-1 dark-text-gray-300 px-5 border-start border-end border-gray-200 dark-border-dark-5 border-top border-top-lg-0 pt-5 pt-lg-0">
            <div class="fw-medium text-center text-lg-start mt-lg-3">Contact Details</div>
            <div class="d-flex flex-column justify-content-center align-items-center align-items-lg-start mt-4">
                <div class="truncate white-space-sm-normal d-flex align-items-center"> <i data-feather="mail" class="w-4 h-4 me-2"></i> {{ $student->email }} </div>
                <div class="truncate white-space-sm-normal d-flex align-items-center mt-3"> <i  data-feather="phone" class="w-4 h-4 me-2"></i> {{ $student->contact_no }} </div>
            </div>
         </div>
         <div class="mt-6 mt-lg-0 flex-1 dark-text-gray-300 px-5 border-start border-end border-gray-200 dark-border-dark-5 border-top border-top-lg-0 pt-5 pt-lg-0">
              <div class="fw-medium text-center text-lg-start mt-lg-3">Attendance</div>
              <div class="d-flex flex-column justify-content-center align-items-center align-items-lg-start mt-4">
                 <div class="truncate white-space-sm-normal d-flex align-items-center fs-4xl"> {{$precentPercentage.'%'}}</div>
                 <div class="dropdown ms-auto">
                <a class="dropdown-toggle w-5 h-5 d-block" href="javascript:;" aria-expanded="false"
                    data-bs-toggle="dropdown"> <i data-feather="more-horizontal"
                        class="w-5 h-5 text-gray-600 dark-text-gray-300"></i> </a>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="{{ route('students.edit',$student->id) }}" class="dropdown-item d-flex align-items-center">
                                <i data-feather="edit" class="w-4 h-4 me-2"></i> Edit Profile
                            </a>
                        </li>
                    </ul>
                </div>
                </div>
              </div>
         </div>
     </div>
    <ul class="nav nav-link-tabs flex-column flex-sm-row justify-content-center justify-content-lg-start" role="tablist">
        <li id="profile-tab" class="nav-item" role="presentation">
            <a href="javascript:;" class="nav-link px-0 me-sm-8 d-flex align-items-center active"
                data-bs-toggle="pill" data-bs-target="#profile" role="tab" aria-controls="profile-tab"
                aria-selected="true"> <i class="w-4 h-4 me-2" data-feather="user"></i> Student Details
            </a>
        </li>
        <li id="account-tab" class="nav-item" role="presentation">
            <a href="javascript:;" class="nav-link px-0 me-sm-8 d-flex align-items-center"
                data-bs-toggle="pill" data-bs-target="#account" role="tab" aria-controls="account-tab"
                aria-selected="false"> <i class="w-4 h-4 me-2" data-feather="users"></i> Parents Details
            </a>
        </li>
        <li id="change-password-tab" class="nav-item" role="presentation">
            <a href="javascript:;" class="nav-link px-0 me-sm-8 d-flex align-items-center"
                data-bs-toggle="pill" data-bs-target="#change-password" role="tab"
                aria-controls="change-password-tab" aria-selected="false">
                <i class="w-4 h-4 me-2" data-feather="lock"></i> Activation / Change Password </a>
        </li>
    </ul>   
</div>
 <!-- END: Profile Info -->
<div class="intro-y box tab-content mt-5">
    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
         <div class="p-5">
             <h4><strong>Student Details</strong></h4>   
             <br>
             <div class="d-flex flex-column-reverse flex-xl-row flex-column">
                 <table class="table table-bordered table-report mt-n2">
                     <tbody>
                         <tr>
                            <th class="">Name</th>
                            <td>{{ $student->first_name.' '.$student->last_name }}</td>
                            <th class="">Email ID</th>
                            <td>{{ $student->email }}</td>
                             <th class="">Mobile Number</th>
                            <td>{{ $student->contact_no }}</td>
                        </tr>
                        <tr>
                            <th class="">Alternate Mobile Number</th>
                            <td>{{ $student->alternate_no}}</td>
                            <th class=""> Whatsapp Number</th>
                            <td>{{ $student->whatsapp }}</td>
                             <th class="">Date of Birth</th>
                            <td>{{ $student->date_of_birth }}</td>
                        </tr>
                        <tr>
                            <th class="">Gender</th>
                            <td>{{ $student->gender}}</td>
                            <th class=""> Class</th>
                            <td>{{(!empty($student->learn_spaces->class_name)) ? $student->learn_spaces->class_name : ''}}</td>
                             <th class="">Year</th>
                            <td>{{ $student->year }}</td>
                        </tr>
                        <tr>
                            <th class="">Nationality</th>
                            <td>{{ $student->nationality}}</td>
                            <th class=""> Religion</th>
                            <td>{{ $student->religion }}</td>
                             <th class="">Category</th>
                            <td>{{ $student->cast_catogory }}</td>
                        </tr>
                        <tr>
                            <th class="">Blood Group</th>
                            <td>{{ $student->blood_group}}</td>
                            <th class=""> Date of Leaving </th>
                            <td>{{ $student->date_of_leaving }}</td>
                             <th class="">Status</th>
                            <td>{{ ($student->active == 1) ? 'Active' : 'Inactive' }}</td>
                        </tr>
                     </tbody>
                 </table>
             </div>
         </div>
    </div>
    <!-- End of Parents Details -->
     <div class="tab-pane fade show" id="account" role="tabpanel" aria-labelledby="account-tab">
         <div class="p-5">
                <h4><strong>Parent Details</strong></h4>   
                <br>
               <div class="d-flex flex-column-reverse flex-xl-row flex-column">
                   <table class="table table-bordered table-report mt-n2">
                       <tbody>
                           <tr>
                               <th class="">Father Name</th>
                                <td>{{ $student->father_name }}</td>
                                <th class="">Mother Name</th>
                                <td>{{ $student->mother_name }}</td>
                                 <th class="">Email ID</th>
                                <td>{{ $student->parent_email }}</td>
                           </tr>
                           <tr>
                               <th class="">Father Number</th>
                                <td>{{ $student->parent_contact_no }}</td>
                                <th class="">Mother Mobile Number</th>
                                <td>{{ $student->parent_alternat_no }}</td>
                                 <th class="">Whatsapp Number</th>
                                <td>{{ $student->parent_whatsapp }}</td>
                           </tr>
                           <tr>
                               <th class="">Qualification</th>
                                <td>{{ $student->qualification }}</td>
                                <th class="">Father Occupation</th>
                                <td>{{ $student->father_occupation }}</td>
                                 <th class="">Mother Occupation</th>
                                <td>{{ $student->mother_occupation }}</td>
                           </tr>
                           <tr>
                               <th class="">Parents Yearly Income</th>
                                <td>{{ $student->parent_income }}</td>
                           </tr>
                       </tbody>
                   </table>
               </div>
                <br>
                <h4><strong>Residential Address</strong></h4>   
                <br>
                <div class="d-flex flex-column-reverse flex-xl-row flex-column">
                   <table class="table table-bordered table-report mt-n2">
                       <tbody>
                           <tr>
                               <th class="">Pincode</th>
                                <td>{{ $student->pincode }}</td>
                                <th class="">City</th>
                                <td>{{ $student->city }}</td>
                                 <th class="">State</th>
                                <td>{{ $student->state }}</td>
                           </tr>
                           <tr>
                               <th class="">Address</th>
                                <td colspan="5">{{ $student->address }}</td>
                           </tr>
                       </tbody>
                   </table>
               </div>
         </div>
     </div>
     <!-- Activation And Change Password  -->
      <div class="tab-pane fade show" id="change-password" role="tabpanel" aria-labelledby="account-tab">
          <div class="p-5">
              <h2 class="fw-medium fs-base me-auto">
                {{ $student->name }} - Activation
              </h2>
              <hr>
              <br>
              <form method="POST" action="{{ route('student_activation') }}" enctype="multipart/form-data">
               @csrf
                <div class="grid columns-12 gap-4 gap-y-5">
                      <div class="intro-y g-col-12 g-col-sm-4">
                        <input name="id" type="hidden" value="{{$student->id}}"> 
                        <label for="username" class="form-label">Username</label>
                        <input id="username" type="text" name="username" class="form-control" placeholder="Username" value="{{$student->email}}" required>
                    </div>
                    <?php $readonly = ($activationStatus == 2) ? 'readonly' : '';  ?>
                    <div class="intro-y g-col-12 g-col-sm-4">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" {{$readonly}} value="{{$student->password}}"  required>
                    </div>

                    <?php if($activationStatus == 2){ ?>
                        <div class="intro-y g-col-12 g-col-sm-4 d-flex mt-5">
                            <button class="btn btn-primary w-24 ms-2 changePSW" type="button" style="width: 100% !important;">Change Password</button>
                         </div> 
                    <?php } ?>    
                    <div class="intro-y g-col-12 d-flex align-items-center justify-content-center justify-content-sm-end mt-5">
                        <button class="btn btn-primary w-24 ms-2" type="submit">Submit</button>
                    </div>
                </div>

              </form>
          </div>
      </div>
</div>
<script type="text/javascript">
    $('.changePSW').click(function(){
        $('#password').attr('readonly',false);
        $('#password').val('');
    });
</script>
@endsection