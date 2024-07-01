@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <!-- Dashboard inner menu -->
    @include('public-part.dashboard.includes.inner-menu')

    <div class="chat__wrapper">
        <div class="conversations__wrapper">
            <div class="left__conversations__wrapper group__chats__wrapper">
                <div class="lcw__header">
                    <p>{{ __('Info i group chats') }}</p>
                </div>

                <div class="lcw__body gcw__body">
                    <div class="conversation__item">
                        <div class="conversation__img">
                            <img src="{{ asset('files/images/public-part/info.png') }}" alt="">
                        </div>
                        <p>{{ __('Akademija info') }}</p>
                    </div>
                    <div class="conversation__item">
                        <div class="conversation__img">
                            <img src="{{ asset('files/images/public-part/department.png') }}" alt="">
                        </div>
                        <p>{{ __('Moj odsjek') }}</p>
                    </div>
                    <div class="conversation__item">
                        <div class="conversation__img">
                            <img src="{{ asset('files/images/public-part/wall.png') }}" alt="">
                        </div>
                        <p>{{ __('Akademija wall') }}</p>
                    </div>
                </div>
            </div>

            <div class="my__contacts__wrapper">
                <div class="lcw__header">
                    <p>{{ __('Info i group chats') }}</p>
                </div>

                <div class="all__chats">
                    @for($i=0; $i<3; $i++)
                        <div class="conversation__item">
                            <div class="conversation__img">
                                <img src="{{ asset('files/images/public-part/info.png') }}" alt="">
                            </div>
                            <p>{{ __('Akademija info') }}</p>
                        </div>
                        <div class="conversation__item">
                            <div class="conversation__img">
                                <img src="{{ asset('files/images/public-part/department.png') }}" alt="">
                            </div>
                            <p>{{ __('Moj odsjek') }}</p>
                        </div>
                        <div class="conversation__item">
                            <div class="conversation__img">
                                <img src="{{ asset('files/images/public-part/wall.png') }}" alt="">
                            </div>
                            <p>{{ __('Akademija wall') }}</p>
                        </div>
                    @endfor
                </div>
            </div>

            <div class="left__conversations__wrapper mc__chats__wrapper">
                <div class="lcw__header">
                    <p>{{ __('Moji kontakti') }}</p>
                </div>

                <div class="lcw__body mcw__body">

                </div>
            </div>
        </div>

        <div class="conversation__wrapper">

        </div>
    </div>
@endsection
