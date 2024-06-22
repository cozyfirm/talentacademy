@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-envelope"></i> @endsection
@section('c-title') {{ __('Bulk messages') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="{{ route('system.admin.inbox.bulk-messages') }}">{{ __('Bulk messages') }}</a> /
    <a href="#">{{ __('Message') }}</a>
@endsection

@section('c-buttons')
    <a href="{{ route('system.admin.inbox.bulk-messages') }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>

    @if(isset($message))
        <a href="{{ route('system.admin.inbox.bulk-messages.delete', ['id' => $message->id ]) }}">
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
                <form action="{{ route('system.admin.inbox.bulk-messages.save') }}" method="POST" id="js-form">
                    @if(isset($edit))
                        {{ html()->hidden('id')->class('form-control')->value($message->id) }}
                    @endif

                    <div class="row">
                        <div class="@if(!isset($preview)) col-md-6 @else col-md-12 @endif">
                            <div class="form-group">
                                {{ html()->label(__('Naslov'))->for('title')->class('bold') }}
                                {{ html()->text('title')->class('form-control form-control-sm')->required()->value((isset($message) ? $message->title : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                        @if(!isset($preview))
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ html()->label(__('Kome se šalje'))->for('what')->class('bold') }}
                                    {{ html()->select('what', $other, isset($message) ? $message->what : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Sadržaj poruke'))->for('description')->class('bold') }}
                                {{ html()->textarea('content')->class('form-control form-control-sm mt-2 textarea-240')->value(isset($message) ? $message->content : '')->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    @if(!isset($message))
                        <div class="row mt-4">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark btn-sm"> {{ __('SAČUVAJTE') }} </button>
                            </div>
                        </div>
                    @endif
                </form>

                <!-- Display all users -->
                @if(isset($message) and $message->toRel->count())
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" width="40px" class="text-center">{{ __('#') }}</th>
                                <th scope="col">{{ __('Ime i prezime') }}</th>
                                <th scope="col" width="180px" class="text-center">{{ __('Status poruke') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $counter = 1; @endphp
                            @foreach($message->toRel as $to)
                                <tr>
                                    <th scope="col" width="40px" class="text-center">{{ $counter++ }}</th>
                                    <th scope="col">{{ $to->toRel->name ?? '' }}</th>
                                    <th scope="col" class="text-center">
                                        @if($to->read)
                                            {{ __('Pročitana') }}
                                        @else
                                            {{ __('Nije pročitana') }}
                                        @endif
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
