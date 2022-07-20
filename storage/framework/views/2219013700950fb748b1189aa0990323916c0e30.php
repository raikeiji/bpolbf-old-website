<?php $__env->startSection('title', 'BOPLBF - About'); ?>

<?php $__env->startSection('content'); ?>  
    <!-- Add your site or application content here -->
    <main id="bop">
  	<section id="home-destination" class="home-extra article"></section>

  	<section class="content" id="articles">
  		<div class="container">
  			<div class="text-center mb-5">
				<h1 class="mb-4"><?php echo e(__('profile.about_us')); ?></h2>
				<?php if(isset($data->judul)): ?>
					<h3 class="mb-4"><?php echo $data->judul; ?></h3>
				<?php endif; ?>
  			</div>

  			<section>
  				<div class="row">
  					<div class="col-12 col-lg-12">
						<?php if(isset($data->deskripsi)): ?>
							<?php echo $data->deskripsi; ?>

						<?php endif; ?>
						<?php if(isset($data->video_url)): ?>
							<div class="dlab-divider bg-gray-dark"></div>
							<h2 style="margin-top:80px;text-align: center;">Video</h2>
							<iframe width="560" height="315"  style="margin: 0 auto;display:block" src="<?php echo $data->video_url; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
						<?php endif; ?>
  					</div>
  				</div>
  			</section>
  		</div>
  	</section>

  	<?php echo $__env->make('profile.include.contact', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscustom'); ?>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('profile.layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>