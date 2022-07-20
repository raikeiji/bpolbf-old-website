<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $__env->yieldContent('title'); ?></title>
	<?php echo $__env->make('investasi.include.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->yieldContent('csscustom'); ?>
</head>
<body id="invest">
	<?php echo $__env->make('investasi.include.header_pages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->yieldContent('content'); ?>
	<?php echo $__env->make('investasi.include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('investasi.include.custom-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->yieldContent('jscustom'); ?>
</body>
</html>

