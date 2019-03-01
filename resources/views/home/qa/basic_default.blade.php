@if($categories->count() > 0)
    @foreach($categories->chunk(3) as $chunk_of_categories)
        <div class="row">
            @foreach($chunk_of_categories as $category)
                <div class="col-md-4 text-center my-1">
                    <a href="{{ route('articles::article-by-category', [$category->id, $category->slug]) }}">
                        <div class="card">
                            <div class="card-body text-dark">
                                {{ $category->name }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endforeach
@else
    <div class="text-center text-muted my-3">
        {{ __('There are no categories') }}
    </div>
@endif