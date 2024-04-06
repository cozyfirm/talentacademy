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
                    Od antičke komedije do rada na animiranom youtube serijalu BBBB, program Pisanje za 21. stoljeće pokazuje značaj komedije u ljudskoj
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



    <div class="presenters__scrollbar">
        <div class="generic__header">
            <h2>{{ __('Predavači') }}</h2>
            <button class="gh_button">{{ __('Svi predavači') }}</button>
        </div>

        <div class="presenters__scrollbar_w slider_w">
            <div class="single__presenter item1">
                <div class="sp__image">
                    <img src="{{ asset('files/images/presenters/ana_krstajic.png') }}" alt="">
                </div>
                <div class="sp__btn_w">
                    <button class="sp__btn">{{ __('Keynote speaker') }}</button>
                </div>
                <div class="sp__text_w">
                    <h1>Ana Krstajić</h1>
                    <h2>Barklee</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                </div>
            </div>
            <div class="single__presenter item2">
                <div class="sp__image">
                    <img src="{{ asset('files/images/presenters/blanka.png') }}" alt="">
                </div>
                <div class="sp__btn_w">
                    <button class="sp__btn">{{ __('Keynote speaker') }}</button>
                </div>
                <div class="sp__text_w">
                    <h1>Ana Krstajić</h1>
                    <h2>Barklee</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                </div>
            </div>
            <div class="single__presenter item3">
                <div class="sp__image">
                    <img src="{{ asset('files/images/presenters/ana_krstajic.png') }}" alt="">
                </div>
                <div class="sp__btn_w">
                    <button class="sp__btn">{{ __('Keynote speaker') }}</button>
                </div>
                <div class="sp__text_w">
                    <h1>Ana Krstajić</h1>
                    <h2>Barklee</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                </div>
            </div>
            <div class="single__presenter item4">
                <div class="sp__image">
                    <img src="{{ asset('files/images/presenters/blanka.png') }}" alt="">
                </div>
                <div class="sp__btn_w">
                    <button class="sp__btn">{{ __('Keynote speaker') }}</button>
                </div>
                <div class="sp__text_w">
                    <h1>Ana Krstajić</h1>
                    <h2>Barklee</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                </div>
            </div>
        </div>
    </div>
@endsection
