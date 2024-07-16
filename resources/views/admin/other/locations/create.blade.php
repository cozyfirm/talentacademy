@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-map-pin"></i> @endsection
@section('c-title') {{ __('Lokacije') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="{{ route('system.admin.locations') }}">{{ __('Pregled svih lokacija') }}</a> /
    @if(isset($location))
        <a href="{{ route('system.admin.locations.preview', ['id' => $location->id ]) }}">{{ $location->title ?? '' }}</a>
    @endif
@endsection

@section('c-buttons')
    <a href="{{ route('system.admin.locations') }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>

    @if(isset($preview))
        <a href="{{ route('system.admin.locations.edit', ['id' => $location->id ]) }}">
            <button class="pm-btn btn pm-btn-edit">
                <i class="fas fa-edit"></i>
            </button>
        </a>

        <a href="{{ route('system.admin.locations.change-image', ['id' => $location, 'what' => 'map_img']) }}" title="{{ __('Fotografija lokacije') }}">
            <button class="pm-btn btn pm-btn-edit">
                <i class="fas fa-map-pin"></i>
            </button>
        </a>
        <a href="{{ route('system.admin.locations.change-image', ['id' => $location, 'what' => 'main_img']) }}" title="{{ __('Naslovna fotografija') }}">
            <button class="pm-btn btn pm-btn-5 pm-btn-edit">
                <i class="fas fa-image"></i>
            </button>
        </a>
        <a href="{{ route('system.admin.locations.change-image', ['id' => $location, 'what' => 'cover_img']) }}" title="{{ __('Cover fotografija') }}">
            <button class="pm-btn btn pm-btn-5 pm-btn-edit">
                <i class="fas fa-images"></i>
            </button>
        </a>
    @elseif(isset($edit))
        <a href="{{ route('system.admin.locations.delete', ['id' => $location->id ]) }}">
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
            <div class="col-md-12">
                <form action="@if(isset($edit)) {{ route('system.admin.locations.update') }} @else {{ route('system.admin.locations.save') }} @endif" method="POST" id="js-form">
                    @if(isset($edit))
                        {{ html()->hidden('id')->class('form-control')->value($location->id) }}
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Naziv lokacije'))->for('title')->class('bold') }}
                                {{ html()->text('title', $location->title ?? '' )->class('form-control form-control-sm')->required()->value((isset($location) ? $location->title : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Adresa'))->for('address')->class('bold') }}
                                {{ html()->text('address')->class('form-control form-control-sm mt-1')->required()->maxlength(100)->value((isset($location) ? $location->address : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Grad'))->for('city')->class('bold') }}
                                {{ html()->text('city')->class('form-control form-control-sm mt-1')->required()->maxlength(50)->value((isset($location) ? $location->city : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Država'))->for('country')->class('bold') }}
                                {{ html()->select('country', $countries, isset($location) ? $location->country : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Lokacija'))->for('location')->class('bold') }}
                                {{ html()->text('location')->class('form-control form-control-sm mt-1')->required()->value((isset($location) ? $location->location : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Da li je lokacija javno dostupna?'))->for('public')->class('bold') }}
                                {{ html()->select('public', ['0' => 'Ne', '1' => 'Da'], isset($location) ? $location->public : '1')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Detaljan opis'))->for('description')->class('bold') }}
                                {{ html()->textarea('description')->class('form-control form-control-sm mt-2 textarea-240 summernote')->value(isset($location) ? $location->description : '')->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    @if(!isset($preview))
                        <div class="row mt-4">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark btn-sm"> {{ __('SAČUVAJTE') }} </button>
                            </div>
                        </div>
                    @endif
                </form>
            </div>

        </div>
    </div>
@endsection
