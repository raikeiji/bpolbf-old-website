@extends('tourism.layouts.frontend_pages')

@section('title', 'BOPLBF - Destination')
<title>BOPLBF - {{$destination -> judul}}</title>
@section('content')
  <!-- Add your site or application content here -->
  <main>
  	<section id="home-destination" class="home-extra"></section>

  	<section class="content" id="destinations" style="padding-bottom:0px">
  		<div class="container">
  			<div class="text-center mb-5">
				<h2 class="mb-4">{{$destination -> judul}}</h2>
				<span>Discover the world heritage within Komodo National Park</span>
  			</div>

  			<article>
			  	<img src="{{asset('uploads/TourismDestinasi/'.$tipe.'/'.$destination->id.'/'.$destination->thumbnail.'')}}" class="card-img-top" alt="{{$destination->judul}}" style="max-width: 500px;max-height: 350px;text-align: center;display: block;margin-left: auto;margin-right: auto;margin-bottom:50px">						
				{!! $destination -> deskripsi !!}
            </article>
        </div>
	</section>

	<section style="margin-top:-60px;margin-bottom:25px">
		<div class="row">
			<div class="col-12 col-lg-12">
				@if (isset($destination->video_url))
					<div class="dlab-divider bg-gray-dark"></div>
					<h2 style="margin-top:80px;text-align: center;">Video</h2>
					<iframe width="560" height="315"  style="margin: 0 auto;display:block" src="{!! $destination->video_url !!}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
				@endif
			</div>
		</div>
	</section>

	<!--
	<section class="content" id="guide">
  		<div class="container">
  			<div class="text-center">
  				<h2>Travel Guideline</h2>
  			</div>

  			<div class="row py-4">
  				<div class="col col-md-12 mb-12">
  					<div class="media">
  						<div class="media-body">
						  {!! $destination -> panduan !!}
						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>
    !-->

    @include('tourism.include.plan_trip')
  </main>
@endsection

@section('jscustom')
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
@stop