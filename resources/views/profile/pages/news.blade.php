@extends('profile.layouts.frontend')

@section('title', 'BOPLBF - News Release')

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
  				<h2 class="mb-4">{{ __('profile.news')  }}</h2>
  				<small>{{ __('profile.news_desc')  }}</small>
  			</div>

  			<div class="row mb-5 justify-content-center">
                @foreach($news as $new)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card article">
                            <img src="{{asset('uploads/ProfileNews/'.$new->image.'')}}" class="card-img-top" alt="thumbnail">
                            <div class="card-body">
                                <h3 class="card-title mb-3">{{str_limit( $new->judul, 50) }}</h3>
                                <div class="timestamp mb-3">
                                    <a href="{{url('boplbf/news/'.$new->slug.'')}}">
                                        <svg class="bi" width="16" height="16" fill="currentColor">
                                            <use xlink:href="{{asset('assets/icons/bootstrap-icons.svg#calendar')}}"/>
                                        </svg>
                                        <small>
                                            {!! $new->date !!}
                                        </small>
                                    </a> | 
                                    @foreach($new->tags as $tag)
                                        <small>
                                            <a href="{{url('boplbf/news/tags/'.$tag->tag.'')}}" style="margin-right:3px">{{$tag->tag}}</a> 
                                        </small>
                                    @endforeach
                                </div>
                                <p class="card-text">{{str_limit(strip_tags($new->deskripsi), 80)}}</p>
                                <div class="text-center mt-4">
                                    <a href="{{ url('boplbf/news/'.$new->slug.'') }}" class="btn btn-block btn-outline-primary">{{ __('profile.readMore')  }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if ($news->isEmpty())
                    <div class="text-center">
                        <h3>{{ __('profile.notFound')  }}</h3>
                    </div>
                @endif
  			</div>

  			<!-- Pagination -->
            <div class="pagination-bx clearfix text-center col-md-12">
                {{ $news->links() }}
            </div>
            <!-- Pagination END -->
  		</div>
  	</section>

  	@include('profile.include.contact')
  </main>
@endsection

@section('jscustom')
@stop