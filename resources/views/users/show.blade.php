@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
    <h2 class="fs-lg fw-medium me-auto"> Users List </h2>
    <div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
        <a href="{{ route('users.index') }}" class="btn btn-primary shadow-md me-2">Users List</a>
    </div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box p-5 mt-5">
<div class="intro-y g-col-12 ooverflow-x-auto overflow-lg-visible mt-5">
    <table class="table table-bordered table-report mt-n2">
         <tbody>
             <tr>
                 <th class="">Role</th>
                 <td>{{ $user->roles->name }}</td>
             </tr>
             <tr>
                 <th class="">Department</th>
                 <td>{{ $user->departments->name }}</td>
             </tr>
             <tr>
                 <th class="">Full Name</th>
                 <td>{{ $user->name }}</td>
             </tr>
             <tr>
                 <th class="">Email / User Name</th>
                 <td>{{ $user->email }}</td>
             </tr>
             <tr>
                 <th class="">Contact No.</th>
                 <td>{{ $user->contact_no }}</td>
             </tr>
             <tr>
                 <th class="">Alternate No.</th>
                 <td>{{ $user->alternat_no }}</td>
             </tr>
             <tr>
                 <th class="">Date Of Birth</th>
                 <td>{{ $user->dob }}</td>
             </tr>
             <tr>
                 <th class="">Gender</th>
                 <td>{{ $user->gender }}</td>
             </tr>
             <tr>
                 <th class="">Status</th>
                 <td> @php if($user->active == '1'){
                        $class = 'activelabel';
                        $data = 'Active';
                        }
                        else{
                        $class = 'inactivelabel';
                        $data = 'Inactive';
                        } @endphp
                        <div class="{{ $class; }}">{{ $data }}</div></td>
             </tr>
             <tr>
                 <th class="col-sm-2">Profil</th>
                 <td> 
                 <p>
                    @php
                        $firstImage = $user->image_file;
                        $id = $user->id;
                        $imagePath = $firstImage ? asset("files/users/image_file/{$id}/{$firstImage}") : null;
                    @endphp

                    @if(!empty($imagePath))
                        <img src="{{ $imagePath }}" height="100px" width="100px">
                    @endif
                             
                 </p>
                </td>
             </tr>
         </tbody>
    </table>
</div>
</div>
@endsection

