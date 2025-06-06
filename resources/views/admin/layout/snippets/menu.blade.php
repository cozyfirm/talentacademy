{{--<div class="s-top-menu">--}}
{{--    <div class="logo-part">--}}
{{--        <img src="{{ asset('files/images/default/ekipa.png') }}" alt="">--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="s-left-menu">--}}
{{--    <div class="s-lm-subheader">--}}
{{--        <h5>{{ __('Grafičko sučelje') }}</h5>--}}
{{--        <img src="{{ asset('files/images/svg-icons/chart-area-solid.svg') }}" alt="">--}}
{{--    </div>--}}
{{--    <div class="s-lm-row-wrapper">--}}
{{--        <a href="#">--}}
{{--            <div class="s-lm-rw-inline-row">--}}
{{--                <div class="s-lm-rw-ir-left">--}}
{{--                    <img src="{{ asset('files/images/svg-icons/house-chimney-solid.svg') }}" alt="">--}}
{{--                    <p>{{ __('Dashboard') }}</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </a>--}}
{{--    </div>--}}

{{--    <div class="s-lm-row-wrapper">--}}
{{--        <a href="#">--}}
{{--            <div class="s-lm-rw-inline-row">--}}
{{--                <div class="s-lm-rw-ir-left">--}}
{{--                    <img src="{{ asset('files/images/svg-icons/house-chimney-solid.svg') }}" alt="">--}}
{{--                    <p>{{ __('Dashboard') }}</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </a>--}}
{{--    </div>--}}

{{--    <div class="s-lm-user-wrapper">--}}
{{--        <div class="lm-u-img-w">--}}
{{--            <img src="{{ asset('files/images/default/sparrow.webp') }}" alt="">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


<div class="s-top-menu">
    <div class="app-name">
        <a title="{{__('Naslovna strana')}}">
            <h1> Cozy Firm d.o.o </h1>
        </a>
        <i class="fas fa-bars t-3 system-m-i-t" title="{{__('Otvorite / zatvorite MENU')}}"></i>
    </div>

    <div class="top-menu-links">
        <!-- Left top icons -->
        <div class="left-icons">
{{--            <div class="single-li">--}}
{{--                <a href="{{route('public-part.shop.cart.cart-preview')}}" target="_blank" title="{{__($inCart.' artikal/a u košarici')}}">--}}
{{--                    <i class="fas fa-shopping-cart"></i>--}}
{{--                    <div class="number-of"><p>{{$inCart}}</p></div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="single-li" title="Odaberite jezik">--}}
{{--                <i class="fas fa-globe-americas"></i>--}}
{{--                <div class="number-of"><p>3</p></div>--}}
{{--            </div>--}}

            <a href="{{ route('public-part.home') }}" target="_blank">
                <div class="single-li">
                    <p> {{__('HomePage')}} </p>
                </div>
            </a>

            <a href="{{ route('system.admin.programs.all-applications') }}">
                <div class="single-li">
                    <p> {{__('Prijave na programe')}} </p>
                </div>
            </a>
        </div>

        <!-- Right top icons -->
        <div class="right-icons">
{{--            <div class="single-li main-search-w" title="">--}}
{{--                <i class="fas fa-search main-search-t" title="{{__('Pretražite')}}"></i>--}}
{{--                @include('system.template.menu.menu-includes.search')--}}
{{--            </div>--}}
{{--            <div class="single-li m-show-notifications" title="Pregled obavijesti">--}}
{{--                <i class="fas fa-bell"></i>--}}
{{--                <div class="number-of"><p id="no-unread-notifications">12</p></div>--}}

{{--                @include('system.template.menu.menu-includes.notifications')--}}
{{--            </div>--}}
            <div class="single-li main-search-w" title="">
                <a href="{{ route('auth.logout') }}">
                    <i class="fas fa-power-off" title="{{__('Odjavite se')}}"></i>
                </a>
            </div>
            <a href="#">
                <div class="single-li user-name">
                    <p><b> {{ __('Root Admin') }} </b></p>
{{--                    {!! Form::hidden('user_id', json_encode($loggedUser), ['class' => 'form-control', 'id' => 'loggedUser']) !!}--}}
                </div>
            </a>
        </div>
    </div>
</div>

<!--------------------------------------------------------------------------------------------------------------------->

<div class="s-left-menu t-3">
    <!-- user Info -->
    <div class="user-info">
        <div class="user-image">
            <img src="{{ asset('files/images/default/sparrow.webp') }}" alt="">
{{--            <img class="mp-profile-image" title="{{__('Promijenite sliku profila')}}" src="{{ isset($loggedUser->profileImgRel) ? asset( $loggedUser->profileImgRel->getFile()) : asset('images/user.png')}}" alt="">--}}
        </div>
        <div class="user-desc">
            <h4> {{ __('Root Admin') }} </h4>
            <p> {{ __('Administrator') }} </p>
            <p>
                <i class="fas fa-circle"></i>
                Online
            </p>
        </div>
    </div>
    <hr>

    <!-- Menu subsection -->
    <div class="s-lm-subsection">

        <div class="subtitle">
            <h4>{{__('Grafičko sučelje')}}</h4>
            <div class="subtitle-icon">
                <i class="fas fa-chart-area"></i>
            </div>
        </div>
        <a href="#" class="menu-a-link">
            <div class="s-lm-wrapper">
                <div class="s-lm-s-elements">
                    <div class="s-lms-e-img">
                        <i class="fas fa-home"></i>
                    </div>
                    <p>{{__('Dashboard')}}</p>
                    <div class="extra-elements">
                        <div class="ee-t ee-t-b"><p>{{__('Graph')}}</p></div>
                    </div>
                </div>
            </div>
        </a>

        <div class="subtitle">
            <h4>{{__('Korisničko sučelje')}}</h4>
            <div class="subtitle-icon">
                <i class="fas fa-project-diagram"></i>
            </div>
        </div>

        <a href="#" class="menu-a-link">
            <div class="s-lm-wrapper">
                <div class="s-lm-s-elements">
                    <div class="s-lms-e-img">
                        <i class="fas fa-user-edit"></i>
                    </div>
                    <p>{{__('Moj profil')}}</p>
                    <div class="extra-elements">
                        <div class="ee-t ee-t-g"><p>{{__('Info')}}</p></div>
                    </div>
                </div>
            </div>
        </a>
        <a href="#" class="menu-a-link">
            <div class="s-lm-wrapper">
                <div class="s-lm-s-elements">
                    <div class="s-lms-e-img">
                        <i class="far fa-file-alt"></i>
                    </div>
                    <p>{{__('Programi')}}</p>
                    <div class="extra-elements">
                        <div class="rotate-element"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
                <div class="inside-links active-links">
                    <a href="{{ route('system.admin.programs') }}">
                        <div class="inside-lm-link">
                            <div class="ilm-l"></div><div class="ilm-c"></div>
                            <p>{{__('Pregled programa')}}</p>
                        </div>
                    </a>
                    <a href="{{ route('system.admin.programs.all-applications') }}">
                        <div class="inside-lm-link">
                            <div class="ilm-l"></div><div class="ilm-c"></div>
                            <p> {{__('Prijave')}} </p>
                        </div>
                    </a>
                </div>
            </div>
        </a>

        <a href="{{ route('system.admin.users') }}" class="menu-a-link">
            <div class="s-lm-wrapper">
                <div class="s-lm-s-elements">
                    <div class="s-lms-e-img">
                        <i class="fas fa-users"></i>
                    </div>
                    <p>{{__('Korisnici')}}</p>
                    <div class="extra-elements">
                        <div class="ee-t ee-t-b"><p>{{__('All')}}</p></div>
                    </div>
                </div>
            </div>
        </a>

        <a href="{{ route('system.admin.blog') }}" class="menu-a-link">
            <div class="s-lm-wrapper">
                <div class="s-lm-s-elements">
                    <div class="s-lms-e-img">
                        <i class="fas fa-wind"></i>
                    </div>
                    <p>{{__('Blog')}}</p>
                    <div class="extra-elements">
                        <div class="ee-t ee-t-b"><p>{{__('Other')}}</p></div>
                    </div>
                </div>
            </div>
        </a>

        <div class="subtitle">
            <h4> {{__('Ostalo')}} </h4>
            <div class="subtitle-icon">
                <i class="fas fa-box"></i>
            </div>
        </div>

        <a href="{{ route('system.admin.locations') }}" class="menu-a-link">
            <div class="s-lm-wrapper">
                <div class="s-lm-s-elements">
                    <div class="s-lms-e-img">
                        <i class="fas fa-map-pin"></i>
                    </div>
                    <p>{{__('Lokacije')}}</p>
                    <div class="extra-elements">
                        <div class="ee-t ee-t-b"><p>{{__('Other')}}</p></div>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{ route('system.admin.pages') }}" class="menu-a-link">
            <div class="s-lm-wrapper">
                <div class="s-lm-s-elements">
                    <div class="s-lms-e-img">
                        <i class="fas fa-file"></i>
                    </div>
                    <p>{{__('Single Pages')}}</p>
                </div>
            </div>
        </a>
        <a href="{{ route('system.admin.faq') }}" class="menu-a-link">
            <div class="s-lm-wrapper">
                <div class="s-lm-s-elements">
                    <div class="s-lms-e-img">
                        <i class="fas fa-question"></i>
                    </div>
                    <p>{{__('FAQs section')}}</p>
                    <div class="extra-elements">
                        <div class="ee-t ee-t-b"><p>{{__('Other')}}</p></div>
                    </div>
                </div>
            </div>
        </a>

        <a href="#" class="menu-a-link">
            <div class="s-lm-wrapper">
                <div class="s-lm-s-elements">
                    <div class="s-lms-e-img">
                        <i class="fas fa-archive"></i>
                    </div>
                    <p>{{__('Arhiva')}}</p>
                    <div class="extra-elements">
                        <div class="rotate-element"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
                <div class="inside-links active-links">
                    <a href="{{ route('system.admin.archive.gallery') }}">
                        <div class="inside-lm-link">
                            <div class="ilm-l"></div><div class="ilm-c"></div>
                            <p>{{__('Galerija fotografija')}}</p>
                        </div>
                    </a>
                </div>
            </div>
        </a>

        <div class="subtitle">
            <h4> {{__('Inbox')}} </h4>
            <div class="subtitle-icon">
                <i class="fas fa-envelope-open"></i>
            </div>
        </div>
        <a href="#" class="menu-a-link">
            <div class="s-lm-wrapper">
                <div class="s-lm-s-elements">
                    <div class="s-lms-e-img">
                        <i class="far fa-envelope"></i>
                    </div>
                    <p>{{__('Messaging system')}}</p>
                    <div class="extra-elements">
                        <div class="rotate-element"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
                <div class="inside-links active-links">
                    <a href="{{ route('system.admin.inbox.bulk-messages') }}">
                        <div class="inside-lm-link">
                            <div class="ilm-l"></div><div class="ilm-c"></div>
                            <p>{{__('Bulk messages')}}</p>
                        </div>
                    </a>
                    <a href="{{ route('system.admin.chat.group-chats') }}">
                        <div class="inside-lm-link">
                            <div class="ilm-l"></div><div class="ilm-c"></div>
                            <p>{{__('Group chats')}}</p>
                        </div>
                    </a>

                    <a href="">
                        <div class="inside-lm-link">
                            <div class="ilm-l"></div><div class="ilm-c"></div>
                            <p> {{__('Ostale informacije')}} </p>
                        </div>
                    </a>
                </div>
            </div>
        </a>

        <hr>
    </div>

{{--    @include('system.template.menu.menu-includes.bottom-icons')--}}
</div>


{{--<!-- Upload an image for user account -->--}}
{{--@include('system.template.menu.menu-includes.profile-image')--}}
