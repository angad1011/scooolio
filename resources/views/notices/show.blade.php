@extends('layouts.app')

@section('content')
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
    <h2 class="fs-lg fw-medium me-auto"> Notice List </h2>
    <div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
        <a href="{{ route('notices.index') }}" class="btn btn-primary shadow-md me-2">Notice List</a>
    </div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box p-5 mt-5">
<div class="intro-y g-col-12 ooverflow-x-auto overflow-lg-visible mt-5">
    <table class="table table-bordered table-report mt-n2">
         <tbody>
             <tr>
                 <th class="">Title</th>
                 <td>{{ $notice->title }}</td>
             </tr>
             <tr>
                 <th class="">Message</th>
                 <td>{{ $notice->message }}</td>
             </tr>
             <tr>
                 <th class="">Start Date</th>
                 <td>{{ $notice->start_date }}</td>
             </tr>
             <tr>
                 <th class="">End Date</th>
                 <td>{{ $notice->end_date }}</td>
             </tr>

             <tr>
                 <th class="">Status</th>
                 <td> @php if($notice->active == '1'){
                        $class = 'activelabel';
                        $data = 'Active';
                        }
                        else{
                        $class = 'inactivelabel';
                        $data = 'Inactive';
                        } @endphp
                        <div class="{{ $class; }}">{{ $data }}</div></td>
             </tr>
         </tbody>
    </table>
</div>
</div>
@endsection

