@extends('investasi.layouts.frontend')

@section('title', 'Investasi')

<!--
<style>
	html, body {
		background-color: #fff;
		color: #636b6f;
		font-family: 'Raleway', sans-serif;
		font-weight: 100;
		height: 100vh;
		margin: 0;
	}

	.full-height {
		height: 100vh;
	}

	.flex-center {
		align-items: center;
		display: flex;
		justify-content: center;
	}

	.position-ref {
		position: relative;
	}

	.content {
		text-align: center;
	}

	.title {
		font-size: 36px;
		padding: 20px;
	}
</style>
<body cz-shortcut-listen="true">
	<div class="flex-center position-ref full-height">
		<div class="content">
			<div class="title">
				<h1>Under Construction</h1>  
				<p>We're making lots of improvements and will be back soon</p>  
				<a href="{{route('home')}}" style="font-size:16px;font-family:Helvetica,Arial,sans-serif;font-weight:normal;color:#ffffff;text-decoration:none;background-color:#5d9cec;border-top:15px solid #5d9cec;border-bottom:15px solid #5d9cec;border-left:25px solid #5d9cec;border-right:25px solid #5d9cec;border-radius:3px;display:inline-block" data-saferedirecturl="https://www.google.com/url?q=http://localhost:8000/admin-page/password/reset/4595c6233ed6df125d792169b8e7673a3a126937a0a382026e198ca46d943ba0&amp;source=gmail&amp;ust=1596052556207000&amp;usg=AFQjCNFzpHtuk1U5wvtdzPEW-mjNyx-isw">Back to Home</a>  
			</div>
		</div>
	</div>
</body>
-->
@php
$i=1;
@endphp
@if ($i==1)

@section('csscustom')
<!-- Custom Style -->
<style>
    .btn-quick-link {
        margin-top:-350px;
        display: block;
        font-weight: 700;
        font-size: 0.875rem;
        transition-duration: 0.3s;
        transition-timing-function: ease-in;
        transition-property: border;
        border-width: 1px;
        border-style: solid;
        border-color: initial;
        border-image: initial;
        border-radius: 200px;
        text-decoration: none !important;
    }
    .btn-quick-link-navigation-sky {
        color: rgb(255, 255, 255);
        border-color: #23789b;
    }
    .btn-quick-link-navigation-sky .btn-quick-link__body {
        background-color: #23789b;
    }
    .btn-quick-link-navigation-sky .btn-quick-link__body:hover {
        background-color: #23789b;
    }
    .btn-quick-link__body {
        color: inherit;
        position: relative;
        display: flex;
        transition-duration: 0.3s;
        transition-timing-function: ease-in;
        transition-property: background-color;
        margin: 4px;
        border-radius: 100px;
        padding: 20px;
    }
    .btn-quick-link__label {
        line-height: 1.1;
		font-size:  0.8em;
        margin: auto;
    }
    .btn-quick-link:hover{
        color:#fff;
    }
    @media (min-width: 1200px){
        .btn-quick-link {
            font-size: 1.375rem;
        }
    }
    
    #filter{

    }

    #social{
        margin: 0 0 8px 0 !important;
	}
	@media only screen and (max-width: 991px) {
	.site-header .main-bar .container{
		display: block;
	}
  }
  @media only screen and (max-width: 768px) {
	.btn-quick-link {
		margin-top: -500px;
	}
  }
</style>
@stop

@section('content')
	<!-- Add your site or application content here -->
	<main>
		<section id="home" class="invest" style="background:url('{{asset('uploads/SliderInvestment/'.$sliders[0]->file_img.'/')}}') top left no-repeat transparent;background-attachment: fixed">
			<h1 id="home-title">{{ __('investment.grow') }}
				<span class="subtitle d-none d-md-block">{{ __('investment.untap') }}</span>

				<div class="cta-group">
					<a href="{{route('investasi.berinvestasi')}}" class="btn btn-lg btn-primary">{{ __('investment.buttonTitleLeft') }}</a><br>
					<a href="{{route('investasi.pendanaan')}}" class="btn btn-sm btn-outline-light">{{ __('investment.buttonTitleRight') }}</a>
				</div>
			</h1>
		</section>
		<!--
  		<div id="invesment"></div>
		<section class="content" id="Invest-about">
			<div class="container">
				<div class="text-center">
					<h2>{{ __('investment.opportunity') }}</h2>
					<span>Labuan Bajo holds more than meets the eye</span>
				</div>

				<div class="row my-5 text-center">
					<div class="col">
						{!! $hn->deskripsi !!}
					</div>
				</div>
			</div>
		</section>
		<div id="factsheet"></div>
		<section class="content" id="facts">
			<div class="container">
				<div class="row py-4">
					@foreach($komoditas as $k)
					<div class="col-12 col-md-6 mb-5">
						<div class="media">
							<img class="mr-3" src="{{asset('uploads/InvestmentKomoditas/'.$k->image.'')}}" alt="icon" width="64">
							<div class="media-body">
								<h5 class="mt-0 mb-2">{{$k->judul}}</h5>
								<p>{{str_limit(strip_tags($k->deskripsi), 200)}}</p>
							</div>
						</div>
					</div>
					@endforeach
					@foreach($sektor as $s)
					<div class="col-12 col-md-6 mb-5">
						<div class="media">
							<img class="mr-3" src="{{asset('uploads/InvestmentSektor/'.$s->image.'')}}" alt="icon" width="64">
							<div class="media-body">
								<h5 class="mt-0 mb-2">{{$s->judul}}</h5>
								<p>{{str_limit(strip_tags($s->deskripsi), 200)}}</p>
							</div>
						</div>
					</div>
					@endforeach
					@foreach($benefit as $b)
					<div class="col-12 col-md-6 mb-5">
						<div class="media">
							<img class="mr-3" src="{{asset('uploads/InvestmentBenefit/'.$b->image.'')}}" alt="icon" width="64">
							<div class="media-body">
								<h5 class="mt-0 mb-2">{{$b->judul}}</h5>
								<p>{{str_limit(strip_tags($b->deskripsi), 200)}}</p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</section>

		<div id="how_invest"></div>
		<section class="content" id="Invest-now">
			<div class="container">
				<div class="row">
					<div class="col-12 col-lg-6 mb-5 mb-lg-0">
						<img src="{{asset('uploads/InvestmentHTI/'.$how_to_invest->image.'')}}" class="img-fluid w-100 h-100 object-fit" alt="thumbnail">
					</div>

					<div class="col-12 col-lg-6 mb-5 mb-lg-0">
						<div class="text-left">
							<h2 class="line-left">{{ __('investment.howTo') }}</h2>
						</div>
						{!! $how_to_invest->deskripsi !!}
					</div>
				</div>
			</div>
		</section>
		<div id="business"></div>
		<section class="content" id="Invest-insider">
			<div class="container text-center">
				<h2>{{ __('investment.insider') }}</h2>
			</div>

			<div class="container">
				<div class="glide">
					<div class="glide__track" data-glide-el="track">
						<ul class="glide__slides">
							@foreach($business as $b)
								<li class="glide__slide">
									<div class="media">
										<img src="{{asset('uploads/InvestmentBI/'.$b->image.'')}}" alt="photo" class="object-fit mr-3" width="120">
										<div class="media-body px-4">
											<p>{{str_limit(strip_tags($b->deskripsi), 250)}}</p>
											<span class="d-block text-right text-italic">{{$b->nama}}</span>
										</div>
									</div>
								</li>
							@endforeach
						</ul>
					</div>
					<div class="glide__arrows" data-glide-el="controls">
						<button class="glide__arrow glide__arrow--left" data-glide-dir="<">
							<svg class="bi" width="40" height="40" fill="currentColor">
								<use xlink:href="{{asset('assets/icons/bootstrap-icons.svg#caret-left')}}"/>
							</svg>
						</button>
						<button class="glide__arrow glide__arrow--right" data-glide-dir=">">
							<svg class="bi" width="40" height="40" fill="currentColor">
								<use xlink:href="{{asset('assets/icons/bootstrap-icons.svg#caret-right')}}"/>
							</svg>
						</button>
					</div>
					<div class="glide__bullets" data-glide-el="controls[nav]">
						<button class="glide__bullet" data-glide-dir="=0"></button>
						<button class="glide__bullet" data-glide-dir="=1"></button>
						<button class="glide__bullet" data-glide-dir="=2"></button>
					</div>
				</div>
			</div>

		</section>
		!-->
	</main>
@endsection

@section('jscustom')
<script>
var url_full = window.location.href;
if (url_full.includes("#")){
	var target = url_full.split("#")[1];
	$('html, body').animate({
		scrollTop: $('#' + target).offset().top - 100
	}, 200);
}


$('.nav-link').each(function(i, obj) {
	var target = $(this).attr("href").split('#')[1];

	$(this).click(function() {
		$('html, body').animate({
			scrollTop: $('#' + target).offset().top - 100
		}, 200);
	});
});
</script>
@stop

@endif
