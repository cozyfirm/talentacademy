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
                <form action="{{ route('system.admin.programs.sessions.save-session-link') }}" method="POST" id="js-form">
                    @csrf
                    <!-- Program ID -->
                    {{ html()->hidden('session_id')->class('form-control')->value($session->id) }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Naziv linka'))->for('value')->class('bold') }}
                                {{ html()->text('value')->class('form-control form-control-sm mt-1')->required() }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Link'))->for('link')->class('bold') }}
                                {{ html()->text('link')->class('form-control form-control-sm mt-1')->required() }}
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
