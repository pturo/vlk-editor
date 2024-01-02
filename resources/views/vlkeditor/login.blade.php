<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VLK Editor - Panel logowania</title>

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
            <h2>Panel logowania</h2>
            <form action="{{ route('vlk_login') }}" method="POST">
                @csrf
                <div class="form-control">
                    <label for="name"><i class="bx bxs-user"></i> Użytkownik</label>
                    <input id="name" type="text" name="name" value="{{ old('name', '') }}" autofocus>
                </div>
                @error('name')
                    <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                @enderror
                <div class="form-control">
                    <label for="password"><i class="bx bxs-key"></i> Hasło</label>
                    <input id="password" type="password" name="password">
                </div>
                @error('password')
                    <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                @enderror
                <div class="form-control">
                    <label for="remember-me">Zapamiętaj mnie</label>
                    <input id="remember-me" type="checkbox" name="remember-me" value="{{ old('remember-me') ? 'checked' : '' }}">
                </div>
                <div class="button-control">
                    <button type="submit">Zaloguj</button>
                </div>
            </form>
            <div class="button-control">
                <span>Nie pamiętasz hasła? <a href="{{ route('vlk_reset_index') }}">Kliknij tutaj</a></span>
            </div>
            <div class="button-control">
                <span>Nie masz konta? <a href="{{ route('vlk_register_index') }}">Załóż je</a></span>
            </div>
            <hr>
            <p>&copy; 2023 Paweł "WilczeqVlk" Turoń. Wszelkie prawa zastrzeżone.</p>
        </div>
    </section>
</body>
</html>
