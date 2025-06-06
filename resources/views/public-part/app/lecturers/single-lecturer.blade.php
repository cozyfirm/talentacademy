@extends('public-part.layout.layout')

@section('title'){{ $lecturer->name }}@endsection
@section('meta_uri'){{ route('public-part.lecturers.single-lecturer', ['id' => $lecturer->id]) }}@endsection
@section('meta_title'){{ $lecturer->name }}@endsection
@section('meta_desc'){{ $lecturer->short_description }}@endsection
@section('meta_img'){{ asset('files/images/public-part/users/' . ($lecturer->photo_uri)) }}@endsection

<!-- Page content -->
@section('public-content')
    <div class="single-lecturer__featured">
        <div class="single-lecturer__container">
            <img src="{{ asset('files/images/public-part/users/' . ($lecturer->photo_uri)) }}">
            <div class="single-lecturer__featured-content">
                <div class="single-lecturer__featured-category">{{ $lecturer->presenter_role }}</div>
                <h2>{{ $lecturer->name }}</h2>
                <div class="single-lecturer__featured-subtitle">{{ $lecturer->title }}</div>
                <div class="single-lecturer__featured-shortbio"> {{ $lecturer->institution }} </div>
                <div class="single-lecturer__featured-icons">
                    @if($lecturer->linkedin != '')
                        <a href="{{ $lecturer->linkedin }}" target="_blank" class="single-lecturer__featured-icon">
                            <img src="{{ asset('files/images/svg-icons/linkedin.svg') }}" alt="Linkedin icon">
                        </a>
                    @endif
                    @if($lecturer->twitter != '')
                        <a href="{{ $lecturer->twitter }}" target="_blank" class="single-lecturer__featured-icon">
                            <img src="{{ asset('files/images/svg-icons/x.svg') }}" alt="X icon">
                        </a>
                    @endif
                    @if($lecturer->web != '')
                        <a href="{{ $lecturer->web }}" target="_blank" class="single-lecturer__featured-icon">
                            <img src="{{ asset('files/images/svg-icons/dribble.svg') }}" alt="Dribble icon">
                        </a>
                    @endif
                </div>
                <p> {!! nl2br($lecturer->short_description) !!} </p>
            </div>
        </div>
    </div>
    <div class="single-lecturer__about">
        <div class="single-lecturer__container">
            <h2>{{ __('O predavaču') }}</h2>
            <p> {!! nl2br($lecturer->description) !!} </p>
        </div>
    </div>
    @if($lecturer->interview != '')
        <div class="single-lecturer__interview">
            <div class="single-lecturer__container">
                <h2>{{ __('Intervju') }}</h2>
                <p class="question">{!! nl2br($lecturer->interview) !!} </p>
            </div>
        </div>
    @endif

    @if(isset($offlineSessions))
        <!-- Programs preview -->
        @include('public-part.app.base-includes.programs.grid')
    @else
        <!-- A bit of difference from program in data structure -->
        <div class="program__timeline program__timeline_{{ CommonHelper::getBcgColor($program->id) }}">
            <div class="program__timeline__sessions_sticky sticky">
                <div class="program__timeline-section dark">
                    <div class="program__timeline-container">
                        <div class="program__timeline-top">
                            <div class="program__timeline-top-left">
                                <div class="program__timeline-top-left-category">
                                    {{ $program->title }}
                                </div>
                                <div class="program__timeline-top-left-title">
                                    {{ __('Sesije predavača') }}
                                </div>
                            </div>
                            <div class="program__timeline-top-right">
                                @foreach($program->uniqueLecturerDateSessions($lecturer->id) as $dates)
                                    <a class="program__timeline-top-right__click" lecturer-id="{{ $lecturer->id }}" date="{{ $dates->date }}">
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
            <div class="program__timeline-section">
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M24 12C24 12.2652 23.8946 12.5196 23.7071 12.7071C23.5196 12.8946 23.2652 13 23 13C22.7348 13 22.4804 12.8946 22.2929 12.7071C22.1054 12.5196 22 12.2652 22 12C21.9971 9.34873 20.9426 6.80688 19.0679 4.93215C17.1931 3.05742 14.6513 2.00291 12 2C11.7348 2 11.4804 1.89464 11.2929 1.70711C11.1054 1.51957 11 1.26522 11 1C11 0.734784 11.1054 0.48043 11.2929 0.292893C11.4804 0.105357 11.7348 0 12 0C15.1815 0.00344108 18.2318 1.26883 20.4815 3.51852C22.7312 5.76821 23.9966 8.81846 24 12ZM16 13C16.2652 13 16.5196 12.8946 16.7071 12.7071C16.8946 12.5196 17 12.2652 17 12C17 11.7348 16.8946 11.4804 16.7071 11.2929C16.5196 11.1054 16.2652 11 16 11H13.723C13.5487 10.7004 13.2996 10.4513 13 10.277V7C13 6.73478 12.8946 6.48043 12.7071 6.29289C12.5196 6.10536 12.2652 6 12 6C11.7348 6 11.4804 6.10536 11.2929 6.29289C11.1054 6.48043 11 6.73478 11 7V10.277C10.7348 10.4297 10.5083 10.6414 10.338 10.8958C10.1677 11.1501 10.0583 11.4402 10.0182 11.7436C9.97807 12.047 10.0083 12.3556 10.1066 12.6454C10.2049 12.9353 10.3686 13.1986 10.585 13.415C10.8014 13.6314 11.0647 13.7951 11.3546 13.8934C11.6444 13.9917 11.953 14.0219 12.2564 13.9818C12.5598 13.9417 12.8499 13.8323 13.1042 13.662C13.3586 13.4917 13.5703 13.2652 13.723 13H16ZM1.827 6.784C1.62922 6.784 1.43588 6.84265 1.27143 6.95253C1.10698 7.06241 0.978809 7.21859 0.903121 7.40132C0.827433 7.58404 0.80763 7.78511 0.846215 7.97909C0.8848 8.17307 0.980041 8.35125 1.11989 8.49111C1.25975 8.63096 1.43793 8.7262 1.63191 8.76478C1.82589 8.80337 2.02696 8.78357 2.20968 8.70788C2.39241 8.63219 2.54859 8.50402 2.65847 8.33957C2.76835 8.17512 2.827 7.98178 2.827 7.784C2.827 7.51878 2.72164 7.26443 2.53411 7.07689C2.34657 6.88936 2.09222 6.784 1.827 6.784ZM2 12C2 11.8022 1.94135 11.6089 1.83147 11.4444C1.72159 11.28 1.56541 11.1518 1.38268 11.0761C1.19996 11.0004 0.998891 10.9806 0.80491 11.0192C0.610929 11.0578 0.432746 11.153 0.292894 11.2929C0.153041 11.4327 0.0578004 11.6109 0.0192152 11.8049C-0.0193701 11.9989 0.000433281 12.2 0.0761209 12.3827C0.151809 12.5654 0.279981 12.7216 0.44443 12.8315C0.608879 12.9414 0.802219 13 1 13C1.26522 13 1.51957 12.8946 1.70711 12.7071C1.89464 12.5196 2 12.2652 2 12ZM12 22C11.8022 22 11.6089 22.0586 11.4444 22.1685C11.28 22.2784 11.1518 22.4346 11.0761 22.6173C11.0004 22.8 10.9806 23.0011 11.0192 23.1951C11.0578 23.3891 11.153 23.5673 11.2929 23.7071C11.4327 23.847 11.6109 23.9422 11.8049 23.9808C11.9989 24.0194 12.2 23.9996 12.3827 23.9239C12.5654 23.8482 12.7216 23.72 12.8315 23.5556C12.9414 23.3911 13 23.1978 13 23C13 22.7348 12.8946 22.4804 12.7071 22.2929C12.5196 22.1054 12.2652 22 12 22ZM4.221 3.207C4.02322 3.207 3.82988 3.26565 3.66543 3.37553C3.50098 3.48541 3.37281 3.64159 3.29712 3.82432C3.22143 4.00704 3.20163 4.20811 3.24022 4.40209C3.2788 4.59607 3.37404 4.77425 3.51389 4.91411C3.65375 5.05396 3.83193 5.1492 4.02591 5.18779C4.21989 5.22637 4.42096 5.20657 4.60368 5.13088C4.78641 5.05519 4.94259 4.92702 5.05247 4.76257C5.16235 4.59812 5.221 4.40478 5.221 4.207C5.221 3.94178 5.11564 3.68743 4.92811 3.49989C4.74057 3.31236 4.48622 3.207 4.221 3.207ZM7.779 0.841C7.58122 0.841 7.38788 0.899649 7.22343 1.00953C7.05898 1.11941 6.93081 1.27559 6.85512 1.45832C6.77943 1.64104 6.75963 1.84211 6.79822 2.03609C6.8368 2.23007 6.93204 2.40825 7.07189 2.54811C7.21175 2.68796 7.38993 2.7832 7.58391 2.82179C7.77789 2.86037 7.97896 2.84057 8.16168 2.76488C8.34441 2.68919 8.50059 2.56102 8.61047 2.39657C8.72035 2.23212 8.779 2.03878 8.779 1.841C8.779 1.57578 8.67364 1.32143 8.48611 1.13389C8.29857 0.946357 8.04422 0.841 7.779 0.841ZM1.827 15.216C1.62922 15.216 1.43588 15.2746 1.27143 15.3845C1.10698 15.4944 0.978809 15.6506 0.903121 15.8333C0.827433 16.016 0.80763 16.2171 0.846215 16.4111C0.8848 16.6051 0.980041 16.7833 1.11989 16.9231C1.25975 17.063 1.43793 17.1582 1.63191 17.1968C1.82589 17.2354 2.02696 17.2156 2.20968 17.1399C2.39241 17.0642 2.54859 16.936 2.65847 16.7716C2.76835 16.6071 2.827 16.4138 2.827 16.216C2.827 15.9508 2.72164 15.6964 2.53411 15.5089C2.34657 15.3214 2.09222 15.216 1.827 15.216ZM4.221 18.793C4.02322 18.793 3.82988 18.8516 3.66543 18.9615C3.50098 19.0714 3.37281 19.2276 3.29712 19.4103C3.22143 19.593 3.20163 19.7941 3.24022 19.9881C3.2788 20.1821 3.37404 20.3603 3.51389 20.5001C3.65375 20.64 3.83193 20.7352 4.02591 20.7738C4.21989 20.8124 4.42096 20.7926 4.60368 20.7169C4.78641 20.6412 4.94259 20.513 5.05247 20.3486C5.16235 20.1841 5.221 19.9908 5.221 19.793C5.221 19.5278 5.11564 19.2734 4.92811 19.0859C4.74057 18.8984 4.48622 18.793 4.221 18.793ZM7.779 21.159C7.58122 21.159 7.38788 21.2176 7.22343 21.3275C7.05898 21.4374 6.93081 21.5936 6.85512 21.7763C6.77943 21.959 6.75963 22.1601 6.79822 22.3541C6.8368 22.5481 6.93204 22.7263 7.07189 22.8661C7.21175 23.006 7.38993 23.1012 7.58391 23.1398C7.77789 23.1784 7.97896 23.1586 8.16168 23.0829C8.34441 23.0072 8.50059 22.879 8.61047 22.7146C8.72035 22.5501 8.779 22.3568 8.779 22.159C8.779 21.8938 8.67364 21.6394 8.48611 21.4519C8.29857 21.2644 8.04422 21.159 7.779 21.159ZM22.173 15.216C21.9752 15.216 21.7819 15.2746 21.6174 15.3845C21.453 15.4944 21.3248 15.6506 21.2491 15.8333C21.1734 16.016 21.1536 16.2171 21.1922 16.4111C21.2308 16.6051 21.326 16.7833 21.4659 16.9231C21.6057 17.063 21.7839 17.1582 21.9779 17.1968C22.1719 17.2354 22.373 17.2156 22.5557 17.1399C22.7384 17.0642 22.8946 16.936 23.0045 16.7716C23.1144 16.6071 23.173 16.4138 23.173 16.216C23.173 15.9508 23.0676 15.6964 22.8801 15.5089C22.6926 15.3214 22.4382 15.216 22.173 15.216ZM19.779 18.793C19.5812 18.793 19.3879 18.8516 19.2234 18.9615C19.059 19.0714 18.9308 19.2276 18.8551 19.4103C18.7794 19.593 18.7596 19.7941 18.7982 19.9881C18.8368 20.1821 18.932 20.3603 19.0719 20.5001C19.2117 20.64 19.3899 20.7352 19.5839 20.7738C19.7779 20.8124 19.979 20.7926 20.1617 20.7169C20.3444 20.6412 20.5006 20.513 20.6105 20.3486C20.7204 20.1841 20.779 19.9908 20.779 19.793C20.779 19.5278 20.6736 19.2734 20.4861 19.0859C20.2986 18.8984 20.0442 18.793 19.779 18.793ZM16.221 21.159C16.0232 21.159 15.8299 21.2176 15.6654 21.3275C15.501 21.4374 15.3728 21.5936 15.2971 21.7763C15.2214 21.959 15.2016 22.1601 15.2402 22.3541C15.2788 22.5481 15.374 22.7263 15.5139 22.8661C15.6537 23.006 15.8319 23.1012 16.0259 23.1398C16.2199 23.1784 16.421 23.1586 16.6037 23.0829C16.7864 23.0072 16.9426 22.879 17.0525 22.7146C17.1624 22.5501 17.221 22.3568 17.221 22.159C17.221 21.8938 17.1156 21.6394 16.9281 21.4519C16.7406 21.2644 16.4862 21.159 16.221 21.159Z" fill="#070600"/>
                                        </svg>
                                        <div class="program__timeline-item-left-rectangle"></div>
                                        <div class="program__timeline-item-left-duration">{{ $session->duration }} min</div>
                                    </div>
                                </div>
                                <div class="program__timeline-item-right">
                                    <a @if(Auth()->check()) href="{{ route('public-part.programs.preview-session', ['id' => $session->id ]) }}" @endif>
                                        <h2 class="program__timeline-item-right-title"> {{ $session->title }} </h2>
                                    </a>
                                    <div class="program__timeline-item-right-item">
                                        <div class="program__timeline-item-right-item-icon">
                                            <img src="{{ asset('files/images/svg-icons/program-item-icon-name.svg') }}" alt="">
                                        </div>
                                        <div class="program__timeline-item-right-item-text">
                                            @php $total = 0; @endphp
                                            @foreach($session->presentersRel as $presenter)
                                                {{ $presenter->presenterRel->name ?? '' }}
                                                @if($total++ < ($session->presentersRel->count() - 1)), @endif
                                            @endforeach
                                        </div>
                                    </div>
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
    @endif

    @include('public-part.app.base-includes.snake.snake')
@endsection
