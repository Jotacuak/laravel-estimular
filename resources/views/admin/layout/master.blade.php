<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="">

		<title>@yield('title', trans('front/seo.title'))</title>
		<meta name="description" content="@yield('description', trans('front/seo.description'))">
        <meta name="keywords" 	 content="@yield('keywords', trans('front/seo.keywords'))">
        <link rel="canonical" href="{{Request::url()}}">

		<!-- <meta property="fb:app_id"        content="" /> 
		<meta property="og:url"           content="@yield('facebook-url', 'https://dev-maquetacion.com')" />
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="@yield('facebook-title',  trans('front/seo.title'))"/>
		<meta property="og:description"   content="@yield('facebook-description', trans('front/seo.description'))" /> -->

        @include("admin.layout.partials.styles")
    </head>

    <body>   
        <div class="wrapper" id="app">
            
            {{-- @include('admin.components.wait') --}}
            @include('admin.components.messages')
            @include('admin.components.modal_image')
            @include('admin.components.modal_delete')
            @include('admin.layout.partials.topbar')

            <div class="main-content">
                @yield('content')
            </div>
        </div>
        
        @include("admin.layout.partials.js")
    </body>
</html>