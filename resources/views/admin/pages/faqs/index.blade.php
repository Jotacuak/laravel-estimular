@php
    $route = 'faqs';
    $filters = ['category' => $faqs_categories, 'search' => true, 'created_at' => true ]; 
    // $order = ['fecha de creación' => 'created_at', 'nombre' => 'name', 'categoría' => 'category_id'];
@endphp

@extends('admin.layout.table_form')

@section('table')

    <div class="admin-table" id="faqs">

        @if(!$faqs->isEmpty())
            
            @foreach ($faqs as $faq_element)
                <div class="admin-table-elements">
                    <div class="admin-table-element-info">
                        <ul>
                            <li class="info-element">Nombre:{{$faq_element->name}}</li>
                            <li class="info-element">Categoría:{{$faq_element->category->name}}</li>
                            <li class="info-element">Creado el:{{ Carbon\Carbon::parse($faq_element->created_at)->format('d-m-Y') }}</li>
                        </ul>
                    </div>
                    <div class="admin-table-element-buttons">
                    <div class="admin-table-element-button">
                            <button type="button" id="edit-button" data-url="{{route('faqs_edit', ['faq' => $faq_element->id])}}" data-crud="edit-button">
                                <svg viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                </svg>
                            </button>
                        </div>
                    <div class="admin-table-element-button">
                            <button type="button" id="delete-button" data-url="{{route('faqs_destroy', ['faq' => $faq_element->id])}}" data-crud="destroy-button">
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

    @isset($faq)

        <div class="crud-form">
            <form action="{{route("faqs_store")}}" class="admin-form" id="faqs-form" autocomplete="off">
                <div class="crud-form-buttons">
                    <div class="tabs">
                        <button data-tab="zero" class="tabslinks active">Contenido</button>
                        <button data-tab="one" class="tabslinks">Imagenes</button>
                        <button data-tab="two" class="tabslinks">Otros</button>
                    </div>
                
                    @include('admin.components.form_buttons', ['route' => $route, 'visible' => $faq->visible, 'create' => 'create'])

                </div>

                <div class="content">
                    <div data-content="zero" class="tabcontent active">
                        <input autocomplete="false" name="hidden" type="text" style="display:none;">
                        <input type="hidden" name="id" value="{{isset($faq->id) ? $faq->id : ''}}">
                        <div class="crud-form-elements">
                            <div class="two-columns">
                                <div class="form-group">                                
                                    <div class="crud-form-element">
                                        <label for="title">Nombre:</label>
                                    </div>
                                    <div class="crud-form-element">
                                        <input class="input-bar" type="text" name="name" value="{{isset($faq->name) ? $faq->name : ''}}">
                                    </div>                                
                                </div>
                                <div class="form-group">                       
                                    <div class="crud-form-element">
                                        <label for="categories">Categoría:</label>
                                    </div>
                                    <div class="crud-form-element">
                                        <select name="category_id" data-placeholder="Seleccione una categoría">
                                            <option></option>
                                            @foreach($faqs_categories as $faq_category)
                                                <option value="{{$faq_category->id}}" {{$faq->category_id == $faq_category->id ? 'selected':''}} class="category_id">{{ $faq_category->name }}</option>
                                            @endforeach
                                        </select>           
                                    </div>                         
                                </div>
                            </div>

                            <div class="crud-form-element">
                                <label for="title">Título:</label>
                            </div>
                            <div class="crud-form-element">
                                <input class="input-bar" type="text" name="title" value="{{isset($faq->title) ? $faq->title : ''}}">
                            </div>
                        
                            <div class="crud-form-element">
                                <label for="comment">Descripción:</label>
                            </div>
                            <div class="crud-form-element">
                                <textarea class="ckeditor" name="description" id="ckeditor" value="{{isset($faq->description) ? $faq->description : ''}}">{{isset($faq["description"]) ? $faq["description"] : ''}}</textarea>
                            </div>
                        </div>        
                    </div>

                    {{-- <div  data-content="one" class="tabcontent">
                        <input autocomplete="false" name="hidden" type="text" style="display:none;">
                        <input type="hidden" name="id" value="{{isset($faq->id) ? $faq->id : ''}}">

                        <div class="crud-form-elements">
                            <div class="crud-form-element">
                                <label for="title">Título:</label>
                            </div>
                            <div class="crud-form-element">
                                <input class="title-bar" type="text" id="title" name="title">
                            </div>
                        </div>
                        <div class="crud-form-elements">
                            <div class="crud-form-element">
                                <label for="comment">Descripción:</label>
                            </div>
                            <div class="crud-form-element">
                                <input type="textarea" class="ckeditor" name="content" id="ckeditor" >
                            </div>
                        </div>   
                    </div>

                    <div  data-content="two" class="tabcontent">
                        <input autocomplete="false" name="hidden" type="text" style="display:none;">
                        <input type="hidden" name="id" value="{{isset($faq->id) ? $faq->id : ''}}">

                        <div class="crud-form-elements">
                            <div class="crud-form-element">
                                <label for="title">Título:</label>
                            </div>
                            <div class="crud-form-element">
                                <input class="title-bar" type="text" id="title" name="title">
                            </div>
                        </div>
                        <div class="crud-form-elements">
                            <div class="crud-form-element">
                                <label for="comment">Descripción:</label>
                            </div>
                            <div class="crud-form-element">
                                <input type="textarea" class="ckeditor" name="content" id="ckeditor" >
                            </div>
                        </div>   
                    </div> --}}
                </div>
            </form>
        </div>

    @endisset

@endsection