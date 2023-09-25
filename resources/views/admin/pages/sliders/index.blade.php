@php
    $route = 'sliders';
@endphp

@section('topbar_title') <h3>@lang('admin/sliders.parent_section')</h3> @endsection

@extends('admin.layout.table_form')

@section('table')

    <div class="admin-table page-section" id="sliders">

        @if(!$sliders->isEmpty())

            @foreach ($sliders as $slide_element)
                <div class="admin-table-elements">
                    <div class="admin-table-element-info">
                        <ul>
                            <li class="info-element">Nombre:{{$slide_element->name}}</li>
                            <li class="info-element">Creado el:{{ Carbon\Carbon::parse($slide_element->created_at)->format('d-m-Y') }}</li>
                        </ul>
                    </div>
                    <div class="admin-table-element-buttons">
                    <div class="admin-table-element-button">
                            <button type="button" id="edit-button" data-url="{{route('sliders_edit', ['slide' => $slide_element->id])}}">
                                <svg viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                </svg>
                            </button>
                        </div>
                    <div class="admin-table-element-button">
                            <button type="button" id="delete-button" data-url="{{route('sliders_destroy', ['slide' => $slide_element->id])}}">
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

    @include('admin.components.table_pagination', ['items' => $sliders])

@endsection

@section('form')

    @isset($slide)

        <div class="crud-form">
            <form action="{{route("sliders_store")}}" class="admin-form" id="sliders-form" autocomplete="off">
                <div class="crud-form-buttons">
                    <div class="tabs">
                        <button data-tab="content" class="tabslinks active">Contenido</button>
                        <button data-tab="images" class="tabslinks">Imagenes</button>
                    </div>
                
                    @include('admin.components.form_buttons', ['visible' => $slide->visible, 'create' => 'create'])

                </div>

                <div class="content">
                    <div data-content="content" class="tabcontent active">
                        <input autocomplete="false" name="hidden" type="text" style="display:none;">
                        <input type="hidden" name="id" value="{{isset($slide->id) ? $slide->id : ''}}">
                        <div class="crud-form-elements">
                            <div class="one-column">
                                <div class="form-group">                                
                                    <div class="crud-form-element">
                                        <label for="title">Nombre:</label>
                                    </div>
                                    <div class="crud-form-element">
                                        <input class="input-bar" type="text" name="name" value="{{isset($slide->name) ? $slide->name : ''}}">
                                    </div>                                
                                </div>
                            </div>

                            @component('admin.components.locale', ['tab' => 'content'])

                                @foreach ($localizations as $localization)

                                    <div class="locale-tab-panel {{ $loop->first ? 'locale-tab-active':'' }}" data-tab="content" data-localetab="{{$localization->alias}}">
            
                                        <div class="form-group">                       
                                            <div class="crud-form-element">
                                                <label for="title">Título:</label>
                                            </div>
                                            <div class="crud-form-element">
                                                <input class="input-bar" type="text" name="locale[title.{{$localization->alias}}]" value="{{isset($locale["title.$localization->alias"]) ? $locale["title.$localization->alias"] : ''}}">
                                            </div>
                                        </div>

                                        <div class="form-group">                       
                                            <div class="crud-form-element">
                                                <label for="title">Subtítulo:</label>
                                            </div>
                                            <div class="crud-form-element">
                                                <input class="input-bar" type="text" name="locale[subtitle.{{$localization->alias}}]" value="{{isset($locale["subtitle.$localization->alias"]) ? $locale["subtitle.$localization->alias"] : ''}}">
                                            </div>
                                        </div>

                                        <div class="form-group">                       
                                            <div class="crud-form-element">
                                                <label for="title">Texto del botón:</label>
                                            </div>
                                            <div class="crud-form-element">
                                                <input class="input-bar" type="text" name="locale[textbutton.{{$localization->alias}}]" value="{{isset($locale["textbutton.$localization->alias"]) ? $locale["textbutton.$localization->alias"] : ''}}">
                                            </div>
                                        </div>

                                        <div class="form-group">                       
                                            <div class="crud-form-element">
                                                <label for="title">Enlace:</label>
                                            </div>
                                            <div class="crud-form-element">
                                                <input class="input-bar" type="text" name="locale[link.{{$localization->alias}}]" value="{{isset($locale["link.$localization->alias"]) ? $locale["link.$localization->alias"] : ''}}">
                                            </div>
                                        </div>
                                    
                                    </div>

                                @endforeach
                        
                            @endcomponent

                        </div>        
                    </div>

                </div>

                <div class="tabcontent"  data-content="images" >
                        
                    <div class="two-columns">
                        <div class="form-group">                                
                            <div class="crud-form-element">
                                <label for="title">Imagen Escritorio:</label>
                            </div>
                            <div class="crud-form-element">
                                <div class="crud-form-element">
                                    @include('admin.components.upload_image', [
                                        'entity' => 'slider',
                                        'type' => 'single', 
                                        'content' => 'main-desktop', 
                                        'alias' => 'es',
                                        'files' => $slide->images_featured_desktop_preview
                                    ])
                                </div>
                            </div>                                
                        </div>
                    
                        <div class="form-group">                                
                            <div class="crud-form-element">
                                <label for="title">Imagen Móvil:</label>
                            </div>
                            <div class="crud-form-element">
                                <div class="crud-form-element">
                                    @include('admin.components.upload_image', [
                                        'entity' => 'slider',
                                        'type' => 'single', 
                                        'content' => 'main-mobile', 
                                        'alias' => 'es',
                                        'files' => $slide->images_featured_mobile_preview
                                    ])
                                </div>
                            </div>                                
                        </div>
                    </div>

                </div>

            </form>
        </div>

    @endisset

@endsection