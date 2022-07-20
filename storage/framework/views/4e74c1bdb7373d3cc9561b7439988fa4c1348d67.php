<!-- Footer -->
<footer class="pt-4 pt-md-5" style="background-image:url(<?php echo e(asset('uploads/LayoutFooter/'.$footer->background_image.'')); ?>);">
	<div class="container pb-4">
		<div class="row">
			<div class="col-12 col-md-3">
				<h5><?php echo e(__('footer.about_tourism')); ?></h5>
				<ul class="list-unstyled">
					<li><a href="<?php echo e(route('tourism')); ?>"><?php echo e(__('header.tourism')); ?></a></li>
					<li><a href="<?php echo e(route('investasi')); ?>"><?php echo e(__('header.invest')); ?></a></li>
					<li><a href="<?php echo e(route('boplbf')); ?>"><?php echo e(__('header.authority')); ?></a></li>
					<li><a href="<?php echo $footer->privacy_link; ?>"><?php echo e(__('footer.privacyPolicy')); ?></a></li>
				</ul>
			</div>
			<div class="col-12 col-md-3">
				<h5><?php echo e(__('footer.explore')); ?></h5>
				<ul class="list-unstyled">
					<li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('footer.home')); ?></a></li>
					<li><a href="<?php echo e(route('d.destination')); ?>?kategori=labuan"><?php echo e(__('footer.labuanBajo')); ?></a></li>
					<li><a href="<?php echo e(route('d.destination')); ?>?kategori=beyond"><?php echo e(__('footer.beyond')); ?></a></li>
					<li><a href="<?php echo e(route('t.calendar_event')); ?>"><?php echo e(__('footer.attraction')); ?></a></li>
				</ul>
			</div>
			<div class="col-12 col-md-4 ml-auto">
				<img src="<?php echo e(asset('assets/img/logo.png')); ?>" class="footer-logo" alt="Logo" height="80">
				<p class="footer-address"><?php echo $footer->alamat; ?></p>
			</div>
		</div>
	</div>
	<div class="real-footer text-center py-2">
		<span>2020 © Labuan Bajo Flores Tourism Authority</span>
	</div>
</footer>
<!-- Footer END -->