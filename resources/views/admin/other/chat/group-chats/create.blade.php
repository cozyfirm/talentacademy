@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-comments"></i> @endsection
@section('c-title') {{ __('Group chats') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="{{ route('system.admin.chat.group-chats') }}">{{ __('Group chats') }}</a>
@endsection

@section('c-buttons')
    <a href="{{ route('system.admin.chat.group-chats') }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>

    @if(isset($preview))
        <a href="{{ route('system.admin.chat.group-chats.add-participant', ['id' => $conversation->id ]) }}">
            <button class="pm-btn btn pm-btn-success">
                <i class="fas fa-plus"></i>
                <span>{{ __('Dodaj člana') }}</span>
            </button>
        </a>
    @endif
    @if(isset($conversation))
        <a href="{{ route('system.admin.chat.group-chats.delete', ['id' => $conversation->id ]) }}">
            <button class="pm-btn btn pm-btn-trash">
                <i class="fas fa-trash"></i>
            </button>
        </a>
    @endif
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        @if(session()->has('success'))
            <div class="alert alert-success mt-3">
                {{ session()->get('success') }}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger mt-3">
                {{ session()->get('error') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('system.admin.chat.group-chats.save') }}" method="POST" id="js-form">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Naziv grupe'))->for('name')->class('bold') }}
                                {{ html()->text('name')->class('form-control form-control-sm')->required()->value((isset($conversation) ? $conversation->name : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                {{ html()->label(__('Kratki opis grupe'))->for('description')->class('bold') }}
                                {{ html()->textarea('description')->class('form-control form-control-sm')->style('height:120px;')->required()->value((isset($conversation) ? $conversation->description : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    @if(!isset($conversation))
                        <div class="row mt-4">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark btn-sm"> {{ __('SAČUVAJTE') }} </button>
                            </div>
                        </div>
                    @endif
                </form>

                @if(isset($conversation) and $conversation->participantsRel->count())
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" width="40px" class="text-center">{{ __('#') }}</th>
                            <th scope="col">{{ __('Ime i prezime') }}</th>
                            <th scope="col" width="180px" class="text-center">{{ __('Akcije') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $counter = 1; @endphp
                        @foreach($conversation->participantsRel as $participant)
                            <tr>
                                <th scope="col" width="40px" class="text-center">{{ $counter++ }}</th>
                                <th scope="col">{{ $participant->userRel->name ?? '' }}</th>
                                <th scope="col" class="text-center">
                                    <a href="{{route('system.admin.chat.group-chats.delete-participant', ['id' => $participant->id] )}}" title="{{ __('Obrišite korisnika iz grupe') }}">
                                        <button class="btn-dark btn-xs">{{ __('Obrišite') }}</button>
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

        </div>
    </div>
@endsection
