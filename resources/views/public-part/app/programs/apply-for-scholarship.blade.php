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
                {{ __('Molimo da u svojoj aplikaciji pokušaš dati što više informacija o sebi i o razlozima zbog kojih želiš postati stipendista Helem Nejse Talent Akademje na programu') }}
                <b>{{ $program->title }}</b>.
            </p>

            <p> {{ __('Važno je da što detaljnije opišeš svoje odgovore u prijavi jer od toga u velikoj mjeri zavisi naša procjena tvog profila i potencijala. Detaljnje informacije koje pružiš pomoći će nam da bolje razumijemo tvoju motivaciju, iskustvo, očekivanja i ciljeve. Na temelju ovih odgovora odlučujemo o mogućnosti dodjele stipendije, stoga je ključno da svoje misli i ambicije izraziš na najbolji mogući način. ') }} </p>
            <p> {{ __('Svoju aplikaciju ili njene dijelove možeš čuvati u ovoj formi. Tvoja finalna aplikacija će biti proslijeđena nama tek kada izabereš opciju "Pošalji aplikaciju".') }} </p>

            <p> {{ __('Možete aplicirati samo za jedan od ponuđenih studijskih programa. Provjerite da li je baš ovo program koji želite upisati i podnesite vašu aplikaciju. Ukoliko nije, molimo vas da izaberete neki drugi program akademije.') }} </p>

            <form action="{{ route('public-part.programs.update-scholarship') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{ html()->hidden('program_id')->class('form-control')->value($program->id) }}
                {{ html()->hidden('send_application')->class('form-control')->id('send_application')->value(0) }}

                <div class="apply__for_scholarship_textarea">
                    <label for="motivation">(* Obavezno polje) {{ __('Šta Vas je motivisalo da se prijavite na Helem Nejse Talent Akademiju? Opišite svoj interes za program na koji aplicirate.') }}</label>
                    {{ html()->textarea('motivation')->class('form-control form-control-sm')->id('motivation')->placeholder('Maksimalno 250 riječi..')->value(isset($application) ? $application->motivation : '')->isReadonly(false) }}
                </div>
                <div class="apply__for_scholarship_textarea">
                    <label for="interests">(* Obavezno polje) {{ __('Molimo Vas da opišite sva relevantna iskustva iz oblasti za koju aplicirate, uključujući formalno obrazovanje, kurseve, projekte, volontiranje itd.') }}</label>
                    {{ html()->textarea('interests')->class('form-control form-control-sm')->id('interests')->placeholder('Maksimalno 250 riječi..')->value(isset($application) ? $application->interests : '')->isReadonly(false) }}
                </div>
                <div class="apply__for_scholarship_textarea">
                    <label for="experience">(* Obavezno polje) {{ __('Ukoliko nemate formalnog iskustva u oblasti za koju aplicirate, opišite talente i vještine koje smatrate relevantnima za aplikaciju.') }}</label>
                    {{ html()->textarea('experience')->class('form-control form-control-sm')->id('experience')->placeholder('Maksimalno 500 riječi..')->value(isset($application) ? $application->experience : '')->isReadonly(false) }}
                </div>
                <div class="apply__for_scholarship_textarea">
                    <label for="expectations">(* Obavezno polje) {{ __('Koja su Vaša očekivanja od Helem Nejse Talent Akademije? Koje vještine i znanja želite steći ili unaprijediti tokom programa?') }}</label>
                    {{ html()->textarea('expectations')->class('form-control form-control-sm')->id('expectations')->placeholder('Maksimalno 500 riječi..')->value(isset($application) ? $application->expectations : '')->isReadonly(false) }}
                </div>
                <div class="apply__for_scholarship_textarea">
                    <label for="skills">(* Obavezno polje) {{ __('Na koji način bi učešće na HNTA programu doprinijelo Vašem profesionalnom razvoju?') }}</label>
                    {{ html()->textarea('skills')->class('form-control form-control-sm')->id('skills')->placeholder('Maksimalno 500 riječi..')->value(isset($application) ? $application->skills : '')->isReadonly(false) }}
                </div>

                <div class="upload__file_wrapper" title="{{ __('Vaš CV') }}">
                    <label class="cv-label" for="cv"> @if(isset($application->cvRel)) <span>{{ substr($application->cvRel->file, 0, 30) }}</span> @else {{ __('(* Obavezno polje) Upload CV') }} @endif </label>
                    <input name="cv" class="form-control form-control-sm mt-3 d-none cv-select" id="cv" type="file">
                    @if(!isset($submittedOther) and !$submitted)
                        <button class="save-btn"> <i class="fas fa-upload"></i> <p> {{ __('Upload') }} </p></button>
                    @endif
                </div>
                <div class="upload__file_wrapper" title="{{ __('Vaše motivaciono pismo') }}">
                    <label class="mv-label" for="motivation_letter"> @if(isset($application->mlRel)) <span>{{ substr($application->mlRel->file, 0, 30) }}</span> @else {{ __('Motivacijsko pismo') }} @endif </label>
                    <input name="motivation_letter" class="form-control form-control-sm mt-3 d-none ml-select" id="motivation_letter" type="file">
                    @if(!isset($submittedOther) and !$submitted)
                        <button class="save-btn"> <i class="fas fa-upload"></i> <p> {{ __('Upload') }} </p></button>
                    @endif
                </div>
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
