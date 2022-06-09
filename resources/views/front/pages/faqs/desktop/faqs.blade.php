@php
    $route = 'faqs';
@endphp

<div class="faqs">

    @isset($faqs) 

        @foreach ($faqs as $faq)

            <div class="faqs-container">
                <div class="faqs-element">
                    <div class="faqs-element-question">
                        <div class="faqs-element-title">
                            <h3>{{$faq->title}}</h3>
                        </div>
                        <div class="faqs-element-icon">
                            <svg viewBox="0 0 24 24">
                                <path fill="currentColor" d="M7,10L12,15L17,10H7Z" />
                            </svg>
                        </div>
                    </div>
                    <div class="faqs-element-answer">
                        @isset($faq->image_featured_desktop->path)
                            <div class="faq-description-image">
                                <img src="{{Storage::url($faq->image_featured_desktop->path)}}" alt="{{$faq->image_featured_desktop->alt}}" title="{{$faq->image_featured_desktop->title}}" />
                            </div>
                        @endif
                        <p>{!!isset($faq->description) ? $faq->description : "" !!}</p>
                    </div>
                </div>
            </div>

        @endforeach

    @endisset

</div>