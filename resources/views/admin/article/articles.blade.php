@extends('layouts.app')

@section('title')
    {{ __('Articles') }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">

                <h2 class="text-center">
                    @yield('title')
                </h2>

                <div class="my-2">
                    <a href="{{ route('admin::articles::new') }}" class="btn btn-primary">{{ __("Create Article") }}</a>
                </div>

                @foreach($articles as $article)
                    <div class="card my-1">
                        <div class="card-body">
                            <div><a href="{{ route('articles::view', [$article, $article->slug]) }}">{{ $article->title }}</a></div>
                            <div>
                                <small class="text-muted">
                                    {{ __('ID :id', ['id' => $article->id]) }}.
                                    {{ __('Created by') }}
                                    {{ $article->user->name }}
                                    {{ __('at') }}
                                    {{ $article->created_at }}.
                                    {{ __("Last updated") }}
                                    {{ $article->updated_at ?: $article->created_at }}.
                                    {{ __('Reads :times times', ['times' => $article->reads]) }}
                                </small>
                            </div>
                            <div class="btn-group btn-group-sm my-0">
                                <a href="{{ route('admin::articles::edit', [$article]) }}" class="btn btn-link">{{ __("Edit") }}</a>
                                <button class="btn btn-link text-danger" onclick="$('#delete-article-{{ $article->id }}').submit()">{{ __("Delete") }}</button>
                            </div>
                            <form action="{{ route('admin::articles::delete', [$article]) }}" method="post" id="delete-article-{{ $article->id }}" onsubmit="return confirm('{{ __("Are you sure you want to delete this item?") }}')">@method('DELETE') @csrf </form>
                        </div>
                    </div>
                @endforeach

                {!! $articles->links() !!}
            </div>
        </div>
    </div>
@endsection

