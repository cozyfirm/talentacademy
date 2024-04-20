@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Blog') @endsection

@php
    $blogs = [1, 2, 3, 4, 5, 6, 7, 8, 9];
@endphp

    <!-- Page content -->
@section('public-content')
    <div class="blog">
        <div class="blog__container">
            <div class="blog__featured-article">
                <img src="{{ asset('files/images/public-part/locations-image-1.jpeg') }}" alt="Featured article image" class="blog__featured-article-image">
                <div class="blog__featured-article-content">
                    <div class="blog__featured-article-title">JUS porjekat na Helem nejse Talent akademiji</div>
                    <div class="blog__featured-article-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
                    <a href="#" class="blog__featured-article-button">{{ __('Više...') }}</a>
                </div>
            </div>
            <div class="blog__items">
                @foreach($blogs as $blog)
                    <div class="blog__item">
                        <img src="{{ asset('files/images/public-part/locations-image-1.jpeg') }}" alt="Blog image" class="blog__item-image">
                        <div class="blog__item-content">
                            <div class="blog__item-content-box">
                                <div class="blog__item-content-box-category">Pisanje za 21. stoljeće</div>
                                <div class="blog__item-content-box-read-time">5 min</div>
                            </div>
                            <div class="blog__item-content-title">JUS projekat na hnta</div>
                            <p class="blog__item-content-description">
                                Lorem ipsum dolor sit amet consectetur. Rhoncus at quis faucibus magna augue. Ipsum duis aliquet mauris facilisis mattis pellentesque quis non proin. Viverra sapien scelerisque suscipit proin. Sit massa feugiat ultrices diam eu.
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('public-part.app.base-includes.snake.snake')
@endsection
