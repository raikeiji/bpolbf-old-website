@extends('tourism.layouts.frontend_pages')

@section('title', 'BOPLBF - Calendar Event')

@section('csscustom')
<link rel="stylesheet" type="text/css" href="{{asset('css/daterangepicker.css')}}">
@stop

@section('content')
<!-- Add your site or application content here -->
<main>
  	<section id="home-destination" class="home-extra event"></section>

  	<section class="content" id="events">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4">{{ __('tourism.calendar') }}</h2>
  				<small>Witness the customs and festivities of the locals</small>
  			</div>

  			<div class="row mb-5 justify-content-center">
                @foreach($event as $a)
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card event-item">
                            @php
                            if($a->kategori=="labuan"){
                                $tipe="ELB";
                            } else {
                                $tipe="BLB";
                            }
                            @endphp
                            <img src="{{asset('uploads/TourismEvent/'.$tipe.'/'.$a->id.'/'.$a->thumbnail.'')}}" class="card-img-top object-fit" alt="{{$a->judul}}" height="240">
                            <div class="date">
                                <span>{!! $a->tanggal !!}
                                </span>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title mb-3 p-0">{{ $a->judul }}</h3>
                                <small>25 Sep 2020, 09:00 WITA - 25 Sep 2020, 16:00 WITA</small>
                                
                                <div class="text-center mt-4">
                                    <a href="{{url('tourism/detail-event/'.$a->slug.'')}}" class="btn btn-block btn-outline-primary">Check event</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
              

            <div class="pagination-bx clearfix text-center col-md-12">
                {{ $event->render() }}
			</div>
  		</div>
      </section>
</main>
@endsection

@section('jscustom')
	
@stop