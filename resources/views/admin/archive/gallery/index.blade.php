@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-image"></i> @endsection
@section('c-title') {{ __('Galerija fotografija') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="#">{{ __('Arhiva') }}</a> / <a href="{{ route('system.admin.archive.gallery') }}">{{ __('Pregled fotografija u arhivi') }}</a>
@endsection
@section('c-buttons')
    <a href="{{ route('system.admin.archive.gallery') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
    <a href="{{ route('system.admin.archive.gallery.create') }}">
        <button class="pm-btn btn pm-btn-success">
            <i class="fas fa-plus"></i>
            <span>{{ __('Unos fotografije') }}</span>
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

        @include('admin.layout.snippets.filters.filter-header', ['var' => $images])
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
            @foreach($images as $image)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $image->seasonRel->title ?? ''}} </td>
                    <td> <a href="{{ asset($image->path . '/' . $image->name) }}" target="_blank"> {{ $image->file ?? ''}}  </a> </td>

                    <td class="text-center">
                        <a href="{{route('system.admin.archive.gallery.delete', ['id' => $image->id] )}}" title="{{ __('Više informacija') }}">
                            <button class="btn-dark btn-xs">{{ __('Obrišite') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @include('admin.layout.snippets.filters.pagination', ['var' => $images])
    </div>
@endsection
