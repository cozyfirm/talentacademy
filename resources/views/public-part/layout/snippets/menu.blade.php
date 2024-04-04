<header class="header">
    <div class="header__container">
        <a href="#" class="header__logo">
            <img src="/files/images/public-part/logo.svg" alt="Talent Akademija" class="header__logo-image">
        </a>
        <div class="header__auth-buttons">
            <a href="#" class="header__auth-button header__auth-button--outlined"><img src="/files/images/public-part/login.svg" alt="Login"><span>Log in</span></a>
            <a href="#" class="header__auth-button header__auth-button--contained">Registruj se</a>
        </div>
        <div class="header__mobile-menu-button">
            <img src="/files/images/public-part/mobile-menu-button.svg" alt="Mobile menu button">
        </div>
    </div>

    <div class="header__links">
        <a href="#">{{ __('Programi') }}</a>
        <a href="#">{{ __('Predavači') }}</a>
        <a href="#">{{ __('Stipendije') }}</a>
        <a href="#">{{ __('Blog') }}</a>
        <a href="#">{{ __('Lokacije') }}</a>
        <a href="#">
            {{ __('Programi akademije') }}
            <i class="fas fa-chevron-down"></i>
        </a>
    </div>

    <div class="header__submenu">
        <a href="">
            <div class="header__submenu_elem">
                <img src="{{ asset('files/images/public-part/programs-1.svg') }}" alt="">
                <p>{{ __('Novinarstvo i društvene mreže') }}</p>
            </div>
        </a>
        <a href="">
            <div class="header__submenu_elem">
                <img src="{{ asset('files/images/public-part/programs-1.svg') }}" alt="">
                <p>{{ __('Pisanje za 21. stoljeće') }}</p>
            </div>
        </a>
        <a href="">
            <div class="header__submenu_elem">
                <img src="{{ asset('files/images/public-part/programs-1.svg') }}" alt="">
                <p>{{ __('Odgovorno kodiranje i Civic Tech') }}</p>
            </div>
        </a>
        <a href="">
            <div class="header__submenu_elem">
                <img src="{{ asset('files/images/public-part/programs-1.svg') }}" alt="">
                <p>{{ __('Grafički dizajn animacija') }}</p>
            </div>
        </a>
        <a href="">
            <div class="header__submenu_elem">
                <img src="{{ asset('files/images/public-part/programs-1.svg') }}" alt="">
                <p>{{ __('Primijenjena muzička produkcija') }}</p>
            </div>
        </a>
    </div>
</header>
