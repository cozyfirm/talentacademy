@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <!-- User section -->
    <div class="white__wrapper">
        <div class="profile__wrapper">
            @include('public-part.dashboard.includes.left-side')

            <div class="profile__wrapper_right">
                <form action="{{ route('dashboard.update-profile') }}" method="POST" id="js-form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Ime i prezime'))->for('name')->class('bold') }}</b>
                                        {{ html()->text('name')->class('form-control form-control-sm mt-1')->maxlength(100)->value(Auth::user()->name) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Broj telefona'))->for('phone')->class('bold') }}</b>
                                        {{ html()->number('phone')->class('form-control form-control-sm mt-1')->maxlength(13)->placeholder('+38761222555')->value(Auth::user()->phone) }}
                                        <small id="prefixHelp" class="form-text text-muted"> {{ __('Unesite Vaš broj telefona') }} </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Datum rođenja'))->for('birth_date')->class('bold') }}</b>
                                        {{ html()->text('birth_date')->class('form-control form-control-sm mt-1 datepicker')->maxlength('10')->value(Auth::user()->birthDate()) }}
                                        <small id="birth_dateHelp" class="form-text text-muted">{{ __('Unesite Vaš datum rođenja') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <b>{{ html()->label(__('Adresa stanovanja'))->for('address')->class('bold') }}</b>
                                    {{ html()->text('address')->class('form-control form-control-sm mt-2')->maxlength('100')->value(Auth::user()->address) }}
                                    <small id="addressHelp" class="form-text text-muted">{{ __('Vaša adresa stanovanja') }}</small>
                                </div>
                                <div class="col-md-6">
                                    <b>{{ html()->label(__('Grad'))->for('city')->class('bold') }}</b>
                                    {{ html()->text('city')->class('form-control form-control-sm mt-2')->maxlength('50')->value(Auth::user()->city) }}
                                    <small id="living_placeHelp" class="form-text text-muted">{{ __('Grad u kojem trenutno živite') }}</small>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Država'))->for('country')->class('bold') }}</b>
                                        {{ html()->select('country', $countries, Auth::user()->country ?? 21)->class('form-control form-control-sm mt-2')->options([]) }}
                                        <small id="countryHelp" class="form-text text-muted"> {{ __('Odaberite državu u kojoj trenutno živite') }} </small>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('O meni'))->for('country')->class('bold') }}</b>
                                        {{ html()->textarea('about')->class('form-control form-control-sm mt-2')->value(Auth::user()->about) }}
                                        <small id="countryHelp" class="form-text text-muted"> {{ __('Osnovne informacije o Vama') }} </small>
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
