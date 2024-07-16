@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Chat scripts -->
@section('js-scripts') @vite(['resources/js/public-part/chat/chat.js']) @endsection

<!-- Page content -->
@section('public-content')
    <!-- loggedUserID -->
    {{ html()->hidden('loggedUserID')->class('form-control')->id('loggedUserID')->value(Auth()->user()->id) }}

    <div class="chat__wrapper">
        <div class="conversations__wrapper">
            <div class="left__conversations__wrapper group__chats__wrapper">
                <div class="lcw__header">
                    <p>{{ __('Info i group chats') }}</p>
                </div>

                <div class="lcw__body gcw__body">
                    @foreach($groups as $group)
                        <div class="conversation__item start-group-conversations" hash="{{ $group->hash }}">
                            <div class="conversation__img">
                                <img src="{{ asset('files/images/public-part/info.png') }}" alt="">
                            </div>
                            <p>{{ $group->name }}</p>
                        </div>
                    @endforeach

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

        <div class="conversation__wrapper" id="conversation-wrapper" hash="{{ $firstConversation->hash }}">
            <div class="conversation__wrapper__header">
                <div class="arrow__back">
                    <img src="{{ asset('files/images/public-part/arrow-back.png' ) }}" alt="{{ __('Zatvorite') }}">
                </div>
                <div class="profile_img_wrapper">
                    @if($firstConversation->is_group)
                        <img id="chat-photo" src="{{ asset('files/images/public-part/users/silhouette.png' ) }}" alt="{{ __('Profile image') }}">
                    @elseif(isset($user))
                        <img id="chat-photo" src="{{ asset('files/images/public-part/users/' . $user->photo_uri ) }}" alt="{{ __('Profile image') }}">
                    @endif
                </div>
                <h4 id="chat-title">
                    @if($firstConversation->is_group)
                        {{ $firstConversation->name }}
                    @elseif(isset($user))
                        {{ $user->name  }}
                    @endif
                </h4>
            </div>

            <div class="conversation__wrapper__body">
                @foreach($messages as $message)
                    @if($message->sender_id == Auth()->user()->id)
                        <div class="user__message__w my__message__w">
                            <div class="message__w">
                                <div class="message">
                                    <p>{{ $message->body }}</p>
                                </div>
                                <div class="message_img_w">
                                    <img src="{{ asset('files/images/public-part/users/' . ($message->senderRel->photoUri()) ) }}" alt="{{ __('Profile image') }}">
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="user__message__w">
                            <div class="message__w">
                                <div class="message_img_w">
                                    <img src="{{ asset('files/images/public-part/users/' . ($message->senderRel->photoUri()) ) }}" alt="{{ __('Profile image') }}">
                                </div>
                                <div class="message">
                                    <p>{{ $message->body }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="conversation__wrapper__new_msg">
                <textarea id="chat-message" name="message" id="message" placeholder="{{ __('Vaša poruka...') }}"></textarea>
                <div class="send__chat_msg_img_w" id="send-chat-message">
                    <img src="{{ asset('files/images/public-part/new-message.png' ) }}" alt="{{ __('Profile image') }}">
                </div>
            </div>
        </div>
    </div>
@endsection
