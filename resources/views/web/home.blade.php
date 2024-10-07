@extends('layouts.web')
@section('main')
    <!-- Hero Section -->
    <div class="hero-slider h-52 sm:h-[calc(100vh-9rem)]" data-carousel>
        <div class="carousel-cell">
            <video
                class="object-contain bg-gradient-to-r from-black via-[#292AA9] to-[#292AA9] from-40% via-50% to-90% w-full h-full"
                src="{{ asset('vid/WhatsApp Video 2024-09-24 at 3.03.28 PM.mp4') }}" autoplay muted loop></video>
            <div class="overlay"></div>
            {{-- <div class="inner">
                <h3 class="subtitle">Slide 1</h3>
                <h2 class="title">Flickity Parallax</h2>
                <a href="{{ route('web.about') }}" target="_blank" class="btn">Tell me more</a>
            </div> --}}
        </div>
        {{-- <div class="carousel-cell"
            style="background-image:url(https://68.media.tumblr.com/c40636a5a0d4aa39c335c8db40d2144f/tumblr_omc7z7Xv8N1slhhf0o1_1280.jpg);">
            <div class="overlay"></div>
            <div class="inner">
                <h3 class="subtitle">Slide 2</h3>
                <h2 class="title">Flickity Parallax</h2>
                <a href="{{ route('web.about') }}" target="_blank" class="btn">Tell me more</a>
            </div>
        </div>
        <div class="carousel-cell"
            style="background-image:url(https://68.media.tumblr.com/3beb13a4167aa8b5c4743eac17bf351c/tumblr_o8nyvtiHfC1slhhf0o1_1280.jpg);">
            <div class="overlay"></div>
            <div class="inner">
                <h3 class="subtitle">Slide 3</h3>
                <h2 class="title">Flickity Parallax</h2>
                <a href="{{ route('web.about') }}" target="_blank" class="btn">Tell me more</a>
            </div>
        </div> --}}
    </div>

    <section class="py-12 bg-brightOrange">
        <div class="container px-6 mx-auto">
            <!-- Section Title -->
            <div class="mb-12 text-center">
                <h2 class="text-4xl font-extrabold uppercase text-navy dark:text-white font-montserrat">Discover the
                    Advantages
                    of Jay Cee
                    Publication’s Web Support!</h2>
                <p class="mt-2 text-lg font-semibold text-gray-600 uppercase dark:text-gray-50">Empowering Your Digital
                    Presence
                    with Tailored
                    Educational
                    Solutions</p>
            </div>
            <div class="container flex flex-col justify-around mx-auto my-5 gap-y-5 sm:flex-row">

                <div
                    class="max-w-sm p-6 bg-gray-300 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-center mt-5">
                        <img class="w-64 rounded-t-lg" src="{{ asset('img/1.png') }}" alt="" />
                    </div>
                    <div class="mt-5 text-center">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Interactive
                                Digital
                                Animations</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Engage students with dynamic, visually
                            appealing animations that bring complex concepts to life.</p>
                    </div>
                </div>

                <div
                    class="max-w-sm p-6 bg-gray-300 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-center mt-5">
                        <img class="w-64 rounded-t-lg" src="{{ asset('img/1.png') }}" alt="" />
                    </div>
                    <div class="mt-5 text-center">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Instant Answer
                                Keys
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Provide educators and students with
                            seamless access to answer keys, ensuring faster learning and more effective assessment.</p>
                    </div>
                </div>

                <div
                    class="max-w-sm p-6 bg-gray-300 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-center mt-5">
                        <img class="w-64 rounded-t-lg" src="{{ asset('img/1.png') }}" alt="" />
                    </div>
                    <div class="mt-5 text-center">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Test Paper
                                Generator</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Simplify the assessment process with
                            our
                            intuitive test paper generator, offering customized tests that cater to various educational
                            levels.
                        </p>
                    </div>
                </div>

            </div>
            <p class="py-5 text-xl font-semibold text-center">With Jay Cee Publication's web support, you’re not just
                maintaining a
                website - you’re transforming education
                with innovative digital tools that enhance learning outcomes.</p>
        </div>
    </section>

    <!-- Featured Bestseller Series -->
    {{-- <section class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="container px-6 mx-auto">
            <div class="mb-5 text-center">
                <h2 class="text-4xl font-extrabold uppercase text-navy dark:text-white font-montserrat">Bestselling Series
                </h2>
                <p class="mt-2 text-gray-600 uppercase dark:text-gray-300">Explore Our Most Popular Educational Series.</p>
            </div>
            <div class="container px-5 py-2 mx-auto">

                <div class="flex flex-wrap justify-center gap-5 sm:px-10 lg:px-20 xl:px-32 sm:gap-x-20 group">
                    @foreach ($series as $ser)
                        <div class="flex w-[20%] transition-all duration-300 transform hover:scale-105">
                            <!-- group-hover:blur-sm group-hover:filter hover:!blur-none -->">
                            <div class="w-full p-1 md:p-2">
                                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                    src="{{ asset('series/' . $ser) }}" />
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section> --}}
    @include('web.partials.books')


    <!-- About Us -->
    <section class="py-12 text-white bg-navy">
        <div class="container px-6 mx-auto">
            <!-- Section Title -->
            <div class="mb-5 text-center">
                <h2 class="text-4xl font-extrabold text-white uppercase font-montserrat">About Us</h2>
                <p class="mt-2 text-xl font-semibold text-gray-200 uppercase">Inspiring Future Leaders Through Engaging and
                    Innovative Learning
                    Tools</p>
            </div>
            <div class="container px-5 py-2 mx-auto text-lg lg:px-32 text-gray-50">
                <p>SHRI JAGDISH CHANDER GOYAL (J.C. Goyal) founded JAY CEE PUBLICATIONS in the early 1960s, dedicating over
                    six decades to educational excellence. With co-founder Rajiv Goyal and the next generation led by Aditya
                    Goyal, the company continues to innovate, blending tradition with modernity. Serving over 5,000 schools
                    across India, JAY CEE partners with esteemed institutions and educationists to deliver high-quality
                    textbooks aligned with the latest NCERT, CBSE, and ICSE guidelines. Committed to inspiring learners, JAY
                    CEE strives to shape the future of education through passion, progress, and purpose.
                </p>
                <div class="flex items-center justify-center my-5">
                    <a class="px-4 py-2 font-semibold border rounded-md shadow-md hover:bg-brightOrange border-brightOrange"
                        href="{{ route('web.about') }}">Learn
                        More</a>
                </div>
            </div>
        </div>
    </section>

    @include('web.partials.authors')

    <section class="py-12 bg-brightOrange">
        <div class="container px-6 mx-auto">
            <!-- Section Title -->
            <div class="mb-12 text-center">
                <h2 class="text-4xl font-extrabold uppercase text-navy dark:text-white font-montserrat">News & Happenings
                </h2>
                <p class="mt-2 text-lg font-semibold text-gray-600 uppercase dark:text-gray-50">Stay updated with the latest
                    news and events</p>
            </div>

            <!-- News Grid -->
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- News Cards -->
                @foreach ($articles as $article)
                    <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                        <img class="object-cover w-full h-48"
                            src="{{ $article->media->first() ? asset('articles/img/' . $article->media->first()->file) : 'https://via.placeholder.com/300x200' }}"
                            alt="{{ $article->title }}">
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
@endsection
