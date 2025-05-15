@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <div class="white__wrapper">
        <div class="profile__wrapper">
            @include('public-part.dashboard.includes.left-side')

            <div class="profile__wrapper_right profile__wrapper_right_my_notes">
                <form action="{{ route('dashboard.update-evaluation') }}" method="POST">
                    {{ html()->hidden('session_id')->class('form-control')->value($session_id) }}
                    @csrf
                    <div class="my__evaluations__wrapper">
                        <div class="single__evaluation single__evaluation_1">
                            <div class="session__w">
                                <div class="session_name__w">
                                    <p>{{ $session->title ?? '' }}</p>
                                </div>

                                <div class="presenter__w">
                                    <img src="{{ asset('files/images/svg-icons/speaker.svg') }}" alt="IG icon">
                                    <p>
                                        @foreach($session->presentersRel as $presenter)
                                            {{ $presenter->presenterRel->name ?? '' }}
                                            @if($total++ < ($session->presentersRel->count() - 1)), @endif
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                            <div class="evaluation__btn__w">
                                <a href="{{ route('dashboard.my-evaluations') }}">
                                    <div class="just_a_btn">
                                        <img src="{{ asset('files/images/svg-icons/back.svg') }}" alt="IG icon">
                                        <p>{{ __('Nazad') }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="my__evaluations__form_w">
                        @foreach($questions as $question)
                            @if($question->type == 'radio')
                                <div class="single__question">
                                    <div class="question__w">
                                        <p> {{ $question->question }} </p>
                                    </div>
                                    <div class="answers__wrapper">
                                        @foreach($question->answersRel as $answer)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="question__{{ $question->id }}" id="question__{{ $answer->id }}" value="{{ $answer->answer }}" required @if(Auth()->user()->isThisAnswer($session_id, $question->id, $answer->answer)) checked @endif>
                                                <label class="form-check-label" for="question__{{ $answer->id }}">{{ $answer->answer }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @elseif($question->type == 'text')
                                <div class="single__question">
                                    <div class="question__w">
                                        <p> {{ $question->question }} </p>
                                    </div>
                                    <div class="answers__wrapper">
                                        {{ html()->textarea('question__' . $question->id )->class('form-control form-control-sm mt-2')->required(true)->value(Auth()->user()->getAnswer($session_id, $question->id)) }}
                                    </div>
                                </div>
                            @endif

                        @endforeach

                        <div class="send_btn">
                            <button class="btn">{{ __('Pošalji') }}</button>
                        </div>

                        <div class="note__w">
                            <img src="{{ asset('files/images/svg-icons/atention.svg') }}" alt="IG icon">
                            <p> Tvoja ocjena radionice nam je jako važna, zato te molimo da redovno ispunjavaš evaluacije radionica. Nakon svake završene radionice evaluacioni formular će postati dostupan u tvom dashboardu. Odgovore i ocjene u evaluacionoj formi možeš editovati 24 sata nakon što si započeo/la njeno ispunjavanje. Nakon 24 sata započeta forma se zaključava i više se ne može editovati. </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
