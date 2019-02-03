@extends('layouts.admin')

@section('title')
    @if($category->id)
    {{ __('Edit Category :name', ['name' => $category->name]) }}
    @else
    {{ __('Create new category') }}
    @endif
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin::home') }}">Admin Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin::categories::all') }}">{{ __('Categories') }}</a></li>
                    <li class="breadcrumb-item">@yield('title')</li>
                </ol>

                <form action="{{ $category->id ? route('admin::categories::create', [$category]) : route('admin::categories::create') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="{{ __('Category name') }}">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

