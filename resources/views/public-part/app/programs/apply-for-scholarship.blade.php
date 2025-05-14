@extends('public-part.layout.layout')

<!-- Title of page -->
@section('title') {{ $program->title }} @endsection

<!-- Page content -->
@section('public-content')
    <div class="apply__for_scholarship_w">
        <div class="apply__for_scholarship_inner">
            @if(session()->has('message'))
                <div class="saved_successfully">
                    <p>{{ session()->get('message') }}</p>
                </div>
            @endif

            <h1>{{ __('Dobro došli!') }}</h1>

            <p>
                Molimo vas da u svojoj aplikaciji podijelite iskrene i autentične odgovore na pitanja ispod. Ova prijava je prvi korak ka tome da postanete dio <b>Helem Nejse Talent Akademije</b>.
            </p>
            <p>
                <b>VAŽNO: Nemojte koristiti alate poput ChatGPT-a za generisanje odgovora.</b> Vaše riječi, iskustvo i stavovi su ono što nas zanima – tražimo stvarne vas, ne savršene rečenice. Želimo da vas upoznamo i razumijemo zašto baš vi treba da budete dio ovog programa.
            </p>
            <p>
                Na osnovu vaših odgovora, biramo kandidate koji će biti pozvani na narednu fazu selekcije. Ukoliko imate pitanja, javite nam se putem e-maila ili društvenih mreža.
            </p>

            <p><b>Obavezna pitanja:</b></p>

            <form action="{{ route('public-part.programs.update-scholarship') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{ html()->hidden('program_id')->class('form-control')->value($program->id) }}
                {{ html()->hidden('send_application')->class('form-control')->id('send_application')->value(0) }}

                <div class="apply__for_scholarship_textarea">
                    <label for="motivation">(* Obavezno polje) {{ __('Šta vas je motivisalo da se prijavite na Helem Nejse Talent Akademiju?') }}</label>
                    {{ html()->textarea('motivation')->class('form-control form-control-sm mb-2')->id('motivation')->placeholder('Maksimalno 300 riječi..')->value(isset($application) ? $application->motivation : '')->isReadonly(false) }}
                    <small id="motivation" class="form-text text-muted"><i>{{ __('Tražimo vašu iskrenu priču: Šta vas pokreće, gdje ste se pronašli u pozivu, i zašto mislite da je ovo prava prilika za vas?') }}</i></small>
                </div>
                <div class="apply__for_scholarship_textarea">
                    <label for="interests">(* Obavezno polje) {{ __('Zašto mislite da ste baš vi dobar/a kandidat/kinja za ovaj program?') }}</label>
                    {{ html()->textarea('interests')->class('form-control form-control-sm mb-2')->id('interests')->placeholder('Maksimalno 300 riječi..')->value(isset($application) ? $application->interests : '')->isReadonly(false) }}
                    <small id="interests" class="form-text text-muted"><i>{{ __('Imate li neko relevantno iskustvo, znanje, vještine, ili čak samo snažnu motivaciju da učite i doprinesete zajednici?') }}</i></small>
                </div>
                <div class="apply__for_scholarship_textarea">
                    <label for="experience">(* Obavezno polje) {{ __('Kako očekujete da će vam program pomoći u ličnom i profesionalnom razvoju?') }}</label>
                    {{ html()->textarea('experience')->class('form-control form-control-sm mb-2')->id('experience')->placeholder('Maksimalno 300 riječi..')->value(isset($application) ? $application->experience : '')->isReadonly(false) }}
                    <small id="experience" class="form-text text-muted"><i>{{ __('Recite nam gdje se vidite poslije akademije, šta želite postići, i kako vam mi možemo pomoći na tom putu.') }}</i></small>
                </div>
{{--                <div class="apply__for_scholarship_textarea">--}}
{{--                    <label for="expectations">(* Obavezno polje) {{ __('Koja su Vaša očekivanja od Helem Nejse Talent Akademije? Koje vještine i znanja želite steći ili unaprijediti tokom programa?') }}</label>--}}
{{--                    {{ html()->textarea('expectations')->class('form-control form-control-sm')->id('expectations')->placeholder('Maksimalno 500 riječi..')->value(isset($application) ? $application->expectations : '')->isReadonly(false) }}--}}
{{--                </div>--}}
{{--                <div class="apply__for_scholarship_textarea">--}}
{{--                    <label for="skills">(* Obavezno polje) {{ __('Na koji način bi učešće na HNTA programu doprinijelo Vašem profesionalnom razvoju?') }}</label>--}}
{{--                    {{ html()->textarea('skills')->class('form-control form-control-sm')->id('skills')->placeholder('Maksimalno 500 riječi..')->value(isset($application) ? $application->skills : '')->isReadonly(false) }}--}}
{{--                </div>--}}

                <div class="upload__file_wrapper" title="{{ __('Vaš CV') }}">
                    <label class="cv-label" for="cv"> @if(isset($application->cvRel)) <span>{{ substr($application->cvRel->file, 0, 30) }}</span> @else {{ __('(* Obavezno polje) Upload CV') }} @endif </label>
                    <input name="cv" class="form-control form-control-sm mt-3 d-none cv-select" id="cv" type="file">
                    @if(!isset($submittedOther) and !$submitted)
                        <button class="save-btn"> <i class="fas fa-upload"></i> <p> {{ __('Upload') }} </p></button>
                    @endif
                </div>
{{--                <div class="upload__file_wrapper" title="{{ __('Vaše motivaciono pismo') }}">--}}
{{--                    <label class="mv-label" for="motivation_letter"> @if(isset($application->mlRel)) <span>{{ substr($application->mlRel->file, 0, 30) }}</span> @else {{ __('Motivacijsko pismo') }} @endif </label>--}}
{{--                    <input name="motivation_letter" class="form-control form-control-sm mt-3 d-none ml-select" id="motivation_letter" type="file">--}}
{{--                    @if(!isset($submittedOther) and !$submitted)--}}
{{--                        <button class="save-btn"> <i class="fas fa-upload"></i> <p> {{ __('Upload') }} </p></button>--}}
{{--                    @endif--}}
{{--                </div>--}}
                <div class="upload__file_wrapper" title="{{ __('Dodatni dokumenti ili primjeri rada') }}">
                    <label class="o-label" for="other" title="{{ __('Ovo polje je opcionalno') }}"> @if(isset($application->otherRel)) <span>{{ substr($application->otherRel->file, 0, 30) }}</span> @else {{ __('Dodatni dokumenti ili primjeri rada') }} @endif </label>
                    <input name="other" class="form-control form-control-sm mt-3 d-none o-select" id="other" type="file">
                    @if(!isset($submittedOther) and !$submitted)
                        <button class="save-btn"> <i class="fas fa-upload"></i> <p> {{ __('Upload') }} </p></button>
                    @endif
                </div>

                <p style="margin-top: 16px"><b>{{ __('Dozvoljeni formati za unos dokumenata su pdf, doc i docx!') }}</b></p>

                <div class="terms__and_conditions_w">
                    <div class="terms__and_conditions">
                        <input class="form-check-input" type="checkbox" value="1" id="criteria" @if($application->checked) checked @endif name="criteria">
                        <p>{{ __('Slažem se sa') }} <a href="{{ route('public-part.how-to-apply') }}">{{ __('Kriterijem upisa') }}</a> </p>
                    </div>
                    <div class="terms__and_conditions">
                        <input class="form-check-input" type="checkbox" value="1" name="privacy" @if($application->checked) checked @endif id="privacy">
                        <p>{{ __('Prihvatam') }} <a href="{{ route('public-part.privacy') }}">{{ __('pravila privatnosti') }}</a> {{ __('talentakademija.ba') }} </p>
                    </div>
                </div>

                <div class="other__btns">
                    @if(isset($submittedOther))
                        <a>
                            <div class="cancel_btn"><p>{{ __('Već ste aplicirali za drugi program!') }}</p></div>
                        </a>
                    @else
                        @if($submitted)
                            <a>
                                <div class="cancel_btn"><p>{{ __('Aplikacija poslana') }}</p></div>
                            </a>
                        @else
                            <a href="{{ route('public-part.programs.cancel-scholarship', ['program_id' => $program->id ]) }}">
                                <div class="cancel_btn"><p>{{ __('Odustani') }}</p></div>
                            </a>
                            <button class="submit-btn">
                                <i class="fas fa-save"></i>
                                <p>{{ __('Sačuvaj izmjene') }}</p>
                            </button>

                            <button class="submit-btn submit-application-btn">
                                <i class="fas fa-envelope"></i>
                                <p>{{ __('Pošalji aplikaciju') }}</p>
                            </button>
                        @endif
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
