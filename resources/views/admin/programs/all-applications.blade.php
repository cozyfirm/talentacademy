@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-file-alt"></i> @endsection
@section('c-title') {{ __('Pregled svih prijava') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="#">{{ __('Pregled svih prijava na programe') }}</a>
@endsection
@section('c-buttons')
    <a href="#">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @include('admin.layout.snippets.filters.filter-header', ['var' => $applications])
        <table class="table table-bordered" id="filtering">
            <thead>
            <tr>
                <th scope="col" style="text-align:center;">#</th>
                @include('admin.layout.snippets.filters.filters_header')
                <th width="120p" class="akcije text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($applications as $application)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $application->programRel->title ?? ''}} </td>
                    <td>
                        <a href="{{ route('system.admin.users.preview', ['username' => $application->userRel->username]) }}" target="_blank">
                            {{ $application->userRel->name ?? ''}}
                        </a>
                    </td>
                    <td> {{ $application->app_status ?? '' }} </td>
                    <td class="text-center">
                        <a href="{{route('system.admin.programs.preview-application', ['id' => $application->id] )}}" title="{{ __('Više informacija') }}">
                            <button class="btn-dark btn-xs">{{ __('Pregled') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @include('admin.layout.snippets.filters.pagination', ['var' => $applications])
    </div>
@endsection
