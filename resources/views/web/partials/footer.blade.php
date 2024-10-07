<footer class="text-white bg-dark-navy">
    <div class="container py-12 mx-auto">
        <div class="flex flex-col gap-10 sm:gap-5 sm:flex-row">
            <div class="w-full sm:w-1/3">
                <h1 class="px-5 pb-5 text-2xl font-bold text-center sm:text-start">Jay Cee Publications</h1>
                <ul class="flex flex-col gap-2 ms-10">
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
                </ul>
            </div>
            <div class="w-full sm:w-1/3">
                <ul class="flex flex-col w-1/2 gap-2 mx-auto">
                    <li>
                        <a class="{{ request()->routeIs('web.home') ? 'text-white hover:underline decoration-brightOrange lg:px-2' : 'p-0 transition duration-200 hover:underline decoration-brightOrange text-white/60 hover:text-white/80 hover:ease-in-out focus:text-white/80 active:text-white/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2' }}"
                            aria-current="page" href="{{ route('web.home') }}">Home</a>
                    </li>
                    <li>
                        <a class="{{ request()->routeIs('web.about') ? 'text-white hover:underline decoration-brightOrange lg:px-2' : 'p-0 transition duration-200 hover:underline decoration-brightOrange text-white/60 hover:text-white/80 hover:ease-in-out focus:text-white/80 active:text-white/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2' }}"
                            href="{{ route('web.about') }}">About Us</a>
                    </li>
                    <li>
                        <a class="{{ request()->routeIs('') ? 'text-white hover:underline decoration-brightOrange lg:px-2' : 'p-0 transition duration-200 hover:underline decoration-brightOrange text-white/60 hover:text-white/80 hover:ease-in-out focus:text-white/80 active:text-white/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2' }}"
                            href="#">Shop Online</a>
                    </li>
                    <li>
                        <a class="{{ request()->routeIs('') ? 'text-white hover:underline decoration-brightOrange lg:px-2' : 'p-0 transition duration-200 hover:underline decoration-brightOrange text-white/60 hover:text-white/80 hover:ease-in-out focus:text-white/80 active:text-white/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2' }}"
                            href="/websupport/">Web Support</a>
                    </li>
                    <li>
                        <a class="{{ request()->routeIs('web.contact') ? 'text-white hover:underline decoration-brightOrange lg:px-2' : 'p-0 transition duration-200 hover:underline decoration-brightOrange text-white/60 hover:text-white/80 hover:ease-in-out focus:text-white/80 active:text-white/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2' }}"
                            href="{{ route('web.contact') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
            {{-- <div class="w-full sm:w-1/3">
                <h1 class="w-full mx-auto text-xl text-center sm:w-1/2">We're on Social Networks. Follow us & get in
                    touch!</h1>
                <ul class="flex justify-center w-full gap-5 my-5">
                    <li><a href="#"><i class="fa-brands fa-facebook fa-2xl"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-instagram fa-2xl"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-x-twitter fa-2xl"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-youtube fa-2xl"></i></a></li>
                </ul>
            </div> --}}
        </div>
    </div>

    <div class="py-2 text-center text-white bg-black">
        <p class="text-sm">
            &copy; {{ date('Y') }} Jay Cee Publications Pvt. Ltd. All Rights Reserved.
        </p>
    </div>
</footer>

<!-- WhatsApp button -->
<a href="whatsapp://send?phone={{ App\Models\Config::where('name', 'whatsapp')->value('value') }}" data-twe-ripple-init
    data-twe-ripple-color="light"
    class="!fixed bottom-20 end-5 rounded-full bg-green-600 flex items-center justify-center w-14 h-14 leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg">
    <i class="fab fa-whatsapp fa-2xl"></i></a>

<!-- Back to top button -->
<button type="button" data-twe-ripple-init data-twe-ripple-color="light"
    class="!fixed bottom-5 end-5 hidden rounded-full bg-red-600 p-3 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg"
    id="btn-back-to-top">
    <span class="[&>svg]:w-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
        </svg>
    </span>
</button>
