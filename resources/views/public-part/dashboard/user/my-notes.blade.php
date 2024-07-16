@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <div class="white__wrapper">
        <div class="profile__wrapper">
            @include('public-part.dashboard.includes.left-side')

            <div class="profile__wrapper_right profile__wrapper_right_my_notes">
                <div class="my__notes__wrapper">
                    @foreach($sessions as $session)
                        @if($session->noteRel->count())
                            <div class="my__note_wrapper my__note_wrapper_{{ $session->program_id }}">
                                <div class="my__note__header">
                                    <div class="mnh__left">
                                        <img class="calendar_img" src="{{ asset('files/images/public-part/calendar.png') }}" alt="">
                                        <p class="no__select"> {{ $session->getFullWeekDay() }}, {{ $session->date() }} </p>

                                        <p class="session__title"><b> {{ $session->title }} </b></p>
                                    </div>

                                    <div class="mnh__right">
                                        <img class="speaker_img" src="{{ asset('files/images/public-part/speaker.png') }}" alt="">
                                        <p class="no__select presenter_name"> {{ $session->presenterRel->name }} </p>
                                        <img class="notes_img" src="{{ asset('files/images/public-part/notes.png') }}" alt="">
                                        <div class="total_no" id="notes__count_{{ $session->id }}"> {{ $session->noteRel->count() }} </div>
                                    </div>
                                </div>
                                <div class="my__note_body">
                                    @foreach($session->noteRel as $note)
                                        <div class="single__note">
                                            <div class="time__w">
                                                <p>{{ $note->time() }}</p>
                                            </div>
                                            <div class="note_w">
                                                <p> {!! nl2br($note->note) !!} </p>
                                            </div>
                                            <div class="remove_w remove__my_note" note-id="{{ $note->id}}" session-id="{{ $session->id }}" title="{{ __('Obrišite bilješku') }}">
                                                <img class="notes_img" src="{{ asset('files/images/public-part/remove.png') }}" alt="">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
