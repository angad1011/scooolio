@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
    College List
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
    <a class="d-flex align-items-center me-3" href="{{ route('add_college') }}"> 
        <button class="btn btn-primary shadow-md me-2"><i data-feather="plus"></i> Add New
        College</button>
    </a>
</div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box p-5 mt-5">
     <div class="intro-y g-col-12 ooverflow-x-auto overflow-lg-visible mt-5">
        <table class="table table-report mt-n2">
            <thead>
                <tr>
                    <th class="text-nowrap">Logo</th>
                    <th class="text-nowrap">Code</th>
                    <th class="text-nowrap">Name</th>
                    <th class="text-nowrap">Contact</th>
                    <th class="text-nowrap">Branch</th>
                    <th class="text-nowrap">City</th>
                    <th class="text-nowrap">State</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
             <tbody>
                  @foreach ($institutes as $institute)   
                  <tr class="intro-x">
                    <td class="w-20">
                        <div class="d-flex">
                            <div class="w-10 h-10 image-fit zoom-in">
                                @php
                                    $firstImage = $institute->image_file;
                                    $id = $institute->id;
                                    $imagePath = $firstImage ? asset("files/school/image_file/{$id}/{$firstImage}") : null;
                                @endphp
                                <img alt="logo" class="tooltip rounded-circle" src="{{$imagePath }}" title="Uploaded at 15 June 2021">
                            </div>
                        </div>
                    </td>
                    <td class="text-right">{{$institute->code}}</td>
                    <td><a href="" class="fw-medium text-nowrap">{{$institute->name}}</a></td>
                    <td>{{$institute->contact_no}}</td>
                    <td>{{$institute->branch}}</td>
                    <td>{{$institute->city}}</td>
                    <td>{{$institute->state}}</td>
                    <td class="table-report__action w-56">
                        <div class="d-flex justify-content-start align-items-center">
                            <a class="d-flex align-items-center me-3" href="{{ route('institutes.edit',$institute->id) }}"> <i
                                    data-feather="check-square" class="w-4 h-4 me-1"></i> Edit </a>
                            <a class="d-flex align-items-center me-3" href="{{ route('institutes.show',$institute->id) }}"> <i data-feather="eye"
                                    class="w-4 h-4 me-1"></i> View </a>

                        </div>
                    </td>
                  </tr>
                 @endforeach
             </tbody>
        </table>
     </div>
</div>
@endsection

