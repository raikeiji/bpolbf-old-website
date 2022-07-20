@extends('profile.layouts.frontend')

@section('title', 'BOPLBF - Officials')

@section('csscustom')
    <style>
        .pagination li.active span {
			color: #fff;
		}
    </style>
@stop

@section('content')


      <!-- Add your site or application content here -->
  <main id="bop">
  	<section id="home-destination" class="home-extra article"></section>

  	<section class="content" id="articles">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4">{{ __('profile.official')  }}</h2>
  			</div>

  			<section>
  				<ul class="list-unstyled official-list">
                    @foreach($officials as $official)
                        <li>
                            <div class="card mb-3">
                                <div class="card-body p-0">
                                    <div class="row news-item d-flex">
                                        <div class="col-12 col-lg-4">
                                            <img src="{{asset('uploads/ProfileOfficials/'.$official->image.'')}}" alt="photo" class="object-fit" width="120" height="140">
                                        </div>
                                        <div class="col-12 col-lg-8 p-4 pl-md-2">
                                                <h4 class="no-line mb-1">{{$official->nama}}</h4>
                                                <span class="text-muted">{{$official->jabatan}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    @if ($officials->isEmpty())
                        <div class="text-center">
                            <h3>{{ __('profile.notFound')  }}</h3>
                        </div>
                    @endif
  				</ul>
  			</section>
  		</div>
  	</section>

  	@include('profile.include.contact')
  </main>
@endsection

@section('jscustom')
@stop