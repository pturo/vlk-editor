@extends('vlkeditor.layouts.admin')
@section('content')
    <div class="container">
        <div class="head">
            <h1>Dodaj opinię</h1>
        </div>
        <p>
            Dodawanie opinii jest bardzo proste. Wystarczy podać imię i nazwisko osoby
            opiniującej z jej awatarem oraz recenzją.
        </p>
        <div class="add-section">
            @if (Session::has('message'))
                <div class="msg-feedback-ok" role="alert">{{ Session::get('message') }}</div>
            @elseif (Session::has('error'))
                <div class="msg-feedback-fail" role="alert">{{ Session::get('error') }}</div>
            @endif
            <div class="form-wrapper">
                <form action="{{ route('testimonials.update', [$testimonial->id]) }}" method="POST" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    @csrf
                    <div class="form-control">
                        <label for="client_avatar"><i class="bx bx-image"></i> Zdjęcie klienta</label>
                        <input id="client_avatar" type="file" name="client_avatar">
                    </div>
                    @error('client_avatar')
                        <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                    @enderror
                    <div class="form-control">
                        <label for="name"><i class="bx bx-pen"></i> Imię i nazwisko</label>
                        <input id="name" type="text" name="name" value="{{ $testimonial->name }}">
                    </div>
                    @error('name')
                        <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                    @enderror
                    <div class="form-control">
                        <label for="occupation"><i class="bx bx-pen"></i> Profesja/Stanowisko</label>
                        <input id="occupation" type="text" name="occupation" value="{{ $testimonial->occupation }}">
                    </div>
                    @error('occupation')
                        <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                    @enderror
                    <div class="form-control">
                        <label for="review"><i class="bx bx-pen"></i> Treść opinii</label>
                        <textarea name="review" id="review" cols="30" rows="10">{{ $testimonial->review }}</textarea>
                    </div>
                    @error('review')
                        <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                    @enderror
                    <div class="button-control">
                        <button type="submit">Aktualizuj opinię</button>
                    </div>
                </form>
                <div class="button-control">
                    <span><a href="{{ route('testimonials.index') }}">Powrót na poprzednią stronę</a></span>
                </div>
            </div>
        </div>
    </div>
@endsection
