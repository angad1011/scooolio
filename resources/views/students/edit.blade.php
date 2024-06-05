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
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
 <form method="POST" action="{{ route('students.update', ['student' => $student->id]) }}" enctype="multipart/form-data">
@csrf 
@method('PUT')   
<div class="grid columns-12 gap-6">
       <div class="g-col-12 g-col-lg-12 g-col-xxl-12">
            <!-- BEGIN: Display Information -->
              <div class="intro-y box mt-lg-5">
                   <div class="d-flex align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                        <h2 class="fw-medium fs-base me-auto">
                            Joining Details
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="d-flex flex-column-reverse flex-xl-row flex-column">
                            <div class="flex-1 mt-6 mt-xl-0">
                                <div class="grid columns-12 gap-x-5 gap-y-0">
                                    <div class="g-col-4 g-col-xxl-3">
                                          <label for="update-profile-form-1" class="form-label"> UDISE </label>
                                            <input id="update-profile-form-1"  type="text" name="udise_no" value="{{$student->udise_no}}" class="form-control" placeholder="UDISE" required>
                                    </div>
                                    <div class="g-col-4 g-col-xxl-3">
                                          <label for="update-profile-form-1" class="form-label"> Register Number</label>
                                            <input id="update-profile-form-1"  type="text" name="gr_no" class="form-control"  value="{{$student->gr_no}}"  placeholder="Register Number" required>
                                    </div>
                                    <div class="g-col-4 g-col-xxl-3">
                                        <label for="input-wizard-4" class="form-label">Joining Date</label>
                                        <div class="input-group w-100 mx-auto">
                                            <div id="input-group-email" class="input-group-text"> <i data-feather="calendar" class="w-4 h-4"></i> </div>
                                            <input type="text" name="date_of_admission" value="{{$student->date_of_admission}}" class="datepicker form-control"
                                                data-single-mode="true" required>
                                        </div>
                                    </div>
                                    <div class="g-col-6 g-col-xxl-3" style="margin-top: 15px;">
                                            <div class="border-2 border-dashed shadow-sm border-gray-200 dark-border-dark-5 rounded-2 p-5">
                                                <label for="fileInput" class="form-label">Choose Aadhar Card</label>
                                                <input type="file" class="form-control" id="fileInput"
                                                    name="aadhar_cart">
                                            </div>
                                        </div>
                                        <div class="g-col-6 g-col-xxl-3" style="margin-top: 15px;">
                                            <div class="border-2 border-dashed shadow-sm border-gray-200 dark-border-dark-5 rounded-2 p-5">
                                                <label for="fileInput" class="form-label">Choose Students's Photo</label>
                                                <input type="file" class="form-control" id="fileInput" name="profile_img">
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
              <!-- Joinnig Detail End Here -->
              <!-- BEGIN: Student Details -->
              <div class="intro-y box mt-5">
                    <div class="d-flex align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                        <h2 class="fw-medium fs-base me-auto">
                            Student Details 
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="grid columns-12 gap-x-5 gap-y-0">
                            <div class="g-col-4 g-col-xxl-4">
                                <div>
                                    <label for="update-profile-form-1" class="form-label"> First Name</label>
                                    <input id="update-profile-form-1" type="text" class="form-control"
                                        placeholder="First Name" value="{{$student->first_name}}" name="first_name"  required>
                                </div>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <div>
                                    <label for="update-profile-form-1" class="form-label">
                                        Last Name</label>
                                    <input id="update-profile-form-1" type="text" class="form-control"
                                        placeholder="Last Name" value="{{$student->last_name}}" name="last_name" required>
                                </div>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <div>
                                    <label for="update-profile-form-1" class="form-label"> Email ID</label>
                                    <input id="update-profile-form-1" type="email"  class="form-control" value="{{$student->email}}" name="email" placeholder="Email / Username" required>
                                </div>
                            </div>
                        </div>
                        <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                            <div class="g-col-4 g-col-xxl-4">
                                <div>
                                    <label for="update-profile-form-1" class="form-label"> Mobile Number</label>
                                    <input id="update-profile-form-1" type="tel" class="form-control" placeholder="Mobile Number" value="{{$student->contact_no}}" name="contact_no" required>
                                </div>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <div>
                                    <label for="update-profile-form-1" class="form-label">
                                        Alternate Mobile Number</label>
                                    <input id="update-profile-form-1" type="tel" class="form-control" placeholder="Alternate Number" value="{{$student->alternate_no}}" name="alternate_no">
                                </div>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <div>
                                    <label for="update-profile-form-1" class="form-label">
                                        Whatsapp Number</label>
                                    <input id="update-profile-form-1" type="tel" class="form-control" placeholder="Whatsapp No." value="{{$student->whatsapp}}" name="whatsapp">
                                </div>
                            </div>
                        </div>
                        <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                            <div class="g-col-4 g-col-xxl-4">
                                <label>Gender</label>
                                <div class="d-flex flex-coloumn flex-sm-row mt-2">
                                <div class="form-check me-2"> <input id="radio-switch-4" class="form-check-input" type="radio" name="gender" value="male" {{($student->gender == 'male') ? 'checked' : ''}}> <label class="form-check-label" for="radio-switch-4">Male</label> </div>
                                <div class="form-check me-2 mt-2 mt-sm-0"> <input id="radio-switch-5" class="form-check-input" type="radio" name="gender" value="female" {{($student->gender == 'female') ? 'checked' : ''}}> <label class="form-check-label" for="radio-switch-5">Female</label> </div>
                                <div class="form-check me-2 mt-2 mt-sm-0"> <input id="radio-switch-6" class="form-check-input" type="radio" name="gender" value="other" {{($student->gender == 'other') ? 'checked' : ''}}> <label class="form-check-label" for="radio-switch-6">Other</label> </div>
                            </div>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="input-wizard-4" class="form-label">Date of Birth</label>
                                <div class="input-group w-100 mx-auto">
                                    <div id="input-group-email" class="input-group-text"> <i data-feather="calendar"
                                            class="w-4 h-4"></i> </div>
                                    <input type="text" name="date_of_birth" value="{{$student->date_of_birth}}" class="datepicker form-control" data-single-mode="true" required>
                                </div>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Blood Group</label>
                                    <select class="form-select me-sm-2" name="blood_group" aria-label="Default select example">
                                        <option selected disabled>Select</option>
                                        <option value="A+" {{($student->blood_group == 'A+') ? 'selected' : ''}}>A+</option>
                                        <option value="A-" {{($student->blood_group == 'A-') ? 'selected' : ''}}>A-</option>
                                        <option value="B+" {{($student->blood_group == 'B+') ? 'selected' : ''}}>B+</option>
                                        <option value="B-" {{($student->blood_group == 'B-') ? 'selected' : ''}}>B-</option>
                                        <option value="AB+" {{($student->blood_group == 'AB+') ? 'selected' : ''}}>AB+</option>
                                        <option value="AB-" {{($student->blood_group == 'AB-') ? 'selected' : ''}}>AB-</option>
                                        <option value="O+" {{($student->blood_group == 'O+') ? 'selected' : ''}}>O+</option>
                                        <option value="O-" {{($student->blood_group == 'O-') ? 'selected' : ''}}>O-</option>
                                    </select>
                            </div>
                        </div>
                        <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Class</label>
                                <select class="form-select me-sm-2" name="learn_space_id"  aria-label="Default select example">
                                     <option value="" selected disabled>Select Class</option>
                                    @foreach ($classes as $classe)
                                    <option value="{{ $classe['id'] }}" {{($student->learn_space_id == $classe['id']) ? 'selected' : ''}}>{{ $classe['class_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <div>
                                    <label for="update-profile-form-1" class="form-label">Year</label>
                                    <input id="update-profile-form-1" type="tel" class="form-control" placeholder="Year" name="year" value="{{$student->year}}">
                                </div>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Nationality</label>
                                <select class="form-select me-sm-2" name="nationality"  aria-label="Default select example">
                                    <option value="" selected disabled>Select Nationality</option>
                                    <option value="india" {{($student->nationality == 'india') ? 'selected' : ''}}>India</option>
                                    <option value="nepal" {{($student->nationality == 'nepal') ? 'selected' : ''}}>Nepal</option>
                                    <option value="bangladesh" {{($student->nationality == 'bangladesh') ? 'selected' : ''}}>Bangladesh</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Religion</label>
                                <input id="update-profile-form-1" type="text" class="form-control" placeholder="Religion" value="{{$student->religion}}" name="religion" required>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Category</label>
                                <input id="update-profile-form-1" type="text" class="form-control" placeholder="Category" value="{{$student->cast_catogory}}" name="cast_catogory" required>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="input-wizard-4" class="form-label">Date of Leaving</label>
                                <div class="input-group w-100 mx-auto">
                                    <div id="input-group-email" class="input-group-text"> <i data-feather="calendar"
                                            class="w-4 h-4"></i> </div>
                                    <input type="text" name="date_of_leaving" value="{{$student->date_of_leaving}}" id="date_of_leaving" class="datepicker form-control" data-single-mode="true" required>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
              <!-- End: Student Details -->
              <!-- BEGIN: Parents Details -->
              <div class="intro-y box mt-lg-5">
                     <div class="d-flex align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                        <h2 class="fw-medium fs-base me-auto">
                            Parents Information 
                        </h2>
                    </div>
                    <div class="p-5">
                    <div class="d-flex flex-column-reverse flex-xl-row flex-column">
                        <div class="flex-1 mt-6 mt-xl-0">
                            <div class="grid columns-12 gap-x-5 gap-y-0">
                                <div class="g-col-4 g-col-xxl-4">
                                    <div>
                                        <label for="update-profile-form-1" class="form-label">Father Name</label>
                                        <input id="update-profile-form-1" type="text" value="{{$student->father_name}}" name="father_name" class="form-control" placeholder="Father Name">
                                    </div>
                                </div>

                                <div class="g-col-4 g-col-xxl-4">
                                    <div>
                                        <label for="update-profile-form-1" class="form-label">Mother Name</label>
                                        <input id="update-profile-form-1" type="text"  value="{{$student->mother_name}}" name="mother_name" class="form-control" placeholder="Mother Name">
                                    </div>
                                </div>
                                <div class="g-col-4 g-col-xxl-4">
                                   <label for="update-profile-form-1" class="form-label"> Email ID</label>
                                   <input id="update-profile-form-1" type="email" class="form-control"
                                        placeholder="Email ID" value="{{$student->parent_email}}" name="parent_email">
                                </div>
                            </div>
                            <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                                <div class="g-col-4 g-col-xxl-4">
                                    <div>
                                        <label for="update-profile-form-1" class="form-label">Father Mobile Number</label>
                                        <input id="update-profile-form-1" type="tel" class="form-control" placeholder="Father Mobile Number" value="{{$student->parent_contact_no}}" name="parent_contact_no" required>
                                    </div>
                                </div>
                                <div class="g-col-4 g-col-xxl-4">
                                    <div>
                                        <label for="update-profile-form-1" class="form-label">
                                            Mother Mobile Number</label>
                                        <input id="update-profile-form-1" type="tel" class="form-control" placeholder="Mother Mobile Number" value="{{$student->parent_alternat_no}}" name="parent_alternat_no">
                                    </div>
                                </div>
                                <div class="g-col-4 g-col-xxl-4">
                                    <div>
                                        <label for="update-profile-form-1" class="form-label">
                                            Whatsapp Number</label>
                                        <input id="update-profile-form-1" type="tel" class="form-control" placeholder="Whatsapp No." value="{{$student->parent_whatsapp}}" name="parent_whatsapp">
                                    </div>
                                </div>
                           </div>
                           <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Qualification</label>
                                <select  class="form-select me-sm-2"  name="qualification" aria-label="Default select example">
                                    <option selected disabled>Select</option>
                                    <option value="BA" {{($student->qualification == 'BA') ? 'selected' : ''}}>BA</option>
                                    <option value="Bsc" {{($student->qualification == 'Bsc') ? 'selected' : ''}}>Bsc</option>
                                    <option value="Bcom" {{($student->qualification == 'Bcom') ? 'selected' : ''}}>Bcom</option>
                                    <option value="B.ed" {{($student->qualification == 'B.ed') ? 'selected' : ''}}>B.ed</option>
                                    <option value="D.ed" {{($student->qualification == 'D.ed') ? 'selected' : ''}}>D.ed</option>
                                    <option value="MA" {{($student->qualification == 'MA') ? 'selected' : ''}}>MA</option>
                                    <option value="MSC" {{($student->qualification == 'MSC') ? 'selected' : ''}}>MSC</option>
                                    <option value="Mcom" {{($student->qualification == 'Mcom') ? 'selected' : ''}}>Mcom</option>
                                    <option value="Phd" {{($student->qualification == 'Phd') ? 'selected' : ''}}>Phd</option>
                                    <option value="Other" {{($student->qualification == 'Other') ? 'selected' : ''}}>Other</option>
                                </select>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Father Occupation</label>
                                <select class="form-select me-sm-2" name="father_occupation" aria-label="Default select example">
                                   <option selected disabled>Select</option>
                                    <option value="Business" {{($student->father_occupation == 'Business') ? 'selected' : ''}}>Business</option>
                                    <option value="Goverment Job" {{($student->father_occupation == 'Goverment Job') ? 'selected' : ''}}>Goverment Job</option>
                                    <option value="Private Jobs" {{($student->father_occupation == 'Private Jobs') ? 'selected' : ''}}>Private Jobs</option>
                                    <option value="Doctor" {{($student->father_occupation == 'Doctor') ? 'selected' : ''}}>Doctor</option>
                                    <option value="Scientist" {{($student->father_occupation == 'Scientist') ? 'selected' : ''}}>Scientist</option>
                                    <option value="Engineer" {{($student->father_occupation == 'Engineer') ? 'selected' : ''}}>Engineer</option>
                                    <option value="Teacher" {{($student->father_occupation == 'Teacher') ? 'selected' : ''}}>Teacher</option>
                                    <option value="Farmer" {{($student->father_occupation == 'Farmer') ? 'selected' : ''}}>Farmer</option>
                                    <option value="Self Employed" {{($student->father_occupation == 'Self Employed') ? 'selected' : ''}}>Self Employed</option>
                                    <option value="Other" {{($student->father_occupation == 'Other') ? 'selected' : ''}}>Other</option>
                                </select>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Mother Occupation</label>
                                <select class="form-select me-sm-2" name="mother_occupation" aria-label="Default select example">
                                    <option selected>Select</option>
                                    <option value="Business" {{($student->mother_occupation == 'Business') ? 'selected' : ''}}>Business</option>
                                    <option value="Goverment Job" {{($student->mother_occupation == 'Goverment Job') ? 'selected' : ''}}>Goverment Job</option>
                                    <option value="Private Job" {{($student->mother_occupation == 'Private Job') ? 'selected' : ''}}>Private Job</option>
                                    <option value="Doctor" {{($student->mother_occupation == 'Doctor') ? 'selected' : ''}}>Doctor</option>
                                    <option value="Scientist" {{($student->mother_occupation == 'Scientist') ? 'selected' : ''}}>Scientist</option>
                                    <option value="Engineer" {{($student->mother_occupation == 'Engineer') ? 'selected' : ''}} >Engineer</option>
                                    <option value="Teacher" {{($student->mother_occupation == 'Teacher') ? 'selected' : ''}}>Teacher</option>
                                    <option value="House Wife" {{($student->mother_occupation == 'House Wife') ? 'selected' : ''}}>House Wife</option>
                                    <option value="Other" {{($student->mother_occupation == 'Other') ? 'selected' : ''}}>Other</option>
                                </select>
                            </div>
                        </div>
                         <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Parents Yearly Income</label>
                                <select class="form-select me-sm-2" name="parent_income" aria-label="Default select example">
                                    <option selected>Select</option>
                                    <option value="0-5" {{($student->parent_income == '0-5') ? 'selected' : ''}}>0 - 5 lacs</option>
                                    <option value="5-10" {{($student->parent_income == '5-10') ? 'selected' : ''}}>5 - 10 lacs</option>
                                    <option value="10-15" {{($student->parent_income == '10-15') ? 'selected' : ''}}>10 - 15 lacs</option>
                                    <option value="15-20" {{($student->parent_income == '15-20') ? 'selected' : ''}}>15 - 20 lacs</option>
                                    <option value="20+" {{($student->parent_income == '20+') ? 'selected' : ''}}>20 lacs and above</option>
                                </select>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Status</label>
                                 <div class="d-flex justify-content-start align-items-center">
                                    <div class="mt-2">
                                        <div class="form-check form-switch"> 
                                            <input id="checkbox-switch-7"class="form-check-input" type="checkbox" name="active"  {{$active = ($student->active == 1) ? 'checked' : '';}}> 
                                        <label class="form-check-label" for="checkbox-switch-7"></label> </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
              <!-- End: Personal Details -->
              <!-- Start: Address Details -->
                <div class="intro-y box mt-lg-5">
                     <div class="d-flex align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                        <h2 class="fw-medium fs-base me-auto">
                            Residential Address
                        </h2>
                    </div>
                    <div class="p-5">
                    <div class="d-flex flex-column-reverse flex-xl-row flex-column">
                        <div class="flex-1 mt-6 mt-xl-0">
                            <div class="grid columns-12 gap-x-5 gap-y-0">
                                <div class="g-col-4 g-col-xxl-4">
                                    <div>
                                        <label for="update-profile-form-1" class="form-label">
                                            Pincode</label>
                                        <input id="update-profile-form-1" type="text" class="form-control"
                                            placeholder="Pin Code" name="pincode" value="{{$student->pincode}}">
                                    </div>
                                </div>

                                <div class="g-col-4 g-col-xxl-4">
                                    <div>
                                        <label for="update-profile-form-1" class="form-label">
                                            City</label>
                                        <input id="update-profile-form-1" type="text" class="form-control"
                                            placeholder="City" name="city" value="{{$student->city}}">
                                    </div>
                                </div>
                                <div class="g-col-4 g-col-xxl-4">
                                    <label for="name" class="form-label">State</label>
                                    <select name="state" class="form-select me-sm-2" aria-label="Default select example">
                                        <option value="" selected disabled>Select State</option>
                                        <option value="Andhra Pradesh" {{($student->state == 'Andhra Pradesh') ? 'selected' : ''}}>Andhra Pradesh</option>
                                        <option value="Arunachal Pradesh" {{($student->state == 'Arunachal Pradesh') ? 'selected' : ''}}>Arunachal Pradesh</option>
                                        <option value="Assam" {{($student->state == 'Assam') ? 'selected' : ''}}>Assam</option>
                                        <option value="Bihar" {{($student->state == 'Bihar') ? 'selected' : ''}}>Bihar</option>
                                        <option value="Chhattisgarh" {{($student->state == 'Chhattisgarh') ? 'selected' : ''}}>Chhattisgarh</option>
                                        <option value="Goa" {{($student->state == 'Goa') ? 'selected' : ''}}>Goa</option>
                                        <option value="Gujarat" {{($student->state == 'Gujarat') ? 'selected' : ''}}>Gujarat</option>
                                        <option value="Haryana" {{($student->state == 'Haryana') ? 'selected' : ''}}>Haryana</option>
                                        <option value="Himachal Pradesh" {{($student->state == 'Himachal Pradesh') ? 'selected' : ''}}>Himachal Pradesh</option>
                                        <option value="Jharkhand" {{($student->state == 'Jharkhand') ? 'selected' : ''}}>Jharkhand</option>
                                        <option value="Karnataka" {{($student->state == 'Karnataka') ? 'selected' : ''}}>Karnataka</option>
                                        <option value="Kerala" {{($student->state == 'Kerala') ? 'selected' : ''}}>Kerala</option>
                                        <option value="Madhya Pradesh" {{($student->state == 'Madhya Pradesh') ? 'selected' : ''}}>Madhya Pradesh</option>
                                        <option value="Maharashtra" {{($student->state == 'Maharashtra') ? 'selected' : ''}}>Maharashtra</option>
                                        <option value="Manipur" {{($student->state == 'Manipur') ? 'selected' : ''}}>Manipur</option>
                                        <option value="Meghalaya" {{($student->state == 'Meghalaya') ? 'selected' : ''}}>Meghalaya</option>
                                        <option value="Mizoram" {{($student->state == 'Mizoram') ? 'selected' : ''}}>Mizoram</option>
                                        <option value="Nagaland" {{($student->state == 'Nagaland') ? 'selected' : ''}}>Nagaland</option>
                                        <option value="Odisha" {{($student->state == 'Odisha') ? 'selected' : ''}}>Odisha</option>
                                        <option value="Punjab" {{($student->state == 'Punjab') ? 'selected' : ''}}>Punjab</option>
                                        <option value="Rajasthan" {{($student->state == 'Rajasthan') ? 'selected' : ''}}>Rajasthan</option>
                                        <option value="Sikkim" {{($student->state == 'Sikkim') ? 'selected' : ''}}>Sikkim</option>
                                        <option value="Tamil Nadu" {{($student->state == 'Tamil Nadu') ? 'selected' : ''}}>Tamil Nadu</option>
                                        <option value="Telangana" {{($student->state == 'Telangana') ? 'selected' : ''}}>Telangana</option>
                                        <option value="Tripura" {{($student->state == 'Tripura') ? 'selected' : ''}}>Tripura</option>
                                        <option value="Uttar Pradesh" {{($student->state == 'Uttar Pradesh') ? 'selected' : ''}}>Uttar Pradesh</option>
                                        <option value="Uttarakhand" {{($student->state == 'Uttarakhand') ? 'selected' : ''}}>Uttarakhand</option>
                                        <option value="West Bengal" {{($student->state == 'West Bengal') ? 'selected' : ''}}>West Bengal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                                <div class="intro-y g-col-12 g-col-sm-12">

                                    <label for="validation-form-6"
                                        class="form-label w-full d-flex flex-column flex-sm-row">
                                        Address
                                    </label> <textarea id="validation-form-6" class="form-control"
                                        name="address" placeholder="Enter Address" minlength="10"
                                        required>{{$student->address}}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary w-20 me-auto">Save</button>
                    </div>
                </div>
                </div>
              <!-- End: Address Details -->
       </div>
</div>
   </form>
 
@endsection



