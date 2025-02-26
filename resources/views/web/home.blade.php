@extends('layouts.web')
@section('main')
    <!-- Hero Section -->
    <div class="hero-slider h-52 sm:h-[calc(100vh-9rem)]" data-carousel>
        <div class="carousel-cell">
            <video
                class="object-contain bg-gradient-to-r from-black via-[#292AA9] to-[#292AA9] from-40% via-50% to-90% w-full h-full"
                src="{{ asset('vid/Banner.mp4') }}" autoplay muted loop></video>
            <div class="overlay"></div>
            {{-- <div class="inner">
                <h3 class="subtitle">Slide 1</h3>
                <h2 class="title">Flickity Parallax</h2>
                <a href="{{ route('web.about') }}" target="_blank" class="btn">Tell me more</a>
            </div> --}}
        </div>
    </div>

    <section class="py-12 bg-brightOrange">
        <div class="container mx-auto sm:px-20">
            <!-- Section Title -->
            <div class="mb-12 text-center">
                <h2 class="text-2xl font-extrabold uppercase sm:text-4xl text-navy dark:text-white font-montserrat">Discover
                    the
                    Advantages
                    of Jay Cee
                    Publication’s <br> Web Support!</h2>
                <p class="mt-2 font-semibold text-gray-600 uppercase sm:text-lg dark:text-gray-50">Empowering Your Digital
                    Presence
                    with Tailored
                    Educational
                    Solutions</p>
            </div>
            <div class="container gap-y-5 mx-auto my-5">
                <div class="owl-carousel owl-theme" id="featuresCarousel">
                    @foreach ($features as $feature)
                        <div
                            class="p-6 bg-gray-300 rounded-lg border border-gray-200 shadow-md min-h-96 dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex justify-center items-center mt-5">
                                <div class="w-36">
                                    <img class="rounded-t-lg" src="{{ asset('img/1.png') }}" alt="" />
                                </div>
                            </div>
                            <div class="mt-5 text-center">
                                <a href="#">
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $feature['name'] }}</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $feature['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <p class="py-5 text-lg font-semibold text-center text-white sm:text-xl">With Jay Cee Publication's web support,
                you’re not
                just
                maintaining a
                website <br> you’re transforming education
                with innovative digital tools that enhance learning outcomes.</p>
        </div>
    </section>

    @include('web.partials.books')


    <!-- About Us -->
    <section class="py-12 text-white bg-navy">
        <div class="container mx-auto sm:px-20">
            <!-- Section Title -->
            <div class="mb-5 text-center">
                <h2 class="text-4xl font-extrabold text-white uppercase font-montserrat">About Us</h2>
                <p class="mt-2 text-xl font-semibold text-gray-200 uppercase">Inspiring Future Leaders Through Engaging and
                    Innovative Learning
                    Tools</p>
            </div>
            <div class="container px-5 py-2 mx-auto text-lg text-center text-gray-50 lg:px-32">
                <p>SHRI JAGDISH CHANDER GOYAL (J.C. Goyal) founded JAY CEE PUBLICATIONS in the early 1960s, dedicating over
                    six decades to educational excellence. With co-founder Rajiv Goyal and the next generation led by Aditya
                    Goyal, the company continues to innovate, blending tradition with modernity. Serving over 5,000 schools
                    across India, JAY CEE partners with esteemed institutions and educationists to deliver high-quality
                    textbooks aligned with the latest NCERT, CBSE, and ICSE guidelines. Committed to inspiring learners, JAY
                    CEE strives to shape the future of education through passion, progress, and purpose.
                </p>
                <div class="flex items-center justify-center my-5 mt-10 font-semibold text-[1rem]">
                    <a class="px-4 py-2 rounded-md border shadow-md hover:bg-brightOrange border-brightOrange"
                        href="{{ route('web.about') }}">Learn
                        More</a>
                </div>
            </div>
        </div>
    </section>

    @include('web.partials.authors')

    @if (App\Models\Config::where('name', 'showArticles')->value('value'))
        <section class="py-12 bg-brightOrange">
            <div class="container mx-auto sm:px-20">
                <!-- Section Title -->
                <div class="mb-12 text-center">
                    <h2 class="text-4xl font-extrabold uppercase text-navy dark:text-white font-montserrat">News &
                        Happenings
                    </h2>
                    <p class="mt-2 text-lg font-semibold text-gray-600 uppercase dark:text-gray-50">Stay updated with the
                        latest
                        news and events</p>
                </div>

                <!-- News Grid -->
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- News Cards -->
                    @foreach ($articles as $article)
                        <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                            @if ($article->media->first())
                                @include('admin.articles.media')
                            @else
                                <img class="object-cover w-full h-48" src="https://via.placeholder.com/300x200"
                                    alt="{{ $article->title }}">
                            @endif
                            <div class="p-6">
                                <h3 class="mb-2 text-xl font-semibold text-gray-800">{{ $article->title }}</h3>
                                <div class="mb-4 text-sm text-gray-600">{!! Str::limit($article->content, 100) !!}</div>
                                <a href="{{ route('web.article.show', $article->id) }}"
                                    class="font-semibold text-indigo-500 hover:text-indigo-600">Read More</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @include('web.partials.popup')
@endsection
