<!--Import jQuery First-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ URL::to('src/assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });
    $('.carousel.carousel-slider').carousel({fullWidth: true});
    $('.collapse').collapse()

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

</script>