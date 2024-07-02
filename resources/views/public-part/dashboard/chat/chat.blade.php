@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <!-- Dashboard inner menu -->
    @include('public-part.dashboard.includes.inner-menu')

    <div class="chat__wrapper">
        <div class="conversations__wrapper">
            <div class="left__conversations__wrapper group__chats__wrapper">
                <div class="lcw__header">
                    <p>{{ __('Info i group chats') }}</p>
                </div>

                <div class="lcw__body gcw__body">
                    <div class="conversation__item">
                        <div class="conversation__img">
                            <img src="{{ asset('files/images/public-part/info.png') }}" alt="">
                        </div>
                        <p>{{ __('Akademija info') }}</p>
                    </div>
                    <div class="conversation__item">
                        <div class="conversation__img">
                            <img src="{{ asset('files/images/public-part/department.png') }}" alt="">
                        </div>
                        <p>{{ __('Moj odsjek') }}</p>
                    </div>
                    <div class="conversation__item">
                        <div class="conversation__img">
                            <img src="{{ asset('files/images/public-part/wall.png') }}" alt="">
                        </div>
                        <p>{{ __('Akademija wall') }}</p>
                    </div>
                </div>
            </div>

            <div class="my__contacts__wrapper">
                <div class="lcw__header">
                    <p>{{ __('Info i group chats') }}</p>
                </div>

                <div class="all__chats">
                    @foreach($teamMates as $teamMate)
                        @if($teamMate->id != Auth()->user()->id )
                            <div class="conversation__item start__conversation" user-id="{{ $teamMate->id }}">
                                <div class="conversation__img">
                                    @if(isset($teamMate->photo_uri))
                                        <img src="{{ asset('files/images/public-part/users/' . ($teamMate->photo_uri)) }}" alt="{{ __('Profile image') }}">
                                    @else
                                        <img class="cover-image" src="{{ asset('files/images/public-part/silhouette.png') }}" alt="{{ __('Profile image') }}">
                                    @endif
                                </div>
                                <p>{{ $teamMate->name }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="conversation__wrapper" id="conversation-wrapper" hash="">
            <div class="conversation__wrapper__header">
                <div class="profile_img_wrapper">
                    <img id="chat-photo" src="{{ asset('files/images/public-part/users/8750ef071285fb7c5efc1d25c40572a5.jpeg' ) }}" alt="{{ __('Profile image') }}">
                </div>
                <h4 id="chat-title">Naima Čano</h4>
            </div>

            <div class="conversation__wrapper__body">
                @for($i=0; $i<0; $i++)
                    <div class="user__message__w">
                        <div class="message__w">
                            <div class="message_img_w">
                                <img src="{{ asset('files/images/public-part/users/8750ef071285fb7c5efc1d25c40572a5.jpeg' ) }}" alt="{{ __('Profile image') }}">
                            </div>
                            <div class="message">
                                <p>Hello mate, that's me :) What do you think about this one? Do you love it ?</p>
                            </div>
                        </div>
                    </div>
                    <div class="user__message__w my__message__w">
                        <div class="message__w">
                            <div class="message">
                                <p>Hello mate, that's me :) What do you think about this one? Do you love it ?</p>
                            </div>
                            <div class="message_img_w">
                                <img src="{{ asset('files/images/public-part/users/' . (Auth()->user()->photo_uri)) }}" alt="">
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="conversation__wrapper__new_msg">
                <textarea id="chat-message" name="message" id="message" placeholder="{{ __('Vaša poruka...') }}"></textarea>
                <img id="send-chat-message" src="{{ asset('files/images/public-part/new-message.png' ) }}" alt="{{ __('Profile image') }}">
            </div>
        </div>
    </div>
@endsection
