 BEGIN: Header-->
    <div class="header-navbar-shadow"></div>
    <nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top ">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon bx bx-menu"></i></a></li>
                        </ul>
                     
                    </div>
                    <ul class="nav navbar-nav float-right">
                        
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name"><?php echo e(Auth::user()->name); ?></span><span class="user-status text-muted">Superadmin</span></div><span><img class="round" src="<?php echo e(asset('admin_template/app-assets/images/portrait/small/avatar-s-11.jpg')); ?>" alt="avatar" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right pb-0">
                                <a class="dropdown-item" href="<?php echo e(route('admin.edit_profile.edit')); ?>"><i class="bx bx-user mr-50"></i> Edit Profile</a>
                                <div class="dropdown-divider mb-0"></div>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"><i class="bx bx-power-off mr-50"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="<?php echo e(route('admin.index')); ?>">
                        <div class="brand-logo"><img class="logo" src="<?php echo e(asset('admin_template/app-assets/images/logo/main-logo.png')); ?>" style="width: 42px; height: unset"/></div>
                        <h2 class="brand-text mb-0"><img src="<?php echo e(asset('admin_template/app-assets/images/logo/text-logo.png')); ?>" style="width: 120px"></h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="bx-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="">
                <!-- General Dashboard -->
                 <!-- <li class="<?php echo e(Request::is('admin-page') ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="bx bx-home-alt"></i><span class="menu-title" >Dashboard</span></a> -->
                    
                <!-- Start CMS Menu Web Toursim -->
                <li class=" navigation-header"><span>Tourism</span></li>
                    <li class="<?php echo e(Request::is('admin-page') || Request::is('admin-page/tourism/slider') || Request::is('admin-page/tourism/slider/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.t.slider')); ?>">
                            <i class="bx bx-images"></i><span class="menu-title">Slider Homepage</span>
                        </a>

                    </li>
                    <li class="<?php echo e(Request::is('admin-page/tourism/announcement') || Request::is('admin-page/tourism/announcement/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.t.pengumuman')); ?>">
                            <i class="bx bxs-megaphone"></i><span class="menu-title" >Announcement</span>
                        </a>
                        
                    </li>

                    <li class="nav-item"><a href="javascript:void(0);"><i class="bx bxs-landscape"></i><span class="menu-title">Labuan Bajo</span></a>
                        <ul class="menu-content">
                            <li class="<?php echo e(Request::is('admin-page/tourism/elb/destinasi') || Request::is('admin-page/tourism/elb/destinasi/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.t.elb.destinasi')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="eCommerce">Destination</span></a>
                            </li>
                            <li class="<?php echo e(Request::is('admin-page/tourism/elb/event') || Request::is('admin-page/tourism/elb/event/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.t.elb.event')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Analytics">Event</span></a>
                            </li>
                            <li class="<?php echo e(Request::is('admin-page/tourism/elb/art-craft') || Request::is('admin-page/tourism/elb/art-craft/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.t.elb.art')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Analytics">Art & Craft</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item"><a href="javascript:void(0);"><i class="bx bxs-image-alt"></i><span class="menu-title">Beyond Labuan Bajo</span></a>
                        <ul class="menu-content">
                            <li class="<?php echo e(Request::is('admin-page/tourism/blb/destinasi') || Request::is('admin-page/tourism/blb/destinasi/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.t.blb.destinasi')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="eCommerce">Destination</span></a>
                            </li>
                            <li class="<?php echo e(Request::is('admin-page/tourism/blb/event') || Request::is('admin-page/tourism/blb/event/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.t.blb.event')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Analytics">Event</span></a>
                            </li>
                            <li class="<?php echo e(Request::is('admin-page/tourism/blb/art-craft') || Request::is('admin-page/tourism/blb/art-craft/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.t.blb.art')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Analytics">Art & Craft</span></a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="<?php echo e(Request::is('admin-page/tourism/culinary') || Request::is('admin-page/tourism/culinary/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.t.culinary')); ?>">
                            <i class="bx bxs-dish"></i><span class="menu-title" >Culinary</span>
                        </a>
                        
                    </li>

                    <!-- <li class="<?php echo e(Request::is('admin-page/tourism/tour-package') || Request::is('admin-page/tourism/tour-package/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.t.pyt')); ?>">
                            <i class="bx bxs-map-alt"></i><span class="menu-title" >Travel Plan Package</span>
                        </a>
                        
                    </li> -->

                    <li class="<?php echo e(Request::is('admin-page/tourism/informasi-visa') || Request::is('admin-page/tourism/informasi-visa/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.t.iv')); ?>">
                            <i class="bx bxs-id-card"></i><span class="menu-title" >Informasi Visa</span>
                        </a>
                        
                    </li>

                    <li class="<?php echo e(Request::is('admin-page/tourism/region') || Request::is('admin-page/tourism/region/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.t.region')); ?>">
                            <i class="bx bxs-megaphone"></i><span class="menu-title" >Region</span>
                        </a>
                        
                    </li>
                    <li class="<?php echo e(Request::is('admin-page/tourism/UGC') || Request::is('admin-page/tourism/UGC/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.t.ugc')); ?>">
                            <i class="bx bxs-image-alt"></i><span class="menu-title">User Generate Content</span>
                        </a>
                    </li>

                    <li class="<?php echo e(Request::is('admin-page/tourism/rumah-produksi') || Request::is('admin-page/tourism/rumah-produksi/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.t.rumah')); ?>">
                            <i class="bx bxs-building-house"></i><span class="menu-title">Rumah Produksi</span>
                        </a>
                    </li>

                    <li class="<?php echo e(Request::is('admin-page/tourism/resto') || Request::is('admin-page/tourism/resto/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.t.resto')); ?>">
                            <i class="bx bxs-institution"></i><span class="menu-title">Restaurant</span>
                        </a>
                    </li>
                    
                        
                            
                            
                            
                            
                            
                            
                        
                    

                    
                <!-- END CMS Menu Web Toursim -->
                
                <!-- Start CMS Menu Web Industri & Investment -->
                <li class=" navigation-header"><span>Industri & Investment</span></li>
                
                    <li class="<?php echo e(Request::is('admin-page/industri-investment/slider') || Request::is('admin-page/industri-investment/slider/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.inv.slider')); ?>">
                            <i class="bx bx-images"></i><span class="menu-title">Slider Homepage</span>
                        </a>

                    </li>

                    <li class="<?php echo e(Request::is('admin-page/industri-investment/investment-opportunity') || Request::is('admin-page/industri-investment/investment-opportunity/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.inv.hn')); ?>">
                            <i class="bx bx-news"></i><span class="menu-title" >Investment<br>Opportunity</span>
                        </a>
                    </li>

                    <!--
                    <li class="<?php echo e(Request::is('admin-page/industri-investment/achievement') || Request::is('admin-page/industri-investment/achievement/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.inv.achievement')); ?>">
                            <i class="bx bxs-trophy"></i><span class="menu-title" >Achievement Highlights</span>
                        </a>
                        
                    </li>
                    
                    <li class="nav-item"><a href="javascript:void(0);"><i class="bx bx-chart"></i><span class="menu-title">Investment<br>Opportunity</span></a>
                        <ul class="menu-content">
                            <li class="<?php echo e(Request::is('admin-page/industri-investment/lahan') || Request::is('admin-page/industri-investment/lahan/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.inv.lahan')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="eCommerce">Informasi Lahan</span></a>
                            </li>
                            <li class="<?php echo e(Request::is('admin-page/industri-investment/kawasan-otorita') || Request::is('admin-page/industri-investment/kawasan-otorita/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.inv.kawasan_otorita')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Analytics">Kawasan Otorita</span></a>
                            </li>
                        </ul>
                    </li>-->

                    
                    <li class="nav-item"><a href="javascript:void(0);"><i class="bx bxs-bar-chart-square"></i><span class="menu-title">Factsheet And Data</span></a>
                        <ul class="menu-content">
                            <li class="<?php echo e(Request::is('admin-page/industri-investment/komoditas-utama') || Request::is('admin-page/industri-investment/komoditas-utama/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.inv.komoditas_utama')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="eCommerce">Komoditas Utama</span></a>
                            </li>
                            <li class="<?php echo e(Request::is('admin-page/industri-investment/ragam-sektor-industri') || Request::is('admin-page/industri-investment/ragam-sektor-industri/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.inv.sektor_industri')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Analytics">Ragam Sektor Industri</span></a>
                            </li>
                            <li class="<?php echo e(Request::is('admin-page/industri-investment/benefit-resiko') || Request::is('admin-page/industri-investment/benefit-resiko/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.inv.benefit_resiko')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Analytics">Benefit & Resiko</span></a>
                            </li>
                        </ul>
                    </li>

                    
                    <li class="<?php echo e(Request::is('admin-page/industri-investment/how-to-invest') || Request::is('admin-page/industri-investment/how-to-invest/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.inv.how_to_invest')); ?>">
                            <i class="bx bx-chart"></i><span class="menu-title" >How to Invest</span>
                        </a>
                    </li>

                    <!--
                    <li class="nav-item"><a href="javascript:void(0);"><i class="bx bx-image-alt"></i><span class="menu-title">Infografis Legal Guide<br>untuk Invest</span></a>
                        <ul class="menu-content">
                            <li class="<?php echo e(Request::is('admin-page/industri-investment/infografis-kawasan-otorita') || Request::is('admin-page/industri-investment/infografis-kawasan-otorita/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.inv.infografis_kawasan_otorita')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="eCommerce">Kawasan Otorita</span></a>
                            </li>
                            <li class="<?php echo e(Request::is('admin-page/industri-investment/infografis-kawasan-flores') || Request::is('admin-page/industri-investment/infografis-kawasan-flores/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.inv.infografis_kawasan_flores')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Analytics">Kawasan Flores/NTT</span></a>
                            </li>
                        </ul>
                    </li>
                    -->

                    <li class="<?php echo e(Request::is('admin-page/industri-investment/business-insiders') || Request::is('admin-page/industri-investment/business-insiders/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.inv.business_insiders')); ?>">
                            <i class="bx bxs-comment-detail"></i><span class="menu-title" >Business Insiders</span>
                        </a>
                        
                    </li>

                    <li class="nav-item"><a href="javascript:void(0);"><i class="bx bxs-contact"></i><span class="menu-title">Kontak</span></a>
                        <ul class="menu-content">
                            <li class="<?php echo e(Request::is('admin-page/industri-investment/kontak-invest') || Request::is('admin-page/industri-investment/kontak-invest/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.inv.kontak_invest')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="eCommerce">To Invest</span></a>
                            </li>
                            <li class="<?php echo e(Request::is('admin-page/industri-investment/kontak-request') || Request::is('admin-page/industri-investment/kontak-request/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.inv.kontak_request')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Analytics">To Request</span></a>
                            </li>
                        </ul>
                    </li>
                <!-- END CMS Menu Web Industri & Investment -->

                <!-- Start CMS Menu Web LBFTA -->
                <li class=" navigation-header"><span>Labuan Bajo Flores<br>Tourism Authority</span></li>
                    <li class="<?php echo e(Request::is('admin-page/lbfta/slider') || Request::is('admin-page/lbfta/slider/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.lbfta.slider')); ?>">
                            <i class="bx bx-images"></i><span class="menu-title">Slider Homepage</span>
                        </a>
                    </li>
                    <li class="<?php echo e(Request::is('admin-page/lbfta/headline-news') || Request::is('admin-page/lbfta/headline-news/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.lbfta.hn')); ?>">
                            <i class="bx bx-news"></i><span class="menu-title" >Headline News</span>
                        </a>
                        
                    </li>
                    <!--
                    <li class="<?php echo e(Request::is('admin-page/lbfta/achievement') || Request::is('admin-page/lbfta/achievement/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.lbfta.achievement')); ?>">
                            <i class="bx bxs-trophy"></i><span class="menu-title" >Achievement Highlights</span>
                        </a>
                        
                    </li>
                    -->
                    <li class="<?php echo e(Request::is('admin-page/lbfta/program') || Request::is('admin-page/lbfta/program/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.lbfta.program')); ?>">
                            <i class="bx bxs-award"></i><span class="menu-title" >Programs</span>
                        </a>
                        
                    </li>
                    <li class="nav-item"><a href="javascript:void(0);"><i class="bx bxs-id-card"></i><span class="menu-title">Profile</span></a>
                        <ul class="menu-content">
                            <li class="<?php echo e(Request::is('admin-page/lbfta/about') || Request::is('admin-page/lbfta/about/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.lbfta.about')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="eCommerce">About BOPLBF</span></a>
                            </li>
                            <li class="<?php echo e(Request::is('admin-page/lbfta/mission-vision') || Request::is('admin-page/lbfta/mission-vision/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.lbfta.mission_vision')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Analytics">Mission & Vision</span></a>
                            </li>
                            <li class="<?php echo e(Request::is('admin-page/lbfta/organization-structure') || Request::is('admin-page/lbfta/organization-structure/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.lbfta.org')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Analytics">Organization<br>Structure/Position</span></a>
                            </li>
                            <li class="<?php echo e(Request::is('admin-page/lbfta/duties') || Request::is('admin-page/lbfta/duties/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.lbfta.duties')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Analytics">Respective Duties<br>And Functions</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php echo e(Request::is('admin-page/lbfta/news-release') || Request::is('admin-page/lbfta/news-release/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.lbfta.news_release')); ?>">
                            <i class="bx bx-news"></i><span class="menu-title" >News Release</span>
                        </a>
                        
                    </li>
                    <li class="<?php echo e(Request::is('admin-page/lbfta/report') || Request::is('admin-page/lbfta/report/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.lbfta.report')); ?>">
                            <i class="bx bxs-report"></i><span class="menu-title" >Report</span>
                        </a>
                        
                    </li>
                    <li class="<?php echo e(Request::is('admin-page/lbfta/faq') || Request::is('admin-page/lbfta/faq/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.lbfta.faq')); ?>">
                            <i class="bx bxs-chat"></i><span class="menu-title">FAQ</span>
                        </a>
                    </li>
                    <li class="<?php echo e(Request::is('admin-page/lbfta/officials') || Request::is('admin-page/lbfta/officials/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.lbfta.officials')); ?>">
                            <i class="bx bxs-user"></i><span class="menu-title">Officials</span>
                        </a>
                    </li>
                    <li class="nav-item"><a href="javascript:void(0);"><i class="bx bxs-contact"></i><span class="menu-title">Kontak</span></a>
                        <ul class="menu-content">
                            <!--
                            <li class="<?php echo e(Request::is('admin-page/lbfta/kontak-inquiry') || Request::is('admin-page/lbfta/kontak-inquiry/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.lbfta.kontak_inquiry')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="eCommerce">Inquiry</span></a>
                            </li>
                            -->
                            <li class="<?php echo e(Request::is('admin-page/lbfta/kontak-form') || Request::is('admin-page/lbfta/kontak-form/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.lbfta.kontak_form')); ?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Analytics">Kontak Forms</span></a>
                            </li>
                        </ul>
                    </li>

                 <!-- END CMS Menu Web LBFTA -->
                


                <!-- Start CMS Menu Layout -->
                <li class=" navigation-header"><span>Layout</span></li>
                    <li class="<?php echo e(Request::is('admin-page/layout/footer') || Request::is('admin-page/layout/footer/*') ? 'active' : ''); ?> nav-item">
                        <a href="<?php echo e(route('admin.layout.footer')); ?>">
                            <i class="bx bx-images"></i><span class="menu-title">Footer</span>
                        </a>

                    </li>
                </li>
                <!-- END CMS Menu Web Industri & Investment -->
           
           
            </ul>
        </div>
    </div>
    <!-- END: Main Menu