@extends('profile.layouts.frontend_pages')

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
    <div id="home" style="margin-top:20px">
        <!-- FAQ Section -->
        <div id="program">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="text-center">
                            <h2>{{ __('profile.faq')  }} - {{$detail_name}}</h2>
                            <hr style="width:200px;">
                        </div>
                        <div class="dlab-accordion faq-1 box-sort-in m-b30" id="accordion1">
                            @foreach($data as $f)
                                <div class="panel">
                                    <div class="acod-head">
                                        <h6 class="acod-title"> 
                                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#faq{{ $f->id }}" class="collapsed" aria-expanded="false">
                                            {!! $f->judul !!}</a> </h6>
                                    </div>
                                    <div id="faq{{ $f->id }}" class="acod-body collapse" data-parent="#accordion1" style="">
                                        <div class="acod-content">{!! $f->deskripsi !!}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END FAQ Section -->
    </div>
@endsection

@section('jscustom')
<!-- Bootstrap-Iconpicker Bundle -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker-iconset-all.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.min.js"></script>
@stop