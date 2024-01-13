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
                <i class="bx bx-package"></i>
                <h3>{{ count($services) > 0 ? count($services) : 0 }}</h3>
                <p>Usług</p>
            </div>
        </a>
        <a href="{{ route('testimonials.index') }}">
            <div class="topbar-item">
                <i class="bx bx-user"></i>
                <h3>{{ count($testimonials) > 0 ? count($testimonials) : 0 }}</h3>
                <p>Opinii</p>
            </div>
        </a>
        <a href="{{ route('blog.index') }}">
            <div class="topbar-item">
                <i class="bx bx-news"></i>
                <h3>{{ count($blog) > 0 ? count($testimonials) : 0 }}</h3>
                <p>Postów na bloga</p>
            </div>
        </a>
    </div>
</div>
@endsection
