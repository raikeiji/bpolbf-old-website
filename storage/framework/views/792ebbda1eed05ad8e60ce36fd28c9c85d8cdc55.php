<?php $__env->startSection('title', 'BOPLBF - News Release'); ?>

<?php $__env->startSection('csscustom'); ?>
    <style>
        .pagination li.active span {
			color: #fff;
		}
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

      <!-- Add your site or application content here -->
  <main id="bop">
  	<section id="home-destination" class="home-extra article"></section>

  	<section class="content" id="articles">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4"><?php echo e(__('profile.news')); ?></h2>
  				<small><?php echo e(__('profile.news_desc')); ?></small>
  			</div>

  			<div class="row mb-5 justify-content-center">
                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card article">
                            <img src="<?php echo e(asset('uploads/ProfileNews/'.$new->image.'')); ?>" class="card-img-top" alt="thumbnail">
                            <div class="card-body">
                                <h3 class="card-title mb-3"><?php echo e(str_limit( $new->judul, 50)); ?></h3>
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
                                <p class="card-text"><?php echo e(str_limit(strip_tags($new->deskripsi), 80)); ?></p>
                                <div class="text-center mt-4">
                                    <a href="<?php echo e(url('boplbf/news/'.$new->slug.'')); ?>" class="btn btn-block btn-outline-primary"><?php echo e(__('profile.readMore')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($news->isEmpty()): ?>
                    <div class="text-center">
                        <h3><?php echo e(__('profile.notFound')); ?></h3>
                    </div>
                <?php endif; ?>
  			</div>

  			<!-- Pagination -->
            <div class="pagination-bx clearfix text-center col-md-12">
                <?php echo e($news->links()); ?>

            </div>
            <!-- Pagination END -->
  		</div>
  	</section>

  	<?php echo $__env->make('profile.include.contact', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscustom'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('profile.layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>