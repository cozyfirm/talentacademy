@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Lecturers') @endsection

@php
    $lecturers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
@endphp

    <!-- Page content -->
@section('public-content')
    <div class="lecturers">
        <div class="lecturers__container">
            <div class="lecturers__header">
                <h2>{{ __('Predavači') }}</h2>
                <div class="lecturers__search">
                    <input type="text" class="lecturers__search-input" placeholder="{{ __('Pretraži') }}">
                    <img src="{{ asset('files/images/svg-icons/search.svg') }}" alt="Search icon" class="lecturers__search-icon">
                </div>
            </div>
            <div class="lecturers__categories">
                <div class="lecturers__category">Odgovorno kodiranje i Civic Tech</div>
                <div class="lecturers__category">Grafički dizajn i animacija</div>
                <div class="lecturers__category">Novinarstvo u svijetu društvenih mreža</div>
                <div class="lecturers__category">Primijenjena muzička produkcija</div>
                <div class="lecturers__category">Digitalni marketing</div>
                <div class="lecturers__category">Programiranje i razvoj softvera</div>
            </div>
            <div class="lecturers__list">
                @foreach($lecturers as $lecturer)
                    <div class="lecturers__list-item">
                        <img src="{{ asset('files/images/public-part/lecturer.png') }}" alt="Lecturer image" class="lecturers__list-item-image">
                        <div class="lecturers__list-item-category">Lecturer</div>
                        <h3 class="lecturers__list-item-name">Almir Bašović</h3>
                        <div class="lecturers__list-item-subtitle">Berklee</div>
                        <p class="lecturers__list-item-description">Lorem ipsum dolor sit amet consectetur. Scelerisque sed quis velit elit at at tincidunt quis pretium.</p>
                        <div class="lecturers__list-item-social-icons">
                            <a href="#" class="lecturers__list-item-social-icon">
                                <img src="{{ asset('files/images/svg-icons/linkedin.svg') }}" alt="Linkedin icon">
                            </a>
                            <a href="#" class="lecturers__list-item-social-icon">
                                <img src="{{ asset('files/images/svg-icons/x.svg') }}" alt="X icon">
                            </a>
                            <a href="#" class="lecturers__list-item-social-icon">
                                <img src="{{ asset('files/images/svg-icons/dribble.svg') }}" alt="Dribble icon">
                            </a>
                        </div>
                       </div>
                @endforeach
            </div>
            <div class="lecturers__more-button">
                <a href="#" class="lecturers__more-button-link">{{ __('Više predavača') }}</a>
            </div>
        </div>
    </div>
    @include('public-part.app.base-includes.snake.snake')
@endsection
