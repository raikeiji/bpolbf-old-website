<?php $__env->startSection('title', 'BOPLBF - Respective Duties and Functions'); ?>

<?php $__env->startSection('content'); ?>

    <!-- Add your site or application content here -->
  <main id="bop">
  	<section id="home-destination" class="home-extra article"></section>

  	<section class="content" id="articles">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4"><?php echo e(__('profile.respective')); ?></h2>
  			</div>

  			<section class="text-center">
          <?php if(isset($data->deskripsi)): ?>
            <?php echo $data->deskripsi; ?>

          <?php endif; ?>
        </section>
     
        <?php if(isset($data->video_url)): ?>
          <div class="dlab-divider bg-gray-dark"></div>
          <h2 style="margin-top:80px;text-align: center;">Video</h2>
          <div class="col-12 col-lg-12">
            <iframe width="560" height="315" style="margin: 0 auto;display:block" src="<?php echo $data->video_url; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
          </div>
        <?php endif; ?>
      
      </div>
  	</section>

  	<?php echo $__env->make('profile.include.contact', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </main>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscustom'); ?>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('profile.layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>