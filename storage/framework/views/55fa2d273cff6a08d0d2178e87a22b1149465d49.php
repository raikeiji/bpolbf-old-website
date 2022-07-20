<?php $__env->startSection('title', 'BOPLBF - COVID 19'); ?>

<?php $__env->startSection('content'); ?>
	<!-- Content -->
	<div id="home" class=" bg-white ">
		<!-- inner page banner -->
		<div>
			<img src="<?php echo e(asset('images/covid.png')); ?>">
		</div>
		<!-- inner page banner END -->
		<div class="container">
			<div class=" bg-white content-inner">
				<div class="container">
					<!-- panduan penggunaan aplikasi -->
					<div class="row">
						<div class="col-lg-12">
							<div class="sort-title clearfix text-center">
								<h4><?php echo e(__('covid.title')); ?></h4>
							</div>
							<div class="section-content p-b0">
							</div>
						</div>
					</div>
					<div class="row" style="margin-top:40px;margin-bottom:40px">
						<div class="col-lg-12">
							<div id="pdf_viwers" class="section-content p-b0">
								
							</div>
						</div>
					</div>

					<!-- panduan wisata covid 19 -->
					<div class="row">
						<div class="col-lg-12">
							<div class="sort-title clearfix text-center">
								<h4><?php echo e(__('covid.subtitle')); ?></h4>
							</div>
							<div class="section-content p-b0">
							</div>
						</div>
					</div>
					<div class="row" style="margin-top:40px;margin-bottom:40px">
						<div class="col-lg-12">
							<div id="pdf_viwers_2" class="section-content p-b0">
								
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- END Container -->
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscustom'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('covid.layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>