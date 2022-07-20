@extends('profile.layouts.frontend_pages')

@section('title', 'BOPLBF - News Release')
<style>
#tags {
  float: left;
  border: 1px solid #ccc;
  padding: 4px;
  font-family: Arial;
}

#tags span.tag {
  cursor: pointer;
  display: block;
  float: left;
  color: #555;
  background: #add;
  padding: 5px 10px;
  padding-right: 30px;
  margin: 4px;
}

#tags span.tag:hover {
  opacity: 0.7;
}

#tags span.tag:after {
  position: absolute;
  content: "×";
  border: 1px solid;
  border-radius: 10px;
  padding: 0 4px;
  margin: 3px 0 10px 7px;
  font-size: 10px;
}

#tags input {
  background: #eee;
  border: 0;
  margin: 4px;
  padding: 7px;
  width: auto;
}
</style>
@section('content')
    <!-- Add your site or application content here -->
    <main id="bop">
  	<section id="home-destination" class="home-extra article"></section>

  	<section class="content" id="articles">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4">{!! $data->judul !!}</h2>
  			</div>

  			<article>
          <span class="timestamp">Created at {!! $data->date !!}</span>
          @foreach($tags as $tag)
            <button class="btn" type="button" style="background-color:#23789B;padding:5px;font-size:12px;"><a href="{{url('boplbf/news/tags/'.$tag->tag.'')}}" style="color:white">{{$tag->tag}}</a></button>
          @endforeach

          {!! $data->deskripsi !!}
          @if ($data->document_pdf)
            <iframe style="width: 100%;height:900px" src="../../pdf/{{$data->document_pdf}}"></iframe>
          @endif
  			</article>

  			<div class="row mb-5 justify-content-center">
          @foreach($other_article as $a)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card article">
                    <img src="{{asset('uploads/ProfileNews/'.$a->image.'')}}" class="card-img-top" alt="thumbnail">
                    <div class="card-body">
                      <h3 class="card-title mb-3">{{$a->judul}}</h3>
                      <p class="card-text">{{str_limit(strip_tags($a->deskripsi), 180)}}</p>
                      <div class="text-center mt-4">
                          <a href="{{url('boplbf/news/'.$a->slug.'')}}" class="btn btn-block btn-outline-primary">{{ __('profile.readMore')  }}</a>
                      </div>
                    </div>
                </div>
            </div>
          @endforeach
  			</div>

  			<div class="text-center mt-5">
          <a href="{{route('boplbf.news')}}" class="btn btn-primary">{{ __('profile.viewMore')  }}</a>
				</div>
  		</div>
  	</section>

  	@include('profile.include.contact')
@endsection

@section('jscustom')
	
@stop