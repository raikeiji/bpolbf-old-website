@extends('homepage.sub.app')

@section('title', 'BOPLBF - Home')

@section('meta')
  @include('homepage.sub.meta')
@endsection

@section('content')
<!-- Add your site or application content here -->
<body id="landing-page">
	<header class="landing-page">
		<div class="container text-center py-4">
			<img src="{{asset('assets/img/logo1.png')}}" class="nav-logo landing-page" alt="Logo" height="80">
			<img src="{{asset('assets/img/logo.png')}}" class="nav-logo landing-page" alt="Logo" height="80">
			<img src="{{asset('assets/img/logo2.svg')}}" class="nav-logo landing-page" alt="Logo" height="80">
			@php $locale = session()->get('locale'); @endphp
			<ul class="navbar-nav ml-auto mb-2 mb-md-0">
				<li class="nav-item dropdown langselect" style="background-color: white;border-radius: 10px;margin-bottom:10px">
					@switch($locale)
						@case('en')
						<a class="nav-link dropdown-toggle" href="#" id="langselect" data-toggle="dropdown">EN</a>
						@break
						@case('id')
						<a class="nav-link dropdown-toggle" href="#" id="langselect" data-toggle="dropdown">ID</a>
						@break
						@default
						<a class="nav-link dropdown-toggle" href="#" id="langselect" data-toggle="dropdown">EN</a>
					@endswitch
					<ul class="dropdown-menu" aria-labelledby="langselect">
						<li><a class="dropdown-item" href="lang/en">EN</a></li>
						<li><a class="dropdown-item" href="lang/id">ID</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</header>
	<main>
		<section>
			<div class="glide homepage-slider">
					<div class="glide__track" data-glide-el="track">
						<ul class="glide__slides">
							<li class="glide__slide">
								<img src="{{asset('assets/img/home-bg.png') }}" class="object-fit" width="100%" height="100%" alt="thumbnail">
							</li>

							<li class="glide__slide">
								<img src="{{asset('assets/img/tour-bg2.jpg') }}" class="object-fit" width="100%" height="100%" alt="thumbnail">
							</li>

							<li class="glide__slide">
								<img src="{{asset('assets/img/tour-bg3.jpg') }}" class="object-fit" width="100%" height="100%" alt="thumbnail">
							</li>

							<li class="glide__slide">
								<img src="{{asset('assets/img/tour-bg4.jpg') }}" class="object-fit" width="100%" height="100%" alt="thumbnail">
							</li>
						</ul>
					</div>
				</div>

			<div class="container">
				<div class="menues">
					<div class="card landing-page-menu">
						<img src="{{asset('assets/img/home-bg.png') }}" class="card-img-top object-fit" height="300" alt="thumbnail">
						<div class="card-body">
							<h2 class="card-title d-none d-md-block no-line my-3" style="font-size:20px">{{ __('homepage.tourismTitle')}}</h2>
							<div class="details">
								<h2 class="no-line">{{ __('homepage.tourismTitle')}}</h2>
								<span>{{ __('homepage.tourismDetail')}}</span>
							</div>
							<a href="{{ route('tourism') }}" class="btn btn-block btn-outline-light">{{ __('homepage.visit')}} <span>{{ __('homepage.tourismTitle')}}</span></a>
						</div>
					</div>

					<div class="card landing-page-menu">
						<img src="{{asset('assets/img/tour-bg4.jpg') }}" class="card-img-top object-fit" height="300" alt="thumbnail">
						<div class="card-body">
							<h2 class="card-title d-none d-md-block no-line my-3" style="font-size:20px">{{ __('homepage.industryTitle')}}</h2>
							<div class="details">
								<h2 class="no-line">{{ __('homepage.industryTitle')}}</h2>
								<span>{{ __('homepage.tourismDetail')}}</span>
							</div>
							<a href="{{ route('investasi') }}" class="btn btn-block btn-outline-light">{{ __('homepage.visit')}} <span>{{ __('homepage.industryTitle')}}</span></a>
						</div>
					</div>

					<div class="card landing-page-menu">
						<img src="{{asset('assets/img/tour-bg3.jpg') }}" class="card-img-top object-fit" height="300" alt="thumbnail">
						<div class="card-body">
							<h2 class="card-title d-none d-md-block no-line my-3" style="font-size:20px">{{ __('homepage.authorityTitle')}}</h2>
							<div class="details">
								<h2 class="no-line">{{ __('homepage.authorityTitle')}}</h2>
								<span>{{ __('homepage.authorityDetail')}}</span>
							</div>
							<a href="{{ route('boplbf') }}" class="btn btn-block btn-outline-light">{{ __('homepage.visit')}} <span>{{ __('homepage.authorityTitle')}}</span></a>
						</div>
					</div>
				</div>
			</div>
		</section>
		
	</main>

	<!-- Footer -->
	<footer class="landing-page">
		<div class="real-footer text-center py-2">
			<span>2020 © Labuan Bajo Flores Tourism Authority</span>
		</div>
	</footer>
</body>


@endsection


@section('custom-script')
  @include('homepage.sub.custom-script')
@endsection