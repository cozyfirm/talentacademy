<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <title> {{ __('Prijavite se') }} </title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icons/LogoMali.png') }}"/>
    <script src="https://kit.fontawesome.com/bccf934f7c.js" crossorigin="anonymous"></script>
    <!-- CSS files + fonts -->
    @vite(['resources/css/app.scss', 'resources/css/admin/admin.scss', 'resources/js/app.js'])
</head>
<body>

<div class="loading-gif d-none">
    <img src="{{ asset('files/images/default/loading-cubes.gif') }}" alt="">
</div>

<div class="auth-form register-form">
    <div class="af-image rf-image">
        {{--<img src="{{ asset('files/images/default/ekipa.png') }}" alt="">--}}
        <div class="af-img-text">
            <h1>ALKARIS</h1>
        </div>
    </div>

    <div class="af-form rf-form">
        <div class="center-element">
            <div class="rf-f-header">
                <div class="aff-header">
                    <h1 class="tb-color mb-4"> <b>{{ __('Kreirajte račun') }}</b> </h1>
                </div>

                <div class="aff-short">
                    <p>
                        {{ __('Unesite Vaše osnovne informacije, kreirajte Vaš korisnički račun, i uživajte koristeći našu platformu!') }}
                    </p>
                </div>

                <div class="progress-line">
                    <div class="pl-e-bar"> <div class="pl-e-bar-fill"></div> </div>
                    <div class="pl-element pl-e-first">
                        <div class="pl-e-icon-w" title="{{ __('Lični podaci') }}">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <div class="pl-element pl-e-second">
                        <div class="pl-e-icon-w" title="{{ __('Mjesto boravišta') }}">
                            <i class="fas fa-map-pin"></i>
                        </div>
                    </div>
                    <div class="pl-element pl-e-forth">
                        <div class="pl-e-icon-w" title="{{ __('Zahtjev poslan') }}">
                            <i class="fas fa-check"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rf-f-body">
                <div class="rf-body-element rf-body-element-1 ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Ime i prezime'))->for('name')->class('bold') }}
                                {{ html()->text('name')->class('form-control form-control-sm mt-2')->maxlength(100)->value('John Doe') }}
                                <small id="nameHelp" class="form-text text-muted">{{ __('Unesite Vaše ime prezime') }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Email adresa'))->for('email')->class('bold') }}
                                {{ html()->email('email')->class('form-control form-control-sm mt-2')->maxlength(50)->value('john@doe.com') }}
                                <small id="emailHelp" class="form-text text-muted">{{ __('Unesite Vašu email adresu') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Šifra'))->for('password')->class('bold') }}
                                {{ html()->password('password')->class('form-control form-control-sm mt-2')->value('password') }}
                                <small id="passwordHelp" class="form-text text-muted">{{ __('Unesite Vašu korisničku šifru') }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="c-bootstrap-field">
                                {{ html()->label(__('Broj telefona'))->for('phone')->class('bold') }}

                                <div class="input-elements">
                                    {{ html()->select('prefix', $prefixes, '21')->class('form-control form-control-sm mt-1 w-80 mr-10') }}
                                    {{ html()->number('phone')->class('form-control form-control-sm mt-1')->maxlength(13)->value('62225883') }}
                                </div>
                                <small id="prefixHelp" class="form-text text-muted"> {{ __('Unesite Vaš broj telefona') }} </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Datum rođenja'))->for('birth_date')->class('bold') }}
                                {{ html()->text('birth_date')->class('form-control form-control-sm mt-2 datepicker')->maxlength('10')->value('01.01.2000') }}
                                <small id="birth_dateHelp" class="form-text text-muted">{{ __('Unesite Vaš datum rođenja') }}</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rf-body-element rf-body-element-2 d-none">
                    <div class="row">
                        <div class="col-md-6">
                            {{ html()->label(__('Adresa stanovanja'))->for('address')->class('bold') }}
                            {{ html()->text('address')->class('form-control form-control-sm mt-2')->maxlength('100')->value('Jonhs address') }}
                            <small id="addressHelp" class="form-text text-muted">{{ __('Vaša adresa stanovanja') }}</small>
                        </div>
                        <div class="col-md-6">
                            {{ html()->label(__('Grad'))->for('city')->class('bold') }}
                            {{ html()->text('city')->class('form-control form-control-sm mt-2')->maxlength('50')->value('New York') }}
                            <small id="living_placeHelp" class="form-text text-muted">{{ __('Grad u kojem trenutno živite') }}</small>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Država'))->for('country')->class('bold') }}
                                {{ html()->select('country', $countries, 21)->class('form-control form-control-sm mt-2')->options([]) }}
                                <small id="countryHelp" class="form-text text-muted"> {{ __('Odaberite državu u kojoj trenutno živite') }} </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rf-body-element rf-body-element-4 pb-4 d-none">
                    <p>
                        {{ __('Vaš korisnički račun / profil je uspješno kreiran. Za verifikaciju Vašeg email-a, molimo slijedite upute poslane putem email-a.') }}
                        <br>
                        <b>{{ __('Napomena:') }}</b>
                        {{ __('Ukoliko ne dobijete email unutar 5 minuta, provjerite junk (spam) folder, ili nas kontaktirajte putem email-a!') }}
                    </p>
                </div>

                <div class="row mt-3 pt-4 pb-4 back-next-btn-wrapper">
                    <div class="col-md-12 d-flex justify-content-end">
                        <div class="button-wrapper create-profile-back-btn d-none">
                            <b>{{__('Nazad')}}</b>
                        </div>
                        <div class="button-wrapper create-profile-next-btn">
                            <b>{{__('Sljedeći korak')}}</b>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row pt-4">
                    <div class="col-md-12">
                        {{ __('Imate kreiran račun?') }} <a href="{{ route('auth') }}"><b>{{ __('Prijavite se') }}</b></a>
                    </div>
                </div>
{{--                {{ html()->form('POST', route('auth.save-account'))->open() }}--}}
{{--                {{ html()->form()->close() }}--}}
            </div>
        </div>
    </div>
</div>
</body>
</html>
