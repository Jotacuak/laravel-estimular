@extends('front.layout.master')

{{-- @section('title')@lang('front/seo.web-name') | {{$seo->title}} @stop
@section('description'){{$seo->description}} @stop
@section('keywords'){{$seo->keywords}} @stop
@section('facebook-url'){{URL::asset('/' . $seo->url)}} @stop
@section('facebook-title'){{$seo->title}} @stop
@section('facebook-description'){{$seo->description}} @stop --}}

@section("content")

    @if($agent->isDesktop())
        <div class="page-section" id="therapy">
            @include("front.pages.therapy.desktop.therapy")
        </div>
    @endif

    @if($agent->isMobile())
        <div class="page-section" id="therapy">
            @include("front.pages.therapy.mobile.therapy")
        </div>
    @endif
@endsection