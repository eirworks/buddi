@extends('layouts.admin')

@section('title')
    {{ __('Categories') }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin::home') }}">Admin Home</a>
                    </li>
                    <li class="breadcrumb-item">@yield('title')</li>
                </ol>

                <div class="my-2">
                    <a href="{{ route('admin::categories::new') }}" class="btn btn-primary">{{ __('New Category') }}</a>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th>{{ __('Category Name') }}</th>
                        <th>{{ __('Slug') }}</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin::categories::edit', [$category]) }}" class="btn btn-link">{{ __('Edit') }}</a>
                                    <button class="btn btn-link text-danger" onclick="$('#delete-category-{{ $category->id }}').submit()">{{ __('Delete') }}</button>
                                    <form id="delete-category-{{ $category->id }}" class="hide" action="{{ route('admin::categories::destroy', [$category]) }}" onsubmit="return confirm('{{ __('Delete this item?') }}')" method="post">
                                        @csrf @method('delete')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

