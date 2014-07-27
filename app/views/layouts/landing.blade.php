<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 25/07/2014
 * Time: 06:54
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Track my world, coming soon...">
    <meta name="author" content="">

    <title>@yield('page_title') | @yield('site_title')</title>

    @include('shared.landing.global-header-css')

    @yield('additional-header-css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('additional-header-scripts')

</head>

<body>

@yield('content')

@include('shared.landing.global-footer-scripts')

@yield('additional-footer-scripts')

</body>

</html>
