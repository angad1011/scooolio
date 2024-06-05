@extends('layouts.app')

@section('content')
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <!-- <h4 class="modal-title">Upload Excel File For Students</h4> -->
        <h2 class="fs-lg fw-medium me-auto modal-title">Upload Excel File For Students</h2>
        <div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
        <a class="d-flex align-items-center me-3 UplodExcelForm" href="{{asset('upload_excel/studentList.xlsx')}}" >Download Sample File</a>
        </div>
      </div>
      <div class="modal-body">
        <div class="intro-y box py-10 mt-5" style="padding: 15px">
            <form action="{{ route('import.students') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid columns-12 gap-4 gap-y-5">
                    <div class="intro-y g-col-12 g-col-sm-12">
                    <label for="name" class="form-label">Upload Excel File</label>
                        <input type="file" name="file" class="form-control" accept=".xls,.xlsx">
                    </div>
                </div>
                <div class="intro-y g-col-12 d-flex align-items-center justify-content-center justify-content-sm-end mt-5">
                    <button class="btn btn-primary w-24 ms-2" type="submit" >Submit</button>
                </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Model End Here -->
<div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
<h2 class="fs-lg fw-medium me-auto">
Student List
</h2>
<div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
    <a class="d-flex align-items-center me-3" href="{{ route('students.create') }}"> 
        <button class="btn btn-primary shadow-md me-2"><i data-feather="plus"></i> Add New
        Student</button>
    </a>
    <a class="d-flex align-items-center me-3 UplodExcelForm" href="#"> 
        <button class="btn btn-primary shadow-md me-2"><i data-feather="file"></i> Upload
        Excel</button>
    </a>
</div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box p-5 mt-5">
     <div class="intro-y g-col-12 ooverflow-x-auto overflow-lg-visible mt-5">
        <table class="table table-report mt-n2">
            <thead>
                <tr>
                    <th class="text-nowrap">Profile Photo</th>
                    <th class="text-nowrap">Name</th>
                    <th class="text-nowrap">GR No.</th>
                    <th class="text-nowrap">Contact</th>
                    <th class="text-nowrap">Email</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
             <tbody>
                 <?php //dd($teachers); ?>
                 @foreach ($students as $student)   
                  <tr class="intro-x">
                   <td class="w-20">
                   <div class="d-flex">
                        <div class="w-10 h-10 image-fit zoom-in">
                             <?php
                                $firstImage = $student->profile_img;
                                $id = $student->id;
                                $localImage = ($student->gender == 'male') ? asset('dist/images/student_male_icon.png') : asset('dist/images/female_student_icon.png'); 
                                $imagePath = $firstImage ? asset("files/students/profile_img/".$id."/".$firstImage."") : $localImage;
                                // echo $imagePath;
                            ?>
                            <img class="tooltip rounded-circle" src="{{$imagePath }}" title="{{ $student->name }}">
                        </div>
                    </div>
                   
                    </td>
                    <td> {{ $student->name }}</td>
                    <td> {{ $student->gr_no }}</td>
                    <td>{{ $student->contact_no }}</td>
                    <td>{{ $student->email }}</td>
                     <td class="table-report__action w-56">
                        <div class="d-flex justify-content-start align-items-center">
                            <a class="d-flex align-items-center me-3" href="{{ route('students.edit',$student->id) }}"> 
                                <i data-feather="check-square" class="w-4 h-4 me-1"></i> Edit 
                            </a>
                            <a class="d-flex align-items-center me-3" href="{{ route('students.show',$student->id) }}"> <i data-feather="eye"
                                    class="w-4 h-4 me-1"></i> View </a>
                        </div>
                    </td>
                  </tr>
                  @endforeach
             </tbody>
        </table>
     </div>
     <!-- Pagination Start -->
     @include('partials.pagination', ['items' => $students])
</div>
<script type="text/javascript">
  $('.UplodExcelForm').click(function(){
    $('#myModal').modal('show'); 
  });
</script>
@endsection

