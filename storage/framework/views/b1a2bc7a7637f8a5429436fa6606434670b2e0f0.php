<?php $__env->startSection('title', 'BOPLBF - Profile'); ?>

<?php $__env->startSection('csscustom'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
<!-- Bootstrap-Iconpicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/css/bootstrap-iconpicker.min.css"/>
<style>
	.icon-bx-wraper {
		min-height: 303px;
	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Add your site or application content here -->
  <main>
  	<section id="home" class="bop" style="background:url('<?php echo e(asset('uploads/SliderProfile/'.$sliders[0]->file_img.'/')); ?>') top left no-repeat transparent;background-attachment: fixed">
  		<h1 id="home-title">LABUAN BAJO FLORES
  			<span class="subtitle" style="letter-spacing: 12px;">Tourism Authority</span>
  		</h1>

  		<a class="goto-action" href="#">
      	<img src="<?php echo e(asset('assets/icons/home-down.svg')); ?>" alt="down">
      </a>
  	</section>

  	<section class="content" id="BOP-about">
  		<div class="container">
  			<div class="text-center">
  				<h2><?php echo e($hn->judul); ?></h2>
  			</div>

  			<div class="row mb-5 justify-content-center">
  				<div class="col-12 col-lg-4">
  					<img src="<?php echo e(asset('uploads/ProfileHN/'.$hn->image.'')); ?>" class="img-fluid mb-4" alt="thumbnail">
  				</div>

  				<div class="col-12 col-lg-8 short-desc">
  					<p><?php echo $hn->deskripsi; ?></p>
  				</div>
  			</div>
  		</div>
  	</section>

  	<section class="content homepage" id="BOP-program">
  		<div class="container">
  			<div class="text-center">
  				<h2><?php echo e(__('profile.program')); ?></h2>
  			</div>

  			<div class="row py-4 program-list">
				<?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col col-md-6 mb-5">
						<a href="<?php echo e(url('boplbf/program/'.$program->slug.'')); ?>" class="program-item">
							<div class="media d-flex align-items-center">
								<i class="<?php echo e($program->icon); ?>" style='color:#fff;font-size:45px;margin-right:5px'></i> 
								<div class="media-body">
									<h5 class="mt-0 mb-2"><?php echo e($program->judul); ?></h5>
								</div>
							</div>
						</a>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  			</div>
  		</div>
  	</section>

  	<section class="content" id="BOP-news">
  		<div class="container">
  			<div class="row">
  				<div class="col-12 col-lg-8 mb-5 mb-lg-0">
  					<div class="text-center">
		  				<h2><?php echo e(__('profile.news')); ?></h2>
		  			</div>

		  			<ul class="list-unstyled news-list">
		  				<?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
		  					<div class="card mb-3">
		  						<div class="card-body p-0">
				  					<div class="row news-item d-flex">
				  						<div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
				  							<img src="<?php echo e(asset('uploads/ProfileNews/'.$new->image.'')); ?>" class="object-fit w-100 h-100 mb-4 mb-md-0" alt="thumbnail">
				  						</div>
				  						<div class="col-12 col-lg-8 p-4">
				  							<h4 class="no-line mb-1"><?php echo e($new->judul); ?></h4>
				  							<div class="timestamp mb-3">
				  								<a href="<?php echo e(url('boplbf/news/'.$new->slug.'')); ?>">
					  								<svg class="bi" width="16" height="16" fill="currentColor">
					  									<use xlink:href="<?php echo e(asset('assets/icons/bootstrap-icons.svg#calendar')); ?>"/>
					  								</svg>
					  								<small>
													  	<?php echo $new->date; ?>

							  						</small>
							  					</a> | 
												<?php $__currentLoopData = $new->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<small>
														<a href="<?php echo e(url('boplbf/news/tags/'.$tag->tag.'')); ?>" style="margin-right:3px"><?php echo e($tag->tag); ?></a> 
													</small>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  							</div>
						  					<p><?php echo e(str_limit(strip_tags($new->deskripsi), 120)); ?></p>
						  					<a href="<?php echo e(url('boplbf/news/'.$new->slug.'')); ?>" class="d-inline-block timestamp mb-0"><?php echo e(__('profile.readMore')); ?> &raquo;</a>
				  						</div>
				  					</div>
		  						</div>
		  					</div>
		  				</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  			</ul>

		  			<div class="text-center mt-3">
						<a href="<?php echo e(route('boplbf.news')); ?>" class="btn btn-primary"><?php echo e(__('profile.viewMore')); ?></a>
					</div>
  				</div>

  				<div class="col-12 col-lg-4 mb-5 mb-lg-0">
  					<div class="text-center">
		  				<h2><?php echo e(__('profile.report')); ?></h2>
		  			</div>

		  			<ul class="list-unstyled news-list report">
					  	<?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li>
								<div class="card mb-3">
									<div class="card-body">
										<div class="row news-item d-flex">
											<div class="col-12 col-lg-8">
												<a href="<?php echo e(url('boplbf/report/'.$report->slug.'')); ?>">
													<h6 class="no-line mb-1"><?php echo e($report->judul); ?></h6>
													<div class="timestamp mb-0">
															<svg class="bi" width="16" height="16" fill="currentColor">
																<use xlink:href="<?php echo e(asset('assets/icons/bootstrap-icons.svg#calendar')); ?>"/>
															</svg>
															<small>
																<?php echo e($report->date); ?>

															</small>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
							</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  			</ul>

		  			<div class="text-center mt-3">
							<a href="<?php echo e(route('boplbf.report')); ?>" class="btn btn-primary"><?php echo e(__('profile.viewMore')); ?></a>
						</div>
  				</div>
  			</div>
  		</div>
	  </section>
	  <?php echo $__env->make('profile.include.contact', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscustom'); ?>
<!-- Bootstrap-Iconpicker Bundle -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker-iconset-all.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
	$("#contact_form").validate({
		submitHandler: function(form) {
			form.submit();
		}
	});

	function confirm_contact(){
		if($("#contact_form").valid()){
			$.ajax({
				type:"POST",
				url : "<?php echo e(route('admin.lbfta.faq.submit')); ?>",
				headers: {
					'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
				},
				data: { 
					"name": $("#name").val(),
					"email": $("#email").val(),
					"subject": $("#subject").val(),
					"message": $("#message").val(),
				},
				success:function(id){
					Swal.fire(
						{
							type: "success",
							title: 'Submitted!',
							text: 'Pesan anda sudah kami terima.',
							confirmButtonClass: 'btn btn-success',
						}
					)
					$("#name").val("")
					$("#email").val("")
					$("#subject").val("")
					$("#message").val("")
				}
			});
		}
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('profile.layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>