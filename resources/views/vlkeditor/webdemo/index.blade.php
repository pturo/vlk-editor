@extends('vlkeditor.layouts.admin')
@section('content')
    <div class="demo-container">
        <section class="hero-intro" id="hero-intro">
            <h1>Awoo, World!</h1>
            <div class="intro">
                <h2>
                    Witaj na stronie demonstracyjnej, w której zostały użyte
                    elementy stworzone w panelu!
                </h2>
                <hr>
                <p>
                    PS. Wilki są super! Awoo!
                </p>
            </div>
        </section>
        <section class="about-us" id="about-us">
            <h1>Co watro o nas wiedzieć?</h1>
            <div class="our-features">
                <div class="left">
                    <p>
                        Jesteśmy fanami wilków. To bardzo mądre i silne stworzenia,
                        które potrzebują tyle samo miłości, co drugi człowiek.
                        Wierzymy, że dzięki naszym działaniom, w ich naturalnym
                        środowisku wreszcie zapanuje harmonia...
                    </p>
                    <p>
                        Dbamy o to, by każdego roku na świecie przybywało jak najwięcej
                        osobników oraz by potępiano polowania na nie. Nie wolno tego robić.
                        Wilki nie są stworzeniami gorszego sortu. Czasami bardziej żałujemy
                        śmierci człowieka niż takiego wilka, który nie ma jak się bronić
                        przed kłusownikami... Lasy to ich dom. Nie odbierajmy im miejsca do
                        życia.
                    </p>
                    <p>
                        Wilki potrzebują nas bardziej niż kiedykolwiek wcześniej.
                        <span>#IStandForWolves</span>
                    </p>
                </div>
                <div class="right">
                    <img src="{{ asset('images/wolf_vlk.png') }}" alt="">
                </div>
            </div>
        </section>
        <section class="srvcs" id="srvcs">
            <h1>Nasze usługi</h1>
            <p>
                Usługi, które oferujemy naszym wielbicielom wilków.
            </p>
            <div class="srvc-grid">
                @foreach ($services as $service)
                    <div class="srvc-item">
                        <div class="img">
                            <img src="{{ asset('services/thumbnails') }}/{{ $service->thumbnail }}" alt="">
                        </div>
                        <h1>{{ $service->name }}</h1>
                        <p>{{ $service->excerpt }}</p>
                        <a href="#" class="link-button">Więcej</a>
                    </div>
                @endforeach
            </div>
        </section>
        <section class="testimonials" id="testimonials">
            <h1>Opinie naszych wilczych fanów</h1>
            <div class="testimonials-grid">
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-item">
                        <div class="img">
                            <img src="{{ asset('testimonials/client_avatar') }}/{{ $testimonial->client_avatar }}" alt="">
                        </div>
                        <h1>{{ $testimonial->name }}</h1>
                        <h3>{{ $testimonial->occupation }}</h3>
                        <p>{{ $testimonial->review }}</p>
                    </div>
                @endforeach
            </div>
        </section>
        <section class="blog-posts" id="blog-posts">
            <h1>Blog</h1>
            <p>
                Chcesz dowiedzieć się czegoś więcej odnośnie naszej pracy?
                Zachęcamy do lektury!
            </p>
            <div class="blog-grid">
                @foreach ($blog as $post)
                    <div class="post-item">
                        <div class="img">
                            <img src="{{ asset('blog/thumbnails') }}/{{ $post->thumbnail }}" alt="">
                        </div>
                        <h1>{{ $post->title }}</h1>
                        <h3>{{ $post->author }}</h3>
                        <p>{{ $post->excerpt }}</p>
                        <a href="#" class="link-button">Czytaj więcej</a>
                    </div>
                @endforeach
            </div>
        </section>
        <section class="web-footer" id="web-footer">
            <h1>WebDemo</h1>
            <h1>Stworzone przez: Paweł "WilczeqVlk" Turoń</h1>
            <a href="#hero-intro" class="link-button"><i class="bx bx-up-arrow-alt"></i></a>
        </section>
    </div>
@endsection
