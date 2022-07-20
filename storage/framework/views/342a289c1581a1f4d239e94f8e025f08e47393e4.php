<?php $__env->startSection('title', 'BOPLBF - Tourism'); ?>

<?php $__env->startSection('csscustom'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content -->
    <div>
		<section id="home" style="background:url('<?php echo e(asset('uploads/SliderTourism/'.$sliders[0]->file_img.'/')); ?>') top left no-repeat transparent;background-attachment: fixed">
			<h1 id="home-title"><?php echo e(__('tourism.welcome')); ?></h1>

			<a class="goto-action" href="#">
				<img src="assets/icons/home-down.svg" alt="down">
			</a>

			<div class="card d-none d-md-block" id="filter-home">
				<div class="card-body">
					<form class="row gy-2 gx-3 align-items-center">
						<div class="col-12 col-md">
							<label for="whattodo"><?php echo e(__('tourism.attraction')); ?></label>
							<select class="form-select" id="whattodo">
								<option value="" disabled selected style="display: none"><?php echo e(__('tourism.attraction')); ?></option>
								<option><?php echo e(__('tourism.natural')); ?></option>
								<option><?php echo e(__('tourism.cultural')); ?></option>
								<option><?php echo e(__('tourism.culinary')); ?></option>
								<option><?php echo e(__('tourism.art')); ?></option>
								<option><?php echo e(__('tourism.event')); ?></option>
							</select>
						</div>
						<div class="col-12 col-md">
							<label for="wheretogo"><?php echo e(__('tourism.area')); ?></label>
							<select class="form-select" id="wheretogo">
								<option value="" disabled selected style="display: none"><?php echo e(__('tourism.area')); ?></option>
								<option>Manggarai Barat</option>
								<option>Manggarai</option>
								<option>Manggarai Timur</option>
								<option>Ngada</option>
								<option>Nagekeo</option>
								<option>Ende</option>
								<option>Sikka</option>
								<option>Flores Timur</option>
								<option>Lembata</option>
								<option>Alor</option>
								<option>Bima</option>
							</select>
						</div>
						<div class="col-12 col-md">
							<label for="month"><?php echo e(__('tourism.to_go')); ?></label>
							<select class="form-select" id="month">
								<option selected><?php echo e(__('tourism.pilih_rentang')); ?></option>
								<option value="1">January - March</option>
								<option value="2">April - June</option>
								<option value="3">July - September</option>
								<option value="3">October - December</option>
							</select>
						</div>
						<div class="col-auto">
							<label>&nbsp;</label>
							<div class="d-block">
								<button type="submit" class="btn btn-lg btn-primary"><?php echo e(__('tourism.find')); ?></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>


		<section class="content" id="articles">
			<div class="container">
				<div class="text-center">
					<h2><?php echo e(__('tourism.announcement')); ?></h2>
				</div>

				<div class="row mb-5 justify-content-center">
					<?php $__currentLoopData = $announcement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-12 col-md-6 col-lg-4">
						<div class="card article">
							<img src="<?php echo e(asset('uploads/TourismAnnouncement/'.$a->image.'')); ?>" class="card-img-top" alt="thumbnail">
							<div class="card-body">
								<h3 class="card-title mb-3" style="font-size:24px"><?php echo e(str_limit(strip_tags($a->judul), 32)); ?></h3>
								<p class="card-text"><?php echo e(str_limit(strip_tags($a->deskripsi), 180)); ?></p>
								<div class="text-center mt-4">
									<a href="<?php echo e(url('tourism/announcement/'.$a->slug.'')); ?>" class="btn btn-block btn-outline-primary"><?php echo e(__('tourism.read_more')); ?></a>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>

				<div class="text-center mt-5">
					<a href="<?php echo e(route('t.announcement')); ?>" class="btn btn-primary"><?php echo e(__('tourism.other_announcement')); ?></a>
				</div>
			</div>
		</section>


		<?php echo $__env->make('tourism.include.plan_trip', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


		<section class="content" id="destinations">
			<div class="container">
				<div class="text-center">
					<h2><?php echo e(__('tourism.enchanting')); ?></h2>
				</div>

				<div class="glide">
					<div class="glide__track" data-glide-el="track">
						<ul class="glide__slides">
							<?php $__currentLoopData = $enchantings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enchanting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li class="glide__slide">
									<div class="card destination" onclick="javascript:void(0)">
										<img src="<?php echo e(asset('uploads/TourismDestinasi/ELB/'.$enchanting->id.'/'.$enchanting->thumbnail.'')); ?>" class="card-img-top" alt="<?php echo e($enchanting->judul); ?>">
										<div class="card-body">
											<?php $__currentLoopData = $enchanting->tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<span class="badge bg-primary" style="margin-right:5px"><?php echo e($tag->nama_kategori_id); ?></span>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<h3 class="card-title mt-3 mb-2 pb-0" style="font-size:24px"><?php echo e(str_limit(strip_tags($enchanting->judul), 20)); ?></h3>
											<p class="card-text"><?php echo e(str_limit(strip_tags($enchanting->deskripsi), 120)); ?></p>
											
											<a href="<?php echo e(url('tourism/destination/'.$enchanting->slug.'')); ?>"><?php echo e(__('tourism.read_more')); ?></a>
										</div>
									</div>
								</li>
							
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
					<div class="glide__arrows" data-glide-el="controls">
						<button class="glide__arrow glide__arrow--left" data-glide-dir="<">
							<svg class="bi" width="40" height="40" fill="currentColor">
						<use xlink:href="assets/icons/bootstrap-icons.svg#caret-left"/>
					</svg>
						</button>
						<button class="glide__arrow glide__arrow--right" data-glide-dir=">">
							<svg class="bi" width="40" height="40" fill="currentColor">
						<use xlink:href="assets/icons/bootstrap-icons.svg#caret-right"/>
					</svg>
						</button>
					</div>
					<div class="glide__bullets" data-glide-el="controls[nav]">
						<button class="glide__bullet" data-glide-dir="=0"></button>
						<button class="glide__bullet" data-glide-dir="=1"></button>
						<button class="glide__bullet" data-glide-dir="=2"></button>
					</div>
				</div>

				<div class="text-center mt-5">
					<a href="<?php echo e(route('d.destination')); ?>?kategori=labuan" class="btn btn-primary"><?php echo e(__('tourism.other_destination')); ?></a>
				</div>
			</div>
		</section>

		
		<section class="content" id="destinations-extra">
			<div class="container">
				<div class="text-center">
					<h2><?php echo e(__('tourism.beyond')); ?></h2>
				</div>

				<div class="row">
					<?php $__currentLoopData = $beyonds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $beyond): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-12 col-md-6 col-lg-4">
							<div class="card destination" onclick="javascript:void(0)">
								<img src="<?php echo e(asset('uploads/TourismDestinasi/BLB/'.$beyond->id.'/'.$beyond->thumbnail.'')); ?>" class="card-img-top" alt="<?php echo e($beyond->judul); ?>">
								<div class="card-body">
									<h5 class="mb-2 pb-0">
									<?php $__currentLoopData = $beyond->tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<span class="badge bg-primary" style="margin-right:5px"><?php echo e($tag->nama_kategori_id); ?></span>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</h5>
									<h3 class="card-title mt-3 mb-2 pb-0" style="font-size:24px"><?php echo e(str_limit(strip_tags($beyond->judul), 20)); ?></h3>
									<p class="card-text"><?php echo e(str_limit(strip_tags($beyond->deskripsi), 100)); ?></p>
								</div>
								
								<a href="<?php echo e(url('tourism/destination/'.$beyond->slug.'')); ?>" class="btn btn-primary"><?php echo e(__('tourism.read_more')); ?></a>
							</div>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>

				<div class="text-center mt-5">
					<a href="<?php echo e(route('d.destination')); ?>?kategori=beyond" class="btn btn-primary"><?php echo e(__('tourism.other_destination')); ?></a>
				</div>
			</div>
		</section>
		
			<!-- Thematic
			<div class="section-full bg-gray content-inner bg-img-fix overlay-black-dark" style="background-image:url(<?php echo e(asset('images/background/bg2.jpg')); ?>);">
				<div class="container">
					<div class="sort-title clearfix text-center" id="theme_title">
						<h1><?php echo e(__('tourism.thematicTravel')); ?></h1>
						<h4><?php echo e(__('tourism.thematicTravelSubtitle')); ?></h4>
					</div>
					<div class="section-content ">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="dlab-box m-b30 dlab-team3">
									<div class="dlab-media">
										<a href="<?php echo e(route('t.adventure')); ?>">
											<img width="358" height="460" alt="" src="<?php echo e(asset('images/example/adventure.jpg')); ?>">
										</a>
									</div>
									<div class="dlab-info">
										<h4 class="dlab-title"><a href="<?php echo e(route('t.adventure')); ?>"><?php echo e(__('tourism.adventure')); ?></a></h4>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="dlab-box m-b30 dlab-team3">
									<div class="dlab-media">
										<a href="<?php echo e(route('t.culture')); ?>">
											<img width="358" height="460" alt="" src="<?php echo e(asset('images/example/culture.jpg')); ?>">
										</a>
									</div>
									<div class="dlab-info">
										<h4 class="dlab-title"><a href="<?php echo e(route('t.culture')); ?>"><?php echo e(__('tourism.culture')); ?></a></h4>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="dlab-box m-b30 dlab-team3">
									<div class="dlab-media">
										<a href="<?php echo e(route('t.leisure')); ?>">
											<img width="358" height="460" alt="" src="<?php echo e(asset('images/example/leisure.jpg')); ?>">
										</a>
									</div>
									<div class="dlab-info">
										<h4 class="dlab-title"><a href="<?php echo e(route('t.leisure')); ?>"><?php echo e(__('tourism.leisure')); ?></a></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
			</div>
			-->

			<!-- Things to do
			<div class="section-full bg-white content-inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="sort-title clearfix text-center">
								<h1><?php echo e(__('tourism.thingsToDoTitle')); ?></h1>
								<h4><?php echo e(__('tourism.thingsToDoSubtitle')); ?></h4>
							</div>
							<div class="section-content p-b0">
								<div class="row">
									<div class="col-lg-4 col-md-6 col-sm-6 m-b30">
										<div class="dlab-box fly-box">
											<div class="dlab-media"> 
												<a href="<?php echo e(route('t.d.do')); ?>"><img src="<?php echo e(asset('images/example/t1.jpg')); ?>" alt=""></a> 
											</div>
											<div class="dlab-info p-a20 text-center bg-white">
												<h4 class="m-a0 bg-primary content-box-head"><a href="<?php echo e(route('t.d.do')); ?>" class="text-white"><?php echo e(__('tourism.thingsToDo')); ?></a></h4>
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-6 col-sm-6 m-b30">
										<div class="dlab-box fly-box">
											<div class="dlab-media"> 
												<a href="<?php echo e(route('t.d.see')); ?>"><img src="<?php echo e(asset('images/example/t2.jpg')); ?>" alt=""></a> 
											</div>
											<div class="dlab-info p-a20 text-center bg-white">
												<h4 class="m-a0 bg-primary content-box-head"><a href="<?php echo e(route('t.d.see')); ?>" class="text-white"><?php echo e(__('tourism.thingsToSee')); ?></a></h4>
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-6 col-sm-6 m-b30">
										<div class="dlab-box fly-box">
											<div class="dlab-media"> 
												<a href="<?php echo e(route('t.d.buy')); ?>"><img src="<?php echo e(asset('images/example/t3.jpg')); ?>" alt=""></a> 
											</div>
											<div class="dlab-info p-a20 text-center bg-white">
												<h4 class="m-a0 bg-primary content-box-head"><a href="<?php echo e(route('t.d.buy')); ?>" class="text-white"><?php echo e(__('tourism.thingsToBuy')); ?></a></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			-->

		<section class="content" id="randomize">
			<div class="container text-center">
				<h2><?php echo e(__('tourism.still_haven')); ?> <a href="<?php echo e(url('tourism/destination/'.$surprise->slug.'')); ?>" class="btn btn-lg d-block d-md-inline-block btn-outline-light mt-4 mt-md-0 ml-md-4"><?php echo e(__('tourism.suprise_me')); ?></a></h2>
			</div>
		</section>

		<section class="content" id="destinations">
			<div class="container">
				<div class="row">
					<div class="col col-md-6 mb-5 mb-md-0">
						<div class="text-center">
							<h2><?php echo e(__('tourism.calendar')); ?></h2>
						</div>

						<ul class="list-unstyled">
							<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li>
									<a href="<?php echo e(url('tourism/detail-event/'.$event->slug.'')); ?>" class="event-item d-flex">
										<div class="col">
											<span><?php echo $event->tanggal; ?>

											</span>
										</div>
										<div class="col">
											<h5><?php echo e($event->judul); ?></h5>
											<small><?php echo e($event->date); ?> - <?php echo e($event->end_date); ?></small>
										</div>
									</a>
								</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>

						<div class="text-center mt-5">
								<a href="<?php echo e(route('t.calendar_event')); ?>" class="btn btn-primary"><?php echo e(__('tourism.check_event')); ?></a>
							</div>
					</div>
					<div class="col col-md-6 mb-5 mb-md-0">
						<div class="text-center">
							<h2><?php echo e(__('tourism.InstagramSubtitle')); ?> <a href="#">#<?php echo e($ugc->hashtag); ?></a></h2>
						</div>
						<div class="row" id="ugc_container">
						
						</div>

					</div>
				</div>
			</div>
		</section>

			<!-- Images box with content demo 1 END -->
			<!--
			<div class="section-full bg-white content-inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="sort-title clearfix text-center">
								<h1><?php echo e(__('tourism.calendar')); ?></h1>
								<h4 style="margin-bottom: 10px"><?php echo e(__('tourism.calendarSubtitle')); ?></h4>
								<div class="form-group">
									<div class="row">
										<div class="col-lg-4"></div>
										<div class="col-lg-4 text-black">
											<a class="form-control daterange" name="daterange" style="cursor:pointer;text-align:left;display:flex;justify-content:space-between">
                      <span><?php echo e(__('tourism.calendarFilter')); ?></span><i class="fa fa-chevron-down"></i></a>
										</div>
										<div class="col-lg-4"></div>
									</div>
								</div>
							</div>
							<div class="blog-carousel owl-carousel owl-btn-3 owl-btn-center-lr">
								<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="item">
									<div class="blog-post blog-grid blog-rounded blog-effect1">
										
										<div class="dlab-media dlab-img-effect zoom"> 
											<a href="<?php echo e(url('tourism/detail-event/'.$event->slug.'')); ?>">
												<?php if($event->kategori == "labuan"): ?>
												<img src="<?php echo e(asset('uploads/TourismEvent/ELB/'.$event->id.'/'.$event->thumbnail.'')); ?>" alt="">
												<?php else: ?>
												<img src="<?php echo e(asset('uploads/TourismEvent/BLB/'.$event->id.'/'.$event->thumbnail.'')); ?>" alt="">
												<?php endif; ?>
											</a>
											<div class="dlab-info-has skew-has p-a20 bg-primary">
												<p class="dlab-info-has-text"><?php echo e(str_limit(strip_tags($event->deskripsi), 80)); ?></span></p>
											</div>
										</div>
										<div class="dlab-info p-a20 border-1">
		                                    <div class="dlab-post-meta">
		                                        <ul>
		                                            <li class="post-date"> <strong><?php echo e($event->date); ?></strong> - <strong><?php echo e($event->end_date); ?></strong> <span></span> </li>
		                                        </ul>
		                                    </div>
		                                    <div class="dlab-post-title">
		                                        <h4 class="post-title"><a href="<?php echo e(url('tourism/detail-event/'.$event->slug.'')); ?>"><?php echo e($event->judul); ?></a></h4>
		                                    </div>
		                                </div>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</div>
					</div>
					<div class="dlab-post-readmore text-center" style="margin-bottom:50px;"> 
						<a href="<?php echo e(route('t.calendar_event')); ?>" title="View More" rel="bookmark" class="site-button" style="font-size: 20px"><?php echo e(__('tourism.viewMore')); ?>

						</a>
					</div>
				</div>
			</div>
			-->

			<!-- Latest blog END -->
		</div>
		<!-- contact area END -->
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('jscustom'); ?>

<script>
// Glide initialize
var glide = new Glide('.glide', {
		type: 'carousel',
		perView: 2,
		animationDuration: 1000,
		autoplay: 3000,
		peek: {
		before: 30,
		after: 30
		},
		breakpoints: {
		992: {
			perView: 2
		},
		768: {
			perView: 1
		}
		}
	})

	glide.mount()
</script>
<script>
	/*
	$(function() {
  	    var start = moment();
	    var end = moment().endOf('month');

	    function cb(start, end) {
	        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
	    }

	   $('.daterange').daterangepicker({
	        startDate: start,
	        endDate: end,
	        ranges: {
	           '<?php echo e(__('tourism.filterToday')); ?>': [moment(), moment()],
	           '<?php echo e(__('tourism.filterThisWeek')); ?>': [moment().startOf('week'), moment().endOf('week')],
	           '<?php echo e(__('tourism.filterNextWeek')); ?>': [moment(), moment().add(7, 'days')],
	           // 'Last 30 Days': [moment().subtract(29, 'days'), moment()],
	           // 'This Month': [moment().startOf('month'), moment().endOf('month'), moment()]
	           '<?php echo e(__('tourism.filterThisMonth')); ?>': [moment(), moment().endOf('month'), moment()],
	           '<?php echo e(__('tourism.filterNextMonth')); ?>': [moment().startOf('month'), moment().endOf('month'), moment()]
	           // 'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
	        }
	    }, cb);

	    cb(start, end);

	  	$('input[name="daterange"]').val('');
	  	$('input[name="daterange"]').attr("placeholder","Show Event by Date");
	});

	$('.daterange').on('apply.daterangepicker', function(ev, picker) {
        // $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));

		// var start = picker.startDate.format('YYYY-MM-DD'+' '+'00:00:00');
        // var end = picker.endDate.format('YYYY-MM-DD'+' '+'23:59:59');

		var picker_start = picker.startDate.format('YYYY-MM-DD');
		var picker_end = picker.endDate.format('YYYY-MM-DD');

		var today_start = moment().format('YYYY-MM-DD');
		var today_end = moment().format('YYYY-MM-DD');
		
		var week_start = moment().startOf('week').format('YYYY-MM-DD');
		var week_end = moment().endOf('week').format('YYYY-MM-DD');

		var seven_start = moment().format('YYYY-MM-DD');
		var seven_end = moment().add(7, 'days').format('YYYY-MM-DD');

		var month_this_start = moment().format('YYYY-MM-DD');
		var month_this_end = moment().endOf('month').format('YYYY-MM-DD');

		var month_start = moment().startOf('month').format('YYYY-MM-DD');
		var month_end = moment().endOf('month').format('YYYY-MM-DD');

		console.log(picker_end)
		console.log(week_end)

		var filter_type = "";
		if(picker_start == today_start && picker_end == today_end){
			filter_type = "Any Event on Today";
		}else if(picker_start == week_start && picker_end == week_end){
			filter_type = "Any Event on This Week";
		}else if(picker_start == seven_start && picker_end == seven_end){
			filter_type = "Any Event on Next 7 Days";
		}else if(picker_start == month_this_start && picker_end == month_this_end){
			filter_type = "Any Event on This Month";
		}else if(picker_start == month_start && picker_end == month_end){
			filter_type = "Any Event on Next Month";
		}

		$('input[name="daterange"]').val('');
	  	$('input[name="daterange"]').attr("placeholder", filter_type);
	});
	*/

	$.get('https://www.instagram.com/explore/tags/<?php echo e($ugc->hashtag); ?>/?__a=1', function (data, status) {
        for(var i = 0; i < 9; i++) {
            var imageUrl = data.graphql.hashtag.edge_hashtag_to_top_posts.edges[i].node;
            //membaca id per post
            var id_user = data.graphql.hashtag.edge_hashtag_to_top_posts.edges[i].node.owner.id
            //call api to get username profile
            $.get({
                url:'https://www.instagram.com/graphql/query/?query_hash=c9100bf9110dd6361671f113dd02e7d6&variables={"user_id":"'+id_user+'","include_chaining":false,"include_reel":true,"include_suggested_users":false,"include_logged_out_extras":false,"include_highlight_reels":false,"include_related_profiles":false}',
                async:false
            }, function (result, status) {
                var username = result.data.user.reel.owner.username
                $('#ugc_container').append('' +
                    '<div class="col-4 col-sm-4 col-lg-4 wow fadeIn ig_feed" data-wow-duration="2s" data-wow-delay="0.2s" id="list_ugc" style="padding:0px"> ' +
	                    '<div class="dlab-post-media dlab-img-effect zoom"> ' +
	                    	'<a target="_blank" href="https://instagram.com/'+username+'"><img src="'+  imageUrl.thumbnail_resources[2].src +'" alt="" class="img-cover" style="width:100%"></a>' +
	                    '</div>' +
                    '</div>' +
                    '');
            });
        }
	});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('tourism.layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>