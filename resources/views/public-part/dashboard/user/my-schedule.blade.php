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

            <div class="profile__wrapper_right profile__wrapper_right_schedule">
                @include('public-part.dashboard.user.includes.sessions')
            </div>
        </div>
    </div>
@endsection
