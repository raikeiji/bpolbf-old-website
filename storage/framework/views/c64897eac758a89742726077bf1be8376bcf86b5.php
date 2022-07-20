<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $__env->yieldContent('title'); ?></title>
	<?php echo $__env->make('tourism.include.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->yieldContent('csscustom'); ?>
</head>
<body id="bg">
	<?php echo $__env->make('tourism.include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->yieldContent('content'); ?>
	<?php echo $__env->make('tourism.include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('tourism.include.custom-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->yieldContent('jscustom'); ?>
</body>
</html>