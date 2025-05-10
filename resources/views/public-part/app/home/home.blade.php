@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <div class="hero-section">
        <div class="hero-section__container">
            <div class="hero-section__upper-section">
                <div class="hero-section__upper-section-text">
                    {{ __('02 - 10. Avgust 2025. - Sarajevo') }}
                </div>
                <div class="hero-section__upper-section-avatars-container">
                    <div class="hero-section__upper__lecturers ">
                        <div class="hero-section__upper-section-avatars">
                            @foreach($lecturers as $lecturer)
                                <div class="hero-section__upper-section-avatar">
                                    <img src="{{ asset('files/images/public-part/users/' . ($lecturer->photo_uri)) }}" alt="Avatar">
                                </div>
                            @endforeach
                        </div>
                        <div class="hero-section__upper-section-lecturers-count">
                            {{ __('50+ predavača') }}
                        </div>
                    </div>
                    <div class="hero-section__upper__days faded">
                        <h4>
                            <span>{{ $daysTill }}</span>
                            @if($appTimePassed)
                                Dana do početka Akademije!!!
                            @else
                                Dana do kraja roka za upis na Akademiju!!!
                            @endif
                        </h4>
                    </div>
                </div>
            </div>
            <div class="hero-section__arrows">
                <img src="{{ asset('files/images/public-part/hnta_d.png') }}" alt="Arrow" class="hero-section__arrow hero-section__arrow_d">
                <img src="{{ asset('files/images/public-part/hnta--03- mob.svg') }}" alt="Arrow" class="hero-section__arrow hero-section__arrow_m">
{{--                <img src="{{ asset('files/images/public-part/arrow.svg') }}" alt="Arrow" class="hero-section__arrow">--}}
{{--                <img src="{{ asset('files/images/public-part/arrow.svg') }}" alt="Arrow" class="hero-section__arrow">--}}
{{--                <img src="{{ asset('files/images/public-part/arrow.svg') }}" alt="Arrow" class="hero-section__arrow">--}}
            </div>
            <div class="hero__heading">
                <div class="boris_wrapper">
                    <h2 class="hero-section__heading"> {{ __('Helem Nejse Talent Akademija') }} </h2>
                    <div class="hero-section__subheading">{{ __('Sedmodnevna ljetna škola iz oblasti kreativnih industrija u Sarajevu!') }}</div>
                </div>
                @if(auth()->check())
                    <a href="{{ route('dashboard.my-profile') }}" class="hero-section__bottom-section-button">
                        {{ __('Apliciraj za stipendiju') }}
                    </a>
                @else
                    <a href="{{ route('auth.create-account') }}" class="hero-section__bottom-section-button">
                        {{ __('Apliciraj za stipendiju') }}
                    </a>
                @endif
            </div>
            <div class="hero-section__bottom-section">
                <div class="hero-section__bottom-section-text">
                    {{ __('Početak 02. augusta 2025. godine!') }}
                </div>

                <a href="#features" class="hero-section__bottom-section-learn-more">
                    {{ __('Saznaj više!') }}
                    <img src="{{ asset('files/images/public-part/down-icon.svg') }}" alt="Down icon">
                </a>
            </div>
        </div>
    </div>

    <!-- Blog section; Scroll-bar lattest news -->
    @include('public-part.app.base-includes.blog.blog_scroll')

    <div class="features" id="features">
        <div class="features__container">
            <div class="features__content">
                <h2 class="features__heading">{{ __('Proširi svoja znanja i napravi prvi korak prema budućoj karijeri') }}</h2>
                <p class="features__text">{{ __('Kroz sedmodnevni program Akademije, uz učešće preko 50 predavača iz oblasti književnosti, informacionih tehnologija, dizajna, animacije, novinarstva i muzičke produkcije pomažemo vam u razvoju vaših vještina i pružamo vam stvarni uvid u svijet kreativnih industrija.') }}</p>
                <a href="#programs" class="features__button">
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
                <h2 class="features__heading">{{ __('Posjete studijima, redakcijama i firmama') }}</h2>
                <p class="features__text">{{ __('Pored teoretskih predavanja, polaznici Akademije imaju priliku slušati iskustva i razgovarati s etabliranim profesionalcima iz industrije, raditi praktične radove i posjetiti muzičke studije, novinarske redakcije svih vrsta, moderno opremljene univerzitetske prostorije, te neke od najuspješnijih regionalnih firmi.') }}</p>
                <a href="{{ route('public-part.locations.locations') }}" class="features__button">
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
                <h2 class="features__heading">{{ __('Kritičko mišljenje') }}</h2>
                <p class="features__text">{{ __('Pored pet programa Akademiji, svi polaznici slušaju i šesti program nazvan Kritičko mišljenje koji stavlja akcenat na vezu između kreativnih industrija i građanskog aktivizma, spajanja tehnologije i umjetnosti, te stvaranju boljeg društva i zajednice.') }}</p>
                <a href="{{ route('public-part.critical-thinking') }}" class="features__button">
                    <img src="{{ asset('files/images/public-part/twisted-arrow.svg') }}" alt="Twisted arrow">
                    {{ __('Više') }}
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
{{--    <div class="how-to-apply">--}}
{{--        @include('public-part.app.base-includes.generic.how-to-apply')--}}
{{--    </div>--}}

    @include('public-part.app.base-includes.snake.snake')



    <!-- FAQ section -->
    @include('public-part.app.base-includes.generic.faq')

    <div class="locations__slider_wrapper">
        <div class="locations__slider_inner">
            <div class="locations__slider_header">
                <h2>{{ __('Lokacije') }}</h2>
            </div>

            <div class="preview__locations_body">
                @foreach($locations as $location)
                    <div class="single_location">
                        <div class="upper_w">
                            <div class="img_wrapper">
                                <img src="{{ asset('files/images/public-part/locations/' . $location->main_img ) }}" alt="Location image" class="single-location__locations-list-item-image">
                            </div>
                            <div class="text_wrapper">
                                <h3> {{ $location->title }} </h3>
                                <p>{{ $location->address }}, {{ $location->city }}</p>
                            </div>
                        </div>

                        <div class="btns_wrapper">
                            <a href="{{ route('public-part.locations.single-location', ['id' => $location->id ]) }}">
                                <div class="btn btn_bcg">
                                    {{ __('Više informacija') }}
                                </div>
                            </a>
                            <a href="{{ $location->city }}" target="_blank">
                                <div class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                        <path d="M12.0001 14.6318C14.2061 14.6318 16.0001 12.8378 16.0001 10.6318C16.0001 8.42584 14.2061 6.63184 12.0001 6.63184C9.79406 6.63184 8.00006 8.42584 8.00006 10.6318C8.00006 12.8378 9.79406 14.6318 12.0001 14.6318ZM12.0001 8.63184C13.1031 8.63184 14.0001 9.52884 14.0001 10.6318C14.0001 11.7348 13.1031 12.6318 12.0001 12.6318C10.8971 12.6318 10.0001 11.7348 10.0001 10.6318C10.0001 9.52884 10.8971 8.63184 12.0001 8.63184Z" fill="#EA8BF3"/>
                                        <path d="M11.4201 22.4458C11.5893 22.5667 11.7921 22.6317 12.0001 22.6317C12.2081 22.6317 12.4108 22.5667 12.5801 22.4458C12.8841 22.2308 20.0291 17.0718 20.0001 10.6318C20.0001 6.22084 16.4111 2.63184 12.0001 2.63184C7.58909 2.63184 4.00009 6.22084 4.00009 10.6268C3.97109 17.0718 11.1161 22.2308 11.4201 22.4458ZM12.0001 4.63184C15.3091 4.63184 18.0001 7.32284 18.0001 10.6368C18.0211 15.0748 13.6121 19.0598 12.0001 20.3668C10.3891 19.0588 5.97909 15.0728 6.00009 10.6318C6.00009 7.32284 8.69109 4.63184 12.0001 4.63184Z" fill="#EA8BF3"/>
                                    </svg>
                                    {{ __('Lokacija') }}
                                </div>
                            </a>
                        </div>

                        <div class="body_w">


                        </div>
                    </div>
                @endforeach
            </div>

            <div class="homepage-locations__navigation">
                <div class="homepage-locations__navigation-arrows">
                    <button class="homepage-locations__navigation-arrow locations__navigation_previous">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                            <path d="M14.293 7.68219L8.58603 13.3892L14.293 19.0962L15.707 17.6822L11.414 13.3892L15.707 9.09619L14.293 7.68219Z" fill="black"/>
                        </svg>
                    </button>
                    <button class="homepage-locations__navigation-arrow locations__navigation_next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                            <path d="M9.70697 17.5815L15.414 11.8745L9.70697 6.16748L8.29297 7.58148L12.586 11.8745L8.29297 16.1675L9.70697 17.5815Z" fill="black"/>
                        </svg>
                    </button>
                </div>
                <a href="{{ route('public-part.locations.locations') }}" class="homepage-locations__navigation-all">
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
