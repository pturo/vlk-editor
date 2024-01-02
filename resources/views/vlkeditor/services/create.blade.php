@extends('vlkeditor.layouts.admin')
@section('content')
    <div class="container">
        <div class="head">
            <h1>Dodaj usługę</h1>
        </div>
        <p>
            Dodawanie usługi jest bardzo proste. Wystarczy nadać nazwę, wybrać
            miniaturkę oraz dodać krótki opis i gotowe.
        </p>
        <div class="add-section">
            @if (Session::has('message'))
                <div class="msg-feedback-ok" role="alert">{{ Session::get('message') }}</div>
            @elseif (Session::has('error'))
                <div class="msg-feedback-fail" role="alert">{{ Session::get('error') }}</div>
            @endif
            <div class="form-wrapper">
                <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-control">
                        <label for="name"><i class="bx bx-pen"></i> Nazwa usługi</label>
                        <input id="name" type="text" name="name" value="{{ old('name', '') }}">
                    </div>
                    @error('name')
                        <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                    @enderror
                    <div class="form-control">
                        <label for="thumbnail"><i class="bx bx-image"></i> Miniatura</label>
                        <input id="thumbnail" type="file" name="thumbnail">
                    </div>
                    @error('thumbnail')
                        <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                    @enderror
                    <div class="form-control">
                        <label for="excerpt"><i class="bx bx-pen"></i> Krótki opis usługi</label>
                        <textarea name="excerpt" id="excerpt" cols="30" rows="10" value="{{ old('excerpt', '') }}"></textarea>
                    </div>
                    @error('excerpt')
                        <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                    @enderror
                    <div class="form-control-editor">
                        <label for="content"><i class="bx bx-pen"></i> Treść usługi</label>
                        <textarea name="content" id="content" cols="30" rows="10"></textarea>
                    </div>
                    @error('content')
                        <div class="button-control">
                            <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                        </div>
                    @enderror
                    <div class="button-control">
                        <button type="submit">Stwórz usługę</button>
                    </div>
                </form>
                <div class="button-control">
                    <span><a href="{{ route('services.index') }}">Powrót na poprzednią stronę</a></span>
                </div>
            </div>
        </div>
    </div>
    <!-- TinyMCE initializer -->
    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            'width': '100%',
            'language': 'pl',
        });
    </script>
@endsection
