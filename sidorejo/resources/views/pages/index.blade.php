@extends('layouts.main')
@section('component')
    <div class="row g-5 mt-2">
        <div class="col-md-8">
            @if ($data)
                <h3 class="text-center mb-3 fw-bold">{{ $data->title }}</h3>
                <hr>
                @if ($data->image)
                    <img class="mx-auto mb-3" src="/storage/{{ $data->image }}" alt="{{ $data->title }}"
                        style="max-width: 50vmax">
                @endif
                {!! $data->body !!}
            @else
                <h2 class="text-center my-3">Belum ada konten yang bisa ditampilkan</h2>
            @endif
        </div>
        <div class="col-md-4">
            @include('sidemenu')
        </div>
    </div>
@endsection
