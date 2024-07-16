@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <div class="white__wrapper">
        <div class="profile__wrapper">
            @include('public-part.dashboard.includes.left-side')

            <div class="profile__wrapper_right profile__wrapper_right_my_notes">
                <div class="my__evaluations__wrapper">
                    @foreach($sessions as $session)
                        @if($session->presenter_id)
                            <div class="single__evaluation @if(Auth()->user()->isSessionEvaluated($session->id, true)) single__evaluation_greyed @else @endif single__evaluation_{{ $session->programRel->id }}">
                                <div class="session__w">
                                    <div class="session_name__w">
                                        <p>{{ $session->title }}</p>
                                    </div>

                                    <div class="presenter__w">
                                        <img src="{{ asset('files/images/svg-icons/speaker.svg') }}" alt="IG icon">
                                        <p>{{ $session->presenterRel->name ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="evaluation__btn__w">
                                    <a @if(!Auth()->user()->isSessionEvaluated($session->id, true)) href="{{ route('dashboard.my-evaluations.check', ['session_id' => $session->id ]) }}" @endif>
                                        <div class="just_a_btn">
                                            @if(Auth()->user()->isSessionEvaluated($session->id, true))
                                                <img src="{{ asset('files/images/svg-icons/lock.svg') }}" alt="IG icon">
                                            @else
                                                <img src="{{ asset('files/images/svg-icons/lock-open.svg') }}" alt="IG icon">
                                            @endif
                                            <p>{{ __('Ocijeni predavanje') }}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
