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
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-97386349-1', 'auto');
        ga('send', 'pageview');

    </script>

    <!-- Hotjar Tracking Code for pizzappi.uk -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:475830,hjsv:5};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
</body>
</html>