@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <div class="preview__cover">
        <div class="preview__cover_iw">
            <div class="p__c_iw_img">
                <img src="{{ asset('files/images/public-part/writing-frame.png') }}" alt="">
            </div>
            <div class="p__c_iw_text">
                <h1> Pisanje za 21. stoljeće </h1>
                <p>
                    Od antičke komedije do rada na animiranom youtube serijalu BBBB, program Pisanje za 21. stoljeće
                    pokazuje značaj komedije u ljudskoj
                    historiji, njenu ulogu u društvenoj kritici i njenu moć da načini promjene u svijetu.
                </p>

                <div class="p__c_iw_buttons">
                    <a href="#">
                        <button class="my-c-btn">{{ __('Apliciraj za stipendiju') }}</button>
                    </a>
                    <a href="#">
                        <button class="my-c-btn">{{ __('Više o programu') }}</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('public-part.app.base-includes.presenters.presenters_scroll')

    <!-- Programs preview -->
    @include('public-part.app.base-includes.programs.grid')

    <!-- Blog section; Scroll-bar lattest news -->
    @include('public-part.app.base-includes.blog.blog_scroll')

    <!-- Generic element; How to apply -->
    <div class="how-to-apply how-to-apply-bg-white">
        @include('public-part.app.base-includes.generic.how-to-apply')
    </div>

    <!-- Counter -->
    <div class="preview__counter">
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
        <img src="{{ asset('/files/images/public-part/snake-desktop.svg') }}" alt="{{ __('Snake') }}" class="snake__image">
        <img src="{{ asset('/files/images/public-part/snake-mobile.svg') }}" alt="{{ __('Snake mobile') }}" class="snake__image snake__image--mobile">
    </div>

    <!-- FAQ section -->
    @include('public-part.app.base-includes.generic.faq')

    <!-- All 6 programs -->
    @include('public-part.app.base-includes.programs.all')

    <!-- Contact us form -->
    <div class="contact-us contact-us-program cu_1">
        @include('public-part.app.base-includes.generic.contact-us')
    </div>
@endsection
