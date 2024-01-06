@extends('vlkeditor.layouts.admin')
@section('content')
<div class="container">
    <div class="head">
        <h1>Opinie klientów</h1>
    </div>
    <p>
        Tutaj znajdują się utworzone opinie, którymi można zarządzać, poprzez
        edycję lub ich usunięcie. Jeśli lista opinii jest pusta, warto dodać chodziaż
        jedną.
    </p>
    <div class="list-of-services">
        <div class="services-head">
            <div class="s_actions">
                <a href="{{ route('testimonials.create') }}" class="link-button"><i class="bx bx-plus"></i> Dodaj</a>
            </div>
        </div>
        <hr>
        <div class="services-body-grid">
            @forelse ($testimonials as $testimonial)
                <div class="service-item">
                    <div class="img">
                        <img src="{{ asset('testimonials/client_avatar') }}/{{ $testimonial->client_avatar }}" alt="">
                    </div>
                    <h1>{{ $testimonial->name }}</h1>
                    <h4>{{ $testimonial->occupation }}</h4>
                    <p>{{ $testimonial->review }}</p>
                    <div class="actions">
                        <a href="{{ route('testimonials.edit', [$testimonial->id]) }}" class="link-button"><i class="bx bx-pen"></i> Edytuj</a>
                        <div class="delete">
                            <form action="{{ route('testimonials.destroy', [$testimonial->id]) }}" method="post">
                                {{ method_field('DELETE') }}
                                @csrf
                                <button type="submit"><i class="bx bx-trash"></i> Usuń</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="error">Lista opinii jest pusta. Dodaj przynajmniej jedną.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
