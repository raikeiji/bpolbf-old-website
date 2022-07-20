<?php $__env->startSection('title', 'BOPLBF - Destination'); ?>

<?php $__env->startSection('content'); ?>
	<!-- Content -->
	<div id="home" class="page-content bg-white">
		<!-- inner page banner -->
		<div class="dlab-bnr-inr overlay-black-dark banner-content " style="background-image:url(<?php echo e(asset('images/banner/header.png')); ?>);">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white"><?php echo e(__('tourism.package')); ?></h1>
					<!-- Breadcrumb row -->
					<!-- <div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="javascript:void(0);">Home</a></li>
							<li>Header Style Topbar Primary</li>
						</ul>
					</div> -->
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
		<!-- inner page banner END -->
		<div class="content-area">
            <div class="container max-w900">
                <!-- blog start -->
                <div class="blog-post blog-single">
                    <div class="dlab-post-title">
                        <h1 class="post-title m-b0" style="margin-bottom: 0px;"><a href="javascript:void(0);"><?php echo e($package->judul); ?></a></h1>
                    </div>
					
                    <div class="dlab-post-text">
                      <!-- <b>Category: </b> -->
                      <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <a href="javascript:void(0);" class="site-button button-sm <?php if($tag->namaTag->id == 1): ?> red <?php elseif($tag->namaTag->id == 2): ?> yellow <?php elseif($tag->namaTag->id == 3): ?> green <?php else: ?> blue <?php endif; ?> m-b10"><?php echo e($tag->namaTag->nama_kategori_id); ?></a>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php echo $package->deskripsi; ?>

                    </div>
                    
                </div>
                
                <!-- blog END -->
            </div>
        </div>
		<!-- END Container -->
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