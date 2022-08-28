<div class="home">

    @include('front.components.desktop.main_slider', ['slider' => $slider])
    @include('front.components.desktop.main_featured', ['therapies' => $therapies])
    @include('front.components.desktop.main_text_info')
    @include('front.components.desktop.main_prices', ['prices' => $prices])
    @include('front.components.desktop.main_textual_banner', ['post' => $post])

</div>