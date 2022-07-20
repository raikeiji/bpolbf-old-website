@extends('tourism.layouts.frontend_pages')

@section('title', 'BOPLBF - Destination')

@section('csscustom')
<link rel="stylesheet" type="text/css" href="{{asset('css/daterangepicker.css')}}">
@stop

@section('content')
  <!-- Add your site or application content here -->
  <main>
  	<section id="home-destination" class="home-extra"></section>

  	<section class="content" id="destinations">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 id="title" class="mb-4"></h2>
  				<small>Dig deeper into the experiences in each destination</small>
  			</div>

  			<div class="row">
  				<div class="col mb-5 d-flex flex-wrap">
  					<div class="button-group mr-md-1">
  						<input type="checkbox" class="btn-check" id="btn-check-all" autocomplete="off">
							<label class="btn btn-outline-primary" for="btn-check-all">All</label>
						</div>
						<div class="button-group mx-1 ml-md-auto">
  						<input type="checkbox" class="btn-check" id="btn-check-nature" autocomplete="off">
							<label class="btn btn-outline-primary" for="btn-check-nature">Nature</label>
						</div>
						<div class="button-group mx-md-1">
							<input type="checkbox" class="btn-check" id="btn-check-leisure" autocomplete="off">
							<label class="btn btn-outline-primary" for="btn-check-leisure">Leisure</label>
						</div>
						<div class="button-group ml-md-1">
							<input type="checkbox" class="btn-check" id="btn-check-culture" autocomplete="off">
							<label class="btn btn-outline-primary" for="btn-check-culture">Culture</label>
  					</div>
  				</div>
  			</div>

  			<div class="row">
			@foreach($destination as $a)
				<div class="col-12 col-md-6 col-lg-4">
					<div class="card destination" onclick="javascript:void(0)">
						<img src="{{asset('uploads/TourismDestinasi/'.$tipe_destination.'/'.$a->id.'/'.$a->thumbnail.'')}}" class="card-img-top" alt="destination thumbnail">
						<div class="card-body">
						@foreach($a->tag as $tag)
							<span class="badge bg-primary" style="margin-right:5px">{{$tag->nama_kategori_id}}</span>
						@endforeach
						<h3 class="card-title mt-3 mb-2 pb-0">{{str_limit(strip_tags($a->judul), 20)}}</h3>
						<p class="card-text">{{str_limit(strip_tags($a->deskripsi), 120)}}</p>
						<a href="{{url('tourism/destination/'.$a->slug.'')}}" class="btn btn-primary">{{ __('tourism.read_more') }}</a>
						</div>
					</div>
				</div>
			@endforeach
			</div>

  			<div class="pagination-bx clearfix text-center col-md-12">
          		{{ $destination->render() }}
			</div>
  		</div>
    </section>
    
    @include('tourism.include.plan_trip')
  </main>
@endsection

@section('jscustom')
<script>
	function getUrlParameter(sParam) {
		var sPageURL = window.location.search.substring(1),
			sURLVariables = sPageURL.split('&'),
			sParameterName,
			i;

		for (i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split('=');

			if (sParameterName[0] === sParam) {
				return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
			}
		}
	};

	var kategori = getUrlParameter('kategori');
	if (kategori=="beyond"){
		$("#title").html("{{ __('tourism.destination_blb_detail') }}")
	} else {
		$("#title").html("{{ __('tourism.destination_elb_detail') }}")
	}
</script>
@stop