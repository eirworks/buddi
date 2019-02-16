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

        <form action="{{ $article->id ? route('admin::articles::update', [$article]) : route('admin::articles::create') }}" method="post">
            @csrf
            <div class="row mb-5">

                <div class="col-8">
                    <ul class="nav nav-tabs mb-3">
                        <li class="nav-item"><a class="nav-link active" href="javascript:;">{{ __('Editor') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="javascript:;">{{ __('Preview') }}</a></li>
                    </ul>


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
                                    placeholder="{{ __('Article content') }}">{{ $article->content_md }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col">
                            </div>
                        </div>

                </div>
                <div class="col">

                    <div class="form-group">
                        <label for="category_id">{{ __('Select category') }}</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="" {{ 0 == $article->category_id ? 'selected' : '' }}>{{ __('No category') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $article->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" id="featured" name="featured" value="1" class="form-check-input" {{ $article->featured ? 'checked' : '' }}>
                            <label for="featured" class="form-check-label">{{ __('Featured article') }}</label>
                        </div>
                    </div>

                    <div class="btn-group my-3">
                        <button type="submit" name="action" value="publish" class="btn btn-primary">{{ __($article->id ? 'Update' : 'Publish') }}</button>
                        <button type="submit" name="action" value="draft" class="btn btn-light">{{ __('Save as draft') }}</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection

@push('footer')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.6/dist/vue.js"></script>
@endpush