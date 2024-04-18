@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-book-open"></i> @endsection
@section('c-title') {{ $program->title }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="{{ route('system.admin.programs') }}">{{ __('Pregled svih programa') }}</a> /
    <a href="{{ route('system.admin.programs.preview', ['id' => $program->id ]) }}">{{ $program->title ?? '' }}</a> /
    <a href="#">{{ __('Sesije') }}</a>
@endsection

@section('c-buttons')
    <a href="{{ route('system.admin.programs.preview', ['id' => $program->id ]) }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>

    @if(isset($preview))
        <a href="{{ route('system.admin.programs.sessions.edit', ['id' => $session->id ]) }}">
            <button class="pm-btn btn pm-btn-edit">
                <i class="fas fa-edit"></i>
            </button>
        </a>
    @elseif(isset($edit))
        <a href="{{ route('system.admin.programs.sessions.delete', ['id' => $session->id ]) }}">
            <button class="pm-btn btn pm-btn-trash">
                <i class="fas fa-trash"></i>
            </button>
        </a>
    @endif
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        <div class="row">
            <div class="col-md-9">
                <form action="@if(isset($edit)) {{ route('system.admin.programs.sessions.update') }} @else {{ route('system.admin.programs.sessions.save') }} @endif" method="POST" id="js-form">
                    @if(isset($edit))
                        {{ html()->hidden('id')->class('form-control')->value($program->id) }}
                    @endif
                    <!-- Program ID -->
                    {{ html()->hidden('program_id')->class('form-control')->value($program->id) }}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Naslov'))->for('title')->class('bold') }}
                                {{ html()->text('title')->class('form-control form-control-sm mt-1')->required()->value((isset($session) ? $session->title : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Vrsta'))->for('type')->class('bold') }}
                                {{ html()->select('type', $types, isset($session) ? $session->type : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Vrijeme'))->for('time')->class('bold') }}
                                {{ html()->text('time')->class('form-control form-control-sm mt-1')->required()->value((isset($session) ? $session->time : ''))->placeholder('10:30')->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Datum'))->for('date')->class('bold') }}
                                {{ html()->text('date')->class('form-control form-control-sm mt-1 datepicker')->required()->value((isset($session) ? $session->date() : ''))->placeholder('10.08.2024')->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Lokacija'))->for('location_id')->class('bold') }}
                                {{ html()->select('location_id', $locations, isset($session) ? $session->location_id : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Predavač'))->for('presenter_id')->class('bold') }}
                                {{ html()->select('presenter_id', $presenters, isset($session) ? $session->presenter_id : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Detaljan opis'))->for('description')->class('bold') }}
                                {{ html()->textarea('description')->class('form-control form-control-sm mt-2 textarea-240')->value(isset($session) ? $session->description : '')->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    @if(!isset($preview))
                        <div class="row mt-4">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark btn-sm"> {{ __('Sačuvajte izmjene') }} </button>
                            </div>
                        </div>
                    @endif
                </form>
            </div>

            <!-- Other information -->
            @include('admin.programs.snippets.sessions-right-menu')
        </div>
    </div>
@endsection
