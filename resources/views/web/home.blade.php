@extends('layouts.web')

@section('main')
    <!-- Hero Section -->
    <div class="hero-slider h-[calc(100vh-9rem)]" data-carousel>
        <div class="carousel-cell"
            style="background-image:url(https://68.media.tumblr.com/57836ee52bc9355ad7c5fed5abf91ccc/tumblr_oiboo6MaRS1slhhf0o1_1280.jpg);">
            <div class="overlay"></div>
            <div class="inner">
                <h3 class="subtitle">Slide 1</h3>
                <h2 class="title">Flickity Parallax</h2>
                <a href="https://flickity.metafizzy.co/" target="_blank" class="btn">Tell me more</a>
            </div>
        </div>
        <div class="carousel-cell"
            style="background-image:url(https://68.media.tumblr.com/c40636a5a0d4aa39c335c8db40d2144f/tumblr_omc7z7Xv8N1slhhf0o1_1280.jpg);">
            <div class="overlay"></div>
            <div class="inner">
                <h3 class="subtitle">Slide 2</h3>
                <h2 class="title">Flickity Parallax</h2>
                <a href="https://flickity.metafizzy.co/" target="_blank" class="btn">Tell me more</a>
            </div>
        </div>
        <div class="carousel-cell"
            style="background-image:url(https://68.media.tumblr.com/3beb13a4167aa8b5c4743eac17bf351c/tumblr_o8nyvtiHfC1slhhf0o1_1280.jpg);">
            <div class="overlay"></div>
            <div class="inner">
                <h3 class="subtitle">Slide 3</h3>
                <h2 class="title">Flickity Parallax</h2>
                <a href="https://flickity.metafizzy.co/" target="_blank" class="btn">Tell me more</a>
            </div>
        </div>
    </div>

    <section class="py-12 bg-brightOrange">
        <div class="container px-6 mx-auto">
            <!-- Section Title -->
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold text-navy dark:text-white">Why Choose Our Web Support Services</h2>
                <p class="mt-2 text-gray-600 dark:text-gray-300">Enhance your online experience with our expert web support
                    services.</p>
            </div>
            <div class="container flex flex-col mx-auto my-5 sm:flex-row">
                <div class="w-full sm:w-1/2">
                    <div class="w-full p-1 md:p-2">
                        <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                            src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp" />
                    </div>
                </div>
                <div class="w-full sm:w-1/2 sm:ms-5">
                    <!--Pills navigation-->
                    <ul class="flex flex-wrap mb-5 list-none ps-0 md:flex-row" role="tablist" data-twe-nav-ref>
                        <li role="presentation" class="flex-auto text-center">
                            <a href="#pills-home01"
                                class="my-2 block rounded bg-zinc-100 px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 data-[twe-nav-active]:!bg-primary-100 data-[twe-nav-active]:text-primary-700 dark:bg-neutral-700 dark:text-white/50 dark:data-[twe-nav-active]:!bg-slate-900 dark:data-[twe-nav-active]:text-primary-500 md:me-4"
                                id="pills-home-tab01" data-twe-toggle="pill" data-twe-target="#pills-home01"
                                data-twe-nav-active role="tab" aria-controls="pills-home01"
                                aria-selected="true">Learning Materials</a>
                        </li>
                        <li role="profile" class="flex-auto text-center">
                            <a href="#pills-profile01"
                                class="my-2 block rounded bg-zinc-100 px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 data-[twe-nav-active]:!bg-primary-100 data-[twe-nav-active]:text-primary-700 dark:bg-neutral-700 dark:text-white/50 dark:data-[twe-nav-active]:!bg-slate-900 dark:data-[twe-nav-active]:text-primary-500 md:me-4"
                                id="pills-profile-tab01" data-twe-toggle="pill" data-twe-target="#pills-profile01"
                                role="tab" aria-controls="pills-profile01" aria-selected="false">Teacher Resources</a>
                        </li>
                        <li role="contact" class="flex-auto text-center">
                            <a href="#pills-contact01"
                                class="my-2 block rounded bg-zinc-100 px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 data-[twe-nav-active]:!bg-primary-100 data-[twe-nav-active]:text-primary-700 dark:bg-neutral-700 dark:text-white/50 dark:data-[twe-nav-active]:!bg-slate-900 dark:data-[twe-nav-active]:text-primary-500 md:me-4"
                                id="pills-contact-tab01" data-twe-toggle="pill" data-twe-target="#pills-contact01"
                                role="tab" aria-controls="pills-contact01" aria-selected="false">Assessment Tools</a>
                        </li>
                    </ul>

                    <!--Pills content-->
                    <div class="mb-6">
                        <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[twe-tab-active]:block"
                            id="pills-home01" role="tabpanel" aria-labelledby="pills-home-tab01" data-twe-tab-active>
                            <ul class="flex flex-col gap-5">
                                <li>
                                    <h1 class="text-xl font-semibold dark:text-white">Smart Class E-Book</h1>
                                    <p class="dark:text-gray-300">
                                        Jay Cee Publication books offer extensive content for students aged 4 and above.
                                        They
                                        ensure
                                        access
                                        to
                                        safe,
                                        accurate, and fact-checked information that supports learning from home.
                                    </p>
                                </li>
                                <li>
                                    <h1 class="text-xl font-semibold dark:text-white">Topic Animations</h1>
                                    <p class="dark:text-gray-300">Users can enjoy viewing content on tablets, smartphones,
                                        laptops, desktops, and web
                                        browsers.
                                    </p>
                                </li>
                                <li>
                                    <h1 class="text-xl font-semibold dark:text-white">Practice Worksheets</h1>
                                    <p class="dark:text-gray-300">Access high-quality reference materials to assist
                                        curricular learning.</p>
                                </li>
                            </ul>
                        </div>
                        <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[twe-tab-active]:block"
                            id="pills-profile01" role="tabpanel" aria-labelledby="pills-profile-tab01">
                            <ul class="flex flex-col gap-5">
                                <li>
                                    <h1 class="text-xl font-semibold dark:text-white">Lesson Plan Builder</h1>
                                    <p class="dark:text-gray-300">
                                        The easy-to-follow format of the Lesson Plan Builder allows teachers to create and
                                        share
                                        interactive
                                        lessons effortlessly.
                                    </p>
                                </li>
                                <li>
                                    <h1 class="text-xl font-semibold dark:text-white">Answer Key</h1>
                                    <p class="dark:text-gray-300">
                                        Curriculum books come with Teacher’s Manuals, designed to help educators use modern
                                        teaching
                                        techniques and evaluation methods based on sound language learning pedagogy.
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[twe-tab-active]:block"
                            id="pills-contact01" role="tabpanel" aria-labelledby="pills-contact-tab01">
                            <ul class="flex flex-col gap-5">
                                <li>
                                    <h1 class="text-xl font-semibold dark:text-white">Test Paper Generator</h1>
                                    <p class="dark:text-gray-300">
                                        An innovative tool for teachers with a large repository of questions to quickly
                                        prepare
                                        test
                                        papers
                                        and assignments.
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Bestseller Series -->
    <section class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="container px-6 mx-auto">
            <!-- Section Title -->
            <div class="mb-5 text-center">
                <h2 class="text-3xl font-bold text-navy dark:text-white">Top Selling Series</h2>
                <p class="mt-2 text-gray-600 dark:text-gray-300">Discover our top-selling book series.</p>
            </div>
            <div class="container px-5 py-2 mx-auto group lg:px-32 lg:pt-12">
                <div class="flex flex-wrap -m-1 md:-m-2">
                    <div
                        class="flex flex-wrap w-1/3 transition-all duration-300 transform hover:scale-105 group-hover:blur-sm group-hover:filter hover:!blur-none">
                        <div class="w-full p-1 md:p-2">
                            <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp" />
                        </div>
                    </div>
                    <div
                        class="flex flex-wrap w-1/3 transition-all duration-300 transform hover:scale-105 group-hover:blur-sm group-hover:filter hover:!blur-none">
                        <div class="w-full p-1 md:p-2">
                            <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(74).webp" />
                        </div>
                    </div>
                    <div
                        class="flex flex-wrap w-1/3 transition-all duration-300 transform hover:scale-105 group-hover:blur-sm group-hover:filter hover:!blur-none">
                        <div class="w-full p-1 md:p-2">
                            <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(75).webp" />
                        </div>
                    </div>
                    <div
                        class="flex flex-wrap w-1/3 transition-all duration-300 transform hover:scale-105 group-hover:blur-sm group-hover:filter hover:!blur-none">
                        <div class="w-full p-1 md:p-2">
                            <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(70).webp" />
                        </div>
                    </div>
                    <div
                        class="flex flex-wrap w-1/3 transition-all duration-300 transform hover:scale-105 group-hover:blur-sm group-hover:filter hover:!blur-none">
                        <div class="w-full p-1 md:p-2">
                            <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(76).webp" />
                        </div>
                    </div>
                    <div
                        class="flex flex-wrap w-1/3 transition-all duration-300 transform hover:scale-105 group-hover:blur-sm group-hover:filter hover:!blur-none">
                        <div class="w-full p-1 md:p-2">
                            <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                src="https://tecdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(72).webp" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-brightOrange">
        <div class="container px-6 mx-auto">
            <!-- Section Title -->
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold text-navy dark:text-white">News & Happenings</h2>
                <p class="mt-2 text-gray-600 dark:text-gray-300">Stay updated with the latest news and events</p>
            </div>

            <!-- News Grid -->
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- News Card 1 -->
                <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                    <img class="object-cover w-full h-48" src="https://via.placeholder.com/300x200" alt="News 1">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-semibold text-gray-800">News Title 1</h3>
                        <p class="mb-4 text-sm text-gray-600">Short description of the news. Stay up to date with the
                            latest trends and updates.</p>
                        <a href="#" class="font-semibold text-indigo-500 hover:text-indigo-600">Read More</a>
                    </div>
                </div>

                <!-- News Card 2 -->
                <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                    <img class="object-cover w-full h-48" src="https://via.placeholder.com/300x200" alt="News 2">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-semibold text-gray-800">News Title 2</h3>
                        <p class="mb-4 text-sm text-gray-600">Another brief description of the news article, providing a
                            glimpse of the content.</p>
                        <a href="#" class="font-semibold text-indigo-500 hover:text-indigo-600">Read More</a>
                    </div>
                </div>

                <!-- News Card 3 -->
                <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                    <img class="object-cover w-full h-48" src="https://via.placeholder.com/300x200" alt="News 3">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-semibold text-gray-800">News Title 3</h3>
                        <p class="mb-4 text-sm text-gray-600">Explore the latest news in this section, with updates and
                            happenings around the world.</p>
                        <a href="#" class="font-semibold text-indigo-500 hover:text-indigo-600">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
