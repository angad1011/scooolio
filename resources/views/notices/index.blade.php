@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
    Notice List
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
    <a class="d-flex align-items-center me-3" href="{{ route('notices.create') }}"> 
        <button class="btn btn-primary shadow-md me-2"><i data-feather="plus"></i> Add New
        Notice</button>
    </a>
</div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box p-5 mt-5">
     <div class="intro-y g-col-12 ooverflow-x-auto overflow-lg-visible mt-5">
        <table class="table table-report mt-n2">
            <thead>
                <tr>
                    <th class="text-nowrap">Title</th>
                    <th class="text-nowrap">Message</th>
                    <th class="text-nowrap">Start Date</th>
                    <th class="text-nowrap">End Date</th>
                    <th class="text-nowrap">Staus</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
             <tbody>
                 @foreach ($notices as $notice)   
                  <tr class="intro-x">
                    <td>{{ $notice->title }}</td>
                    <td>{{ $notice->message }}</td>
                    <td>{{ $notice->start_date }}</td>
                    <td>{{ $notice->end_date }}</td>
                    <td>
                        @php 
                        $active = ($notice->active == 1) ? 'checked' : '';
                        $endDate = $notice->end_date;

                        $currentTimestamp = strtotime($currentDate);
                        $timestamp = strtotime($endDate);

                        $formattedDate = date('d-m-Y', $timestamp);

                        $active = ($timestamp > $currentTimestamp) ? 'checked' : '';

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
                            
                            <a class="d-flex align-items-center me-3" href="{{ route('notices.show',$notice->id) }}"> 
                                <i data-feather="eye" class="w-4 h-4 me-1"></i> View 
                            </a>

                            <a class="d-flex align-items-center me-3" href="{{ route('notices.edit',$notice->id) }}"> 
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

