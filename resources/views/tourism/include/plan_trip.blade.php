<section class="content" id="trip">
    <div class="container">
        <div class="text-center">
        <h2>{{ __('tourism.planTitle') }}</h2>
        </div>
        @php
            $lang = session()->get('locale');
            if (!$lang){
                $lang = "id";
                $data = \App\TourismPlanTrip::select('panduan_desc as panduan','panduan_link','visa_desc as visa', 'recomendation_desc as recomendation', 'registration_desc as registration', 'registration_link')->first();
            }else{
                if($lang == "id"){
                    $data = \App\TourismPlanTrip::select('panduan_desc as panduan','panduan_link','visa_desc as visa', 'recomendation_desc as recomendation', 'registration_desc as registration', 'registration_link')->first();
                }else{
                    $data = \App\TourismPlanTrip::select('panduan_desc_'.$lang.' as panduan','panduan_link','visa_desc_'.$lang.' as visa', 'recomendation_desc_'.$lang.' as recomendation', 'registration_desc_'.$lang.' as registration', 'registration_link')->first();
                }
            }
        @endphp
        {{-- <p>{{$data->id}}</p> --}}
        <div class="row py-4">
        <div class="col col-md-6 mb-5">
            <div class="media">
                <img class="mr-3" src="{{ asset('assets/icons/icon-howtoget.svg') }}" alt="icon">
                <div class="media-body">
                    <h5 class="mt-0 mb-2">{{ __('tourism.how_get_there') }}</h5>
                    <p>{{($data == null) ? "" : $data->panduan}}</p>
                    <a href="{{($data == null) ? "" : $data->panduan_link}}"  target="_blank" class="btn btn-outline-light">{{ __('tourism.find_out') }}</a>
                </div>
            </div>
        </div>
        <div class="col col-md-6 mb-5">
            <div class="media">
                <img class="mr-3" src="{{ asset('assets/icons/icon-recommendation.svg') }}" alt="icon">
                <div class="media-body">
                    <h5 class="mt-0 mb-2">{{ __('tourism.recommendation') }}</h5>
                    <p>{{($data == null) ? "" : $data->recomendation}}</p>
                    <a href="{{url('tourism/recomendation')}}" class="btn btn-outline-light">{{ __('tourism.get_recommendation') }}</a>
                    {{-- <a href="https://drive.google.com/file/d/1iVTrYKkCx9VAE0ENd2w7ys6YtB9Kmz1D/view?usp=sharing" target="_blank" class="btn btn-outline-light">{{ __('tourism.get_recommendation') }}</a> --}}
                </div>
            </div>
        </div>
        <div class="col col-md-6 mb-5">
            <div class="media">
                <img class="mr-3" src="{{ asset('assets/icons/icon-visa.svg') }}" alt="icon">
                <div class="media-body">
                    <h5 class="mt-0 mb-2">{{ __('tourism.visaInformation') }}</h5>
                    <p>{{($data == null) ? "" : $data->visa}}</p>
                    @if(isset($visa))
                    <a href="{{url('tourism/visa-information/'.$visa->slug.'')}}" class="btn btn-outline-light">{{ __('tourism.read_more') }}</a>
                    @else
                    <a href="javascript:void(0)" class="btn btn-outline-light">{{ __('tourism.read_more') }}</a>
                    @endif
                    
                </div>
            </div>
        </div>
        <div class="col col-md-6 mb-5">
            <div class="media">
                <img class="mr-3" src="{{ asset('assets/icons/icon-register.svg') }}" alt="icon">
                <div class="media-body">
                    <h5 class="mt-0 mb-2">{{ __('tourism.registrationEngine') }}</h5>
                    <p>{{($data == null) ? "" : $data->registration}}</p>
                    <a href="{{($data == null) ? "" : $data->registration_link}}" target="_blank" class="btn btn-outline-light">{{ __('tourism.daftar') }}</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>