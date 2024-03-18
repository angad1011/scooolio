<div class="dropdown-toggle w-8 h-8 rounded-pill overflow-hidden shadow-lg image-fit zoom-in" role="button"
    aria-expanded="false" data-bs-toggle="dropdown">
    @php
        $firstImage = Auth::user()->image_file;
        $id = Auth::user()->id;
        $imagePath = $firstImage ? asset("files/users/image_file/{$id}/{$firstImage}") : null;
    @endphp

    <?php if(!empty($imagePath)){  ?>  
        <img alt="Rubick Tailwind HTML Admin Template" src="{{$imagePath}}">
    <?php }else{?>   
    <img alt="Rubick Tailwind HTML Admin Template" src="dist/images/admin-pic.jpg">
    <?php } ?>
</div>
<div class="dropdown-menu w-56">
    <ul class="dropdown-content bg-theme-26 dark-bg-dark-6 text-white">
        <li class="p-2">
            <div class="fw-medium text-white">{{Auth::user()->name}}</div>
            <div class="fs-xs text-theme-28 mt-0.5 dark-text-gray-600">{{Auth::user()->roles->name}}</div>
        </li>
        <li>
            <hr class="dropdown-divider border-theme-27 dark-border-dark-3">
        </li>
        <li>
            <a href="{{ route('users.show',Auth::user()->id) }}" class="dropdown-item text-white bg-theme-1-hover dark-bg-dark-3-hover"> <i data-feather="user"
                    class="w-4 h-4 me-2"></i> Profile </a>
        </li>
        <li>
            <a href="{{ route('change_password') }}" class="dropdown-item text-white bg-theme-1-hover dark-bg-dark-3-hover"> <i data-feather="lock"
                    class="w-4 h-4 me-2"></i> Reset Password </a>
        </li>
        <li>
            <hr class="dropdown-divider border-theme-27 dark-border-dark-3">
        </li>
        <li>
            <a href="{{ route('logout') }}" class="dropdown-item text-white bg-theme-1-hover dark-bg-dark-3-hover"> <i
                    data-feather="toggle-right" class="w-4 h-4 me-2"></i> Logout </a>
        </li>
    </ul>
</div>