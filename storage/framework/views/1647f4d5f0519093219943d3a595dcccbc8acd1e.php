<?php $__env->startSection('title', 'BOPLBF - Report'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Add your site or application content here -->
    <main id="bop">
  	<section id="home-destination" class="home-extra article"></section>

  	<section class="content" id="articles">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4"><?php echo $report->judul; ?></h2>
  				<span>Created in <?php echo $report->date; ?></span>
  			</div>

  			<section class="text-center">
  				<svg class="bi" width="64" height="64" fill="currentColor">
        		<use xlink:href="<?php echo e(asset('assets/icons/bootstrap-icons.svg#file-earmark-zip')); ?>"/>
        	</svg>
  				<a href="<?php echo $report->file_url; ?>" target="_blank" class="btn btn-lg btn-primary">
  					<svg class="bi" width="20" height="20" fill="currentColor">
          		<use xlink:href="<?php echo e(asset('assets/icons/bootstrap-icons.svg#download')); ?>"/>
          	</svg> <?php echo e(__('profile.download')); ?>

  				</a>
  			</section>
  		</div>
  	</section>

  	<?php echo $__env->make('profile.include.contact', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscustom'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('profile.layouts.frontend_pages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>