@extends('layouts.admin')

@section('title')
    {{ __('Settings') }}
@endsection

@section('content')
    <div class="container" id="formApp">

        <ul class="nav nav-tabs mb-2">
            <li class="nav-item"><a href="javascript:;" :class="{'nav-link':true, active: tab==='info' }" @click="openTab('info')">{{ __('Information') }}</a></li>
            <li class="nav-item"><a href="javascript:;" :class="{'nav-link':true, active: tab==='layout' }" @click="openTab('layout')">{{ __('Layout') }}</a></li>
            <li class="nav-item"><a href="javascript:;" :class="{'nav-link':true, active: tab==='seo' }" @click="openTab('seo')">{{ __('SEO') }}</a></li>
            <li class="nav-item"><a href="javascript:;" :class="{'nav-link':true, active: tab==='tickets' }" @click="openTab('tickets')">{{ __('Tickets') }}</a></li>
            <li class="nav-item"><a href="javascript:;" :class="{'nav-link':true, active: tab==='status' }" @click="openTab('status')">{{ __('Status Page') }}</a></li>
        </ul>


        <div class="row">
            <div class="col-6">

                <form action="{{ route('admin::settings::save') }}" method="post" >
                    @csrf


                    <fieldset v-if="tab==='info'">
                        <legend>{{ __('Site information') }}</legend>

                        <div class="form-group">
                            <input type="text" name="settings[site_name]" value="{{ setting('site_name') }}" class="form-control" placeholder="{{ __('Site name') }}">
                        </div>

                        <div class="form-group">
                            <input type="text" name="settings[search_placeholder]" value="{{ setting('search_placeholder') }}" class="form-control" placeholder="{{ __('Search placeholder') }}">
                        </div>
                    </fieldset>

                    <fieldset v-if="tab==='layout'">
                        <legend>{{ __('Site Layout') }}</legend>

                        <div class="form-group">
                            <select name="settings[fp_layout]" id="fp_layout" class="form-control">
                                <option value="default" {{ setting('fp_layout', 'default') == 'default' ? 'selected' : '' }}>{{ __('Default Layout - Category blocks') }}</option>
                                <option value="basic_1" {{ setting('fp_layout', 'default') == 'basic_1' ? 'selected' : '' }}>{{ __('Basic 1 - Browse by category') }}</option>
                                <option value="basic_2" {{ setting('fp_layout', 'default') == 'basic_2' ? 'selected' : '' }}>{{ __('Basic 2') }}</option>
                                <option value="basic_2" {{ setting('fp_layout', 'default') == 'basic_3' ? 'selected' : '' }}>{{ __('Basic 3') }}</option>
                            </select>
                        </div>
                    </fieldset>

                    <fieldset v-if="tab==='seo'">
                        <legend>{{ __('SEO') }}</legend>

                        <div class="form-group">
                            <input type="text" name="settings[frontpage_title]" value="{{ setting('frontpage_title') }}" class="form-control" placeholder="{{ __('Frontpage\'s title') }}">
                        </div>
                    </fieldset>

                    <fieldset v-if="tab==='tickets'">
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

                    <fieldset v-if="tab==='status'">
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

@push('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.6/vue.js"></script>

    <script>
        var appForm = new Vue({
            el: "#formApp",

            data: {
                tab: "info"
            },

            methods: {
                openTab(tabName) {
                    this.tab = tabName
                }
            }
        })
    </script>
@endpush