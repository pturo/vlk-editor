@extends('vlkeditor.layouts.admin')
@section('content')
    <div class="container">
        <div class="head">
            <h1>Aktualizuj wpis</h1>
        </div>
        <p>
            Aktualizacja wpisu na bloga jest bardzo prost. Dokonaj zmiany w wybranym
            polu formularza i zatwierdź zmiany.
        </p>
        <div class="add-section">
            @if (Session::has('message'))
                <div class="msg-feedback-ok" role="alert">{{ Session::get('message') }}</div>
            @elseif (Session::has('error'))
                <div class="msg-feedback-fail" role="alert">{{ Session::get('error') }}</div>
            @endif
            <div class="form-wrapper">
                <form action="{{ route('blog.update', [$post->id]) }}" method="POST" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    @csrf
                    <div class="form-control">
                        <label for="title"><i class="bx bx-pen"></i> Tytuł</label>
                        <input id="title" type="text" name="title" value="{{ $post->title }}">
                    </div>
                    @error('title')
                        <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                    @enderror
                    <div class="form-control">
                        <label for="author"><i class="bx bx-pen"></i> Autor</label>
                        <input id="author" type="text" name="author" value="{{ $post->author }}">
                    </div>
                    @error('author')
                        <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                    @enderror
                    <div class="form-control">
                        <label for="category"><i class="bx bx-pen"></i> Kategoria</label>
                        <select name="category" id="category">
                            <option value="">Wybierz kategorię</option>
                            <option value="Kategoria 1" {{ $post->category == "Kategoria 1" ? 'selected' : '' }}>Kategoria 1</option>
                            <option value="Kategoria 2" {{ $post->category == "Kategoria 2" ? 'selected' : '' }}>Kategoria 2</option>
                            <option value="Kategoria 3" {{ $post->category == "Kategoria 3" ? 'selected' : '' }}>Kategoria 3</option>
                        </select>
                    </div>
                    @error('title')
                        <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                    @enderror
                    <div class="form-control">
                        <label for="tags"><i class="bx bx-pen"></i> Tagi</label>
                        <input id="tags" type="text" name="tags" value="{{ $post->tags }}">
                    </div>
                    @error('tags')
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
                        <label for="excerpt"><i class="bx bx-pen"></i> Opis wpisu</label>
                        <textarea name="excerpt" id="excerpt" cols="30" rows="10">{{ $post->excerpt }}</textarea>
                    </div>
                    @error('excerpt')
                        <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                    @enderror
                    <div class="form-control-editor">
                        <label for="content"><i class="bx bx-pen"></i> Treść wpisu</label>
                        <textarea name="content" id="content" cols="30" rows="10">{{ $post->content }}</textarea>
                    </div>
                    @error('content')
                        <div class="button-control">
                            <div class="msg-feedback-fail" role="alert">{{ $message }}</div>
                        </div>
                    @enderror
                    <div class="button-control">
                        <button type="submit">Aktualizuj wpis</button>
                    </div>
                </form>
                <div class="button-control">
                    <span><a href="{{ route('blog.index') }}">Powrót na poprzednią stronę</a></span>
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
