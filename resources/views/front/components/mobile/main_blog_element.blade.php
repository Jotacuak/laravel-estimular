<div class="blog-container">

    @foreach($posts as $post)

        <div class="blog-elements">
            <div class="blog-element-image">
                @isset($post->image_featured_desktop->path)
                    <div class="faq-description-image">
                        <img src="{{Storage::url($post->image_featured_desktop->path)}}" alt="{{$post->image_featured_desktop->alt}}" title="{{$post->image_featured_desktop->title}}" />
                    </div>
                @endif
            </div>
            <div class="blog-element-text">
                <div class="blog-element-title">
                    <h3>{{$post->title}}</h3>
                </div>
                <div class="blog-element-sumary">
                    <p>{!!isset($post->sumary) ? $post->sumary : "" !!}</p>
                </div>
            </div>
        </div>

    @endforeach
    
</div>