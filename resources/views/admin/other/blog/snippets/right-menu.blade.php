<div class="col-md-3 border-left">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-0 m-0" title="#">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="p-0 m-0"> {{ __('Ostale informacije') }} </h5>
                    <i class="fas fa-info mt-1 mr-1"></i>
                </div>
            </div>

            <form action="{{ route('system.admin.programs.save-image') }}" method="POST" id="update-profile-image" enctype="multipart/form-data">
                @csrf
                {{ html()->hidden('id')->class('form-control')->value($post->id) }}
                <div class="card p-0 m-0" title="{{ __('Nova fotografija za program') }}">
                    <div class="card-body d-flex justify-content-between">
                        <label for="photo_uri" >
                            <p class="m-0">{{ __('Galerija fotografija') }}</p>
                        </label>
                        <i class="fas fa-plus mt-1"></i>
                    </div>
                    <input name="photo_uri" class="form-control form-control-lg d-none" id="photo_uri" type="file">
                </div>
            </form>

            <div class="card mt-3">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-10">
                            <h5 class="card-title m-0 p-0"><b>{{ __('Pregled galerije') }}</b></h5>
                        </div>
                        <div class="col-md-2 text-end">
                            <a href="#">
                                <i class="fas fa-image mt-1"></i>
                            </a>
                        </div>
                    </div>
                    <h6 class="card-subtitle mb-3 text-muted mt-2 d-flex justify-content-between">
                        <small>1. {{ __('Spisak svih predavača na kursu') }}</small>
                        <small><i class="fas fa-trash"></i></small>
                    </h6>
                    <h6 class="card-subtitle mb-3 text-muted mt-2 d-flex justify-content-between">
                        <small>2. {{ __('Spisak svih predavača na kursu') }}</small>
                        <small><i class="fas fa-trash"></i></small>
                    </h6>
                </div>
            </div>

        </div>
    </div>
</div>
