<?php $__env->startSection('title', 'BOPLBF - Calendar Event'); ?>

<?php $__env->startSection('csscustom'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/daterangepicker.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Add your site or application content here -->
<main>
  	<section id="home-destination" class="home-extra event"></section>

  	<section class="content" id="events">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4"><?php echo e(__('tourism.calendar')); ?></h2>
  				<small>Witness the customs and festivities of the locals</small>
  			</div>

  			<div class="row mb-5 justify-content-center">
                <?php $__currentLoopData = $event; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card event-item">
                            <?php
                            if($a->kategori=="labuan"){
                                $tipe="ELB";
                            } else {
                                $tipe="BLB";
                            }
                            ?>
                            <img src="<?php echo e(asset('uploads/TourismEvent/'.$tipe.'/'.$a->id.'/'.$a->thumbnail.'')); ?>" class="card-img-top object-fit" alt="<?php echo e($a->judul); ?>" height="240">
                            <div class="date">
                                <span><?php echo $a->tanggal; ?>

                                </span>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title mb-3 p-0"><?php echo e($a->judul); ?></h3>
                                <small>25 Sep 2020, 09:00 WITA - 25 Sep 2020, 16:00 WITA</small>
                                
                                <div class="text-center mt-4">
                                    <a href="<?php echo e(url('tourism/detail-event/'.$a->slug.'')); ?>" class="btn btn-block btn-outline-primary">Check event</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
              

            <div class="pagination-bx clearfix text-center col-md-12">
                <?php echo e($event->render()); ?>

			</div>
  		</div>
      </section>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscustom'); ?>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('tourism.layouts.frontend_pages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>