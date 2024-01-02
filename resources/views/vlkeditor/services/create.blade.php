@extends('vlkeditor.layouts.admin')
@section('content')
    <div class="container">
        <div class="head">
            <h1>Dodaj usługę</h1>
        </div>
        <p>
            Tworzenie sekcji jest bardzo proste. Wystarczy nadać sekcji nazwę
            i dodać elementy, które będą się w niej znajdować.
        </p>
        <div class="add-section">
            @if (Session::has('message'))
                <div class="msg-feedback-ok" role="alert">{{ Session::get('message') }}</div>
            @elseif (Session::has('error'))
                <div class="msg-feedback-fail" role="alert">{{ Session::get('error') }}</div>
            @endif
            <div class="form-wrapper">
                <form action="{{ route() }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-control">
                        <label for="name">Nazwa usługi</label>
                        <input id="name" type="text" name="name" value="{{ old('name', '') }}">
                    </div>
                    @error('name')
                        <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                    @enderror
                    <div class="form-control">
                        <label for="thumbnail">Miniatura</label>
                        <input id="thumbnail" type="file" name="thumbnail">
                    </div>
                    @error('thumbnail')
                        <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                    @enderror
                    <div class="form-control">
                        <label for="excerpt">Krótki opis usługi</label>
                        <textarea name="excerpt" id="excerpt" cols="30" rows="10" value="{{ old('excerpt', '') }}"></textarea>
                    </div>
                    @error('excerpt')
                        <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                    @enderror
                    <div class="button-control">
                        <button type="submit">Stwórz sekcję</button>
                    </div>
                </form>
                <div class="button-control">
                    <span><a href="{{ route() }}">Powrót na poprzednią stronę</a></span>
                </div>
            </div>
        </div>
    </div>
@endsection
