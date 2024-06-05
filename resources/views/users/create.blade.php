@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
    <h2 class="fs-lg fw-medium me-auto">
        Add New User
    </h2>
    <div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
        <a href="{{ route('users.index') }}" class="btn btn-primary shadow-md me-2">Users List</a>
    </div>
</div>
<div class="intro-y box py-10 mt-5">
    <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="px-5">
            @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                @foreach ($errors->all() as $error)
                {{ $error }}.
                @endforeach
            </div>
            @endif
            <div class="grid columns-12 gap-4 gap-y-5">
                <div class="intro-y g-col-12 g-col-sm-3">
                    <label for="name" class="form-label">Department</label>
                    <select class="form-select me-sm-2" aria-label="Default select example" name="department_id" required>
                        <option>Select Department</option>
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="intro-y g-col-12 g-col-sm-6">
                    <label for="name" class="form-label">Full Name</label>
                    <input id="name" type="text" class="form-control" name="name" placeholder="Full Name" required>
                </div>
                <div class="intro-y g-col-12 g-col-sm-3">
                    <label for="contact_no" class="form-label">Contact No.</label>
                    <input id="contact_no" type="number" class="form-control" name="contact_no" placeholder="Contact No" required>
                </div>
                <!-- <div class="intro-y g-col-12 g-col-sm-3">
                    <label for="alternat_no" class="form-label">Alternate No.</label>
                    <input id="alternat_no" type="number" class="form-control" name="alternat_no" placeholder="Alternate No" required>
                </div> -->
                <div class="intro-y g-col-12 g-col-sm-3">
                    <label for="name" class="form-label">Gender</label>
                    <select class="form-select me-sm-2" aria-label="Default select example" name="gender" required>
                        <option>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="intro-y g-col-12 g-col-sm-3">
                    <label for="input-wizard-4" class="form-label">DOB</label>
                    <div class="input-group w-100 mx-auto">
                        <div id="input-group-email" class="input-group-text"> <i data-feather="calendar" class="w-4 h-4"></i> </div> <input type="text" class="datepicker form-control" data-single-mode="true" name="dob">
                    </div>
                </div>
                <div class="intro-y g-col-12 g-col-sm-3">
                    <label for="name" class="form-label">Status</label>
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="mt-2">
                            <div class="form-check form-switch">
                                <input id="checkbox-switch-7" class="form-check-input" type="checkbox" name="active" checked>
                                <label class="form-check-label" for="checkbox-switch-7"></label> </div>
                        </div>

                    </div>
                </div>
                <!--  <div class="intro-y g-col-12 g-col-sm-6">
            <label for="fileInput" class="form-label">Image File</label>
            <input type="file" class="form-control" id="imageFile" name="image_file">
        </div> -->
                <div class="intro-y g-col-12 ">
                    <h2 class="fs-lg fw-medium me-auto">User Authentication</h2>
                </div>
                <div class="intro-y g-col-12 g-col-sm-6">
                    <label for="email" class="form-label">Email / Username</label>
                    <input id="email" type="email" class="form-control" name="email" placeholder="Email / Username" required>
                </div>
                <div class="intro-y g-col-12 g-col-sm-6">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                </div>

                <div class="intro-y g-col-12 g-col-sm-3">
                    <div class="border-2 border-dashed shadow-sm border-gray-200 dark-border-dark-5 rounded-2 p-5">
                        <div class="h-40 position-relative image-fit cursor-pointer zoom-in mx-auto">
                            <img class="rounded-2" alt=" " id="blah" src="{{ asset('dist/images/admin-pic.jpg') }}">
                        </div>
                        <div class="mx-auto cursor-pointer position-relative mt-5">
                            <button type="button" class="btn btn-primary w-full">Change Photo</button>
                            <input type="file" class="w-full h-full top-0 start-0 position-absolute opacity-0" id="imageFile" name="image_file">
                        </div>
                    </div>

                </div>

                <!-- Submit Form -->
                <div class="intro-y g-col-12 d-flex align-items-center justify-content-center justify-content-sm-end mt-5">
                    <button class="btn btn-primary w-24 ms-2" type="submit">Submit</button>
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