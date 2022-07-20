<?php $__env->startSection('title', 'BOPLBF - Article'); ?>

<?php $__env->startSection('csscustom'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/daterangepicker.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Add your site or application content here -->
  <main>
  	<section id="home-destination" class="home-extra article"></section>

  	<section class="content" id="articles">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4"><?php echo e(__('tourism.announcement')); ?></h2>
  				<small>Everything around Labuan Bajo</small>
  			</div>

  			<div class="row mb-5 justify-content-center">
        <?php $__currentLoopData = $announcement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-12 col-md-6 col-lg-4">
						<div class="card article">
							<img src="<?php echo e(asset('uploads/TourismAnnouncement/'.$a->image.'')); ?>" class="card-img-top" alt="thumbnail">
							<div class="card-body">
								<h3 class="card-title mb-3"><?php echo e(str_limit(strip_tags($a->judul), 32)); ?></h3>
								<p class="card-text"><?php echo e(str_limit(strip_tags($a->deskripsi), 180)); ?></p>
								<div class="text-center mt-4">
									<a href="<?php echo e(url('tourism/announcement/'.$a->slug.'')); ?>" class="btn btn-block btn-outline-primary"><?php echo e(__('tourism.read_more')); ?></a>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

  			<div class="pagination-bx clearfix text-center col-md-12">
          <?php echo e($announcement->render()); ?>

				</div>
  		</div>
    </section>
    
    <?php echo $__env->make('tourism.include.plan_trip', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscustom'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('tourism.layouts.frontend_pages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>