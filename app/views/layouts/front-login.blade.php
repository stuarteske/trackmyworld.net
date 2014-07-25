<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('site_description')">
    <meta name="author" content="@yield('site_author')">

    <title>@yield('site_title') | Prayer Planner</title>

    @include('shared.front.site-global-header-css')

    @yield('additional-header-css')

    @yield('additional-header-scripts')

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
@include('shared.front.site-global-flash-messages')

@yield('content')


@include('shared.front.site-global-footer-scripts')

@yield('additional-footer-scripts')
</body>

</html>
