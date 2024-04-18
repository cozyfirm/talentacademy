@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-book-open"></i> @endsection
@section('c-title') {{ $session->title }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="#">..</a> /
    <a href="{{ route('system.admin.programs.sessions.preview', ['id' => $session->id ]) }}">{{ $session->title }}</a> /
    <a href="#">{{ __('Dokumenti') }}</a>
@endsection

@section('c-buttons')
    <a href="{{ route('system.admin.programs.sessions.preview', ['id' => $session->id ]) }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('system.admin.programs.sessions.save-session-file') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Program ID -->
                    {{ html()->hidden('session_id')->class('form-control')->value($session->id) }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Odaberite fotografiju'))->for('photo_uri')->class('bold') }}
                                <input name="file_uri" class="form-control form-control-sm mt-3" id="file_uri" type="file">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-dark btn-sm"> {{ __('Sačuvajte izmjene') }} </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
