@extends('layouts.main')

@section('container')
    <h1 class="text-center mb-3">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/">

                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($articles->count() > 0)
        <div class="card mb-3 mx-2">
            @if ($articles[0]->image)
                <div style="max-height: 400px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $articles[0]->image) }}" class="img-fluid w-100" alt="{{ $articles[0]->category->name }}">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $articles[0]->category->name }}" class="card-img-top" alt="{{ $articles[0]->category->name }}">
            @endif
            <div class="card-body text-center">
                <h3 class="card-title"><a href="/{{ $articles[0]->slug }}" class="text-decoration-none text-dark">{{ $articles[0]->title }}</a></h3>
                <p>
                    <small class="text-muted">
                        By. <a href="/?author={{ $articles[0]->author->username }}" class="text-decoration-none">{{ $articles[0]->author->name }}</a> in <a href="/?category={{ $articles[0]->category->slug }}" class="text-decoration-none">{{ $articles[0]->category->name }}</a> {{ $articles[0]->created_at->diffForHumans() }}
                    </small>
                </p>

                <p class="card-text">{!! $articles[0]->excerpt !!}</p>

                <a href="/{{ $articles[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>

            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($articles->skip(1) as $article)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                                <a href="/?category={{ $article->category->slug }}" class="text-white text-decoration-none">{{ $article->category->name }}</a>
                            </div>
                            @if ($article->image)
                                <div style="max-height: 200px; overflow:hidden;">
                                    <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid" alt="{{ $article->category->name }}">
                                </div>
                            @else
                                <img src="https://source.unsplash.com/500x250?{{ $article->category->name }}" class="card-img-top" alt="{{ $article->category->name }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p>
                                    <small class="text-muted">
                                        By. <a href="/?author={{ $article->author->username }}" class="text-decoration-none">{{ $article->author->name }}</a> {{ $article->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="card-text">{!! $article->excerpt !!}</p>
                                <a href="/{{ $article->slug }}" class="btn btn-primary">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    @else
        <p class="text-center fs-4">No post found.</p>
    @endif

    <div class="d-flex justify-content-center mt-3">
        {{ $articles->links() }}
    </div>

@endsection
