<div class="program__timeline program__timeline_{{ $program->id }}" id="program-sessions">
    <div class="program__timeline__sessions_sticky sticky">
        <div class="program__timeline-section dark">
            <div class="program__timeline-container">
                <div class="program__timeline-top">
                    <div class="program__timeline-top-left">
                        <div class="program__timeline-top-left-category">
                            {{ $program->title }}
                        </div>
                        <div class="program__timeline-top-left-title">
                            {{ __('Program') }}
                        </div>
                    </div>
                    <div class="program__timeline-top-right">
                        @foreach($program->uniqueDateSessions() as $dates)
{{--                            href="{{ route('public-part.programs.preview-program-date', ['id' => $program->id, 'date' => $dates->date]) }}"--}}
                            <a class="fetch-private-sessions" date="{{ $dates->date }}" program-id="{{ $program->id }}">
                                <div class="program__timeline-top-right-day">
                                    <div class="program__timeline-top-right-day-number @if($currentDay->date == $dates->date) active @endif">
                                        {{ $dates->getDay() }}
                                    </div>
                                    <div class="program__timeline-top-right-day-text @if($currentDay->date == $dates->date) active @endif">{{ $dates->getWeekDay() }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="program__timeline-section sticky">
            <div class="program__timeline-container">
                <div class="program__timeline-header">
                    <h3 class="program__timeline-header-title">Dan {{ $currentDay->getDayInOrder() }}</h3>
                    <div class="program__timeline-header-date">
                        {{ $currentDay->getFullWeekDay() }}, {{ $currentDay->date() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="program__timeline-section" id="lu__sessions_wrapper">
        <div class="program__timeline-container">
            <div class="program__timeline-items">
                @foreach($sessions as $session)
                    <div class="program__timeline-item">
                        <div class="program__timeline-item-left">
                            <div class="program__timeline-item-left-time">
                                {{ $session->timeFrom() }}
                            </div>
                            <div class="program__timeline-item-left-tag"> {{ $session->type }} </div>
                            <div class="program__timeline-item-left-length">
                                <img src="{{ asset('files/images/svg-icons/time.svg') }}" alt="">
                                <div class="program__timeline-item-left-rectangle"></div>
                                <div class="program__timeline-item-left-duration">{{ $session->duration }} min</div>
                            </div>
                        </div>
                        <div class="program__timeline-item-right">
                            <a href="{{ route('public-part.programs.preview-session', ['id' => $session->id]) }}">
                                <h2 class="program__timeline-item-right-title"> {{ $session->title }} </h2>
                            </a>
                            @if($session->presenter_id)
                                <div class="program__timeline-item-right-item">
                                    <div class="program__timeline-item-right-item-icon">
                                        <img src="{{ asset('files/images/svg-icons/program-item-icon-name.svg') }}" alt="">
                                    </div>
                                    <div class="program__timeline-item-right-item-text">
                                        {{ $session->presenterRel->name ?? '' }}
                                    </div>
                                </div>
                            @endif
                            <div class="program__timeline-item-right-item">
                                <div class="program__timeline-item-right-item-icon">
                                    <img src="{{ asset('files/images/svg-icons/program-item-icon-location.svg') }}" alt="">
                                </div>
                                <div class="program__timeline-item-right-item-text">
                                    {{ $session->locationRel->title ?? '' }}
                                </div>
                            </div>
                            <p class="program__timeline-item-right-description"> {{ $session->short_description }} </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
