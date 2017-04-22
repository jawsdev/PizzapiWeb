<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://pizzappi.uk/icon.ico">
    <title>Pizzapi | @yield("title")</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::to('src/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::to('src/assets/bootstrap/css/sb-admin.css') }}" rel="stylesheet">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ URL::to('src/assets/animate/animate.css') }}">

    <!-- Pizzapi CSS -->
    <link href="{{ URL::to('src/dashboard/custom.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ URL::to('src/assets/bootstrap/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
          type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">
    @include('layouts.dashboard._header')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Dashboard
                        <small>@yield("title")</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="{{ route('staff') }}">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> @yield("title")
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <!-- Page Content -->
            <div class="container-fluid">
                <div class="row">
                    <!-- Include the main page data-->
                    @yield("content")
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- Include vital scripts for Bootstrap -->
@include('layouts.dashboard._scripts')
<!-- /scripts -->
@yield('scripts')
</body>
</html>
