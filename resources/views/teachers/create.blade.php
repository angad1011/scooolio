@extends('layouts.app')

@section('content')
 <div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
Add New Teacher
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
<a href="{{ route('teachers.index') }}" class="btn btn-primary shadow-md me-2">Teacher List</a>
</div>
</div>
<form method="POST" action="{{route('teachers.store')}}" enctype="multipart/form-data">
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
                                        <label for="name" class="form-label">Shift Type</label>
                                         <select class="form-select me-sm-2" placeholder="Select Class" name="shift_type_id" required>
                                             <option value="" selected disabled>Select Shift</option>
                                            @foreach ($shiftTypes as $shiftType)
                                            <option value="{{ $shiftType['id'] }}">{{ $shiftType['name'] }}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                    <div class="g-col-4 g-col-xxl-3">
                                        <div>
                                            <label for="update-profile-form-1" class="form-label">Emp ID</label>
                                            <input id="update-profile-form-1" type="text" class="form-control"
                                                name="employee_id" value="{{$emplyeecode}}" required>
                                        </div>
                                    </div>
                                    <div class="g-col-4 g-col-xxl-3">
                                        <label for="input-wizard-4" class="form-label">Joining Date</label>
                                        <div class="input-group w-100 mx-auto">
                                            <div id="input-group-email" class="input-group-text"> <i data-feather="calendar" class="w-4 h-4"></i> </div>
                                            <input type="text" name="joining_date" class="datepicker form-control"
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
                                                <label for="fileInput" class="form-label">Choose Teacher's
                                                    Photo</label>
                                                <input type="file" class="form-control" id="fileInput" name="profile_img">
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
              <!-- Joinnig Detail End Here -->
              <!-- BEGIN: Personal Information -->
              <div class="intro-y box mt-5">
                    <div class="d-flex align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                        <h2 class="fw-medium fs-base me-auto">
                            Personal Information
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
                                    <input id="update-profile-form-1" type="tel" class="form-control" placeholder="Mobile Number" name="contact" required>
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
                                    <input id="update-profile-form-1" type="tel" class="form-control" placeholder="Whatsapp No." name="whatsaap">
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
                                <label for="name" class="form-label">Martial Status</label>
                                <select class="form-select me-sm-2" name="martial_status"  aria-label="Default select example" required>
                                    <option value="" selected disabled>Select Martial Status</option>
                                    <option value="married">Married</option>
                                    <option value="unmarried">Unmarried</option>
                                    <option value="divorced">Divorced</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Nationality</label>
                                <select class="form-select me-sm-2" name="nationality"  aria-label="Default select example" required>
                                    <option value="" selected disabled>Select Nationality</option>
                                    <option value="india">India</option>
                                    <option value="nepal">Nepal</option>
                                    <option value="bangladesh">Bangladesh</option>
                                </select>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Religion</label>
                                <select class="form-select me-sm-2" name="religion" aria-label="Default select example" required>
                                    <option value="" selected disabled>Select Religion</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Muslim">Muslim</option>
                                    <option value="Sikh">Sikh</option>
                                    <option value="Christian">Christian</option>
                                    <option value="Jain">Jain</option>
                                    <option value="Baudh">Baudh</option>
                                </select>
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
                        <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Qualification</label>
                                <select class="form-select me-sm-2" name="qualification" aria-label="Default select example"
                                    id="qualificationSelect" required>
                                    <option value="" selected disabled>Select Qualification</option>
                                    <option value="High School">High School</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="Bachelor's Degree">Bachelor's Degree</option>
                                    <option value="Master's Degree">Master's Degree</option>
                                    <option value="Ph.D.">Ph.D.</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="Specialization" class="form-label">Specialization</label>
                                <select class="form-select me-sm-2" name="specialization" aria-label="Default select example"
                                    id="specializationSelect">
                                    <option value="" selected disabled>Select Specialization</option>
                                    <option value="Computer Science">Computer Science</option>
                                    <option value="Electrical Engineering">Electrical Engineering</option>
                                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                                    <option value="Civil Engineering">Civil Engineering</option>
                                    <option value="Biochemistry">Biochemistry</option>
                                    <option value="Psychology">Psychology</option>
                                    <option value="Economics">Economics</option>
                                    <option value="Business Administration">Business Administration</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="Institute" class="form-label">Institute</label>
                                <input id="Institute" type="text" name="institute" class="form-control" placeholder="Institute" required>
                            </div>
                        </div>
                        <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="name" class="form-label">Teaching Subjects</label>
                                <select data-placeholder="Select Subjects" class="tom-select w-full" multiple>
                                    @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="g-col-4 g-col-xxl-4">
                                <label for="input-wizard-4" class="form-label">Passing Year</label>
                                <div class="input-group w-100 mx-auto">
                                    <div id="input-group-email" class="input-group-text"> <i data-feather="calendar"
                                            class="w-4 h-4"></i> </div>
                                    <input type="text" name="passing_year" class="datepicker form-control" data-single-mode="true" required>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
              <!-- End: Personal Information -->
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
                                            placeholder="Pin Code" name="pincode" required>
                                    </div>
                                </div>

                                <div class="g-col-4 g-col-xxl-4">
                                    <div>
                                        <label for="update-profile-form-1" class="form-label">
                                            City</label>
                                        <input id="update-profile-form-1" type="text" class="form-control"
                                            placeholder="City" name="city" required>
                                    </div>
                                </div>
                                <div class="g-col-4 g-col-xxl-4">
                                    <label for="name" class="form-label">State</label>
                                    <select name="state" class="form-select me-sm-2" aria-label="Default select example" required>
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



