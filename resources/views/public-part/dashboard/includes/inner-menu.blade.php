<div class="inner__menu_w">
    <div class="mobile_small_menu">
        <a href="{{ route('dashboard.my-notes') }}">
            <div class="single_elem @if(Route::is('dashboard.my-notes')) active @endif">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_8103_17825)">
                        <path class="change-color" d="M12.6903 0H5.30968C2.38115 0 0 2.38115 0 5.30968V17.0968C0 17.5895 0.401419 17.9909 0.89407 17.9909H12.6812C15.6097 17.9909 17.9909 15.6097 17.9909 12.6812V5.30968C17.9909 2.38115 15.6097 0 12.6812 0H12.6903ZM12.6903 16.2119H1.79726V5.30968C1.79726 3.36645 3.37557 1.78814 5.3188 1.78814H12.6903C14.6336 1.78814 16.2119 3.36645 16.2119 5.30968V12.6812C16.2119 14.6244 14.6336 16.2027 12.6903 16.2027V16.2119Z" fill="#fff"/>
                        <path class="change-color" d="M12.9912 6.34961H4.57962C4.08697 6.34961 3.68555 6.75103 3.68555 7.24368C3.68555 7.73633 4.08697 8.13775 4.57962 8.13775H12.982C13.4747 8.13775 13.8761 7.73633 13.8761 7.24368C13.8761 6.75103 13.4747 6.34961 12.982 6.34961H12.9912Z" fill="#EEF0F2"/>
                        <path class="change-color" d="M10.8834 10.3271H4.8804C4.38775 10.3271 3.98633 10.7286 3.98633 11.2212C3.98633 11.7139 4.38775 12.1153 4.8804 12.1153H10.8834C11.3761 12.1153 11.7775 11.7139 11.7775 11.2212C11.7775 10.7286 11.3761 10.3271 10.8834 10.3271Z" fill="#EEF0F2"/>
                    </g>
                </svg>
                @if(Auth()->user()->unreadNotifications())
                    <div class="total_no"><p>{{ Auth()->user()->totalNotes() }}</p></div>
                @endif
            </div>
        </a>
        <a href="{{ route('dashboard.inbox') }}">
            <div class="single_elem @if(Route::is('dashboard.inbox')) active @endif">
                <svg width="21" height="17" viewBox="0 0 21 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_8103_17834)">
                        <path class="change-color" d="M16.06 0.5H4.54C2.31 0.5 0.5 2.31 0.5 4.54V12.35C0.5 14.58 2.31 16.39 4.54 16.39H16.06C18.29 16.39 20.1 14.58 20.1 12.35V4.54C20.1 2.31 18.29 0.5 16.06 0.5ZM4.54 2.37H16.06C17.26 2.37 18.23 3.34 18.23 4.54V12.35C18.23 13.55 17.26 14.52 16.06 14.52H4.54C3.34 14.52 2.37 13.55 2.37 12.35V4.54C2.37 3.34 3.34 2.37 4.54 2.37Z" fill="#EEF0F2"/>
                        <path class="change-color" d="M7.53961 8.72027C8.22961 9.41027 9.14961 9.79027 10.1196 9.79027C11.0896 9.79027 12.0096 9.41027 12.6996 8.72027L15.4796 5.94027C15.8396 5.58027 15.8396 4.98027 15.4796 4.62027C15.1196 4.25027 14.5196 4.25027 14.1596 4.62027L11.3796 7.40027C10.6896 8.09027 9.54961 8.09027 8.85961 7.40027L6.18961 4.73027C5.82961 4.36027 5.22961 4.36027 4.86961 4.73027C4.50961 5.09027 4.50961 5.69027 4.86961 6.05027L7.53961 8.72027Z" fill="#EEF0F2"/>
                    </g>
                </svg>
                @if(Auth()->user()->unreadNotifications())
                    <div class="total_no"><p>{{ Auth()->user()->unreadNotifications() }}</p></div>
                @endif
            </div>
        </a>
        @if( (Auth()->user()->role == 'user' and Auth()->user()->myProgram()))
            <a href="{{ route('dashboard.my-schedule') }}">
                <div class="single_elem @if(Route::is('dashboard.my-schedule')) active @endif">
                    <svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_8103_17840)">
                            <path class="change-color" d="M15.94 1.57H15.26V1C15.26 0.45 14.81 0 14.26 0H14.03C13.48 0 13.03 0.45 13.03 1V1.57H7.64V1C7.64 0.45 7.19 0 6.64 0H6.41C5.86 0 5.41 0.45 5.41 1V1.57H4.19C1.89 1.57 0.02 3.44 0.02 5.74V7.19C0.02 7.19 0 7.25 0 7.28C0 7.31 0.01 7.34 0.02 7.37V13.72C0.02 16.02 1.89 17.89 4.19 17.89H15.95C18.25 17.89 20.12 16.02 20.12 13.72V5.75C20.12 3.45 18.25 1.58 15.95 1.58L15.94 1.57ZM4.18 3.57H5.4V4.77C5.4 5.32 5.85 5.77 6.4 5.77H6.63C7.18 5.77 7.63 5.32 7.63 4.77V3.57H13.02V4.77C13.02 5.32 13.47 5.77 14.02 5.77H14.25C14.8 5.77 15.25 5.32 15.25 4.77V3.57H15.93C17.12 3.57 18.1 4.54 18.1 5.74V6.28H2.02V5.74C2.02 4.55 2.99 3.57 4.19 3.57H4.18ZM15.94 15.88H4.18C2.99 15.88 2.01 14.91 2.01 13.71V8.28H18.1V13.71C18.1 14.9 17.13 15.88 15.93 15.88H15.94Z" fill="#EEF0F2"/>
                        </g>
                    </svg>
                </div>
            </a>
        @elseif(Auth()->user()->role == 'presenter')
            <a href="{{ route('dashboard.preview-sessions') }}">
                <div class="single_elem @if(Route::is('dashboard.preview-sessions')) active @endif">
                    <svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_8103_17840)">
                            <path class="change-color" d="M15.94 1.57H15.26V1C15.26 0.45 14.81 0 14.26 0H14.03C13.48 0 13.03 0.45 13.03 1V1.57H7.64V1C7.64 0.45 7.19 0 6.64 0H6.41C5.86 0 5.41 0.45 5.41 1V1.57H4.19C1.89 1.57 0.02 3.44 0.02 5.74V7.19C0.02 7.19 0 7.25 0 7.28C0 7.31 0.01 7.34 0.02 7.37V13.72C0.02 16.02 1.89 17.89 4.19 17.89H15.95C18.25 17.89 20.12 16.02 20.12 13.72V5.75C20.12 3.45 18.25 1.58 15.95 1.58L15.94 1.57ZM4.18 3.57H5.4V4.77C5.4 5.32 5.85 5.77 6.4 5.77H6.63C7.18 5.77 7.63 5.32 7.63 4.77V3.57H13.02V4.77C13.02 5.32 13.47 5.77 14.02 5.77H14.25C14.8 5.77 15.25 5.32 15.25 4.77V3.57H15.93C17.12 3.57 18.1 4.54 18.1 5.74V6.28H2.02V5.74C2.02 4.55 2.99 3.57 4.19 3.57H4.18ZM15.94 15.88H4.18C2.99 15.88 2.01 14.91 2.01 13.71V8.28H18.1V13.71C18.1 14.9 17.13 15.88 15.93 15.88H15.94Z" fill="#EEF0F2"/>
                        </g>
                    </svg>
                </div>
            </a>

        @endif

        <a href="{{ route('dashboard.chat') }}">
            <div class="single_elem @if(Route::is('dashboard.chat')) active @endif">
                <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_8103_17845)">
                        <path class="change-color" d="M14.79 0.02C14.62 0.01 14.46 0 14.29 0H4.52C4.52 0 4.52 0 4.52 0.01C2.27 0.21 0.5 2.11 0.5 4.41V10.7C0.5 13.13 2.48 15.11 4.9 15.11H7.31L9.32 17.12C9.51 17.31 9.76 17.42 10.04 17.42C10.32 17.42 10.56 17.31 10.75 17.12L12.76 15.11H14.29C15.12 15.11 15.9 14.88 16.57 14.48C17.84 13.71 18.52 12.27 18.52 10.79V4.45C18.52 2.25 16.96 0.27 14.79 0.02ZM16.68 10.69C16.68 12 15.61 13.08 14.29 13.08H12.35C12.07 13.08 11.81 13.19 11.61 13.39L10.04 14.97L8.45 13.38C8.26 13.19 7.99 13.08 7.73 13.08H4.9C3.59 13.08 2.52 12.01 2.52 10.7V4.4C2.52 3.08 3.59 2.01 4.91 2.01H14.29C15.61 2.01 16.68 3.09 16.68 4.4V10.69Z" fill="#EEF0F2"/>
                        <path class="change-color" d="M4.41992 7.6698C4.41992 8.5598 5.14992 9.2898 6.03992 9.2898C6.92992 9.2898 7.65992 8.5598 7.65992 7.6698C7.65992 6.7798 6.92992 6.0498 6.03992 6.0498C5.14992 6.0498 4.41992 6.7698 4.41992 7.6698Z" fill="#EEF0F2"/>
                        <path class="change-color" d="M9.79969 9.2898C10.6897 9.2898 11.4197 8.5598 11.4197 7.6698C11.4197 6.7798 10.6897 6.0498 9.79969 6.0498C8.90969 6.0498 8.17969 6.7698 8.17969 7.6698C8.17969 8.5698 8.90969 9.2898 9.79969 9.2898Z" fill="#EEF0F2"/>
                        <path class="change-color" d="M13.6591 9.2898C14.5491 9.2898 15.2791 8.5598 15.2791 7.6698C15.2791 6.7798 14.5491 6.0498 13.6591 6.0498C12.7691 6.0498 12.0391 6.7698 12.0391 7.6698C12.0391 8.5698 12.7691 9.2898 13.6591 9.2898Z" fill="#EEF0F2"/>
                    </g>
                </svg>
{{--                <div class="total_no"><p>6</p></div>--}}
            </div>
        </a>
        <a href="#">
            <div class="single_elem profile__submenu">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="change-color" d="M14.36 8.62C16.07 8 17.29 6.37 17.29 4.45C17.29 2 15.29 0 12.84 0C10.89 0 9.24 1.27 8.64 3.03C8.04 1.28 6.4 0 4.44 0C2 0 0 2 0 4.45C0 6.39 1.26 8.03 2.99 8.64C1.25 9.25 0 10.88 0 12.83C0 15.28 2 17.28 4.45 17.28C6.47 17.28 8.17 15.91 8.71 14.06C9.25 15.91 10.94 17.28 12.97 17.28C15.42 17.28 17.42 15.28 17.42 12.83C17.42 10.87 16.14 9.22 14.37 8.63L14.36 8.62ZM12.84 2C14.19 2 15.29 3.1 15.29 4.45C15.29 5.8 14.19 6.9 12.84 6.9C11.49 6.9 10.39 5.8 10.39 4.45C10.39 3.1 11.49 2 12.84 2ZM2 4.45C2 3.1 3.1 2 4.45 2C5.8 2 6.9 3.1 6.9 4.45C6.9 5.8 5.8 6.9 4.45 6.9C3.1 6.9 2 5.8 2 4.45ZM4.45 15.27C3.1 15.27 2 14.17 2 12.82C2 11.47 3.1 10.37 4.45 10.37C5.8 10.37 6.9 11.47 6.9 12.82C6.9 14.17 5.8 15.27 4.45 15.27ZM8.71 11.59C8.31 10.21 7.26 9.11 5.91 8.64C7.2 8.19 8.21 7.17 8.65 5.88C9.1 7.19 10.13 8.22 11.45 8.66C10.13 9.14 9.11 10.23 8.71 11.59ZM12.96 15.27C11.61 15.27 10.51 14.17 10.51 12.82C10.51 11.47 11.61 10.37 12.96 10.37C14.31 10.37 15.41 11.47 15.41 12.82C15.41 14.17 14.31 15.27 12.96 15.27Z" fill="#EEF0F2"/>
                </svg>
            </div>
        </a>
    </div>
    <div class="inner__menu profile__inner_menu">
        <div class="inner__menu_profile">
            <a href="{{ route('dashboard.my-profile') }}">
                @if(isset(Auth()->user()->photo_uri))
                    <div class="inner__menu_profile_img_w">
                        <img src="{{ asset('files/images/public-part/users/' . (Auth()->user()->photo_uri)) }}" alt="">
                    </div>
                @endif
                <p> {{ Auth()->user()->name }} </p>
            </a>
        </div>
        <div class="inner__menu_links">
            <a href="{{ route('dashboard.welcome') }}">
                <div class="inner__menu_links_link @if(Route::is('dashboard.welcome')) active @endif">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 5H16.791C16.9377 4.51378 17.0082 4.00779 17 3.5C17 1.57 15.43 0 13.5 0C11.878 0 10.795 1.482 10.096 3.085C9.407 1.57 8.269 0 6.5 0C4.57 0 3 1.57 3 3.5C3 4.096 3.079 4.589 3.209 5H2C0.897 5 0 5.897 0 7V9C0 10.103 0.897 11 2 11V18C2 19.103 2.897 20 4 20H16C17.103 20 18 19.103 18 18V11C19.103 11 20 10.103 20 9V7C20 5.897 19.103 5 18 5ZM13.5 2C14.327 2 15 2.673 15 3.5C15 5 14.374 5 14 5H11.522C12.033 3.424 12.775 2 13.5 2ZM5 3.5C5 2.673 5.673 2 6.5 2C7.388 2 8.214 3.525 8.698 5H6C5.626 5 5 5 5 3.5ZM2 7H9V9H2V7ZM4 18V11H9V18H4ZM16 18H11V11H16V18ZM11 9V7.085L11.017 7H18L18.001 9H11Z" fill="black"/>
                    </svg>
                    <p>{{ __('Welcome pack') }}</p>
                </div>
            </a>
            <a href="{{ route('dashboard.latest-news') }}">
                <div class="inner__menu_links_link @if(Route::is('dashboard.latest-news') or Route::is('dashboard.latest-new')) active @endif">
                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.875 0H2.125C0.953 0 0 0.897 0 2V16C0 17.103 0.953 18 2.125 18H17.875C19.047 18 20 17.103 20 16V2C20 0.897 19.047 0 17.875 0ZM17.875 16H2.125C2.068 16 2.029 15.984 2.012 15.984C2.005 15.984 2.001 15.986 2 15.992L1.988 2.046C1.995 2.036 2.04 2 2.125 2H17.875C17.954 2.001 17.997 2.028 18 2.008L18.012 15.954C18.005 15.964 17.96 16 17.875 16Z" fill="black"/>
                        <path d="M4 4H10V10H4V4ZM4 12V14H16V12H4ZM12 8H16V10H12V8ZM12 4H16V6H12V4Z" fill="black"/>
                    </svg>
                    <p>{{ __('Vijesti') }}</p>
                </div>
            </a>
            @if(Auth()->user()->role == 'presenter')
                <a href="{{ route('dashboard.preview-sessions') }}">
                    <div class="inner__menu_links_link @if(Route::is('dashboard.preview-sessions')) active @endif">
                        <img src="{{ asset('files/images/public-part/icon.png') }}" class="scholarship" alt="">
                        <p>{{ __('Pregled sesija') }}</p>
                    </div>
                </a>
            @else
                <a href="{{ route('dashboard.department') }}">
                    <div class="inner__menu_links_link @if(Route::is('dashboard.department')) active @endif">
                        <img src="{{ asset('files/images/public-part/lecturers.png') }}" class="inbox" alt="">
                        <p>{{ __('Odsjek') }}</p>
                    </div>
                </a>

                @if(!Auth()->user()->submitted())
                    @if(!$appTimePassed)
                        <a href="{{ route('dashboard.apply-for-scholarship') }}">
                            <div class="inner__menu_links_link @if(Route::is('dashboard.apply-for-scholarship')) active @endif">
                                <img src="{{ asset('files/images/public-part/icon.png') }}" class="scholarship" alt="">
                                <p>{{ __('Apliciraj za stipendiju') }}</p>
                            </div>
                        </a>
                    @endif
                @endif
            @endif
            <a href="{{ route('dashboard.inbox') }}">
                <div class="inner__menu_links_link @if(Route::is('dashboard.inbox')) active @endif">
                    <img src="{{ asset('files/images/public-part/inbox.png') }}" class="inbox" alt="">
                    <p>{{ __('Obavijesti') }}</p>

                    @if(Auth()->user()->unreadNotifications())
                        <div class="number" id="number-of-notifications-w">
                            <p id="number-of-notifications">{{ Auth()->user()->unreadNotifications() }}</p>
                        </div>
                    @endif
                </div>
            </a>

            <a href="{{ route('dashboard.chat') }}">
                <div class="inner__menu_links_link @if(Route::is('dashboard.chat')) active @endif">
                    <img src="{{ asset('files/images/public-part/chat.png') }}" class="inbox" alt="">
                    <p>{{ __('Chat') }}</p>

                    {{--<div class="number" id="number-of-notifications-w">--}}
                    {{--    <p id="number-of-notifications">  </p>--}}
                    {{--</div>--}}
                </div>
            </a>

            @if( (Auth()->user()->role == 'user' and Auth()->user()->myProgram()))
                <a href="{{ route('dashboard.my-notes') }}">
                    <div class="inner__menu_links_link @if(Route::is('dashboard.my-notes')) active @endif">
                        <img src="{{ asset('files/images/public-part/notes.png') }}" class="inbox" alt="">
                        <p>{{ __('Zabilješke') }}</p>

                        @if(Auth()->user()->unreadNotifications())
                            <div class="number" id="number-of-notifications-w">
                                <p id="number-of-notes">{{ Auth()->user()->totalNotes() }}</p>
                            </div>
                        @endif
                    </div>
                </a>
            @endif

            @if( (Auth()->user()->role == 'user' and Auth()->user()->myProgram()))
                <a href="{{ route('dashboard.my-schedule') }}">
                    <div class="inner__menu_links_link @if(Route::is('dashboard.my-schedule')) active @endif">
                        <img src="{{ asset('files/images/public-part/raspored.png') }}" class="schedule" alt="">
                        <p>{{ __('Raspored') }}</p>
                    </div>
                </a>
            @endif

            @if( (Auth()->user()->role == 'user' and Auth()->user()->myProgram()))
                <a href="{{ route('dashboard.my-evaluations') }}">
                    <div class="inner__menu_links_link @if(Route::is('dashboard.my-evaluations') or Route::is('dashboard.my-evaluations.check')) active @endif">
                        <img src="{{ asset('files/images/public-part/notes.png') }}" class="inbox" alt="">
                        <p>{{ __('Evaluacije') }}</p>

                        <div class="number" id="number-of-notifications-w">
                            <p id="number-of-notes">{{ Auth()->user()->totalRealSessions() }}</p>
                        </div>
                    </div>
                </a>
            @endif
        </div>
    </div>
</div>
