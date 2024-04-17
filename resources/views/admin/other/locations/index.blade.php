@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-map-pin"></i> @endsection
@section('c-title') {{ __('Lokacije') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="{{ route('system.admin.locations') }}">{{ __('Pregled svih lokacija') }}</a>
@endsection
@section('c-buttons')
    <a href="{{ route('system.admin.users') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
    <a href="{{ route('system.admin.locations.create') }}">
        <button class="pm-btn btn pm-btn-success">
            <i class="fas fa-plus"></i>
            <span>{{ __('Unos nove') }}</span>
        </button>
    </a>
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @include('admin.layout.snippets.filters.filter-header', ['var' => $locations])
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
            @foreach($locations as $location)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $location->title ?? ''}} </td>
                    <td> {{ $location->address ?? ''}} </td>
                    <td> {{ $location->city ?? ''}} </td>
                    <td> {{ $location->countryRel->name_ba ?? ''}} </td>
                    <td> {{ $location->location ?? ''}} </td>

                    <td class="text-center">
                        <a href="{{route('system.admin.locations.preview', ['id' => $location->id] )}}" title="{{ __('Više informacija') }}">
                            <button class="btn-dark btn-xs">{{ __('Pregled') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @include('admin.layout.snippets.filters.pagination', ['var' => $locations])
    </div>
@endsection
