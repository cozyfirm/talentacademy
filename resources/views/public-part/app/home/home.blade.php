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
    <div class="programs">
        <div class="programs__container">
            <h2 class="programs__heading">{{ __('Programi') }}</h2>
            <div class="programs__content">
                <a href="#" class="programs__program">
                    <img src="{{ asset('files/images/public-part/programs-1.svg') }}" alt="{{ __('Programs image #1') }}" class="programs__program-image">
                    <h3 class="programs__program-heading">{{ __('Pisanje za 21. stoljeće') }}</h3>
                    <img src="{{ asset('files/images/public-part/programs-icon.svg') }}" alt="{{ __('Programs icon') }}" class="programs__program-icon">
                </a>
                <a href="#" class="programs__program">
                    <img src="{{ asset('/files/images/public-part/programs-2.svg') }}" alt="{{ __('Programs image #2') }}" class="programs__program-image">
                    <h3 class="programs__program-heading">{{ __('Novinarstvo i društvene mreže') }}</h3>
                    <img src="{{ asset('/files/images/public-part/programs-icon.svg') }}" alt="{{ __('Programs icon') }}" class="programs__program-icon">
                </a>
                <a href="#" class="programs__program">
                    <img src="{{ asset('/files/images/public-part/programs-3.svg') }}" alt="{{ __('Programs image #3') }}" class="programs__program-image">
                    <h3 class="programs__program-heading">{{ __('Primijenjena muzička produkcija') }}</h3>
                    <img src="{{ asset('/files/images/public-part/programs-icon.svg') }}" alt="{{ __('Programs icon') }}" class="programs__program-icon">
                </a>
                <a href="#" class="programs__program">
                    <img src="{{ asset('/files/images/public-part/programs-4.svg') }}" alt="{{ __('Programs image #4') }}" class="programs__program-image">
                    <h3 class="programs__program-heading">{{ __('Odgovorno kodiranje i Civic Tech') }}</h3>
                    <img src="{{ asset('/files/images/public-part/programs-icon.svg') }}" alt="{{ __('Programs icon') }}" class="programs__program-icon">
                </a>
                <a href="#" class="programs__program">
                    <img src="{{ asset('/files/images/public-part/programs-5.svg') }}" alt="{{ __('Programs image #5') }}" class="programs__program-image">
                    <h3 class="programs__program-heading">{{ __('Grafički dizajn i animacija') }}</h3>
                    <img src="{{ asset('/files/images/public-part/programs-icon.svg') }}" alt="{{ __('Programs icon') }}" class="programs__program-icon">
                </a>
                <a href="#" class="programs__program">
                    <img src="{{ asset('/files/images/public-part/programs-6.svg') }}" alt="{{ __('Programs image #6') }}" class="programs__program-image">
                    <h3 class="programs__program-heading">{{ __('Angažovani rad  i kritičko razmišljanje') }}</h3>
                    <img src="{{ asset('/files/images/public-part/programs-icon.svg') }}" alt="{{ __('Programs icon') }}" class="programs__program-icon">
                </a>
            </div>
        </div>
    </div>
    <div class="how-to-apply">
        <div class="how-to-apply__container">
            <h2 class="how-to-apply__heading">{{ __('Kako aplicirati?') }}</h2>
            <div class="how-to-apply__step">
                <img src="{{ asset('/files/images/public-part/how-to-apply.svg') }}" alt="{{ __('How to apply image') }}" class="how-to-apply__step-image">
                <div class="how-to-apply__step-content">
                    <h3 class="how-to-apply__step-heading">{{ __('Upis na akademiju') }}</h3>
                    <p class="how-to-apply__step-text">{{ __('Edukativni program Helem Nejse talent akademije naglašava i važnost kritičkog mišljenja za relevantno i seriozno djelovanje u kreativnim industrijama današnjice. Angažovani rad i kritičko razmišljanje je šesti program Akademije i jedini je program akademije koji prate svi polaznici svih odsjeka akademije.') }}</p>
                </div>
            </div>
            <div class="how-to-apply__pagination">
                <div class="how-to-apply__pagination-item how-to-apply__pagination-item--active">1</div>
                <div class="how-to-apply__pagination-item">2</div>
                <div class="how-to-apply__pagination-item">3</div>
                <div class="how-to-apply__pagination-item">4</div>
            </div>
        </div>
    </div>
    <div class="snake">
        <img src="{{ asset('/files/images/public-part/snake-desktop.svg') }}" alt="{{ __('Snake') }}" class="snake__image">
        <img src="{{ asset('/files/images/public-part/snake-mobile.svg') }}" alt="{{ __('Snake mobile') }}" class="snake__image snake__image--mobile">
    </div>
    <div class="news">
        <div class="news__container">
            <div class="news__title-container">
                <h2 class="news__title">{{ __('Vijesti') }}</h2>
                <a href="#" class="news__all-news-button">{{ __('Sve vijesti') }}</a>
            </div>
            <div class="news__list">
                <div class="news__list-item">
                    <img src="{{ asset('/files/images/public-part/news-image-1.jpeg') }}" alt="{{ __('News image') }}" class="news__list-item-image">
                    <div class="news__list-item-info">
                        <a href="#" class="news__list-item-info-category">{{ __('Pisanje za 21. stoljeće') }}</a>
                        <div class="news__list-item-info-reading-time">2 min</div>
                    </div>
                    <h2 class="news__list-item-heading">{{ __('JUS project na hnta') }}</h2>
                    <p class="news__list-item-content">{{ __('Lorem ipsum dolor sit amet consectetur. Rhoncus at quis faucibus magna augue. Ipsum duis aliquet mauris facilisis mattis pellentesque quis non proin. Viverra sapien scelerisque suscipit proin. Sit massa feugiat ultrices diam eu.') }}</p>
                </div>
                <div class="news__list-item">
                    <img src="{{ asset('/files/images/public-part/news-image-1.jpeg') }}" alt="{{ __('News image') }}" class="news__list-item-image">
                    <div class="news__list-item-info">
                        <a href="#" class="news__list-item-info-category">{{ __('Pisanje za 21. stoljeće') }}</a>
                        <div class="news__list-item-info-reading-time">2 min</div>
                    </div>
                    <h2 class="news__list-item-heading">{{ __('JUS project na hnta') }}</h2>
                    <p class="news__list-item-content">{{ __('Lorem ipsum dolor sit amet consectetur. Rhoncus at quis faucibus magna augue. Ipsum duis aliquet mauris facilisis mattis pellentesque quis non proin. Viverra sapien scelerisque suscipit proin. Sit massa feugiat ultrices diam eu.') }}</p>
                </div>
                <div class="news__list-item">
                    <img src="{{ asset('/files/images/public-part/news-image-1.jpeg') }}" alt="{{ __('News image') }}" class="news__list-item-image">
                    <div class="news__list-item-info">
                        <a href="#" class="news__list-item-info-category">{{ __('Pisanje za 21. stoljeće') }}</a>
                        <div class="news__list-item-info-reading-time">2 min</div>
                    </div>
                    <h2 class="news__list-item-heading">{{ __('JUS project na hnta') }}</h2>
                    <p class="news__list-item-content">{{ __('Lorem ipsum dolor sit amet consectetur. Rhoncus at quis faucibus magna augue. Ipsum duis aliquet mauris facilisis mattis pellentesque quis non proin. Viverra sapien scelerisque suscipit proin. Sit massa feugiat ultrices diam eu.') }}</p>
                </div>
            </div>
            <div class="news__navigation">
                <div class="news__navigation-dots">
                    <div class="news__navigation-dot"></div>
                    <div class="news__navigation-dot"></div>
                    <div class="news__navigation-dot"></div>
                    <div class="news__navigation-dot"></div>
                    <div class="news__navigation-dot"></div>
                    <div class="news__navigation-dot"></div>
                </div>
                <div class="news__navigation-buttons">
                    <button class="news__navigation-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="16" viewBox="0 0 34 16" fill="none">
                            <path d="M9.32 5.0516L1 9.77621L9.32 14.06M9.32 9.93879C11.0656 10.0969 10.958 9.96669 12.7084 10.1248C13.2561 10.1759 13.8184 10.2224 14.3415 10.0643C14.9723 9.87369 15.4661 9.40871 15.9306 8.95768C18.6835 6.26079 19.9009 4.31717 22.4582 1.44824C21.5829 5.79116 18.8693 12.8589 18.8693 12.8589H33" stroke="#070600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button class="news__navigation-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="16" viewBox="0 0 34 16" fill="none">
                            <path d="M24.68 5.0516L33 9.77621L24.68 14.06M24.68 9.93879C22.9344 10.0969 23.042 9.96669 21.2916 10.1248C20.7439 10.1759 20.1816 10.2224 19.6585 10.0643C19.0277 9.87369 18.5339 9.40871 18.0694 8.95768C15.3165 6.26079 14.0991 4.31717 11.5418 1.44824C12.4171 5.79116 15.1307 12.8589 15.1307 12.8589H0.999999" stroke="#070600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="faq">
        <div class="faq__container">
            <h2 class="faq__title">{{ __('FAQs') }}</h2>
            <p class="faq__description">{{ __('Lorem ipsum dolor sit amet consectetur. Rhoncus at quis faucibus magna augue. Ipsum duis aliquet mauris facilisis mattis pellentesque quis non proin. Viverra sapien scelerisque suscipit proin. Sit massa feugiat ultrices diam eu.') }}</p>
            <div class="faq__list">
                <div class="faq__list-item">
                    <div class="faq__list-item-question">{{ __('Ko sve može aplicirati za Helem nejse Talent Akademiju?') }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5303 21.5157C16.2374 21.8086 15.7626 21.8086 15.4697 21.5157L7.82318 13.8692C7.53029 13.5763 7.53029 13.1015 7.82318 12.8086L8.17674 12.455C8.46963 12.1621 8.9445 12.1621 9.2374 12.455L16 19.2176L22.7626 12.455C23.0555 12.1621 23.5303 12.1621 23.8232 12.455L24.1768 12.8086C24.4697 13.1015 24.4697 13.5763 24.1768 13.8692L16.5303 21.5157Z" fill="#070600"/>
                        </svg>
                    </div>
                    <div class="faq__list-item-answer">{{ __('Lorem ipsum dolor sit amet consectetur. Rhoncus at quis faucibus magna augue. Ipsum duis aliquet mauris facilisis mattis pellentesque quis non proin. Viverra sapien scelerisque suscipit proin. Sit massa feugiat ultrices diam eu.') }}</div>
                </div>
                <div class="faq__list-item">
                    <div class="faq__list-item-question">{{ __('Da li se akademija plaća  ili su svi programi akademije besplatni?') }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5303 21.5157C16.2374 21.8086 15.7626 21.8086 15.4697 21.5157L7.82318 13.8692C7.53029 13.5763 7.53029 13.1015 7.82318 12.8086L8.17674 12.455C8.46963 12.1621 8.9445 12.1621 9.2374 12.455L16 19.2176L22.7626 12.455C23.0555 12.1621 23.5303 12.1621 23.8232 12.455L24.1768 12.8086C24.4697 13.1015 24.4697 13.5763 24.1768 13.8692L16.5303 21.5157Z" fill="#070600"/>
                        </svg>
                    </div>
                    <div class="faq__list-item-answer">{{ __('Lorem ipsum dolor sit amet consectetur. Rhoncus at quis faucibus magna augue. Ipsum duis aliquet mauris facilisis mattis pellentesque quis non proin. Viverra sapien scelerisque suscipit proin. Sit massa feugiat ultrices diam eu.') }}</div>
                </div>
                <div class="faq__list-item">
                    <div class="faq__list-item-question">{{ __('Kako mogu ostvariti pravo na učešće na akademiji?') }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5303 21.5157C16.2374 21.8086 15.7626 21.8086 15.4697 21.5157L7.82318 13.8692C7.53029 13.5763 7.53029 13.1015 7.82318 12.8086L8.17674 12.455C8.46963 12.1621 8.9445 12.1621 9.2374 12.455L16 19.2176L22.7626 12.455C23.0555 12.1621 23.5303 12.1621 23.8232 12.455L24.1768 12.8086C24.4697 13.1015 24.4697 13.5763 24.1768 13.8692L16.5303 21.5157Z" fill="#070600"/>
                        </svg>
                    </div>
                    <div class="faq__list-item-answer">{{ __('Lorem ipsum dolor sit amet consectetur. Rhoncus at quis faucibus magna augue. Ipsum duis aliquet mauris facilisis mattis pellentesque quis non proin. Viverra sapien scelerisque suscipit proin. Sit massa feugiat ultrices diam eu.') }}</div>
                </div>
                <div class="faq__list-item">
                    <div class="faq__list-item-question">{{ __('Da li se akademija plaća  ili su svi programi akademije besplatni?') }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5303 21.5157C16.2374 21.8086 15.7626 21.8086 15.4697 21.5157L7.82318 13.8692C7.53029 13.5763 7.53029 13.1015 7.82318 12.8086L8.17674 12.455C8.46963 12.1621 8.9445 12.1621 9.2374 12.455L16 19.2176L22.7626 12.455C23.0555 12.1621 23.5303 12.1621 23.8232 12.455L24.1768 12.8086C24.4697 13.1015 24.4697 13.5763 24.1768 13.8692L16.5303 21.5157Z" fill="#070600"/>
                        </svg>
                    </div>
                    <div class="faq__list-item-answer">{{ __('Lorem ipsum dolor sit amet consectetur. Rhoncus at quis faucibus magna augue. Ipsum duis aliquet mauris facilisis mattis pellentesque quis non proin. Viverra sapien scelerisque suscipit proin. Sit massa feugiat ultrices diam eu.') }}</div>
                </div>
            </div>
        </div>
    </div><div class="locations">
        <div class="locations__container">
            <h2 class="locations__title">{{ __('Lokacije') }}</h2>
            <div class="locations__list">
                <div class="locations__list-item">
                    <img src="{{ asset('files/images/public-part/locations-image-1.jpeg') }}" alt="Location image" class="locations__list-item-image">
                    <h3 class="locations__list-item-heading">Austrijska Kuća</h3>
                    <p class="locations__list-item-address">Zelenih beretki, Sarajevo</p>
                    <div class="locations__list-item-buttons">
                        <a href="#" class="locations__list-item-button">{{ __('Više informacija') }}</a>
                        <a href="#" class="locations__list-item-button locations__list-item-button--outlined ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                <path d="M12.0001 14.6318C14.2061 14.6318 16.0001 12.8378 16.0001 10.6318C16.0001 8.42584 14.2061 6.63184 12.0001 6.63184C9.79406 6.63184 8.00006 8.42584 8.00006 10.6318C8.00006 12.8378 9.79406 14.6318 12.0001 14.6318ZM12.0001 8.63184C13.1031 8.63184 14.0001 9.52884 14.0001 10.6318C14.0001 11.7348 13.1031 12.6318 12.0001 12.6318C10.8971 12.6318 10.0001 11.7348 10.0001 10.6318C10.0001 9.52884 10.8971 8.63184 12.0001 8.63184Z" fill="#EA8BF3"/>
                                <path d="M11.4201 22.4458C11.5893 22.5667 11.7921 22.6317 12.0001 22.6317C12.2081 22.6317 12.4108 22.5667 12.5801 22.4458C12.8841 22.2308 20.0291 17.0718 20.0001 10.6318C20.0001 6.22084 16.4111 2.63184 12.0001 2.63184C7.58909 2.63184 4.00009 6.22084 4.00009 10.6268C3.97109 17.0718 11.1161 22.2308 11.4201 22.4458ZM12.0001 4.63184C15.3091 4.63184 18.0001 7.32284 18.0001 10.6368C18.0211 15.0748 13.6121 19.0598 12.0001 20.3668C10.3891 19.0588 5.97909 15.0728 6.00009 10.6318C6.00009 7.32284 8.69109 4.63184 12.0001 4.63184Z" fill="#EA8BF3"/>
                            </svg>
                            {{ __('Lokacija') }}
                        </a>
                    </div>
                </div>
                <div class="locations__list-item">
                    <img src="{{ asset('files/images/public-part/locations-image-1.jpeg') }}" alt="Location image" class="locations__list-item-image">
                    <h3 class="locations__list-item-heading">Austrijska Kuća</h3>
                    <p class="locations__list-item-address">Zelenih beretki, Sarajevo</p>
                    <div class="locations__list-item-buttons">
                        <a href="#" class="locations__list-item-button">{{ __('Više informacija') }}</a>
                        <a href="#" class="locations__list-item-button locations__list-item-button--outlined ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                <path d="M12.0001 14.6318C14.2061 14.6318 16.0001 12.8378 16.0001 10.6318C16.0001 8.42584 14.2061 6.63184 12.0001 6.63184C9.79406 6.63184 8.00006 8.42584 8.00006 10.6318C8.00006 12.8378 9.79406 14.6318 12.0001 14.6318ZM12.0001 8.63184C13.1031 8.63184 14.0001 9.52884 14.0001 10.6318C14.0001 11.7348 13.1031 12.6318 12.0001 12.6318C10.8971 12.6318 10.0001 11.7348 10.0001 10.6318C10.0001 9.52884 10.8971 8.63184 12.0001 8.63184Z" fill="#EA8BF3"/>
                                <path d="M11.4201 22.4458C11.5893 22.5667 11.7921 22.6317 12.0001 22.6317C12.2081 22.6317 12.4108 22.5667 12.5801 22.4458C12.8841 22.2308 20.0291 17.0718 20.0001 10.6318C20.0001 6.22084 16.4111 2.63184 12.0001 2.63184C7.58909 2.63184 4.00009 6.22084 4.00009 10.6268C3.97109 17.0718 11.1161 22.2308 11.4201 22.4458ZM12.0001 4.63184C15.3091 4.63184 18.0001 7.32284 18.0001 10.6368C18.0211 15.0748 13.6121 19.0598 12.0001 20.3668C10.3891 19.0588 5.97909 15.0728 6.00009 10.6318C6.00009 7.32284 8.69109 4.63184 12.0001 4.63184Z" fill="#EA8BF3"/>
                            </svg>
                            {{ __('Lokacija') }}
                        </a>
                    </div>
                </div>
                <div class="locations__list-item">
                    <img src="{{ asset('files/images/public-part/locations-image-1.jpeg') }}" alt="Location image" class="locations__list-item-image">
                    <h3 class="locations__list-item-heading">Austrijska Kuća</h3>
                    <p class="locations__list-item-address">Zelenih beretki, Sarajevo</p>
                    <div class="locations__list-item-buttons">
                        <a href="#" class="locations__list-item-button">{{ __('Više informacija') }}</a>
                        <a href="#" class="locations__list-item-button locations__list-item-button--outlined ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                <path d="M12.0001 14.6318C14.2061 14.6318 16.0001 12.8378 16.0001 10.6318C16.0001 8.42584 14.2061 6.63184 12.0001 6.63184C9.79406 6.63184 8.00006 8.42584 8.00006 10.6318C8.00006 12.8378 9.79406 14.6318 12.0001 14.6318ZM12.0001 8.63184C13.1031 8.63184 14.0001 9.52884 14.0001 10.6318C14.0001 11.7348 13.1031 12.6318 12.0001 12.6318C10.8971 12.6318 10.0001 11.7348 10.0001 10.6318C10.0001 9.52884 10.8971 8.63184 12.0001 8.63184Z" fill="#EA8BF3"/>
                                <path d="M11.4201 22.4458C11.5893 22.5667 11.7921 22.6317 12.0001 22.6317C12.2081 22.6317 12.4108 22.5667 12.5801 22.4458C12.8841 22.2308 20.0291 17.0718 20.0001 10.6318C20.0001 6.22084 16.4111 2.63184 12.0001 2.63184C7.58909 2.63184 4.00009 6.22084 4.00009 10.6268C3.97109 17.0718 11.1161 22.2308 11.4201 22.4458ZM12.0001 4.63184C15.3091 4.63184 18.0001 7.32284 18.0001 10.6368C18.0211 15.0748 13.6121 19.0598 12.0001 20.3668C10.3891 19.0588 5.97909 15.0728 6.00009 10.6318C6.00009 7.32284 8.69109 4.63184 12.0001 4.63184Z" fill="#EA8BF3"/>
                            </svg>
                            {{ __('Lokacija') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="locations__navigation">
                <div class="locations__navigation-arrows">
                    <button class="locations__navigation-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                            <path d="M14.293 7.68219L8.58603 13.3892L14.293 19.0962L15.707 17.6822L11.414 13.3892L15.707 9.09619L14.293 7.68219Z" fill="black"/>
                        </svg>
                    </button>
                    <button class="locations__navigation-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                            <path d="M9.70697 17.5815L15.414 11.8745L9.70697 6.16748L8.29297 7.58148L12.586 11.8745L8.29297 16.1675L9.70697 17.5815Z" fill="black"/>
                        </svg>
                    </button>
                </div>
                <a href="#" class="locations__navigation-all">
                    {{ __('Sve lokacije') }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                        <path d="M3.00006 13.6319L17.5861 13.6319L12.2931 18.9249L13.7071 20.3389L21.4141 12.6319L13.7071 4.92487L12.2931 6.33887L17.5861 11.6319L3.00006 11.6319V13.6319Z" fill="#EA8BF3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <div class="contact">
        <div class="contact__container">
            <h2 class="contact__title">{{ __('Imate dodatna pitanja?') }}</h2>
            <div class="contact__description">{{ __('Za sva pitanja o ovom studiskom programu ili Akademiji u cjelini molimo vas da koristite ovaj link:') }}</div>
            <form class="contact__form">
                <div class="contact__form-input-container">
                    <label for="name" class="contact__form-label">{{ __('Ime') }}</label>
                    <input type="text" class="contact__form-input" />
                </div>
                <div class="contact__form-input-container">
                    <label for="name" class="contact__form-label">{{ __('Prezime') }}</label>
                    <input type="text" class="contact__form-input" />
                </div>
                <div class="contact__form-input-container">
                    <label for="name" class="contact__form-label">{{ __('Mail') }}</label>
                    <input type="email" class="contact__form-input" />
                </div>
                <div class="contact__form-input-container">
                    <label for="name" class="contact__form-label">{{ __('Program') }}</label>
                    <select class="contact__form-input">
                        <option value="Pisanje za 21. stoljeće">{{ __('Pisanje za 21. stoljeće') }}</option>
                        <option value="Novinarstvo i društvene mreže">{{ __('Novinarstvo i društvene mreže') }}</option>
                        <option value="Primijenjena muzička produkcija">{{ __('Primijenjena muzička produkcija') }}</option>
                        <option value="Odgovorno kodiranje i Civic Tech">{{ __('Odgovorno kodiranje i Civic Tech') }}</option>
                        <option value="Grafički dizajn i animacija">{{ __('Grafički dizajn i animacija') }}</option>
                        <option value="Angažovani rad  i kritičko razmišljanje">{{ __('Angažovani rad  i kritičko razmišljanje') }}</option>
                    </select>
                </div>
                <textarea class="contact__form-textarea">{{ __('Tvoja poruka...') }}</textarea>
                <button class="contact__form-button">{{ __('Pošalji') }}</button>
            </form>
        </div>
    </div>
@endsection
