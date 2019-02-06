@extends('layouts.admin')

@section('title')
    @if($user->id)
    {{ __('Edit user :name', ['name' => $user->name]) }}
    @else
    {{ __('Add new user') }}
    @endif
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin::home') }}">{{ __('Admin Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin::users::all') }}">{{ __('Users') }}</a></li>
                    <li class="breadcrumb-item">@yield('title')</li>
                </ol>

                <div class="row">
                    <div class="col-6">
                        <form action="{{ $user->id ? route('admin::users::update', [$user]) : route('admin::users::create') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>{{ __('Name') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Name') }}" name="name" value="{{ $user->name }}">
                            </div>

                            <div class="form-group">
                                <label>{{ __('Email') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Email') }}" name="email" value="{{ $user->email }}">
                            </div>

                            <div class="form-group">
                                <label>{{ __('Password') }}</label>
                                <input type="password" class="form-control" placeholder="{{ __('Password') }}" name="password">
                                @if($user->id)
                                    <div class="mt-2">
                                        <em class="text-muted">
                                            {{ __('Let it empty if you dont want to change the password') }}
                                        </em>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="activated" name="activated" value="1" {{ $user->activated ? 'checked' : '' }}>
                                <label for="activated" class="form-check-label">{{ __('Activate account') }}</label>
                            </div>
                            <div class="mb-4">
                                <em class="text-muted">
                                    {{ __('Non activated account will not able to log in') }}
                                </em>
                            </div>

                            @if(auth()->user()->admin)
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="role" name="admin" value="1" {{ $user->admin ? 'checked' : '' }}>
                                    <label for="role" class="form-check-label">{{ __('Is admin?') }}</label>
                                </div>
                            @endif

                            <div class="form-group my-5">
                                <button class="btn btn-primary btn-lg">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

