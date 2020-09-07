<?php $user = get_active_user(); ?>
<ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
    <!-- Search -->
    <!--<li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="la la-search"></i></a></li>-->
    <!-- End Search -->
    <!-- Begin Notifications -->
    <!-- End Notifications -->
    <!-- User -->
    <?php
    if ($this->session->userdata("user")) {
        $profileLink = "users";
    }else if($this->session->userdata("institution_user")){
        $profileLink = "institution_users";
    }
    ?>
    <li class="nav-item dropdown"><a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><img src="<?php echo base_url("assets/"); ?>img/avatar/avatar-01.jpg" alt="..." class="avatar rounded-circle"></a>
        <ul aria-labelledby="user" class="user-size dropdown-menu">
            <li class="welcome">
                <a href="<?php echo base_url("$profileLink/update_form/$user->id"); ?>" class="edit-profil"><i class="la la-gear"></i></a>
                <img src="<?php echo base_url("assets/"); ?>img/avatar/avatar-01.jpg" alt="..." class="rounded-circle">
            </li>
            <li>
                <a href="<?php echo base_url("$profileLink/update_form/$user->id"); ?>" class="dropdown-item"> 
                    Profilim - <?php echo $user->full_name; ?>
                </a>
            </li>
            <li class="separator"></li>
            <li><a rel="nofollow" href="<?php echo base_url("logout"); ?>" class="dropdown-item logout text-center"><i class="ti-power-off"></i></a></li>
        </ul>
    </li>
    <!-- End User -->
    <!-- Begin Quick Actions -->
    <!--<li class="nav-item"><a href="#off-canvas" class="open-sidebar"><i class="la la-ellipsis-h"></i></a></li>-->
    <!-- End Quick Actions -->
</ul>