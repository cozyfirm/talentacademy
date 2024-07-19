@extends('public-part.layout.layout')
@section('title') {{ __('Blog') }} @endsection

    <!-- Page content -->
@section('public-content')
    <div class="blog">
        <div class="blog__container">
            @if(isset($criticalThinking))
                <div class="blog__critical__thinking__img">
                    <img src="{{ asset( $page->fileRel->getFile()) }}">
                </div>
            @else
                <!-- Preview last post -->
                <div class="blog__featured-article">
                    <img src="{{ asset( isset($last->mainImg) ? $last->mainImg->getFile() : '' ) }}" alt="Featured article image" class="blog__featured-article-image">
                    <div class="blog__featured-article-content">
                        <div class="blog__featured-article-title"> {{ $last->title }} </div>
                        <div class="blog__featured-article-description"> {{ $last->short_desc }} </div>
                        <a href="@if(!isset($showAll)) {{ route('public-part.blog.preview', ['id' => $last->id ]) }} @else {{ route('dashboard.latest-new', ['id' => $last->id ]) }} @endif" class="blog__featured-article-button">{{ __('Više informacija...') }}</a>
                    </div>
                </div>
            @endif

            <!-- Preview last posts except the last one -->
            <div class="blog__items @if(isset($criticalThinking)) blog__items__critical @endif">
                @foreach($posts as $post)
                    <a href="@if(isset($criticalThinking)) {{ route('public-part.critical-thinking.preview', ['id' => $post->id ]) }} @else @if(!isset($showAll)) {{ route('public-part.blog.preview', ['id' => $post->id ]) }} @else {{ route('dashboard.latest-new', ['id' => $post->id ]) }} @endif @endif" class="blog__item" id="blog__item_id_{{ $post->id }}" itemid="{{ $post->id }}" uri="{{ route('public-part.blog.preview', ['id' => $post->id]) }}">
                        <img src="{{ isset($post->mainImg) ? asset($post->mainImg->getFile()) : '' }}" alt="Blog image" class="blog__item-image">
                        <div class="blog__item-content">
                            <div class="blog__item-content-box">
{{--                                <div class="blog__item-content-box-category"> {{ $post->getCategory() }} </div>--}}
                                <div class="blog__item-content-box-read-time"> {{ $post->getDateTime() }} </div>
                            </div>
                            <div class="blog__item-content-title"> {{ $post->title }} </div>
                            <p class="blog__item-content-description"> {{ $post->short_desc }} </p>
                        </div>
                    </a>
                @endforeach
            </div>

            @if(!isset($showAll))
                <div class="blog__load_more_w">
                    <div class="load__more_btn">{{ __('Još vijesti') }}</div>
                </div>
            @endif
        </div>
    </div>
    @include('public-part.app.base-includes.snake.snake')
@endsection
