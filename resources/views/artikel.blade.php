@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                
                    <h1 class="mb-2">{{ $article->title }}</h1>
                    <p>By. <a href="/?author={{ $article->author->username }}" class="text-decoration-none">{{ $article->author->name }}</a> in <a href="/?category={{ $article->category->slug }}" class="text-decoration-none">{{ $article->category->name }}</a></p>
                    {{-- <a href="/" class="btn btn-primary mb-2"><span data-feather="arrow-left"></span>Kembali ke artikel</a> --}}

                    @if ($article->image)
                    <div style="max-height: 400px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid" alt="{{ $article->category->name }}">
                    </div>    
                    @else
                        <img src="https://source.unsplash.com/1200x400?{{ $article->category->name }}" class="img-fluid" alt="{{ $article->category->name }}">            
                    @endif
                    <article class="my-3 fs-5">

                    {!! $article->body !!}
            
                </article>
            
                <a href="/" class="btn btn-primary mb-2"><span data-feather="arrow-left"></span>Kembali ke artikel</a>

                {{-- <a href="/" class="text-decoration-none d-block mt-3">Kembali ke artikel</a> --}}

            </div>
        </div>
    </div>


@endsection