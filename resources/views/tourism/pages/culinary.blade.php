@extends('tourism.layouts.frontend_pages')

@section('title', 'BOPLBF - Culinary')

@section('csscustom')
<style>
.list-toko_item{
    box-shadow: 0px 0px 10px 5px rgba(0,0,0,.05);
    padding: 20px;
}
.list-toko_item__header{
    padding-bottom: 10px;
    border-bottom: 1px solid rgba(0,0,0,.1);
}
.list-toko_item__header .title{
    font-weight: bold;
    font-size: 1.3em;
}
.list-toko_item__body{
    padding-top: 10px;
}
.list-toko_item__body .address{
    font-size: 1em;
    margin-bottom: 5px;
}
.list-toko_item__body .open-hour{
    display: flex;
    align-items: center;
    margin-bottom: 3px;
}
.list-toko_item__body .open-hour i{
    width: 20px;
    font-size: 1.2em;
}
.list-toko_item__body .phone{
    display: flex;
    align-items: center;
}
.list-toko_item__body .phone i{
    width: 20px;
    font-size: 1.2em;
}
.list-toko_item__body .link{
    margin-top: 10px;
    text-align: right;
}
.list-toko_item__body .link .detail-link{
    background: #39a5d2;
    padding: 5px 20px;
    border-radius: 3px;
    color: white;
}
.list-toko_item__body .link .detail-link:hover{
    background: #2d99c4;
}
</style>
@endsection
@section('content')
	<!-- Content -->
	<div id="home" class="page-content bg-white">
		<!-- inner page banner -->
		<div class="dlab-bnr-inr overlay-black-dark banner-content " style="background-image:url('{{asset('images/pulau_padar.jpg')}}');">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">{{ __('tourism.culinary') }}</h1>
					<!-- Breadcrumb row -->
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
                        <h1 class="post-title m-b0" style="margin-bottom: 0px;"><a href="javascript:void(0);">{!! $culinary->judul !!}</a></h1>
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
                        {!! $culinary->deskripsi !!}
                        <div class="dlab-divider bg-gray-dark"></div>
					</div>
        

					<div class="dlab-post-text">
                        @if(!empty($resto))
						<h2>{{ __('tourism.resto') }}</h2>
                   
                        <div class="list-toko">
                            <div class="row">
                                @foreach($resto as $resto)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding-top:15px">
                                    <div class="list-toko_item">
                                        <div class="list-toko_item__header">
                                            <div class="title">{!! $resto->nama !!}</div>
                                        </div>
                                        <div class="list-toko_item__body">
                                            <div class="address">{!! $resto->alamat !!}</div>
                                            <div class="open-hour"><i class="ti-alarm-clock"></i> {!! $resto->jam_buka !!}</div>
                                            <div class="phone"><i class="fa fa-phone"></i>{!! $resto->telepon !!}</div>
                                            <div class="link"><a href="{{url('tourism/resto/'.$resto->id.'')}}" class="detail-link">DETAIL</a></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
						<div class="dlab-divider bg-gray-dark"></div>
						@if(!empty($galleries))
						<h2>Gallery</h2>
						<div class="row">
							<div class="col-md-12 col-lg-12 col-sm-12">
								<div class="product-gallery on-show-slider lightgallery" id="lightgallery"> 
									<div id="sync1" class="owl-carousel owl-theme owl-btn-center-lr m-b5 owl-btn-1 primary">
										@foreach($galleries as $gallery)
										<div class="item">
											<div class="mfp-gallery">
												<div class="dlab-box">
													<div class="dlab-thum-bx dlab-img-overlay1 ">
														<img src="{{asset('uploads/TourismCulinary/'.$gallery->id_relasi.'/gallery/'.$gallery->file_img.'')}}" alt="">
														<div class="overlay-bx">
															<div class="overlay-icon">
																<span data-exthumbimage="{{asset('uploads/TourismCulinary/'.$gallery->id_relasi.'/gallery/'.$gallery->file_img.'')}}" data-src="{{asset('uploads/TourismCulinary/'.$gallery->id_relasi.'/gallery/'.$gallery->file_img.'')}}" class="check-km" title="">		
																	<i class="ti-fullscreen"></i>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										@endforeach
									</div>
									<div id="sync2" class="owl-carousel owl-theme owl-none">
										@foreach($galleries as $gallery)
										<div class="item">
											<div class="dlab-media">
												<img src="{{asset('uploads/TourismCulinary/'.$gallery->id_relasi.'/gallery/'.$gallery->file_img.'')}}" alt="">
											</div>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
						<div class="dlab-divider bg-gray-dark"></div>
						@endif
						
						@if(!empty($vid))
						<h2>{{ __('tourism.video') }}</h2>
						<iframe width="560" height="315" src="https://www.youtube.com/embed/{{$vid}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						<div class="dlab-divider bg-gray-dark"></div>
						@endif
					

						<h2>{{ __('tourism.recommendation') }} {{ __('tourism.culinary') }}</h2>
						<div class="section-content p-b0">
								<div class="row">
                                    @foreach($recommendation as $r)
									<div class="col-lg-4 col-md-6 col-sm-6 m-b30" >
										<div class="dlab-box" style="height: 100%">
											<div class="dlab-media dlab-img-effect dlab-img-overlay1 no-hover" style="height: 100%"> 
                                            <a><img alt="" style="height: 100%" src="{{asset('uploads/TourismCulinary/'.$r->id.'/'.$r->thumbnail.'')}}" ></a> 
												<div class="dlab-info-has p-a20 no-hover">
													<div class="dlab-post-title" >
														<h4 class="post-title"><a href="{{url('tourism/culinary/'.$r->slug.'')}}">{!! $r->judul !!}</a></h4>
													</div>
												</div>
											</div>
										</div>
									</div>
                                    @endforeach
								</div>
							</div>
                    </div>
                    
                </div>
                
                <!-- blog END -->
            </div>
        </div>
		<!-- END Container -->
	</div>
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