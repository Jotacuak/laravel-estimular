@extends('front.layout.master_without_header')

@section("content")

    @if($agent->isDesktop())
        <div class="page-section">
            @include("auth.login.desktop.login")
        </div>
    @endif

    @if($agent->isMobile())
        <div class="page-section">
            @include("auth.login.mobile.login")
        </div>
    @endif
@endsection