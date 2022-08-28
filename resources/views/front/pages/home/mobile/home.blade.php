<div class="home">

    @include('front.components.mobile.main_slider', ['slider' => $slider])
    @include('front.components.mobile.main_featured', ['therapies' => $therapies])
    @include('front.components.mobile.main_text_info')
    {{-- @include('front.components.mobile.main_prices', ['prices' => $prices]) --}}
    @include('front.components.mobile.main_textual_banner', ['post' => $post])

</div>