@extends('layouts.app')

@section('content')
 <div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
Add New Student
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
<a href="{{ route('students.index') }}" class="btn btn-primary shadow-md me-2">Student List</a>
</div>
</div>
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<form method="POST" action="{{route('students.store')}}" enctype="multipart/form-data">
@csrf    
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
                                        <input id="institute_id" type="hidden" name="institute_id" class="form-control" value="{{$instituteId}}">
                                          <label for="update-profile-form-1" class="form-label"> UDISE </label>
                                            <input id="update-profile-form-1"  type="text" name="udise_no" class="form-control" placeholder="UDISE" required>
                                    </div>
                                    <div class="g-col-4 g-col-xxl-3">
                                          <label for="update-profile-form-1" class="form-label"> Register Number</label>
                                            <input id="update-profile-form-1"  type="text" name="gr_no" class="form-control" placeholder="Register Number" required>
                                    </div>
                                    <div class="g-col-4 g-col-xxl-3">
                                        <label for="input-wizard-4" class="form-label">Joining Date</label>
                                        <div class="input-group w-100 mx-auto">
                                            <div id="input-group-email" class="input-group-text"> <i data-feather="calendar" class="w-4 h-4"></i> </div>
                                            <input type="text" name="date_of_admission" class="datepicker form-control"
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
                                        placeholder="First Name" name="first_name"  required>
                                </div>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <div>
                                    <label for="update-profile-form-1" class="form-label">
                                        Last Name</label>
                                    <input id="update-profile-form-1" type="text" class="form-control"
                                        placeholder="Last Name" name="last_name" required>
                                </div>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <div>
                                    <label for="update-profile-form-1" class="form-label"> Email ID</label>
                                    <input id="update-profile-form-1" type="email" class="form-control" name="email" placeholder="Email / Username" required>
                                </div>
                            </div>
                        </div>
                        <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                            <div class="g-col-4 g-col-xxl-4">
                                <div>
                                    <label for="update-profile-form-1" class="form-label"> Mobile Number</label>
                                    <input id="update-profile-form-1" type="tel" class="form-control" placeholder="Mobile Number" name="contact_no" required>
                                </div>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <div>
                                    <label for="update-profile-form-1" class="form-label">
                                        Alternate Mobile Number</label>
                                    <input id="update-profile-form-1" type="tel" class="form-control" placeholder="Alternate Number" name="alternate_no">
                                </div>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <div>
                                    <label for="update-profile-form-1" class="form-label">
                                        Whatsapp Number</label>
                                    <input id="update-profile-form-1" type="tel" class="form-control" placeholder="Whatsapp No." name="whatsapp">
                                </div>
                            </div>
                        </div>
                        <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                            <div class="g-col-4 g-col-xxl-4">
                                <label>Gender</label>
                                <div class="d-flex flex-coloumn flex-sm-row mt-2">
                                    <div class="form-check me-2"> <input id="radio-switch-4"
                                            class="form-check-input" type="radio" name="gender"
                                            value="male" checked> <label class="form-check-label"
                                            for="radio-switch-4">Male</label> </div>
                                    <div class="form-check me-2 mt-2 mt-sm-0"> <input id="radio-switch-5"
                                            class="form-check-input" type="radio" name="gender"
                                            value="female"> <label class="form-check-label"
                                            for="radio-switch-5">Female</label> </div>
                                    <div class="form-check me-2 mt-2 mt-sm-0"> <input id="radio-switch-6"
                                            class="form-check-input" type="radio" name="gender"
                                            value="other"> <label class="form-check-label"
                                            for="radio-switch-6">Other</label> </div>
                                </div>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="input-wizard-4" class="form-label">Date of Birth</label>
                                <div class="input-group w-100 mx-auto">
                                    <div id="input-group-email" class="input-group-text"> <i data-feather="calendar"
                                            class="w-4 h-4"></i> </div>
                                    <input type="text" name="date_of_birth" class="datepicker form-control" data-single-mode="true" required>
                                </div>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Blood Group</label>
                                    <select class="form-select me-sm-2" name="blood_group" aria-label="Default select example">
                                        <option selected disabled>Select</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                            </div>
                        </div>
                        <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Class</label>
                                <select class="form-select me-sm-2" name="learn_space_id"  aria-label="Default select example">
                                     <option value="" selected disabled>Select Class</option>
                                    @foreach ($classes as $classe)
                                    <option value="{{ $classe['id'] }}">{{ $classe['class_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <div>
                                    <label for="update-profile-form-1" class="form-label">Year</label>
                                    <input id="update-profile-form-1" type="tel" class="form-control" placeholder="Year" name="year">
                                </div>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Nationality</label>
                                <select class="form-select me-sm-2" name="nationality"  aria-label="Default select example">
                                    <option value="" selected disabled>Select Nationality</option>
                                    <option value="india">India</option>
                                    <option value="nepal">Nepal</option>
                                    <option value="bangladesh">Bangladesh</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Religion</label>
                                <!-- <select class="form-select me-sm-2" name="religion" aria-label="Default select example">
                                    <option value="" selected disabled>Select Religion</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Muslim">Muslim</option>
                                    <option value="Sikh">Sikh</option>
                                    <option value="Christian">Christian</option>
                                    <option value="Jain">Jain</option>
                                    <option value="Baudh">Baudh</option>
                                </select> -->
                                <input id="update-profile-form-1" type="text" class="form-control" placeholder="Religion" name="religion" required>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Category</label>
                                <!-- <select class="form-select me-sm-2" name="cast_catogory" aria-label="Default select example">
                                    <option value="" selected disabled>Select Category</option>
                                    <option value="GN">GN</option>
                                    <option value="OBC">OBC</option>
                                    <option value="ST">ST</option>
                                    <option value="NT">NT</option>
                                </select> -->
                                 <input id="update-profile-form-1" type="text" class="form-control" placeholder="Category" name="cast_catogory" required>
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
                                        <input id="update-profile-form-1" type="text" name="father_name" class="form-control" placeholder="Father Name">
                                    </div>
                                </div>

                                <div class="g-col-4 g-col-xxl-4">
                                    <div>
                                        <label for="update-profile-form-1" class="form-label">Mother Name</label>
                                        <input id="update-profile-form-1" type="text" name="mother_name" class="form-control" placeholder="Mother Name">
                                    </div>
                                </div>
                                <div class="g-col-4 g-col-xxl-4">
                                   <label for="update-profile-form-1" class="form-label"> Email ID</label>
                                   <input id="update-profile-form-1" type="email" class="form-control"
                                        placeholder="Email ID" name="parent_email">
                                </div>
                            </div>
                            <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                                <div class="g-col-4 g-col-xxl-4">
                                    <div>
                                        <label for="update-profile-form-1" class="form-label"> Father Mobile Number</label>
                                        <input id="update-profile-form-1" type="tel" class="form-control" placeholder="Father Mobile Number" name="parent_contact_no" required>
                                    </div>
                                </div>
                                <div class="g-col-4 g-col-xxl-4">
                                    <div>
                                        <label for="update-profile-form-1" class="form-label">
                                            Mother Mobile Number</label>
                                        <input id="update-profile-form-1" type="tel" class="form-control" placeholder="Mother Mobile Number" name="parent_alternat_no">
                                    </div>
                                </div>
                                <div class="g-col-4 g-col-xxl-4">
                                    <div>
                                        <label for="update-profile-form-1" class="form-label">
                                            Whatsapp Number</label>
                                        <input id="update-profile-form-1" type="tel" class="form-control" placeholder="Whatsapp No." name="parent_whatsapp">
                                    </div>
                                </div>
                           </div>
                           <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Qualification</label>
                                <select  class="form-select me-sm-2" name="qualification" aria-label="Default select example">
                                    <option selected disabled>Select</option>
                                    <option value="BA">BA</option>
                                    <option value="Bsc">Bsc</option>
                                    <option value="Bcom">Bcom</option>
                                    <option value="B.ed">B.ed</option>
                                    <option value="D.ed">D.ed</option>
                                    <option value="MA">MA</option>
                                    <option value="MSC">MSC</option>
                                    <option value="Mcom">Mcom</option>
                                    <option value="Phd">Phd</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Father Occupation</label>
                                <select class="form-select me-sm-2" name="father_occupation" aria-label="Default select example">
                                    <option selected disabled>Select</option>
                                    <option value="Business">Business</option>
                                    <option value="Goverment Job">Goverment Job</option>
                                    <option value="Private Jobs">Private Jobs</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Scientist">Scientist</option>
                                    <option value="Engineer">Engineer</option>
                                    <option value="Teacher">Teacher</option>
                                    <option value="Farmer">Farmer</option>
                                    <option value="Self Employed">Self Employed</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Mother Occupation</label>
                                <select class="form-select me-sm-2" name="mother_occupation" aria-label="Default select example">
                                    <option selected disabled>Select</option>
                                    <option value="Business">Business</option>
                                    <option value="Goverment Job">Goverment Job</option>
                                    <option value="Private Jobs">Private Job</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Scientist">Scientist</option>
                                    <option value="Engineer">Engineer</option>
                                    <option value="Teacher">Teacher</option>
                                    <option value="House Wife">House Wife</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                         <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Parents Yearly Income</label>
                                <select class="form-select me-sm-2" name="parent_income" aria-label="Default select example">
                                    <option selected>Select</option>
                                    <option value="0-5">0 - 5 lacs</option>
                                    <option value="5-10">5 - 10 lacs</option>
                                    <option value="10-15">10 - 15 lacs</option>
                                    <option value="15-20">15 - 20 lacs</option>
                                    <option value="20+">20 lacs and above</option>
                                </select>
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
                                            placeholder="Pin Code" name="pincode">
                                    </div>
                                </div>

                                <div class="g-col-4 g-col-xxl-4">
                                    <div>
                                        <label for="update-profile-form-1" class="form-label">
                                            City</label>
                                        <input id="update-profile-form-1" type="text" class="form-control"
                                            placeholder="City" name="city">
                                    </div>
                                </div>
                                <div class="g-col-4 g-col-xxl-4">
                                    <label for="name" class="form-label">State</label>
                                    <select name="state" class="form-select me-sm-2" aria-label="Default select example">
                                        <option value="" selected disabled>Select State</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="West Bengal">West Bengal</option>
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
                                        required></textarea>
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



