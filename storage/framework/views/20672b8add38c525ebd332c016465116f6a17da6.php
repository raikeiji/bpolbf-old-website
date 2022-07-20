<?php $__env->startSection('title', 'BOPLBF - Itinerary'); ?>

<?php $__env->startSection('csscustom'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/daterangepicker.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Add your site or application content here -->
<main>
  <section id="home-destination" class="home-extra"></section>

  <section class="content" id="destinations">
      <div class="container">
        <div class="text-center mb-5">
          <h2 class="mb-4">Itinerary</h2>
        </div>
        
        <div class="row">
          <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 col-md-6 col-lg-4">
              <div class="card destination" onclick="javascript:void(0)">
                <a href="<?php echo e(url('tourism/package/'.$package->slug.'')); ?>"><img src="<?php echo e(asset('uploads/TourismPackage/'.$package->id.'/'.$package->thumbnail.'')); ?>" class="card-img-top"></a>
                <div class="card-body">
                  <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($tag->id_relasi == $package->id): ?>
                      <h5 class="mb-2 pb-0"><span class="badge bg-primary"><?php echo e($tag->namaTag->nama_kategori_id); ?></span></h5>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                  <h3 class="card-title mt-3 mb-2 pb-0"><?php echo e($package->judul); ?></h3>
                  <p class="card-text"><?php echo e(str_limit(strip_tags($package->deskripsi), 180)); ?></p>
                  <a href="<?php echo e(url('tourism/package/'.$package->slug.'')); ?>" class="btn btn-primary"><?php echo e(__('tourism.read_more')); ?></a>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </section>
    
    <?php echo $__env->make('tourism.include.plan_trip', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscustom'); ?>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('tourism.layouts.frontend_pages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>