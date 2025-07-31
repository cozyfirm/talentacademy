@component('mail::message')
Poštovani {{ $_name }},

Obavještavamo vas da je na našem TMS sistemu Akademije kreiran vaš korisnički nalog, pokrenuti s e-mail adresom na koju ste primili ovu poruku.

Za prijavu koristite sljedeće podatke:

<ul>
    <li>Korisničko ime: {{ $_email }}</li>
    <li>Privremena lozinka: {{ $_password }}</li>
</ul>

<b>Molimo vas da odmah nakon prvog logovanja obavezno zamijenite privremenu lozinku</b> i po potrebi uredite svoj profil (fotografija, biografija, kontakt podaci i sl.).

Sa istim nalogom moći ćete pristupiti i mobilnoj aplikaciji Akademije, dostupnoj na:

<ul>
    <li><a href="https://play.google.com/store/apps/details?id=ba.talentakademija.app">Google Play</a></li>
    <li><a href="https://apps.apple.com/app/id6747880569">App Store</a></li>
</ul>

U slučaju poteškoća s prijavom ili podešavanjem profila, slobodno nam se javite na mail akademija@fondacijaekipa.ba.

Srdačno,
<a href="{{ route('auth') }}"> Helem Nejse Talent akademija </a>
@endcomponent
