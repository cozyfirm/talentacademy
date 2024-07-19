@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <!-- User section -->
    <div class="welcome__pack__w">
        <iframe class="blog__video_iframe" src="{{ $content->video }}" title="{{ $content->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

        <div class="text__wrapper">
            <h1>{{ $content->title }}</h1>

            <div class="text__content">
                <p>{!! nl2br($content->description) !!}</p>
            </div>
        </div>
    </div>
@endsection
