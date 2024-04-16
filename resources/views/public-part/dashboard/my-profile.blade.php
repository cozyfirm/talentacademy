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
            <div class="profile__wrapper_left">
                <div class="p__w_l_img_w">
                    <form action="{{ route('dashboard.update-profile-image') }}" method="POST" id="update-profile-image" enctype="multipart/form-data">
                        @csrf
                        <img src="{{ asset('files/images/public-part/users/' . (Auth()->user()->photo_uri)) }}" alt="">
                        <label for="photo_uri" class="edit-your-photo">
                            <i class="fas fa-edit"></i>
                            <p>{{ __('Uredite') }}</p>
                        </label>
                        <input name="photo_uri" class="form-control form-control-lg d-none" id="photo_uri" type="file">
                    </form>
                </div>

                <div class="p__w_l_links_w">
                    <h5>{{ __('Društvene mreže') }}</h5>

                    <div class="social_network_wrapper instagram">
                        <p>{{ __('Instagram') }}</p>
                    </div>
                    <div class="social_network_wrapper facebook">
                        <p>{{ __('Facebook') }}</p>
                    </div>
                    <div class="social_network_wrapper twitter">
                        <p>{{ __('Twitter') }}</p>
                    </div>
                    <div class="social_network_wrapper web">
                        <p>{{ __('Web') }}</p>
                    </div>

                    <p class="share-your-links">{{ __('Podijelite Vaše društvene mreže sa ostalim članovima Akademije!') }}</p>
                </div>
            </div>

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
