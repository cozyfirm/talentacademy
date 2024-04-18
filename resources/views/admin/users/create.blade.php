@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-users"></i> @endsection
@section('c-title') {{ __('Korisnici') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="{{ route('system.admin.users') }}">{{ __('Pregled svih korisnika') }}</a> /
    <a href="{{ route('system.admin.users.preview', ['username' => $user->username ]) }}">{{ $user->name }}</a>
@endsection

@section('c-buttons')
    <a href="{{ route('system.admin.users') }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>

    @if(isset($preview))
        <a href="{{ route('system.admin.users.edit', ['username' => $user->username ]) }}">
            <button class="pm-btn btn pm-btn-edit">
                <i class="fas fa-edit"></i>
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
                <form action="@if(isset($edit)) {{ route('system.admin.users.update') }} @else # @endif" method="POST" id="js-form">
                    @if(isset($edit))
                        {{ html()->hidden('id')->class('form-control')->value($user->id) }}
                    @endif

{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="form-group">--}}
{{--                                {{ html()->label(__('Ime i prezime'))->for('supplier_id')->class('bold') }}--}}
{{--                                {{ html()->select('supplier_id', [], isset($invoice) ? $user->supplier_id : '')->class('form-control form-control-sm')->required()->disabled(isset($preview)) }}--}}
{{--                                <small id="supplier_idHelp" class="form-text text-muted">{{ __('Odaberite dobavljača robe') }}</small>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Ime i prezime'))->for('supplier_id')->class('bold') }}
                                {{ html()->text('name', $user->name )->class('form-control form-control-sm')->required()->value((isset($user) ? $user->name : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Broj fakture'))->for('invoice_no')->class('bold') }}
                                {{ html()->text('email')->class('form-control form-control-sm')->required()->maxlength(150)->value((isset($user) ? $user->email : ''))->isReadonly(isset($preview)) }}
                                <small id="invoice_noHelp" class="form-text text-muted">{{ __('Unesite broj fakture') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Uloga'))->for('supplier_id')->class('bold') }}
                                {{ html()->select('role', ['user' => 'User', 'presenter' => 'Presenter', 'admin' => 'Admin' ], isset($user) ? $user->role : '')->class('form-control form-control-sm')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Telefon'))->for('date_purchased')->class('bold') }}
                                {{ html()->text('phone')->class('form-control form-control-sm mt-1')->required()->maxlength(13)->value((isset($user) ? $user->phone : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Datum rođenja'))->for('date_delivered')->class('bold') }}
                                {{ html()->text('birth_date')->class('form-control form-control-sm datepicker mt-1')->required()->maxlength(10)->value((isset($user) ? $user->birthDate() : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Adresa'))->for('date_purchased')->class('bold') }}
                                {{ html()->text('address')->class('form-control form-control-sm mt-1')->required()->maxlength(100)->value((isset($user) ? $user->address : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Grad'))->for('date_delivered')->class('bold') }}
                                {{ html()->text('city')->class('form-control form-control-sm mt-1')->required()->maxlength(50)->value((isset($user) ? $user->city : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Država'))->for('supplier_id')->class('bold') }}
                                {{ html()->select('country', $countries, isset($user) ? $user->country : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    @if($user->role == 'presenter' or isset($edit))
                        <hr class="mt-4">

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ html()->label(__('Titula'))->for('date_purchased')->class('bold') }}
                                    {{ html()->text('title')->class('form-control form-control-sm mt-1')->maxlength(100)->value((isset($user) ? $user->title : ''))->isReadonly(isset($preview)) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ html()->label(__('Institucija'))->for('date_delivered')->class('bold') }}
                                    {{ html()->text('institution')->class('form-control form-control-sm mt-1')->maxlength(50)->value((isset($user) ? $user->institution : ''))->isReadonly(isset($preview)) }}
                                </div>
                            </div>
                        </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{ html()->label(__('Uloga predavača'))->for('presenter_role')->class('bold') }}
                                        {{ html()->select('presenter_role', ['Lecturer' => 'Lecturer', 'Keynote speaker' => 'Keynote speaker', 'Workshop leader' => 'Workshop leader'], isset($user) ? $user->presenter_role : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                                    </div>
                                </div>
                            </div>
                    @endif

                    @if(!isset($preview))
                        <div class="row mt-4">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark btn-sm"> {{ __('SAČUVAJTE') }} </button>
                            </div>
                        </div>
                    @endif
                </form>
            </div>

        </div>
    </div>
@endsection
