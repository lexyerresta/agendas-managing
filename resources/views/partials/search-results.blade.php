@if($articles->count() > 0)
    <ul>
        @foreach($articles as $article)
            <li><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></li>
        @endforeach
    </ul>
@else
    <p>No results found.</p>
@endif
