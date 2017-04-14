<link rel="stylesheet" type="text/css" href="{{ URL::to('src/assets/bootstrap/font-awesome/css/font-awesome.min.css') }}">
<!--Import jQuery before materialize.js-->
<script type="text/javascript" async src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" async src="{{ URL::to('src/assets/materialize/js/materialize.min.js') }}"></script>
<script type="text/javascript" async src="{{ URL::to('src/assets/parsley/js/parsley.min.js') }}"></script>


<script>
    function toggleNav() {
        var x = document.getElementById('myNav');
        if (x.style.height === '0%') {
            x.style.height = '100%';
        } else {
            x.style.height = '0%';
        }
    }
</script>

<script>
    $(document).ready(function(){
        $('.collapsible').collapsible();
    });

</script>