<?php $__env->startSection('title', 'BOPLBF - '.$title.''); ?>

<?php $__env->startSection('content'); ?>

  <!-- Add your site or application content here -->
  <main>
  	<section id="home-destination" class="home-extra"></section>

  	<section class="content" id="destinations">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4"><?php echo e($title); ?></h2>
  			</div>
			
			<div class="row">
			<?php $__currentLoopData = $destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($destination->is_homepage == 1): ?>

				<div class="col-12 col-md-6 col-lg-4">
					<div class="card destination" onclick="javascript:void(0)">
						<?php if($destination->kategori == "labuan"): ?>
							<a href="<?php echo e(url('tourism/destination/'.$destination->slug.'')); ?>"><img alt="" src="<?php echo e(asset('uploads/TourismDestinasi/ELB/'.$destination->id_relasi.'/'.$destination->thumbnail.'')); ?>" class="card-img-top"></a> 
						<?php else: ?>
							<a href="<?php echo e(url('tourism/destination/'.$destination->slug.'')); ?>"><img alt="" src="<?php echo e(asset('uploads/TourismDestinasi/BLB/'.$destination->id_relasi.'/'.$destination->thumbnail.'')); ?>" class="card-img-top"></a> 
						<?php endif; ?>
						<div class="card-body">

							<!-- Category : <br> -->
							<div class="row">
							<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($tag->id_relasi == $destination->id_relasi): ?>
								<h5 class="mb-2 pb-0"><span class="badge bg-primary"><?php echo e($tag->namaTag->nama_kategori_id); ?></span></h5>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							
							<h3 class="card-title mt-3 mb-2 pb-0"><?php echo e($destination->judul); ?></h3>
							<p class="card-text"><?php echo e(str_limit(strip_tags($destination->deskripsi), 85)); ?></p>
							<a href="<?php echo e(url('tourism/destination/'.$destination->slug.'')); ?>" class="btn btn-primary"><?php echo e(__('tourism.read_more')); ?></a>
						</div>
					</div>
				</div>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php $__currentLoopData = $arts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $art): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($art->is_homepage == 1): ?>

				<div class="col-12 col-md-6 col-lg-4">
					<div class="card destination" onclick="javascript:void(0)">
						<?php if($art->kategori == "labuan"): ?>
							<a href="<?php echo e(url('tourism/artcraft/'.$art->slug.'')); ?>"><img alt="" src="<?php echo e(asset('uploads/TourismArtCraft/ELB/'.$art->id_relasi.'/'.$art->thumbnail.'')); ?>" class="card-img-top"></a> 
						<?php else: ?>
							<a href="<?php echo e(url('tourism/artcraft/'.$art->slug.'')); ?>"><img alt="" src="<?php echo e(asset('uploads/TourismArtCraft/BLB/'.$art->id_relasi.'/'.$art->thumbnail.'')); ?>" class="card-img-top"></a> 
						<?php endif; ?>
						<div class="card-body">

							<!-- Category : <br> -->
							<div class="row">
							<?php $__currentLoopData = $tagArts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($tag->id_relasi == $destination->id_relasi): ?>
								<h5 class="mb-2 pb-0"><span class="badge bg-primary"><?php echo e($tag->namaTag->nama_kategori_id); ?></span></h5>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							
							<h3 class="card-title mt-3 mb-2 pb-0"><?php echo e($art->judul); ?></h3>
							<p class="card-text"><?php echo e(str_limit(strip_tags($art->deskripsi), 85)); ?></p>
							<a href="<?php echo e(url('tourism/artcraft/'.$art->slug.'')); ?>" class="btn btn-primary"><?php echo e(__('tourism.read_more')); ?></a>
						</div>
					</div>
				</div>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php $__currentLoopData = $culinaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $culinary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($culinary->is_homepage == 1): ?>
				<div class="col-12 col-md-6 col-lg-4">
					<div class="card destination" onclick="javascript:void(0)">
						<a href="<?php echo e(url('tourism/culinary/'.$culinary->slug.'')); ?>"><img alt="" src="<?php echo e(asset('uploads/TourismCulinary/'.$culinary->id_relasi.'/'.$culinary->thumbnail.'')); ?>"></a> 
						
						<div class="card-body">

							<!-- Category : <br> -->
							<div class="row">
							<?php $__currentLoopData = $tagCulinarys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($tag->id_relasi == $destination->id_relasi): ?>
								<h5 class="mb-2 pb-0"><span class="badge bg-primary"><?php echo e($tag->namaTag->nama_kategori_id); ?></span></h5>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							
							<h3 class="card-title mt-3 mb-2 pb-0"><?php echo e($culinary->judul); ?></h3>
							<p class="card-text"><?php echo e(str_limit(strip_tags($culinary->deskripsi), 85)); ?></p>
							<a href="<?php echo e(url('tourism/culinary/'.$culinary->slug.'')); ?>" class="btn btn-primary"><?php echo e(__('tourism.read_more')); ?></a>
						</div>
					</div>
				</div>
				<?php endif; ?>
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