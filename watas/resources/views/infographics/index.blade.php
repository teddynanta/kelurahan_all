@extends('layouts.main')
@section('component')
    <div class="row mt-5">
        @foreach ($posts as $post)
            <div class="col-md-4 mb-3 mx-auto">
                <div class="card" style="min-height: 500px">
                    <div class="card-body d-flex flex-column">
                        @if (!$post->image)
                            <img class="img-fluid mb-2" src="https://via.placeholder.com/300x150.png?text=Tidak+Ada+Gambar"
                                alt="Tidak Ada Gambar">
                        @else
                            <img class="img-fluid mb-2" src="/storage/{{ $post->image }}">
                        @endif
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <a href="/infografis/show/{{ $post->id }}"
                            class="btn btn-primary align-self-center mt-auto">Lihat Infografis</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
