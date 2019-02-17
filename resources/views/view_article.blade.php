@extends('layouts.app')

@section('title')
    {{ $article->title }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center">@yield('title')</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted mb-3">
                            <div class="row">
                                <div class="col">
                                    {{ __('Last updated:') }}
                                    {{ \Carbon\Carbon::parse($article->updated_at)->diffForHumans() }}
                                </div>
                                <div class="col text-right">
                                    {{ __(':minutes minutes reading time', ['minutes' =>  \App\Helpers\StringHelper::reading_time(strip_tags($article->content)) ]) }}
                                </div>
                            </div>
                        </div>
                        <div class="kb-content">
                            {!! $article->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('additional-head')
    <meta name="title" content="{{ collect($article->data)->get('seo_title', $article->title) }}">
    <meta name="keywords" content="{{ collect($article->data)->get('seo_keywords') }}">
    <meta name="description" content="{{ collect($article->data)->get('seo_description') }}">
@endpush
