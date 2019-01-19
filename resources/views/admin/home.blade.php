@extends('layouts.app')

@section('title')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="nav flex-column">
                    @foreach($menus as $adminMenu)
                        <li class="nav-item">
                            <a href="{{ $adminMenu->get('url') }}" class="nav-link">{{ $adminMenu->get('name') }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection

