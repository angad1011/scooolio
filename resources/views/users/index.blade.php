@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
    Users List
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
    <a class="d-flex align-items-center me-3" href="{{ route('users.create') }}"> 
        <button class="btn btn-primary shadow-md me-2"><i data-feather="plus"></i> Add New
        User</button>
    </a>
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
        <table class="table table-report mt-n2">
            <thead>
                <tr>
                    <th class="text-nowrap">Role</th>
                    <th class="text-nowrap">Department</th>
                    <th class="text-nowrap">Name</th>
                    <th class="text-nowrap">Email/Usrename</th>
                    <th class="text-nowrap">Contact</th>
                    <th class="text-nowrap">Active</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
             <tbody>
                 @foreach ($users as $user)   
                  <tr class="intro-x">
                    <td>{{ $user->roles->name }}</td>
                    <td>{{ $user->departments->name }}</td>
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
                     <td class="table-report__action w-56">
                        <div class="d-flex justify-content-start align-items-center">
                            <a class="d-flex align-items-center me-3" href="{{ route('users.edit',$user->id) }}"> 
                                <i data-feather="check-square" class="w-4 h-4 me-1"></i> Edit 
                            </a>
                            <a class="d-flex align-items-center me-3" href="{{ route('users.show',$user->id) }}"> 
                                <i data-feather="eye" class="w-4 h-4 me-1"></i> View 
                            </a>
                        </div>
                    </td>
                  </tr>
                  @endforeach
             </tbody>
        </table>
     </div>
</div>
@endsection

