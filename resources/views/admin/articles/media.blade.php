@if ($article->media->first()->type == 'img')
    @if ($article->media->first()->src_type == 'file')
        <img src="{{ asset('articles/img/' . $article->media->first()->file) }}" alt="" width="100%">
    @endif
    @if ($article->media->first()->src_type == 'url')
        <img src="{{ $article->media->first()->file }}" alt="" width="100%">
    @endif
@endif
@if ($article->media->first()->type == 'vid')
    @if ($article->media->first()->src_type == 'file')
        <video src="{{ asset('articles/vid/' . $article->media->first()->file) }}" alt="" width="100%"></video>
    @endif
    @if ($article->media->first()->src_type == 'url')
        @if (str_contains($article->media->first()->file, 'youtu'))
            <iframe width="100%" height="315"
                src="https://www.youtube.com/embed/{{ explode('/', $article->media->first()->file)[3] }}"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        @else
            <video src="{{ $article->media->first()->file }}" alt="" width="100%"></video>
        @endif
    @endif
@endif
