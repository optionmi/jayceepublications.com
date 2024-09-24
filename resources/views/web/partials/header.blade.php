<section class="h-12 bg-white">
    <div class="flex flex-col items-center justify-between gap-5 p-3 mx-auto sm:flex-row max-w-7xl sm:px-6 lg:px-8">
        <div>
            <h1>Jay Cee Publications</h1>
        </div>
        <ul class="flex flex-col sm:flex-row sm:gap-5">
            <li class="flex items-center gap-2">
                <i class="fas fa-phone"></i>
                <a href="tel:+919310823224">+91-93108 23224</a>
            </li>
            <li class="flex items-center gap-2">
                <i class="fas fa-brands fa-whatsapp"></i>
                <a href="whatsapp://send?phone=+919310823224">+91-93108 23923</a>
            </li>
            <li class="flex items-center gap-2">
                <i class="fas fa-envelope"></i>
                <a href="mailto:info@jayceepublications.com">info@jayceepublications.com</a>
            </li>
            <li class="flex items-center gap-2">
                <i class="fas fa-store"></i>
                <a href="#">Catalog</a>
            </li>
            <li class="flex items-center gap-2">
                <i class="fas fa-user"></i>
                <a href="{{ route('login') }}">Log In</a>
            </li>
        </ul>
    </div>
</section>
<header class="sticky top-0 z-30 h-24 bg-navy">
    <div class="p-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Main navigation container -->
        <nav class="relative flex items-center justify-between w-full py-2 flex-nowrap text-neutral-500 shadow-dark-mild hover:text-neutral-700 focus:text-neutral-700 lg:flex-wrap lg:justify-start lg:py-4"
            data-twe-navbar-ref>
            <div class="flex flex-wrap items-center justify-between w-full px-3">
                <div class="ms-2">
                    <a class="text-2xl font-bold text-white" href="#">Jay Cee Publications</a>
                </div>
                <!-- Hamburger button for mobile view -->
                <button
                    class="block px-2 bg-transparent border-0 text-white/50 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden"
                    type="button" data-twe-collapse-init data-twe-target="#navbarSupportedContent2"
                    aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- Hamburger icon -->
                    <span class="[&>svg]:w-7 [&>svg]:stroke-white/50 dark:[&>svg]:stroke-neutral-200">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>

                <!-- Collapsible navbar container -->
                <div class="!visible mt-2 hidden flex-grow basis-[100%] items-center lg:mt-0 lg:!flex lg:basis-auto"
                    id="navbarSupportedContent2" data-twe-collapse-item>
                    <ul class="flex flex-col list-style-none ms-auto ps-0 lg:mt-1 lg:flex-row" data-twe-navbar-nav-ref>
                        <li class="my-4 ps-2 lg:my-0 lg:pe-1 lg:ps-2" data-twe-nav-item-ref>
                            <a class="text-white hover:underline decoration-brightOrange lg:px-2" aria-current="page"
                                href="{{ route('web.home') }}" data-twe-nav-link-ref>Home</a>
                        </li>
                        <li class="mb-4 ps-2 lg:mb-0 lg:pe-1 lg:ps-0" data-twe-nav-item-ref>
                            <a class="p-0 transition duration-200 hover:underline decoration-brightOrange text-white/60 hover:text-white/80 hover:ease-in-out focus:text-white/80 active:text-white/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2"
                                href="{{ route('web.about') }}" data-twe-nav-link-ref>About Us</a>
                        </li>
                        <li class="mb-4 ps-2 lg:mb-0 lg:pe-1 lg:ps-0" data-twe-nav-item-ref>
                            <a class="p-0 transition duration-200 hover:underline decoration-brightOrange text-white/60 hover:text-white/80 hover:ease-in-out focus:text-white/80 active:text-white/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2"
                                href="#" data-twe-nav-link-ref>Shop Online</a>
                        </li>
                        <li class="mb-4 ps-2 lg:mb-0 lg:pe-1 lg:ps-0" data-twe-nav-item-ref>
                            <a class="p-0 transition duration-200 hover:underline decoration-brightOrange text-white/60 hover:text-white/80 hover:ease-in-out focus:text-white/80 active:text-white/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2"
                                href="#" data-twe-nav-link-ref>Web Support</a>
                        </li>
                        <li class="mb-4 ps-2 lg:mb-0 lg:pe-1 lg:ps-0" data-twe-nav-item-ref>
                            <a class="p-0 transition duration-200 hover:underline decoration-brightOrange text-white/60 hover:text-white/80 hover:ease-in-out focus:text-white/80 active:text-white/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2"
                                href="{{ route('web.contact') }}" data-twe-nav-link-ref>Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
</>
