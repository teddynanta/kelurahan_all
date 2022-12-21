@extends('layouts.main')

<nav class="navbar navbar-expand-md navbar-light mt-5 bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">{{ setting('site.title') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                @foreach ($data as $item)
                    @if ($item->children->isEmpty())
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">{{ $item->title }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ $item->title }}
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($item->children as $child)
                                    <li>
                                        <a class="dropdown-item" href="{{ $child->url }}">{{ $child->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
