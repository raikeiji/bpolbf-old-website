<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!-- Footer -->
<footer class="pt-4 pt-md-5">
	<div class="container pb-4">
		<div class="row">
			<div class="col-12 col-md-3">
				<h5>{{ __('footer.about_tourism') }}</h5>
				<ul class="list-unstyled">
					<li> <a href="{{route('boplbf')}}">{{ __('footer.home') }}</a></li>
					<li><a href="{{route('boplbf.about')}}">{{ __('footer.about') }}</a></li>
					<li><a href="{{route('boplbf.mission')}}">{{ __('footer.mission') }}</a></li>
					<li><a href="{{route('boplbf.organization')}}">{{ __('footer.organization') }}</a></li>
					<li><a href="{{route('boplbf.respective')}}">{{ __('footer.respective') }}</a></li>
					<li> <a href="{{route('boplbf.program')}}">{{ __('footer.program') }}</a></li>
					<li> <a href="{{route('boplbf.news')}}">{{ __('footer.news') }}</a></li>
					<li> <a href="{{route('boplbf.report')}}">{{ __('footer.report') }}</a></li>
					<li> <a href="{{route('boplbf.faq')}}">{{ __('footer.faq') }}</a></li>
					<li> <a href="{{route('boplbf')}}#contact">{{ __('footer.contact') }}</a></li>
				</ul>
			</div>
			<div class="col-12 col-md-3">
				<h5>{{ __('footer.explore') }}</h5>
				<ul class="list-unstyled">
					<li><a href="/tourism#home">{{ __('footer.home') }}</a></li>
					<li><a href="/tourism#profile">{{ __('footer.labuanBajo') }}</a></li>
					<li><a href="/tourism#beyond">{{ __('footer.beyond') }}</a></li>
					<li><a href="/tourism#attraction">{{ __('footer.attraction') }}</a></li>
				</ul>
				<!-- <h5>Link</h5> -->
			</div>
			<!-- Menambahkan Link Kemenparekraf dan Kedaireka-->
			<div class="col-12 col-md-1">
				<h5>{{ __('footer.link') }}</h5>
				<ul class="list-unstyled">
					<li><a href="https://kemenparekraf.go.id/">{{ __('footer.kemenparekraf') }}</a></li>
					<li><a href="https://kedairekalabuanbajo.org/">{{ __('footer.kedaireka') }}</a></li>
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