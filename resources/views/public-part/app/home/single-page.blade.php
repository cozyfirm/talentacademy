@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Signle location') @endsection

<!-- Page content -->
@section('public-content')
    <div class="single-location">
        <div class="single-location__container">
            <img src="{{ asset( $page->fileRel->getFile()) }}" class="single-location__image">

            <div class="sp_i_w">
                <h2 class="single-location__title"> {{ $page->title }} </h2>

                @if($page->video)
                    <iframe src="{{ $page->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                @endif

                <div class="single-location__content single-location__content-page">
                    {!! nl2br($page->description) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
