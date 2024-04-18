<div class="col-md-3 border-left">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-0 m-0" title="#">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="p-0 m-0"> {{ __('Ostale informacije') }} </h5>
                    <i class="fas fa-info"></i>
                </div>
            </div>

            <div class="card p-0 m-0 mt-3" title="{{ __('Zakačite novi dokument za sesiju') }}">
                <a href="{{ route('system.admin.programs.sessions.upload-file', ['program_id' => $program->id ]) }}">
                    <div class="card-body d-flex justify-content-between">
                        <h6 class="p-0 m-0"> {{ __('Unos dokumenata') }} </h6>
                        <i class="fas fa-plus"></i>
                    </div>
                </a>

                <div class="card-body">
                    <ul>
                        <li>Wsadas</li>
                        <li>sadsaodpas</li>
                    </ul>
                </div>
            </div>

            <div class="card p-0 m-0 mt-3" title="{{ __('Predavač i ostale sesije') }}">
                <a href="{{ route('system.admin.programs.sessions.create', ['program_id' => $program->id ]) }}">
                    <div class="card-body d-flex justify-content-between">
                        <h5 class="card-title m-0 p-0"> {{ $session->presenterRel->name ?? '' }} </h5>
                        <i class="fas fa-book-reader"></i>
                    </div>
                </a>

                <div class="card-body">
                    <ul class="">
                        <li class="mt-0">Sesija 1</li>
                        <li>Sesija 2</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
