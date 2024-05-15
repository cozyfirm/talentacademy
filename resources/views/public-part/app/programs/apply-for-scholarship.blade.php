@extends('public-part.layout.layout')

<!-- Title of page -->
@section('title') {{ $program->title }} @endsection

<!-- Page content -->
@section('public-content')
    @include('public-part.dashboard.includes.inner-menu')

    <div class="apply__for_scholarship_w">
        <div class="apply__for_scholarship_inner">
            <h1>{{ __('Dobro došli!') }}</h1>

            <p>
                {{ __('Molimo da u svojoj aplikaciji pokušaš dati što više informacija o sebi i o razlozima zbog kojih želiš postati stipendista Helem Nejse Talent Akademje na programu') }}
                <b>{{ $program->title }}</b>.
            </p>

            <p> {{ __('Važno je da što detaljnije opišeš svoje odgovore u prijavi jer od toga u velikoj mjeri zavisi naša procjena tvog profila i potencijala. Detaljnje informacije koje pružiš pomoći će nam da bolje razumijemo tvoju motivaciju, iskustvo, očekivanja i ciljeve. Na temelju ovih odgovora odlučujemo o mogućnosti dodjele stipendije, stoga je ključno da svoje misli i ambicije izraziš na najbolji mogući način. ') }} </p>
            <p> {{ __('Svoju aplikaciju ili njene dijelove možeš čuvati u ovoj formi. Tvoja finalna aplikacija će biti proslijeđena nama tek kada izabereš opciju "Pošalji aplikaciju".') }} </p>

            <form action="{{ route('public-part.programs.update-scholarship') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{ html()->hidden('program_id')->class('form-control')->value($program->id) }}

                <div class="apply__for_scholarship_textarea">
                    <label for="motivation">{{ __('Šta Vas je motivisalo da se prijavite na Helem Nejse Talent Akademiju? Opišite svoj interes za program na koji aplicirate.') }}</label>
                    {{ html()->textarea('motivation')->class('form-control form-control-sm')->id('motivation')->placeholder('Maksimalno 250 riječi..')->value(isset($application) ? $application->motivation : '')->isReadonly(false) }}
                </div>
                <div class="apply__for_scholarship_textarea">
                    <label for="interests">{{ __('Molimo Vas da opišite sva relevantna iskustva iz oblasti za koju aplicirate, uključujući formalno obrazovanje, kurseve, projekte, volontiranje itd.') }}</label>
                    {{ html()->textarea('interests')->class('form-control form-control-sm')->id('interests')->placeholder('Maksimalno 250 riječi..')->value(isset($application) ? $application->interests : '')->isReadonly(false) }}
                </div>
                <div class="apply__for_scholarship_textarea">
                    <label for="experience">{{ __('Ukoliko nemate formalnog iskustva u oblasti za koju aplicirate, opišite talente i vještine koje smatrate relevantnima za aplikaciju.') }}</label>
                    {{ html()->textarea('experience')->class('form-control form-control-sm')->id('experience')->placeholder('Maksimalno 500 riječi..')->value(isset($application) ? $application->experience : '')->isReadonly(false) }}
                </div>
                <div class="apply__for_scholarship_textarea">
                    <label for="expectations">{{ __('Koja su Vaša očekivanja od Helem Nejse Talent Akademije? Koje vještine i znanja želite steći ili unaprijediti tokom programa?') }}</label>
                    {{ html()->textarea('expectations')->class('form-control form-control-sm')->id('expectations')->placeholder('Maksimalno 500 riječi..')->value(isset($application) ? $application->expectations : '')->isReadonly(false) }}
                </div>
                <div class="apply__for_scholarship_textarea">
                    <label for="skills">{{ __('Na koji način bi učešće na HNTA programu doprinijelo Vašem profesionalnom razvoju?') }}</label>
                    {{ html()->textarea('skills')->class('form-control form-control-sm')->id('skills')->placeholder('Maksimalno 500 riječi..')->value(isset($application) ? $application->skills : '')->isReadonly(false) }}
                </div>

                <div class="upload__file_wrapper">
                    <label for="cv">{{ __('Upload CV') }}</label>
                    <input name="cv" class="form-control form-control-sm mt-3 d-none" id="cv" type="file">
                    <button class="save-btn"> <i class="fas fa-upload"></i> <p> {{ __('Upload') }} </p></button>
                </div>
                <div class="upload__file_wrapper">
                    <label for="motivation_letter">{{ __('Motivacijsko pismo') }}</label>
                    <input name="motivation_letter" class="form-control form-control-sm mt-3 d-none" id="motivation_letter" type="file">
                    <button class="save-btn"> <i class="fas fa-upload"></i> <p> {{ __('Upload') }} </p></button>
                </div>
                <div class="upload__file_wrapper">
                    <label for="other" title="{{ __('Ovo polje je opcionalno') }}">{{ __('Dodatni dokumenti ili primjeri rada') }}</label>
                    <input name="other" class="form-control form-control-sm mt-3 d-none" id="other" type="file">
                    <button class="save-btn"> <i class="fas fa-upload"></i> <p> {{ __('Upload') }} </p></button>
                </div>

                <div class="terms__and_conditions_w">
                    <div class="terms__and_conditions">
                        <input class="form-check-input" type="checkbox" value="1" id="criteria" @if($application->checked) checked @endif name="criteria">
                        <p>{{ __('Pročitao sam dokument') }} <a href="{{ route('public-part.how-to-apply') }}">{{ __('Kriterij upisa') }}</a> </p>
                    </div>
                    <div class="terms__and_conditions">
                        <input class="form-check-input" type="checkbox" value="1" name="privacy" @if($application->checked) checked @endif id="privacy">
                        <p>{{ __('Prihvatam') }} <a href="{{ route('public-part.privacy') }}">{{ __('pravila privatnosti') }}</a> {{ __('talentakademija.ba') }} </p>
                    </div>
                </div>

                <div class="other__btns">
                    @if(isset($submittedOther))
                        <a href="#">
                            <div class="cancel_btn"><p>{{ __('Već ste aplicirali za drugi program!') }}</p></div>
                        </a>
                    @else
                        <a href="{{ route('public-part.programs.cancel-scholarship', ['program_id' => $program->id ]) }}">
                            <div class="cancel_btn"><p>{{ __('Odustani') }}</p></div>
                        </a>
                        <button class="submit-btn">
                            <i class="fas fa-save"></i>
                            <p>{{ __('Sačuvaj izmjene') }}</p>
                        </button>
                        <a href="{{ route('public-part.programs.submit-for-scholarship', ['program_id' => $program->id ]) }}">
                            <div class="send_app">
                                <i class="fas fa-envelope"></i>
                                <p>{{ __('Pošalji aplikaciju') }}</p>
                            </div>
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
