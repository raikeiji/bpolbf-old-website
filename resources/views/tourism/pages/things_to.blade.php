@extends('tourism.layouts.frontend_pages')

@section('title', 'BOPLBF - '.$title.'')

@section('content')

  <!-- Add your site or application content here -->
  <main>
  	<section id="home-destination" class="home-extra"></section>

  	<section class="content" id="destinations">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4">{{$title}}</h2>
  			</div>
			
			<div class="row">
			@foreach($destinations as $destination)
				@if($destination->is_homepage == 1)

				<div class="col-12 col-md-6 col-lg-4">
					<div class="card destination" onclick="javascript:void(0)">
						@if($destination->kategori == "labuan")
							<a href="{{url('tourism/destination/'.$destination->slug.'')}}"><img alt="" src="{{asset('uploads/TourismDestinasi/ELB/'.$destination->id_relasi.'/'.$destination->thumbnail.'')}}" class="card-img-top"></a> 
						@else
							<a href="{{url('tourism/destination/'.$destination->slug.'')}}"><img alt="" src="{{asset('uploads/TourismDestinasi/BLB/'.$destination->id_relasi.'/'.$destination->thumbnail.'')}}" class="card-img-top"></a> 
						@endif
						<div class="card-body">

							<!-- Category : <br> -->
							<div class="row">
							@foreach($tags as $tag)
								@if($tag->id_relasi == $destination->id_relasi)
								<h5 class="mb-2 pb-0"><span class="badge bg-primary">{{$tag->namaTag->nama_kategori_id}}</span></h5>
								@endif
							@endforeach
							</div>
							
							<h3 class="card-title mt-3 mb-2 pb-0">{{ $destination->judul }}</h3>
							<p class="card-text">{{str_limit(strip_tags($destination->deskripsi), 85)}}</p>
							<a href="{{url('tourism/destination/'.$destination->slug.'')}}" class="btn btn-primary">{{ __('tourism.read_more') }}</a>
						</div>
					</div>
				</div>
				@endif
			@endforeach
			@foreach($arts as $art)
				@if($art->is_homepage == 1)

				<div class="col-12 col-md-6 col-lg-4">
					<div class="card destination" onclick="javascript:void(0)">
						@if($art->kategori == "labuan")
							<a href="{{url('tourism/artcraft/'.$art->slug.'')}}"><img alt="" src="{{asset('uploads/TourismArtCraft/ELB/'.$art->id_relasi.'/'.$art->thumbnail.'')}}" class="card-img-top"></a> 
						@else
							<a href="{{url('tourism/artcraft/'.$art->slug.'')}}"><img alt="" src="{{asset('uploads/TourismArtCraft/BLB/'.$art->id_relasi.'/'.$art->thumbnail.'')}}" class="card-img-top"></a> 
						@endif
						<div class="card-body">

							<!-- Category : <br> -->
							<div class="row">
							@foreach($tagArts as $tag)
								@if($tag->id_relasi == $destination->id_relasi)
								<h5 class="mb-2 pb-0"><span class="badge bg-primary">{{$tag->namaTag->nama_kategori_id}}</span></h5>
								@endif
							@endforeach
							</div>
							
							<h3 class="card-title mt-3 mb-2 pb-0">{{ $art->judul }}</h3>
							<p class="card-text">{{str_limit(strip_tags($art->deskripsi), 85)}}</p>
							<a href="{{url('tourism/artcraft/'.$art->slug.'')}}" class="btn btn-primary">{{ __('tourism.read_more') }}</a>
						</div>
					</div>
				</div>
				@endif
			@endforeach
			@foreach($culinaries as $culinary)
				@if($culinary->is_homepage == 1)
				<div class="col-12 col-md-6 col-lg-4">
					<div class="card destination" onclick="javascript:void(0)">
						<a href="{{url('tourism/culinary/'.$culinary->slug.'')}}"><img alt="" src="{{asset('uploads/TourismCulinary/'.$culinary->id_relasi.'/'.$culinary->thumbnail.'')}}"></a> 
						
						<div class="card-body">

							<!-- Category : <br> -->
							<div class="row">
							@foreach($tagCulinarys as $tag)
								@if($tag->id_relasi == $destination->id_relasi)
								<h5 class="mb-2 pb-0"><span class="badge bg-primary">{{$tag->namaTag->nama_kategori_id}}</span></h5>
								@endif
							@endforeach
							</div>
							
							<h3 class="card-title mt-3 mb-2 pb-0">{{ $culinary->judul }}</h3>
							<p class="card-text">{{str_limit(strip_tags($culinary->deskripsi), 85)}}</p>
							<a href="{{url('tourism/culinary/'.$culinary->slug.'')}}" class="btn btn-primary">{{ __('tourism.read_more') }}</a>
						</div>
					</div>
				</div>
				@endif
			@endforeach
			</div>
  		</div>
    </section>
    
    @include('tourism.include.plan_trip')
  </main>

	
@endsection

@section('jscustom')
	
@stop