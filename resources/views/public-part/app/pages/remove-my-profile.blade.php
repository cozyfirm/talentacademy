@extends('public-part.layout.layout')

<!-- Title of page -->
@section('title') {{ __('Lokacije') }} @endsection

<!-- Page content -->
@section('public-content')
    <div class="contact-us">
        <div class="contact__container">
            <h2 class="contact__title">{{ __('Brisanje profila?') }}</h2>
            <div class="contact__description">{{ __('Ukoliko želite brisanje svih vaših podataka molimo vas da koristite ovu formu:') }}</div>
            <form class="contact__form">
                <div class="contact__form-input-container">
                    <label for="name" class="contact__form-label">{{ __('Ime') }}</label>
                    <input type="text" class="contact__form-input" id="contact__form-name" maxlength="50" placeholder="{{ __('Tvoje ime...') }}" />
                </div>
                <div class="contact__form-input-container">
                    <label for="contact__form-surname" class="contact__form-label">{{ __('Prezime') }}</label>
                    <input type="text" class="contact__form-input" id="contact__form-surname" maxlength="50" placeholder="{{ __('Tvoje prezime...') }}" />
                </div>
                <div class="contact__form-input-container w-100">
                    <label for="contact__form-email" class="contact__form-label">{{ __('Mail') }}</label>
                    <input type="email" class="contact__form-input" id="contact__form-email" maxlength="50" placeholder="{{ __('Tvoja email adresa...') }}" />
                </div>
                <div class="contact__form-input-container contact__form-input-container-2">
                    <label for="contact__form-message" class="contact__form-label">{{ __('Poruka') }}</label>
                    <textarea class="contact__form-textarea" id="contact__form-message" maxlength="600" placeholder="{{ __('Tvoja poruka...') }}"></textarea>
                </div>

                <button class="contact__form-button">{{ __('Pošalji') }}</button>
            </form>
        </div>
    </div>
@endsection
