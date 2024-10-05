<!-- Our Authors -->
<section id="authors" class="py-12 bg-gray-200 dark:bg-gray-900">
    <!-- Section Title -->
    <div class="mb-5 text-center">
        <h2 class="text-4xl font-extrabold uppercase text-navy dark:text-white font-montserrat">Our Authors</h2>
        <p class="mt-2 text-gray-600 uppercase dark:text-gray-300">Our Team of Authors</p>
    </div>
    <div class="container py-2 mx-auto">
        <div class="owl-carousel owl-theme" id="authorsCarousel">
            @foreach ($authors as $author)
                <div class="single-author-item">
                    <p>{{ $author->about }}</p>
                    <div class="info">
                        <img src="{{ asset($author->img ? 'authors/img/' . $author->img : 'coreui/img/default_avatar.png') }}"
                            class="rounded-full shadow" alt="image">
                        <h3>{{ $author->name }}</h3>
                        <span>Author</span>
                    </div>
                </div>
            @endforeach

        </div>
        {{-- @if (Route::currentRouteName() == 'web.home')
                <div class="flex justify-center my-10">
                    <a class="px-4 py-2 text-lg font-bold transition-colors duration-300 ease-in-out rounded-md shadow-md bg-brightOrange text-navy hover:bg-navy hover:text-white"
                        href="{{ route('web.about') . '/#authors' }}">View
                        More</a>
                </div>
            @endif --}}

    </div>
</section>
