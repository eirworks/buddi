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
            <div class="col">

                @foreach(collect($stats['data'])->chunk(3) as $chunkOfStats)
                    <div class="row">

                        @foreach($chunkOfStats as $stat)
                            <div class="col">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center font-weight-bold">{{ $stat['count'] }}</div>
                                        <div class="text-center">{{ $stat['name'] }}</div>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

