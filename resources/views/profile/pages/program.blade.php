@extends('profile.layouts.frontend')

@section('title', 'BOPLBF - Program')

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
      <!-- Add your site or application content here -->
    <main id="bop">
        <section id="home-destination" class="home-extra article"></section>

        <section class="content" id="BOP-Program">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="mb-4">{{ __('profile.program')  }}</h2>
                </div>
                <div class="row py-4 program-list">
                    @foreach($programs as $program)
                        <div class="col col-md-6 mb-5">
                            <a href="{{ url('boplbf/program/'.$program->slug.'') }}" class="program-item">
                                <div class="media d-flex align-items-center">
                                    <i class="{{$program->icon}}" style='font-size:45px;margin-right:5px'></i>
                                    <div class="media-body">
                                        <h4 class="mt-0 mb-2 no-line">{{$program->judul}}</h4>
                                        <small class="text-muted">{{str_limit(strip_tags($program->deskripsi), 50)}}</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Pagination -->
        <div class="pagination-bx clearfix text-center col-md-12">
            {{ $programs->links() }}
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