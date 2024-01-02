<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta author="Paweł 'WilczeqVlk' Turoń">
    <title>VLK Editor</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="sidebar-wrapper">
        @include('vlkeditor.partials.sidebar')
    </div>
    <div class="content-wrapper">
        @yield('content')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
