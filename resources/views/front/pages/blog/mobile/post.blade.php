<div class="post">

    <div class="post-title">
        <h3>{{isset($post->seo->title) ? $post->seo->title : ""}}</h3>
    </div>
    
    <div class="faq-description">
        <div class="faq-description-text">
            {!!isset($post->locale['description']) ? $post->locale['description'] : "" !!}
        </div>

        @isset($faq->image_featured_desktop->path)
            <div class="faq-description-image">
                <img src="{{Storage::url($post->image_featured_desktop->path)}}" alt="{{$post->image_featured_desktop->alt}}" title="{{$post->image_featured_desktop->title}}" />
            </div>
        @endif
    </div>

</div>