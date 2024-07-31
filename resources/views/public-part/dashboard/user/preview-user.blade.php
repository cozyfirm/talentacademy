@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <div class="white__wrapper grey__wrapper">
        <div class="preview__user_w">
            <div class="image__n_social__wrapper">
                <div class="only__image__wrapper">
                    @if(isset($user->photo_uri))
                        <img src="{{ asset('files/images/public-part/users/' . ($user->photo_uri)) }}" alt="User image" class="lecturers__list-item-image">
                    @else
                        <img class="cover-image" src="{{ asset('files/images/public-part/silhouette.png') }}" alt="">
                    @endif
                </div>
                <div class="socials__wrapper">
                    @if(isset($user->instagram) and !empty($user->instagram))
                        <a href="{{ $user->instagram }}">
                            <img src="{{ asset('files/images/svg-icons/ig.svg') }}" alt="IG icon">
                        </a>
                    @endif
                    @if(isset($user->facebook) and !empty($user->facebook))
                        <a href="{{ $user->facebook }}">
                            <img src="{{ asset('files/images/svg-icons/fb.svg') }}" alt="FB icon">
                        </a>
                    @endif
                    @if(isset($user->twitter) and !empty($user->twitter))
                        <a href="{{ $user->twitter }}">
                            <img src="{{ asset('files/images/svg-icons/x.svg') }}" alt="X icon">
                        </a>
                    @endif
                    @if(isset($user->linkedin) and !empty($user->linkedin))
                        <a href="{{ $user->linkedin }}">
                            <img src="{{ asset('files/images/svg-icons/linkedin.svg') }}" alt="Linkedin icon">
                        </a>
                    @endif
                    @if(isset($user->web) and !empty($user->web))
                        <a href="{{ $user->web }}">
                            <img src="{{ asset('files/images/svg-icons/dribble.svg') }}" alt="Dribble icon">
                        </a>
                    @endif
                </div>
            </div>
            <div class="text__wrapper">
                <div class="full__name">
                    <h1>{{ $user->name }}</h1>
                    <h2>{{ $user->city }}, {{ $user->countryRel->name_ba ?? '' }}</h2>
                </div>
                <div class="text__part">
                    <h3>{{ __('O meni') }}</h3>
                    <p>{!! nl2br($user->about) !!}</p>
{{--                    <a href="{{ route('dashboard.chat.conversation-with-user', ['username' => $user->username ]) }}">--}}
{{--                        <div class="send__a__message">--}}
{{--                            <img src="{{ asset('files/images/svg-icons/send-msg.svg') }}" alt="IG icon">--}}
{{--                            <p>{{ __('Pošalji poruku') }}</p>--}}
{{--                        </div>--}}
{{--                    </a>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="white__wrapper grey__wrapper">
        <div class="department__wrapper">
            <div class="header__wrapper">
                <h1>{{ Auth()->user()->whatIsMyProgram('title') }}</h1>
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
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
