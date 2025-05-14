<div class="programs__grid" id="programs__grid">
    <div class="generic__header">
        <h2>{{ __('Program') }}</h2>
    </div>

    <div class="programs__grid_iw" id="programs__grid_iw">
        @foreach($offlineSessions as $session)
            <div class="pg__sample pg__sample_{{ CommonHelper::getBcgColor($program->id) }}">
                <h1> {{ $session->title ?? '' }} </h1>
                <div class="info_w">
                    <div class="pg_sample__row">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M14 19V24H0V19C0 17.346 1.346 16 3 16H11C12.654 16 14 17.346 14 19ZM7 14C9.206 14 11 12.206 11 10C11 7.794 9.206 6 7 6C4.794 6 3 7.794 3 10C3 12.206 4.794 14 7 14ZM24 3V18H15.899C15.463 15.861 13.65 14.237 11.433 14.044C12.407 12.977 13 11.558 13 10C13 6.686 10.314 4 7 4C6.299 4 5.626 4.121 5 4.342V3C5 1.346 6.346 0 8 0H21C22.654 0 24 1.346 24 3ZM22 14H17V16H22V14Z"/>
                        </svg>

                        <h5>
                            @if($session->presentersRel->count())
                                @php $total = 0; @endphp
                                @foreach($session->presentersRel as $presenter)
                                    {{ $presenter->presenterRel->name ?? '' }}
                                    @if($total++ < ($session->presentersRel->count() - 1)), @endif
                                @endforeach
                            @endif
                        </h5>
                    </div>
                    <div class="pg_sample__row">
                        <svg width="27" height="24" viewBox="0 0 27 24" fill="none">
                            <path d="M26.1907 20C26.1907 22.206 24.2327 24 21.825 24H8.56854L10.8005 22H21.8261C23.03 22 24.009 21.103 24.009 20C24.009 18.897 23.03 18 21.8261 18H16.369C13.9613 18 12.0033 16.206 12.0033 14C12.0033 12.073 13.4985 10.461 15.4816 10.084L17.6198 12H16.369C15.1651 12 14.1861 12.897 14.1861 14C14.1861 15.103 15.1651 16 16.369 16H21.8261C24.2338 16 26.1907 17.794 26.1907 20ZM24.5918 8.53598C26.7201 6.58598 26.7201 3.41398 24.5918 1.46498C23.5615 0.520977 22.1907 0.000976562 20.7336 0.000976562C19.2765 0.000976562 17.9057 0.520977 16.8743 1.46498C14.7471 3.41498 14.7471 6.58698 16.883 8.54398L20.7336 11.994L24.5918 8.53598ZM23.0485 2.87898C24.3255 4.04898 24.3255 5.95198 23.0573 7.11398L20.7336 9.19598L18.4176 7.12198C17.1417 5.95198 17.1417 4.04898 18.4176 2.87898C19.0364 2.31198 19.8583 1.99998 20.7336 1.99998C21.6089 1.99998 22.4308 2.31298 23.0485 2.87898ZM9.3118 20.536C11.4401 18.586 11.4401 15.414 9.3118 13.465C8.28149 12.521 6.91066 12.001 5.4536 12.001C3.99654 12.001 2.62571 12.521 1.59431 13.465C-0.532888 15.415 -0.532888 18.587 1.60304 20.544L5.4536 23.994L9.3118 20.536ZM7.76852 14.879C9.04549 16.049 9.04549 17.952 7.77725 19.114L5.4536 21.196L3.13759 19.122C1.86171 17.952 1.86171 16.049 3.13759 14.879C3.75643 14.312 4.57827 14 5.4536 14C6.32892 14 7.15077 14.313 7.76852 14.879Z"/>
                        </svg>
                        <h5> {{ $session->locationRel->title ?? '' }} </h5>
                    </div>
                </div>
                <p> {{ $session->short_description }} </p>
            </div>
        @endforeach
    </div>
    <div class="programs__grid_pagination programs__grid_pagination_{{ CommonHelper::getBcgColor($program->id) }}">
        @for($i=1; $i<=$offlineSessions->lastPage(); $i++)
            <!-- This one is used in program or lecturer preview -->
            <a href="@if(isset($lecturer)) {{ route('public-part.lecturers.single-lecturer.sneak-and-peek', ['id' => $lecturer->id, 'page' => $i]) }}#programs__grid_iw @else {{ route('public-part.programs.sneak-and-peak', ['id' => $program->id, 'page' => $i]) }}#programs__grid_iw @endif">
                <div class="page-w @if($i == $page) active @endif"> <p>{{ $i }}</p> </div>
            </a>
        @endfor
    </div>
</div>
