<?php $__env->startSection('title', 'BOPLBF - Restaurant'); ?>

<?php $__env->startSection('content'); ?>
	<!-- Content -->
	<div id="home" class="page-content bg-white">
		<!-- inner page banner -->
		<div class="dlab-bnr-inr overlay-black-dark banner-content " style="background-image:url('<?php echo e(asset('images/pulau_padar.jpg')); ?>');">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white"><?php echo e(__('tourism.restaurant')); ?></h1>
					<!-- Breadcrumb row -->
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
		<!-- inner page banner END -->
		<div class="content-area">
            <div class="container max-w900">
                <!-- blog start -->
                <div class="blog-post blog-single">
                    <div class="dlab-post-title">
                        <h1 class="post-title m-b0" style="margin-bottom: 0px;"><a href="javascript:void(0);"><?php echo $resto->nama; ?></a></h1>
                    </div>
                    <div class="dlab-post-meta m-t0">
                        <ul>
                            <li id="social" style="color:#000!important;">
                            	<a href="javascript:void(0);"><button class="site-button facebook m-r5 circle-sm" type="button"><i class="fa fa-facebook" style="color:#fff!important;"></i></button>Facebook</a></li>
							<li id="social" style="color:#000!important;">
								<a href="javascript:void(0);">
									<button class="site-button instagram m-r5 circle-sm" type="button">
										<i class="fa fa-instagram" style="color:#fff!important;"></i></button>Instagram</a></li>
							<li id="social" style="color:#000!important;">
								<a href="javascript:void(0);">
									<button class="site-button twitter m-r5 circle-sm" type="button"><i class="fa fa-twitter" style="color:#fff!important;"></i></button>Twitter</a></li>
                        </ul>
                    </div>
					
                    <div class="dlab-post-text">
                        <?php echo $resto->deskripsi; ?>

                        <div class="dlab-divider bg-gray-dark"></div>
					</div>

					<div class="dlab-post-text">
                        <h2><?php echo e(__('tourism.contact')); ?></h2>
                       	<div class="section-full p-t50 p-b20 bg-primary text-white overlay-primary-dark footer-info-bar">
							<div class="container">
								<div class="row">
									<div class="col-lg-4 col-md-4 col-sm-12 m-b30">
										<div class="icon-bx-wraper bx-style-1 p-a20 radius-sm br-col-w1">
											<div class="icon-content">
												<h5 class="dlab-tilte">
													<span class="icon-sm"><i class="ti-location-pin"></i></span> 
													<?php echo e(__('tourism.address')); ?>

												</h5>
												<p class="op7"><?php echo e($resto->alamat); ?></p>
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-12 m-b30">
										<div class="icon-bx-wraper bx-style-1 p-a20 radius-sm br-col-w1">
											<div class="icon-content">
												<h5 class="dlab-tilte">
													<span class="icon-sm"><i class="ti-alarm-clock"></i></span> 
													<?php echo e(__('tourism.hours')); ?>

												</h5>
												<p class="m-b0 op7"><?php echo e($resto->jam_buka); ?></p>
												<!-- <p class="op7">Sunday - Close</p> -->
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-12 m-b30">
										<div class="icon-bx-wraper bx-style-1 p-a20 radius-sm br-col-w1">
											<div class="icon-content">
												<h5 class="dlab-tilte">
													<span class="icon-sm"><i class="ti-mobile"></i></span> 
													<?php echo e(__('tourism.phone')); ?>

												</h5>
												<p class="m-b0 op7"><?php echo e($resto->telepon); ?></p>
												<!-- <p class="op7">Phone : +0 1234 5678 90</p> -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
                    </div>
                    
                </div>
                
                <!-- blog END -->
            </div>
        </div>
		<!-- END Container -->
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscustom'); ?>
	<script type="text/javascript" src="https://widgets.thereviewsplace.com/grid.js" async></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('tourism.layouts.frontend_pages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>