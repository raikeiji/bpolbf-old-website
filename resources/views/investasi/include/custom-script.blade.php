<!-- Bootstrap JS -->
<script src="{{ asset('vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Vendors -->
<script src="{{ asset('vendors/glide/glide.min.js')}}"></script>
<!-- Theme -->
<script src="{{ asset('assets/js/plugins.js')}}"></script>
<script src="{{ asset('assets/js/main.js')}}"></script>

<script>
    // Glide initialize
    var glide = new Glide('.glide', {
        type: 'carousel',
        perView: 1,
        animationDuration: 1000,
        autoplay: 5000
    })

    glide.mount()
</script>