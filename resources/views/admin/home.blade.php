@extends('layouts.admin')

@section('title')

@endsection

@section('content')
    <div class="container">
        <div class="row">

            <div class="col">
                @foreach(collect($stats['data'])->chunk(3) as $chunkOfStats)
                    <div class="row">

                        @foreach($chunkOfStats as $stat)
                            @if($stat['visible'])
                                <div class="col">

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center font-weight-bold">{{ $stat['count'] }}</div>
                                            <div class="text-center">{{ $stat['name'] }}</div>
                                        </div>
                                    </div>

                                </div>
                            @endif
                        @endforeach

                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

