<?php $__env->startSection('title', 'BOPLBF - Thematic Travel Plan'); ?>

<?php $__env->startSection('content'); ?>
	<!-- Content -->
	<div id="home" class="page-content bg-white">
		<div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(<?php echo e(asset('images/pulau_padar.jpg')); ?>);">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white"><?php echo e($title); ?></h1>
					<!-- Breadcrumb row -->
					<!-- <div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="<?php echo e(route('home')); ?>">Home</a></li>
							<li><a href="<?php echo e(route('tourism')); ?>">Tourism</a></li>
							<li>Itinerary</li>
						</ul>
					</div> -->
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
		<div class="content-area">
            <div class="container">
				<!-- <fieldset class="form-group position-relative has-icon-left">
					<label>Filter</label>
                    <input type="text" class="form-control daterange" placeholder="Select Date">
                    <div class="form-control-position">
                        <i class="bx bx-calendar-check"></i>
                    </div>
                </fieldset> -->
                <div class="row">
                    <!-- blog grid -->
                    <div id="masonry" class="dlab-blog-grid-3">
                        <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="post card-container col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="blog-post blog-grid blog-rounded blog-effect1">
                                <div class="dlab-post-media dlab-img-effect"> 
                                    <a href="<?php echo e(url('tourism/package/'.$package->slug.'')); ?>"><img alt="" src="<?php echo e(asset('uploads/TourismPackage/'.$package->id_relasi.'/'.$package->thumbnail.'')); ?>"></a> 
								                </div>
                                <div class="dlab-info p-a20 border-1">
                                  <div class="dlab-post-title ">
                                      <h5 class="post-title"><a href="<?php echo e(url('tourism/package/'.$package->slug.'')); ?>"><?php echo e($package->judul); ?></a></h5>
                                  </div>
                                  Category : <br>
                                  <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($tag->id_relasi == $package->id_relasi): ?>
                                      <a href="javascript:void(0);" class="site-button button-sm <?php if($tag->namaTag->id == 1): ?> red <?php elseif($tag->namaTag->id == 2): ?> yellow <?php elseif($tag->namaTag->id == 3): ?> green <?php else: ?> blue <?php endif; ?> m-b10"><?php echo e($tag->namaTag->nama_kategori_id); ?></a>
                                    <?php endif; ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <div class="dlab-post-readmore"> 
                                    <a href="<?php echo e(url('tourism/package/'.$package->slug.'')); ?>" title="READ MORE" rel="bookmark" class="site-button">READ MORE
                                      <i class="ti-arrow-right"></i>
                                    </a>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- blog grid END -->
                    <!-- Pagination -->
                    <!-- <div class="pagination-bx clearfix col-md-12 text-center">
						<ul class="pagination">
							<li class="previous"><a href="javascript:void(0);"><i class="ti-arrow-left"></i> Prev</a></li>
							<li class="active"><a href="javascript:void(0);">1</a></li>
							<li><a href="javascript:void(0);">2</a></li>
							<li><a href="javascript:void(0);">3</a></li>
							<li class="next"><a href="javascript:void(0);">Next <i class="ti-arrow-right"></i></a></li>
						</ul>
					</div> -->
                    <!-- Pagination END -->
                </div>
            </div>
        </div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscustom'); ?>
	<script type="text/javascript" src="https://widgets.thereviewsplace.com/grid.js" async></script>
	<script>
$(document).ready(function() {

  var sync1 = $("#sync1");
  var sync2 = $("#sync2");
  var slidesPerPage = 4; //globaly define number of elements per page
  var syncedSecondary = true;

	  sync1.owlCarousel({
		items : 1,
		slideSpeed : 2000,
		nav: true,
		autoplay: false,
		dots: false,
		loop: true,
		responsiveRefreshRate : 200,
		navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
	  }).on('changed.owl.carousel', syncPosition);

	  sync2.on('initialized.owl.carousel', function () {
		  sync2.find(".owl-item").eq(0).addClass("current");
		}).owlCarousel({
		items : slidesPerPage,
		dots: false,
		nav: false,
		margin:5,
		smartSpeed: 200,
		slideSpeed : 500,
		slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
		responsiveRefreshRate : 100
	  }).on('changed.owl.carousel', syncPosition2);

  function syncPosition(el) {
    //if you set loop to false, you have to restore this next line
    //var current = el.item.index;
    
    //if you disable loop you have to comment this block
    var count = el.item.count-1;
    var current = Math.round(el.item.index - (el.item.count/2) - .5);
    
    if(current < 0) {
      current = count;
    }
    if(current > count) {
      current = 0;
    }
    
    //end block

    sync2
      .find(".owl-item")
      .removeClass("current")
      .eq(current)
      .addClass("current");
    var onscreen = sync2.find('.owl-item.active').length - 1;
    var start = sync2.find('.owl-item.active').first().index();
    var end = sync2.find('.owl-item.active').last().index();
    
    if (current > end) {
      sync2.data('owl.carousel').to(current, 100, true);
    }
    if (current < start) {
      sync2.data('owl.carousel').to(current - onscreen, 100, true);
    }
  }
  
  function syncPosition2(el) {
    if(syncedSecondary) {
      var number = el.item.index;
      sync1.data('owl.carousel').to(number, 100, true);
    }
  }
  
  sync2.on("click", ".owl-item", function(e){
		e.preventDefault();
		var number = $(this).index();
		//sync1.data('owl.carousel').to(number, 300, true);
		
		sync1.data('owl.carousel').to(number, 300, true);
		
	});
});
		
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('tourism.layouts.frontend_pages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>