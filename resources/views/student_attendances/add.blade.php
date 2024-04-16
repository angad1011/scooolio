@extends('layouts.app')

@section('content')

<!-- BEGIN: HTML Table Data -->
<div class="grid columns-12 gap-6">
    <!-- END: Profile Menu -->
    <div class="g-col-12 g-col-lg-12 g-col-xxl-12">
        <!-- BEGIN: Display Information -->
        <div class="intro-y box mt-lg-5">
            <div class="d-flex align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                <h2 class="fw-medium fs-base me-auto"> Time Table For Class : {{$classDetail->class_name}}</h2>
                <?php if($timeTablesCount != 0){ ?>
                <div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
                    <a href="{{ route('learn_spaces.show',$classId) }}" class="btn btn-primary shadow-md me-2">Class Details</a> 
                </div>
                <?php } ?>
            </div> 
            <?php if($timeTablesCount == 0){ ?>
                @include('partials.add_time_table') 
            <?php }else{ ?>
                @include('partials.update_time_table') 
            <?php } ?>        
        </div>
        <!-- END: Display Information -->
      

    </div>
</div>
@endsection