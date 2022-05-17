<div class="home">

    @include('front.components.desktop.main_slider')
    @include('front.components.desktop.main_featured')
    @include('front.components.desktop.main_textInfo')
    @include('front.components.desktop.main_prices', ['rates' => $rates])
    @include('front.components.desktop.main_textualBanner')

</div>