@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <!-- Dashboard inner menu -->
    @include('public-part.dashboard.includes.inner-menu')

    <!-- User section -->
    <div class="white__wrapper">
        <div class="profile__wrapper">
            <!-- Left side: Image and social networks -->
            @include('public-part.dashboard.includes.left-side')

            <div class="profile__wrapper_right">
                <form action="{{ route('dashboard.update-profile') }}" method="POST" id="js-form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Email adresa'))->for('name')->class('bold') }}</b>
                                        {{ html()->email('email')->class('form-control form-control-sm mt-1')->isReadonly(true)->maxlength(100)->value(Auth()->user()->email) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Unesite novu lozinku'))->for('name')->class('bold') }}</b>
                                        {{ html()->password('password')->class('form-control form-control-sm mt-1')->maxlength(100) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Ponovite lozinku'))->for('name')->class('bold') }}</b>
                                        {{ html()->password('password_w')->class('form-control form-control-sm mt-1')->maxlength(100) }}
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button class="btn">{{ __('Sačuvajte izmjene') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
