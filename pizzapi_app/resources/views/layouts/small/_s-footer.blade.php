{{--<div class="row pizzapi-grey no_bottom_margin">--}}
    {{--<div class="row">--}}
        {{--<div class="col s12 center-align">--}}
            {{--<h5 class="pizzapi-red-text">Menu</h5>--}}
            {{--<ul>--}}
                {{--<li><a class="white-text" href="{{ route('product.index') }}"><h6>Pizza</h6></a></li>--}}
                {{--<li><a class="white-text" href="{{ route('sides.index') }}"><h6>Sides</h6></a></li>--}}
                {{--<li><a class="white-text" href="{{ route('drinks.index') }}"><h6>Drinks</h6></a></li>--}}
                {{--<li><a class="white-text" href="{{ route('desserts.index') }}"><h6>Desserts</h6></a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
        {{--<div class="col s12 center-align">--}}
            {{--<h5 class="pizzapi-red-text">Company</h5>--}}
            {{--<ul>--}}
                {{--<li><a class="white-text" href="{{ route('about.index') }}"><h6>About</h6></a></li>--}}
                {{--<li><a class="white-text" href="#"><h6>Blog</h6></a></li>--}}
                {{--<li><a class="white-text" href="#"><h6>Team</h6></a></li>--}}
                {{--<li><a class="white-text" href="#"><h6>Careers</h6></a></li>--}}
                {{--<li><a class="white-text" target="_blank" href="{{ route('staff') }}"><h6>Dashboard</h6></a></li>--}}
                {{--<li><a class="white-text" href="{{ route('contact.index') }}"><h6>Contact</h6></a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
        {{--<div class="col s12 center-align">--}}
            {{--<h5 class="pizzapi-red-text">Opening Times</h5>--}}
            {{--<ul>--}}
                {{--<li><a class="white-text"><h6>Tuesday to Sunday</h6></a></li>--}}
                {{--<li><a class="white-text"><h6>13pm - 12am</h6></a></li>--}}
                {{--<li><a class="white-text"><h6><br></h6></a></li>--}}
                {{--<li><a class="white-text"><h6>Delivery Available</h6></a></li>--}}
                {{--<li><a class="white-text"><h6>01736 555666</h6></a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
        {{--<div class="col s12 center-align">--}}
            {{--<h5 class="pizzapi-red-text">Social</h5>--}}
            {{--<ul class="white-text center-align">--}}
                {{--<li><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</li>--}}
                {{--<li><i class="fa fa-facebook " aria-hidden="true"></i> Facebook</li>--}}
                {{--<li><i class="fa fa-instagram " aria-hidden="true"></i> Instagram</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}


<div class="row no_bottom_margin navigation_bar pizzapi-grey">
    <div class="col s4">
        <div class="s_nav_wrap">
            <a href="{{ route('pages.main') }}"><i class="material-icons small second_nav_icons white-text">home</i></a>
        </div>
    </div>
    <div class="col s4">
        <div class="aligner">
            <div class="aligner-item--fixed">
                <a onclick="toggleNav()"><i class="material-icons hamburger_icon medium white-text">menu</i></a>
            </div>
        </div>
    </div>
    <div class="col s4">
        <div class="aligner">
            <div class="aligner-item--fixed">
                <a href="{{ route('user.profile') }}"><i class="material-icons small second_nav_icons white-text">account_circle</i></a>
            </div>
        </div>
    </div>
</div>

