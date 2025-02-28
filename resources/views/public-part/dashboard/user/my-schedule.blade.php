@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <div class="white__wrapper">
        <div class="profile__wrapper profile__wrapper__mp0">
            @include('public-part.dashboard.includes.left-side')

            <div class="profile__wrapper_right profile__wrapper_right_schedule">
                @include('public-part.dashboard.user.includes.sessions')
            </div>
        </div>
    </div>
@endsection
