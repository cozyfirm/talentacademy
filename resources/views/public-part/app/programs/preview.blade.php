@extends('public-part.layout.layout')

<!-- Title of page -->
@section('title') {{ $program->title }} @endsection

<!-- Page content -->
@section('public-content')
    <div class="preview__cover preview__cover_{{ $program->id }}">
        <div class="preview__cover_iw">
            <div class="p__c_iw_img">
                <img src="{{ asset($program->imageRel->getFile()) }}" alt="">
            </div>
            <div class="p__c_iw_text">
                <h1> {{ $program->title }} </h1>
                <p> {{ $program->description }} </p>

                <div class="p__c_iw_buttons">
                    <a href="{{ route('public-part.programs.apply-for-scholarship', ['id' => $program->id ]) }}">
                        <button class="my-c-btn">{{ __('Apliciraj za stipendiju') }}</button>
                    </a>
                    {{--<a href="#">--}}
                    {{--    <button class="my-c-btn">{{ __('Više o programu') }}</button>--}}
                    {{--</a>--}}
                </div>
            </div>
        </div>
    </div>

    @include('public-part.app.base-includes.presenters.presenters_scroll')

    @if(Auth()->check())
        <!-- Sessions for logged user -->
        @include('public-part.app.programs.includes.sessions')
    @else
        <!-- Programs preview -->
        @include('public-part.app.base-includes.programs.grid')
    @endif

    <!-- Blog section; Scroll-bar lattest news -->
    @include('public-part.app.base-includes.blog.blog_scroll')

    <!-- Generic element; How to apply -->
    <div class="how-to-apply how-to-apply_{{ $program->id }} how-to-apply-bg-white">
        @include('public-part.app.base-includes.generic.how-to-apply')
    </div>

    <!-- Counter -->
    <div class="preview__counter preview__counter_{{ $program->id }}">
        <div class="preview__counter_iw">
            <h1>{{ __('Rok za prijavu aplikacija:') }}</h1>
            <h1> 10.06.2024 </h1>

            <p> {{ __("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.") }} </p>

            <div class="counter__w">
                <div class="c__num"> <p class="c__month"></p> </div>
                <span>:</span>
                <div class="c__num"> <p class="c__day"></p> </div>
                <span>:</span>
                <div class="c__num"> <p class="c__hour"></p> </div>
                <span>:</span>
                <div class="c__num"> <p class="c__min"></p> </div>
            </div>

            <div class="counter__btn">
                <a href="#">
                    <button class="app_btn">
                        <img src="{{ asset('files/images/public-part/app-btn.png') }}" alt="">
                        <p>{{ __('Apliciraj za stipendiju') }}</p>
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="snake">
        <img src="{{ asset('/files/images/public-part/snake/snake_'.($program->id).'.svg') }}" alt="{{ __('Snake') }}" class="snake__image">
        <img src="{{ asset('/files/images/public-part/snake_mob_'.($program->id).'.svg') }}" alt="{{ __('Snake mobile') }}" class="snake__image snake__image--mobile">
    </div>

    <!-- FAQ section -->
    @include('public-part.app.base-includes.generic.faq')

    <!-- All 6 programs -->
    @include('public-part.app.base-includes.programs.all')

    <!-- Contact us form -->
    <div class="contact-us contact-us-program cu_{{ $program->id }}">
        @include('public-part.app.base-includes.generic.contact-us')
    </div>
@endsection
