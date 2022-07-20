<?php $__env->startSection('title', 'BOPLBF - Information'); ?>

<?php $__env->startSection('content'); ?>
  <!-- Add your site or application content here -->
  <main>
    <section id="home-destination" class="home-extra"></section>
    <section class="content" id="destinations">
        <div class="container">
          <div class="text-center mb-5">
            <h1><?php echo e(__('tourism.visaInformation')); ?></h1>
            <h4 class="mb-4"><?php echo e($info -> judul); ?></h4>
          </div>
          
          <div>
            <?php echo $info -> deskripsi; ?>

          </div>
        </div>
    </section>
      
      <?php echo $__env->make('tourism.include.plan_trip', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscustom'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('tourism.layouts.frontend_pages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>