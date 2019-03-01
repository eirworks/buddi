@extends('layouts.admin')

@section('title')
    {{ $article->id ? $article->title : __("Create Article") }}
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin::home') }}">{{ __('Admin Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin::articles::all') }}">{{ __('Articles') }}</a></li>
                    <li class="breadcrumb-item">@yield('title')</li>
                </ul>
            </div>
        </div>

        <form action="{{ $article->id ? route('admin::articles::update', [$article]) : route('admin::articles::create') }}" method="post" id="form-app">
            @csrf
            <div class="row mb-5">

                <div class="col-8">
                    <ul class="nav nav-tabs mb-3">
                        <li class="nav-item"><a :class="{ 'nav-link': true, 'active': !openPreview, }" href="javascript:;" @click="openPreview=false">{{ __('Editor') }}</a></li>
                        <li class="nav-item"><a :class="{'nav-link': true, 'active': openPreview }" href="javascript:;" @click="preview()">{{ __('Preview') }}</a></li>
                    </ul>

                    <div v-if="!openPreview">

                        <div class="form-group">
                            <input v-model="title" type="text" name="title" value="{{ $article->title }}" placeholder="{{ __('Your article\'s title') }}" class="form-control">
                        </div>

                        <div class="form-group">
                        <textarea
                                v-model="content"
                                name="content_md"
                                id="content_md"
                                cols="30"
                                rows="10"
                                class="form-control"
                                placeholder="{{ __('Article content') }}">{{ $article->content_md }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col">
                            </div>
                        </div>
                    </div>

                    <div v-else>
                        <div v-html="compiledContent"></div>
                    </div>



                </div>
                <div class="col">

                    <div class="btn-group">

                        <div class="dropdown">
                            <button type="submit" name="action" value="publish" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">{{ __($article->id ? 'Update' : 'Publish') }}</button>

                            <div class="dropdown-menu">
                                <button type="submit" name="action" value="publish" class="btn btn-primary dropdown-item">{{ __($article->id ? 'Update' : 'Publish') }}</button>
                                <button type="submit" name="action" value="draft" class="btn btn-light dropdown-item">{{ __('Save as draft') }}</button>
                            </div>

                        </div>
                        @if($article->published)
                            <a href="{{ route('articles::show', [$article, $article->slug]) }}" class="btn btn-light" target="_blank">{{ __('View') }}</a>
                        @endif
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="category_id">{{ __('Select category') }}</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="" {{ 0 == $article->category_id ? 'selected' : '' }}>{{ __('No category') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $article->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" id="featured" name="featured" value="1" class="form-check-input" {{ $article->featured ? 'checked' : '' }}>
                            <label for="featured" class="form-check-label">{{ __('Featured article') }}</label>
                        </div>
                    </div>

                    <hr>
                    <h5>SEO</h5>

                    <div class="form-group">
                        <input type="text" class="form-control" name="slug" value="" v-model="slug" placeholder="{{ __('Slug URL') }}">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="data[seo_title]" value="" v-model="seo_title" placeholder="{{ __('SEO Title') }}">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="data[seo_keywords]" value="" v-model="seo_keywords" placeholder="{{ __('SEO Keyword') }}">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="data[seo_description]" value="" v-model="seo_description" placeholder="{{ __('SEO Description') }}">
                    </div>


                </div>
            </div>

        </form>
    </div>
@endsection

@push('footer')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.6/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked@0.6.0/marked.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slug@0.9.3/slug.min.js"></script>

    <div class="d-none" id="content-value">
        {{ $article->content_md }}
    </div>

    <script>

        var app = new Vue({
            el: "#form-app",

            mounted() {
                this.content = $("#content-value").text().trim();
            },

            data() {
                return {
                    content: "",
                    compiledContent: "",
                    slug: "{{ $article->slug }}",
                    title: "{{ $article->title }}",
                    openPreview: false,
                    seo_title: "{{ collect($article->data)->get('seo_title') }}",
                    seo_keywords: "{{ collect($article->data)->get('seo_keywords') }}",
                    seo_description: "{{ collect($article->data)->get('seo_description') }}",
                }
            },

            methods: {
                preview() {
                    this.openPreview = true;
                    this.compiledContent = marked(this.content);
                }
            },

            watch: {
                title: function(newVal, oldVal) {
                    if (newVal !== oldVal)
                    {
                        this.slug = slug(this.title, {lower: true})
                    }
                }
            }
        })
    </script>
@endpush