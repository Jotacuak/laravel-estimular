@php
    $route = 'prices';
@endphp

@section('topbar_title') <h3>@lang('admin/prices.parent_section')</h3> @endsection

@extends('admin.layout.table_form')

@section('table')

    <div class="admin-table" id="prices">

        @if(!$prices->isEmpty())

            @foreach ($prices as $price_element)
                <div class="admin-table-elements">
                    <div class="admin-table-element-info">
                        <ul>
                            <li class="info-element">Nombre:{{$price_element->name}}</li>
                            <li class="info-element">Tipo:{{$price_element->type}}</li>
                            <li class="info-element">Precio:{{$price_element->subtotal}}</li>
                            <li class="info-element">Creado el:{{ Carbon\Carbon::parse($price_element->created_at)->format('d-m-Y') }}</li>
                        </ul>
                    </div>
                    <div class="admin-table-element-buttons">
                    <div class="admin-table-element-button">
                            <button type="button" id="edit-button" data-url="{{route('prices_edit', ['price' => $price_element->id])}}">
                                <svg viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                </svg>
                            </button>
                        </div>
                    <div class="admin-table-element-button">
                            <button type="button" id="delete-button" data-url="{{route('prices_destroy', ['price' => $price_element->id])}}">
                                <svg viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>            
            @endforeach
        
        @else
            <div class="admin-table-null">
                <h3>NO HAY NINGÚN ELEMENTO</h3>
            </div>
        @endif

    </div>

@endsection

@section('form')

    @isset($price)

        <div class="crud-form">
            <form action="{{route("prices_store")}}" class="admin-form" id="prices-form" autocomplete="off">
                <div class="crud-form-buttons">
                    <div class="tabs">
                        <button data-tab="zero" class="tabslinks active">Contenido</button>
                    </div>
                
                    @include('admin.components.form_buttons', ['visible' => $price->visible, 'create' => 'create'])

                </div>

                <div class="content">
                    <div data-content="zero" class="tabcontent active">

                        <input autocomplete="false" name="hidden" type="text" style="display:none;">
                        <input type="hidden" name="id" value="{{isset($price->id) ? $price->id : ''}}">
                        <div class="crud-form-elements">

                            <div class="two-columns">
                                <div class="form-group">
                                    <div class="crud-form-element">
                                        <label for="title">Selecciona tarifa de referencia:</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="crud-form-element">
                                        <select name="rates_id" class="input-bar" data-placeholder="Seleccione una categoría">
                                            <option></option>
                                            @foreach($rates as $rate)
                                                <option value="{{$rate->id}}" {{$price->rates_id == $rate->id ? 'selected':''}} class="input-bar">{{ $rate->name }}</option>
                                            @endforeach
                                        </select>   
                                    </div>  
                                </div>
                            </div>

                            <div class="three-columns">

                                <div class="form-group">                                
                                    <div class="crud-form-element">
                                        <label for="title">Nombre:</label>
                                    </div>
                                    <div class="crud-form-element">
                                        <input class="input-bar" type="text" name="name" value="{{isset($price->name) ? $price->name : ''}}">
                                    </div>                                
                                </div>

                                <div class="form-group">                                
                                    <div class="crud-form-element">
                                        <label for="title">Tipo:</label>
                                    </div>
                                    <div class="crud-form-element">
                                        <select class="input-bar" name="type">
                                            <option value="dia" {{$price->type == 'dia'? 'selected':''}}>Día</option>
                                            <option value="bono" {{$price->type == 'bono'? 'selected':''}}>Bono</option>
                                        </select>
                                    </div>                                
                                </div>

                                <div class="form-group">                                
                                    <div class="crud-form-element">
                                        <label for="title">Precio:</label>
                                    </div>
                                    <div class="crud-form-element">
                                        <input class="input-bar" type="text" name="subtotal" value="{{isset($price->subtotal) ? $price->subtotal : ''}}">
                                    </div>                                
                                </div>

                            </div>                             

                            <div class="crud-form-element">
                                <label for="comment">Descripción:</label>
                            </div>
                            <div class="crud-form-element">
                                <textarea class="ckeditor" name="sumary" id="ckeditor" value="{{isset($price->sumary) ? $price->sumary : ''}}">{{isset($price["sumary"]) ? $price["sumary"] : ''}}</textarea>
                            </div>
                        </div>

                    </div>

                </div>
            </form>
        </div>

    @endisset

@endsection