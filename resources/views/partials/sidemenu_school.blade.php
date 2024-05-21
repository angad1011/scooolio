<a href="" class="intro-x d-flex align-items-center ps-5 pt-4">
    @php
    $firstImage = Auth::user()->institutes->image_file;
    $id = Auth::user()->institute_id;
    $imagePath = $firstImage ? asset("files/school/image_file/{$id}/{$firstImage}") : asset('dist/images/logo.svg');
    @endphp

    @if(!empty($imagePath))
    <img alt="Logo" class="w-100" src="{{ $imagePath }}" style="width: 100%">
    @endif

</a>
<div class="side-nav__devider my-6"></div>
<ul>
    <li>
        <a href="{{ route('dashboards.index') }}" class="side-menu" id="dashboard">
            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
            <div class="side-menu__title">
                Dashboard
            </div>
        </a>
    </li>
    <li>
        <a href="javascript:void(0)" class="side-menu" id="teacher">
            <div class="side-menu__icon"> <i data-feather="layout"></i> </div>
            <div class="side-menu__title">
                Teachers
                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
        </a>
        <ul class="">
            <li>
                <a href="{{ route('teachers.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="list"></i> </div>
                    <div class="side-menu__title"> Teachers List </div>
                </a>
            </li>
            <li>
                <a href="{{ route('teachers.create') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
                    <div class="side-menu__title"> Add Teacher </div>
                </a>
            </li>
            <!-- <li>
                <a href="assign-class.html" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="user-check"></i> </div>
                    <div class="side-menu__title"> Assign Class </div>
                </a>
            </li> -->
        </ul>
    </li>
    <li>
        <a href="javascript:void(0)" class="side-menu" id="student">
            <div class="side-menu__icon"> <i data-feather="layout"></i> </div>
            <div class="side-menu__title">
                Student
                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
        </a>
        <ul class="">
            <li>
                <a href="{{ route('students.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="list"></i> </div>
                    <div class="side-menu__title"> Student List </div>
                </a>
            </li>
            <li>
                <a href="{{ route('students.create') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
                    <div class="side-menu__title"> Add Student </div>
                </a>
            </li>
        </ul>
    </li>

</ul>