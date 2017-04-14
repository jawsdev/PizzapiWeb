<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script src="https://cdn.jsdelivr.net/cookie-bar/latest/cookiebar-latest.js"></script>

<script type="text/javascript">
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });

</script>

<!-- Materialize initializations  -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.parallax').parallax();
    });

    $('.carousel.carousel-slider').carousel({fullWidth: true});
</script>

<script type="text/javascript">
    $(document).ready(function () {
        // for HTML5 "required" attribute
        $("select[required]").css({
            display: "inline",
            height: 0,
            padding: 0,
            width: 0
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select').material_select();
    });
</script>

<script type="text/javascript">
    $('.dropdown-button2').dropdown({
            inDuration: 300,
            outDuration: 225,
            constrain_width: false, // Does not change width of dropdown to that of the activator
            hover: true, // Activate on hover
            gutter: ($('.dropdown-content').width()*3)/2.5 + 5, // Spacing from edge
            belowOrigin: false, // Displays dropdown below the button
            alignment: 'left' // Displays dropdown with edge aligned to the left of button
        }
    );
</script>
