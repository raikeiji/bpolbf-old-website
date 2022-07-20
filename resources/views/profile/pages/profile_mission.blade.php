@extends('profile.layouts.frontend')

@section('title', 'BOPLBF - Mission and Vision Statement')

@section('content')

  <!-- Add your site or application content here -->
  <main id="bop">
  	<section id="home-destination" class="home-extra article"></section>

  	<section class="content" id="articles">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4">{{ __('profile.vision')  }}</h2>
  			</div>
  			<section class="text-center mb-5">
          @if (isset($data->vision))
            {!! $data->vision !!}
          @endif
  			</section>

  			<div class="text-center mb-5">
  				<h2 class="mb-4">{{ __('profile.mission')  }}</h2>
  			</div>
  			<section class="text-center mb-5">
          @if (isset($data->mission))
            {!! $data->mission !!}
          @endif  
        </section>

      </div>
      @if (isset($data->video_url))
        <div class="dlab-divider bg-gray-dark"></div>
        <h2>Video</h2>
        <iframe width="560" height="315" src="{!! $data->video_url !!}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
      @endif
  	</section>

  	@include('profile.include.contact')
  </main>
@endsection

@section('jscustom')
	
@stop