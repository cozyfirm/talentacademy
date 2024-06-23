@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <!-- Dashboard inner menu -->
    @include('public-part.dashboard.includes.inner-menu')

    <div class="white__wrapper">
        <div class="department__wrapper">
            <div class="header__wrapper">
                <h1>{{ __('Predavači') }}</h1>
            </div>

            <div class="users__wrapper">
                @for($i=0; $i<7; $i++)
                    <div class="single__user">
                        <div class="image__wrapper">

                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection
