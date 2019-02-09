@extends('layouts.admin')

@section('title')
    {{ __('Settings') }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">

                <form action="{{ route('admin::settings::save') }}" method="post">
                    @csrf

                    <fieldset>
                        <legend>{{ __('Site information') }}</legend>

                        <div class="form-group">
                            <input type="text" name="settings[site_name]" value="{{ setting('site_name') }}" class="form-control" placeholder="{{ __('Site name') }}">
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>{{ __('Support Tickets') }}</legend>

                        <div class="alert alert-warning">{{ __('Coming Soon') }}</div>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="hidden" name="settings[enable_tickets]" value="0">
                                <input id="enable_tickets" type="checkbox" name="settings[enable_tickets]" value="1" class="form-check-input" {{ setting('enable_tickets') == '1' ? 'checked' : '' }}>
                                <label for="enable_tickets" class="form-check-label">{{ __('Enable ticket feature') }}</label>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Status Page</legend>
                        <div class="alert alert-warning">{{ __('Coming Soon') }}</div>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="hidden" name="settings[enable_status_page]" value="0">
                                <input id="enable_status_page" type="checkbox" name="settings[enable_status_page]" value="1" class="form-check-input" {{ setting('enable_status_page') == '1' ? 'checked' : '' }}>
                                <label for="enable_status_page" class="form-check-label">{{ __('Enable status page feature') }}</label>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group mt-5">
                        <button class="btn btn-primary btn-lg" type="submit">{{ __('Save settings') }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

