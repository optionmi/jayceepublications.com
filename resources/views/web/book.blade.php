@extends('layouts.web')
@section('main')
    <section>
        <div class="container px-5 mx-auto my-10 bg-white rounded-lg">
            <div class="p-6">
                <a class="text-brightOrange hover:text-navy" href="{{ route('web.home') }}">Home</a> /
                <a class="text-brightOrange hover:text-navy" href="{{ route('web.shop') }}">Shop Online</a> /
                {{ $book->name }}
            </div>
            <div class="flex">
                <div class="flex justify-center w-full border-r sm:w-2/5">
                    <img class="p-2 my-10 border rounded-md shadow-md max-w-96" src="{{ asset('books/img/' . $book->img) }}"
                        alt="">
                </div>
                <div class="w-full sm:w-3/5">
                    <div class="flex flex-col w-full gap-3 py-5 mx-auto my-10 text-lg sm:w-4/5">
                        <div class="flex">
                            <span class="block text-gray-500 min-w-36">Name:</span>
                            <span class="font-semibold">{{ $book->name }}</span>
                        </div>
                        <div class="flex">
                            <span class="block text-gray-500 min-w-36">Board:</span>
                            <span class="font-semibold">{{ $book->board->name }}</span>
                        </div>
                        <div class="flex">
                            <span class="block text-gray-500 min-w-36">Class:</span>
                            <span class="font-semibold">{{ $book->standard->name }}</span>
                        </div>
                        <div class="flex">
                            <span class="block text-gray-500 min-w-36">Subject:</span>
                            <span class="font-semibold">{{ $book->subject->name }}</span>
                        </div>
                        <div class="flex">
                            <span class="block text-gray-500 min-w-36">MRP:</span>
                            <span class="font-semibold">{{ $book->price }}</span>
                        </div>
                        @if ($book->discount > 0)
                            <div class="flex">
                                <span class="block text-gray-500 min-w-36">Discount:</span>
                                <span class="font-semibold">{{ $book->discount }}%</span>
                            </div>
                        @endif
                        <div class="flex">
                            <span class="block text-gray-500 min-w-36">Author:</span>
                            <span class="font-semibold">{{ $book->author->name }}</span>
                        </div>
                        <div class="flex">
                            <span class="block text-gray-500 min-w-36">About:</span>
                            <span class="font-semibold">{{ $book->about }}</span>
                        </div>
                        <div class="w-full my-4">
                            <button onclick="addToCart({{ $book->id }})"
                                class="w-full px-4 py-2 text-white transition rounded-lg bg-brightOrange hover:bg-navy">
                                Add to Cart
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
@section('bottom-scripts')
    <script>
        function addToCart(id) {
            let cartItems = JSON.parse(sessionStorage.getItem('cart'));
            if (cartItems === null) cartItems = [];
            cartItems.includes(id) ? window.location.href = "{{ route('web.shop') }}" : cartItems.push(id);
            sessionStorage.setItem('cart', JSON.stringify(cartItems));
            window.location.href = "{{ route('web.shop') }}";
        }
    </script>
@endsection
