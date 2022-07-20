<?php $__env->startSection('title', 'BOPLBF - Destination'); ?>

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
  				<h2 id="title" class="mb-4"></h2>
  				<small>Dig deeper into the experiences in each destination</small>
  			</div>

  			<div class="row">
  				<div class="col mb-5 d-flex flex-wrap">
  					<div class="button-group mr-md-1">
  						<input type="checkbox" class="btn-check" id="btn-check-all" autocomplete="off">
							<label class="btn btn-outline-primary" for="btn-check-all">All</label>
						</div>
						<div class="button-group mx-1 ml-md-auto">
  						<input type="checkbox" class="btn-check" id="btn-check-nature" autocomplete="off">
							<label class="btn btn-outline-primary" for="btn-check-nature">Nature</label>
						</div>
						<div class="button-group mx-md-1">
							<input type="checkbox" class="btn-check" id="btn-check-leisure" autocomplete="off">
							<label class="btn btn-outline-primary" for="btn-check-leisure">Leisure</label>
						</div>
						<div class="button-group ml-md-1">
							<input type="checkbox" class="btn-check" id="btn-check-culture" autocomplete="off">
							<label class="btn btn-outline-primary" for="btn-check-culture">Culture</label>
  					</div>
  				</div>
  			</div>

  			<div class="row">
			<?php $__currentLoopData = $destination; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-12 col-md-6 col-lg-4">
					<div class="card destination" onclick="javascript:void(0)">
						<img src="<?php echo e(asset('uploads/TourismDestinasi/'.$tipe_destination.'/'.$a->id.'/'.$a->thumbnail.'')); ?>" class="card-img-top" alt="destination thumbnail">
						<div class="card-body">
						<?php $__currentLoopData = $a->tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<span class="badge bg-primary" style="margin-right:5px"><?php echo e($tag->nama_kategori_id); ?></span>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<h3 class="card-title mt-3 mb-2 pb-0"><?php echo e(str_limit(strip_tags($a->judul), 20)); ?></h3>
						<p class="card-text"><?php echo e(str_limit(strip_tags($a->deskripsi), 120)); ?></p>
						<a href="<?php echo e(url('tourism/destination/'.$a->slug.'')); ?>" class="btn btn-primary"><?php echo e(__('tourism.read_more')); ?></a>
						</div>
					</div>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>

  			<div class="pagination-bx clearfix text-center col-md-12">
          		<?php echo e($destination->render()); ?>

			</div>
  		</div>
    </section>
    
    <?php echo $__env->make('tourism.include.plan_trip', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscustom'); ?>
<script>
	function getUrlParameter(sParam) {
		var sPageURL = window.location.search.substring(1),
			sURLVariables = sPageURL.split('&'),
			sParameterName,
			i;

		for (i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split('=');

			if (sParameterName[0] === sParam) {
				return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
			}
		}
	};

	var kategori = getUrlParameter('kategori');
	if (kategori=="beyond"){
		$("#title").html("<?php echo e(__('tourism.destination_blb_detail')); ?>")
	} else {
		$("#title").html("<?php echo e(__('tourism.destination_elb_detail')); ?>")
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('tourism.layouts.frontend_pages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>