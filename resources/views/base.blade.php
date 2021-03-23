<!doctype html>
<html>

<head>
    <title>@yield('title')</title>
    <link rel="icon" type="image/gif/png/JPG" href="/media/bookNow.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    @yield('head')
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    @include('header');

    <div class="container" id="content">
        
        @yield('content')
    </div>
    <script src="{{ asset('js/footer.js') }}"></script>
</body>

</html>