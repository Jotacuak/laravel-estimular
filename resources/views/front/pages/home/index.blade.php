@extends('front.layout.master')

{{-- @section('title')@lang('front/seo.web-name') | {{$seo->title}} @stop
@section('description'){{$seo->description}} @stop
@section('keywords'){{$seo->keywords}} @stop
@section('facebook-url'){{URL::asset('/' . $seo->url)}} @stop
@section('facebook-title'){{$seo->title}} @stop
@section('facebook-description'){{$seo->description}} @stop --}}

@section("content")

    @if($agent->isDesktop())
        <div class="page-section" id="home">
            @include("front.pages.home.desktop.home", ['rates' => $rates])
        </div>
    @endif

    @if($agent->isMobile())
        <div class="page-section" id="home">
            @include("front.pages.home.mobile.home",  ['rates' => $rates])
        </div>
    @endif
@endsection