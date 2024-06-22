@component('mail::message')
# Status aplikacije

Poštovani/a {{ $_name }}, Vaša prijava je <b>{{ $_status }}</b>!

{!! nl2br($_message) !!}

Ugodan ostatak dana,<br>
<a href="{{ env('APP_DOMAIN') }}"> Helem Nejse Talent akademija </a>
@endcomponent
