@extends('layouts.admin')

@section('title')
    {{ __('Edit Profile') }}
@endsection

@section('content')
    <div class="container">

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin::home') }}">{{ __('Home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin::edit-profile') }}">{{ __('Edit Profile') }}</a></li>
        </ol>

        <div class="row justify-content-center">
            <div class="col-8">

                <form action="{{ route('admin::edit-profile::update') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <input id="name" type="text" name="name" value="{{ $user->name }}" placeholder="{{ __('Name') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <input id="email" type="email" name="email" value="{{ $user->email}}" placeholder="{{ __('Email address') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" name="password" placeholder="{{ __('Password') }}" class="form-control">
                        <div class="my-2 text-muted">
                            {{ __('Leave password empty if you don\'t want it to change') }}
                        </div>
                    </div>

                    <div class="form-group my3">
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection

