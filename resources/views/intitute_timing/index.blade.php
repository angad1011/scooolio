@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
    InstituteType List
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
    <a class="d-flex align-items-center me-3" href="{{ route('institute_types.create') }}"> 
        <button class="btn btn-primary shadow-md me-2"><i data-feather="plus"></i> Add New
        InstituteType</button>
    </a>
</div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box p-5 mt-5">
     <div class="intro-y g-col-12 ooverflow-x-auto overflow-lg-visible mt-5">
        <table class="table table-report mt-n2">
            <thead>
                <tr>
                    <th class="text-nowrap">InstituteType</th>
                    <th class="text-nowrap">Active</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
             <tbody>
                 @foreach ($instituteTypes as $instituteType)   
                  <tr class="intro-x">
                    <td>{{ $instituteType->name }}</td>
                    <td>
                        @php 
                        $active = ($instituteType->active == 1) ? 'checked' : '';
                        @endphp
                        <div class="d-flex justify-content-start align-items-center">
                            <div class="mt-2">
                                <div class="form-check form-switch"> 
                                    <input id="checkbox-switch-7"class="form-check-input" type="checkbox" name="active" {{$active}}> 
                                <label class="form-check-label" for="checkbox-switch-7"></label> </div>
                            </div>
                        </div>
                    </td>
                     <td class="table-report__action w-56">
                        <div class="d-flex justify-content-start align-items-center">
                            <a class="d-flex align-items-center me-3" href="{{ route('institute_types.edit',$instituteType->id) }}"> 
                                <i data-feather="check-square" class="w-4 h-4 me-1"></i> Edit 
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

