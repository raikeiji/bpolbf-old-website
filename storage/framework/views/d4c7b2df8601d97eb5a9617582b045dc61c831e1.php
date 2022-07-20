<?php $__env->startSection('title', 'BOPLBF - Detail Event'); ?>

<?php $__env->startSection('content'); ?>

<!-- Add your site or application content here -->
<main>
  	<section id="home-destination" class="home-extra event"></section>

  	<section class="content" id="events">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4"><?php echo e(__('tourism.detailEvent')); ?> - <?php echo $event->judul; ?></h2>
				<h4 class="no-line">25 Sep 2020, 09:00 WITA - 25 Sep 2020, 16:00 WITA</h4>
			</div>

			<div class="row">
  				<div class="col-12 col-md-4 mb-5">
  					<img src="<?php echo e(asset('uploads/TourismEvent/'.$tipe.'/'.$event->id.'/'.$event->thumbnail.'')); ?>"" class="h-100 w-100 object-fit" alt="sample">
  				</div>
  				<div class="col-12 col-md-8 mb-5">
					<?php echo $event->deskripsi; ?>

				</div>
  			</div>
        </div>
    </section>

    <?php echo $__env->make('tourism.include.plan_trip', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscustom'); ?>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('tourism.layouts.frontend_pages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>