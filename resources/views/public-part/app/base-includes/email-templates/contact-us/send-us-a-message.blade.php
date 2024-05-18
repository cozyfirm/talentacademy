@component('mail::message')
# {{ $_program }}

Ime i prezime: {{ $_name }},
Email: {{ $_email }}

Poruka: {{ $_message }}

Hvala Vam što koristite naš sistem!
Ugodan ostatak dana,<br>
<a href="{{ env('APP_DOMAIN') }}"> Helem Nejse Talent akademija </a>
@endcomponent
