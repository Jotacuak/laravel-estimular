@php
    $route = 'rates';
@endphp

@extends('admin.layout.table_form')

@section('table')

    @if(!$rates->isEmpty())

        <div class="admin-table">
            @foreach ($rates as $rates_element)
                <div class="admin-table-elements">
                    <div class="admin-table-element-info">
                        <ul>
                            <li class="info-element">Nombre:{{$rates_element->name}}</li>
                            <li class="info-element">Categoría:{{$rates_element->category->name}}</li>
                            <li class="info-element">Creado el:{{ Carbon\Carbon::parse($rates_element->created_at)->format('d-m-Y') }}</li>
                        </ul>
                    </div>
                    <div class="admin-table-element-buttons">
                    <div class="admin-table-element-button">
                            <button type="button" id="edit-button" data-url="{{route('rates_edit', ['rates' => $rates_element->id])}}">
                                <svg viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                </svg>
                            </button>
                        </div>
                    <div class="admin-table-element-button">
                            <button type="button" id="delete-button" data-url="{{route('rates_destroy', ['rates' => $rates_element->id])}}">
                                <svg viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>            
            @endforeach
        </div>
    @else
        <div class="admin-table-elements">
            <div class="admin-table-info">
                <h3>NO HAY NINGÚN ELEMENTO</h3>
            </div>
        </div>
    @endif

@endsection

@section('form')

    @isset($rates)

        <div class="crud-form">
            <form action="{{route("rates_store")}}" class="admin-form" id="rates-form" autocomplete="off">
                <div class="crud-form-buttons">
                    <div class="tabs">
                        <button data-tab="zero" class="tabslinks active">Contenido</button>
                        <button data-tab="one" class="tabslinks">Imagenes</button>
                        <button data-tab="two" class="tabslinks">Otros</button>
                    </div>
                
                    @include('admin.components.form_buttons', ['visible' => $rate->visible])

                </div>

                <div class="content">
                    <div data-content="zero" class="tabcontent active">
                        <input autocomplete="false" name="hidden" type="text" style="display:none;">
                        <input type="hidden" name="id" value="{{isset($rates->id) ? $rates->id : ''}}">
                        <div class="crud-form-elements">
                            <div class="two-columns">
                                <div class="form-group">                                
                                    <div class="crud-form-element">
                                        <label for="title">Nombre:</label>
                                    </div>
                                    <div class="crud-form-element">
                                        <input class="input-bar" type="text" name="name" value="{{isset($rates->name) ? $rates->name : ''}}">
                                    </div>                                
                                </div>
                            </div>

                            <div class="crud-form-element">
                                <label for="title">Título:</label>
                            </div>
                            <div class="crud-form-element">
                                <input class="input-bar" type="text" name="title" value="{{isset($rates->title) ? $rates->title : ''}}">
                            </div>
                        
                            <div class="crud-form-element">
                                <label for="comment">Descripción:</label>
                            </div>
                            <div class="crud-form-element">
                                <textarea class="ckeditor" name="description" id="ckeditor" value="{{isset($rates->description) ? $rates->description : ''}}"></textarea>
                            </div>
                        </div>        
                    </div>
                </div>
            </form>
        </div>

    @endisset

@endsection