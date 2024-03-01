
<!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?=base_url('Dashboard');?>">
                            <img src="<?=ASSETS_PATH?>global/img/dashboard.png" alt="logo" class="logo-default" /> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                           <li class="dropdown dropdown-extended ">
                                <a href="https://web.whatsapp.com/" target="_blank">
                                    <i class="fa fa-whatsapp" style="color:white;"></i>
                                </a>
                            </li>
                           <li class="dropdown dropdown-extended ">
                                <a href="javascript:;" onclick="toggleFullScreen();">
                                    <i class="fa fa-arrows-alt" style="color:white;"></i>
                                </a>
                            </li>

                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="<?=UPLOAD_PATH?><?=$this->session->userdata('admin_img');?>" />
                                    <span class="username username-hide-on-mobile"> <?=$this->session->userdata('admin_fullname');?> </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="<?=base_url('Profile');?>">
                                            <i class="fa fa-user"></i> My Profile </a>
                                    </li>
                                    
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="<?=base_url('logout');?>">
                                            <i class="fa fa-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            
                            
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->    