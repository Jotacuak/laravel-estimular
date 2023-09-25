@php
    $route = 'users';
@endphp

@section('topbar_title') <h3>@lang('admin/users.parent_section')</h3> @endsection

@extends('admin.layout.table_form')

@section('table')

    <div class="admin-table page-section" id="users">

        @if(!$users->isEmpty())

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
                            <button type="button" id="delete-button" data-url="{{route('users_destroy', ['user' => $user_element->id])}}">
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

    @include('admin.components.table_pagination', ['items' => $users])

@endsection

@section('form')

    @isset($user)

        <div class="crud-form">
            <form action="{{route("users_store")}}" class="admin-form" id="user-form" autocomplete="off">
                <div class="crud-form-buttons">
                    <div class="tabs">
                        <button data-tab="content" class="tabslinks active">Contenido</button>
                    </div>
                
                    @include('admin.components.form_buttons', [$route => 'route', 'create' => 'create'])

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
                </div>
            </form>
        </div>
    
    @endisset

@endsection