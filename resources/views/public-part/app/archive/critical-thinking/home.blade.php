@extends('public-part.layout.layout')
@section('title') {{ __('Kritičko razmišljanje') }} @endsection

<!-- Page content -->
@section('public-content')
    <div class="blog">
        <div class="blog__container">
            <div class="blog__critical__thinking__img">
                <img src="{{ asset( $page->fileRel->getFile()) }}">
            </div>

            <!-- Preview last posts except the last one -->
            <div class="blog__items @if(isset($criticalThinking)) blog__items__critical @endif">
                @foreach($posts as $post)
                    <a href="{{ route('public-part.archive.critical-thinking.preview', ['id' => $post->id ]) }}" class="blog__item" id="blog__item_id_{{ $post->id }}" itemid="{{ $post->id }}" uri="{{ route('public-part.blog.preview', ['id' => $post->id]) }}">
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

            <div class="blog__load_more_w">
                <div class="load__more_btn">{{ __('Još vijesti') }}</div>
            </div>
        </div>
    </div>
    @include('public-part.app.base-includes.snake.snake')
@endsection
