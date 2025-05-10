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
        @if(session()->has('success'))
            <div class="alert alert-success mt-3">
                {{ session()->get('success') }}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger mt-3">
                {{ session()->get('error') }}
            </div>
        @endif

        {{--@if(isset($session))--}}
        {{--    @include('admin.programs.sessions.snippets.new-link')--}}
        {{--@endif--}}

        <div class="row">
            <div class="col-md-9">
                <form action="@if(isset($edit)) {{ route('system.admin.programs.sessions.update') }} @else {{ route('system.admin.programs.sessions.save') }} @endif" method="POST" id="js-form">
                    @if(isset($edit))
                        {{ html()->hidden('id')->class('form-control')->value($session->id) }}
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
                                {{ html()->label(__('Vrijeme od'))->for('time_from')->class('bold') }}
                                {{ html()->select('time_from', $timeArr, isset($session) ? $session->time_from : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Vrijeme do'))->for('time_to')->class('bold') }}
                                {{ html()->select('time_to', $timeArr, isset($session) ? $session->time_to : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Datum'))->for('date')->class('bold') }}
                                {{ html()->text('date')->class('form-control form-control-sm mt-1 datepicker')->required()->value((isset($session) ? $session->date() : ''))->placeholder('10.08.2024')->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Javno'))->for('public')->class('bold') }}
                                {{ html()->select('public', ['0' => 'Ne', '1' => 'Da'], isset($session) ? $session->public : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Lokacija'))->for('location_id')->class('bold') }}
                                {{ html()->select('location_id', $locations, isset($session) ? $session->location_id : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Predavač'))->for('presenter_id')->class('bold') }}

                                <select name="presenter_id" class="form-control form-control-sm select2" required multiple>
                                    @foreach($presenters as $key => $val)
                                        <option value="{{ $key }}" @isset($session) @if(SessionHelper::isPresenterSelected($session->id, $key)) selected @endif @endisset>{{ $val }}</option>
                                    @endforeach
                                </select>

{{--                                {{ html()->select('presenter_id', $presenters, isset($session) ? $session->presenter_id : '')->class('form-control form-control-sm mt-1')->disabled(isset($preview)) }}--}}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Kratki opis'))->for('short_description')->class('bold') }}
                                {{ html()->textarea('short_description')->class('form-control form-control-sm mt-2 textarea-120')->maxlength('300')->value(isset($session) ? $session->short_description : '')->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Detaljan opis'))->for('description')->class('bold') }}
                                {{ html()->textarea('description')->class('form-control form-control-sm mt-2 textarea-240 summernote')->value(isset($session) ? $session->description : '')->isReadonly(isset($preview)) }}
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

        @if(isset($preview))
            <div class="row mb-5">
                <div class="col-md-12">
                    <hr>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="60px" class="text-center">#</th>
                            <th width="160px" class="">{{ __('Ime i prezime') }}</th>
                            @foreach($questions as $question)
                                <th class="">{{ $question->question }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @php $counter = 1 @endphp
                        @foreach($users as $user)
                            <tr>
                                <th scope="row" class="text-center">{{ $counter++ }}.</th>
                                <th>{{ $user->attendeeRel->name ?? '' }}</th>
                                @foreach($user->getEvaluationsForUser($user->attendee_id, $session->id) as $evaluation)
                                    <td>{{ $evaluation->answer }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
