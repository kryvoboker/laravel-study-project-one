<!DOCTYPE html>
<html lang="en">
<head>
    <title> Divisima | eCommerce Template</title>
    <meta charset="UTF-8">
    <meta name="description" content=" Divisima | eCommerce Template">
    <meta name="keywords" content="divisima, eCommerce, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="assets/front/img/favicon.ico" rel="shortcut icon"/>

    @include('front.partials.styles')

</head>
<body>
@include('front.partials.header')

@yield('content')

@include('front.partials.footer')

@include('front.partials.scripts')
</body>
</html>

