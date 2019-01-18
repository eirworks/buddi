@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="form-group my-0">
                        <input type="search" name="search" value="{{ request()->input('search') }}" placeholder="{{ __("Search something") }}" class="form-control">
                    </div>
                    {{--<div class="text-center">--}}
                        {{--<button class="btn btn-primary">{{ __("Search") }}</button>--}}
                    {{--</div>--}}
                </div>
            </div>

            @foreach($articles as $article)
                <div class="card my-1">
                    <div class="card-body">
                        <div><a href="{{ route('articles::view', [$article, $article->slug]) }}">{{ $article->title }}</a></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
