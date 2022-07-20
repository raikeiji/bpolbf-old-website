<?php $__env->startSection('title', 'BOPLBF - Organization Structure/Position'); ?>

<?php $__env->startSection('content'); ?>
  <!-- Add your site or application content here -->
  <main id="bop">
  	<section id="home-destination" class="home-extra article"></section>

  	<section class="content" id="articles">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4"><?php echo e(__('profile.organization')); ?></h2>
  			</div>

  			<section>
          <?php if(isset($data->judul)): ?>
            <h1 class="post-title m-b0" style="margin-bottom: 0px;text-align:center"><a href="javascript:void(0);"><?php echo $data->judul; ?></a></h1>
          <?php endif; ?>
          <?php if(isset($data->deskripsi)): ?>
            <?php echo $data->deskripsi; ?>

          <?php endif; ?>
          <br></br>
          <div class="dlab-box">
            <?php if(isset($data->image)): ?>
              <h2 style="margin-top:80px;text-align: center;"><?php echo e(__('profile.pictureTitle')); ?></h2>
              <img src="<?php echo e(asset('uploads/ProfileOrg/'.$data->image.'')); ?>" alt="Chart" class="w-100"> 
            <?php endif; ?>
          </div>
          <br></br>
          <div class="dlab-box">
            <?php if(isset($data->image_2)): ?>
              <h2 style="margin-top:80px;text-align: center;"><?php echo e(__('profile.pictureSO')); ?></h2>
              <img src="<?php echo e(asset('uploads/ProfileOrg/'.$data->image_2.'')); ?>" alt="Chart" class="w-100">
            <?php endif; ?>
          </div>
          <?php if(isset($data->video_url)): ?>
            <div class="dlab-divider bg-gray-dark"></div>
            <h2 style="margin-top:80px;text-align: center;"><?php echo e(__('profile.video')); ?></h2>
            <iframe width="560" height="315" src="<?php echo $data->video_url; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
          <?php endif; ?>
  			</section>
  		</div>
  	</section>
    <?php echo $__env->make('profile.include.contact', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscustom'); ?>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('profile.layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>