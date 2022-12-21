@extends('layouts.main')
@section('component')
    <div class="row g-5 mt-2">
        <div class="col-md-8">
            <article class="blog-post">
                <h2 class="text-center mb-3">{{ $post->title }}</h2>
                <img src="/storage/{{ $post->image }}" alt="{{ $post->title }}" style="max-width: 80%; height: auto;">
            </article>
        </div>
        <div class="col-md-4">
            @include('sidemenu')
        </div>
    </div>
@endsection
