@extends('profile.layouts.frontend')

@section('title', 'BOPLBF - Organization Structure/Position')

@section('content')
  <!-- Add your site or application content here -->
  <main id="bop">
  	<section id="home-destination" class="home-extra article"></section>

  	<section class="content" id="articles">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4">{{ __('profile.organization')  }}</h2>
  			</div>

  			<section>
          @if (isset($data->judul))
            <h1 class="post-title m-b0" style="margin-bottom: 0px;text-align:center"><a href="javascript:void(0);">{!! $data->judul !!}</a></h1>
          @endif
          @if (isset($data->deskripsi))
            {!! $data->deskripsi !!}
          @endif
          <br></br>
          <div class="dlab-box">
            @if (isset($data->image))
              <h2 style="margin-top:80px;text-align: center;">{{ __('profile.pictureTitle')  }}</h2>
              <img src="{{asset('uploads/ProfileOrg/'.$data->image.'')}}" alt="Chart" class="w-100"> 
            @endif
          </div>
          <br></br>
          <div class="dlab-box">
            @if (isset($data->image_2))
              <h2 style="margin-top:80px;text-align: center;">{{ __('profile.pictureSO')  }}</h2>
              <img src="{{asset('uploads/ProfileOrg/'.$data->image_2.'')}}" alt="Chart" class="w-100">
            @endif
          </div>
          @if (isset($data->video_url))
            <div class="dlab-divider bg-gray-dark"></div>
            <h2 style="margin-top:80px;text-align: center;">{{ __('profile.video')  }}</h2>
            <iframe width="560" height="315" src="{!! $data->video_url !!}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
          @endif
  			</section>
  		</div>
  	</section>
    @include('profile.include.contact')
  </main>
@endsection

@section('jscustom')
	
@stop