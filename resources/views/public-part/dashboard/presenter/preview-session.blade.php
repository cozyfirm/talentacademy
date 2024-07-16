@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <!-- User section -->
    <div class="white__wrapper">
        <div class="profile__wrapper">
            @include('public-part.dashboard.includes.left-side')

            <div class="profile__wrapper_right">
                <div class="sessions_header">
                    <div class="sessions_header_left">
                        <p>{{ $session->title }}</p>
                    </div>
                    <div class="sessions_header_right">
                        <a href="{{ route('dashboard.sessions.add-new-file', ['session_id' => $session->id]) }}" title="{{ __('Zakačite novi dokument') }}">
                            <div class="link_w"> <i class="fas fa-file"></i> </div>
                        </a>
                        <a href="{{ route('dashboard.sessions.add-new-link', ['session_id' => $session->id]) }}" title="{{ __('Unesite novi link') }}">
                            <div class="link_w"> <i class="fas fa-link"></i> </div>
                        </a>
                    </div>
                </div>

                <form action="{{ route('dashboard.update-sessions') }}" method="POST" id="js-form">
                    {{ html()->hidden('id')->class('form-control')->value($session->id) }}

                    <div class="row">
                        <div class="col-md-12">
                            {{--<div class="row">--}}
                            {{--    <div class="col-md-12">--}}
                            {{--        <div class="form-group">--}}
                            {{--            <b>{{ html()->label(__('Naslov'))->for('title')->class('bold') }}</b>--}}
                            {{--            {{ html()->text('title')->class('form-control form-control-sm mt-1')->required()->value((isset($session) ? $session->title : ''))->isReadonly(true) }}--}}
                            {{--        </div>--}}
                            {{--    </div>--}}
                            {{--</div>--}}

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Vrijeme od'))->for('time_from')->class('bold') }}</b>
                                        {{ html()->text('time_from')->class('form-control form-control-sm mt-1')->required()->value((isset($session) ? $session->time_from : ''))->isReadonly(true) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Vrijeme do'))->for('time_to')->class('bold') }}</b>
                                        {{ html()->text('time_to')->class('form-control form-control-sm mt-1')->required()->value((isset($session) ? $session->time_to : ''))->isReadonly(true) }}
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Datum'))->for('time_from')->class('bold') }}</b>
                                        {{ html()->text('date')->class('form-control form-control-sm mt-1')->required()->value((isset($session) ? $session->date() : ''))->isReadonly(true) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Vrsta'))->for('time_to')->class('bold') }}</b>
                                        {{ html()->text('type')->class('form-control form-control-sm mt-1')->required()->value(ucfirst((isset($session) ? $session->type : '')))->isReadonly(true) }}
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Lokacija'))->for('location_id')->class('bold') }}</b>
                                        {{ html()->text('location_id')->class('form-control form-control-sm mt-1')->required()->value((isset($session) ? $session->locationRel->title : ''))->isReadonly(true) }}
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Riječ predavača'))->for('presenter_data')->class('bold') }}</b>
                                        {{ html()->textarea('presenter_data')->class('form-control form-control-sm mt-2 textarea-240')->id('presenter_data')->value(isset($session) ? $session->presenter_data : '')->isReadonly(false) }}
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button class="btn">{{ __('Sačuvajte izmjene') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <br>
                <hr class="mt-3 mb-3">
                <br>

                <div class="home-concerts">
                    <div class="global-inner-wrapper">
{{--                        <div class="giw-hc-header">--}}
{{--                            <p>{{ __('Dokumentacija dostupna polaznicima') }}</p>--}}
{{--                        </div>--}}

                        <div class="giw-hc-table mt-3">
                            <table class="long-table">
                                <tr class="header">
                                    <td> {{ __('#') }} </td>
                                    <td> {{ __('Naziv dokumenta') }} </td>
                                    <td class="text-center"> {{ __('Akcije') }} </td>
                                </tr>

                                @php $counter = 1; @endphp
                                @foreach($session->sessionFileRel as $sessionFile)
                                    <tr class="body-tr">
                                        <td> {{ $counter++ }}. </td>
                                        <td>
                                            <a href="{{ $sessionFile->fileRel->getFile() }}" target="_blank" title="{{ __('Pregled dokumenta') }}">{{ $sessionFile->fileRel->file }}</a>
                                        </td>
                                        <td class="text-center pt-2">
                                            <a href="{{ route('dashboard.sessions.remove-file', ['id' => $sessionFile->id ]) }}" title="{{ __('Obrišite dokument') }}">
                                                <button class="btn session-table-btn"><small>{{ __('Obrišite') }}</small></button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                        </div>

                    </div>
                </div>

                <div class="home-concerts">
                    <div class="global-inner-wrapper mt-5">
{{--                        <div class="giw-hc-header">--}}
{{--                            <p>{{ __('Linkovi dostupni polaznicima') }}</p>--}}
{{--                        </div>--}}

                        <div class="giw-hc-table mt-3">
                            <table class="long-table">
                                <tr class="header">
                                    <td> {{ __('#') }} </td>
                                    <td> {{ __('Naziv link-a') }} </td>
                                    <td class="text-center"> {{ __('Akcije') }} </td>
                                </tr>

                                @php $counter = 1; @endphp
                                @foreach($session->sessionLinkRel as $sessionLink)
                                    <tr class="body-tr">
                                        <td> {{ $counter++ }}. </td>
                                        <td> {{ $sessionLink->value }} </td>
                                        <td class="text-center pt-2">
                                            <a href="{{ route('dashboard.sessions.remove-link', ['id' => $sessionLink->id ]) }}" title="{{ __('Obrišite link') }}">
                                                <button class="btn session-table-btn"><small>{{ __('Obrišite') }}</small></button>
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
