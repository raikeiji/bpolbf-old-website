<?php $__env->startSection('title', 'BOPLBF - News Release'); ?>
<style>
#tags {
  float: left;
  border: 1px solid #ccc;
  padding: 4px;
  font-family: Arial;
}

#tags span.tag {
  cursor: pointer;
  display: block;
  float: left;
  color: #555;
  background: #add;
  padding: 5px 10px;
  padding-right: 30px;
  margin: 4px;
}

#tags span.tag:hover {
  opacity: 0.7;
}

#tags span.tag:after {
  position: absolute;
  content: "×";
  border: 1px solid;
  border-radius: 10px;
  padding: 0 4px;
  margin: 3px 0 10px 7px;
  font-size: 10px;
}

#tags input {
  background: #eee;
  border: 0;
  margin: 4px;
  padding: 7px;
  width: auto;
}
</style>
<?php $__env->startSection('content'); ?>
    <!-- Add your site or application content here -->
    <main id="bop">
  	<section id="home-destination" class="home-extra article"></section>

  	<section class="content" id="articles">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4"><?php echo $data->judul; ?></h2>
  			</div>

  			<article>
          <span class="timestamp">Created at <?php echo $data->date; ?></span>
          <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button class="btn" type="button" style="background-color:#23789B;padding:5px;font-size:12px;"><a href="<?php echo e(url('boplbf/news/tags/'.$tag->tag.'')); ?>" style="color:white"><?php echo e($tag->tag); ?></a></button>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  				<?php echo $data->deskripsi; ?>

  			</article>

  			<div class="row mb-5 justify-content-center">
          <?php $__currentLoopData = $other_article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card article">
                    <img src="<?php echo e(asset('uploads/ProfileNews/'.$a->image.'')); ?>" class="card-img-top" alt="thumbnail">
                    <div class="card-body">
                      <h3 class="card-title mb-3"><?php echo e($a->judul); ?></h3>
                      <p class="card-text"><?php echo e(str_limit(strip_tags($a->deskripsi), 180)); ?></p>
                      <div class="text-center mt-4">
                          <a href="<?php echo e(url('boplbf/news/'.$a->slug.'')); ?>" class="btn btn-block btn-outline-primary"><?php echo e(__('profile.readMore')); ?></a>
                      </div>
                    </div>
                </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  			</div>

  			<div class="text-center mt-5">
          <a href="<?php echo e(route('boplbf.news')); ?>" class="btn btn-primary"><?php echo e(__('profile.viewMore')); ?></a>
				</div>
  		</div>
  	</section>

  	<?php echo $__env->make('profile.include.contact', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscustom'); ?>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('profile.layouts.frontend_pages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>