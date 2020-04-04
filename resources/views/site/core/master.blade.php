<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') - {{ config('settings.site_name') }}</title>
    @include('site.core.styles')
</head>
<body>
    <div id="wapper">
        @include('site.core.header')
        @include('site.core.nav')
        @yield('content')
        @include('site.core.footer')
    </div>
@include('site.core.scripts')
</body>
</html>