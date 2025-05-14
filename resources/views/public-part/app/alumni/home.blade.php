@extends('public-part.layout.layout')

<!-- Title of page -->
@section('title') {{ $page->title ?? '' }} @endsection

<!-- Page content -->
@section('public-content')
    <div class="alumni__wrapper">
        <div class="alumni__inner">
            <div class="ai__image_wrapper">
                <img src="{{ asset( $page->fileRel->getFile()) }}" class="single-location__image">
            </div>
            <div class="ai__text__wrapper">
                <h1> {{ $page->title }} </h1>

                <div class="ai__tw__text">
                    {!! nl2br($page->description) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="blog">
        <div class="blog__container">
            <div class="blog__items @if(isset($criticalThinking)) blog__items__critical @endif">
                @foreach($posts as $post)
                    <a href="{{ route('public-part.alumni.preview', ['id' => $post->id ]) }}" class="blog__item" id="blog__item_id_{{ $post->id }}" itemid="{{ $post->id }}" uri="{{ route('public-part.alumni.preview', ['id' => $post->id ]) }}">
                        <img src="{{ isset($post->mainImg) ? asset($post->mainImg->getFile()) : '' }}" alt="Blog image" class="blog__item-image">
                        <div class="blog__item-content">
                            <div class="blog__item-content-box">
                                <div class="blog__item-content-box-read-time"> {{ $post->getDateTime() }} </div>
                            </div>
                            <div class="blog__item-content-title"> {{ $post->title }} </div>
                            <p class="blog__item-content-description"> {{ $post->short_desc }} </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
