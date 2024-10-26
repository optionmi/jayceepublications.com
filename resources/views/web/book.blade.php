@extends('layouts.web')
@section('main')
    <section>
        <div class="container px-5 mx-auto my-10 bg-white rounded-lg">
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
                        <div class="flex">
                            <span class="block text-gray-500 min-w-36">Discount:</span>
                            <span class="font-semibold">{{ $book->discount }}%</span>
                        </div>
                        <div class="flex">
                            <span class="block text-gray-500 min-w-36">Author:</span>
                            <span class="font-semibold">{{ $book->author->name }}</span>
                        </div>
                        <div class="flex">
                            <span class="block text-gray-500 min-w-36">About:</span>
                            <span class="font-semibold">{{ $book->about }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
