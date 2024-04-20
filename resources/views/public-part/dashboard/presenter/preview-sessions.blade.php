@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <!-- Dashboard inner menu -->
    @include('public-part.dashboard.includes.inner-menu')

    <!-- User section -->
    <div class="white__wrapper">
        <div class="profile__wrapper">
            @include('public-part.dashboard.includes.left-side')

            <div class="profile__wrapper_right">
                <div class="home-concerts">
                    <div class="global-inner-wrapper">
                        <div class="giw-hc-header">
                            <h1>{{ __('Pregled sesija') }}</h1>
                            <p>{{ __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. ') }}</p>
                        </div>

                        <div class="giw-hc-table">
                            <table>
                                <tr class="header">
                                    <td> {{ __('#') }} </td>
                                    <td> {{ __('Naslov') }} </td>
                                    <td> {{ __('Datum') }} </td>
                                    <td> {{ __('Vrijeme') }} </td>
                                    <td> {{ __('Program') }} </td>
                                    <td class="text-center"> {{ __('Akcije') }} </td>
                                </tr>

                                @php $counter = 1; @endphp
                                @foreach($sessions as $session)
                                    <tr>
                                        <td> {{ $counter++ }}. </td>
                                        <td> {{ $session->title }} </td>
                                        <td> {{ $session->date() }} </td>
                                        <td> {{ $session->time_from }} - {{ $session->time_to }} </td>
                                        <td> {{ $session->programRel->title ?? '' }} </td>
                                        <td class="text-center pt-2">
                                            <a href="{{ route('dashboard.preview-session', ['id' => $session->id ]) }}" title="{{ __('Više informacija') }}">
                                                <button class="btn session-table-btn"><small>{{ __('Pregled') }}</small></button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
