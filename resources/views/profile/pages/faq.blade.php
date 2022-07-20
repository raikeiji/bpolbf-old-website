@extends('profile.layouts.frontend')

@section('title', 'BOPLBF - FAQ')

@section('csscustom')
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
    <!-- Bootstrap-Iconpicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/css/bootstrap-iconpicker.min.css"/>
    <style>
        .pagination li.active span {
			color: #fff;
		}
    </style>
@stop
@section('content')
  <main id="bop">
  	<section id="home-destination" class="home-extra article"></section>

  	<section class="content" id="articles">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4">{{ __('profile.faq')  }}</h2>
  				<small>{{ __('profile.faq_desc')  }}</small>
  			</div>
  			<section>
  				<dl class="faq-list">
                    @foreach($faq as $f)
                        <dt>{!! $f->judul !!}</dt>
                        <dd>{!! $f->deskripsi !!}</dd>
                    @endforeach
  				</dl> 
  			</section>

  		</div>
    </section>
    <!-- Pagination -->
    <div class="pagination-bx clearfix text-center col-md-12">
        {{ $faq->links() }}
    </div>
    
    @include('profile.include.contact')
  </main>
@endsection

@section('jscustom')
<!-- Bootstrap-Iconpicker Bundle -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker-iconset-all.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.min.js"></script>
@stop