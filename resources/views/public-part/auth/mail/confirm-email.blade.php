@component('mail::message')
# Kreiranje računa

Poštovani/a {{ $_name }},

Uspješno ste kreirali profil na www.alkaris.com.

Za verifikaciju Vašeg email-a, molimo kliknite <a href="#">ovdje</a>.

Hvala Vam što koristite naš sistem!
Ugodan ostatak dana,<br>
<a href="{{ env('APP_DOMAIN') }}"> Alkaris D.O.O </a>
@endcomponent
