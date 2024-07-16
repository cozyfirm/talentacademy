@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <div class="white__wrapper grey__wrapper">
        <div class="department__wrapper">
            <div class="header__wrapper">
                <h1>{{ __('Predavači') }}</h1>
            </div>

            <div class="users__wrapper users__wrapper_{{ Auth()->user()->whatIsMyProgram('id') }}">
                @foreach($lecturers as $lecturer)
                    <div class="single__user">
                        <div class="image__wrapper">
                            <img src="{{ asset('files/images/public-part/users/' . ($lecturer->photo_uri)) }}" alt="Lecturer image" class="lecturers__list-item-image">
                        </div>
                        <div class="text__wrapper">
                            <h4>{{ $lecturer->name }}</h4>
                            <p>{{ $lecturer->institution }}</p>

                            <div class="buttons__wrapper">
                                <a href="{{ route('public-part.lecturers.single-lecturer', ['id' => $lecturer->id]) }}">
                                    <button>
                                        <img src="{{ asset('files/images/public-part/user.png') }}" alt="">
                                        <p>{{ __('Više informacija') }}</p>
                                    </button>
                                </a>
{{--                                <a href="#">--}}
{{--                                    <button>--}}
{{--                                        <img src="{{ asset('files/images/public-part/message.png') }}" alt="">--}}
{{--                                        <p>{{ __('Poruka') }}</p>--}}
{{--                                    </button>--}}
{{--                                </a>--}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="header__wrapper">
                <h1>{{ __('Klasa') }}</h1>
            </div>
            <div class="users__wrapper users__wrapper_{{ Auth()->user()->whatIsMyProgram('id') }}">
                @foreach($teamMates as $teamMate)
                    <div class="single__user">
                        <div class="image__wrapper">
                            @if(isset($teamMate->photo_uri))
                                <img src="{{ asset('files/images/public-part/users/' . ($teamMate->photo_uri)) }}" alt="Lecturer image" class="lecturers__list-item-image">
                            @else
                                <img class="cover-image" src="{{ asset('files/images/public-part/silhouette.png') }}" alt="">
                            @endif
                        </div>
                        <div class="text__wrapper">
                            <h4>{{ $teamMate->name }}</h4>
                            <p>{{ $teamMate->institution }}</p>

                            <div class="buttons__wrapper">
                                <a href="{{ route('dashboard.preview-user', ['username' => $teamMate->username ]) }}">
                                    <button>
                                        <img src="{{ asset('files/images/public-part/user.png') }}" alt="">
                                        <p>{{ __('Više informacija') }}</p>
                                    </button>
                                </a>
{{--                                <a href="#">--}}
{{--                                    <button>--}}
{{--                                        <img src="{{ asset('files/images/public-part/message.png') }}" alt="">--}}
{{--                                        <p>{{ __('Poruka') }}</p>--}}
{{--                                    </button>--}}
{{--                                </a>--}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
