<!-- Navigation -->
<nav class="navbar dashboard-navbar white-text navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <i class="fa fa-bars fa-2x"></i>
        </button>
        <a class="navbar-brand" href="{{ route('pages.main') }}">
            @if ($agent->isMobile())
                <img alt="Brand" style="height: 35px" src="{{ URL::to('/img/logo.png') }}">
            @endif
            @if ($agent->isDesktop())
                <img alt="Brand" src="{{ URL::to('/img/m_logo.png') }}">
            @endif
            @if ($agent->isTablet())
                <img alt="Brand" src="{{ URL::to('/img/m_logo.png') }}">
            @endif

        </a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                        class="fa fa-user"></i> {{ $user_info['first_name'] }} {{ $user_info['last_name'] }} <b
                        class="caret"></b></a>
            <ul class="dropdown-menu">
                @if(Auth::check())
                    <li>
                        <a href="{{ route('user.profile') }}"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a class="black-text" href="{{ route('user.logout') }}"><i class="fa fa-fw fa-power-off"></i>
                            Logout</a>
                    </li>
                @else
                    <li><a href="{{ route('user.signin') }}">Signin</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('user.signup') }}">Signup</a></li>
                @endif
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse in">
        <ul class="nav navbar-nav dashboard-navbar  side-nav">
            <li class="{{ Request::is('staff') ? 'active' : '' }}">
                <a href="{{ route('staff') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#pages"><i
                            class="fa fa-fw fa-shopping-basket"></i> Manage Products <i
                            class="fa fa-fw fa-caret-down"></i></a>
                <ul id="pages" class="collapse {{ Request::is('staff/products*') ? '' : 'in' }}">
                    <li class="{{ Request::is('staff/products') ? 'active' : '' }}">
                        <a href="{{ route('staff.current-products') }}">Product List</a>
                    </li>
                    <li class="{{ Request::is('staff/products/create') ? 'active' : '' }}">
                        <a href="{{ route('staff.products.create') }}">Create</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('staff/manager') ? 'active' : '' }}">
                <a href="{{ route('manager') }}"><i class="fa fa-fw fa-building"></i> Staff Management</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>

