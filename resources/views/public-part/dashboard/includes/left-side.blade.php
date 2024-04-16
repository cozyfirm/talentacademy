<div class="profile__wrapper_left">
    <div class="p__w_l_img_w">
        <form action="{{ route('dashboard.update-profile-image') }}" method="POST" id="update-profile-image" enctype="multipart/form-data">
            @csrf
            <img src="{{ asset('files/images/public-part/users/' . (Auth()->user()->photo_uri)) }}" alt="">
            <label for="photo_uri" class="edit-your-photo">
                <i class="fas fa-edit"></i>
                <p>{{ __('Uredite') }}</p>
            </label>
            <input name="photo_uri" class="form-control form-control-lg d-none" id="photo_uri" type="file">
        </form>
    </div>

    <div class="p__w_l_links_w">
        <h5>{{ __('Društvene mreže') }}</h5>

        <div class="social_network_wrapper instagram">
            <a href="{{ route('dashboard.edit-links', ['link' => 'instagram']) }}">
                <p>{{ __('Instagram') }}</p>
            </a>
        </div>
        <div class="social_network_wrapper facebook">
            <a href="{{ route('dashboard.edit-links', ['link' => 'facebook']) }}">
                <p>{{ __('Facebook') }}</p>
            </a>
        </div>
        <div class="social_network_wrapper twitter">
            <a href="{{ route('dashboard.edit-links', ['link' => 'twitter']) }}">
                <p>{{ __('Twitter') }}</p>
            </a>
        </div>
        <div class="social_network_wrapper web">
            <a href="{{ route('dashboard.edit-links', ['link' => 'web']) }}">
                <p>{{ __('Web') }}</p>
            </a>
        </div>

        <p class="share-your-links">{{ __('Podijelite Vaše društvene mreže sa ostalim članovima Akademije!') }}</p>
    </div>
</div>
