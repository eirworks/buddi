@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-2">
                <div class="card-body">
                    <form action="{{ route('articles::all') }}" method="get">
                        <div class="form-group my-2">
                            <input type="search" name="q" value="{{ request()->input('search') }}" placeholder="{{ setting('search_placeholder', __("What do you need help with?")) }}" class="form-control">
                        </div>
                        {{--<div class="text-center">--}}
                            {{--<button class="btn btn-primary">{{ __("Search") }}</button>--}}
                        {{--</div>--}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    @includeWhen( setting('fp_layout', 'default') == 'default', 'home.qa.basic_default')
    @includeWhen( setting('fp_layout', 'default') == 'basic_1', 'home.qa.basic_1')
    @includeWhen( setting('fp_layout', 'default') == 'basic_2', 'home.qa.basic_2')
</div>
@endsection
