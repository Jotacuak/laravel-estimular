@php
    $route = 'posts_categories';
@endphp

@extends('admin.layout.table_form')

@section('table')

    <div class="admin-table" id="posts_categories">

        @if(!$posts_categories->isEmpty())

            @foreach ($posts_categories as $posts_category_element)
                <div class="admin-table-elements">
                    <div class="admin-table-element-info">
                        <ul>
                            <li class="info-element">{{$posts_category_element->id}}</li>
                            <li class="info-element">{{$posts_category_element->name}}</li>
                        </ul>
                    </div>
                    <div class="admin-table-element-buttons">
                    <div class="admin-table-element-button">
                            <button type="button" id="edit-button" data-url="{{route('posts_categories_edit', ['post' => $posts_category_element->id])}}">
                                <svg viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                </svg>
                            </button>
                        </div>
                    <div class="admin-table-element-button">
                            <button type="button" id="delete-button" data-url="{{route('posts_categories_destroy', ['post' => $posts_category_element->id])}}">
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

    <div class="crud-form">
        <form action="{{route("posts_categories_store")}}" class="admin-form" id="posts_categories-form" autocomplete="off">
            <div class="crud-form-buttons">
                <div class="tabs">
                    <button data-tab="zero" class="tabslinks active">Contenido</button>
                </div>
            
                @include('admin.components.form_buttons', ['visible' => $posts_category_element->visible])

            </div>

            <div class="content">
                <div data-content="zero" class="tabcontent active">
                    <input autocomplete="false" name="hidden" type="text" style="display:none;">
                    <input type="hidden" name="id" value="{{isset($posts_category->id) ? $posts_category->id : ''}}">

                    <div class="crud-form-elements">
                        <div class="crud-form-element">
                            <label for="name">Nombre:</label>
                        </div>
                        <div class="crud-form-element">
                            <input class="title-bar" type="text" id="title" name="name" value="{{isset($posts_category->name) ? $posts_category->name : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection