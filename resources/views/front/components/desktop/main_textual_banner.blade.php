<div class="textual-banner">
    <div class="two-columns">
        <div class="column">
            <div class="textual-banner-title">
                @if($post->seo()->first())
                    <h3>{{$post->seo()->first()->title}}</h3>
                @endif
            </div>
            <div class="textual-banner-description">
                <p>{!! $post->locale['sumary'] !!}</p>
            </div>
            <div class="slider-button">
                <button class="menu-item featured-button" data-route="">
                    Lee más
                </button>
            </div>
        </div>
    
        <div class="column">
            <div class="textual-banner-image">
                @if($agent->isDesktop())
                    <img src="{{Storage::url($post->image_featured_desktop->path)}}">
                @endif
            </div>
        </div>
    </div>
</div>