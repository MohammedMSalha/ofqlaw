   <!-- Begin page -->
   <div id="wrapper">
   
<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

       

      

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
               
                <span class="pro-user-name ml-1">
                    ملف المستخدم <i class="mdi mdi-chevron-down"></i> 
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">مرحبا !</h6>
                </div>

                <!-- item-->
                <a href="/profile" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>الملف الشخصي</span>
                </a>

            
                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="/logout" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>تسجيل الخروج</span>
                </a>

            </div>
        </li>

        


    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="index.html" class="logo text-center">
            <span class="logo-lg">
                <img src="<?php echo SCRIPT_ROOT.'/images/logo-wide-white.png'; ?>" alt="" height="55">
                <!-- <span class="logo-lg-text-light">UBold</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">U</span> -->
                <img src="<?php echo SCRIPT_ROOT.'/images/logo-white.png'; ?>" alt="" height="24">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu"></i>
            </button>
        </li>



       
    </ul>
</div>
<!-- end Topbar -->

<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

      <?php include(DASHBOARD_PARTS."sidebar.php"); ?>

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->



