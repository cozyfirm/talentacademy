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

                <form action="{{ route('dashboard.sessions.save-new-file') }}" method="POST" enctype="multipart/form-data">
                    {{ html()->hidden('session_id')->class('form-control')->value($session->id) }}
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Odaberite dokument'))->for('file_uri')->class('bold') }}</b>
                                        <input name="file_uri" class="form-control form-control-sm mt-3" id="file_uri" type="file">
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
            </div>
        </div>
    </div>
@endsection
