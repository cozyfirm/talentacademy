@component('mail::message')
# Dobrodošli na Helem Nejse Talent Akademiju!

{!! nl2br($_message) !!}

Srdačno,<br>
<a href="{{ env('APP_DOMAIN') }}"> Helem Nejse Talent akademija </a>
@endcomponent
