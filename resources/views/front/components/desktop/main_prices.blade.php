<div class="price-cards">
    <div class="price-container">

        <div class="desktop-one-column">
            <div class="column">

                <div class="swich-button">
                    <div class="price-type" data-table=dia>
                        <h2>Día</h2>
                    </div>
                    <label class="switch xl">
                        <input id="swich-btn" type="checkbox">
                        <span class="slider-bar round"></span>
                    </label>
                    <div class="price-type" data-table=bono>
                        <h2>Bono</h2>
                    </div>
                </div>

            </div>
        </div>
    
        <div class="cards-elements">
            <div class="desktop-two-columns">                

                @isset($prices)

                    @foreach ($prices as $price)

                        <div class="column">    
                            <div class="card-container">

                                @if($price->type == 'dia')

                                    <div class="card-element side-a ">
                                        <div class="card-element-image">
                                            <img src="{{Storage::url('prices-card.webp')}}" alt="alquiler de llaut en Mallorca">
                                        </div>    
                                        <div  class="card-element-description">
                                            <div class="card-element-price">
                                                <h2>{{$price->subtotal}}</h2>
                                            </div>
                                            <div class="card-element-title">
                                                <h3>{!!isset($price->sumary) ? $price->sumary : "" !!}</h3>
                                            </div>
                                            <div class="card-element-button">
                                                <button type="button" class="price-button">Contáctanos</button>
                                            </div>
                                        </div>
                                    </div>

                                @elseif($price->type == 'bono')

                                    <div class="card-element side-b">
                                        <div class="card-element-image">
                                            <img src="{{Storage::url('prices-card.webp')}}" alt="alquiler de llaut en Mallorca">
                                        </div>    
                                        <div  class="card-element-description">
                                            <div class="card-element-price">
                                                <h2>{{$price->subtotal}}</h2>
                                            </div>
                                            <div class="card-element-title">
                                                <h3>{!!isset($price->sumary) ? $price->sumary : "" !!}</h3>
                                            </div>
                                            <div class="card-element-button">
                                                <button type="button" class="price-button">Contáctanos</button>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                                
                            </div>
                        </div>

                    @endforeach

                @endisset

            </div>
        </div>
    </div>   
</div>