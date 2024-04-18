<div class="col-md-3 border-left">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-0 m-0" title="#">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="p-0 m-0"> {{ __('Ostale informacije') }} </h5>
                    <i class="fas fa-info"></i>
                </div>
            </div>

            <div class="card p-0 m-0 mt-3" title="{{ __('Unesite novu sesiju za ovaj program') }}">
                <a href="{{ route('system.admin.programs.sessions.create', ['program_id' => $program->id ]) }}">
                    <div class="card-body d-flex justify-content-between">
                        <h6 class="p-0 m-0"> {{ __('Unos sesije') }} </h6>
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

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <h5 class="card-title m-0 p-0"><b>{{ __('Pregled ispita') }}</b></h5>
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="#">
                                <i class="fas fa-book-reader"></i>
                            </a>
                        </div>
                    </div>
                    <h6 class="card-subtitle mb-3 text-muted mt-2">
                        <small>{{ __('Preuzmite ispite bez odgovora') }}</small>
                    </h6>
                    <p class="card-text mt-2 mb-1" title="{{ __('Preuzmite ispit u .xlxs formatu') }}">
                        <a href="#" class="m-0 p-0 get-gke-exam" attr-id="12">
                            <b>Grupa 123</b>
                        </a>
                    </p>
                </div>
            </div>

            <div class="card" title="#">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 text-right">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="col-md-10">
                            <h5 class="card-title m-0 p-0"><b> {{ $exam->userRel->name ?? 'Jeej' }} </b></h5>
                        </div>
                    </div>
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


            <div class="card" title=" {{ __('Historija izmjena') }} ">
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
