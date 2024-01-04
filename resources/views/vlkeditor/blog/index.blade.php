@extends('vlkeditor.layouts.admin')
@section('content')
<div class="container">
    <div class="head">
        <h1>Blog</h1>
    </div>
    <p>
        Tutaj znajdują się utworzone usługi, którymi można zarządzać, poprzez
        edycję lub ich usunięcie. Jeśli lista usług jest pusta, warto dodać chodziaż
        jedną.
    </p>
    <div class="list-of-services">
        <div class="services-head">
            <div class="s_actions">
                <a href="{{ route('blog.create') }}" class="link-button"><i class="bx bx-plus"></i> Dodaj</a>
            </div>
        </div>
        <hr>
        <div class="services-body-grid">
            @forelse ($blog as $post)
                <div class="service-item">
                    <img src="{{ asset('blog/thumbnails') }}/{{ $post->thumbnail }}" alt="">
                    <h1>{{ $post->title }}</h1>
                    <span>{{ $post->slug }}</span>
                    <h2>{{ $post->author }}</h2>
                    <p>{{ $post->category }}</p>
                    <p>{{ $post->tags }}</p>
                    <p>{{ $post->excerpt }}</p>
                    <div class="actions">
                        <a href="{{ route('blog.edit', [$post->id]) }}" class="link-button"><i class="bx bx-pen"></i> Edytuj</a>
                        <div class="delete">
                            <form action="{{ route('blog.destroy', [$post->id]) }}" method="post">
                                {{ method_field('DELETE') }}
                                @csrf
                                <button type="submit"><i class="bx bx-trash"></i> Usuń</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="error">Lista wpisów jest pusta. Dodaj przynajmniej jedną.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
