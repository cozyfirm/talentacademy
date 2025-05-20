@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Signle location') @endsection

<!-- Page content -->
@section('public-content')
    <div class="archive__home__wrapper">
        <div class="ahw__inner">
            <div class="archive__home__header">
                <h1>{{ __('Arhiva') }}</h1>
                <p>{{ __('Ovdje možete pronaći arhivske materijale prethodnih izdanja HNTA.') }}</p>
            </div>

            <div class="archive__body">
                <a href="{{ route('public-part.archive.photo-gallery') }}" class="ab__link">
                    <div class="ab__wrapper">
                        <div class="ab__w__img">
                            <img src="{{ asset('files/images/public-part/archive/gallery-2.svg') }}" alt="">
                        </div>
                    </div>
                </a>
                <a href="{{ route('public-part.archive.lecturers.lecturers') }}" class="ab__link">
                    <div class="ab__wrapper">
                        <div class="ab__w__img">
                            <img src="{{ asset('files/images/public-part/archive/lecturers-2.svg') }}" alt="">
                        </div>
                    </div>
                </a>
                <a href="{{ route('public-part.archive.critical-thinking') }}" class="ab__link">
                    <div class="ab__wrapper">
                        <div class="ab__w__img">
                            <img src="{{ asset('files/images/public-part/archive/thinking-2.svg') }}" alt="">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
