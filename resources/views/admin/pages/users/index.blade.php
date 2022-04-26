@php
    $route = 'users';
@endphp

@extends('admin.layout.table_form')

@section('table')

    <div class="admin-table">
        {{-- <div class="admin-table-elements">
            <div class="admin-table-element-info">
                <ul>
                    <li class="info-element">Id</li>
                    <li class="info-element">Nombre</li>
                    <li class="info-element">Email</li>
                </ul>
            </div>
            <div class="admin-table-element-buttons">
            <div class="admin-table-element-button">
                    <button type="button" id="edit-button">
                        <svg viewBox="0 0 24 24">
                            <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                        </svg>
                    </button>
                </div>
            <div class="admin-table-element-button">
                    <button type="button" id="delete-button">
                        <svg viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div> --}}

        @foreach ($users as $user_element)
            <div class="admin-table-elements">
                <div class="admin-table-element-info">
                    <ul>
                        <li class="info-element">Id:{{$user_element->id}}</li>
                        <li class="info-element">Nombre:{{$user_element->name}}</li>
                        <li class="info-element">Email:{{$user_element->email}}</li>
                    </ul>
                </div>
                <div class="admin-table-element-buttons">
                <div class="admin-table-element-button">
                        <button type="button" id="edit-button" data-url="{{route('users_edit', ['user' => $user_element->id])}}">
                            <svg viewBox="0 0 24 24">
                                <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                            </svg>
                        </button>
                    </div>
                <div class="admin-table-element-button">
                        <button type="button" id="delete-button">
                            <svg viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>            
        @endforeach
    </div>

@endsection

@section('form')

    <div class="crud-form">
        <form action="{{route("users_store")}}" class="admin-form" id="users-form" autocomplete="off">
            <div class="crud-form-buttons">
                <div class="tabs">
                    <button data-tab="zero" class="tabslinks active">Contenido</button>
                    <button data-tab="one" class="tabslinks">Imagenes</button>
                    <button data-tab="two" class="tabslinks">Otros</button>
                </div>
                <div class="crud-form-button">
                    <button type="button" id="save-button">
                        <svg viewBox="0 0 24 24">
                            <path fill="currentColor" d="M15,9H5V5H15M12,19A3,3 0 0,1 9,16A3,3 0 0,1 12,13A3,3 0 0,1 15,16A3,3 0 0,1 12,19M17,3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V7L17,3Z" />
                        </svg>
                    </button>
                    <button type="button" id="refresh-button">
                        <svg viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12,6V9L16,5L12,1V4A8,8 0 0,0 4,12C4,13.57 4.46,15.03 5.24,16.26L6.7,14.8C6.25,13.97 6,13 6,12A6,6 0 0,1 12,6M18.76,7.74L17.3,9.2C17.74,10.04 18,11 18,12A6,6 0 0,1 12,18V15L8,19L12,23V20A8,8 0 0,0 20,12C20,10.43 19.54,8.97 18.76,7.74Z" />
                        </svg>
                    </button>
                    <div class="toggle-button-cover">
                        <div class="button-cover">
                            <div class="button b2" id="button-18">
                                <input type="checkbox" class="checkbox" name="active" id="active-button"/>
                                    <div class="knobs">
                                        <span></span>
                                    </div>
                                <div class="layer"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div data-content="zero" class="tabcontent active">
                    <input autocomplete="false" name="hidden" type="text" style="display:none;">
                    <input type="hidden" name="id" value="{{isset($user->id) ? $user->id : ''}}">

                    <div class="crud-form-elements">
                        <div class="two-columns">
                            <div class="form-group">
                                <div class="crud-form-element">
                                    <label for="name">Nombre</label>
                                </div>
                                <div class="crud-form-element">
                                    <input class="input-bar" type="text" name="name" value="{{isset($user->name) ? $user->name : ''}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="crud-form-element">
                                    <label for="email">Email</label>
                                </div>
                                <div class="crud-form-element">
                                    <input class="input-bar" type="text" name="email" value="{{isset($user->email) ? $user->email : ''}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="crud-form-elements">
                        <div class="two-columns">
                            <div class="form-group">
                                <div class="crud-form-element">
                                    <label for="password">Password</label>
                                </div>
                                <div class="crud-form-element">
                                    <input class="input-bar" type="password" name="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="crud-form-element">
                                    <label for="password_confirmation">Repite el password</label>
                                </div>
                                <div class="crud-form-element">
                                    <input class="input-bar" type="password" name="password_confirmation">
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>

                {{-- <div  data-content="one" class="tabcontent">
                    <form enctype="multipart/form-data" class="front-form" id="users-form">
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
                    </form>
                </div>

                <div  data-content="two" class="tabcontent">
                    <form enctype="multipart/form-data" class="front-form" id="users-form">
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
                    </form>
                </div> --}}
            </div>
        </form>
    </div>

@endsection