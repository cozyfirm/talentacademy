@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-wind"></i> @endsection
@section('c-title') {{ __('Blog') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="{{ route('system.admin.blog') }}">{{ __('Blog') }}</a> /
    <a href="#">{{ __('Post') }}</a>
@endsection

@section('c-buttons')
    <a href="{{ route('system.admin.blog') }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>

    @if(isset($preview))
        <a href="{{ route('system.admin.blog.edit', ['id' => $post->id ]) }}">
            <button class="pm-btn btn pm-btn-edit">
                <i class="fas fa-edit"></i>
            </button>
        </a>
    @endif
    @if(isset($edit))
        <a href="{{ route('system.admin.blog.delete', ['id' => $post->id ]) }}">
            <button class="pm-btn btn pm-btn-trash">
                <i class="fas fa-trash"></i>
            </button>
        </a>
    @endif
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        @if(session()->has('success'))
            <div class="alert alert-success mt-3">
                {{ session()->get('success') }}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger mt-3">
                {{ session()->get('error') }}
            </div>
        @endif

        <div class="row">
            <div class="@if(isset($preview)) col-md-9 @else col-md-12 @endif">
                <form action="@if(isset($edit)) {{ route('system.admin.blog.update') }} @else {{ route('system.admin.blog.save') }} @endif" method="POST" id="js-form">
                    @if(isset($edit))
                        {{ html()->hidden('id')->class('form-control')->value($post->id) }}
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Naslov'))->for('title')->class('bold') }}
                                {{ html()->text('title', $post->title ?? '' )->class('form-control form-control-sm')->required()->value((isset($post) ? $post->title : ''))->isReadonly(isset($preview))->maxlength(100) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Kategorija'))->for('category')->class('bold') }}
                                {{ html()->select('category', $other, isset($post) ? $post->category : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Objavljeno'))->for('published')->class('bold') }}
                                {{ html()->select('published', ['0' => 'Ne', '1' => 'Da'], isset($post) ? $post->published : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Kratki opis'))->for('short_desc')->class('bold') }}
                                {{ html()->text('short_desc', $post->short_desc ?? '' )->class('form-control form-control-sm')->required()->value((isset($post) ? $post->short_desc : ''))->isReadonly(isset($preview))->maxlength('191') }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('YouTube link'))->for('video')->class('bold') }}
                                {{ html()->text('video', $post->video ?? '' )->class('form-control form-control-sm')->value((isset($post) ? $post->video : ''))->isReadonly(isset($preview))->maxlength(100) }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Sadržaj posta'))->for('description')->class('bold') }}
                                {{ html()->textarea('description')->class('form-control form-control-sm mt-2 textarea-240 summernote')->value(isset($post) ? $post->description : '')->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    @if(!isset($preview))
                        <div class="row mt-4">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark btn-sm"> {{ __('SAČUVAJTE') }} </button>
                            </div>
                        </div>
                    @endif
                </form>
            </div>

            @if(isset($preview))
                @include('admin.other.blog.snippets.right-menu')
            @endif
        </div>
    </div>
@endsection
