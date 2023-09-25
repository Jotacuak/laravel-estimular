<div class="featured">
    <div class="one-column">
        <div class="column">
            <div class="featured-title">
                <h3>Encuentra la terapia que más se adapta a tu situación</h3>
            </div>
        </div>
    </div>
    
    <div class="featured-elements">
        <div class="four-columns">
            @foreach($therapies as $therapy)
                <div class="column">
                    <div class="featured-element">
                        <div class="featured-element-image">
                            @if($agent->isDesktop())
                                <img src="{{Storage::url($therapy->image_icon_desktop->path)}}">
                            @endif

                            @if($agent->isMobile())
                                <img src="{{Storage::url($therapy->image_icon_mobile->path)}}">
                            @endif
                        </div>
                        <div class="featured-element-title">
                            @if($therapy->seo()->first())
                                <h3>{{$therapy->seo()->first()->title}}</h3>
                            @endif
                        </div>

                        <div class="featured-element-subtitle">
                            @isset($therapy->locale['subtitle'])
                                <h4>{{$therapy->locale['subtitle']}}</h4>
                            @endif
                        </div>

                        <div class="featured-element-button">
                            <button>Más información</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>