<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <title> {{ __('Prijavite se') }} </title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icons/LogoMali.png') }}"/>

    <!-- CSS files + fonts -->

    @vite(['resources/css/app.scss', 'resources/css/admin/admin.scss', 'resources/js/app.js'])

    <!-- JavaScript files -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<div class="auth-form">
    <div class="af-image">
        {{--<img src="{{ asset('files/images/default/ekipa.png') }}" alt="">--}}
        <div class="af-img-text">
            <h1>ALKARIS</h1>
        </div>
    </div>
    <div class="af-form">
        <div class="aff-container">
            <div class="aff-header">
                <h1 class="tb-color mb-4"> <b>{{ __('Alkaris d.o.o Sarajevo') }}</b> </h1>
            </div>

            <div class="aff-short">
                <p>
                    {{ __('Dobrodošli nazad. Unesite Vaše kredincijale i prijavite se na sistem www.alkaris.com. Enjoy using it !') }}
                </p>
            </div>
            <hr>
            <div class="aff-form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="mb-2"> <b> {{ __('Vaš email') }} </b> </label>
                            <input type="email" name="email" class="form-control form-control-sm mb-2" id="email" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted"> {{__('Molimo da unesete Vaš email!')}} </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="mb-2"> <b> {{ __('Vaša šifra / lozinka') }} </b> </label>
                            <input type="password" name="password" class="form-control form-control-sm mb-2" id="password" aria-describedby="passwordHelp">
                            <small id="passwordHelp" class="form-text text-muted"> {{ __('Vaša korisnička šifra / lozinka') }} </small>
                        </div>
                    </div>
                </div>

                <div class="row aff-links">
                    <div class="col-md-6 mt-3 d-inline-flex">
                        <div class="stay-logged-in">
                            <input type="checkbox" name="stay_logged" id="stay_logged">
                            <label for="stay_logged">{{ __('Ostanite prijavljeni') }}</label>
                        </div>
                        <span>|</span>
                        <a href="#"> {{ __('Zaboravili ste šifru?') }} </a>
                    </div>
                    <div class="col-md-6 mt-3 d-flex justify-content-end">
                        <button type="submit" class="btn auth-btn"> {{ __('PRIJAVITE SE') }} </button>
                    </div>
                </div>

                <hr>

                <div class="row aff-links mt-3">
                    <p>
                        {{ __('Još nemate korisnički račun?') }}
                        <a href="{{ route('auth.create-account') }}"><b>{{ __('Kreirajte ga ovdje!') }}</b></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
