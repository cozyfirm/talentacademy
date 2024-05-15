@extends('public-part.layout.layout')

@section('title'){{ $location->title }}@endsection
@section('meta_title'){{ $location->title }}@endsection
@section('meta_desc'){{ substr(strip_tags($location->description), 0, 150) }}..@endsection
@section('meta_img'){{ asset('files/images/public-part/locations/' . $location->main_img ) }}@endsection

<!-- Page content -->
@section('public-content')
    <div class="single-location">
        <div class="single-location__container">
           <img src="{{ asset('files/images/public-part/locations/' . $location->cover_img ) }}" class="single-location__image">
            <div class="sl__header">
                <h2 class="single-location__title"> {{ $location->title }} </h2>
            </div>
            <div class="sl__content_w">
                <div class="sl__content_w_left">
                    <div class="sl__content_w_left_addr"> {{ $location->address }}, {{ $location->city }}, {{ $location->countryRel->name_ba ?? '' }}</div>
                    <a href="{{ $location->location }}" target="_blank" class="sl__content_w_left_btn mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M21.447 6.10498L15.447 3.10498C15.3081 3.03546 15.1549 2.99927 14.9995 2.99927C14.8441 2.99927 14.6909 3.03546 14.552 3.10498L9 5.88198L3.447 3.10498C3.2945 3.02878 3.12506 2.99283 2.95476 3.00054C2.78446 3.00825 2.61895 3.05938 2.47397 3.14905C2.32899 3.23873 2.20933 3.36398 2.12638 3.51291C2.04342 3.66184 1.99992 3.82951 2 3.99998V17C2 17.379 2.214 17.725 2.553 17.895L8.553 20.895C8.69193 20.9645 8.84515 21.0007 9.0005 21.0007C9.15585 21.0007 9.30907 20.9645 9.448 20.895L15 18.118L20.553 20.894C20.7051 20.9709 20.8744 21.0074 21.0446 20.9998C21.2149 20.9923 21.3803 20.941 21.525 20.851C21.82 20.668 22 20.347 22 20V6.99998C22 6.62098 21.786 6.27498 21.447 6.10498ZM10 7.61798L14 5.61798V16.382L10 18.382V7.61798ZM4 5.61798L8 7.61798V18.382L4 16.382V5.61798ZM20 18.382L16 16.382V5.61798L20 7.61798V18.382Z" fill="#EA8BF3"/>
                        </svg> {{ __('Direkcije') }}
                    </a>
                </div>
                <div class="sl__content_w_right">
                    {!! nl2br($location->description) !!}
                </div>
            </div>

        </div>
    </div>

    <div class="locations__slider_wrapper">
        <div class="locations__slider_inner">
            <div class="locations__slider_header">
                <h2>{{ __('Lokacije') }}</h2>
            </div>

            <div class="preview__locations_body">
                @foreach($similarLocations as $location)
                    <div class="single_location">
                        <div class="upper_w">
                            <div class="img_wrapper">
                                <img src="{{ asset('files/images/public-part/locations/' . $location->main_img ) }}" alt="Location image" class="single-location__locations-list-item-image">
                            </div>
                            <div class="text_wrapper">
                                <h3> {{ $location->title }} </h3>
                                <p>{{ $location->address }}, {{ $location->city }}</p>
                            </div>
                        </div>

                        <div class="btns_wrapper">
                            <a href="{{ route('public-part.locations.single-location', ['id' => $location->id ]) }}">
                                <div class="btn btn_bcg">
                                    {{ __('Više') }}
                                </div>
                            </a>
                            <a href="{{ $location->city }}" target="_blank">
                                <div class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                        <path d="M12.0001 14.6318C14.2061 14.6318 16.0001 12.8378 16.0001 10.6318C16.0001 8.42584 14.2061 6.63184 12.0001 6.63184C9.79406 6.63184 8.00006 8.42584 8.00006 10.6318C8.00006 12.8378 9.79406 14.6318 12.0001 14.6318ZM12.0001 8.63184C13.1031 8.63184 14.0001 9.52884 14.0001 10.6318C14.0001 11.7348 13.1031 12.6318 12.0001 12.6318C10.8971 12.6318 10.0001 11.7348 10.0001 10.6318C10.0001 9.52884 10.8971 8.63184 12.0001 8.63184Z" fill="#EA8BF3"/>
                                        <path d="M11.4201 22.4458C11.5893 22.5667 11.7921 22.6317 12.0001 22.6317C12.2081 22.6317 12.4108 22.5667 12.5801 22.4458C12.8841 22.2308 20.0291 17.0718 20.0001 10.6318C20.0001 6.22084 16.4111 2.63184 12.0001 2.63184C7.58909 2.63184 4.00009 6.22084 4.00009 10.6268C3.97109 17.0718 11.1161 22.2308 11.4201 22.4458ZM12.0001 4.63184C15.3091 4.63184 18.0001 7.32284 18.0001 10.6368C18.0211 15.0748 13.6121 19.0598 12.0001 20.3668C10.3891 19.0588 5.97909 15.0728 6.00009 10.6318C6.00009 7.32284 8.69109 4.63184 12.0001 4.63184Z" fill="#EA8BF3"/>
                                    </svg>
                                    {{ __('Lokacija') }}
                                </div>
                            </a>
                        </div>

                        <div class="body_w">


                        </div>
                    </div>
                @endforeach
            </div>

            <div class="homepage-locations__navigation">
                <div class="homepage-locations__navigation-arrows">
                    <button class="homepage-locations__navigation-arrow locations__navigation_previous">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                            <path d="M14.293 7.68219L8.58603 13.3892L14.293 19.0962L15.707 17.6822L11.414 13.3892L15.707 9.09619L14.293 7.68219Z" fill="black"/>
                        </svg>
                    </button>
                    <button class="homepage-locations__navigation-arrow locations__navigation_next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                            <path d="M9.70697 17.5815L15.414 11.8745L9.70697 6.16748L8.29297 7.58148L12.586 11.8745L8.29297 16.1675L9.70697 17.5815Z" fill="black"/>
                        </svg>
                    </button>
                </div>
                <a href="{{ route('public-part.locations.locations') }}" class="homepage-locations__navigation-all">
                    {{ __('Sve lokacije') }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                        <path d="M3.00006 13.6319L17.5861 13.6319L12.2931 18.9249L13.7071 20.3389L21.4141 12.6319L13.7071 4.92487L12.2931 6.33887L17.5861 11.6319L3.00006 11.6319V13.6319Z" fill="#EA8BF3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endsection
