@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <div class="white__wrapper">
        <div class="profile__wrapper">
            @include('public-part.dashboard.includes.left-side')

            <div class="profile__wrapper_right profile__wrapper_right_inbox">
                <div class="inbox_wrapper">
                    @foreach($messages as $message)
                        <div class="msg_wrapper" attr-id="{{ $message->id }}">
                            <div class="msg_header msg_header_{{ $message->messageRel->what ?? '' }}">
                                <div class="msg_from">
                                    @if($message->read)
                                        <img class="msg__img" src="{{ asset('files/images/public-part/msgtag.png') }}" alt="">
                                    @else
                                        <img class="msg__img" src="{{ asset('files/images/public-part/msgtag-full.png') }}" alt="">
                                    @endif
                                    <h5>{{ $message->messageRel->fromRel->name ?? '' }}</h5>
                                </div>
                                <div class="msg_title">
                                    <p> {{ $message->messageRel->title ?? '' }} </p>
                                </div>
                                <div class="msg_arrow">
                                    <i class="fas fa-arrow fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="msg_body d-none">
                                <p>{!! nl2br($message->messageRel->content ?? '') !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="inbox__pagination">
                    {{$messages->links("pagination::bootstrap-4")}}
                </div>
            </div>
        </div>
    </div>
@endsection
