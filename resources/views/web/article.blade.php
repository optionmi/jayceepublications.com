@extends('layouts.web')

@section('main')
    <main class="container py-10 mx-auto h-full text-gray-800 sm:px-20 dark:text-white">
        <div class="mb-10">
            <h1 class="text-4xl font-bold font- montserrat text-dark-navy dark:text-white">{{ $article->title }}</h1>
            <small class="text-gray-500 dark:text-gray-50">Published:
                {{ $article->created_at->format('F j, Y, g:i a') }}</small>
        </div>
        <div class="flex flex-col gap-5 sm:flex-row">
            <div class="w-full sm:w-2/3">
                @if ($article->media->first())
                    <div class="flex flex-col gap-5 items-center">
                        @foreach ($article->media as $media)
                            @if ($media->type == 'img')
                                @if ($media->src_type == 'file')
                                    <img class="rounded-md" src="{{ asset('articles/img/' . $media->file) }}" alt="">
                                @endif
                                @if ($media->src_type == 'url')
                                    <img class="rounded-md" src="{{ $media->file }}" alt="">
                                @endif
                            @endif
                            @if ($media->type == 'vid')
                                @if ($media->src_type == 'file')
                                    <video src="{{ asset('articles/vid/' . $media->file) }}" alt=""
                                        width="100%"></video>
                                @endif
                                @if ($media->src_type == 'url')
                                    @if (str_contains($media->file, 'youtu'))
                                        <iframe width="100%" height="315"
                                            src="https://www.youtube.com/embed/{{ explode('/', $media->file)[3] }}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                    @else
                                        <video src="{{ $media->file }}" alt="" width="100%"></video>
                                    @endif
                                @endif
                            @endif
                        @endforeach
                    </div>
                @endif
                <div class="my-5">
                    <div>{!! $article->content !!}</div>
                </div>
            </div>
            <div class="w-full sm:w-1/3">
                <div class="p-5 bg-gray-50 rounded-md shadow-md dark:bg-gray-800">
                    <h1 class="mb-10 text-lg font-bold">Recent Articles</h1>
                    <div class="flex flex-col gap-5">
                        @foreach ($articles as $article)
                            <div class="flex gap-3">
                                <div class="mt-2"><span
                                        class="text-2xl bg-[#55555555] p-2 rounded-md">{{ $loop->iteration }}</span>
                                </div>
                                <div>
                                    <a href="{{ route('web.article.show', $article->id) }}">
                                        <h1 class="text-xl font-bold text-dark-navy dark:text-white">{{ $article->title }}
                                        </h1>
                                    </a>
                                    <small class="text-gray-500 dark:text-gray-50">Published:
                                        {{ $article->created_at->format('F j, Y, g:i a') }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
