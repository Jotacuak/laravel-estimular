@php
    $route = 'faqs';
@endphp

<div class="faqs">

    @isset($faqs) 

        @foreach ($faqs as $faq_element)

            <div class="faqs-container">
                <div class="faqs-element">
                    <div class="faqs-element-question">
                        <div class="faqs-element-title">
                            <h3>{{$faq_element->title}}</h3>
                        </div>
                        <div class="faqs-element-icon">
                            <svg viewBox="0 0 24 24">
                                <path fill="currentColor" d="M7,10L12,15L17,10H7Z" />
                            </svg>
                        </div>
                    </div>
                    <div class="faqs-element-answer">
                        <p>{!!isset($faq_element->description) ? $faq_element->description : "" !!}</p>
                    </div>
                </div>
            </div>

        @endforeach

    @endisset

</div>