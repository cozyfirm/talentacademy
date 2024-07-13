@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <!-- Dashboard inner menu -->
    @include('public-part.dashboard.includes.inner-menu')

    <div class="white__wrapper">
        <div class="profile__wrapper">
            @include('public-part.dashboard.includes.left-side')

            <div class="profile__wrapper_right profile__wrapper_right_my_notes">
                <div class="my__evaluations__wrapper">
                    <div class="single__evaluation single__evaluation_1">
                        <div class="session__w">
                            <div class="session_name__w">
                                <p>Audio miksanje</p>
                            </div>

                            <div class="presenter__w">
                                <img src="{{ asset('files/images/svg-icons/speaker.svg') }}" alt="IG icon">
                                <p>Šemsa Suljaković</p>
                            </div>
                        </div>
                        <div class="evaluation__btn__w">
                            <a href="#">
                                <div class="just_a_btn">
                                    <img src="{{ asset('files/images/svg-icons/lock-open.svg') }}" alt="IG icon">
                                    <p>{{ __('Ocijeni predavanje') }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="single__evaluation single__evaluation_greyed">
                        <div class="session__w">
                            <div class="session_name__w">
                                <p>Audio miksanje</p>
                            </div>

                            <div class="presenter__w">
                                <img src="{{ asset('files/images/svg-icons/speaker.svg') }}" alt="IG icon">
                                <p>Šemsa Suljaković</p>
                            </div>
                        </div>
                        <div class="evaluation__btn__w">
                            <a href="#">
                                <div class="just_a_btn">
                                    <img src="{{ asset('files/images/svg-icons/lock.svg') }}" alt="IG icon">
                                    <p>{{ __('Ocijeni predavanje') }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
