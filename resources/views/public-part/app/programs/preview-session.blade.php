@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Preview session') @endsection

@php
    $extra_items = [1, 2, 3, 4, 5, 6,];
@endphp
    <!-- Page content -->
@section('public-content')
    {{ html()->hidden('session_id')->class('form-control')->value($session->id) }}

    <div class="preview-session__header preview-session__header_{{ $program->id }}">
        <div class="preview-session__container preview-session__header-container">
            <h2 class="preview-session__title"> {{ $session->title }} </h2>
            @if($session->presenter_id)
                <div class="preview-session__title-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M14 19V24H0V19C0 17.346 1.346 16 3 16H11C12.654 16 14 17.346 14 19ZM7 14C9.206 14 11 12.206 11 10C11 7.794 9.206 6 7 6C4.794 6 3 7.794 3 10C3 12.206 4.794 14 7 14ZM24 3V18H15.899C15.463 15.861 13.65 14.237 11.433 14.044C12.407 12.977 13 11.558 13 10C13 6.686 10.314 4 7 4C6.299 4 5.626 4.121 5 4.342V3C5 1.346 6.346 0 8 0H21C22.654 0 24 1.346 24 3ZM22 14H17V16H22V14Z" fill="#070600"/>
                    </svg>
                    {{ $session->presenterRel->name }}
                </div>
            @endif
            <div class="preview-session__title-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="24" viewBox="0 0 27 24" fill="none">
                    <path d="M26.1907 19.999C26.1907 22.205 24.2327 23.999 21.825 23.999H8.56854L10.8005 21.999H21.8261C23.03 21.999 24.009 21.102 24.009 19.999C24.009 18.896 23.03 17.999 21.8261 17.999H16.369C13.9613 17.999 12.0033 16.205 12.0033 13.999C12.0033 12.072 13.4985 10.46 15.4816 10.083L17.6198 11.999H16.369C15.1651 11.999 14.1861 12.896 14.1861 13.999C14.1861 15.102 15.1651 15.999 16.369 15.999H21.8261C24.2338 15.999 26.1907 17.793 26.1907 19.999ZM24.5918 8.535C26.7201 6.585 26.7201 3.413 24.5918 1.464C23.5615 0.52 22.1907 0 20.7336 0C19.2765 0 17.9057 0.52 16.8743 1.464C14.7471 3.414 14.7471 6.586 16.883 8.543L20.7336 11.993L24.5918 8.535ZM23.0485 2.878C24.3255 4.048 24.3255 5.951 23.0573 7.113L20.7336 9.195L18.4176 7.121C17.1417 5.951 17.1417 4.048 18.4176 2.878C19.0364 2.311 19.8583 1.999 20.7336 1.999C21.6089 1.999 22.4308 2.312 23.0485 2.878ZM9.3118 20.535C11.4401 18.585 11.4401 15.413 9.3118 13.464C8.28149 12.52 6.91066 12 5.4536 12C3.99654 12 2.62571 12.52 1.59431 13.464C-0.532888 15.414 -0.532888 18.586 1.60304 20.543L5.4536 23.993L9.3118 20.535ZM7.76852 14.878C9.04549 16.048 9.04549 17.951 7.77725 19.113L5.4536 21.195L3.13759 19.121C1.86171 17.951 1.86171 16.048 3.13759 14.878C3.75643 14.311 4.57827 13.999 5.4536 13.999C6.32892 13.999 7.15077 14.312 7.76852 14.878Z" fill="#070600"/>
                </svg>
                {{ $session->locationRel->title }}, {{ $session->locationRel->address }} {{ $session->locationRel->city }}
            </div>
        </div>
    </div>
    <div class="preview-session__content">
        <div class="preview-session__container">
            <h2 class="preview-session__title session__title-2">{{ __('O predavanju:') }}</h2>

            <p> {!! nl2br($session->description) !!} </p>
            @if(Auth()->check() and $session->presenter_data)
                <h2 class="session__title session__title-2">{{ __('Riječ predavača') }}</h2>
                <p> {!! nl2br($session->presenter_data) !!} </p>
                <div class="preview-session__extra">
                    <div class="session__extra__inner">
                        <h3 class="preview-session__extra-header">{{ __('Preuzmi literaturu:') }}</h3>
                        @foreach($session->sessionFileRel as $sessionFile)
                            <a href="{{ $sessionFile->fileRel->getFile() }}" target="_blank" title="{{ __('Pregled dokumenta') }}">
                                <div class="preview-session__extra-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                        <path d="M4 6.5H6V8.5H4V6.5ZM4 11.5H6V13.5H4V11.5ZM4 16.5H6V18.5H4V16.5ZM20 8.5V6.5H8.023V8.5H20ZM8 11.5H20V13.5H8V11.5ZM8 16.5H20V18.5H8V16.5Z" fill="#EEF0F2"/>
                                    </svg>
                                    {{ $sessionFile->fileRel->file }}
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="session__extra__inner">
                        <h3 class="preview-session__extra-header">{{ __('Korisni linkovi:') }}</h3>
                        @foreach($session->sessionLinkRel as $sessionLink)
                            <a href="{{ $sessionLink->link }}" target="_blank">
                                <div class="preview-session__extra-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                        <path d="M12 2.5C6.486 2.5 2 6.986 2 12.5C2 18.014 6.486 22.5 12 22.5C17.514 22.5 22 18.014 22 12.5C22 6.986 17.514 2.5 12 2.5ZM4 12.5C4 11.601 4.156 10.738 4.431 9.931L8 13.5V15.5L11 18.5V20.431C7.061 19.936 4 16.572 4 12.5ZM18.33 17.373C17.677 16.847 16.687 16.5 16 16.5V15.5C16 14.9696 15.7893 14.4609 15.4142 14.0858C15.0391 13.7107 14.5304 13.5 14 13.5H10V10.5C10.5304 10.5 11.0391 10.2893 11.4142 9.91421C11.7893 9.53914 12 9.03043 12 8.5V7.5H13C13.5304 7.5 14.0391 7.28929 14.4142 6.91421C14.7893 6.53914 15 6.03043 15 5.5V5.089C17.928 6.278 20 9.15 20 12.5C19.9998 14.2647 19.4123 15.9791 18.33 17.373Z" fill="#EEF0F2"/>
                                    </svg>
                                    {{ $sessionLink->value }}
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- For logged users -->
    @if(Auth()->check())
        <div class="my_notes__wrapper my_notes__wrapper_{{ $program->id }}">
            <div class="my_notes__wrapper_inner">
                <div class="my_notes__wrapper_inner_header">
                    <div class="my_btn">{{ __('Moje Zabilješke') }}</div>
                </div>

                <div class="my_notes__note @if($session->noteRel->count() == 0) d-none @endif">
                    @foreach($session->noteRel as $note)
                        <div class="my_note">
                            <div class="my_note_time"><h5>{{ $note->time() }}</h5></div>
                            <div class="my_note_delete" itemid="{{ $note->id }}"><i class="fas fa-times"></i></div>
                            <p> {!! nl2br($note->note) !!} </p>
                        </div>
                    @endforeach
                </div>

                <div class="my_notes_new_note">
                    <textarea name="note" id="note" placeholder="{{ __('Moja zabilješka...') }}"></textarea>
                    <div for="note" class="save-note">
                        <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="news__list-item-image">
                            <path id="news__list_svg" d="M24.8992 11.293L2.23601 0.627944C2.00783 0.519982 1.75365 0.479096 1.50312 0.510052C1.25259 0.541008 1.01601 0.64253 0.820965 0.802786C0.625919 0.963043 0.480436 1.17543 0.401472 1.4152C0.322507 1.65497 0.313314 1.91225 0.374964 2.15704L2.9599 12.4995L0.374964 22.8419C0.312737 23.0868 0.321529 23.3443 0.400309 23.5844C0.479089 23.8244 0.624602 24.0371 0.819825 24.1975C1.01505 24.3579 1.25191 24.4594 1.5027 24.4901C1.75349 24.5208 2.00785 24.4795 2.23601 24.371L24.8992 13.7059C25.1282 13.5983 25.3219 13.4277 25.4575 13.214C25.5932 13.0004 25.6652 12.7525 25.6652 12.4995C25.6652 12.2464 25.5932 11.9985 25.4575 11.7849C25.3219 11.5713 25.1282 11.4006 24.8992 11.293ZM3.64246 20.7609L4.76096 16.2855L12.3331 12.4995L4.76096 8.71337L3.64246 4.23806L21.1998 12.4995L3.64246 20.7609Z" fill="#F45B69"/>
                        </svg>
{{--                        <img src="{{ asset('files/images/public-part/arrow-2.svg') }}" alt="{{ __('New note') }}" class="news__list-item-image">--}}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="preview__session_rest_of_w">
        <div class="preview__session_rest_of_inn_w">
            <div class="preview__session_rest_of_header">
                <h2>{{ __('Ostala predavanja') }}</h2>
            </div>

            <div class="preview__session_rest_of">
                @foreach($otherSessions as $otherSession)
                    <div class="preview__session_single" uri="{{ route('public-part.programs.preview-session', ['id' => $otherSession->id]) }}">
                        <div class="preview__session_single_inner">
                            <h3> {{ $otherSession->title }} </h3>

                            <div class="preview-session__item-row">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M14 19V24H0V19C0 17.346 1.346 16 3 16H11C12.654 16 14 17.346 14 19ZM7 14C9.206 14 11 12.206 11 10C11 7.794 9.206 6 7 6C4.794 6 3 7.794 3 10C3 12.206 4.794 14 7 14ZM24 3V18H15.899C15.463 15.861 13.65 14.237 11.433 14.044C12.407 12.977 13 11.558 13 10C13 6.686 10.314 4 7 4C6.299 4 5.626 4.121 5 4.342V3C5 1.346 6.346 0 8 0H21C22.654 0 24 1.346 24 3ZM22 14H17V16H22V14Z" fill="#070600"/>
                                </svg>
                                {{ $otherSession->presenterRel->name }}
                            </div>
                            <div class="preview-session__item-row">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="24" viewBox="0 0 27 24" fill="none">
                                    <path d="M26.1907 19.999C26.1907 22.205 24.2327 23.999 21.825 23.999H8.56854L10.8005 21.999H21.8261C23.03 21.999 24.009 21.102 24.009 19.999C24.009 18.896 23.03 17.999 21.8261 17.999H16.369C13.9613 17.999 12.0033 16.205 12.0033 13.999C12.0033 12.072 13.4985 10.46 15.4816 10.083L17.6198 11.999H16.369C15.1651 11.999 14.1861 12.896 14.1861 13.999C14.1861 15.102 15.1651 15.999 16.369 15.999H21.8261C24.2338 15.999 26.1907 17.793 26.1907 19.999ZM24.5918 8.535C26.7201 6.585 26.7201 3.413 24.5918 1.464C23.5615 0.52 22.1907 0 20.7336 0C19.2765 0 17.9057 0.52 16.8743 1.464C14.7471 3.414 14.7471 6.586 16.883 8.543L20.7336 11.993L24.5918 8.535ZM23.0485 2.878C24.3255 4.048 24.3255 5.951 23.0573 7.113L20.7336 9.195L18.4176 7.121C17.1417 5.951 17.1417 4.048 18.4176 2.878C19.0364 2.311 19.8583 1.999 20.7336 1.999C21.6089 1.999 22.4308 2.312 23.0485 2.878ZM9.3118 20.535C11.4401 18.585 11.4401 15.413 9.3118 13.464C8.28149 12.52 6.91066 12 5.4536 12C3.99654 12 2.62571 12.52 1.59431 13.464C-0.532888 15.414 -0.532888 18.586 1.60304 20.543L5.4536 23.993L9.3118 20.535ZM7.76852 14.878C9.04549 16.048 9.04549 17.951 7.77725 19.113L5.4536 21.195L3.13759 19.121C1.86171 17.951 1.86171 16.048 3.13759 14.878C3.75643 14.311 4.57827 13.999 5.4536 13.999C6.32892 13.999 7.15077 14.312 7.76852 14.878Z" fill="#070600"/>
                                </svg>
                                {{ $otherSession->locationRel->title }}, {{ $otherSession->locationRel->address }} {{ $otherSession->locationRel->city }}
                            </div>

                            <p> {{ $otherSession->short_description }} </p>
                        </div>
                    </div>
                @endforeach
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
                    <button class="news__navigation-button previous__session_btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="16" viewBox="0 0 34 16" fill="none">
                            <path d="M9.32 5.0516L1 9.77621L9.32 14.06M9.32 9.93879C11.0656 10.0969 10.958 9.96669 12.7084 10.1248C13.2561 10.1759 13.8184 10.2224 14.3415 10.0643C14.9723 9.87369 15.4661 9.40871 15.9306 8.95768C18.6835 6.26079 19.9009 4.31717 22.4582 1.44824C21.5829 5.79116 18.8693 12.8589 18.8693 12.8589H33" stroke="#070600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button class="news__navigation-button next__session_btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="16" viewBox="0 0 34 16" fill="none">
                            <path d="M24.68 5.0516L33 9.77621L24.68 14.06M24.68 9.93879C22.9344 10.0969 23.042 9.96669 21.2916 10.1248C20.7439 10.1759 20.1816 10.2224 19.6585 10.0643C19.0277 9.87369 18.5339 9.40871 18.0694 8.95768C15.3165 6.26079 14.0991 4.31717 11.5418 1.44824C12.4171 5.79116 15.1307 12.8589 15.1307 12.8589H0.999999" stroke="#070600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="preview-session__more">--}}
{{--        <div class="preview-session__more-container">--}}
{{--            <h2>Ostala predavanja:</h2>--}}
{{--            <div class="preview-session__items slider_w">--}}
{{--                @foreach($extra_items as $extra_item)--}}
{{--                <div class="preview-session__item">--}}
{{--                    <h3>Primijenjena muzika</h3>--}}
{{--                    <div class="preview-session__item-row">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
{{--                            <path d="M14 19V24H0V19C0 17.346 1.346 16 3 16H11C12.654 16 14 17.346 14 19ZM7 14C9.206 14 11 12.206 11 10C11 7.794 9.206 6 7 6C4.794 6 3 7.794 3 10C3 12.206 4.794 14 7 14ZM24 3V18H15.899C15.463 15.861 13.65 14.237 11.433 14.044C12.407 12.977 13 11.558 13 10C13 6.686 10.314 4 7 4C6.299 4 5.626 4.121 5 4.342V3C5 1.346 6.346 0 8 0H21C22.654 0 24 1.346 24 3ZM22 14H17V16H22V14Z" fill="#070600"/>--}}
{{--                        </svg>--}}
{{--                        Damir Šagolj--}}
{{--                    </div>--}}
{{--                    <div class="preview-session__item-row">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="24" viewBox="0 0 27 24" fill="none">--}}
{{--                            <path d="M26.1907 19.999C26.1907 22.205 24.2327 23.999 21.825 23.999H8.56854L10.8005 21.999H21.8261C23.03 21.999 24.009 21.102 24.009 19.999C24.009 18.896 23.03 17.999 21.8261 17.999H16.369C13.9613 17.999 12.0033 16.205 12.0033 13.999C12.0033 12.072 13.4985 10.46 15.4816 10.083L17.6198 11.999H16.369C15.1651 11.999 14.1861 12.896 14.1861 13.999C14.1861 15.102 15.1651 15.999 16.369 15.999H21.8261C24.2338 15.999 26.1907 17.793 26.1907 19.999ZM24.5918 8.535C26.7201 6.585 26.7201 3.413 24.5918 1.464C23.5615 0.52 22.1907 0 20.7336 0C19.2765 0 17.9057 0.52 16.8743 1.464C14.7471 3.414 14.7471 6.586 16.883 8.543L20.7336 11.993L24.5918 8.535ZM23.0485 2.878C24.3255 4.048 24.3255 5.951 23.0573 7.113L20.7336 9.195L18.4176 7.121C17.1417 5.951 17.1417 4.048 18.4176 2.878C19.0364 2.311 19.8583 1.999 20.7336 1.999C21.6089 1.999 22.4308 2.312 23.0485 2.878ZM9.3118 20.535C11.4401 18.585 11.4401 15.413 9.3118 13.464C8.28149 12.52 6.91066 12 5.4536 12C3.99654 12 2.62571 12.52 1.59431 13.464C-0.532888 15.414 -0.532888 18.586 1.60304 20.543L5.4536 23.993L9.3118 20.535ZM7.76852 14.878C9.04549 16.048 9.04549 17.951 7.77725 19.113L5.4536 21.195L3.13759 19.121C1.86171 17.951 1.86171 16.048 3.13759 14.878C3.75643 14.311 4.57827 13.999 5.4536 13.999C6.32892 13.999 7.15077 14.312 7.76852 14.878Z" fill="#070600"/>--}}
{{--                        </svg>--}}
{{--                        TBA--}}
{{--                    </div>--}}
{{--                    <p>--}}
{{--                        Lorem ipsum dolor sit amet consectetur. Orci dui magnis tristique facilisis sollicitudin. Pellentesque sociis id nisi vitae et purus eget. Tristique netus enim elit mi at quam. Commodo odio senectus vitae egestas enim.--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                    @endforeach--}}
{{--            </div>--}}
{{--            <div class="news__navigation">--}}
{{--                <div class="news__navigation-dots">--}}
{{--                    <div class="news__navigation-dot"></div>--}}
{{--                    <div class="news__navigation-dot"></div>--}}
{{--                    <div class="news__navigation-dot"></div>--}}
{{--                    <div class="news__navigation-dot"></div>--}}
{{--                    <div class="news__navigation-dot"></div>--}}
{{--                    <div class="news__navigation-dot"></div>--}}
{{--                </div>--}}
{{--                <div class="news__navigation-buttons">--}}
{{--                    <button class="news__navigation-button">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="16" viewBox="0 0 34 16" fill="none">--}}
{{--                            <path d="M9.32 5.0516L1 9.77621L9.32 14.06M9.32 9.93879C11.0656 10.0969 10.958 9.96669 12.7084 10.1248C13.2561 10.1759 13.8184 10.2224 14.3415 10.0643C14.9723 9.87369 15.4661 9.40871 15.9306 8.95768C18.6835 6.26079 19.9009 4.31717 22.4582 1.44824C21.5829 5.79116 18.8693 12.8589 18.8693 12.8589H33" stroke="#070600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                    <button class="news__navigation-button">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="16" viewBox="0 0 34 16" fill="none">--}}
{{--                            <path d="M24.68 5.0516L33 9.77621L24.68 14.06M24.68 9.93879C22.9344 10.0969 23.042 9.96669 21.2916 10.1248C20.7439 10.1759 20.1816 10.2224 19.6585 10.0643C19.0277 9.87369 18.5339 9.40871 18.0694 8.95768C15.3165 6.26079 14.0991 4.31717 11.5418 1.44824C12.4171 5.79116 15.1307 12.8589 15.1307 12.8589H0.999999" stroke="#070600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="snake">
        <img src="{{ asset('/files/images/public-part/snake/snake_'.($program->id).'.svg') }}" alt="{{ __('Snake') }}" class="snake__image">
        <img src="{{ asset('/files/images/public-part/snake_mob_'.($program->id).'.svg') }}" alt="{{ __('Snake mobile') }}" class="snake__image snake__image--mobile">
    </div>
@endsection
