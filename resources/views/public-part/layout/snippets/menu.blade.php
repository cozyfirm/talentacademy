<header class="header">
    <div class="header__container">
        <a href="{{ route('public-part.home') }}" class="header__logo">
            <img src="{{ asset('files/images/public-part/logo.svg') }}" alt="Talent Akademija" class="header__logo-image">
        </a>
        <div class="header__auth-buttons">
            @if(Auth()->check())
                @if(Auth()->user()->role == 'admin')
                    <a href="{{ route('system.home') }}" class="header__auth-button header__auth-button--outlined"><img src="{{ asset('files/images/public-part/login_2025.svg') }}" alt="Login"><span>{{ __('Moj račun') }}</span></a>
                @else
                    <a href="{{ route('dashboard.my-profile') }}" class="header__auth-button header__auth-button--outlined"><img src="{{ asset('files/images/public-part/login_2025.svg') }}" alt="Login"><span>{{ __('Moj račun') }}</span></a>
                @endif
                <a href="{{ route('dashboard.sing-out') }}" class="header__auth-button header__auth-button--contained">{{ __('Odjavi se') }}</a>
            @else
                <a href="{{ route('auth') }}" class="header__auth-button header__auth-button--outlined"><img src="{{ asset('files/images/public-part/login_2025.svg') }}" alt="Login"><span>{{ __('Log in') }}</span></a>
                <a href="{{ route('auth.create-account') }}" class="header__auth-button header__auth-button--contained">{{ __('Registruj se') }}</a>
            @endif
        </div>
        <div class="header__mobile-menu-button">
            <img src="{{ asset('files/images/public-part/mobile-menu-button.svg') }}" alt="Mobile menu button" id="open-mobile-menu">
        </div>
    </div>

    <div class="header__links">
        <a href="{{ route('public-part.critical-thinking') }}">{{ __('Kritičko mišljenje') }}</a>
        <a href="{{ route('public-part.lecturers.lecturers') }}">{{ __('Predavači') }}</a>
        <a href="{{ route('public-part.scholarship') }}">{{ __('Stipendije') }}</a>
        <a href="{{ route('public-part.blog.blog') }}">{{ __('Blog') }}</a>
        <a href="{{ route('public-part.locations.locations') }}">{{ __('Lokacije') }}</a>
        <a href="{{ route('public-part.archive') }}">{{ __('Arhiva') }}</a>
        <a href="{{ route('public-part.alumni') }}">{{ __('Alumni') }}</a>
        <a class="show-header-submenu">
            {{ __('Programi') }}
            <i class="fas fa-chevron-down"></i>
        </a>
    </div>

    <div class="header__submenu">
        <a href="{{ route('public-part.programs.preview-program', ['id' => 6]) }}">
            <div class="header__submenu_elem">
                <img src="{{ asset('files/images/public-part/2025/writing_svg.svg') }}" alt="{{ __('Programs image #1') }}" class="programs__program-image">
                <p>{{ __('Pisanje komedije') }}</p>
            </div>
        </a>
        <a href="{{ route('public-part.programs.preview-program', ['id' => 7]) }}">
            <div class="header__submenu_elem">
                <img src="{{ asset('/files/images/public-part/2025/jurnalism.svg') }}" alt="{{ __('Programs image #2') }}" class="programs__program-image">
                <p>{{ __('Novinarstvo i dokumentarni film') }}</p>
            </div>
        </a>
        <a href="{{ route('public-part.programs.preview-program', ['id' => 8]) }}">
            <div class="header__submenu_elem">
                <img src="{{ asset('/files/images/public-part/2025/prod.svg') }}" alt="{{ __('Programs image #3') }}" class="programs__program-image">
                <p>{{ __('Primijenjena muzička produkcija') }}</p>
            </div>
        </a>
        <a href="{{ route('public-part.programs.preview-program', ['id' => 9]) }}">
            <div class="header__submenu_elem">
                <img src="{{ asset('/files/images/public-part/2025/coding.svg') }}" alt="{{ __('Programs image #4') }}" class="programs__program-image">
                <p>{{ __('Razvoj računarskih igara') }}</p>
            </div>
        </a>
        <a href="{{ route('public-part.programs.preview-program', ['id' => 10]) }}">
            <div class="header__submenu_elem">
                <img src="{{ asset('/files/images/public-part/2025/graphic_design.svg') }}" alt="{{ __('Programs image #5') }}" class="programs__program-image">
                <p>{{ __('Grafički dizajn i animacija') }}</p>
            </div>
        </a>
    </div>
</header>
<div class="mobile-menu">
    <div class="mobile-menu__header">
        <a href="{{ route('public-part.home') }}" class="mobile-menu__header-logo">
            <img src="{{ asset('files/images/public-part/logo.svg') }}" alt="Talent Akademija" class="header__logo-image">
        </a>
        <img src="{{ asset('files/images/svg-icons/close-menu.svg') }}" alt="Close mobile menu" id="close-mobile-menu">
    </div>
    <div class="mobile-menu__content">
        <a href="{{ route('public-part.critical-thinking') }}" class="mobile-menu__content-link">{{ __('Kritičko mišljenje') }}</a>
        <a href="{{ route('public-part.lecturers.lecturers') }}" class="mobile-menu__content-link">{{ __('Predavači') }}</a>
        <a href="{{ route('public-part.scholarship') }}" class="mobile-menu__content-link">{{ __('Stipendije') }}</a>
        <a href="{{ route('public-part.blog.blog') }}" class="mobile-menu__content-link">{{ __('Blog') }}</a>
        <a href="{{ route('public-part.locations.locations') }}" class="mobile-menu__content-link">{{ __('Lokacije') }}</a>
        <a href="{{ route('public-part.archive') }}" class="mobile-menu__content-link">{{ __('Arhiva') }}</a>
        <a href="{{ route('public-part.alumni') }}" class="mobile-menu__content-link">{{ __('Alumni') }}</a>
        <a class="mobile-menu__content-link" id="open-mobile-submenu">
            {{ __('Programi akademije') }}
            <i class="fas fa-chevron-down"></i>
        </a>
        <div class="mobile-menu__submenu">
            <a href="{{ route('public-part.programs.preview-program', ['id' => 6]) }}">
                <div class="mobile-menu__submenu-item">
                    <img src="{{ asset('files/images/public-part/2025/writing_svg.svg') }}" alt="{{ __('Programs image #1') }}" class="programs__program-image">
                    <p>{{ __('Pisanje komedije') }}</p>
                </div>
            </a>
            <a href="{{ route('public-part.programs.preview-program', ['id' => 7]) }}">
                <div class="mobile-menu__submenu-item">
                    <img src="{{ asset('/files/images/public-part/2025/jurnalism.svg') }}" alt="{{ __('Programs image #2') }}" class="programs__program-image">
                    <p>{{ __('Novinarstvo i dokumentarni film') }}</p>
                </div>
            </a>
            <a href="{{ route('public-part.programs.preview-program', ['id' => 8]) }}">
                <div class="mobile-menu__submenu-item">
                    <img src="{{ asset('/files/images/public-part/2025/prod.svg') }}" alt="{{ __('Programs image #3') }}" class="programs__program-image">
                    <p>{{ __('Primijenjena muzička produkcija') }}</p>
                </div>
            </a>
            <a href="{{ route('public-part.programs.preview-program', ['id' => 9]) }}">
                <div class="mobile-menu__submenu-item">
                    <img src="{{ asset('/files/images/public-part/2025/coding.svg') }}" alt="{{ __('Programs image #4') }}" class="programs__program-image">
                    <p>{{ __('Razvoj računarskih igara') }}</p>
                </div>
            </a>
            <a href="{{ route('public-part.programs.preview-program', ['id' => 10]) }}">
                <div class="mobile-menu__submenu-item">
                    <img src="{{ asset('/files/images/public-part/2025/graphic_design.svg') }}" alt="{{ __('Programs image #5') }}" class="programs__program-image">
                    <p>{{ __('Grafički dizajn i animacija') }}</p>
                </div>
            </a>
        </div>
        <div class="mobile-menu__auth-buttons">
            @if(Auth()->check())
                @if(Auth()->user()->role == 'admin')
                    <a href="{{ route('system.home') }}" class="header__auth-button header__auth-button--outlined"><img src="{{ asset('files/images/public-part/login_2025.svg') }}" alt="Login"><span>{{ __('Moj račun') }}</span></a>
                @else
                    <a href="{{ route('dashboard.my-profile') }}" class="header__auth-button header__auth-button--outlined"><img src="{{ asset('files/images/public-part/login_2025.svg') }}" alt="Login"><span>{{ __('Moj račun') }}</span></a>
                @endif
                <a href="{{ route('dashboard.sing-out') }}" class="header__auth-button header__auth-button--contained">{{ __('Odjavi se') }}</a>
            @else
                <a href="{{ route('auth') }}" class="header__auth-button header__auth-button--outlined"><img src="{{ asset('files/images/public-part/login_2025.svg') }}" alt="Login"><span>{{ __('Log in') }}</span></a>
                <a href="{{ route('auth.create-account') }}" class="header__auth-button header__auth-button--contained">{{ __('Registruj se') }}</a>
            @endif
        </div>
    </div>
</div>

@if(Auth()->check())
    @if(Auth()->user()->role == 'user' or Auth()->user()->role == 'presenter')
        <!-- Dashboard inner menu -->
        @include('public-part.dashboard.includes.inner-menu')
    @endif
@endif
