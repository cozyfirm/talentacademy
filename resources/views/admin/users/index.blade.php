@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-users"></i> @endsection
@section('c-title') {{ __('Korisnici') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="{{ route('system.admin.users') }}">{{ __('Pregled svih korisnika') }}</a>
@endsection
@section('c-buttons')
    <a href="{{ route('system.admin.users') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
    <a href="{{ route('system.admin.users.create') }}">
        <button class="pm-btn btn pm-btn-success">
            <i class="fas fa-plus"></i>
            <span>{{ __('Unos novog') }}</span>
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

        @include('admin.layout.snippets.filters.filter-header', ['var' => $users])
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
            @foreach($users as $user)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $user->name ?? ''}} </td>
                    <td> {{ $user->email ?? ''}} </td>
                    <td> {{ ucfirst($user->role ?? '')  }} </td>
                    <td> {{ $user->phone ?? ''}} </td>
                    <td> {{ $user->birthDate() ?? ''}} </td>
                    <td> {{ $user->address ?? ''}} </td>
                    <td> {{ $user->city ?? ''}} </td>
                    <td> {{ $user->countryRel->name_ba ?? ''}} </td>
                    <td> {{ $user->title ?? ''}} </td>
                    <td> {{ $user->institution ?? ''}} </td>
                    <td>
                        <ul class="pl-0">
                            @foreach($user->acceptedAppRel as $app)
                                <li>{{ $app->programRel->title ?? '' }} ( {{ $app->programRel->seasonRel->title ?? '' }} )</li>
                            @endforeach
                        </ul>
                    </td>

                    <td class="text-center">
                        <a href="{{route('system.admin.users.preview', ['username' => $user->username] )}}" title="Pregled korisnika">
                            <button class="btn-dark btn-xs">{{ __('Pregled') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @include('admin.layout.snippets.filters.pagination', ['var' => $users])
    </div>
@endsection
