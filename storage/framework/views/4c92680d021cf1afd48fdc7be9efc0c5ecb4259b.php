<?php $__env->startSection('title', 'Industri & Investment How To Invest'); ?>
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

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
<?php $__env->startSection('content'); ?>
	<!-- Content -->
	<div id="home" class="page-content bg-white">
		    <!-- inner page banner -->
		    <div class="dlab-bnr-inr overlay-black-dark banner-content " style="background-image:url(<?php echo e(asset('images/banner/header.png')); ?>);">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white"><?php echo e(__('investment.howTo')); ?></h1>
                </div>
            </div>
        </div>
          <!-- inner page banner END -->
          <div class="content-area">
            <div class="container max-w900">
                <!-- blog start -->
                <div class="blog-post blog-single">
                    <div class="dlab-post-title">
                        <h1 class="post-title m-b0" style="margin-bottom: 0px;"><a href="javascript:void(0);"><?php echo $data->judul; ?></a></h1>
                    </div>
                    <div class="dlab-post-meta m-t0">
                        <ul>
                          <li id="social" style="color:#000!important;">
                            <a href="javascript:void(0);"><button class="site-button facebook m-r5 circle-sm" type="button"><i class="fa fa-facebook" style="color:#fff!important;"></i></button>Facebook</a></li>
                          <li id="social" style="color:#000!important;">
                            <a href="javascript:void(0);">
                            <button class="site-button instagram m-r5 circle-sm" type="button">
                            <i class="fa fa-instagram" style="color:#fff!important;"></i></button>Instagram</a></li>
                          <li id="social" style="color:#000!important;">
                            <a href="javascript:void(0);">
                            <button class="site-button twitter m-r5 circle-sm" type="button"><i class="fa fa-twitter" style="color:#fff!important;"></i></button>Twitter</a></li>
                        </ul>
                    </div>
                    
                    <div class="dlab-post-text">
                      <?php if(!empty($data->image)): ?>
                      <div class="row">
                        <img src="<?php echo e(asset('uploads/InvestmentHTI/'.$data->image.'')); ?>" alt="" class="center">
                      </div>
                      <?php endif; ?>
                    </div>
                    <div class="dlab-post-text">
                       <?php echo $data->deskripsi; ?>

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
<?php echo $__env->make('investasi.layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>