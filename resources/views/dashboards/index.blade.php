@extends('layouts.app')

@section('content')
<!-- Contet Start Here -->
<div class="grid columns-12 gap-6">
	<div class="g-col-12 g-col-xxl-9">
		<div class="grid columns-12 gap-6">
			<!-- BEGIN: General Report -->
			<div class="g-col-12 mt-8">
				 <div class="intro-y d-flex align-items-center h-10">
                    <h2 class="fs-lg fw-medium truncate me-5">
                        General Report
                    </h2>
                    <a href="" class="ms-auto d-flex align-items-center text-theme-1 dark-text-theme-10"> <i
                            data-feather="refresh-ccw" class="w-4 h-4 me-3"></i> Reload Data </a>
                </div>
                <div class="grid columns-12 gap-6 mt-5">
                	<div class="g-col-12 g-col-sm-6 g-col-xl-4 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="d-flex">
                                    <i data-feather="user-check" class="report-box__icon text-theme-10"></i>
                                   <!--  <div class="ms-auto">
                                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                            title="33% Higher than last month"> 33% <i
                                                data-feather="chevron-up" class="w-4 h-4 ms-0.5"></i> 
                                        </div>
                                    </div> -->
                                </div>
                                <div class="report-box__total fs-3xl fw-medium mt-6">{{count($teachers)}}</div>
                                <div class="fs-base text-gray-600 mt-1">Teachers</div>
                            </div>
                        </div>
                    </div>
                                <div class="g-col-12 g-col-sm-6 g-col-xl-4 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="d-flex">
                                                <i data-feather="credit-card"
                                                    class="report-box__icon text-theme-11"></i>
                                                <!-- <div class="ms-auto">
                                                    <div class="report-box__indicator bg-theme-6 tooltip cursor-pointer"
                                                        title="2% Lower than last month"> 2% <i
                                                            data-feather="chevron-down" class="w-4 h-4 ms-0.5"></i>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="report-box__total fs-3xl fw-medium mt-6">{{count($Students)}}</div>
                                            <div class="fs-base text-gray-600 mt-1">Students</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="g-col-12 g-col-sm-6 g-col-xl-4 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="d-flex">
                                                <i data-feather="user" class="report-box__icon text-theme-9"></i>
                                            </div>
                                            <div class="report-box__total fs-3xl fw-medium mt-6">{{$precentPercentage.'%'}}</div>
                                            <div class="fs-base text-gray-600 mt-1">Attendance</div>
                                        </div>
                                    </div>
                                </div>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection