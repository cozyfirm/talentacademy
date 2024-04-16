<div class="inner__menu_w">
    <div class="inner__menu">
        <div class="inner__menu_profile">
            <a href="{{ route('dashboard.my-profile') }}">
                <div class="inner__menu_profile_img_w">
                    <img src="{{ asset('files/images/public-part/users/aladeen.jpg') }}" alt="">
                </div>
                <p> John Doe </p>
            </a>
        </div>
        <div class="inner__menu_links">
            <a href="#">
                <div class="inner__menu_links_link">
                    <img src="{{ asset('files/images/public-part/icon.png') }}" class="scholarship" alt="">
                    <p>{{ __('Apliciraj za stipendiju') }}</p>
                </div>
            </a>
            <a href="#">
                <div class="inner__menu_links_link">
                    <img src="{{ asset('files/images/public-part/inbox.png') }}" class="inbox" alt="">
                    <p>{{ __('Inbox') }}</p>
                </div>
            </a>
            <a href="#">
                <div class="inner__menu_links_link">
                    <img src="{{ asset('files/images/public-part/raspored.png') }}" class="schedule" alt="">
                    <p>{{ __('Raspored') }}</p>
                </div>
            </a>
        </div>
    </div>
</div>
