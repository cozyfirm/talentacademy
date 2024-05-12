<!-- Presenters -->
<div class="presenters__scroll_wrapper presenters__scroll_wrapper_{{ $program->id }}">
    <div class="generic__header generic__header_{{ $program->id }}">
        <h2>{{ __('Predavači') }}</h2>
        <a href="{{ route('public-part.lecturers.lecturers') }}">
            <button class="gh_button">{{ __('Svi predavači') }}</button>
        </a>
    </div>
    <div class="presenters__scroll_iw">
        <div class="presenters__scroll_body">
            @foreach($program->uniquePresenterSessions() as $presenter)
                <div class="presenters__scroll_single" uri="{{ route('public-part.lecturers.single-lecturer', ['id' => $presenter->id]) }}">
                    <div class="img_wrapper">
                        <img src="{{ asset('files/images/public-part/users/' . ($presenter->presenterRel->photo_uri ?? '') ) }}" alt="">
                    </div>

                    <div class="p__s_s_btn">
                        <button class="sp__btn"> {{ $presenter->presenterRel->presenter_role ?? '' }} </button>
                    </div>

                    <div class="sp__text_w">
                        <h1> {{ $presenter->presenterRel->name ?? '' }} </h1>
                        <h2> {{ $presenter->presenterRel->institution ?? '' }} </h2>
                        <p> {{ $presenter->presenterRel->short_description ?? '' }} </p>
                    </div>

                    <div class="sp__icons_w">
                        @if(isset($presenter->presenterRel) and $presenter->presenterRel->linkedin != '')
                            <a href="{{  $presenter->presenterRel->linkedin }}" target="_blank">
                                <img src="{{ asset('files/images/public-part/in.png') }}" alt="">
                            </a>
                        @endif
                        @if(isset($presenter->presenterRel) and $presenter->presenterRel->twitter != '')
                            <a href="{{  $presenter->presenterRel->twitter }}" target="_blank">
                                <img src="{{ asset('files/images/public-part/twitter.png') }}" alt="">
                            </a>
                        @endif
                        @if(isset($presenter->presenterRel) and $presenter->presenterRel->web != '')
                            <a href="{{  $presenter->presenterRel->web }}" target="_blank">
                                <img src="{{ asset('files/images/public-part/basket.png') }}" alt="">
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="presenters__navigation">
            <div class="presenters__navigation-buttons">
                <button class="presenters__navigation-button pps_btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="16" viewBox="0 0 34 16" fill="none">
                        <path d="M9.32 5.0516L1 9.77621L9.32 14.06M9.32 9.93879C11.0656 10.0969 10.958 9.96669 12.7084 10.1248C13.2561 10.1759 13.8184 10.2224 14.3415 10.0643C14.9723 9.87369 15.4661 9.40871 15.9306 8.95768C18.6835 6.26079 19.9009 4.31717 22.4582 1.44824C21.5829 5.79116 18.8693 12.8589 18.8693 12.8589H33" stroke="#070600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <button class="presenters__navigation-button nps_btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="16" viewBox="0 0 34 16" fill="none">
                        <path d="M24.68 5.0516L33 9.77621L24.68 14.06M24.68 9.93879C22.9344 10.0969 23.042 9.96669 21.2916 10.1248C20.7439 10.1759 20.1816 10.2224 19.6585 10.0643C19.0277 9.87369 18.5339 9.40871 18.0694 8.95768C15.3165 6.26079 14.0991 4.31717 11.5418 1.44824C12.4171 5.79116 15.1307 12.8589 15.1307 12.8589H0.999999" stroke="#070600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>


<div class="presenters__scrollbar presenters__scrollbar_{{ $program->id }}">
    <div class="generic__header generic__header_{{ $program->id }}">
        <h2>{{ __('Predavači') }}</h2>
        <a href="{{ route('public-part.lecturers.lecturers') }}">
            <button class="gh_button">{{ __('Svi predavači') }}</button>
        </a>
    </div>

    <div class="presenters__scrollbar_w slider_w">
        @foreach($program->uniquePresenterSessions() as $presenter)
            <div class="single__presenter item1" uri="{{ route('public-part.lecturers.single-lecturer', ['id' => $presenter->id]) }}">
                <div class="sp__image">
                    <img src="{{ asset('files/images/public-part/users/' . ($presenter->presenterRel->photo_uri ?? '') ) }}" alt="">
                </div>
                <div class="sp__btn_w">
                    <button class="sp__btn"> {{ $presenter->presenterRel->presenter_role ?? '' }} </button>
                </div>
                <div class="sp__text_w">
                    <h1> {{ $presenter->presenterRel->name ?? '' }} </h1>
                    <h2> {{ $presenter->presenterRel->institution ?? '' }} </h2>
                    <p> {{ $presenter->presenterRel->short_description ?? '' }} </p>
                </div>
                <div class="sp__icons_w">
                    @if(isset($presenter->presenterRel) and $presenter->presenterRel->linkedin != '')
                        <a href="{{  $presenter->presenterRel->linkedin }}" target="_blank">
                            <img src="{{ asset('files/images/public-part/in.png') }}" alt="">
                        </a>
                    @endif
                    @if(isset($presenter->presenterRel) and $presenter->presenterRel->twitter != '')
                        <a href="{{  $presenter->presenterRel->twitter }}" target="_blank">
                            <img src="{{ asset('files/images/public-part/twitter.png') }}" alt="">
                        </a>
                    @endif
                    @if(isset($presenter->presenterRel) and $presenter->presenterRel->web != '')
                        <a href="{{  $presenter->presenterRel->web }}" target="_blank">
                            <img src="{{ asset('files/images/public-part/basket.png') }}" alt="">
                        </a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <div class="presenters__scrollbar_btn_w">
        <div class="p__sbw_btn p__sbw_btn_previous">
            <img src="{{ asset('files/images/public-part/arrow-left.png') }}" alt="">
        </div>
        <div class="p__sbw_btn p__sbw_btn_next">
            <img src="{{ asset('files/images/public-part/arrow-right.png') }}" alt="">
        </div>
    </div>
</div>


