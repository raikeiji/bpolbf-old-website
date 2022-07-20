@extends('tourism.layouts.frontend_pages')

@section('title', 'BOPLBF - Information')

@section('content')
  <!-- Add your site or application content here -->
  <main>
    <section id="home-destination" class="home-extra"></section>
    <section class="content" id="destinations">
        <div class="container">
          <div class="text-center mb-5">
            <h1>{{ __('tourism.visaInformation') }}</h1>
            <h4 class="mb-4">{{$info -> judul}}</h4>
          </div>
          
          <div>
            {!! $info -> deskripsi !!}
          </div>
          @if ($info->document_pdf)
              <iframe style="width: 100%;height:900px" src="../../pdf/{{$info->document_pdf}}"></iframe>
          @endif
        </div>
    </section>
      
      @include('tourism.include.plan_trip')
  </main>
@endsection

@section('jscustom')

@stop