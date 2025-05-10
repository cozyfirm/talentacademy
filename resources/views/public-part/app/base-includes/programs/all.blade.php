<div class="programs" id="programs">
    <div class="programs__container">
        <h2 class="programs__heading">{{ __('Programi') }}</h2>
        <div class="programs__content">
            <a href="{{ route('public-part.programs.preview-program', ['id' => 6]) }}" class="programs__program_v2 program--1">
                <div class="pp_v2_header">
                    <img src="{{ asset('/files/images/public-part/program_arrow.svg') }}" alt="{{ __('Arrow') }}">
                </div>
                <div class="pp_v2_content">
                    <img src="{{ asset('/files/images/public-part/writing_2025.svg') }}" alt="{{ __('Program image') }}">
                    <h1> Pisanje za <br> 21. stoljeće </h1>
                </div>
            </a>
            <a href="{{ route('public-part.programs.preview-program', ['id' => 7]) }}" class="programs__program_v2 program--2">
                <div class="pp_v2_header">
                    <img src="{{ asset('/files/images/public-part/program_arrow.svg') }}" alt="{{ __('Arrow') }}">
                </div>
                <div class="pp_v2_content">
                    <img src="{{ asset('/files/images/public-part/jurnalism_2025.svg') }}" alt="{{ __('Program image') }}">
                    <h1> Novinarstvo i <br> društvene mreže </h1>
                </div>
            </a>
            <a href="{{ route('public-part.programs.preview-program', ['id' => 8]) }}" class="programs__program_v2 program--3">
                <div class="pp_v2_header">
                    <img src="{{ asset('/files/images/public-part/program_arrow.svg') }}" alt="{{ __('Arrow') }}">
                </div>
                <div class="pp_v2_content">
                    <img src="{{ asset('/files/images/public-part/prod_2025.svg') }}" alt="{{ __('Program image') }}">
                    <h1> Primijenjena muzička <br> produkcija </h1>
                </div>
            </a>
            <a href="{{ route('public-part.programs.preview-program', ['id' => 9]) }}" class="programs__program_v2 program--4">
                <div class="pp_v2_header">
                    <img src="{{ asset('/files/images/public-part/program_arrow.svg') }}" alt="{{ __('Arrow') }}">
                </div>
                <div class="pp_v2_content">
                    <img src="{{ asset('/files/images/public-part/coding_2025.svg') }}" alt="{{ __('Program image') }}">
                    <h1> Odgovorno <br> kodiranje i Civic Tech </h1>
                </div>
            </a>
            <a href="{{ route('public-part.programs.preview-program', ['id' => 10]) }}" class="programs__program_v2 program--5">
                <div class="pp_v2_header">
                    <img src="{{ asset('/files/images/public-part/program_arrow.svg') }}" alt="{{ __('Arrow') }}">
                </div>
                <div class="pp_v2_content">
                    <img src="{{ asset('/files/images/public-part/graphic_design_2025.svg') }}" alt="{{ __('Program image') }}">
                    <h1> Grafički dizajn i <br> animacija </h1>
                </div>
            </a>
            <a href="{{ route('public-part.critical-thinking') }}" class="programs__program_v2 program--6">
                <div class="pp_v2_header">
                    <img src="{{ asset('/files/images/public-part/program_arrow.svg') }}" alt="{{ __('Arrow') }}">
                </div>
                <div class="pp_v2_content">
                    <img src="{{ asset('/files/images/public-part/think_2025.svg') }}" alt="{{ __('Program image') }}">
                    <h1> Angažovani rad i <br> kritičko razmišljanje </h1>
                </div>
            </a>

{{--            <a href="{{ route('public-part.programs.preview-program', ['id' => 1]) }}" class="programs__program program--1">--}}
{{--                <div class="programs__program_h">--}}
{{--                    <h4 class="programs__program-heading">{{ __('Kreativno pisanje: Komedija') }}</h4>--}}
{{--                    <img src="{{ asset('/files/images/public-part/strelica.png') }}" alt="{{ __('Programs image #5') }}" class="programs__program-image">--}}
{{--                </div>--}}

{{--                <img src="{{ asset('files/images/public-part/writing_svg.svg') }}" alt="{{ __('Programs image #1') }}" class="programs__program-image">--}}
{{--            </a>--}}
{{--            <a href="{{ route('public-part.programs.preview-program', ['id' => 2]) }}" class="programs__program program--2">--}}
{{--                <div class="programs__program_h">--}}
{{--                    <h4 class="programs__program-heading">{{ __('Novinarstvo: novinarstvo i novi mediji') }}</h4>--}}
{{--                    <img src="{{ asset('/files/images/public-part/strelica.png') }}" alt="{{ __('Programs image #5') }}" class="programs__program-image">--}}
{{--                </div>--}}
{{--                <img src="{{ asset('/files/images/public-part/jurnalism.svg') }}" alt="{{ __('Programs image #2') }}" class="programs__program-image">--}}
{{--            </a>--}}
{{--            <a href="{{ route('public-part.programs.preview-program', ['id' => 3]) }}" class="programs__program program--3">--}}
{{--                <div class="programs__program_h">--}}
{{--                    <h4 class="programs__program-heading">{{ __('Primijenjena muzička produkcija') }}</h4>--}}
{{--                    <img src="{{ asset('/files/images/public-part/strelica.png') }}" alt="{{ __('Programs image #5') }}" class="programs__program-image">--}}
{{--                </div>--}}
{{--                <img src="{{ asset('/files/images/public-part/prod.svg') }}" alt="{{ __('Programs image #3') }}" class="programs__program-image">--}}
{{--            </a>--}}
{{--            <a href="{{ route('public-part.programs.preview-program', ['id' => 4]) }}" class="programs__program program--4">--}}
{{--                <div class="programs__program_h">--}}
{{--                    <h4 class="programs__program-heading">{{ __('Informacione tehnologije') }}</h4>--}}
{{--                    <img src="{{ asset('/files/images/public-part/strelica.png') }}" alt="{{ __('Programs image #5') }}" class="programs__program-image">--}}
{{--                </div>--}}
{{--                <img src="{{ asset('/files/images/public-part/coding.svg') }}" alt="{{ __('Programs image #4') }}" class="programs__program-image">--}}
{{--            </a>--}}
{{--            <a href="{{ route('public-part.programs.preview-program', ['id' => 5]) }}" class="programs__program program--5">--}}
{{--                <div class="programs__program_h">--}}
{{--                    <h4 class="programs__program-heading">{{ __('Grafički dizajn i animacija') }}</h4>--}}
{{--                    <img src="{{ asset('/files/images/public-part/strelica.png') }}" alt="{{ __('Programs image #5') }}" class="programs__program-image">--}}
{{--                </div>--}}
{{--                <img src="{{ asset('/files/images/public-part/graphic_design.svg') }}" alt="{{ __('Programs image #5') }}" class="programs__program-image">--}}
{{--            </a>--}}
{{--            <a href="{{ route('public-part.critical-thinking') }}" class="programs__program program--6">--}}
{{--                <div class="programs__program_h">--}}
{{--                    <h4 class="programs__program-heading">{{ __('Kritičko razmišljanje') }}</h4>--}}
{{--                    <img src="{{ asset('/files/images/public-part/strelica.png') }}" alt="{{ __('Programs image #5') }}" class="programs__program-image">--}}
{{--                </div>--}}
{{--                <img src="{{ asset('/files/images/public-part/think.svg') }}" alt="{{ __('Programs image #6') }}" class="programs__program-image">--}}
{{--            </a>--}}
        </div>
        <div class="programs__links">
            <a href="#how-to-apply-0" class="programs__link">{{ __('Kako aplicirati?') }}</a>
            <a href="#" class="programs__link programs__link-alternate">{{ __('Svi polaznici Akademije ostvaruju punu stipendiju.') }}</a>
            <a href="{{ route('public-part.scholarship') }}" class="programs__link">{{ __('Više o stipendijama?') }}</a>
        </div>
    </div>
</div>
