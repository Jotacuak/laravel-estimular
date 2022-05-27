@extends('front.layout.master_with_header')

{{-- @section('title')@lang('front/seo.web-name') | {{$seo->title}} @stop
@section('description'){{$seo->description}} @stop
@section('keywords'){{$seo->keywords}} @stop
@section('facebook-url'){{URL::asset('/' . $seo->url)}} @stop
@section('facebook-title'){{$seo->title}} @stop
@section('facebook-description'){{$seo->description}} @stop --}}

@section('header_title') <h1>@lang('front/headers.workers-title')</h1> @endsection
@section('header_subtitle') <h2>@lang('front/headers.workers-subtitle')</h2> @endsection

@section("content")

    @if($agent->isDesktop())
        <div class="page-section" id="team">
            @include("front.pages.team.desktop.team")
        </div>
    @endif

    @if($agent->isMobile())
        <div class="page-section" id="team">
            @include("front.pages.team.mobile.team")
        </div>
    @endif
@endsection