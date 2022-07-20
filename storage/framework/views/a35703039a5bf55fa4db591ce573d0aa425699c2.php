<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $__env->yieldContent('title'); ?></title>
	<?php echo $__env->make('covid.include.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->yieldContent('csscustom'); ?>
</head>
<body id="bg">
	<div class="page-wraper">
		<?php echo $__env->make('covid.include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->yieldContent('content'); ?>
		<?php echo $__env->make('covid.include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<button class="scroltop style1 radius" type="button"><i class="fa fa-arrow-up"></i></button>
		</div>
		<?php echo $__env->make('covid.include.custom-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->yieldContent('jscustom'); ?>
	</body>
</html>

