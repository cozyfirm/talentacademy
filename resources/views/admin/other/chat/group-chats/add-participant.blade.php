@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-comments"></i> @endsection
@section('c-title') {{ __('Group chats') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="{{ route('system.admin.chat.group-chats') }}">{{ __('Group chats') }}</a>
@endsection

@section('c-buttons')
    <a href="{{ route('system.admin.chat.group-chats.preview', ['id' => $conversation->id ]) }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('system.admin.chat.group-chats.save-participant') }}" method="POST" id="js-form">
                    {{ html()->hidden('id')->class('form-control')->value($conversation->id) }}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Odaberite korisnika'))->for('user_id')->class('bold') }}
                                {{ html()->select('user_id', $users)->class('form-control form-control-sm mt-1 select2')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-dark btn-sm"> {{ __('SAČUVAJTE') }} </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
