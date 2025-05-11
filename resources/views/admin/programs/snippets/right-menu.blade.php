<div class="col-md-3 border-left">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-0 m-0" title="#">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="p-0 m-0"> {{ __('Ostale informacije') }} </h5>
                    <i class="fas fa-info mt-1 mr-1"></i>
                </div>
            </div>

            <div class="card p-0 m-0 mt-3" title="{{ __('Unesite novu sesiju za ovaj program') }}">
                <a href="{{ route('system.admin.programs.sessions.create', ['program_id' => $program->id ]) }}">
                    <div class="card-body d-flex justify-content-between">
                        <h6 class="p-0 m-0"> {{ __('Unos sesije') }} </h6>
                        <i class="fas fa-plus mt-1"></i>
                    </div>
                </a>
            </div>

            <form action="{{ route('system.admin.programs.save-image') }}" method="POST" id="update-profile-image" enctype="multipart/form-data">
                @csrf
                {{ html()->hidden('id')->class('form-control')->value($program->id) }}
                <div class="card p-0 m-0 mt-3" title="{{ __('Nova fotografija za program') }}">
                    <div class="card-body d-flex justify-content-between">
                        <label for="photo_uri" >
                            <p class="m-0">{{ __('Ažurirajte fotografiju') }}</p>
                        </label>
                        <i class="fas fa-image mt-1"></i>
                    </div>
                    <input name="photo_uri" class="form-control form-control-lg d-none" id="photo_uri" type="file">
                </div>
            </form>

            <div class="card mt-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <h5 class="card-title m-0 p-0"><b>{{ __('Pregled predavača') }}</b></h5>
                        </div>
                        <div class="col-md-2 text-end">
                            <a href="#">
                                <i class="fas fa-book-reader"></i>
                            </a>
                        </div>
                    </div>
                    <h6 class="card-subtitle mb-3 text-muted mt-2">
                        <small>{{ __('Spisak svih predavača na kursu') }}</small>
                    </h6>

                    @foreach($program->uniquePresenterSessions() as $presenter)
                        <p class="card-text mt-2 mb-1" title="{{ __('Više informacija o predavaču') }}">
                            <a href="{{ route('system.admin.users.preview', ['username' => $presenter->username ]) }}" class="m-0 p-0 get-gke-exam" target="_blank">
                                <small>{{ $presenter->name ?? '' }}</small>
                            </a>
                        </p>
                    @endforeach
                </div>
            </div>


            {{--                        <div class="card" title="{{ __('Unesite polaznika') }}">--}}
            {{--                            <div class="card-body">--}}
            {{--                                <div class="row">--}}
            {{--                                    <div class="col-md-2 text-right">--}}
            {{--                                        <i class="fas fa-user-edit"></i>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="col-md-10">--}}
            {{--                                        <h5 class="card-title m-0 p-0"> <b> Unesite polaznika</b></h5>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}


            <div class="card mt-3" title=" {{ __('Historija izmjena') }} ">
                <div class="card-body">
                    <div class="row mb-1">
                        <div class="col-md-10">
                            <h5 class="card-title p-0 m-0"><b>{{ __('Historija izmjena') }}</b></h5>
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="#" title=" {{ __('') }} ">
                                <i class="fas fa-history"></i>
                            </a>
                        </div>
                    </div>
                    <div class="history-wrapper">
{{--                        @foreach($exam->historyRel as $history)--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md 12 d-flex justify-content-between mt-1">--}}
{{--                                    <div class="list-icon">--}}
{{--                                        <small><i class="fas fa-download"></i></small>--}}
{{--                                    </div>--}}


{{--                                    <p class="m-0 ml-2 history-data">--}}
{{--                                        <small>--}}
{{--                                            {{ __('Korisnik') }}--}}
{{--                                            <span class="text-info">{{ $history->userRel->name ?? '' }}</span>--}}
{{--                                            {{ $history->message ?? '' }} ---}}
{{--                                            <cite> <small> {{ $history->dateTime() }} </small> </cite>.--}}
{{--                                        </small>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
