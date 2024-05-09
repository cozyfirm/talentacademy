@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Single blog') @endsection

@php
    $images = [1, 2, 3, 4, 5, 6];
@endphp

    <!-- Page content -->
@section('public-content')
{{--    <div class="single-blog__header-images">--}}
{{--        <img class="img-one" src="{{ asset( $post->imgOne->getFile() ) }}">--}}
{{--        <img class="img-two" src="{{ asset( $post->imgTwo->getFile() ) }}">--}}
{{--        <img class="img-three" src="{{ asset( $post->imgThree->getFile() ) }}">--}}
{{--    </div>--}}


    <div class="single-location">
        <div class="single-location__container">
            <img src="{{ asset( $post->imgOne->getFile() ) }}" class="single-location__image">

        </div>
    </div>

    <div class="single-blog">
        <div class="single-blog__container">
            <h2 class="single-blog__title"> {{ $post->title }} </h2>
            <div class="single-blog__content">
                <div class="single-blog__content-left">
                    <div class="single-blog__content-left-text"> {{ $post->createdBy->name }} </div>
                    <div class="single-blog__content-left-text"> {{ $post->getDate() }} </div>
                    <div class="single-blog__content-social-icons">
                        <div class="single-blog__content-social-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M22 12.3033C22 6.7467 17.5229 2.24219 12 2.24219C6.47715 2.24219 2 6.7467 2 12.3033C2 17.325 5.65684 21.4874 10.4375 22.2422V15.2116H7.89844V12.3033H10.4375V10.0867C10.4375 7.56515 11.9305 6.17231 14.2146 6.17231C15.3088 6.17231 16.4531 6.36882 16.4531 6.36882V8.8448H15.1922C13.95 8.8448 13.5625 9.62041 13.5625 10.4161V12.3033H16.3359L15.8926 15.2116H13.5625V22.2422C18.3432 21.4874 22 17.3252 22 12.3033Z" fill="#EA8BF3"/>
                            </svg>
                        </div>
                        <div class="single-blog__content-social-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M17.1761 4.24219H19.9362L13.9061 11.0196L21 20.2422H15.4456L11.0951 14.6488L6.11723 20.2422H3.35544L9.80517 12.993L3 4.24219H8.69545L12.6279 9.35481L17.1761 4.24219ZM16.2073 18.6176H17.7368L7.86441 5.78147H6.2232L16.2073 18.6176Z" fill="#EA8BF3"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="single-blog__content-right"> {!! nl2br($post->description) !!} </div>
            </div>
            <div class="single-blog__images">
                @foreach($post->imageRel as $image)
                    <img src="{{ asset($image->fileRel->getFile()) }}">
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog section; Scroll-bar latest news -->
    @include('public-part.app.base-includes.blog.blog_scroll')

    @include('public-part.app.base-includes.snake.snake')
@endsection
