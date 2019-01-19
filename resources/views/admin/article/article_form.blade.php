@extends('layouts.app')

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
        <div class="row">

            <div class="col">
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
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            <button type="button" class="btn btn-link text-body" onclick="markdown()">{{ __('Preview') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col">
                <div id="markdown-preview"></div>
            </div>
        </div>
    </div>
@endsection

@push('additional-foot')
    <script>
        function markdown() {
            $.ajax({
                method: 'POST',
                url: '{{ route('admin::api::markdown::parse') }}',
                data: {
                    content_md: $("#content_md").val(),
                    _token: "{{ csrf_token() }}",
                },
            }).done(function (data) {
                $("#markdown-preview").html(data.content);
            })
                .fail(function () {
                    console.log("Error!");
                    $("#markdown-preview").text("{{ __('ERROR parsing data!') }}")
                })
        }
    </script>
@endpush

