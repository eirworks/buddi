@extends('layouts.admin')

@section('title')
    {{ $article->id ? $article->title : __("Create Article") }}
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin::home') }}">{{ __('Admin Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin::articles::all') }}">{{ __('Articles') }}</a></li>
                    <li class="breadcrumb-item">@yield('title')</li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-center">

            <div class="col-8">
                <form action="{{ $article->id ? route('admin::articles::update', [$article]) : route('admin::articles::create') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <input type="text" name="title" value="{{ $article->title }}" placeholder="{{ __('Your article\'s title') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <textarea
                                name="content_md"
                                id="content_md"
                                cols="30"
                                rows="10"
                                class="form-control"
                                placeholder="{{ __('Article content') }}"
                        onchange="markdown()">{{ $article->content_md }}</textarea>
                    </div>

                    <div class="form-group">
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="" {{ 0 == $article->category_id ? 'selected' : '' }}>{{ __('No category') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $article->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col">
                            <button type="submit" name="action" value="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection