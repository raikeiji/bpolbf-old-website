@extends('tourism.layouts.frontend_pages')

@section('title', 'BOPLBF - Announcement')
<title>BOPLBF - {{$announcement -> judul}}</title>
@section('content')  
  <!-- Add your site or application content here -->
  <main>
  	<section id="home-destination" class="home-extra article"></section>

  	<section class="content" id="articles">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4">{{$announcement -> judul}}</h2>
  			</div>

  			<article>
  				<span class="timestamp">Created at {{$announcement->tanggal}}</span>
                {!! $announcement -> deskripsi !!}
            </article>

  			<div class="text-center mb-5">
  				<h2 class="mb-4">{{ __('tourism.other_announcement') }}</h2>
  			</div>

  			<div class="row mb-5 justify-content-center">
                @foreach($other_article as $a)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card article">
                        <img src="{{asset('uploads/TourismAnnouncement/'.$a->image.'')}}" class="card-img-top" alt="thumbnail">
                        <div class="card-body">
                <h3 class="card-title mb-3">{{$a->judul}}</h3>
                <p class="card-text">{{str_limit(strip_tags($a->deskripsi), 180)}}</p>
                            <div class="text-center mt-4">
                                <a href="{{url('tourism/announcement/'.$a->slug.'')}}" class="btn btn-block btn-outline-primary">{{ __('tourism.read_more') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('t.announcement')}}" class="btn btn-primary">{{ __('tourism.other_announcement') }}</a>
            </div>
        </div>
    </section>

    @include('tourism.include.plan_trip')
  </main>
@endsection

@section('jscustom')
@stop