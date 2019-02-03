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
                            {{ __('Last updated:') }}
                            {{ $article->updated_at }}
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

