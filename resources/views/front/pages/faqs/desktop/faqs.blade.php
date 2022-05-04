@php
    $route = 'faqs';
@endphp

<div class="faqs main">

    @include('front.layout.partials.page_title', [
        'title' => 'Preguntas frecuentes',
        'subtitle' => ''
    ])

    <div class="faqs-container">
        <div class="faqs-element">
            <div class="faqs-element-question">
                <div class="faqs-element-title">
                    <h3>¿Una pregunta frecuente?</h3>
                </div>
                <div class="faqs-element-icon">
                    <svg viewBox="0 0 24 24">
                        <path fill="currentColor" d="M7,10L12,15L17,10H7Z" />
                    </svg>
                </div>
            </div>
            <div class="faqs-element-answer">
                <p>Una respuesta frecuente</p>
            </div>
        </div>
    </div>

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