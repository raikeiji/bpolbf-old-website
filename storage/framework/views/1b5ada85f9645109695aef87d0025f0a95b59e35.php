<?php $__env->startSection('title', 'BOPLBF - Officials'); ?>

<?php $__env->startSection('csscustom'); ?>
    <style>
        .pagination li.active span {
			color: #fff;
		}
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


      <!-- Add your site or application content here -->
  <main id="bop">
  	<section id="home-destination" class="home-extra article"></section>

  	<section class="content" id="articles">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4"><?php echo e(__('profile.official')); ?></h2>
  			</div>

  			<section>
  				<ul class="list-unstyled official-list">
                    <?php $__currentLoopData = $officials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $official): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <div class="card mb-3">
                                <div class="card-body p-0">
                                    <div class="row news-item d-flex">
                                        <div class="col-12 col-lg-4">
                                            <img src="<?php echo e(asset('uploads/ProfileOfficials/'.$official->image.'')); ?>" alt="photo" class="object-fit" width="120" height="140">
                                        </div>
                                        <div class="col-12 col-lg-8 p-4 pl-md-2">
                                                <h4 class="no-line mb-1"><?php echo e($official->nama); ?></h4>
                                                <span class="text-muted"><?php echo e($official->jabatan); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($officials->isEmpty()): ?>
                        <div class="text-center">
                            <h3><?php echo e(__('profile.notFound')); ?></h3>
                        </div>
                    <?php endif; ?>
  				</ul>
  			</section>
  		</div>
  	</section>

  	<?php echo $__env->make('profile.include.contact', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscustom'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('profile.layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>