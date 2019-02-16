@extends('layouts.app')

@section('title')
    @if(isset($category)) {{ $category->name }}
    @else {{ __('Articles') }}
    @endif
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card my-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <h3 class="text-center">@yield('title')</h3>
                                @if(request()->filled('q'))
                                    <div class="text-center">{{ __('Found :count search results for ":q"', ['q' => request()->input('q'),'count' => $articles->count()]) }}</div>
                                @endif
                                <hr>
                                <div>
                                    <a href="{{ route('home') }}">&larr; {{ __('Return to home') }}</a>
                                </div>
                            </div>
                            <div class="col">
                                @if($articles->count() > 0)
                                    @foreach($articles as $article)
                                        <div class="my-3">
                                            <h5><a class="text-dark" href="{{ route('articles::show', [$article, $article->slug]) }}">{{ $article->title }}</a></h5>
                                            <div class="text-muted my-2">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 200) }}
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-muted text-center my-5">
                                        {{ __('No results') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

