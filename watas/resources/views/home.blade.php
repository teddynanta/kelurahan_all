@extends('layouts.main')

@section('component')
    {{-- @dd($posts) --}}
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <marquee class="mt-4 pt-1" behavior="#" direction="">{{ setting('site.description') }}</marquee>
        <div class="carousel-indicators">
            @foreach ($banners as $banner)
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{ $loop->index }}"
                    class="{{ $loop->first ? 'active' : '' }}" aria-current="true"
                    aria-label="Slide {{ $loop->iteration }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner rounded shadow-sm">
            @foreach ($banners as $banner)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}" aria-hidden="true">
                    <img class="d-block mx-auto" width="100%" height="100%" src="/storage/{{ $banner->image }}"
                        alt="">
                </div>
            @endforeach
        </div>
    </div>

    <div class="marketing">

        <div class="row mb-5 mx-auto">
            @foreach ($features as $feature)
                <div class="col-md-2">
                    <a class="text-decoration-none text" href="{{ $feature->link }}" target="__blank">
                        <div class="card">
                            <div class="card-body shadow-sm" style="min-height:200px">
                                <img src="/storage/{{ $feature->icon }}" class="d-block mb-3 mx-auto" height="100px"
                                    style="aspect-ratio:1;">
                                <h5 class="card-title text-center text-secondary mb-0"> {{ $feature->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="row mb-2">
            @foreach ($featured as $ftr)
                <div class="col-md-6">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-success">{{ $ftr->category['name'] }}</strong>
                            <h3 class="mb-0">{{ $ftr->title }}</h3>
                            <div class="mb-1 text-muted">{{ $ftr->created_at->format('M j') }}</div>
                            <p class="card-text mb-auto text-muted">{!! $ftr->excerpt !!}</p>
                            <a href="/posts/show/{{ $ftr->id }}" class="stretched-link">Continue reading</a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            @if (!$ftr->image)
                                <svg class="bd-placeholder-img" width="200" height="250"
                                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                    preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c" /><text x="20%" y="50%"
                                        fill="#eceeef" dy=".3em">Tidak ada gambar</text>
                                </svg>
                            @else
                                <img src="/storage/{{ $ftr->image }}" style="object-fit: cover" height="250"
                                    width="200" alt="{{ $ftr->title }}">
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mb-2">
            <div class="col-md-12">
                {{-- INI BUAT SLIDER INFOGRAFIS --}}
            </div>
        </div>

        <div id="blog-post" class="row g-5">
            <div class="col-md-8">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <article class="blog-post">
                            <h2 class="blog-post-title mb-1">{{ $post->title }} <span class="badge text-bg-primary"
                                    style="font-size: .3em">{{ $post->category['name'] }}</span>
                            </h2>
                            <p class="blog-post-meta">{{ $post->created_at->format('j F, Y') }} by
                                {{ $post->authorId['name'] }}</p>
                            {!! \Illuminate\Support\Str::limit($post->body, 300, $end = '...') !!}
                            <a class="btn btn-outline-primary d-block w-25 mt-3 rounded-sm"
                                href="/posts/show/{{ $post->id }}">baca
                                selengkapnya</a>
                        </article>
                    @endforeach
                    <nav class="blog-pagination" aria-label="Pagination">
                        <a class="btn rounded-pill {{ $posts->currentPage() === 1 ? 'btn-outline-secondary disabled' : 'btn-outline-primary' }}"
                            href="{{ $posts->previousPageUrl() }}#blog-post">Sebelumnya</a>
                        <a class="btn rounded-pill {{ $posts->currentPage() === $posts->lastPage() ? 'btn-outline-secondary disabled' : 'btn-outline-primary' }}"
                            href="{{ $posts->nextPageUrl() }}#blog-post">Selanjutnya</a>
                    </nav>
                @else
                    <p class="text-center fs-4">Tidak ada berita yang sesuai.</p>
                @endif
            </div>
            <div class="col-md-4">
                @include('sidemenu')
            </div>
        </div>

    </div>
    </div>

    {{-- <div class="row mb-3 text-center">
            <div class="col-md-6 themed-grid-col">
                <div id="img-gallery" class="carousel slide mt-4" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img style="filter: brightness(50%)" src="/storage/{{ $featured[0]->image }}"
                                alt="{{ $featured[0]->title }}" width="100%" height="100%"
                                preserveAspectRatio="xMidYMid slice">
                            <div class="container">
                                <div class="carousel-caption text-start">
                                    <h1>{{ $featured[0]->title }}</h1>
                                    <p>{{ $featured[0]->excerpt }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 themed-grid-col">
                <div class="row">
                    <div class="col-md-3 mb-2 ms-auto me-3">
                        <a href="/posts"
                            class="badge rounded-pill bg-primary text-end text-decoration-none px-3 py-2">Lihat
                            Semua Berita</a>
                    </div>
                    @foreach ($posts as $post)
                        <div class="col-md-12 mb-3 text-start">
                            <div class="card">
                                <div class="card-body d-flex flex-row mt-3">
                                    @if (!$post->image)
                                        <img class="img-fluid"
                                            src="https://via.placeholder.com/150.png?text=Tidak+Ada+Gambar" width="20%"
                                            alt="Tidak Ada Gambar">
                                    @else
                                        <img class="img-fluid" src="/storage/{{ $post->image }}" width="20%">
                                    @endif
                                    <div class="row ms-2">
                                        <h5 class="card-title fs-4">{{ $post->title }} <span
                                                class="position-absolute top-0 end-0 badge text-bg-secondary fs-6 fw-normal">{{ $post->category->name }}</span>
                                        </h5>
                                        <p>{{ $post->excerpt }} <a href="/posts/show/{{ $post->id }}">baca
                                                selengkapnya</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> --}}


    <!-- START THE FEATURETTES -->

    {{-- <hr class="featurette-divider">

    <div class="row featurette mb-5">
        <div class="card card-cover h-100 overflow-hidden rounded-4 shadow-lg" style="background-color: #777;">
            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Berita Terbaru</h2>
            <ul class="d-flex list-unstyled mt-auto">
                <li class="me-auto">
                    <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white"> Admin Kelurahan X
                </li>
                <li class="d-flex align-items-center me-3">
                    <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"/></svg>
                    <small>Earth</small>
                </li>
                <li class="d-flex align-items-center">
                    <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"/></svg>
                    <small>3d</small>
                </li>
            </ul>
            </div>
        </div>
    </div>
    <div class="row featurette">
    <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
        <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
    </div>
    <div class="col-md-5">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

    </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
    <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
    </div>
    <div class="col-md-5 order-md-1">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

    </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
    <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
        <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
    </div>
    <div class="col-md-5">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

    </div>
    </div>

    <hr class="featurette-divider"> --}}

    <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->
@endsection
