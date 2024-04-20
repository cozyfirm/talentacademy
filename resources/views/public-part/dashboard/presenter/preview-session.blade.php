@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <!-- Dashboard inner menu -->
    @include('public-part.dashboard.includes.inner-menu')

    <!-- User section -->
    <div class="white__wrapper">
        <div class="profile__wrapper">
            @include('public-part.dashboard.includes.left-side')

            <div class="profile__wrapper_right">
                <form action="{{ route('dashboard.update-sessions') }}" method="POST" id="js-form">
                    {{ html()->hidden('id')->class('form-control')->value($session->id) }}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Naslov'))->for('title')->class('bold') }}</b>
                                        {{ html()->text('title')->class('form-control form-control-sm mt-1')->required()->value((isset($session) ? $session->title : ''))->isReadonly(true) }}
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Vrijeme od'))->for('time_from')->class('bold') }}</b>
                                        {{ html()->text('time_from')->class('form-control form-control-sm mt-1')->required()->value((isset($session) ? $session->time_from : ''))->isReadonly(true) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Vrijeme do'))->for('time_to')->class('bold') }}</b>
                                        {{ html()->text('time_to')->class('form-control form-control-sm mt-1')->required()->value((isset($session) ? $session->time_to : ''))->isReadonly(true) }}
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Datum'))->for('time_from')->class('bold') }}</b>
                                        {{ html()->text('date')->class('form-control form-control-sm mt-1')->required()->value((isset($session) ? $session->date() : ''))->isReadonly(true) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Vrsta'))->for('time_to')->class('bold') }}</b>
                                        {{ html()->text('type')->class('form-control form-control-sm mt-1')->required()->value(ucfirst((isset($session) ? $session->type : '')))->isReadonly(true) }}
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Lokacija'))->for('location_id')->class('bold') }}</b>
                                        {{ html()->text('location_id')->class('form-control form-control-sm mt-1')->required()->value((isset($session) ? $session->locationRel->title : ''))->isReadonly(true) }}
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Riječ predavača'))->for('presenter_data')->class('bold') }}</b>
                                        {{ html()->textarea('presenter_data')->class('form-control form-control-sm mt-2 textarea-240')->id('presenter_data')->value(isset($session) ? $session->presenter_data : '')->isReadonly(false) }}
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button class="btn">{{ __('Sačuvajte izmjene') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
