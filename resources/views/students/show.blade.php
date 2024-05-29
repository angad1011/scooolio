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
                <i class="w-4 h-4 me-2" data-feather="lock"></i> Change Password </a>
        </li>
    </ul>   
</div>
 <!-- END: Profile Info -->
<div class="intro-y box tab-content mt-5">
    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
         <div class="p-5">
                 <div class="grid columns-12 gap-x-5 gap-y-0">
                    <div class="g-col-12 g-col-xxl-4">
                        <div>
                            <label for="update-profile-form-1" class="form-label">
                                First Name</label>
                            <input id="update-profile-form-1" readonly type="text" class="form-control"
                                placeholder="" value="{{ $student->first_name }}">
                        </div>
                    </div>
                    <div class="g-col-12 g-col-xxl-4">
                        <div>
                            <label for="update-profile-form-1" class="form-label">
                                Last Name</label>
                            <input id="update-profile-form-1" disabled type="text" class="form-control"
                                placeholder="" value="{{ $student->last_name }}">
                        </div>
                    </div>
                    <div class="g-col-12 g-col-xxl-4">
                        <div>
                            <label for="update-profile-form-1" class="form-label">
                                Email ID</label>
                            <input id="update-profile-form-1" disabled type="email" class="form-control"
                                placeholder="" value="{{ $student->email }}">
                        </div>
                    </div>
                </div>
                <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                <div class="g-col-12 g-col-xxl-4">
                    <div>
                        <label for="update-profile-form-1" class="form-label">
                            Mobile Number</label>
                        <input id="update-profile-form-1" disabled type="tel" class="form-control"
                            placeholder=""  value="{{ $student->contact_no }}">
                    </div>
                </div>
                <div class="g-col-12 g-col-xxl-4">
                    <div>
                        <label for="update-profile-form-1" class="form-label">
                            Alternate Mobile Number</label>
                        <input id="update-profile-form-1" disabled type="tel" class="form-control"
                            placeholder="" value="{{ $student->alternate_no }}">
                    </div>
                </div>
                <div class="g-col-12 g-col-xxl-4">
                    <div>
                        <label for="update-profile-form-1" class="form-label">
                            Whatsapp Number</label>
                        <input id="update-profile-form-1" disabled type="tel" class="form-control"
                            placeholder="" value="{{ $student->whatsapp }}">
                    </div>
                </div>
            </div>
            <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                <div class="g-col-12 g-col-xxl-4">
                    <div>
                       <label>Gender</label>
                                <div class="d-flex flex-coloumn flex-sm-row mt-2">
                                    <div class="form-check me-2"> <input id="radio-switch-4" checked disabled class="form-check-input" type="radio" name="horizontal_radio_button" value="horizontal-radio-chris-evans"> <label class="form-check-label" for="radio-switch-4">{{ $student->gender }}</label> 
                                    </div>
                                </div>
                    </div>
                </div>
                <div class="g-col-12 g-col-xxl-4">
                    <div>
                        <label for="update-profile-form-1" class="form-label">
                            Date of Birth</label>
                        <input id="update-profile-form-1" disabled type="tel" class="form-control"
                            placeholder="" value="{{ $student->date_of_birth }}">
                    </div>
                </div>
                <div class="g-col-12 g-col-xxl-4">
                    <label for="input-wizard-4" class="form-label">Class</label>
                    <div class="input-group w-100 mx-auto">
                        <input type="text" disabled class="form-control" value="{{(!empty($student->learn_spaces->class_name)) ? $student->learn_spaces->class_name : ''}}">
                    </div>
                 </div>
                 <div class="g-col-12 g-col-xxl-4">
                    <div>
                        <label for="update-profile-form-1" class="form-label">
                           Year</label>
                        <input id="update-profile-form-1" readonly type="text" class="form-control"
                            placeholder="" value="{{ $student->year }}">
                    </div>
                </div>
                 <div class="g-col-12 g-col-xxl-4">
                    <div>
                        <label for="update-profile-form-1" class="form-label">
                           Nationality</label>
                        <input id="update-profile-form-1" readonly type="text" class="form-control"
                            placeholder="" value="{{ $student->nationality }}">
                    </div>
                </div>
                <div class="g-col-12 g-col-xxl-4">
                    <div>
                        <label for="update-profile-form-1" class="form-label">
                           Religion</label>
                        <input id="update-profile-form-1" readonly type="text" class="form-control"
                            placeholder="" value="{{ $student->religion }}">
                    </div>
                </div>
                <div class="g-col-12 g-col-xxl-4">
                    <div>
                        <label for="update-profile-form-1" class="form-label">
                           Category</label>
                        <input id="update-profile-form-1" readonly type="text" class="form-control"
                            placeholder="" value="{{ $student->cast_catogory }}">
                    </div>
                </div>
                <div class="g-col-12 g-col-xxl-4">
                    <div>
                        <label for="update-profile-form-1" class="form-label">
                           Blood Group</label>
                        <input id="update-profile-form-1" readonly type="text" class="form-control"
                            placeholder="" value="{{ $student->blood_group }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Parents Details -->
     <div class="tab-pane fade show" id="account" role="tabpanel" aria-labelledby="account-tab">
         <div class="p-5">
             <div class="grid columns-12 gap-x-5 gap-y-0">
                  <div class="g-col-12 g-col-xxl-4">
                        <div>
                            <label for="update-profile-form-1" class="form-label">
                                Father Name</label>
                            <input id="update-profile-form-1" disabled type="text" class="form-control"
                                placeholder="" value="{{ $student->father_name }}">
                        </div>
                    </div>
                     <div class="g-col-12 g-col-xxl-4">
                        <div>
                            <label for="update-profile-form-1" class="form-label">
                                Mother Name</label>
                            <input id="update-profile-form-1" disabled type="text" class="form-control"
                                placeholder="" value="{{ $student->mother_name }}">
                        </div>
                    </div>
                      <div class="g-col-12 g-col-xxl-4">
                        <div>
                            <label for="update-profile-form-1" class="form-label">
                                Email ID</label>
                            <input id="update-profile-form-1" disabled type="text" class="form-control"
                                placeholder="" value="{{ $student->parent_email }}">
                        </div>
                    </div>
                    <div class="g-col-12 g-col-xxl-4">
                        <div>
                            <label for="update-profile-form-1" class="form-label">Mobile Number</label>
                            <input id="update-profile-form-1" disabled type="text" class="form-control"
                                placeholder="" value="{{ $student->parent_contact_no }}">
                        </div>
                    </div>
                    <div class="g-col-12 g-col-xxl-4">
                        <div>
                            <label for="update-profile-form-1" class="form-label">Alternate Mobile Number</label>
                            <input id="update-profile-form-1" disabled type="text" class="form-control"
                                placeholder="" value="{{ $student->parent_alternat_no }}">
                        </div>
                    </div>
                    <div class="g-col-12 g-col-xxl-4">
                        <div>
                            <label for="update-profile-form-1" class="form-label">Whatsapp Number</label>
                            <input id="update-profile-form-1" disabled type="text" class="form-control"
                                placeholder="" value="{{ $student->parent_whatsapp }}">
                        </div>
                    </div>
             </div>
             <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                <div class="g-col-12 g-col-xxl-4">
                    <div>
                        <label for="update-profile-form-1" class="form-label">
                            Qualification</label>
                        <input id="update-profile-form-1" disabled type="tel" class="form-control"
                            placeholder=""  value="{{ $student->qualification }}">
                    </div>
                </div>
                <div class="g-col-12 g-col-xxl-4">
                    <div>
                        <label for="update-profile-form-1" class="form-label">
                            Father Occupation</label>
                        <input id="update-profile-form-1" disabled type="tel" class="form-control"
                            placeholder="" value="{{ $student->father_occupation }}">
                    </div>
                </div>
                <div class="g-col-12 g-col-xxl-4">
                    <div>
                        <label for="update-profile-form-1" class="form-label">
                            Mother Occupation</label>
                        <input id="update-profile-form-1" disabled type="tel" class="form-control"
                            placeholder="" value="{{ $student->mother_occupation }}">
                    </div>
                </div>
            </div>
            <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                <div class="g-col-12 g-col-xxl-4">
                    <div>
                        <label for="update-profile-form-1" class="form-label">
                            Parents Yearly Income</label>
                        <input id="update-profile-form-1" disabled type="tel" class="form-control"
                            placeholder=""  value="{{ $student->parent_income }}">
                    </div>
                </div>
                <div class="g-col-12 g-col-xxl-4">
                    <div>
                        <label for="update-profile-form-1" class="form-label">
                           Pincode</label>
                        <input id="update-profile-form-1" disabled type="tel" class="form-control"
                            placeholder="" value="{{ $student->pincode }}">
                    </div>
                </div>
                <div class="g-col-12 g-col-xxl-4">
                    <div>
                        <label for="update-profile-form-1" class="form-label">
                            City</label>
                        <input id="update-profile-form-1" disabled type="tel" class="form-control"
                            placeholder="" value="{{ $student->city }}">
                    </div>
                </div>
                <div class="g-col-12 g-col-xxl-4">
                    <div>
                        <label for="update-profile-form-1" class="form-label">
                            State</label>
                        <input id="update-profile-form-1" disabled type="tel" class="form-control"
                            placeholder="" value="{{ $student->state }}">
                    </div>
                </div>
                <div class="g-col-12 g-col-xxl-4">
                    <div>
                        <label for="update-profile-form-1" class="form-label">
                            Address</label>
                        <input id="update-profile-form-1" disabled type="tel" class="form-control"
                            placeholder="" value="{{ $student->address }}">
                    </div>
                </div>
            </div>
         </div>
     </div>
</div>
@endsection