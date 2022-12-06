<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!-- Footer -->
<footer class="pt-4 pt-md-5">
	<div class="container pb-4">
		<div class="row">
			<div class="col-12 col-md-3">
				<h5><?php echo e(__('footer.about_tourism')); ?></h5>
				<ul class="list-unstyled">
					<li><a href="#home"><?php echo e(__('footer.home')); ?></a></li>
					<li><a href="#invesment"><?php echo e(__('footer.opportunity')); ?></a></li>
					<li><a href="#factsheet"><?php echo e(__('footer.factsheet')); ?></a></li>
					<li><a href="#invest"><?php echo e(__('footer.howTo')); ?></a></li>
					<li><a href="#bussiness"><?php echo e(__('footer.insider')); ?></a></li>
				</ul>
			</div>
			<div class="col-12 col-md-3">
				<h5><?php echo e(__('footer.explore')); ?></h5>
				<ul class="list-unstyled">
					<li><a href="/tourism#home"><?php echo e(__('footer.home')); ?></a></li>
					<li><a href="/tourism#profile"><?php echo e(__('footer.labuanBajo')); ?></a></li>
					<li><a href="/tourism#beyond"><?php echo e(__('footer.beyond')); ?></a></li>
					<li><a href="/tourism#attraction"><?php echo e(__('footer.attraction')); ?></a></li>
				</ul>
			</div>
			<!-- Menambahkan Link Kemenparekraf dan Kedaireka-->
			<div class="col-12 col-md-1">
				<h5><?php echo e(__('footer.link')); ?></h5>
				<ul class="list-unstyled">
					<li><a href="https://kemenparekraf.go.id/"><?php echo e(__('footer.kemenparekraf')); ?></a></li>
					<li><a href="https://kedairekalabuanbajo.org/"><?php echo e(__('footer.kedaireka')); ?></a></li>
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