@extends('layouts.main')
@section('component')
    <div class="row g-5 mt-2">
        <div class="col-md-8">
            <article class="blog-post">
                <h1 class="mt-5 blog-post-title">{{ $post->title }}</h1>
                <p class="blog-post-meta">{{ $post->created_at->format('j F, Y') }} oleh {{ $post->authorId['name'] }} dalam
                    kategori {{ $post->category['name'] }}</p>
                @if ($post->image)
                    <img class="mx-auto mb-3" style="max-width: 50vmax" src="/storage/{{ $post->image }}"
                        alt="{{ $post->title }}">
                @endif
                {!! $post->body !!}
            </article>
        </div>
        <div class="col-md-4">
            @include('sidemenu')
        </div>
    </div>
@endsection
