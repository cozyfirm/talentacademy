@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <div class="hero-section">
        <div class="hero-section__container">
            <div class="hero-section__upper-section">
                <div class="hero-section__upper-section-text">
                    {{ __('02 - 10. Avgust 2024. - Sarajevo') }}
                </div>
                <div class="hero-section__upper-section-avatars-container">
                    <div class="hero-section__upper-section-avatars">
                        <img src="https://100k-faces.glitch.me/random-image" alt="Avatar" class="hero-section__upper-section-avatar">
                        <img src="https://100k-faces.glitch.me/random-image" alt="Avatar" class="hero-section__upper-section-avatar hero-section__upper-section-avatar--translate-left">
                        <img src="https://100k-faces.glitch.me/random-image" alt="Avatar" class="hero-section__upper-section-avatar hero-section__upper-section-avatar--translate-left">
                        <img src="https://100k-faces.glitch.me/random-image" alt="Avatar" class="hero-section__upper-section-avatar hero-section__upper-section-avatar--translate-left">
                    </div>
                    <div class="hero-section__upper-section-lecturers-count">
                        {{ __('50+ predavača') }}
                    </div>
                </div>
            </div>
            <div class="hero-section__arrows">
                <img src="{{ asset('files/images/public-part/arrow.svg') }}" alt="Arrow" class="hero-section__arrow">
                <img src="{{ asset('files/images/public-part/arrow.svg') }}" alt="Arrow" class="hero-section__arrow">
                <img src="{{ asset('files/images/public-part/arrow.svg') }}" alt="Arrow" class="hero-section__arrow">
                <img src="{{ asset('files/images/public-part/arrow.svg') }}" alt="Arrow" class="hero-section__arrow">
            </div>
            <h2 class="hero-section__heading">{{ __('Helem Nejse Talent Akademija') }}</h2>
            <div class="hero-section__subheading">{{ __('Intenzivni program usavršavanja iz oblasti kreativnih industrija.') }}</div>
            <div class="hero-section__bottom-section">
                <div class="hero-section__bottom-section-text">
                    {{ __('02 - 10. Avgust 2024. - Sarajevo') }}
                </div>
                <a href="#" class="hero-section__bottom-section-button">
                    {{ __('Apliciraj za stipendiju') }}
                </a>
                <a href="#" class="hero-section__bottom-section-learn-more">
                    {{ __('Saznaj više!') }}
                    <img src="{{ asset('files/images/public-part/down-icon.svg') }}" alt="Down icon">
                </a>
            </div>
        </div>
    </div>
    <div class="features">
        <div class="features__container">
            <div class="features__content">
                <h2 class="features__heading">{{ __('PROŠIRI SVOJA ZNANJA O KREATIVNIM INDUSTRIJAMA') }}</h2>
                <p class="features__text">{{ __('Kroz Intenzivni sedmodnevni program Akademije, uz učešće preko 50 predavača, mentora i voditelja radionica koji će sa tobom podijeliti svoje relevantna naučna znanja i iskustva pomažemo razvoju  tvojih vještina i pružamo ti stvarni uvid u svijet kreativnih industrija') }}</p>
                <a href="#" class="features__button">
                    <img src="{{ asset('files/images/public-part/twisted-arrow.svg') }}" alt="Twisted arrow">
                    {{ __('Programi Akademije') }}
                </a>
            </div>
            <div class="features__image">
                <img src="{{ asset('files/images/public-part/features-1.svg') }}" alt="Features image">
            </div>
        </div>
    </div>
    <div class="features features--variant-one">
        <div class="features__container">
            <div class="features__content">
                <h2 class="features__heading">{{ __('POSJETE STUDIJIMA, REDAKCIJAMA, FIRMAMA...') }}</h2>
                <p class="features__text">{{ __('Kroz Intenzivni sedmodnevni program Akademije, uz učešće preko 50 predavača, mentora i voditelja radionica koji će sa tobom podijeliti svoje relevantna naučna znanja i iskustva pomažemo razvoju  tvojih vještina i pružamo ti stvarni uvid u svijet kreativnih industrija') }}</p>
                <a href="#" class="features__button">
                    <img src="{{ asset('files/images/public-part/twisted-arrow.svg') }}" alt="Twisted arrow">
                    {{ __('Lokacije Akademije') }}
                </a>
            </div>
            <div class="features__image">
                <img src="{{ asset('files/images/public-part/features-2.svg') }}" alt="Features image">
            </div>
        </div>
    </div>
    <div class="features features--variant-two">
        <div class="features__container">
            <div class="features__content">
                <h2 class="features__heading">{{ __('STVARANJE BOLJEG DRUŠTVA I ZAJEDNICE') }}</h2>
                <p class="features__text">{{ __('Kroz Intenzivni sedmodnevni program Akademije, uz učešće preko 50 predavača, mentora i voditelja radionica koji će sa tobom podijeliti svoje relevantna naučna znanja i iskustva pomažemo razvoju  tvojih vještina i pružamo ti stvarni uvid u svijet kreativnih industrija') }}</p>
                <a href="#" class="features__button">
                    <img src="{{ asset('files/images/public-part/twisted-arrow.svg') }}" alt="Twisted arrow">
                    {{ __('Predavači') }}
                </a>
            </div>
            <div class="features__image">
                <img src="{{ asset('files/images/public-part/features-3.svg') }}" alt="Features image">
            </div>
        </div>
    </div>

    <!-- All 6 programs -->
    @include('public-part.app.base-includes.programs.all')

    <!-- Generic element; How to apply -->
    <div class="how-to-apply">
        @include('public-part.app.base-includes.generic.how-to-apply')
    </div>

    @include('public-part.app.base-includes.snake.snake')

    <!-- Blog section; Scroll-bar lattest news -->
    @include('public-part.app.base-includes.blog.blog_scroll')

    <!-- FAQ section -->
    @include('public-part.app.base-includes.generic.faq')

    <div class="homepage-locations">
        <div class="homepage-locations__container">
            <h2 class="homepage-locations__title">{{ __('Lokacije') }}</h2>
            <div class="homepage-locations__list">
                <div class="homepage-locations__list-item">
                    <img src="{{ asset('files/images/public-part/locations-image-1.jpeg') }}" alt="Location image" class="homepage-locations__list-item-image">
                    <h3 class="homepage-locations__list-item-heading">Austrijska Kuća</h3>
                    <p class="homepage-locations__list-item-address">Zelenih beretki, Sarajevo</p>
                    <div class="homepage-locations__list-item-buttons">
                        <a href="#" class="homepage-locations__list-item-button">{{ __('Više informacija') }}</a>
                        <a href="#" class="homepage-locations__list-item-button homepage-locations__list-item-button--outlined ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                <path d="M12.0001 14.6318C14.2061 14.6318 16.0001 12.8378 16.0001 10.6318C16.0001 8.42584 14.2061 6.63184 12.0001 6.63184C9.79406 6.63184 8.00006 8.42584 8.00006 10.6318C8.00006 12.8378 9.79406 14.6318 12.0001 14.6318ZM12.0001 8.63184C13.1031 8.63184 14.0001 9.52884 14.0001 10.6318C14.0001 11.7348 13.1031 12.6318 12.0001 12.6318C10.8971 12.6318 10.0001 11.7348 10.0001 10.6318C10.0001 9.52884 10.8971 8.63184 12.0001 8.63184Z" fill="#EA8BF3"/>
                                <path d="M11.4201 22.4458C11.5893 22.5667 11.7921 22.6317 12.0001 22.6317C12.2081 22.6317 12.4108 22.5667 12.5801 22.4458C12.8841 22.2308 20.0291 17.0718 20.0001 10.6318C20.0001 6.22084 16.4111 2.63184 12.0001 2.63184C7.58909 2.63184 4.00009 6.22084 4.00009 10.6268C3.97109 17.0718 11.1161 22.2308 11.4201 22.4458ZM12.0001 4.63184C15.3091 4.63184 18.0001 7.32284 18.0001 10.6368C18.0211 15.0748 13.6121 19.0598 12.0001 20.3668C10.3891 19.0588 5.97909 15.0728 6.00009 10.6318C6.00009 7.32284 8.69109 4.63184 12.0001 4.63184Z" fill="#EA8BF3"/>
                            </svg>
                            {{ __('Lokacija') }}
                        </a>
                    </div>
                </div>
                <div class="homepage-locations__list-item">
                    <img src="{{ asset('files/images/public-part/locations-image-1.jpeg') }}" alt="Location image" class="homepage-locations__list-item-image">
                    <h3 class="homepage-locations__list-item-heading">Austrijska Kuća</h3>
                    <p class="homepage-locations__list-item-address">Zelenih beretki, Sarajevo</p>
                    <div class="homepage-locations__list-item-buttons">
                        <a href="#" class="homepage-locations__list-item-button">{{ __('Više informacija') }}</a>
                        <a href="#" class="homepage-locations__list-item-button homepage-locations__list-item-button--outlined ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                <path d="M12.0001 14.6318C14.2061 14.6318 16.0001 12.8378 16.0001 10.6318C16.0001 8.42584 14.2061 6.63184 12.0001 6.63184C9.79406 6.63184 8.00006 8.42584 8.00006 10.6318C8.00006 12.8378 9.79406 14.6318 12.0001 14.6318ZM12.0001 8.63184C13.1031 8.63184 14.0001 9.52884 14.0001 10.6318C14.0001 11.7348 13.1031 12.6318 12.0001 12.6318C10.8971 12.6318 10.0001 11.7348 10.0001 10.6318C10.0001 9.52884 10.8971 8.63184 12.0001 8.63184Z" fill="#EA8BF3"/>
                                <path d="M11.4201 22.4458C11.5893 22.5667 11.7921 22.6317 12.0001 22.6317C12.2081 22.6317 12.4108 22.5667 12.5801 22.4458C12.8841 22.2308 20.0291 17.0718 20.0001 10.6318C20.0001 6.22084 16.4111 2.63184 12.0001 2.63184C7.58909 2.63184 4.00009 6.22084 4.00009 10.6268C3.97109 17.0718 11.1161 22.2308 11.4201 22.4458ZM12.0001 4.63184C15.3091 4.63184 18.0001 7.32284 18.0001 10.6368C18.0211 15.0748 13.6121 19.0598 12.0001 20.3668C10.3891 19.0588 5.97909 15.0728 6.00009 10.6318C6.00009 7.32284 8.69109 4.63184 12.0001 4.63184Z" fill="#EA8BF3"/>
                            </svg>
                            {{ __('Lokacija') }}
                        </a>
                    </div>
                </div>
                <div class="homepage-locations__list-item">
                    <img src="{{ asset('files/images/public-part/locations-image-1.jpeg') }}" alt="Location image" class="homepage-locations__list-item-image">
                    <h3 class="homepage-locations__list-item-heading">Austrijska Kuća</h3>
                    <p class="homepage-locations__list-item-address">Zelenih beretki, Sarajevo</p>
                    <div class="homepage-locations__list-item-buttons">
                        <a href="#" class="homepage-locations__list-item-button">{{ __('Više informacija') }}</a>
                        <a href="#" class="homepage-locations__list-item-button homepage-locations__list-item-button--outlined ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                <path d="M12.0001 14.6318C14.2061 14.6318 16.0001 12.8378 16.0001 10.6318C16.0001 8.42584 14.2061 6.63184 12.0001 6.63184C9.79406 6.63184 8.00006 8.42584 8.00006 10.6318C8.00006 12.8378 9.79406 14.6318 12.0001 14.6318ZM12.0001 8.63184C13.1031 8.63184 14.0001 9.52884 14.0001 10.6318C14.0001 11.7348 13.1031 12.6318 12.0001 12.6318C10.8971 12.6318 10.0001 11.7348 10.0001 10.6318C10.0001 9.52884 10.8971 8.63184 12.0001 8.63184Z" fill="#EA8BF3"/>
                                <path d="M11.4201 22.4458C11.5893 22.5667 11.7921 22.6317 12.0001 22.6317C12.2081 22.6317 12.4108 22.5667 12.5801 22.4458C12.8841 22.2308 20.0291 17.0718 20.0001 10.6318C20.0001 6.22084 16.4111 2.63184 12.0001 2.63184C7.58909 2.63184 4.00009 6.22084 4.00009 10.6268C3.97109 17.0718 11.1161 22.2308 11.4201 22.4458ZM12.0001 4.63184C15.3091 4.63184 18.0001 7.32284 18.0001 10.6368C18.0211 15.0748 13.6121 19.0598 12.0001 20.3668C10.3891 19.0588 5.97909 15.0728 6.00009 10.6318C6.00009 7.32284 8.69109 4.63184 12.0001 4.63184Z" fill="#EA8BF3"/>
                            </svg>
                            {{ __('Lokacija') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="homepage-locations__navigation">
                <div class="homepage-locations__navigation-arrows">
                    <button class="homepage-locations__navigation-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                            <path d="M14.293 7.68219L8.58603 13.3892L14.293 19.0962L15.707 17.6822L11.414 13.3892L15.707 9.09619L14.293 7.68219Z" fill="black"/>
                        </svg>
                    </button>
                    <button class="homepage-locations__navigation-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                            <path d="M9.70697 17.5815L15.414 11.8745L9.70697 6.16748L8.29297 7.58148L12.586 11.8745L8.29297 16.1675L9.70697 17.5815Z" fill="black"/>
                        </svg>
                    </button>
                </div>
                <a href="#" class="homepage-locations__navigation-all">
                    {{ __('Sve lokacije') }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                        <path d="M3.00006 13.6319L17.5861 13.6319L12.2931 18.9249L13.7071 20.3389L21.4141 12.6319L13.7071 4.92487L12.2931 6.33887L17.5861 11.6319L3.00006 11.6319V13.6319Z" fill="#EA8BF3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Contact us form -->
    <div class="contact-us">
        @include('public-part.app.base-includes.generic.contact-us')
    </div>
@endsection
