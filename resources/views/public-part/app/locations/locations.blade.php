@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Locations') @endsection

<!-- Page content -->
@section('public-content')
    <div class="locations">
        <div class="locations__container">
            <div class="locations__header">
                <h1 class="locations__title">{{ __('Lokacije Akademije') }}</h1>
                <h3 class="locations__subtitle">{{ __('Akademija se održava na preko 10 lokacija širom Sarajeva.') }}</h3>
                <p class="locations__description">{{ __('Sve lokacije izabrane su tako da polaznicima pruže optimalne uslove za učenje i angažman. Naši organizatori su pažljivo odabrali najadekvatnije i najopremljenije prostore kako bismo osigurali kvalitetno iskustvo za sve učesnike Akademije.') }}</p>
            </div>
            <div class="locations__list mb-4">
                @foreach($locations as $location)
                    <div class="locations__list-item">
                        <div class="image__W">
                            <img src="{{ asset('files/images/public-part/locations/' . $location->main_img ) }}" alt="Locations image" class="locations__list-image">
                        </div>
                        <h3 class="locations__list-item-title">{{ $location->title ?? '' }}</h3>
                        <div class="locations__list-item-address"> {{ $location->address }}, {{ $location->city }}</div>
                        <div class="locations__list-item-buttons">
                            <a href="{{ route('public-part.locations.single-location', ['id' => $location->id ]) }}" class="locations__list-item-button">{{ __('Više informacija') }}</a>
                            <a href="{{ $location->location }}" target="_blank" class="locations__list-item-button locations__list-item-button--outlined ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                    <path d="M12.0001 14.6318C14.2061 14.6318 16.0001 12.8378 16.0001 10.6318C16.0001 8.42584 14.2061 6.63184 12.0001 6.63184C9.79406 6.63184 8.00006 8.42584 8.00006 10.6318C8.00006 12.8378 9.79406 14.6318 12.0001 14.6318ZM12.0001 8.63184C13.1031 8.63184 14.0001 9.52884 14.0001 10.6318C14.0001 11.7348 13.1031 12.6318 12.0001 12.6318C10.8971 12.6318 10.0001 11.7348 10.0001 10.6318C10.0001 9.52884 10.8971 8.63184 12.0001 8.63184Z" fill="#EA8BF3"/>
                                    <path d="M11.4201 22.4458C11.5893 22.5667 11.7921 22.6317 12.0001 22.6317C12.2081 22.6317 12.4108 22.5667 12.5801 22.4458C12.8841 22.2308 20.0291 17.0718 20.0001 10.6318C20.0001 6.22084 16.4111 2.63184 12.0001 2.63184C7.58909 2.63184 4.00009 6.22084 4.00009 10.6268C3.97109 17.0718 11.1161 22.2308 11.4201 22.4458ZM12.0001 4.63184C15.3091 4.63184 18.0001 7.32284 18.0001 10.6368C18.0211 15.0748 13.6121 19.0598 12.0001 20.3668C10.3891 19.0588 5.97909 15.0728 6.00009 10.6318C6.00009 7.32284 8.69109 4.63184 12.0001 4.63184Z" fill="#EA8BF3"/>
                                </svg>
                                {{ __('Lokacija') }}
                            </a>
                        </div>
                        <img src="{{ asset('files/images/public-part/locations/' . $location->map_img ) }}" class="locations__list-item-map">
                        <div class="locations__map-toggle-icon-container">
                            <img src="{{ asset('files/images/svg-icons/exit-fullscreen.svg') }}" class="locations__map-toggle-icon">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('public-part.app.base-includes.snake.snake')
@endsection
