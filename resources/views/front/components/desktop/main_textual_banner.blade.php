<div class="textual-banner">
    <div class="two-columns">
        <div class="column">
            <div class="textual-banner-title">
                <h3>{{$post->title}}</h3>
            </div>
            <div class="textual-banner-description">
                <p>{!! $post->sumary !!}</p>
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