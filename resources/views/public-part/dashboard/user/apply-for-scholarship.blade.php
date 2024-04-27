@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Welcome') @endsection

<!-- Page content -->
@section('public-content')
    <!-- Dashboard inner menu -->
    @include('public-part.dashboard.includes.inner-menu')

    <!-- Choose programs -->
    <div class="programs__wrapper">
        <div class="programs__wrapper_colored programs__wrapper_colored_1">
            @foreach($programs as $program)
                <div class="single__program_wrapper single__program_wrapper-{{$program->id}}">
                    <div class="single__program_wrapper_left">
                        <div class="text-wrapper">
                            <h1> {{ $program->title }} </h1>
                            <h5> {!! nl2br($program->description) !!} </h5>

                            <div class="buttons-wrapper">
                                <a href="{{ route('public-part.programs.apply-for-scholarship', ['id' => $program->id ]) }}">
                                    <button class="my-c-btn">
                                        <img src="{{ asset('files/images/public-part/icon.png') }}" class="scholarship" alt="">
                                        {{ __('Apliciraj za stipendiju') }}
                                    </button>
                                </a>
                                <a href="{{ route('public-part.programs.preview-program', ['id' => $program->id ]) }}">
                                    <button class="my-c-btn">
                                        <i class="fas fa-plus"></i>
                                        {{ __('Više o programu') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="single__program_wrapper_right">
                        <img src="{{ asset($program->imageRel->getFile()) }}" alt="">
                    </div>
                </div>
            @endforeach

            <div class="single__program_wrapper_arrows">
                <div class="p__sbw_btn apply-for-scholarship-previous">
                    <img src="{{ asset('files/images/public-part/arrow-left.png') }}" alt="">
                </div>
                <div class="p__sbw_btn apply-for-scholarship-next">
                    <img src="{{ asset('files/images/public-part/arrow-right.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
