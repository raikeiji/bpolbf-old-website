@extends('tourism.layouts.frontend_pages')

@section('title', 'BOPLBF - Itinerary')

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
          <h2 class="mb-4">Itinerary</h2>
        </div>
        
        <div class="row">
          @foreach($packages as $package)
            <div class="col-12 col-md-6 col-lg-4">
              <div class="card destination" onclick="javascript:void(0)">
                <a href="{{url('tourism/package/'.$package->slug.'')}}"><img src="{{asset('uploads/TourismPackage/'.$package->id.'/'.$package->thumbnail.'')}}" class="card-img-top"></a>
                <div class="card-body">
                  @foreach($tags as $tag)
                    @if($tag->id_relasi == $package->id)
                      <h5 class="mb-2 pb-0"><span class="badge bg-primary">{{$tag->namaTag->nama_kategori_id}}</span></h5>
                    @endif
                  @endforeach
                
                  <h3 class="card-title mt-3 mb-2 pb-0">{{ $package->judul }}</h3>
                  <p class="card-text">{{str_limit(strip_tags($package->deskripsi), 180)}}</p>
                  <a href="{{url('tourism/package/'.$package->slug.'')}}" class="btn btn-primary">{{ __('tourism.read_more') }}</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    
    @include('tourism.include.plan_trip')
</main>
@endsection

@section('jscustom')
	
@stop