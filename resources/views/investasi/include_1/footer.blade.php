<!-- Footer -->
<footer class="site-footer style1">
	<!-- footer top part -->
	<div class="footer-top" style="background-image:url({{asset('uploads/LayoutFooter/'.$footer->background_image.'')}}); background-size: contain;">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-12">
					<div class="widget widget_about">
					<div class="footer-bottom-logo"><a href="{{route('home')}}"><img src="{{asset('images/logo-boplbf.png')}}" alt=""></a></div>
						<p>{!! $footer->alamat !!}</p>
						<a style="color:white" href="{!! $footer->privacy_link !!}" target="_blank">{{ __('footer.privacyPolicy')}}</a>

					</div>
				</div>
				<div class="col-md-2 col-sm-12">
					<div class="widget">
						<h4 class="footer-title">{{ __('footer.home') }}</h4>
						<ul class="list-1">
							<li><a href="#home">{{ __('footer.home') }}</a></li>
							<li><a href="#invesment">{{ __('footer.opportunity') }}</a></li>
							<li><a href="#factsheet">{{ __('footer.factsheet') }}</a></li>
							<li><a href="#invest">{{ __('footer.howTo') }}</a></li>
							<li><a href="#bussiness">{{ __('footer.insider') }}</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-2 col-sm-12">
					<div class="widget">
						<h4 class="footer-title">{{ __('footer.find') }}</h4>
						<ul class="list-1">
							<li id="social"><a href="{!! $footer->facebook_link !!}"><button class="site-button facebook m-r15 circle-sm" type="button"><i class="fa fa-facebook"></i></button>Facebook</a></li>
							<li id="social"><a href="{!! $footer->instagram_link !!}"><button class="site-button instagram m-r15 circle-sm" type="button"><i class="fa fa-instagram"></i></button>Instagram</a></li>
							<li id="social"><a href="{!! $footer->twitter_link !!}"><button class="site-button twitter m-r15 circle-sm" type="button"><i class="fa fa-twitter"></i></button>Twitter</a></li>
							<li id="social"><a href="{!! $footer->youtube_link !!}"><button class="site-button youtube m-r15 circle-sm" type="button"><i class="fa fa-youtube-play"></i></button>Youtube</a></li>
						</ul>

					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom footer-line" style="background-color: transparent">
            <div class="container" style="margin-top: 10px;">
                <div class="footer-bottom-in">
				&copy; Copyright Badan Otorita Pariwisata Labuan Bajo Flores
                </div>
            </div>
        </div>
	</div>
</footer>
<button class="scroltop fa fa-chevron-up" style="display: inline-block;"></button>
<!-- Footer END -->