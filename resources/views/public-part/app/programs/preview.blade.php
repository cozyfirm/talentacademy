@extends('public-part.layout.layout')

<!-- Title of page -->
@section('title') {{ $program->title }} @endsection

<!-- Page content -->
@section('public-content')
    <div class="preview__cover preview__cover_{{ CommonHelper::getBcgColor($program->id) }}">
        <div class="preview__cover_iw">
            <div class="p__c_iw_img">
                <img src="{{ asset($program->imageRel->getFile()) }}" alt="">
            </div>
            <div class="p__c_iw_text">
                <h1> {{ $program->title }} </h1>
                <p> {!! nl2br($program->description) !!} </p>

                <div class="p__c_iw_buttons">
                    @if($program->isSubmitted())
                        @if($program->acceptedStatus() == 'in_queue')
                            <a href="#">
                                <button class="my-c-btn">{{ __('Aplikacija poslana') }}</button>
                            </a>
                        @elseif($program->acceptedStatus() == 'accepted')
                            <a href="#">
                                <button class="my-c-btn">{{ __('Aplikacija prihvaćena') }}</button>
                            </a>
                        @else
                            <a href="#">
                                <button class="my-c-btn">{{ __('Aplikacija odbijena') }}</button>
                            </a>
                        @endif
                    @else
                        @if(!$appTimePassed)
                            <a href="{{ route('public-part.programs.apply-for-scholarship', ['id' => $program->id ]) }}">
                                <button class="my-c-btn">{{ __('Apliciraj za stipendiju') }}</button>
                            </a>
                        @endif
                    @endif
                    <a href="{{ route('public-part.programs.more-about', ['id' => $program->id ]) }}">
                        <button class="my-c-btn">{{ __('Detaljno o programu') }}</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('public-part.app.base-includes.presenters.presenters_scroll')

    @if(Auth()->check())
        <!-- Sessions for logged user -->
        @include('public-part.app.programs.includes.sessions')
    @else
        <!-- Programs preview -->
        @include('public-part.app.base-includes.programs.grid')
    @endif

    <!-- Blog section; Scroll-bar lattest news -->
    @include('public-part.app.base-includes.blog.blog_scroll')

    <!-- Generic element; How to apply -->
    <div class="how-to-apply how-to-apply_{{ CommonHelper::getBcgColor($program->id) }} how-to-apply-bg-white">
        @include('public-part.app.base-includes.generic.how-to-apply')
    </div>

    @if(!$appTimePassed)
        <!-- Counter -->
        <div class="preview__counter preview__counter_{{ CommonHelper::getBcgColor($program->id) }}">
            <div class="preview__counter_iw">
                <h1>{{ __('Rok za prijavu aplikacija:') }}</h1>
                <h1> {{ CommonHelper::getAppDate() }} </h1>

                <p> {{ __("Vaše aplikacije prihvatamo do ") . CommonHelper::getAppDate() . __(" godine. Ne propusti priliku da apliciraš za jedan od programa Helem Nejse Talent Akademije. ") }} </p>

                <div class="counter__w">
                    <div class="c__num"> <p class="c__month"></p> </div>
                    <span>:</span>
                    <div class="c__num"> <p class="c__day"></p> </div>
                    <span>:</span>
                    <div class="c__num"> <p class="c__hour"></p> </div>
                    <span>:</span>
                    <div class="c__num"> <p class="c__min"></p> </div>
                </div>

                <div class="counter__btn">
                    <a href="@if(!$program->isSubmitted()) {{ route('public-part.programs.apply-for-scholarship', ['id' => $program->id ]) }} @else # @endif">
                        <button class="app_btn">
                            <img src="{{ asset('files/images/public-part/app-btn.png') }}" alt="">
                            @if($program->isSubmitted())
                                @if($program->acceptedStatus() == 'in_queue')
                                    <p>{{ __('Aplikacija poslana') }}</p>
                                @elseif($program->acceptedStatus() == 'accepted')
                                    <p>{{ __('Aplikacija prihvaćena') }}</p>
                                @else
                                    <p>{{ __('Aplikacija odbijena') }}</p>
                                @endif
                            @else
                                <p>{{ __('Apliciraj za stipendiju') }}</p>
                            @endif
                        </button>
                    </a>
                </div>
            </div>
        </div>
    @endif

    <div class="snake">
        <img src="{{ asset('/files/images/public-part/snake/snake_'.($program->id).'.svg') }}" alt="{{ __('Snake') }}" class="snake__image">
        <img src="{{ asset('/files/images/public-part/snake/snake_mob_'.($program->id).'.svg') }}" alt="{{ __('Snake mobile') }}" class="snake__image snake__image--mobile">
    </div>

    <!-- FAQ section -->
    @include('public-part.app.base-includes.generic.faq')

    <!-- All 6 programs -->
    @include('public-part.app.base-includes.programs.all')

    <!-- Contact us form -->
    <div class="contact-us contact-us-program cu_{{ CommonHelper::getBcgColor($program->id) }}">
        @include('public-part.app.base-includes.generic.contact-us')
    </div>
@endsection
