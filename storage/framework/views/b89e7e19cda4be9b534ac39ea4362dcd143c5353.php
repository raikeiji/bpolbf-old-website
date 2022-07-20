<?php $__env->startSection('title', 'BOPLBF - Programs'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Add your site or application content here -->
    <main id="bop">
      <section id="home-destination" class="home-extra article"></section>

      <section class="content" id="BOP-Program">
        <div class="container">
          <div class="text-center mb-5">
            <img class="mr-3" src="<?php echo e(asset('assets/icons/icon-bop-kukp.svg')); ?>" alt="icon" class="mx-auto">
            <h2 class="mb-4"><?php echo $data->judul; ?></h2>
          </div>
      
          <div class="row py-4 program-list">
            <?php $__currentLoopData = $sub_program; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col col-md-6 mb-5">
                <div class="program-item">
                  <div class="media">
                    <img class="mr-3" src="<?php echo e(asset('assets/icons/icon-bop-kukp.svg')); ?>" alt="icon">
                    <div class="media-body">
                      <h4 class="mt-0 mb-2 program-title no-line"><?php echo $f->judul; ?></h4>
                      <div class="program-content">
                        <?php echo $f->deskripsi; ?>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </section>

      <?php echo $__env->make('profile.include.contact', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </main>
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
<?php echo $__env->make('profile.layouts.frontend_pages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>