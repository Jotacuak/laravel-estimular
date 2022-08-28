@extends('front.layout.master')

{{-- @section('title')@lang('front/seo.web-name') | {{$seo->title}} @stop
@section('description'){{$seo->description}} @stop
@section('keywords'){{$seo->keywords}} @stop
@section('facebook-url'){{URL::asset('/' . $seo->url)}} @stop
@section('facebook-title'){{$seo->title}} @stop
@section('facebook-description'){{$seo->description}} @stop --}}

@section('header_title') <h1>@lang('front/headers.workers-title')</h1> @endsection
@section('header_subtitle') <h2>@lang('front/headers.workers-subtitle')</h2> @endsection

@section("content")

    <div class="page-title">
        <div class="one-column">
            <div class="column">
                <div class="contact-title">
                    @yield('header_title')
                </div>
                <div class="contact-subtitle">
                    @yield('header_subtitle')
                </div>
            </div>
        </div>
    </div>

    @if($agent->isDesktop())
        <div class="page-section" id="test">
            @include("front.pages.test.desktop.test")
        </div>
    @endif

    @if($agent->isMobile())
        <div class="page-section" id="test">
            @include("front.pages.test.mobile.test")
        </div>
    @endif
@endsection