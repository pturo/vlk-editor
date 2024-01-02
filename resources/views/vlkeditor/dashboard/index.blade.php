@extends('vlkeditor.layouts.admin')
@section('content')
<div class="container">
    <div class="head">
        <h1>Witaj, {{ Auth::user()->name }}!</h1>
    </div>
    <p>
        Kokpit aplikacji VLK Editor.
    </p>
    <p>
        Pewien mędrzec powiedział niegdyś: "Lorem ipsum dolor sit amet consectetur
        adipisicing elit. Illum fugit, laudantium facilis perferendis iure aut
        vitae itaque provident libero eius assumenda, fugiat repellat asperiores
        reprehenderit impedit et nulla laborum sed?"
    </p>
    <div class="topbar">
        <a href="{{ route('services.index') }}">
            <div class="topbar-item">
                <i class="bx bx-news"></i>
                <h3>1</h3>
                <p>Usług</p>
            </div>
        </a>
        <a href="{{ route('testimonials.index') }}">
            <div class="topbar-item">
                <i class="bx bx-news"></i>
                <h3>1</h3>
                <p>Opinii</p>
            </div>
        </a>
        <a href="{{ route('blog.index') }}">
            <div class="topbar-item">
                <i class="bx bx-news"></i>
                <h3>1</h3>
                <p>Postów na bloga</p>
            </div>
        </a>
    </div>
    <div class="recent-edited">
        <h2>Ostatnio edytowane</h2>
        <ul class="list-of-edited-items">
            <div class="list-head">
                <h4>Tytuł</h4>
                <h4>Data modyfikacji</h4>
                <h4>Sekcja</h4>
                <h4>Akcje</h4>
            </div>
            <li class="edited-item">
                <p>Article 1</p>
                <p>5 lis 2023 8:54</p>
                <a href="#">O nas</a>
                <div class="actions">
                    <a href="#" class="link-button"><i class="bx bxs-binoculars"></i> Zobacz</a>
                    <a href="#" class="link-button"><i class="bx bxs-pencil"></i> Edytuj</a>
                    <a href="#" class="link-button"><i class="bx bxs-trash"></i> Usuń</a>
                </div>
            </li>
        </ul>
    </div>
</div>
@endsection
