@php
    $route = 'faqs_categories';
@endphp

@section('topbar_title') <h3>@lang('admin/faqs_categories.parent_section')</h3> @endsection

@extends('admin.layout.table_form')

@section('table')

    <div class="admin-table page-section" id="faqs_categories">

        @if(!$faqs_categories->isEmpty())

            @foreach ($faqs_categories as $faqs_category_element)
                <div class="admin-table-elements">
                    <div class="admin-table-element-info">
                        <ul>
                            <li class="info-element">ID:{{$faqs_category_element->id}}</li>
                            <li class="info-element">Nombre:{{$faqs_category_element->name}}</li>
                        </ul>
                    </div>
                    <div class="admin-table-element-buttons">
                    <div class="admin-table-element-button">
                            <button type="button" id="edit-button" data-url="{{route('faqs_categories_edit', ['faqs_category' => $faqs_category_element->id])}}">
                                <svg viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                </svg>
                            </button>
                        </div>
                    <div class="admin-table-element-button">
                            <button type="button" id="delete-button" data-url="{{route('faqs_categories_destroy', ['faqs_category' => $faqs_category_element->id])}}">
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

    @isset($faqs_category)

        <div class="crud-form">
            <form action="{{route("faqs_categories_store")}}" class="admin-form" id="faqs_category-form" autocomplete="off">
                <div class="crud-form-buttons">
                    <div class="tabs">
                        <button data-tab="content" class="tabslinks active">Contenido</button>
                    </div>
                
                    @include('admin.components.form_buttons', ['visible' => $faqs_category->visible, 'create' => 'create'])

                </div>

                <div class="content">
                    <div data-content="content" class="tabcontent active">
                        <input autocomplete="false" name="hidden" type="text" style="display:none;">
                        <input type="hidden" name="id" value="{{isset($faqs_category->id) ? $faqs_category->id : ''}}">

                        <div class="crud-form-elements">
                            <div class="crud-form-element">
                                <label for="name">Nombre:</label>
                            </div>
                            <div class="crud-form-element">
                                <input class="title-bar" type="text" id="title" name="name" value="{{isset($faqs_category->name) ? $faqs_category->name : ''}}">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    @endisset

@endsection