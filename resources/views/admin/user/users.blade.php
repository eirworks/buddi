@extends('layouts.admin')

@section('title')
    {{ __('Users') }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin::home') }}">{{ __('Admin Home') }}</a></li>
                    <li class="breadcrumb-item">@yield('title')</li>
                </ol>

                <div class="my-2">
                    <a href="{{ route('admin::users::new') }}" class="btn btn-primary">Add User</a>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Activated') }}</th>
                        <th>{{ __('Articles') }}</th>
                        <th>{{ __('Role') }}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td><span class="badge badge-success">{{ $user->activated ? 'Activated' : '' }}</span></td>
                            <td>{{ $user->articles_count }}</td>
                            <td>{{ $user->admin ? 'Admin' : 'User' }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin::users::edit', [$user]) }}" class="btn btn-link">{{ __('Edit') }}</a>
                                    <button class="btn btn-link text-danger" onclick="$('#delete-user-{{ $user->id }}').submit()">{{ __('Delete') }}</button>
                                </div>
                                <form action="{{ route('admin::users::destroy', [$user]) }}" class="hide" id="delete-user-{{ $user->id }}" method="post" onsubmit="return confirm('{{ __('Delete this item?') }}')">@csrf @method('delete')</form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {!! $users->links() !!}
            </div>
        </div>
    </div>
@endsection

