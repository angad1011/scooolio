<div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false"
    data-bs-toggle="dropdown"> <i data-feather="bell" class="notification__icon dark-text-gray-300"></i> </div>
<div class="notification-content pt-2 dropdown-menu">
    <div class="notification-content__box dropdown-content">
        <div class="notification-content__title dark-text-gray-300">Notifications</div>
        <?php foreach ($notifications as $key => $notification) { 
            $endDate = $notification->end_date;
            $currentTimestamp = strtotime($currentDate);
            $timestamp = strtotime($endDate);
        
           if($timestamp >= $currentTimestamp){
        ?>
        <div class="cursor-pointer position-relative d-flex align-items-center mt-5">
           <!--  <div class="w-12 h-12 flex-none image-fit me-1">
                <img alt=" " class="rounded-pill" src="dist/images/profile-14.jpg">
                <div
                    class="w-3 h-3 bg-theme-9 position-absolute end-0 bottom-0 rounded-pill border-2 border-white dark-border-dark-3">
                </div>
            </div> -->
            <div class="ms-2 overflow-hidden">
                <div class="d-flex align-items-center">
                    <a href="javascript:;" class="fw-medium truncate me-5 dark-text-gray-300">{{$notification->title}}</a>
                    <div class="fs-xs text-gray-500 ms-auto text-nowrap">{{ 'Form '.$notification->start_date.' to '.$notification->end_date }}</div>
                </div>
                <div class="w-full truncate text-gray-600 mt-0.5">{{$notification->message}}</div>
            </div>
        </div>
      <?php }} ?>
    </div>
</div>