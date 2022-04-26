@extends('admin.layout.master')

@section('content')
    <div class="two-columns-aside">
        <div class="column-aside">
            <div class="table active" id="table">
                @yield('table')
            </div>
        </div>
        <div class="column-main">
            <div class="form" id="form">
                @yield('form')
            </div>
        </div>
    </div>
@endsection