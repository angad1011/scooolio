<a href="" class="intro-x d-flex align-items-center ps-5 pt-4">
    <img alt="Logo" class="w-100" src="{{ asset('dist/images/logo.svg') }}">
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
                <a href="{{ route('roles.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="list"></i> </div>
                    <div class="side-menu__title"> Roles</div>
                </a>
            </li>
            <li>
                <a href="{{ route('departments.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="list"></i> </div>
                    <div class="side-menu__title"> Department</div>
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="user"></i> </div>
                    <div class="side-menu__title"> Users</div>
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
                <a href="{{route('schools')}}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="list"></i> </div>
                    <div class="side-menu__title"> School List </div>
                </a>
            </li>
            <li>
                <a href="{{route('colleges')}}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="list"></i> </div>
                    <div class="side-menu__title"> College List </div>
                </a>
            </li>
            <li>
                <a href="{{ route('institute_types.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="list"></i> </div>
                    <div class="side-menu__title"> Institute Type </div>
                </a>
            </li>
            <li>
                <a href="{{ route('boards.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="list"></i> </div>
                    <div class="side-menu__title"> Board </div>
                </a>
            </li>
            <li>
                <a href="{{ route('mediums.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="list"></i> </div>
                    <div class="side-menu__title"> Medium</div>
                </a>
            </li>
            <li>
                <a href="{{ route('streams.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="list"></i> </div>
                    <div class="side-menu__title"> Streams</div>
                </a>
            </li>
            
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="side-menu" id="school">
            <div class="side-menu__icon"> <i data-feather="list"></i> </div>
            <div class="side-menu__title">
                Comman Masters
                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
        </a>
    </li>    
    <li>
        <a href="{{ route('logout') }}" class="side-menu">
            <div class="side-menu__icon"> <i data-feather="power"></i> </div>
            <div class="side-menu__title"> Logout </div>
        </a>
    </li>

</ul>