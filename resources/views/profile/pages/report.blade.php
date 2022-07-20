@extends('profile.layouts.frontend')

@section('title', 'BOPLBF - Report')

@section('csscustom')
    <style>
        .pagination li.active span {
			color: #fff;
        }
        .blog-md .dlab-post-info_container{
            display: flex;
            flex-direction: column;
            height: 100%;
            justify-content: space-between;
            background: white;
            padding: 10px;
        }
        .blog-md .dlab-post-info{
            padding: 0;
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
                    <h2 class="mb-4">Reports</h2>
                </div>

                <section>
                    <ul class="list-unstyled news-list report list">
                        @foreach($reports as $report)
                        <li>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row news-item d-flex">
                                        <div class="col-12">
                                            <a href="{{ url('boplbf/report/'.$report->slug.'') }}">
                                                <h6 class="no-line mb-1">{{ $report->judul }}</h6>
                                                <div class="timestamp mb-0">
                                                    <svg class="bi" width="16" height="16" fill="currentColor">
                                                        <use xlink:href="{{asset('assets/icons/bootstrap-icons.svg#calendar')}}"/>
                                                    </svg>
                                                    <small>
                                                        {{ $report->date }}
                                                    </small>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </section>
            </div>
        </section>
        <div class="pagination-bx clearfix text-center col-md-12">
            {{ $reports->links() }}
        </div>
        @include('profile.include.contact')
    </main>
@endsection

@section('jscustom')
@stop