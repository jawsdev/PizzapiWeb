<div class="row grey darken-2 no_bottom_margin">
    <div class="col s12">
        <a class="aligner white-text text-uppercase error-text-small" href="#top">Top <i class="material-icons">arrow_drop_up</i></a>
    </div>
</div>
<div class="row grey darken-3 no_bottom_margin white-text">
    <div class="col s12">
        <div class="container">
        <div class="row">
            <div class="col s3">
                <h5 class="pizzapi-red-text">Menu</h5>
                <ul>
                    <li><a class="white-text" href="{{ route('product.index') }}"><h6>Pizza</h6></a></li>
                    <li><a class="white-text" href="{{ route('sides.index') }}"><h6>Sides</h6></a></li>
                    <li><a class="white-text" href="{{ route('drinks.index') }}"><h6>Drinks</h6></a></li>
                    <li><a class="white-text" href="{{ route('desserts.index') }}"><h6>Desserts</h6></a></li>
                </ul>
            </div>
            <div class="col s3">
                <h5 class="pizzapi-red-text">Company</h5>
                <ul>
                    <li><a class="white-text" href="{{ route('about.index') }}"><h6>About</h6></a></li>
                    <li><a class="white-text" href="#"><h6>Blog</h6></a></li>
                    <li><a class="white-text" href="#"><h6>Team</h6></a></li>
                    <li><a class="white-text" href="#"><h6>Careers</h6></a></li>
                    <li><a class="white-text" href="{{ route('staff') }}"><h6>Dashboard</h6></a></li>
                    <li><a class="white-text" href="{{ route('contact.index') }}"><h6>Contact</h6></a></li>
                </ul>
            </div>
            <div class="col s3">
                <h5 class="pizzapi-red-text">Opening Times</h5>
                <ul>
                    <li><a class="white-text"<h6>Tuesday to Sunday</h6></a></li>
                    <li><a class="white-text"><h6>1pm - 12am</h6></a></li>
                    <li><a class="white-text"><h6><br></h6></a></li>
                    <li><a class="white-text"><h6>Delivery Available</h6></a></li>
                    <li><a class="white-text"><h6>01736 555666</h6></a></li>
                </ul>
            </div>
            <div class="col s3">
                <h5 class="pizzapi-red-text">Social</h5>
                <ul class="fa-ul">
                    <li><i class="fa-li fa fa-twitter" aria-hidden="true"></i> Twitter</li>
                    <li><i class="fa-li fa fa-facebook " aria-hidden="true"></i> Facebook</li>
                    <li><i class="fa-li fa fa-instagram " aria-hidden="true"></i> Instagram</li>
                </ul>
            </div>
        </div>
        </div>
        <hr class="footer-hr">
        <div class="row no_bottom_margin">
            <div class="col s12">
                <div class="aligner">
                    <a href="/"><img class="footer-logo text-spacing logo-image" src="{{ URL::to('/') }}/img/logo.png"></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="aligner">
                    <span class="white-text error-text-small">Cornwall</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row grey grey darken-4 no_bottom_margin">
    <div class="col s12" style="padding: 20px;">
        <span class="aligner white-text error-text-small">
            <a class="white-text text-spacing" href="#">Conditions of Use</a>
            <span class="text-spacing">&copy; <?php echo date("Y"); ?> Pizzapi</span>
        </span>
    </div>
</div>

