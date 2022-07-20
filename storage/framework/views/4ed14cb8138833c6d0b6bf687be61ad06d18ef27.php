
<!-- header -->
    <header class="site-header mo-left header navstyle1" style="height: 167.6px;">
        <div class="top-bar">
            <div class="container" style="padding-right: 0; padding-left: 0; margin-right: 0; margin-left: 0; max-width: none; margin-top: -5px;">
                <div class="d-flex justify-content align-items-center">
                <div class="alert alert-info no-radius" style="width: 100%; padding-left: 50px; padding-right: 50px;"><i class="fa fa-warning"></i> <?php echo e(__('header.covid19')); ?> <a href="<?php echo e(route('covid')); ?>"><?php echo e(__('header.covid19Button')); ?></a> <img src="<?php echo e(asset('images/bullet_red.png')); ?>" class="blink_me" style="margin-top: -3px;"></div>
                </div>
            </div>
            <div class="container">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="dlab-topbar-left">
                        <ul>
                            <li><a href="<?php echo e(route('tourism')); ?>"><?php echo e(__('header.tourism')); ?></a></li>
                            <li><a href="<?php echo e(route('investasi')); ?>"><?php echo e(__('header.invest')); ?></a></li>
                            <li><a href="<?php echo e(route('boplbf')); ?>"><?php echo e(__('header.authority')); ?></a></li>
                        </ul>
                    </div>
                    <div class="dlab-topbar-right">
                    
                    </div>
                </div>
            </div>
        </div>
        <!-- main header -->
        <div class="sticky-header main-bar-wraper navbar-expand-lg">
            <div class="main-bar clearfix ">
                <div class="container clearfix">
                    <!-- website logo -->
                    <div class="logo-header mostion">
                        <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('images/logo-boplbf3.png')); ?>" alt=""></a>
                    </div>
                    <!-- nav toggle button -->
                    <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <!-- Quik search -->
                    <div class="dlab-quik-search ">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                            <span id="quik-search-remove"><i class="ti-close"></i></span>
                        </form>
                    </div>
                    <!-- main nav -->
                    <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
                        <div class="logo-header d-md-block d-lg-none">
                            <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('images/logo-boplbf3.png')); ?>" alt=""></a>
                        </div>
                        <ul class="nav navbar-nav"> 
                            <li class="has-mega-menu"> <a href="<?php echo e(route('boplbf')); ?>"><?php echo e(__('header.home')); ?></a></li>
                            <li>
								<a href="#profile"><?php echo e(__('header.profile')); ?><i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="<?php echo e(route('boplbf.about')); ?>"><?php echo e(__('header.about')); ?></a></li>
									<li><a href="<?php echo e(route('boplbf.mission')); ?>"><?php echo e(__('header.mission')); ?></a></li>
									<li><a href="<?php echo e(route('boplbf.organization')); ?>"><?php echo e(__('header.organization')); ?></a></li>
									<li><a href="<?php echo e(route('boplbf.respective')); ?>"><?php echo e(__('header.respective')); ?></a></li>
								</ul>
							</li>
                            <li class="has-mega-menu"> <a href="<?php echo e(route('boplbf.program')); ?>"><?php echo e(__('header.program')); ?></a></li>
                            <li class="has-mega-menu"> <a href="<?php echo e(route('boplbf.officials')); ?>"><?php echo e(__('header.official')); ?></a></li>
                            <li class="has-mega-menu"> <a href="<?php echo e(route('boplbf.news')); ?>"><?php echo e(__('header.news')); ?></a></li>
                            <li class="has-mega-menu"> <a href="<?php echo e(route('boplbf.report')); ?>"><?php echo e(__('header.report')); ?></a></li>
                            <li class="has-mega-menu"> <a href="<?php echo e(route('boplbf.faq')); ?>"><?php echo e(__('header.faq')); ?></a></li>
                            <li class="has-mega-menu"> <a href="<?php echo e(route('boplbf')); ?>#contact"><?php echo e(__('header.contact')); ?></a></li>
                        </ul>
                        <div class="dlab-social-icon">
                            <ul>
                                <li><a class="site-button circle fa fa-facebook" href="javascript:void(0);"></a></li>
                                <li><a class="site-button  circle fa fa-twitter" href="javascript:void(0);"></a></li>
                                <li><a class="site-button circle fa fa-linkedin" href="javascript:void(0);"></a></li>
                                <li><a class="site-button circle fa fa-instagram" href="javascript:void(0);"></a></li>
                            </ul>
                        </div>      
                    </div>
                </div>
            </div>
        </div>
        <!-- main header END -->
    </header>
<!-- header END -->