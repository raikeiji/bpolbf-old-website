@extends('profile.layouts.frontend_pages')

@section('title', 'BOPLBF - Report')

@section('content')
    <!-- Add your site or application content here -->
    <main id="bop">
  	<section id="home-destination" class="home-extra article"></section>

  	<section class="content" id="articles">
  		<div class="container">
  			<div class="text-center mb-5">
  				<h2 class="mb-4">{!! $report->judul !!}</h2>
  				<span>Created in {!! $report->date !!}</span>
			  </div>
			  @if ($report->document_pdf)
					<iframe style="width: 100%;height:900px" src="../../pdf/{{$report->document_pdf}}"></iframe>
				@endif

  			<section class="text-center">
  				<svg class="bi" width="64" height="64" fill="currentColor">
        		<use xlink:href="{{asset('assets/icons/bootstrap-icons.svg#file-earmark-zip')}}"/>
        	</svg>
  				<a href="{!! $report->file_url !!}" target="_blank" class="btn btn-lg btn-primary">
  					<svg class="bi" width="20" height="20" fill="currentColor">
          		<use xlink:href="{{asset('assets/icons/bootstrap-icons.svg#download')}}"/>
          	</svg> {{ __('profile.download')  }}
  				</a>
  			</section>
  		</div>
  	</section>

  	@include('profile.include.contact')
  </main>
@endsection

@section('jscustom')
@stop