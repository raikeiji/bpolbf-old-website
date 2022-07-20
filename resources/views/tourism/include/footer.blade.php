<!-- Footer -->
<footer class="pt-4 pt-md-5" style="background-image:url({{asset('uploads/LayoutFooter/'.$footer->background_image.'')}});">
	<div class="container pb-4">
		<div class="row">
			<div class="col-12 col-md-3">
				<h5>{{ __('footer.about_tourism') }}</h5>
				<ul class="list-unstyled">
					<li><a href="{{ route('tourism') }}">{{ __('header.tourism') }}</a></li>
					<li><a href="{{ route('investasi') }}">{{ __('header.invest') }}</a></li>
					<li><a href="{{ route('boplbf') }}">{{ __('header.authority') }}</a></li>
					<li><a href="{!! $footer->privacy_link !!}">{{ __('footer.privacyPolicy')}}</a></li>
				</ul>
			</div>
			<div class="col-12 col-md-3">
				<h5>{{ __('footer.explore') }}</h5>
				<ul class="list-unstyled">
					<li><a href="{{ route('home') }}">{{ __('footer.home') }}</a></li>
					<li><a href="{{route('d.destination')}}?kategori=labuan">{{ __('footer.labuanBajo') }}</a></li>
					<li><a href="{{route('d.destination')}}?kategori=beyond">{{ __('footer.beyond') }}</a></li>
					<li><a href="{{route('t.calendar_event')}}">{{ __('footer.attraction') }}</a></li>
				</ul>
			</div>
			<div class="col-12 col-md-4 ml-auto">
				<img src="{{asset('assets/img/logo.png')}}" class="footer-logo" alt="Logo" height="80">
				<p class="footer-address">{!! $footer->alamat !!}</p>
			</div>
		</div>
	</div>
	<div class="real-footer text-center py-2">
		<span>2020 © Labuan Bajo Flores Tourism Authority</span>
	</div>
</footer>
<!-- Footer END -->