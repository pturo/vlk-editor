<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta author="Paweł 'WilczeqVlk' Turoń">
    <title>VLK Editor</title>

    <!-- HTTP Security Headers -->
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests;">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta name="referrer" content="no-referrer">
    <meta http-equiv="X-XSS-Protection" content="1; mode=block">
    <meta http-equiv="Permissions-Policy" content="geolocation 'self'">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

     <!-- TinyMCE CDN -->
    <script src="https://cdn.tiny.cloud/1/1e25tlk84slzufkvjp79ydo4yjxhp8mfv4vhqoqfvts85nip/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
    <div class="sidebar-wrapper">
        @include('vlkeditor.partials.sidebar')
    </div>
    <div class="content-wrapper">
        @yield('content')
    </div>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
