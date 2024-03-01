            <!-- BEGIN SIDEBAR -->

            <?php

            $ci =& get_instance();

            $currentpage = $ci->router->fetch_class();

            ?>

                <div class="page-sidebar-wrapper">

                    <!-- BEGIN SIDEBAR -->                    

                    <div class="page-sidebar navbar-collapse collapse">

                        <!-- BEGIN SIDEBAR MENU -->

                        

                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

                            

                            <li class="nav-item start <?php if($currentpage == 'Dashboard' || $currentpage == 'Profile') echo "active open" ?> ">

                                <a href="<?=base_url('Dashboard')?>" class="nav-link">

                                    <i class="fa fa-home"></i>

                                    <span class="title"><?=$this->lang->line('dashboard_ttl');?></span>

                                    <span class="selected"></span>

                                </a>

                            </li>



                            <li class="nav-item <?php if($currentpage == 'Gallery') echo "active" ?>">

                                <a href="<?=base_url('Gallery')?>" class="nav-link ">

                                    <i class="fa fa-file-photo-o"></i>

                                    <span class="title"><?=$this->lang->line('gallery_ttl');?></span>

                                </a>

                            </li>



                            <li class="nav-item <?php if($currentpage == 'Village_history') echo "active" ?>">

                                <a href="<?=base_url('Village_history');?>" class="nav-link ">

                                    <i class="fa fa-history"></i>

                                    <span class="title"><?=$this->lang->line('village_ttl');?></span>

                                </a>

                            </li>



                            <li class="nav-item <?php if($currentpage == 'Organization_team') echo "active" ?>">

                                <a href="<?=base_url('Organization_team');?>" class="nav-link ">

                                    <i class="fa fa-group"></i>

                                    <span class="title"><?=$this->lang->line('org_team_ttl');?></span>

                                </a>

                            </li>



                            <li class="nav-item <?php if($currentpage == 'Blood_donation') echo "active" ?>">

                                <a href="<?=base_url('Blood_donation');?>" class="nav-link ">

                                    <i class="fa fa-bell"></i>

                                    <span class="title">Notification</span>

                                </a>

                            </li>



                            <li class="nav-item <?php if($currentpage == 'Samaj_proud') echo "active" ?>">

                                <a href="<?=base_url('Samaj_proud');?>" class="nav-link ">

                                    <i class="fa fa-trophy"></i>

                                    <span class="title"><?=$this->lang->line('samaj_ttl');?></span>

                                </a>

                            </li>



                            <li class="nav-item <?php if($currentpage == 'Manage_transaction') echo "active" ?>">

                                <a href="<?=base_url('Manage_transaction')?>" class="nav-link ">

                                    <i class="fa fa-rupee"></i>

                                    <span class="title"><?=$this->lang->line('payment_ttl');?></span>

                                </a>

                            </li> 



                            <li class="nav-item <?php if($currentpage == 'Post_event' || 

                            $currentpage == 'Post_news' || $currentpage == 'Post_career' || $currentpage == 'Image_tool') echo "active open" ?>">

                                <a href="javascript:;" class="nav-link nav-toggle">

                                    <i class="fa fa-edit"></i>

                                    <span class="title"><?=$this->lang->line('create_post');?></span>

                                    <span class="arrow"></span>

                                </a>

                                <ul class="sub-menu">

                                    <li class="nav-item <?php if($currentpage == 'Image_tool') echo "active" ?>">

                                        <a href="<?=base_url('Image_tool');?>" class="nav-link ">

                                            <i class="fa fa-edit"></i>

                                            <span class="title">Image Tool</span>

                                        </a>

                                    </li>

                                    <li class="nav-item <?php if($currentpage == 'Post_news') echo "active" ?>">

                                        <a href="<?=base_url('Post_news');?>" class="nav-link ">

                                            <i class="fa fa-edit"></i>

                                            <span class="title"><?=$this->lang->line('post_for_news');?></span>

                                        </a>

                                    </li>

                                    <li class="nav-item <?php if($currentpage == 'Post_event') echo "active" ?>">

                                        <a href="<?=base_url('Post_event');?>" class="nav-link ">

                                            <i class="fa fa-edit"></i>

                                            <span class="title"><?=$this->lang->line('post_for_event');?></span>

                                        </a>

                                    </li>

                                    <li class="nav-item <?php if($currentpage == 'Post_career') echo "active" ?>">

                                        <a href="<?=base_url('Post_career');?>" class="nav-link ">

                                            <i class="fa fa-edit"></i>

                                            <span class="title"><?=$this->lang->line('post_for_carrer');?></span>

                                        </a>

                                    </li>

                                </ul>

                            </li>

                            

                            <li class="nav-item <?php if($currentpage == 'Manage_member' 

                            || $currentpage == 'Pending_family' || $currentpage == 'Manage_family' 

                            || $currentpage == 'Pending_users') echo "active open" ?>">

                                <a href="javascript:;" class="nav-link nav-toggle">

                                    <i class="fa fa-users"></i>

                                    <span class="title"><?=$this->lang->line('member_directory');?></span>

                                    <span class="arrow"></span>

                                </a>

                                <ul class="sub-menu">

                                    <li class="nav-item <?php if($currentpage == 'Pending_users') echo "active" ?>">

                                        <a href="<?=base_url('Pending_users')?>" class="nav-link ">

                                            <i class="fa fa-user"></i>

                                            <span class="title"><?=$this->lang->line('pending_member');?></span>

                                        </a>

                                    </li>

                                    <li class="nav-item <?php if($currentpage == 'Manage_member') echo "active" ?>">

                                        <a href="<?=base_url('Manage_member')?>" class="nav-link ">

                                            <i class="fa fa-users"></i>

                                            <span class="title"><?=$this->lang->line('manage_member');?></span>

                                        </a>

                                    </li>

                                     <li class="nav-item <?php if($currentpage == 'Pending_family') echo "active" ?>">

                                        <a href="<?=base_url('Pending_family')?>" class="nav-link ">

                                            <i class="fa fa-users"></i>

                                            <span class="title"><?=$this->lang->line('pending_family');?></span>

                                        </a>

                                    </li>

                                    <li class="nav-item <?php if($currentpage == 'Manage_family') echo "active" ?>">

                                        <a href="<?=base_url('Manage_family')?>" class="nav-link ">

                                            <i class="fa fa-users"></i>

                                            <span class="title"><?=$this->lang->line('manage_family');?></span>

                                        </a>

                                    </li>

                                     

                                </ul>

                            </li>



                            <li class="nav-item <?php if($currentpage == 'Manage_matrimony' || $currentpage == 'Pending_matrimony') echo "active open" ?>">

                                <a href="javascript:;" class="nav-link nav-toggle">

                                    <i class="fa fa-heart"></i>

                                    <span class="title"><?=$this->lang->line('matrimony');?></span>

                                    <span class="arrow"></span>

                                </a>

                                <ul class="sub-menu">

                                    <li class="nav-item <?php if($currentpage == 'Pending_matrimony') echo "active" ?>">

                                        <a href="<?=base_url('Pending_matrimony');?>" class="nav-link ">

                                            <i class="fa fa-heart"></i>

                                            <span class="title"><?=$this->lang->line('pending_matrimony');?></span>

                                        </a>

                                    </li>

                                    <li class="nav-item <?php if($currentpage == 'Manage_matrimony') echo "active" ?>">

                                        <a href="<?=base_url('Manage_matrimony');?>" class="nav-link ">

                                            <i class="fa fa-heart"></i>

                                            <span class="title"><?=$this->lang->line('manage_matrimony');?></span>

                                        </a>

                                    </li>

                                </ul>

                            </li>                            

                                  

                            <li class="nav-item <?php if($currentpage == 'Pending_memorial' || $currentpage == 'Manage_memorial') 

                            echo "active open" ?>">

                                <a href="javascript:;" class="nav-link nav-toggle">

                                    <i class="fa fa-file-photo-o"></i>

                                    <span class="title"><?=$this->lang->line('memorial');?></span>

                                    <span class="arrow"></span>

                                </a>

                                <ul class="sub-menu">

                                    <li class="nav-item <?php if($currentpage == 'Pending_memorial') echo "active" ?>">

                                        <a href="<?=base_url('Pending_memorial');?>" class="nav-link ">

                                            <i class="fa fa-file-photo-o"></i>

                                            <span class="title"><?=$this->lang->line('pending_memorial');?></span>

                                        </a>

                                    </li>

                                    <li class="nav-item <?php if($currentpage == 'Manage_memorial') echo "active" ?>">

                                        <a href="<?=base_url('Manage_memorial');?>" class="nav-link ">

                                            <i class="fa fa-file-photo-o"></i>

                                            <span class="title"><?=$this->lang->line('manage_memorial');?></span>

                                        </a>

                                    </li>

                                </ul>

                            </li> 



                             <li class="nav-item <?php if($currentpage == 'Pending_business' || $currentpage == 'Manage_business' || $currentpage == 'Business_config') 

                            echo "active open" ?>">

                                <a href="javascript:;" class="nav-link nav-toggle">

                                    <i class="fa fa-briefcase"></i>

                                    <span class="title"><?=$this->lang->line('business');?></span>

                                    <span class="arrow"></span>

                                </a>

                                <ul class="sub-menu">

                                    <li class="nav-item <?php if($currentpage == 'Business_config') 

                                    echo "active" ?>">

                                        <a href="<?=base_url('Business_config');?>" class="nav-link ">

                                            <i class="fa fa-gear"></i>

                                            <span class="title"><?=$this->lang->line('business_config');?></span>

                                        </a>

                                    </li>

                                    <li class="nav-item <?php if($currentpage == 'Pending_business') 

                                    echo "active" ?>">

                                        <a href="<?=base_url('Pending_business');?>" class="nav-link ">

                                            <i class="fa fa-briefcase"></i>

                                            <span class="title"><?=$this->lang->line('pending_business');?></span>

                                        </a>

                                    </li>

                                    <li class="nav-item <?php if($currentpage == 'Manage_business') 

                                    echo "active" ?>">

                                        <a href="<?=base_url('Manage_business');?>" class="nav-link ">

                                            <i class="fa fa-briefcase"></i>

                                            <span class="title"><?=$this->lang->line('manage_business');?></span>

                                        </a>

                                    </li>

                                </ul>

                            </li>      



                            <li class="nav-item <?php if($currentpage == 'Slider_config' || $currentpage == 'Pending_slider' || $currentpage == 'Manage_slider') echo "active open" ?>">

                                <a href="javascript:;" class="nav-link nav-toggle">

                                    <i class="fa fa-gear"></i>

                                    <span class="title"><?=$this->lang->line('slider_setting');?></span>

                                    <span class="arrow"></span>

                                </a>

                                <ul class="sub-menu">

                                    <li class="nav-item <?php if($currentpage == 'Slider_config') echo "active" ?>">

                                        <a href="<?=base_url('Slider_config');?>" class="nav-link ">

                                            <i class="fa fa-gear"></i>

                                            <span class="title"><?=$this->lang->line('slider_config');?></span>

                                        </a>

                                    </li>

                                    <li class="nav-item <?php if($currentpage == 'Pending_slider') echo "active" ?>">

                                        <a href="<?=base_url('Pending_slider');?>" class="nav-link">

                                            <i class="fa fa-gear"></i>

                                            <span class="title">Pending Slider</span>

                                        </a>

                                    </li>                                

                                    <li class="nav-item <?php if($currentpage == 'Manage_slider') echo "active" ?>">

                                        <a href="<?=base_url('Manage_slider');?>" class="nav-link">

                                            <i class="fa fa-gear"></i>

                                            <span class="title"><?=$this->lang->line('manage_slider');?></span>

                                        </a>

                                    </li>

                                </ul>

                            </li>

                    

                            <li class="nav-item <?php if($currentpage == 'Settings') echo "active open" ?>">

                                <a href="javascript:;" class="nav-link nav-toggle">

                                    <i class="fa fa-gear"></i>

                                    <span class="title"><?=$this->lang->line('settings');?></span>

                                    <span class="arrow"></span>

                                </a>

                                <ul class="sub-menu">

                                    <li class="nav-item <?php if($currentpage == 'Settings') echo "active" ?>">

                                        <a href="<?=base_url('Settings');?>" class="nav-link ">

                                            <i class="fa fa-gear"></i>

                                            <span class="title"><?=$this->lang->line('all_settings');?></span>

                                        </a>

                                    </li>

                                

                                    <li class="nav-item">

                                        <a href="<?=base_url('Common/all_backup');?>" target="_blank"

                                         class="nav-link">

                                            <i class="fa fa-download"></i>

                                            <span class="title">

                                              <?=$this->lang->line('download_database');?>

                                            </span>

                                        </a>

                                    </li>

                                </ul>



                            </li>



                        </ul>

                        <!-- END SIDEBAR MENU -->

                        <!-- END SIDEBAR MENU -->

                    </div>

                    <!-- END SIDEBAR -->

                </div>

            <!-- END SIDEBAR -->