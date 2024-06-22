@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-file-alt"></i> @endsection
@section('c-title') {{ __('Pregled prijave') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="#">{{ __('Pregled prijave') }} - {{ $application->userRel->name ?? '' }}</a>
@endsection
@section('c-buttons')
    <a href="#">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
    <a href="{{ route('system.admin.programs.all-applications') }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>
    <a href="{{ route('system.admin.programs.edit-application', ['id' => $application->id ]) }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-edit"></i>
            <span>{{ __('Uredi') }}</span>
        </button>
    </a>
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">

        <div class="row">
            <div class="@col-md-12">
                <form action="#" method="POST" id="js-form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Ime i prezime'))->for('title')->class('bold') }}
                                {{ html()->text('title')->class('form-control form-control-sm mt-2')->required()->value( $application->userRel->name ?? '' )->isReadonly(true) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Program'))->for('title')->class('bold') }}
                                {{ html()->text('title')->class('form-control form-control-sm mt-2')->required()->value( $application->programRel->title ?? '' )->isReadonly(true) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Status prijave'))->for('title')->class('bold') }}
                                {{ html()->select('role', ['in_queue' => 'In Queue', 'accepted' => 'Accepted', 'denied' => 'Denied' ], isset($application) ? $application->app_status : '')->class('form-control form-control-sm mt-2')->required()->disabled() }}
                            </div>
                        </div>
                    </div>

                    @if(isset($application->cvRel) or isset($application->mlRel) or isset($application->otherRel))
                        <hr>

                        <div class="row mt-3 d-inline-flex">
                            <div class="col-md-12 gap-5">
                                @if(isset($application->cvRel))
                                    <a href="{{ route('system.admin.programs.download-file', ['id' => $application->cvRel->id ]) }}" class="text-info">{{ substr($application->cvRel->file, 0, 30) }}</a>
                                @endif
                                <span>|</span>
                                @if(isset($application->mlRel))
                                    <a href="{{ route('system.admin.programs.download-file', ['id' => $application->mlRel->id ]) }}" class="text-info">{{ substr($application->mlRel->file, 0, 30) }}</a>
                                @endif
                                <span>|</span>
                                @if(isset($application->otherRel))
                                    <a href="{{ route('system.admin.programs.download-file', ['id' => $application->otherRel->id ]) }}" class="text-info">{{ substr($application->otherRel->file, 0, 30) }}</a>
                                @endif
                            </div>
                        </div>
                    @endif

                    <hr>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Šta Vas je motivisalo da se prijavite na Helem Nejse Talent Akademiju?'))->for('short_description')->class('bold') }}
                                {{ html()->textarea('short_description')->class('form-control form-control-sm mt-2 textarea-120')->value(isset($application) ? $application->motivation : '')->isReadonly(true) }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Molimo Vas da opišite sva relevantna iskustva iz oblasti za koju aplicirate, uključujući formalno obrazovanje, kurseve, projekte, volontiranje itd.'))->for('short_description')->class('bold') }}
                                {{ html()->textarea('short_description')->class('form-control form-control-sm mt-2 textarea-120')->value(isset($application) ? $application->interests : '')->isReadonly(true) }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Ukoliko nemate formalnog iskustva u oblasti za koju aplicirate, opišite talente i vještine koje smatrate relevantnima za aplikaciju.'))->for('short_description')->class('bold') }}
                                {{ html()->textarea('short_description')->class('form-control form-control-sm mt-2 textarea-120')->value(isset($application) ? $application->experience : '')->isReadonly(true) }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Koja su Vaša očekivanja od Helem Nejse Talent Akademije? Koje vještine i znanja želite steći ili unaprijediti tokom programa?'))->for('short_description')->class('bold') }}
                                {{ html()->textarea('short_description')->class('form-control form-control-sm mt-2 textarea-120')->value(isset($application) ? $application->expectations : '')->isReadonly(true) }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Na koji način bi učešće na HNTA programu doprinijelo Vašem profesionalnom razvoju?'))->for('short_description')->class('bold') }}
                                {{ html()->textarea('short_description')->class('form-control form-control-sm mt-2 textarea-120')->value(isset($application) ? $application->skills : '')->isReadonly(true) }}
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>

    </div>
@endsection
