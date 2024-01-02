<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VLK Editor - Resetowanie hasła</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <section id="login" class="login">
        <div class="app-logo">
            <h1>VLK Editor</h1>
        </div>
        @if (Session::has('message'))
            <div class="msg-feedback-ok" role="alert">{{ Session::get('message') }}</div>
        @elseif (Session::has('error'))
            <div class="msg-feedback-fail" role="alert">{{ Session::get('error') }}</div>
        @endif
        <div class="form-wrapper">
            <h2>Resetowanie hasła</h2>
            <form action="{{ route('vlk_register') }}" method="POST">
                @csrf
                <div class="form-control">
                    <label for="email"><i class="bx bxs-envelope"></i> Adres e-mail</label>
                    <input id="email" type="text" name="email">
                </div>
                @error('email')
                    <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                @enderror
                <div class="button-control">
                    <button type="submit">Reset</button>
                </div>
            </form>
            <hr>
            <p>&copy; 2023 Paweł "WilczeqVlk" Turoń. Wszelkie prawa zastrzeżone.</p>
        </div>
    </section>
</body>
</html>
