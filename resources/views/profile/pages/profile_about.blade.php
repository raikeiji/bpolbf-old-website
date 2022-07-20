@extends('profile.layouts.frontend')

@section('title', 'BOPLBF - About')

@section('content')  
    <!-- Add your site or application content here -->
    <main id="bop">
  	<section id="home-destination" class="home-extra article"></section>

  	<section class="content" id="articles">
  		<div class="container">
  			<div class="text-center mb-5">
				<h1 class="mb-4">{{ __('profile.about_us')  }}</h2>
				@if (isset($data->judul))
					<h3 class="mb-4">{!! $data->judul !!}</h3>
				@endif
  			</div>

  			<section>
  				<div class="row">
  					<div class="col-12 col-lg-12">
						@if (isset($data->deskripsi))
							{!! $data->deskripsi !!}
						@endif
						@if (isset($data->video_url))
							<div class="dlab-divider bg-gray-dark"></div>
							<h2 style="margin-top:80px;text-align: center;">Video</h2>
							<iframe width="560" height="315"  style="margin: 0 auto;display:block" src="{!! $data->video_url !!}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
						@endif
  					</div>
  				</div>
  			</section>
  		</div>
  	</section>

  	@include('profile.include.contact')
  </main>
@endsection

@section('jscustom')
	
@stop