<div class="therapies main">

    @isset($therapy) 

        <div class="therapies-container">
            <div class="therapies-elements">

                <div class="therapies-element-image">`
                    @if($agent->isDesktop())
                        <img src="{{Storage::url($therapy->image_featured_desktop->path)}}">
                    @endif

                    @if($agent->isMobile())
                        <img src="{{Storage::url($therapy->image_featured_mobile->path)}}">
                    @endif
                </div>

                <div class="therapies-element-description">
                    <p>{!!isset($therapy->description) ? $therapy->description : "" !!}</p>
                </div>

            </div>
        </div>

    @endisset

    {{-- @include('front.components.desktop.contact_button') --}}

</div>