@extends('layouts.web')
@section('main')
    <div class="container px-4 py-10 mx-auto">
        <!-- Strip 1: Warm, Welcoming Headline -->
        <div class="mb-10 text-center">
            <h1 class="text-4xl font-bold text-gray-800 dark:text-white font-montserrat">
                We’d Love to Hear From You!
            </h1>
        </div>

        <!-- Strip 2: Contact Form -->
        <div class="mb-10">
            <form class="max-w-lg p-6 mx-auto bg-white rounded-lg shadow dark:bg-gray-800">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-white">Your Name</label>
                    <input type="text" id="name"
                        class="block w-full p-2 mt-1 border border-gray-300 rounded dark:text-white dark:bg-gray-800"
                        required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-white">Your Email</label>
                    <input type="email" id="email"
                        class="block w-full p-2 mt-1 border border-gray-300 rounded dark:text-white dark:bg-gray-800"
                        required>
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-sm font-medium text-gray-700 dark:text-white">How Can We
                        Help?</label>
                    <textarea id="message" rows="4"
                        class="block w-full p-2 mt-1 border border-gray-300 rounded dark:text-white dark:bg-gray-800" required></textarea>
                </div>
                <button type="submit" class="px-4 py-2 text-white transition rounded-lg bg-brightOrange hover:bg-navy">
                    Send Us a Message
                </button>
            </form>
        </div>

        <!-- Strip 3: Multiple Contact Options -->
        <div class="mb-10 text-center">
            <h2 class="mb-4 text-3xl font-semibold text-gray-800 dark:text-white">Other Ways to Reach Us</h2>
            <p class="mb-2 text-lg text-gray-600 dark:text-gray-300">
                Email: <a href="mailto:{{ App\Models\Config::where('name', 'email')->value('value') }}"
                    class="text-brightOrange">{{ App\Models\Config::where('name', 'email')->value('value') }}</a>
            </p>
            <p class="mb-2 text-lg text-gray-600 dark:text-gray-300">
                Phone: <a href="tel:{{ App\Models\Config::where('name', 'phone')->value('value') }}"
                    class="text-brightOrange">{{ App\Models\Config::where('name', 'phone')->value('value') }}</a>
            </p>
            {{-- <p class="mb-2 text-lg text-gray-600">
                Follow us on social media:
            </p>
            <div class="flex justify-center space-x-4">
                <ul class="flex justify-center w-full gap-5">
                    <li><a href="#"><i class="fa-brands fa-facebook fa-2xl"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-instagram fa-2xl"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-x-twitter fa-2xl"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-youtube fa-2xl"></i></a></li>
                </ul>
            </div> --}}
        </div>

        <!-- Strip 4: Closing Statement -->
        <div class="text-center">
            <p class="mb-4 text-2xl text-gray-600 dark:text-gray-300">
                We can’t wait to connect with you! Fill out the form, and we’ll get back to you ASAP.
            </p>
            <p class="text-2xl text-gray-600 dark:text-gray-300">
                Have a question? Don’t hesitate to reach out - we’re here for you!
            </p>
        </div>
    </div>
@endsection
