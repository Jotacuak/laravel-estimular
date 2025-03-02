<div class="therapies main">

    @isset($therapy) 

        @include('front.layout.partials.page_title', [
            'title' => ($therapy->name),
            'subtitle' => ($therapy->title)
        ])

        <div class="therapies-container">
            <div class="therapies-elements">

                <div class="therapies-element-image">
                    <img src="{{Storage::url('alzheimer.webp')}}" alt="alzheimer">
                </div>

                <div class="therapies-element-description">
                    <p>{!!isset($therapy->description) ? $therapy->description : "" !!}</p>
                </div>

            </div>
        </div>

    @endisset

    {{-- @include('front.components.desktop.contact_button') --}}

</div>