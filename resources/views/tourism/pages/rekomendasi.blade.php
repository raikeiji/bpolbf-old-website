@extends('tourism.layouts.frontend_pages')

@section('title', 'BOPLBF - Recommendation')

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
  				<h2 class="mb-4">{{ __('tourism.recomendation') }}</h2>
  				<h5>Everything around Labuan Bajo</h5>
  			</div>

  			<div class="row mb-5 justify-content-center">
                @foreach($recomendation as $a)
					<div class="col-12 col-md-6 col-lg-4">
						<div class="card article">
							<img src="{{asset('uploads/TourismRekomendasi/'.$a->image.'')}}" class="card-img-top" alt="thumbnail" style="height: 250px">
							<div class="card-body">
								<h3 class="card-title mb-3">{{str_limit(strip_tags($a->judul), 32)}}</h3>
								<div class="text-center mt-4">
									<a href="{{$a->link_url}}" class="btn btn-block btn-outline-primary">{{ __('tourism.more') }}</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
            </div>

  			<div class="pagination-bx clearfix text-center col-md-12">
          {{-- {{ $recomendation->render() }} --}}
				</div>
  		</div>
    </section>
    
    @include('tourism.include.plan_trip')
  </main>
@endsection

@section('jscustom')
@stop