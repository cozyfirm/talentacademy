@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Lecturers') @endsection
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
                @foreach($lecPrograms as $lecProgram)
                    <a href="{{ route('public-part.lecturers.filter', ['program_id' => $lecProgram->id ]) }}">
                        <div class="lecturers__category">{{ $lecProgram->title }}</div>
                    </a>
                @endforeach
            </div>

            <!-- This value is used for filters -->
            {{ html()->hidden('program_id')->class('form-control')->id('program_id')->value($program_id) }}

            <div class="lecturers__list">
                @foreach($lecturers as $lecturer)
                    <div class="lecturers__list-item" itemid="{{ $lecturer->id }}">
                        <img src="{{ asset('files/images/public-part/users/' . ($lecturer->photo_uri)) }}" alt="Lecturer image" class="lecturers__list-item-image">
                        <div class="lecturers__list-item-category">{{ $lecturer->presenter_role }}</div>
                        <a href="#">
                            <h3 class="lecturers__list-item-name"> {{ $lecturer->name ?? '' }} </h3>
                        </a>
                        <div class="lecturers__list-item-subtitle"> {{ $lecturer->institution }} </div>
                        <p class="lecturers__list-item-description">{{ $lecturer->short_description }}</p>
                        <div class="lecturers__list-item-social-icons">
                            @if($lecturer->linkedin != '')
                                <a href="{{ $lecturer->linkedin }}" target="_blank" class="lecturers__list-item-social-icon">
                                    <img src="{{ asset('files/images/svg-icons/linkedin.svg') }}" alt="Linkedin icon">
                                </a>
                            @endif
                            @if($lecturer->twitter != '')
                                <a href="{{ $lecturer->twitter }}" target="_blank" class="lecturers__list-item-social-icon">
                                    <img src="{{ asset('files/images/svg-icons/x.svg') }}" alt="X icon">
                                </a>
                            @endif
                            @if($lecturer->web != '')
                                <a href="{{ $lecturer->web }}" target="_blank" class="lecturers__list-item-social-icon">
                                    <img src="{{ asset('files/images/svg-icons/dribble.svg') }}" alt="Dribble icon">
                                </a>
                            @endif
                        </div>
                   </div>
                @endforeach
            </div>
            <div class="lecturers__more-button">
                <p class="lecturers__more-button-link">{{ __('Više predavača') }}</p>
            </div>
        </div>
    </div>
    @include('public-part.app.base-includes.snake.snake')
@endsection
