<!DOCTYPE html>
<html>
<head>
    <title>Pizzapi - @yield("title")</title>
    @yield("facebookOG")
    <meta property="fb:app_id" content="1679738645660815"/>
    <meta name="description" content="A delicious pizza producing company!">
    <meta name="keywords" content="pizza, cornwall, food, drink, takeaway, take, away, takeout, dining, mozzarella, tomato, pepperoni">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <link rel="icon" href="https://pizzappi.uk/icon.ico">
    <!-- Include mobile or large display head files css -->
    @if ($agent->isDesktop())
        @include('layouts.large._l-head')
    @endif
    @if ($agent->isTablet())
        @include('layouts.large._l-head')
    @endif
    @if ($agent->isMobile())
        @include('layouts.small._s-head')
    @endif
    <!-- Include global css file that applies to main pages for both mobile and desktop -->
    <link rel="stylesheet" href="{{ URL::to('src/css/global.css') }}">
    @yield("stylesheets")
</head>

<body>
<div class="se-pre-con"></div>
<a name="top"></a>
<header>
    <!-- Include mobile or large display header for logo and naviation-->
    @if ($agent->isDesktop())
        @include('layouts.large._l-header')
    @endif
    @if ($agent->isTablet())
        @include('layouts.large._l-header')
    @endif
    @if ($agent->isMobile())
        @include('layouts.small._s-header')
    @endif
</header>
<main>
        <!-- Include the main page data-->
    @yield("content")
</main>
<footer>
    <!-- Include the large display footer or mobile footer-->
    @if ($agent->isDesktop())
        @include('layouts.large._l-footer')
    @endif
        @if ($agent->isTablet())
        @include('layouts.large._l-footer')
    @endif
    @if ($agent->isMobile())
        @include('layouts.small._s-footer')
    @endif
</footer>
    <!-- Include the scripts for Materialize and or mobile navigation-->
    @if ($agent->isDesktop())
       @include('layouts.large._l-scripts')
    @endif
    @if ($agent->isTablet())
       @include('layouts.large._l-scripts')
    @endif
    @if ($agent->isMobile())
        @include('layouts.small._s-scripts')
    @endif
    @include('partials._globalscripts')
    @yield('scripts')
</body>
</html>