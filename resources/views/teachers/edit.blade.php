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
 <form method="POST" action="{{ route('teachers.update', ['teacher' => $teacher->id]) }}" enctype="multipart/form-data">
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
                                <input id="institute_id" type="hidden" name="institute_id" class="form-control" value="{{$instituteId}}">
                                <label for="name" class="form-label">Shift Type</label>
                                 <select class="form-select me-sm-2" placeholder="Select Class" name="shift_type_id" required>
                                     <option value="" selected disabled>Select Shift</option>
                                    @foreach ($shiftTypes as $shiftType)
                                    <option value="{{ $shiftType['id'] }}" {{($teacher->shift_type_id == $shiftType['id']) ? 'selected' : ''}}>{{ $shiftType['name'] }}</option>
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
                                        data-single-mode="true" value="{{$teacher->joining_date}}" required>
                                </div>
                            </div>
                            <div class="g-col-6 g-col-xxl-3" style="margin-top: 15px;">
                                    <div class="border-2 border-dashed shadow-sm border-gray-200 dark-border-dark-5 rounded-2 p-5">
                                        <label for="fileInput" class="form-label">Choose Aadhar Card</label>
                                        <input type="file" class="form-control" id="fileInput"
                                            name="aadhar_cart" value="{{$teacher->aadhar_cart}}">
                                    </div>
                                </div>
                                <div class="g-col-6 g-col-xxl-3" style="margin-top: 15px;">
                                    <div class="border-2 border-dashed shadow-sm border-gray-200 dark-border-dark-5 rounded-2 p-5">
                                        <label for="fileInput" class="form-label">Choose Teacher's
                                            Photo</label>
                                        <input type="file" class="form-control" id="fileInput" name="profile_img" value="{{$teacher->profile_img}}">
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
                                placeholder="First Name" name="first_name" value="{{$teacher->first_name}}" required>
                        </div>
                    </div>
                    <div class="g-col-4 g-col-xxl-4">
                        <div>
                            <label for="update-profile-form-1" class="form-label">
                                Last Name</label>
                            <input id="update-profile-form-1" type="text" class="form-control"
                                placeholder="Last Name" name="last_name" value="{{$teacher->last_name}}" required>
                        </div>
                    </div>
                    <div class="g-col-4 g-col-xxl-4">
                        <div>
                            <label for="update-profile-form-1" class="form-label"> Email ID</label>
                            <input id="update-profile-form-1" type="email"   class="form-control" name="email" value="{{$teacher->email}}" placeholder="Email / Username" required>
                        </div>
                    </div>
                </div>
                <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                    <div class="g-col-4 g-col-xxl-4">
                        <div>
                            <label for="update-profile-form-1" class="form-label"> Mobile Number</label>
                            <input id="update-profile-form-1" type="tel" class="form-control" placeholder="Mobile Number" name="contact" value="{{$teacher->contact}}" required>
                        </div>
                    </div>
                    <div class="g-col-4 g-col-xxl-4">
                        <div>
                            <label for="update-profile-form-1" class="form-label">
                                Alternate Mobile Number</label>
                            <input id="update-profile-form-1" type="tel" class="form-control" placeholder="Alternate Number" name="alternate_no" value="{{$teacher->alternate_no}}">
                        </div>
                    </div>
                    <div class="g-col-4 g-col-xxl-4">
                        <div>
                            <label for="update-profile-form-1" class="form-label">
                                Whatsapp Number</label>
                            <input id="update-profile-form-1" type="tel" class="form-control" placeholder="Whatsapp No." name="whatsaap" value="{{$teacher->whatsaap}}">
                        </div>
                    </div>
                </div>
                <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                    <div class="g-col-4 g-col-xxl-4">
                        <label>Gender</label>
                        <div class="d-flex flex-coloumn flex-sm-row mt-2">
                            <div class="form-check me-2"> <input id="radio-switch-4"
                                    class="form-check-input" type="radio" name="gender"
                                    value="male" {{($teacher->gender == 'male') ? 'checked' : ''}}> <label class="form-check-label"
                                    for="radio-switch-4">Male</label> </div>
                            <div class="form-check me-2 mt-2 mt-sm-0"> <input id="radio-switch-5"
                                    class="form-check-input" type="radio" name="gender"
                                    value="female" {{($teacher->gender == 'female') ? 'checked' : ''}}> <label class="form-check-label"
                                    for="radio-switch-5">Female</label> </div>
                            <div class="form-check me-2 mt-2 mt-sm-0"> <input id="radio-switch-6"
                                    class="form-check-input" type="radio" name="gender"
                                    value="other" {{($teacher->gender == 'other') ? 'checked' : ''}}> <label class="form-check-label"
                                    for="radio-switch-6">Other</label> </div>
                        </div>
                    </div>
                    <div class="g-col-4 g-col-xxl-4">
                        <label for="input-wizard-4" class="form-label">Date of Birth</label>
                        <div class="input-group w-100 mx-auto">
                            <div id="input-group-email" class="input-group-text"> <i data-feather="calendar"
                                    class="w-4 h-4"></i> </div>
                            <input type="text" name="date_of_birth" value="{{$teacher->date_of_birth}}" class="datepicker form-control" data-single-mode="true" required>
                        </div>
                    </div>
                    <div class="g-col-4 g-col-xxl-4">
                        <label for="name" class="form-label">Martial Status</label>
                        <select class="form-select me-sm-2" name="martial_status"  aria-label="Default select example" required>
                            <option value="" selected disabled>Select Martial Status</option>
                            <option value="married" {{($teacher->martial_status == 'married') ? 'selected' : ''}}>Married</option>
                            <option value="unmarried" {{($teacher->martial_status == 'unmarried') ? 'selected' : ''}}>Unmarried</option>
                            <option value="divorced" {{($teacher->martial_status == 'divorced') ? 'selected' : ''}}>Divorced</option>
                        </select>
                    </div>
                </div>
                <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                    <div class="g-col-4 g-col-xxl-4">
                        <label for="name" class="form-label">Nationality</label>
                        <select class="form-select me-sm-2" name="nationality"  aria-label="Default select example" required>
                            <option value="" selected disabled>Select Nationality</option>
                            <option value="india" {{($teacher->nationality == 'india') ? 'selected' : ''}}>India</option>
                            <option value="nepal" {{($teacher->nationality == 'nepal') ? 'selected' : ''}} >Nepal</option>
                            <option value="bangladesh" {{($teacher->nationality == 'bangladesh') ? 'selected' : ''}}>Bangladesh</option>
                        </select>
                    </div>
                    <div class="g-col-4 g-col-xxl-4">
                        <label for="name" class="form-label">Religion</label>
                        <select class="form-select me-sm-2" name="religion" aria-label="Default select example" required>
                            <option value="" selected disabled>Select Religion</option>
                            <option value="Hindu" {{($teacher->religion == 'Hindu') ? 'selected' : ''}}>Hindu</option>
                            <option value="Muslim" {{($teacher->religion == 'Muslim') ? 'selected' : ''}}>Muslim</option>
                            <option value="Sikh" {{($teacher->religion == 'Sikh') ? 'selected' : ''}}>Sikh</option>
                            <option value="Christian" {{($teacher->religion == 'Christian') ? 'selected' : ''}}>Christian</option>
                            <option value="Jain" {{($teacher->religion == 'Jain') ? 'selected' : ''}}>Jain</option>
                            <option value="Baudh" {{($teacher->religion == 'Baudh') ? 'selected' : ''}}>Baudh</option>
                        </select>
                    </div>
                    <div class="g-col-4 g-col-xxl-4">
                        <label for="name" class="form-label">Category</label>
                        <!-- <select class="form-select me-sm-2" name="cast_catogory" aria-label="Default select example">
                            <option value="" selected disabled>Select Category</option>
                            <option value="GN" {{($teacher->cast_catogory == 'GN') ? 'selected' : ''}}>GN</option>
                            <option value="OBC" {{($teacher->cast_catogory == 'OBC') ? 'selected' : ''}}>OBC</option>
                            <option value="ST" {{($teacher->cast_catogory == 'ST') ? 'selected' : ''}}>ST</option>
                            <option value="NT" {{($teacher->cast_catogory == 'NT') ? 'selected' : ''}}>NT</option>
                        </select> -->
                        <input id="update-profile-form-1" type="text" class="form-control" placeholder="Category" value="{{$teacher->cast_catogory}}" name="cast_catogory" required>
                    </div>
                </div>
                <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                    <div class="g-col-4 g-col-xxl-4">
                        <label for="name" class="form-label">Qualification</label>
                        <select class="form-select me-sm-2" name="qualification" aria-label="Default select example"
                            id="qualificationSelect" required>
                            <option value="" selected disabled>Select Qualification</option>
                            <option value="High School" {{($teacher->qualification == 'High School') ? 'selected' : ''}}>High School</option>
                            <option value="Diploma" {{($teacher->qualification == 'Diploma') ? 'selected' : ''}}>Diploma</option>
                            <option value="Bachelors Degree" {{($teacher->qualification == 'Bachelors Degree') ? 'selected' : ''}}>Bachelors Degree</option>
                            <option value="Masters Degree" {{($teacher->qualification == 'Masters Degree') ? 'selected' : ''}}>Master's Degree</option>
                            <option value="Ph.D." {{($teacher->qualification == 'Ph.D.') ? 'selected' : ''}}>Ph.D.</option>
                            <option value="Other" {{($teacher->qualification == 'Other') ? 'selected' : ''}}>Other</option>
                        </select>
                    </div>
                    <div class="g-col-4 g-col-xxl-4">
                        <label for="Specialization" class="form-label">Specialization</label>
                        <select class="form-select me-sm-2" name="specialization" aria-label="Default select example"
                            id="specializationSelect">
                            <option value="" selected disabled>Select Specialization</option>
                            <option value="Computer Science" {{($teacher->specialization == 'Computer Science') ? 'selected' : ''}}>Computer Science</option>
                            <option value="Electrical Engineering" {{($teacher->specialization == 'Electrical Engineering') ? 'selected' : ''}}>Electrical Engineering</option>
                            <option value="Mechanical Engineering" {{($teacher->specialization == 'Mechanical Engineering') ? 'selected' : ''}}>Mechanical Engineering</option>
                            <option value="Civil Engineering" {{($teacher->specialization == 'Civil Engineering') ? 'selected' : ''}}>Civil Engineering</option>
                            <option value="Biochemistry" {{($teacher->specialization == 'Biochemistry') ? 'selected' : ''}}>Biochemistry</option>
                            <option value="Psychology" {{($teacher->specialization == 'Psychology') ? 'selected' : ''}}>Psychology</option>
                            <option value="Economics" {{($teacher->specialization == 'Economics') ? 'selected' : ''}}>Economics</option>
                            <option value="Business Administration" {{($teacher->specialization == 'Business Administration') ? 'selected' : ''}}>Business Administration</option>
                            <option value="Other" {{($teacher->specialization == 'Other') ? 'selected' : ''}}>Other</option>
                        </select>
                    </div>
                    <div class="g-col-4 g-col-xxl-4">
                        <label for="Institute" class="form-label">Institute</label>
                        <input id="Institute" type="text" name="institute" value="{{$teacher->institute}}" class="form-control" placeholder="Institute" required>
                    </div>
                </div>
                <div class="grid columns-12 gap-x-5 gap-y-0 mt-5">
                    <div class="g-col-4 g-col-xxl-4">
                        <label for="name" class="form-label">Teaching Subjects</label>
                        <select data-placeholder="Select Subjects" class="tom-select w-full"  name="subjects[]" multiple="true">
                            @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ in_array($subject->id, $selectedSubjectIds->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $subject->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="g-col-4 g-col-xxl-4">
                        <label for="input-wizard-4" class="form-label">Passing Year</label>
                        <div class="input-group w-100 mx-auto">
                            <div id="input-group-email" class="input-group-text"> <i data-feather="calendar"
                                    class="w-4 h-4"></i> </div>
                            <input type="text" name="passing_year" value="{{$teacher->passing_year}}" class="datepicker form-control" data-single-mode="true" required>
                        </div>
                    </div>
                    <div class="g-col-4 g-col-xxl-4">
                        <label for="name" class="form-label">Status</label>
                         <div class="d-flex justify-content-start align-items-center">
                            <div class="mt-2">
                                <div class="form-check form-switch"> 
                                    <input id="checkbox-switch-7"class="form-check-input" type="checkbox" name="active"  {{$active = ($teacher->active == 1) ? 'checked' : '';}}> 
                                <label class="form-check-label" for="checkbox-switch-7"></label> </div>
                            </div>

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
                                    placeholder="Pin Code" name="pincode" value="{{$teacher->pincode}}" required>
                            </div>
                        </div>

                        <div class="g-col-4 g-col-xxl-4">
                            <div>
                                <label for="update-profile-form-1" class="form-label">
                                    City</label>
                                <input id="update-profile-form-1" type="text" class="form-control"
                                    placeholder="City" name="city" value="{{$teacher->city}}" required>
                            </div>
                        </div>
                        <div class="g-col-4 g-col-xxl-4">
                            <label for="name" class="form-label">State</label>
                            <select name="state" class="form-select me-sm-2" aria-label="Default select example" required>
                                <option value="" selected disabled>Select State</option>
                                <option value="Andhra Pradesh" {{($teacher->state == 'Andhra Pradesh') ? 'selected' : ''}}>Andhra Pradesh</option>
                                <option value="Arunachal Pradesh" {{($teacher->state == 'Arunachal Pradesh') ? 'selected' : ''}}>Arunachal Pradesh</option>
                                <option value="Assam" {{($teacher->state == 'Assam') ? 'selected' : ''}}>Assam</option>
                                <option value="Bihar" {{($teacher->state == 'Bihar') ? 'selected' : ''}}>Bihar</option>
                                <option value="Chhattisgarh" {{($teacher->state == 'Chhattisgarh') ? 'selected' : ''}}>Chhattisgarh</option>
                                <option value="Goa" {{($teacher->state == 'Goa') ? 'selected' : ''}}>Goa</option>
                                <option value="Gujarat" {{($teacher->state == 'Gujarat') ? 'selected' : ''}}>Gujarat</option>
                                <option value="Haryana" {{($teacher->state == 'Haryana') ? 'selected' : ''}}>Haryana</option>
                                <option value="Himachal Pradesh" {{($teacher->state == 'Himachal Pradesh') ? 'selected' : ''}}>Himachal Pradesh</option>
                                <option value="Jharkhand" {{($teacher->state == 'Jharkhand') ? 'selected' : ''}}>Jharkhand</option>
                                <option value="Karnataka" {{($teacher->state == 'Karnataka') ? 'selected' : ''}}>Karnataka</option>
                                <option value="Kerala" {{($teacher->state == 'Kerala') ? 'selected' : ''}}>Kerala</option>
                                <option value="Madhya Pradesh" {{($teacher->state == 'Madhya Pradesh') ? 'selected' : ''}}>Madhya Pradesh</option>
                                <option value="Maharashtra" {{($teacher->state == 'Maharashtra') ? 'selected' : ''}}>Maharashtra</option>
                                <option value="Manipur" {{($teacher->state == 'Manipur') ? 'selected' : ''}}>Manipur</option>
                                <option value="Meghalaya" {{($teacher->state == 'Meghalaya') ? 'selected' : ''}}>Meghalaya</option>
                                <option value="Mizoram" {{($teacher->state == 'Mizoram') ? 'selected' : ''}}>Mizoram</option>
                                <option value="Nagaland" {{($teacher->state == 'Nagaland') ? 'selected' : ''}}>Nagaland</option>
                                <option value="Odisha" {{($teacher->state == 'Odisha') ? 'selected' : ''}}>Odisha</option>
                                <option value="Punjab" {{($teacher->state == 'Punjab') ? 'selected' : ''}}>Punjab</option>
                                <option value="Rajasthan" {{($teacher->state == 'Rajasthan') ? 'selected' : ''}}>Rajasthan</option>
                                <option value="Sikkim" {{($teacher->state == 'Sikkim') ? 'selected' : ''}}>Sikkim</option>
                                <option value="Tamil Nadu" {{($teacher->state == 'Tamil Nadu') ? 'selected' : ''}}>Tamil Nadu</option>
                                <option value="Telangana" {{($teacher->state == 'Telangana') ? 'selected' : ''}}>Telangana</option>
                                <option value="Tripura" {{($teacher->state == 'Tripura') ? 'selected' : ''}}>Tripura</option>
                                <option value="Uttar Pradesh" {{($teacher->state == 'Uttar Pradesh') ? 'selected' : ''}}>Uttar Pradesh</option>
                                <option value="Uttarakhand" {{($teacher->state == 'Uttarakhand') ? 'selected' : ''}}>Uttarakhand</option>
                                <option value="West Bengal" {{($teacher->state == 'West Bengal') ? 'selected' : ''}}>West Bengal</option>
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
                                required>{{$teacher->address}}</textarea>
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



