<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary mb-3">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin::home') }}">{{ config('app.name') }}</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                    aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse " id="collapsibleNavId">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('admin::home') }}" class="nav-link">{{ __('Hi, :name', ['name' => auth()->user()->name]) }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link" onclick="$('#logout-form').submit();">{{ __('Logout') }}</a>
                        <form action="{{ route('logout') }}" class="hide" method="post" id="logout-form">@csrf</form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        <nav>
            <ul class="nav nav-fill">
                <li class="nav-item">
                    <a href="{{route('admin::home')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"><path d="M21 13v10h-6v-6h-6v6h-6v-10h-3l12-12 12 12h-3zm-1-5.907v-5.093h-3v2.093l3 3z"/></svg>
                        {{ __('Home') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin::articles::all')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"><path d="M11.362 2c4.156 0 2.638 6 2.638 6s6-1.65 6 2.457v11.543h-16v-20h7.362zm.827-2h-10.189v24h20v-14.386c0-2.391-6.648-9.614-9.811-9.614zm4.811 13h-10v-1h10v1zm0 2h-10v1h10v-1zm0 3h-10v1h10v-1z"/></svg>
                        {{ __('Articles') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin::categories::all')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"><path d="M10.605 0h-10.605v10.609l13.391 13.391 10.609-10.604-13.395-13.396zm-4.191 6.414c-.781.781-2.046.781-2.829.001-.781-.783-.781-2.048 0-2.829.782-.782 2.048-.781 2.829-.001.782.782.781 2.047 0 2.829z"/></svg>
                        {{ __('Categories') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin::users::all')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"><path d="M19 7.001c0 3.865-3.134 7-7 7s-7-3.135-7-7c0-3.867 3.134-7.001 7-7.001s7 3.134 7 7.001zm-1.598 7.18c-1.506 1.137-3.374 1.82-5.402 1.82-2.03 0-3.899-.685-5.407-1.822-4.072 1.793-6.593 7.376-6.593 9.821h24c0-2.423-2.6-8.006-6.598-9.819z"/></svg>
                        {{ __('Users') }}
                    </a>
                </li>
                @if(setting('enable_tickets'))
                    <li class="nav-item">
                        <a href="{{route('admin::users::all')}}" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 3v18h24v-18h-24zm21.518 2l-9.518 7.713-9.518-7.713h19.036zm-19.518 14v-11.817l10 8.104 10-8.104v11.817h-20z"/></svg>
                            {{ __('Tickets') }}
                        </a>
                    </li>
                @endif
                @if(setting('enable_status_page'))
                    <li class="nav-item">
                        <a href="{{route('admin::users::all')}}" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.31 7.526c-.099-.807.528-1.526 1.348-1.526.771 0 1.377.676 1.28 1.451l-.757 6.053c-.035.283-.276.496-.561.496s-.526-.213-.562-.496l-.748-5.978zm1.31 10.724c-.69 0-1.25-.56-1.25-1.25s.56-1.25 1.25-1.25 1.25.56 1.25 1.25-.56 1.25-1.25 1.25z"/></svg>
                            {{ __('Status') }}
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{route('admin::settings::all')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"><path d="M24 14.187v-4.374c-2.148-.766-2.726-.802-3.027-1.529-.303-.729.083-1.169 1.059-3.223l-3.093-3.093c-2.026.963-2.488 1.364-3.224 1.059-.727-.302-.768-.889-1.527-3.027h-4.375c-.764 2.144-.8 2.725-1.529 3.027-.752.313-1.203-.1-3.223-1.059l-3.093 3.093c.977 2.055 1.362 2.493 1.059 3.224-.302.727-.881.764-3.027 1.528v4.375c2.139.76 2.725.8 3.027 1.528.304.734-.081 1.167-1.059 3.223l3.093 3.093c1.999-.95 2.47-1.373 3.223-1.059.728.302.764.88 1.529 3.027h4.374c.758-2.131.799-2.723 1.537-3.031.745-.308 1.186.099 3.215 1.062l3.093-3.093c-.975-2.05-1.362-2.492-1.059-3.223.3-.726.88-.763 3.027-1.528zm-4.875.764c-.577 1.394-.068 2.458.488 3.578l-1.084 1.084c-1.093-.543-2.161-1.076-3.573-.49-1.396.581-1.79 1.693-2.188 2.877h-1.534c-.398-1.185-.791-2.297-2.183-2.875-1.419-.588-2.507-.045-3.579.488l-1.083-1.084c.557-1.118 1.066-2.18.487-3.58-.579-1.391-1.691-1.784-2.876-2.182v-1.533c1.185-.398 2.297-.791 2.875-2.184.578-1.394.068-2.459-.488-3.579l1.084-1.084c1.082.538 2.162 1.077 3.58.488 1.392-.577 1.785-1.69 2.183-2.875h1.534c.398 1.185.792 2.297 2.184 2.875 1.419.588 2.506.045 3.579-.488l1.084 1.084c-.556 1.121-1.065 2.187-.488 3.58.577 1.391 1.689 1.784 2.875 2.183v1.534c-1.188.398-2.302.791-2.877 2.183zm-7.125-5.951c1.654 0 3 1.346 3 3s-1.346 3-3 3-3-1.346-3-3 1.346-3 3-3zm0-2c-2.762 0-5 2.238-5 5s2.238 5 5 5 5-2.238 5-5-2.238-5-5-5z"/></svg>
                        {{ __('Settings') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"><path d="M21 13v10h-21v-19h12v2h-10v15h17v-8h2zm3-12h-10.988l4.035 4-6.977 7.07 2.828 2.828 6.977-7.07 4.125 4.172v-11z"/></svg>
                        {{ __('View site') }}
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    @yield('content')

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>