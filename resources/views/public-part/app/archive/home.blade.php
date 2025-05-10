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
                <a href="#" class="ab__link">
                    <div class="ab__wrapper">
                        <div class="ab__w__img">
                            <img src="{{ asset('files/images/public-part/archive/gallery.jpg') }}" alt="">
                        </div>
                        <div class="ab__w__text">
                            <h4>{{ __('Galerija fotografija') }}</h4>
                        </div>
                    </div>
                </a>
                <a href="{{ route('public-part.archive.lecturers.lecturers') }}" class="ab__link">
                    <div class="ab__wrapper">
                        <div class="ab__w__img">
                            <img src="{{ asset('files/images/public-part/archive/lecturers.jpg') }}" alt="">
                        </div>
                        <div class="ab__w__text">
                            <h4>{{ __('Predavači') }}</h4>
                        </div>
                    </div>
                </a>
                <a href="{{ route('public-part.archive.critical-thinking') }}" class="ab__link">
                    <div class="ab__wrapper">
                        <div class="ab__w__img">
                            <img src="{{ asset('files/images/public-part/archive/thinking.jpg') }}" alt="">
                        </div>
                        <div class="ab__w__text">
                            <h4>{{ __('Kritičko mišljenje') }}</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
