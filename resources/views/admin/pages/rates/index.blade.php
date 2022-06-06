@php
    $route = 'rates';
@endphp

@section('topbar_title') <h3>@lang('admin/rates.parent_section')</h3> @endsection

@extends('admin.layout.table_form')

@section('table')

    <div class="admin-table" id="rates">

        @if(!$rates->isEmpty())

            @foreach ($rates as $rate_element)
                <div class="admin-table-elements">
                    <div class="admin-table-element-info">
                        <ul>
                            <li class="info-element">Nombre:{{$rate_element->name}}</li>
                            <li class="info-element">Creado el:{{ Carbon\Carbon::parse($rate_element->created_at)->format('d-m-Y') }}</li>
                        </ul>
                    </div>
                    <div class="admin-table-element-buttons">
                    <div class="admin-table-element-button">
                            <button type="button" id="edit-button" data-url="{{route('rates_edit', ['rate' => $rate_element->id])}}">
                                <svg viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                </svg>
                            </button>
                        </div>
                    <div class="admin-table-element-button">
                            <button type="button" id="delete-button" data-url="{{route('rates_destroy', ['rate' => $rate_element->id])}}">
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

    @isset($rate)

        <div class="crud-form">
            <form action="{{route("rates_store")}}" class="admin-form" id="rates-form" autocomplete="off">
                <div class="crud-form-buttons">
                    <div class="tabs">
                        <button data-tab="zero" class="tabslinks active">Contenido</button>
                        <button data-tab="one" class="tabslinks">Imagenes</button>
                        <button data-tab="two" class="tabslinks">Seo</button>
                    </div>
                
                    @include('admin.components.form_buttons', ['visible' => $rate->visible, 'create' => 'create'])

                </div>

                <div class="content">
                    <div data-content="zero" class="tabcontent active">

                        <input autocomplete="false" name="hidden" type="text" style="display:none;">
                        <input type="hidden" name="id" value="{{isset($rate->id) ? $rate->id : ''}}">
                        <div class="crud-form-elements">
                            <div class="two-columns">
                                <div class="form-group">                                
                                    <div class="crud-form-element">
                                        <label for="title">Nombre:</label>
                                    </div>
                                    <div class="crud-form-element">
                                        <input class="input-bar" type="text" name="name" value="{{isset($rate->name) ? $rate->name : ''}}">
                                    </div>                                
                                </div>
                            </div>

                            <div class="crud-form-element">
                                <label for="title">Título:</label>
                            </div>
                            <div class="crud-form-element">
                                <input class="input-bar" type="text" name="title" value="{{isset($rate->title) ? $rate->title : ''}}">
                            </div>                               

                            <div class="crud-form-element">
                                <label for="comment">Descripción:</label>
                            </div>
                            <div class="crud-form-element">
                                <textarea class="ckeditor" name="content" id="ckeditor" value="{{isset($rate->content) ? $rate->content : ''}}">{{isset($rate["content"]) ? $rate["content"] : ''}}</textarea>
                            </div>
                        </div> 

                    </div>
{{-- 
                    <div data-content="three" class="tabcontent" data-table="prices">

                    </div> --}}
                </div>
            </form>
        </div>

    @endisset

@endsection