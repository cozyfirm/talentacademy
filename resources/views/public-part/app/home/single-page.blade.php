@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Signle location') @endsection

<!-- Page content -->
@section('public-content')
    <div class="single-location">
        <div class="single-location__container">
            <img src="{{ asset( $page->fileRel->getFile()) }}" class="single-location__image">
            <h2 class="single-location__title"> {{ $page->title }} </h2>
            <div class="single-location__content single-location__content-page">
                {!! nl2br($page->description) !!}
            </div>
        </div>
    </div>
@endsection
