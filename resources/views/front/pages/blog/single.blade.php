@extends('front.layout.master_with_header')

@section('title')@lang('front/seo.web-name') | {{$post->seo->title}} @stop
@section('description'){{$post->seo->description != null? $post->seo->description : $post->seo->locale_seo->description}} @stop
@section('keywords'){{$post->seo->keywords != null ? $post->seo->keywords : $post->seo->locale_seo->keywords}} @stop
@section('facebook-url'){{URL::asset('/blog/' . $post->seo->slug)}} @stop
@section('facebook-title'){{$post->seo->title}} @stop
@section('facebook-description'){{$post->seo->description != null ? $post->seo->description : $post->seo->locale_seo->description}} @stop

@section("content")
    @if($agent->isDesktop())
        <div class="page-section">
            @include("front.pages.blog.desktop.post")
        </div>
    @endif

    @if($agent->isMobile())
        <div class="page-section">
            @include("front.pages.blog.mobile.post")
        </div>
    @endif
@endsection