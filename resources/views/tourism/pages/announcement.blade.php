@extends('tourism.layouts.frontend_pages')

@section('title', 'BOPLBF - Article')

@section('csscustom')
<link rel="stylesheet" type="text/css" href="{{asset('css/daterangepicker.css')}}">
@stop

@section('content')
  <!-- Add your site or application content here -->
  <main>
  	<section id="home-destination" class="home-extra article"></section>

  	<section class="content" id="articles">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4">{{ __('tourism.announcement') }}</h2>
  				<small>Everything around Labuan Bajo</small>
  			</div>

  			<div class="row mb-5 justify-content-center">
        @foreach($announcement as $a)
					<div class="col-12 col-md-6 col-lg-4">
						<div class="card article">
							<img src="{{asset('uploads/TourismAnnouncement/'.$a->image.'')}}" class="card-img-top" alt="thumbnail">
							<div class="card-body">
								<h3 class="card-title mb-3">{{str_limit(strip_tags($a->judul), 32)}}</h3>
								<p class="card-text">{{str_limit(strip_tags($a->deskripsi), 180)}}</p>
								<div class="text-center mt-4">
									<a href="{{url('tourism/announcement/'.$a->slug.'')}}" class="btn btn-block btn-outline-primary">{{ __('tourism.read_more') }}</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
        </div>

  			<div class="pagination-bx clearfix text-center col-md-12">
          {{ $announcement->render() }}
				</div>
  		</div>
    </section>
    
    @include('tourism.include.plan_trip')
  </main>
@endsection

@section('jscustom')
@stop