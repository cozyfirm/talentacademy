@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-file-alt"></i> @endsection
@section('c-title') {{ __('Programi') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="{{ route('system.admin.programs') }}">{{ __('Pregled svih programa') }}</a>
@endsection

@section('c-buttons')
    <a href="{{ route('system.admin.programs') }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>

    @if(isset($preview))
        <a href="{{ route('system.admin.programs.edit', ['id' => $program->id ]) }}">
            <button class="pm-btn btn pm-btn-edit">
                <i class="fas fa-edit"></i>
            </button>
        </a>
    @elseif(isset($edit))
        <a href="{{ route('system.admin.programs.delete', ['id' => $program->id ]) }}">
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

        <div class="row">
            <div class="@if(isset($preview)) col-md-9 @else col-md-12 @endif">
                <form action="@if(isset($edit)) {{ route('system.admin.programs.update') }} @else {{ route('system.admin.programs.save') }} @endif" method="POST" id="js-form">
                    @if(isset($edit))
                        {{ html()->hidden('id')->class('form-control')->value($program->id) }}
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Naslov programa'))->for('title')->class('bold') }}
                                {{ html()->text('title')->class('form-control form-control-sm')->required()->value((isset($program) ? $program->title : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ html()->label(__('Detaljan opis'))->for('description')->class('bold') }}
                                    {{ html()->textarea('description')->class('form-control form-control-sm mt-2 textarea-240')->value(isset($program) ? $program->description : '')->isReadonly(isset($preview)) }}
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

                <!-- Display sessions -->
                @if(isset($preview))
                    <hr class="mt-3 mb-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" width="40px" class="text-center">#</th>
                                <th scope="col">{{ __('Naslov') }}</th>
                                <th scope="col">{{ __('Datum i vrijeme') }}</th>
                                <th scope="col" width="120px" class="text-center">{{ __('Akcije') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $counter = 1 @endphp
                            @foreach($program->sessionsRel as $session)
                                <tr>
                                    <th scope="col" width="40px" class="text-center">{{ $counter++ }}</th>
                                    <th scope="col"> {{ $session->title ?? '' }} </th>
                                    <th scope="col"> {{ $session->date() }} {{ $session->time_from }}h </th>
                                    <th scope="col" width="120px" class="text-center">
                                        <a href="{{ route('system.admin.programs.sessions.preview', ['id' => $session->id ]) }}">
                                            <button class="btn-dark btn-xs">{{ __('Pregled') }}</button>
                                        </a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <!-- Other information -->
            @if(isset($preview))
                @include('admin.programs.snippets.right-menu')
            @endif
        </div>
    </div>
@endsection
