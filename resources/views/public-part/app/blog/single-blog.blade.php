@extends('public-part.layout.layout')

<!-- Title of page -->
@section('title'){{ $post->title }}@endsection
@section('meta_uri'){{ route('public-part.blog.preview', ['id' => $post->id]) }}@endsection
@section('meta_title'){{ $post->title }}@endsection
@section('meta_desc'){{ $post->short_desc }}@endsection
@section('meta_img'){{ isset($post->imgOne) ? asset( $post->imgOne->getFile() ) : '' }}@endsection

    <!-- Page content -->
@section('public-content')
{{--    <div class="single-blog__header-images">--}}
{{--        <img class="img-one" src="{{ asset( $post->imgOne->getFile() ) }}">--}}
{{--        <img class="img-two" src="{{ asset( $post->imgTwo->getFile() ) }}">--}}
{{--        <img class="img-three" src="{{ asset( $post->imgThree->getFile() ) }}">--}}
{{--    </div>--}}

    <div class="image__wrapper d-none">
        <div class="close_gallery" title="{{ __('Zatvorite galeriju') }}">
            <i class="fas fa-times"></i>
        </div>
        <div class="img__wrapper_inside">
            <img id="gallery_main_img" src="">
        </div>

        <div class="arrows_wrapper">
            <button class="gallery__navigation-button gallery__navigation_previous" attr-id="">
                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="16" viewBox="0 0 34 16" fill="none">
                    <path d="M9.32 5.0516L1 9.77621L9.32 14.06M9.32 9.93879C11.0656 10.0969 10.958 9.96669 12.7084 10.1248C13.2561 10.1759 13.8184 10.2224 14.3415 10.0643C14.9723 9.87369 15.4661 9.40871 15.9306 8.95768C18.6835 6.26079 19.9009 4.31717 22.4582 1.44824C21.5829 5.79116 18.8693 12.8589 18.8693 12.8589H33" stroke="#070600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <button class="gallery__navigation-button gallery__navigation_next" attr-id="">
                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="16" viewBox="0 0 34 16" fill="none">
                    <path d="M24.68 5.0516L33 9.77621L24.68 14.06M24.68 9.93879C22.9344 10.0969 23.042 9.96669 21.2916 10.1248C20.7439 10.1759 20.1816 10.2224 19.6585 10.0643C19.0277 9.87369 18.5339 9.40871 18.0694 8.95768C15.3165 6.26079 14.0991 4.31717 11.5418 1.44824C12.4171 5.79116 15.1307 12.8589 15.1307 12.8589H0.999999" stroke="#070600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
    </div>

    <div class="image-preview d-none">
        <div class="ip-post-preview">
            <div class="upper-icons">
                <div class="ui-icon-wrapper">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="img-wrapper"> </div>
            <div class="post-details">
                <p> <span class="post-date"> 10. Maj 2024 - 09:32h </span> <i class="fas fa-clock"></i> </p>
            </div>

            <div class="arrow-icon-wrapper left-arrow-icon-wrapper" post-id="">
                <i class="fas fa-angle-left"></i>
            </div>
            <div class="arrow-icon-wrapper right-arrow-icon-wrapper" post-id="">
                <i class="fas fa-angle-right"></i>
            </div>
        </div>
    </div>



    <div class="single-location">
        <div class="single-location__container">
            <img src="{{ isset($post->imgOne) ? asset( $post->imgOne->getFile() ) : '' }}" class="single-location__image">

        </div>
    </div>

    <div class="single-blog">
        <div class="single-blog__container">
            <h2 class="single-blog__title"> {{ $post->title }} </h2>
            <div class="single-blog__content">
{{--                <div class="sb__text">--}}
{{--                    {!! nl2br($post->description) !!}--}}
{{--                </div>--}}

                <div class="single-blog__content-left">
{{--                    <div class="single-blog__content-left-text"> {{ $post->createdBy->name }} </div>--}}
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
                    <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                    <div class="img__wrapper" attr-id="{{ $image->id }}">
                        <img src="{{ asset($image->fileRel->getFile()) }}">

                        <div class="gallery_shadow">
                            <div class="open_icon_w">
                                <i class="fas fa-expand"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog section; Scroll-bar latest news -->
    @include('public-part.app.base-includes.blog.blog_scroll')

    @include('public-part.app.base-includes.snake.snake')
@endsection
