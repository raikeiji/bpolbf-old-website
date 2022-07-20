@extends('tourism.layouts.frontend_pages')

@section('title', 'BOPLBF - Detail Event')

@section('content')

<!-- Add your site or application content here -->
<main>
  	<section id="home-destination" class="home-extra event"></section>

  	<section class="content" id="events">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4">{{ __('tourism.detailEvent') }} - {!! $event->judul !!}</h2>
				<h4 class="no-line">25 Sep 2020, 09:00 WITA - 25 Sep 2020, 16:00 WITA</h4>
			</div>

			<div class="row">
  				<div class="col-12 col-md-4 mb-5">
  					<img src="{{asset('uploads/TourismEvent/'.$tipe.'/'.$event->id.'/'.$event->thumbnail.'')}}"" class="h-100 w-100 object-fit" alt="sample">
  				</div>
  				<div class="col-12 col-md-8 mb-5">
					{!! $event->deskripsi !!}
				</div>
  			</div>
        </div>
    </section>

    @include('tourism.include.plan_trip')
</main>
@endsection

@section('jscustom')
	
@stop