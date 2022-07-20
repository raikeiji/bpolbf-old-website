@extends('tourism.layouts.frontend_pages')

@section('title', 'BOPLBF - Rumah Produksi')

@section('content')
	<!-- Content -->
	<div id="home" class="page-content bg-white">
		<!-- inner page banner -->
		<div class="dlab-bnr-inr overlay-black-dark banner-content " style="background-image:url('{{asset('images/pulau_padar.jpg')}}');">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">{{ __('tourism.rumahProduksi') }}</h1>
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
                        <h1 class="post-title m-b0" style="margin-bottom: 0px;"><a href="javascript:void(0);">{!! $rumah_produksi->nama !!}</a></h1>
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
                        {!! $rumah_produksi->deskripsi !!}
                        <div class="dlab-divider bg-gray-dark"></div>
					</div>

					<div class="dlab-post-text">
                        <h2>{{ __('tourism.contact') }}</h2>
                       	<div class="section-full p-t50 p-b20 bg-primary text-white overlay-primary-dark footer-info-bar">
							<div class="container">
								<div class="row">
									<div class="col-lg-4 col-md-4 col-sm-12 m-b30">
										<div class="icon-bx-wraper bx-style-1 p-a20 radius-sm br-col-w1">
											<div class="icon-content">
												<h5 class="dlab-tilte">
													<span class="icon-sm"><i class="ti-location-pin"></i></span> 
													{{ __('tourism.address') }}
												</h5>
												<p class="op7">{{ $rumah_produksi->alamat }}</p>
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-12 m-b30">
										<div class="icon-bx-wraper bx-style-1 p-a20 radius-sm br-col-w1">
											<div class="icon-content">
												<h5 class="dlab-tilte">
													<span class="icon-sm"><i class="ti-alarm-clock"></i></span> 
													{{ __('tourism.hours') }}
												</h5>
												<p class="m-b0 op7">{{ $rumah_produksi->jam_buka }}</p>
												<!-- <p class="op7">Sunday - Close</p> -->
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-12 m-b30">
										<div class="icon-bx-wraper bx-style-1 p-a20 radius-sm br-col-w1">
											<div class="icon-content">
												<h5 class="dlab-tilte">
													<span class="icon-sm"><i class="ti-mobile"></i></span> 
													{{ __('tourism.phone') }}
												</h5>
												<p class="m-b0 op7">{{ $rumah_produksi->telepon }}</p>
												<!-- <p class="op7">Phone : +0 1234 5678 90</p> -->
											</div>
										</div>
									</div>
								</div>
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
@stop