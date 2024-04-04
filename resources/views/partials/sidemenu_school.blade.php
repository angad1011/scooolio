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
       <a href="javascript:;" class="side-menu" id="school">
           <div class="side-menu__icon"> <i data-feather="user"></i> </div>
            <div class="side-menu__title">
                User Master
                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
       </a>
       <ul>
            <li>
                <a href="{{ route('users.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="user"></i> </div>
                    <div class="side-menu__title"> Users</div>
                </a>
            </li>
            <li>
                <a href="{{ route('academic_years.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="list"></i> </div>
                    <div class="side-menu__title"> Academic Year</div>
                </a>
            </li>
       </ul>
   </li>

    <li>
        <a href="javascript:;" class="side-menu" id="school">
            <div class="side-menu__icon"> <i data-feather="layout"></i> </div>
            <div class="side-menu__title">
                Institutes
                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
        </a>
        <ul class="">
            <li>
                <a href="{{ route('learn_spaces.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="list"></i> </div>
                    <div class="side-menu__title">Setup Class</div>
                </a>
            </li>
            <li>
                <a href="{{ route('subjects.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="list"></i> </div>
                    <div class="side-menu__title">Subjects</div>
                </a>
            </li>
            <li>
                <a href="{{ route('teachers.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="list"></i> </div>
                    <div class="side-menu__title"> Teacher List </div>
                </a>
            </li>
            <li>
                <a href="{{ route('students.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="list"></i> </div>
                    <div class="side-menu__title"> Student List </div>
                </a>
            </li>
        </ul>
    </li>
   
    <li>
        <a href="{{ route('logout') }}" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="power"></i> </div>
            <div class="side-menu__title"> Logout </div>
        </a>
    </li>

</ul>