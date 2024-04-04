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

        <div class="presenters__scrollbar_w">
            <div class="single-presenter">
                
            </div>
        </div>
    </div>
@endsection
