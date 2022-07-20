@extends('profile.layouts.frontend')

@section('title', 'BOPLBF - Respective Duties and Functions')

@section('content')

    <!-- Add your site or application content here -->
  <main id="bop">
  	<section id="home-destination" class="home-extra article"></section>

  	<section class="content" id="articles">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4">{{ __('profile.respective')  }}</h2>
  			</div>

  			<section class="text-center">
          @if (isset($data->deskripsi))
            {!! $data->deskripsi !!}
          @endif
        </section>
     
        @if (isset($data->video_url))
          <div class="dlab-divider bg-gray-dark"></div>
          <h2 style="margin-top:80px;text-align: center;">Video</h2>
          <div class="col-12 col-lg-12">
            <iframe width="560" height="315" style="margin: 0 auto;display:block" src="{!! $data->video_url !!}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
          </div>
        @endif
      
      </div>
  	</section>

  	@include('profile.include.contact')
  </main>

@endsection

@section('jscustom')
	
@stop