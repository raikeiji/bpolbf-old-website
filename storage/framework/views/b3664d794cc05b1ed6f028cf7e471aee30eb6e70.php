<!-- JAVASCRIPT FILES ========================================= -->
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script><!-- JQUERY.MIN JS -->
<script src="<?php echo e(asset('plugins/wow/wow.js')); ?>"></script><!-- WOW JS -->
<script src="<?php echo e(asset('plugins/bootstrap/js/popper.min.js')); ?>"></script><!-- BOOTSTRAP.MIN JS -->
<script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.min.js')); ?>"></script><!-- BOOTSTRAP.MIN JS -->
<script src="<?php echo e(asset('plugins/bootstrap-select/bootstrap-select.min.js')); ?>"></script><!-- FORM JS -->
<script src="<?php echo e(asset('plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js')); ?>"></script><!-- FORM JS -->
<script src="<?php echo e(asset('plugins/magnific-popup/magnific-popup.js')); ?>"></script><!-- MAGNIFIC POPUP JS -->
<script src="<?php echo e(asset('plugins/counter/waypoints-min.js')); ?>"></script><!-- WAYPOINTS JS -->
<script src="<?php echo e(asset('plugins/counter/counterup.min.js')); ?>"></script><!-- COUNTERUP JS -->
<script src="<?php echo e(asset('plugins/imagesloaded/imagesloaded.js')); ?>"></script><!-- IMAGESLOADED -->
<script src="<?php echo e(asset('plugins/masonry/masonry-3.1.4.js')); ?>"></script><!-- MASONRY -->
<script src="<?php echo e(asset('plugins/masonry/masonry.filter.js')); ?>"></script><!-- MASONRY -->
<script src="<?php echo e(asset('plugins/owl-carousel/owl.carousel.js')); ?>"></script><!-- OWL SLIDER -->
<script src="<?php echo e(asset('plugins/lightgallery/js/lightgallery-all.min.js')); ?>"></script><!-- Lightgallery -->
<script src="<?php echo e(asset('js/custom.js')); ?>"></script><!-- CUSTOM FUCTIONS  -->
<script src="<?php echo e(asset('js/dz.carousel.min.js')); ?>"></script><!-- SORTCODE FUCTIONS  -->
<script src="<?php echo e(asset('plugins/countdown/jquery.countdown.js')); ?>"></script><!-- COUNTDOWN FUCTIONS  -->
<script src="<?php echo e(asset('js/dz.ajax.js')); ?>"></script><!-- CONTACT JS  -->
<script src="<?php echo e(asset('plugins/rangeslider/rangeslider.js')); ?>" ></script><!-- Rangeslider -->

<script src="<?php echo e(asset('js/jquery.lazy.min.js')); ?>"></script>
<!-- REVOLUTION JS FILES -->
<script src="<?php echo e(asset('plugins/revolution/revolution/js/jquery.themepunch.tools.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js')); ?>"></script>
<!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="<?php echo e(asset('plugins/revolution/revolution/js/extensions/revolution.extension.actions.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/revolution/revolution/js/extensions/revolution.extension.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/revolution/revolution/js/extensions/revolution.extension.kenburn.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/revolution/revolution/js/extensions/revolution.extension.layeranimation.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/revolution/revolution/js/extensions/revolution.extension.navigation.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/revolution/revolution/js/extensions/revolution.extension.parallax.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/revolution/revolution/js/extensions/revolution.extension.slideanims.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/revolution/revolution/js/extensions/revolution.extension.video.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/rev.slider.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.1.1/pdfobject.js"></script>
<script>
    jQuery(document).ready(function() {
        'use strict';
        dz_rev_slider_12();
        $('.lazy').Lazy();
    });	/*ready*/
</script>
<script>
    var options = {
        height: "700px",
    };
    PDFObject.embed("<?php echo e(asset('pdf/Panduan_Pengguna_Aplikasi_E-HAC.pdf')); ?>", $("#pdf_viwers"),options); 
    PDFObject.embed("<?php echo e(asset('pdf/TNK.pdf')); ?>", $("#pdf_viwers_2"),options); 
</script>
<script>
    // handle links with @href  started with '#' only
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