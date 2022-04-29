<div class="blog main">

    @include('front.layout.partials.page_title', [
        'title' => 'Blog cognitivo',
        'subtitle' => ''
    ])

    <div class="desktop-two-columns-aside">
        <div class="column-main">
            @include('front.components.desktop.main_blog_element')
        </div>
        <div class="column-aside">
            @include('front.components.desktop.main_blog_nav')
        </div>
    </div>
</div>