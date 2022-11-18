@php
    $route = 'posts';
    $filters = ['category' => $posts_categories, 'search' => true, 'created_at' => true ]; 
    // $order = ['fecha de creación' => 'created_at', 'nombre' => 'name', 'categoría' => 'category_id'];
@endphp

@section('topbar_title') <h3>@lang('admin/blogs.parent_section')</h3> @endsection

@extends('admin.layout.table_form')

@section('table')

    <div class="admin-table page-section" id="posts">

        @if(!$posts->isEmpty())

            @foreach ($posts as $posts_element)
                <div class="admin-table-elements">
                    <div class="admin-table-element-info">
                        <ul>
                            <li class="info-element">Nombre:{{$posts_element->name}}</li>
                            <li class="info-element">Categoría:{{$posts_element->category->name}}</li>
                            <li class="info-element">Autor:{{$posts_element->author}}</li>
                            <li class="info-element">Creado el:{{ Carbon\Carbon::parse($posts_element->created_at)->format('d-m-Y') }}</li>
                        </ul>
                    </div>
                    <div class="admin-table-element-buttons">
                    <div class="admin-table-element-button">
                            <button type="button" id="edit-button" data-url="{{route('posts_edit', ['post' => $posts_element->id])}}">
                                <svg viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                </svg>
                            </button>
                        </div>
                    <div class="admin-table-element-button">
                            <button type="button" id="delete-button" data-url="{{route('posts_destroy', ['post' => $posts_element->id])}}">
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

    @isset($post)

        <div class="crud-form">
            <form action="{{route("posts_store")}}" class="admin-form" id="posts-form" autocomplete="off">
                <div class="crud-form-buttons">
                    <div class="tabs">
                        <button data-tab="content" class="tabslinks active">Contenido</button>
                        <button data-tab="images" class="tabslinks">Imagenes</button>
                    </div>
                
                    @include('admin.components.form_buttons', ['visible' => $post->visible, 'create' => 'create'])

                </div>

                <div class="content">
                    <div data-content="content" class="tabcontent active">
                        <input autocomplete="false" name="hidden" type="text" style="display:none;">
                        <input type="hidden" name="id" value="{{isset($post->id) ? $post->id : ''}}">
                        <div class="crud-form-elements">
                            <div class="two-columns">
                                <div class="form-group">                                
                                    <div class="crud-form-element">
                                        <label for="title">Nombre:</label>
                                    </div>
                                    <div class="crud-form-element">
                                        <input class="input-bar" type="text" name="name" value="{{isset($post->name) ? $post->name : ''}}">
                                    </div>                                
                                </div>
                                <div class="form-group">                       
                                    <div class="crud-form-element">
                                        <label for="category">Categoría:</label>
                                    </div>
                                    <div class="crud-form-element">
                                        <select name="category_id" data-placeholder="Seleccione una categoría" class="input-bar">
                                            <option></option>
                                            @foreach($posts_categories as $posts_category)
                                                <option value="{{$posts_category->id}}" {{$post->category_id == $posts_category->id ? 'selected':''}} class="category_id">{{ $posts_category->name }}</option>
                                            @endforeach
                                        </select>           
                                    </div>                         
                                </div>
                            </div>

                            <div class="crud-form-element">
                                <label for="title">Autor:</label>
                            </div>
                            <div class="crud-form-element">
                                <input class="input-bar" type="text" name="author" value="{{isset($post->author) ? $post->author : ''}}">
                            </div>

                            <div class="crud-form-element">
                                <label for="title">Título:</label>
                            </div>
                            <div class="crud-form-element">
                                <input class="input-bar" type="text" name="title" value="{{isset($post->title) ? $post->title : ''}}">
                            </div>

                            <div class="crud-form-element">
                                <label for="comment">Resumen:</label>
                            </div>
                            <div class="crud-form-element sumary">
                                <textarea class="ckeditor input-counter" maxlength='160' name="sumary" id="ckeditor" value="{{isset($post->sumary) ? $post->sumary : ''}}">{{isset($post["sumary"]) ? $post["sumary"] : ''}}</textarea>
                                <p><span>0</span>/160</p>
                            </div>
                        
                            <div class="crud-form-element">
                                <label for="comment">Descripción:</label>
                            </div>
                            <div class="crud-form-element">
                                <textarea class="ckeditor" name="description" id="ckeditor" value="{{isset($post->description) ? $post->description : ''}}">{{isset($post["description"]) ? $post["description"] : ''}}</textarea>
                            </div>

                        </div>        
                    </div>

                </div>

                <div class="tabcontent"  data-content="images" >
                        
                    <div class="two-columns">
                        <div class="form-group">                                
                            <div class="crud-form-element">
                                <label for="title">Imagen destacada:</label>
                            </div>
                            <div class="crud-form-element">
                                <div class="crud-form-element">
                                    @include('admin.components.upload_image', [
                                        'entity' => 'posts',
                                        'type' => 'single', 
                                        'content' => 'featured', 
                                        'alias' => 'es',
                                        'files' => $post->images_featured_preview
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