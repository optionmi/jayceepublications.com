<!-- Featured Bestseller Series -->
<section class="py-12 bg-gray-100 dark:bg-gray-900">
    <div class="container px-6 mx-auto sm:px-20">
        <!-- Section Title -->
        <div class="mb-5 text-center">
            <h2 class="text-2xl font-extrabold uppercase sm:text-4xl text-navy dark:text-white font-montserrat">
                Bestselling Series
            </h2>
            <p class="mt-2 text-lg font-semibold text-gray-600 uppercase dark:text-gray-300">Explore Our Most Popular
                Educational Series.</p>
        </div>
        <div class="container py-2 mx-auto sm:px-20">
            <div class="owl-carousel owl-theme" id="booksCarousel">
                @foreach ($series as $ser)
                    <div class="item">
                        <img class="rounded-lg object-fit sm:h-[485px] 2xl:h-[600px]" src="{{ asset('series/' . $ser) }}"
                            alt="Book {{ $loop->iteration }}">
                    </div>
                @endforeach
            </div>

        </div>
</section>
