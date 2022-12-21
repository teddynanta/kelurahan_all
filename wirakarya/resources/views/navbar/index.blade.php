{{-- @dd($active) --}}
<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top" id="navbar">
    <div class="container">
        <a href="/"><img id="logo" class="navbar-brand mx-auto my-auto" src="/storage/{{ setting('site.logo') }}"
                alt="logo" height="60px"></a>
        <a class="navbar-brand d-block text-wrap ms-2 lh-sm fw-normal text-uppercase" href="/"
            style=" max-width: 20vmax">
            {{ setting('site.title') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-auto" id="navbarCollapse">
            <ul class="navbar-nav nav-pills ms-auto mb-2 mb-md-0 text-uppercase">
                @foreach ($menu as $item)
                    @if ($item->children->isEmpty())
                        <li class="nav-item">
                            @if ($item->title == 'Login')
                                @auth
                                    <a class="nav-link" aria-current="page" href="/admin">Dashboard</a>
                                @else
                                    <a class="nav-link" aria-current="page" href="/admin/login">Login</a>
                                @endauth
                            @else
                                <a class="nav-link {{ $active->title === $item->title ? 'active fw-bold' : '' }}"
                                    aria-current="page" href="{{ $item->url }}">{{ $item->title }}</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link {{ $active->title === $item->title ? 'active fw-bold' : '' }} dropdown-toggle"
                                href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $item->title }}
                            </a>
                            <ul class="dropdown-menu" style="font-size: 1em">
                                @foreach ($item->children as $child)
                                    <li>
                                        <a class="dropdown-item text-wrap text-capitalize"
                                            href="{{ $child->url }}">{{ $child->title }}</a>
                                    </li>
                                    <hr class="w-75 mx-auto">
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
            <form class="d-flex" role="search">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-search text-white"></i>
                </button>
            </form>
        </div>
    </div>
</nav>
<form action="{{ $active->title === 'Beranda' ? '/#blog-post' : '/posts' }}">
    <div class="modal fade" id="exampleModal" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cari Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" name="search" value="{{ request('search') }}"
                        autofocus>
                    <div class="form-text">
                        Ketikkan judul atau isi berita yang ingin anda cari.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </div>
    </div>
</form>
