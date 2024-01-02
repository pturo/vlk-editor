<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VLK Editor - Panel rejestracyjny</title>

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
            <h2>Panel rejestracjyjny</h2>
            <form action="{{ route('vlk_register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-control">
                    <label for="name"><i class="bx bxs-user"></i> Użytkownik</label>
                    <input id="name" type="text" name="name" value="{{ old('name', '') }}" autofocus>
                </div>
                @error('name')
                    <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                @enderror
                <div class="form-control">
                    <label for="email"><i class="bx bxs-envelope"></i> Adres e-mail</label>
                    <input id="email" type="text" name="email" value="{{ old('email', '') }}">
                </div>
                @error('email')
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
                    <label for="password_confirmation"><i class="bx bxs-key"></i> Powtórz hasło</label>
                    <input id="password_confirmation" type="password" name="password_confirmation">
                </div>
                @error('password_confirmation')
                    <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                @enderror
                <div class="form-control">
                    <label for="profile_avatar"><i class="bx bxs-user"></i> Awatar</label>
                    <input id="profile_avatar" type="file" name="profile_avatar">
                </div>
                @error('profile_avatar')
                    <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                @enderror
                <div class="button-control">
                    <button type="submit">Stwórz konto</button>
                </div>
            </form>
            <hr>
            <p>&copy; 2023 Paweł "WilczeqVlk" Turoń. Wszelkie prawa zastrzeżone.</p>
        </div>
    </section>
</body>
</html>
