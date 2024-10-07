<!-- Featured Bestseller Series -->
<section class="py-12 bg-gray-100 dark:bg-gray-900">
    <div class="container px-6 mx-auto">
        <!-- Section Title -->
        <div class="mb-5 text-center">
            <h2 class="text-4xl font-extrabold uppercase text-navy dark:text-white font-montserrat">Bestselling Series
            </h2>
            <p class="mt-2 text-lg font-semibold text-gray-600 uppercase dark:text-gray-300">Explore Our Most Popular
                Educational Series.</p>
        </div>
        <div class="container py-2 mx-auto">
            {{-- <div class="owl-carousel owl-theme">
                <div class="flex gap-5">
                    @foreach ($series as $ser)
                        <div class="single-book-item">
                            <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                src="{{ asset('series/' . $ser) }}" />
                        </div>
                    @endforeach
                </div>
            </div> --}}
            <div class="owl-carousel" id="booksCarousel">
                @foreach ($series as $ser)
                    <div class="mx-4 item">
                        <img class="rounded-lg object-cover sm:h-[485px] 2xl:h-[600px]"
                            src="{{ asset('series/' . $ser) }}" alt="Book {{ $loop->iteration }}">
                    </div>
                @endforeach
            </div>

        </div>
</section>
