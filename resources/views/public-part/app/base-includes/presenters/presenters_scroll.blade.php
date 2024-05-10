<!-- Presenters -->
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
                    <button class="sp__btn">{{ __('Keynote speaker') }}</button>
                </div>
                <div class="sp__text_w">
                    <h1> {{ $presenter->presenterRel->name ?? '' }} </h1>
                    <h2> {{ $presenter->presenterRel->title ?? '' }} </h2>
                    <p> {{ $presenter->short_description ?? '' }} </p>
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
