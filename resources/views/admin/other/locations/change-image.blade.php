@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-map-pin"></i> @endsection
@section('c-title') {{ __('Lokacije') }} - {{ $title }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="{{ route('system.admin.locations') }}">{{ __('Pregled svih lokacija') }}</a> /
    <a href="{{ route('system.admin.locations.preview', ['id' => $location->id ]) }}">{{ $location->title ?? '' }}</a> /
    <a href="#">{{ $title }}</a>
@endsection

@section('c-buttons')
    <a href="{{ route('system.admin.locations.preview', ['id' => $location->id ]) }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>
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
            <div class="col-md-12">
                <form action="{{ route('system.admin.locations.update-image') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ html()->hidden('id')->class('form-control')->value($id) }}
                    {{ html()->hidden('what')->class('form-control')->value($what) }}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Odaberite fotografiju'))->for('photo_uri')->class('bold') }}
                                <input name="photo_uri" class="form-control form-control-sm mt-3" id="photo_uri" type="file">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-dark btn-sm"> {{ __('SAČUVAJTE') }} </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
