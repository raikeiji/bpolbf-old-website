<!-- JAVASCRIPT FILES ========================================= -->
<script src="{{asset('js/jquery.min.js')}}"></script><!-- JQUERY.MIN JS -->
<script src="{{asset('plugins/wow/wow.js')}}"></script><!-- WOW JS -->
<script src="{{asset('plugins/bootstrap/js/popper.min.js')}}"></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{asset('plugins/bootstrap-select/bootstrap-select.min.js')}}"></script><!-- FORM JS -->
<script src="{{asset('plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script><!-- FORM JS -->
<script src="{{asset('plugins/magnific-popup/magnific-popup.js')}}"></script><!-- MAGNIFIC POPUP JS -->
<script src="{{asset('plugins/counter/waypoints-min.js')}}"></script><!-- WAYPOINTS JS -->
<script src="{{asset('plugins/counter/counterup.min.js')}}"></script><!-- COUNTERUP JS -->
<script src="{{asset('plugins/imagesloaded/imagesloaded.js')}}"></script><!-- IMAGESLOADED -->
<script src="{{asset('plugins/masonry/masonry-3.1.4.js')}}"></script><!-- MASONRY -->
<script src="{{asset('plugins/masonry/masonry.filter.js')}}"></script><!-- MASONRY -->
<script src="{{asset('plugins/owl-carousel/owl.carousel.js')}}"></script><!-- OWL SLIDER -->
<script src="{{asset('plugins/lightgallery/js/lightgallery-all.min.js')}}"></script><!-- Lightgallery -->
<script src="{{asset('js/custom.js')}}"></script><!-- CUSTOM FUCTIONS  -->
<script src="{{asset('js/dz.carousel.min.js')}}"></script><!-- SORTCODE FUCTIONS  -->
<script src="{{asset('plugins/countdown/jquery.countdown.js')}}"></script><!-- COUNTDOWN FUCTIONS  -->
<script src="{{asset('js/dz.ajax.js')}}"></script><!-- CONTACT JS  -->
<script src="{{asset('plugins/rangeslider/rangeslider.js')}}" ></script><!-- Rangeslider -->

<script src="{{asset('js/jquery.lazy.min.js')}}"></script>
<!-- REVOLUTION JS FILES -->
<script src="{{asset('plugins/revolution/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="{{asset('plugins/revolution/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{asset('plugins/revolution/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script src="{{asset('plugins/revolution/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{asset('plugins/revolution/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('plugins/revolution/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{asset('plugins/revolution/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script src="{{asset('plugins/revolution/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('plugins/revolution/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
<script src="{{asset('js/rev.slider.js')}}"></script>
<script>
    jQuery(document).ready(function() {
        'use strict';
        dz_rev_slider_12();
        $('.lazy').Lazy();
    });	/*ready*/
</script>

<script>
    // handle links with @href started with '#' only
    $(document).on('click', 'a[href^="#"]', function(e) {
        // target element id
        var id = $(this).attr('href');

        // target element
        var $id = $(id);
        if ($id.length === 0) {
            return;
        }

        // prevent standard hash navigation (avoid blinking in IE)
        e.preventDefault();

        // top position relative to the document
        var pos = $id.offset().top;

        // animated top scrolling
        $('body, html').animate({scrollTop: pos});
    });
</script>
<script type="text/javascript">
    $.get('https://www.instagram.com/explore/tags/labuanbajo/?__a=1', function (data, status) {
        for(var i = 0; i < 8; i++) {
            console.log(data);
            var $this = data.graphql.hashtag.edge_hashtag_to_top_posts.edges[i].node;
            $('#container').append('' +
                '<div class="col-lg-3 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s"> ' +
                '<div class="dlab-post-media dlab-img-effect zoom"> ' +
                '<img src="'+  $this.thumbnail_resources[2].src +'" alt="" class="img-cover">' +
                '</div>' +
                '</div>' +
                '');
        }
    });
</script>