<section class="bg-white dark:bg-brightOrange dark:text-white sm:h-12">
    <div class="flex flex-col items-center justify-between gap-5 p-3 mx-auto sm:flex-row max-w-7xl sm:px-6 lg:px-8">
        <div>
            <h1>Jay Cee Publications</h1>
        </div>
        <ul class="flex flex-wrap justify-between text-sm gap-y-2 sm:gap-5">
            <li class="flex items-center gap-2">
                <i class="fas fa-phone"></i>
                <a
                    href="tel:{{ App\Models\Config::where('name', 'phone')->value('value') }}">{{ App\Models\Config::where('name', 'phone')->value('value') }}</a>
            </li>
            <li class="flex items-center gap-2">
                <i class="fas fa-brands fa-whatsapp"></i>
                <a
                    href="whatsapp://send?phone={{ App\Models\Config::where('name', 'whatsapp')->value('value') }}">{{ App\Models\Config::where('name', 'whatsapp')->value('value') }}</a>
            </li>
            <li class="flex items-center gap-2">
                <i class="fas fa-envelope"></i>
                <a
                    href="mailto:{{ App\Models\Config::where('name', 'email')->value('value') }}">{{ App\Models\Config::where('name', 'email')->value('value') }}</a>
            </li>
            <li class="flex items-center gap-2">
                <i class="fas fa-store"></i>
                <a
                    href="{{ asset('configs/' . App\Models\Config::where('name', 'catalogue')->value('value')) }}">Catalogue</a>
            </li>
            @auth
                <li class="relative" data-twe-dropdown-ref>
                    <button class="flex items-center gap-2" type="button" id="dropdownMenuButton1"
                        data-twe-dropdown-toggle-ref aria-expanded="false">
                        <i class="fas fa-user"></i> {{ ucfirst(auth()->user()->name) }}
                        <span class="ms-2 w-2 [&>svg]:h-5 [&>svg]:w-5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                    <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-base shadow-lg data-[twe-dropdown-show]:block dark:bg-surface-dark"
                        aria-labelledby="dropdownMenuButton1" data-twe-dropdown-menu-ref>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button
                                    class="block w-full px-4 py-2 text-sm font-normal bg-white whitespace-nowrap text-neutral-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline dark:bg-surface-dark dark:text-white dark:hover:bg-neutral-800/25 dark:focus:bg-neutral-800/25 dark:active:bg-neutral-800/25"
                                    type="submit" data-twe-dropdown-item-ref>Log Out</button>
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li class="flex items-center gap-2">
                    <i class="fas fa-user"></i>
                    <a href="{{ route('login') }}">Log In</a>
                </li>
                <li class="flex items-center gap-2">
                    <i class="fas fa-user"></i>
                    <a href="{{ route('register') }}">Register</a>
                </li>
            @endauth
        </ul>
    </div>
</section>
<header class="sticky -top-[1px] z-30 h-24 bg-navy">
    <div class="p-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Main navigation container -->
        <nav class="relative flex items-center justify-between w-full flex-nowrap text-neutral-500 shadow-dark-mild hover:text-neutral-700 focus:text-neutral-700 lg:flex-wrap lg:justify-start"
            data-twe-navbar-ref>
            <div class="flex flex-wrap items-center justify-between w-full px-3">
                <div class="ms-2">
                    <a class="text-2xl font-bold text-white" href="#">
                        @include('components.application-logo')
                    </a>
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
                <div class="!visible mt-2 hidden flex-grow basis-[100%] bg-navy items-center lg:mt-0 lg:!flex lg:basis-auto"
                    id="navbarSupportedContent2" data-twe-collapse-item>
                    <ul class="flex flex-col list-style-none ms-auto ps-0 lg:mt-1 lg:flex-row" data-twe-navbar-nav-ref>
                        <li class="my-4 ps-2 lg:my-0 lg:pe-1 lg:ps-2" data-twe-nav-item-ref>
                            <a class="{{ request()->routeIs('web.home') ? 'text-white hover:underline decoration-brightOrange lg:px-2' : 'p-0 transition duration-200 hover:underline decoration-brightOrange text-white/60 hover:text-white/80 hover:ease-in-out focus:text-white/80 active:text-white/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2' }}"
                                aria-current="page" href="{{ route('web.home') }}" data-twe-nav-link-ref>Home</a>
                        </li>
                        <li class="mb-4 ps-2 lg:mb-0 lg:pe-1 lg:ps-0" data-twe-nav-item-ref>
                            <a class="{{ request()->routeIs('web.about') ? 'text-white hover:underline decoration-brightOrange lg:px-2' : 'p-0 transition duration-200 hover:underline decoration-brightOrange text-white/60 hover:text-white/80 hover:ease-in-out focus:text-white/80 active:text-white/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2' }}"
                                href="{{ route('web.about') }}" data-twe-nav-link-ref>About Us</a>
                        </li>
                        <li class="mb-4 ps-2 lg:mb-0 lg:pe-1 lg:ps-0" data-twe-nav-item-ref>
                            <a class="{{ request()->routeIs('') ? 'text-white hover:underline decoration-brightOrange lg:px-2' : 'p-0 transition duration-200 hover:underline decoration-brightOrange text-white/60 hover:text-white/80 hover:ease-in-out focus:text-white/80 active:text-white/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2' }}"
                                href="#" data-twe-nav-link-ref>Shop Online</a>
                        </li>
                        <li class="mb-4 ps-2 lg:mb-0 lg:pe-1 lg:ps-0" data-twe-nav-item-ref>
                            <a class="{{ request()->routeIs('') ? 'text-white hover:underline decoration-brightOrange lg:px-2' : 'p-0 transition duration-200 hover:underline decoration-brightOrange text-white/60 hover:text-white/80 hover:ease-in-out focus:text-white/80 active:text-white/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2' }}"
                                href="/websupport/" data-twe-nav-link-ref>Web Support</a>
                        </li>
                        <li class="mb-4 ps-2 lg:mb-0 lg:pe-1 lg:ps-0" data-twe-nav-item-ref>
                            <a class="{{ request()->routeIs('web.contact') ? 'text-white hover:underline decoration-brightOrange lg:px-2' : 'p-0 transition duration-200 hover:underline decoration-brightOrange text-white/60 hover:text-white/80 hover:ease-in-out focus:text-white/80 active:text-white/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2' }}"
                                href="{{ route('web.contact') }}" data-twe-nav-link-ref>Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
</>
