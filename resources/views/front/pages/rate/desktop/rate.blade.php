@php
    $route = 'rates';
@endphp

<div class="rates">

    @isset($rates)

        @foreach ($rates as $rate_element)

            <div class="rates-elements">
                <div class="rates-element">
                    <div class="rates-element-title">
                        <h2>{!!isset($rate_element->title) ? $rate_element->title : "" !!}</h2>
                    </div>
                </div>
                <div class="rates-element">
                    <div class="rates-element-content">
                        <p>{!!isset($rate_element->content) ? $rate_element->content : "" !!}</p>
                    </div>
                </div>
            </div>

        @endforeach

    @endisset
</div>