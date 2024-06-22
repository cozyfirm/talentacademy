@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-file-alt"></i> @endsection
@section('c-title') {{ __('Pregled prijave') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="#">{{ __('Pregled prijave') }} - {{ $application->userRel->name ?? '' }}</a>
@endsection
@section('c-buttons')
    <a href="{{ route('system.admin.programs.all-applications') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
    <a href="{{ route('system.admin.programs.preview-application', ['id' => $application->id ]) }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">

        <div class="row">
            <div class="@col-md-12">
                <form action="{{ route('system.admin.programs.update-application') }}" method="POST" id="js-form">
                    {{ html()->hidden('id')->class('form-control')->value($application->id) }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Ime i prezime'))->for('attendee_id')->class('bold') }}
                                {{ html()->text('attendee_id')->class('form-control form-control-sm mt-2')->required()->value( $application->userRel->name ?? '' )->isReadonly(true) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Program'))->for('program_id')->class('bold') }}
                                {{ html()->text('program_id')->class('form-control form-control-sm mt-2')->required()->value( $application->programRel->title ?? '' )->isReadonly(true) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Status prijave'))->for('app_status')->class('bold') }}
                                {{ html()->select('app_status', ['in_queue' => 'In Queue', 'accepted' => 'Accepted', 'denied' => 'Denied' ], isset($application) ? $application->app_status : '')->class('form-control form-control-sm mt-2')->required()->disabled(isset($preview)) }}
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
