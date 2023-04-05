<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio</title>
    <!-- Pavicon ICon -->
    @include('frontend.includes.style')
</head>
<body>

<!-- Header -->
@include('frontend.includes.header')
<!-- /Header -->

<main>
    <!-- Home -->
    @yield('content')
    <!-- /Contact -->
</main>

<!-- Footer -->
@include('frontend.includes.footer')
<!-- /Footer -->



@include('frontend.includes.script')
@stack('script')
</body>
</html>
