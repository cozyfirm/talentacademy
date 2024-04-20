@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-envelope"></i> @endsection
@section('c-title') {{ __('Bulk messages') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="{{ route('system.admin.inbox.bulk-messages') }}">{{ __('Bulk messages') }}</a>
@endsection
@section('c-buttons')
    <a href="{{ route('system.admin.inbox.bulk-messages') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
    <a href="{{ route('system.admin.inbox.bulk-messages.create') }}">
        <button class="pm-btn btn pm-btn-success">
            <i class="fas fa-plus"></i>
            <span>{{ __('Nova poruka') }}</span>
        </button>
    </a>
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @include('admin.layout.snippets.filters.filter-header', ['var' => $messages])
        <table class="table table-bordered" id="filtering">
            <thead>
            <tr>
                <th scope="col" style="text-align:center;">#</th>
                @include('admin.layout.snippets.filters.filters_header')
                <th width="120p" class="akcije text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($messages as $message)
                <tr>
                    <td class="text-center">{{ $i++}}.</td>
                    <td> {{ $message->title ?? ''}} </td>
                    <td> {{ $message->fromRel->name ?? '' }} </td>

                    <td class="text-center">
                        <a href="{{route('system.admin.inbox.bulk-messages.preview', ['id' => $message->id] )}}" title="{{ __('Više informacija') }}">
                            <button class="btn-dark btn-xs">{{ __('Pregled') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @include('admin.layout.snippets.filters.pagination', ['var' => $messages])
    </div>
@endsection
