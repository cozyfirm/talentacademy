<div class="inner__menu_w">
    <div class="inner__menu">
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
            @if(Auth()->user()->role == 'presenter')
                <a href="{{ route('dashboard.preview-sessions') }}">
                    <div class="inner__menu_links_link @if(Route::is('dashboard.preview-sessions')) active @endif">
                        <img src="{{ asset('files/images/public-part/icon.png') }}" class="scholarship" alt="">
                        <p>{{ __('Pregled sesija') }}</p>
                    </div>
                </a>
            @else
                <a href="{{ route('dashboard.apply-for-scholarship') }}">
                    <div class="inner__menu_links_link @if(Route::is('dashboard.apply-for-scholarship')) active @endif">
                        <img src="{{ asset('files/images/public-part/icon.png') }}" class="scholarship" alt="">
                        <p>{{ __('Apliciraj za stipendiju') }}</p>
                    </div>
                </a>
            @endif
            <a href="{{ route('dashboard.inbox') }}">
                <div class="inner__menu_links_link @if(Route::is('dashboard.inbox')) active @endif">
                    <img src="{{ asset('files/images/public-part/inbox.png') }}" class="inbox" alt="">
                    <p>{{ __('Inbox') }}</p>
                </div>
            </a>
{{--                Auth()->user()->role == 'presenter' or--}}
            @if( (Auth()->user()->role == 'user' and Auth()->user()->myProgram()))
                <a href="{{ route('dashboard.my-schedule') }}">
                    <div class="inner__menu_links_link @if(Route::is('dashboard.my-schedule')) active @endif">
                        <img src="{{ asset('files/images/public-part/raspored.png') }}" class="schedule" alt="">
                        <p>{{ __('Raspored') }}</p>
                    </div>
                </a>
            @endif
        </div>
    </div>
</div>
