@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-image"></i> @endsection
@section('c-title') {{ __('Galerija fotografija') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="#">{{ __('Arhiva') }}</a> / <a href="{{ route('system.admin.archive.gallery') }}">{{ __('Pregled fotografija u arhivi') }}</a> / <a href="#">{{ __('Unos') }}</a>
@endsection

@section('c-buttons')
    <a href="{{ route('system.admin.archive.gallery') }}">
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
                <form action="{{ route('system.admin.archive.gallery.save') }}" method="POST" id="update-profile-image" enctype="multipart/form-data" multiple="true">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Odaberite sezonu'))->for('season_id')->class('bold') }}
                                {{ html()->select('season_id', $seasons, '')->class('form-control form-control-sm mt-1')->required() }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Odaberite željenu fotografiju'))->for('active')->class('bold') }}
                                <input name="photo[]" class="form-control" id="photo" type="file" multiple>
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
