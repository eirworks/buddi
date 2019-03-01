@foreach($categories as $category)
    <h2>{{ $category->name }}</h2>
    <ul>
        @foreach($category->publishedArticles() as $article)
            <li>
                <a href="{{ route('articles::show', [$article, $article->slug]) }}">{{ $article->title }}</a>
            </li>
        @endforeach
    </ul>
    <p>
        <a href="{{ route('articles::article-by-category', [$category, $category->slug]) }}">{{ __('More articles') }} &rarr;</a>
    </p>
@endforeach