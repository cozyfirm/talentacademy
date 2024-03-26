@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <div class="hero-section">
        <div class="hero-section__container">
            <div class="hero-section__upper-section">
                <div class="hero-section__upper-section-text">
                    02 - 10. Avgust 2024. - Sarajevo
                </div>
                <div class="hero-section__upper-section-avatars-container">
                    <div class="hero-section__upper-section-avatars">
                        <img src="https://100k-faces.glitch.me/random-image" alt="Avatar" class="hero-section__upper-section-avatar">
                        <img src="https://100k-faces.glitch.me/random-image" alt="Avatar" class="hero-section__upper-section-avatar hero-section__upper-section-avatar--translate-left">
                        <img src="https://100k-faces.glitch.me/random-image" alt="Avatar" class="hero-section__upper-section-avatar hero-section__upper-section-avatar--translate-left">
                        <img src="https://100k-faces.glitch.me/random-image" alt="Avatar" class="hero-section__upper-section-avatar hero-section__upper-section-avatar--translate-left">
                    </div>
                    <div class="hero-section__upper-section-lecturers-count">
                        50+ predavača
                    </div>
                </div>
            </div>
            <div class="hero-section__arrows">
                <img src="/files/images/public-part/arrow.svg" alt="Arrow" class="hero-section__arrow">
                <img src="/files/images/public-part/arrow.svg" alt="Arrow" class="hero-section__arrow">
                <img src="/files/images/public-part/arrow.svg" alt="Arrow" class="hero-section__arrow">
                <img src="/files/images/public-part/arrow.svg" alt="Arrow" class="hero-section__arrow">
            </div>
            <h2 class="hero-section__heading">Helem Nejse Talent Akademija</h2>
            <div class="hero-section__subheading">Intenzivni program usavršavanja iz oblasti kreativnih industrija.</div>
            <div class="hero-section__bottom-section">
                <div class="hero-section__bottom-section-text">
                    02 - 10. Avgust 2024. - Sarajevo
                </div>
                <a href="#" class="hero-section__bottom-section-button">
                    Apliciraj za stipendiju
                </a>
                <a href="#" class="hero-section__bottom-section-learn-more">
                    Saznaj više!
                    <img src="/files/images/public-part/down-icon.svg" alt="Down icon">
                </a>
            </div>
        </div>
    </div>
    <div class="features">
        <div class="features__container">
            <div class="features__content">
                <h2 class="features__heading">PROŠIRI SVOJA ZNANJA O KREATIVNIM INDUSTRIJAMA</h2>
                <p class="features__text">Kroz Intenzivni sedmodnevni program Akademije, uz učešće preko 50 predavača, mentora i voditelja radionica koji će sa tobom podijeliti svoje relevantna naučna znanja i iskustva pomažemo razvoju  tvojih vještina i pružamo ti stvarni uvid u svijet kreativnih industrija</p>
                <a href="#" class="features__button">
                    <img src="/files/images/public-part/twisted-arrow.svg" alt="Twisted arrow">
                    Programi Akademije
                </a>
            </div>
            <div class="features__image">
                <img src="/files/images/public-part/features-1.svg" alt="Features image">
            </div>
        </div>
    </div>
    <div class="features features--variant-one">
        <div class="features__container">
            <div class="features__content">
                <h2 class="features__heading">POSJETE STUDIJIMA, REDAKCIJAMA, FIRMAMA...</h2>
                <p class="features__text">Kroz Intenzivni sedmodnevni program Akademije, uz učešće preko 50 predavača, mentora i voditelja radionica koji će sa tobom podijeliti svoje relevantna naučna znanja i iskustva pomažemo razvoju  tvojih vještina i pružamo ti stvarni uvid u svijet kreativnih industrija</p>
                <a href="#" class="features__button">
                    <img src="/files/images/public-part/twisted-arrow.svg" alt="Twisted arrow">
                    Lokacije Akademije
                </a>
            </div>
            <div class="features__image">
                <img src="/files/images/public-part/features-2.svg" alt="Features image">
            </div>
        </div>
    </div>
    <div class="features features--variant-two">
        <div class="features__container">
            <div class="features__content">
                <h2 class="features__heading">STVARANJE BOLJEG DRUŠTVA I ZAJEDNICE</h2>
                <p class="features__text">Kroz Intenzivni sedmodnevni program Akademije, uz učešće preko 50 predavača, mentora i voditelja radionica koji će sa tobom podijeliti svoje relevantna naučna znanja i iskustva pomažemo razvoju  tvojih vještina i pružamo ti stvarni uvid u svijet kreativnih industrija</p>
                <a href="#" class="features__button">
                    <img src="/files/images/public-part/twisted-arrow.svg" alt="Twisted arrow">
                    Predavači
                </a>
            </div>
            <div class="features__image">
                <img src="/files/images/public-part/features-3.svg" alt="Features image">
            </div>
        </div>
    </div>
@endsection
