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

            <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>
            <p> {{ __('Svoju aplikaciju ili njene dijelove možeš čuvati u ovoj formi. Tvjoa finalna aplikacija će biti proslijeđena nama tek kada izaereš opciju "Pošalji aplikaciju".') }} </p>

            <div class="apply__for_scholarship_textarea">
                <label for="motivation">{{ __('Šta te motivisalo da se prijaviš na akademiju?') }}</label>
                {{ html()->textarea('motivation')->class('form-control form-control-sm')->id('motivation')->placeholder('Maksimalno 250 riječi..')->value(isset($application) ? $application->motivation : '')->isReadonly(false) }}
            </div>
            <div class="apply__for_scholarship_textarea">
                <label for="interests">{{ __('Šta te motivisalo da se prijaviš na akademiju?') }}</label>
                {{ html()->textarea('interests')->class('form-control form-control-sm')->id('interests')->placeholder('Maksimalno 250 riječi..')->value(isset($application) ? $application->interests : '')->isReadonly(false) }}
            </div>
            <div class="apply__for_scholarship_textarea">
                <label for="experience">{{ __('Šta te motivisalo da se prijaviš na akademiju?') }}</label>
                {{ html()->textarea('experience')->class('form-control form-control-sm')->id('experience')->placeholder('Maksimalno 500 riječi..')->value(isset($application) ? $application->experience : '')->isReadonly(false) }}
            </div>
            <div class="apply__for_scholarship_textarea">
                <label for="expectations">{{ __('Šta te motivisalo da se prijaviš na akademiju?') }}</label>
                {{ html()->textarea('expectations')->class('form-control form-control-sm')->id('expectations')->placeholder('Maksimalno 500 riječi..')->value(isset($application) ? $application->expectations : '')->isReadonly(false) }}
            </div>
            <div class="apply__for_scholarship_textarea">
                <label for="skills">{{ __('Šta te motivisalo da se prijaviš na akademiju?') }}</label>
                {{ html()->textarea('skills')->class('form-control form-control-sm')->id('skills')->placeholder('Maksimalno 500 riječi..')->value(isset($application) ? $application->skills : '')->isReadonly(false) }}
            </div>


        </div>
    </div>
@endsection
