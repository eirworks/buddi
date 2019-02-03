@extends('layouts.admin')

@section('title')
    {{ __('Articles') }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin::home') }}">Admin Home</a>
                    </li>
                    <li class="breadcrumb-item">@yield('title')</li>
                </ol>

                <div class="my-2">
                    <a href="{{ route('admin::articles::new') }}" class="btn btn-primary">{{ __("Create Article") }}</a>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th>{{ __("ID") }}</th>
                        <th>{{ __("Title") }}</th>
                        <th>{{ __("Last updated") }}</th>
                        <th>{{ __("Reads") }}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>
                                <a href="{{ route('articles::show', [$article, $article->slug]) }}">{{ $article->title }}</a>
                                <div>
                                    <small>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24"><path d="M10.605 0h-10.605v10.609l13.391 13.391 10.609-10.604-13.395-13.396zm-4.191 6.414c-.781.781-2.046.781-2.829.001-.781-.783-.781-2.048 0-2.829.782-.782 2.048-.781 2.829-.001.782.782.781 2.047 0 2.829z"></path></svg>
                                        <a href="{{ route('admin::articles::all', ['category' => $article->category_id]) }}">{{ $article->category->name }}</a>
                                    </small>
                                </div>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($article->updated_at ?: $article->created_at)->diffForHumans() }}</td>
                            <td>{{ $article->reads }}</td>
                            <td>
                                <div class="btn-group btn-group-xs my-0">
                                    <a href="{{ route('admin::articles::edit', [$article]) }}" class="btn btn-link">{{ __("Edit") }}</a>
                                    <button class="btn btn-link text-danger" onclick="$('#delete-article-{{ $article->id }}').submit()">{{ __("Delete") }}</button>
                                </div>
                                <form action="{{ route('admin::articles::delete', [$article]) }}" method="post" id="delete-article-{{ $article->id }}" onsubmit="return confirm('{{ __("Are you sure you want to delete this item?") }}')">@method('DELETE') @csrf </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {!! $articles->links() !!}
            </div>
        </div>
    </div>
@endsection

