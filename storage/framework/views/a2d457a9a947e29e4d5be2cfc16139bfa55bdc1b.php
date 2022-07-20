<?php $__env->startSection('title', 'BOPLBF - Mission and Vision Statement'); ?>

<?php $__env->startSection('content'); ?>

  <!-- Add your site or application content here -->
  <main id="bop">
  	<section id="home-destination" class="home-extra article"></section>

  	<section class="content" id="articles">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4"><?php echo e(__('profile.vision')); ?></h2>
  			</div>
  			<section class="text-center mb-5">
          <?php if(isset($data->vision)): ?>
            <?php echo $data->vision; ?>

          <?php endif; ?>
  			</section>

  			<div class="text-center mb-5">
  				<h2 class="mb-4"><?php echo e(__('profile.mission')); ?></h2>
  			</div>
  			<section class="text-center mb-5">
          <?php if(isset($data->mission)): ?>
            <?php echo $data->mission; ?>

          <?php endif; ?>  
        </section>

      </div>
      <?php if(isset($data->video_url)): ?>
        <div class="dlab-divider bg-gray-dark"></div>
        <h2>Video</h2>
        <iframe width="560" height="315" src="<?php echo $data->video_url; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
      <?php endif; ?>
  	</section>

  	<?php echo $__env->make('profile.include.contact', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscustom'); ?>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('profile.layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>