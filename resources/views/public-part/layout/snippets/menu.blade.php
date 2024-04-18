<header class="header">
    <div class="header__container">
        <a href="{{ route('public-part.home') }}" class="header__logo">
            <img src="{{ asset('files/images/public-part/logo.svg') }}" alt="Talent Akademija" class="header__logo-image">
        </a>
        <div class="header__auth-buttons">
            @if(Auth()->check())
                @if(Auth()->user()->role == 'admin')
                    <a href="{{ route('system.home') }}" class="header__auth-button header__auth-button--outlined"><img src="{{ asset('files/images/public-part/login.svg') }}" alt="Login"><span>{{ __('Moj račun') }}</span></a>
                @else
                    <a href="{{ route('dashboard.my-profile') }}" class="header__auth-button header__auth-button--outlined"><img src="{{ asset('files/images/public-part/login.svg') }}" alt="Login"><span>{{ __('Moj račun') }}</span></a>
                @endif
                <a href="{{ route('dashboard.sing-out') }}" class="header__auth-button header__auth-button--contained">{{ __('Odjavi se') }}</a>
            @else
                <a href="{{ route('auth') }}" class="header__auth-button header__auth-button--outlined"><img src="{{ asset('files/images/public-part/login.svg') }}" alt="Login"><span>{{ __('Log in') }}</span></a>
                <a href="{{ route('auth.create-account') }}" class="header__auth-button header__auth-button--contained">{{ __('Registruj se') }}</a>
            @endif
        </div>
        <div class="header__mobile-menu-button">
            <img src="{{ asset('files/images/public-part/mobile-menu-button.svg') }}" alt="Mobile menu button">
        </div>
    </div>

    <div class="header__links">
        <a href="#">{{ __('Programi') }}</a>
        <a href="{{ route('public-part.lecturers.lecturers') }}">{{ __('Predavači') }}</a>
        <a href="#">{{ __('Stipendije') }}</a>
        <a href="#">{{ __('Blog') }}</a>
        <a href="{{ route('public-part.locations.locations') }}">{{ __('Lokacije') }}</a>
        <a class="show-header-submenu">
            {{ __('Programi akademije') }}
            <i class="fas fa-chevron-down"></i>
        </a>
    </div>

    <div class="header__submenu">
        <a href="{{ route('public-part.programs.preview') }}">
            <div class="header__submenu_elem">
                <img src="{{ asset('files/images/public-part/writing.svg') }}" alt="">
                <p>{{ __('Novinarstvo i društvene mreže') }}</p>
            </div>
        </a>
        <a href="">
            <div class="header__submenu_elem">
                <img src="{{ asset('files/images/public-part/civic.svg') }}" alt="">
                <p>{{ __('Pisanje za 21. stoljeće') }}</p>
            </div>
        </a>
        <a href="">
            <div class="header__submenu_elem">
                <img src="{{ asset('files/images/public-part/socal.svg') }}" alt="">
                <p>{{ __('Odgovorno kodiranje i Civic Tech') }}</p>
            </div>
        </a>
        <a href="">
            <div class="header__submenu_elem">
                <img src="{{ asset('files/images/public-part/design.svg') }}" alt="">
                <p>{{ __('Grafički dizajn animacija') }}</p>
            </div>
        </a>
        <a href="">
            <div class="header__submenu_elem">
                <img src="{{ asset('files/images/public-part/music.svg') }}" alt="">
                <p>{{ __('Primijenjena muzička produkcija') }}</p>
            </div>
        </a>
    </div>
</header>
