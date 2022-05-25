<div class="blog-nav-container">
    <div class="blog-nav-categories">

        @isset($posts_categories)

            @foreach ($posts_categories as $posts_category)

                <div class="blog-nav-category category-button" data-url="{{route('post_category_filter', ['name' => $posts_category->name])}}">
                    <h3>{{$posts_category->name}}</h3>
                </div>

            @endforeach

        @endisset

    </div>
</div>