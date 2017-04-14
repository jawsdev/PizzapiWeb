<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="{{ URL::to('src/assets/materialize/js/materialize.min.js') }}"></script>
<script type="text/javascript">
    (function($) {
        $(function() {

            $('.dropdown-button').dropdown({
                    inDuration: 300,
                    outDuration: 225,
                    hover: true, // Activate on hover
                    belowOrigin: true, // Displays dropdown below the button
                    alignment: 'right' // Displays dropdown with edge aligned to the left of button
                }
            );

        }); // End Document Ready
    })(jQuery); // End of jQuery name space
</script>

