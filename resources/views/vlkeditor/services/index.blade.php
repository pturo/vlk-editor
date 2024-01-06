@extends('vlkeditor.layouts.admin')
@section('content')
    <div class="container">
        <div class="head">
            <h1>Usługi</h1>
        </div>
        <p>
            Tutaj znajdują się utworzone usługi, którymi można zarządzać, poprzez
            edycję lub ich usunięcie. Jeśli lista usług jest pusta, warto dodać chodziaż
            jedną.
        </p>
        <div class="list-of-services">
            <div class="services-head">
                <div class="s_actions">
                    <a href="{{ route('services.create') }}" class="link-button"><i class="bx bx-plus"></i> Dodaj</a>
                </div>
            </div>
            <hr>
            <div class="services-body-grid">
                @forelse ($services as $service)
                    <div class="service-item">
                        <div class="img">
                            <img src="{{ asset('services/thumbnails') }}/{{ $service->thumbnail }}" alt="">
                        </div>
                        <h1>{{ $service->name }}</h1>
                        <p>{{ $service->excerpt }}</p>
                        <div class="actions">
                            <a href="{{ route('services.edit', [$service->id]) }}" class="link-button"><i class="bx bx-pen"></i> Edytuj</a>
                            <div class="delete">
                                <form action="{{ route('services.destroy', [$service->id]) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                    <button type="submit"><i class="bx bx-trash"></i> Usuń</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="error">Lista usług jest pusta. Dodaj przynajmniej jedną.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
