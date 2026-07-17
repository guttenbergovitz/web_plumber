@extends('layouts.app')

@section('title', __('AI Reality') . ' — ' . __('web_plumber'))
@section('meta_description', __('Czy AI poradzi sobie samo? Możliwe. Ale jest kilka ale.'))

@section('content')
<div class="page-header">
    <h1>{{ __('AI to fajna zabawka.') }}</h1>
    <p>{{ __('Demokratyzuje dostęp do technologii. Ktoś kto rok temu nie wiedział, jak się pisze "hello world", dziś generuje funkcje i pisze testy. To jest fajne.') }}</p>
</div>

<div class="page-section">
    <h2><span class="prefix">$</span> {{ __('Ale jest kilka ale.') }}</h2>
    <p style="color:var(--text-secondary)">{{ __('Jeśli uważasz, że AI napisze Ci kompletną aplikację i Ty będziesz mógł zrezygnować z developerów — pytamy nie po to, żeby kłótnić się, ale żeby ocytować prawdę, którą poznajemy przy każdym tak zbudowanym kodzie.') }}</p>
</div>

<div class="page-section">
    <h2><span class="prefix">!</span> {{ __('Context window to nie to samo co zrozumienie architekturi') }}</h2>
    <p>{{ __('AI ma limit. 100k tokenów? 200k? Jeśli Twoja aplikacja ma 50 tysięcy linii kodu, baza danych z 300 tabelami, a business logika żyje w cache-u i w czymś co "wszyscy wiedzą" — AI nie wie. Nie wie kontekstu.') }}</p>
    <p>{{ __('Człowiek siedzi w tym kodzie 2 lata i wie dlaczego GET /users zwraca nie wszystko, tylko co aktywne w ostatnich 30 dniach. Wie to bez czytania kodu. Wie to, bo rozmawiał z product ownerem, pamięta się wypadek, kiedy zapomniał o tym warunku i się czad stało.') }}</p>
    <p>{{ __('AI przeczyta funkcję, ale nie ma tej pamięci. Za każdym razem zapomnina.') }}</p>
</div>

<div class="page-section">
    <h2><span class="prefix">!</span> {{ __('Hallucynacje wyglądają jak funkcje') }}</h2>
    <p>{{ __('AI ci wygeneruje kod, który będzie wyglądać prawidłowo. Będzie mieć prawidłową składnię. Będzie się kompilować. A będzie robić złą rzecz.') }}</p>
    <p>{{ __('Klasyk: AI generuje SQL, który logicznie wygląda okej, ale na produkcji z milionem wierszy zwisza system. Lub zwraca źle zsortowane wyniki w 0.01% przypadków — i Twoi klienci odkrywają to pół roku później.') }}</p>
    <p>{{ __('Osoba co pisze kod od 10 lat patrzy na ten SQL i widzi: "czekaj, ale jeśli Category zmieni się po tym INSERT-ie...". AI tego nie widzi. AI pisze kod, który zdaje 99.99% testów.') }}</p>
</div>

<div class="page-section">
    <h2><span class="prefix">!</span> {{ __('Testów AI nie da się pisać lepiej niż kod') }}</h2>
    <p>{{ __('AI pisze testy do kodu, który sam napisał. To jest jak prosić kogoś żeby sprawdzał swoje własne prace domowe.') }}</p>
    <p>{{ __('Testy muszą być napisane przez kogoś, kto: (1) wie jakie edge case-y mogą się stać, (2) zna historię bugów w tym projekcie, (3) wie, co business uzna za katastrofę.') }}</p>
    <p>{{ __('AI tego nie wie. Napisze testy na "happy path". I będzie myśleć, że to jest wystarczające.') }}</p>
</div>

<div class="page-section">
    <h2><span class="prefix">!</span> {{ __('Nie ma odpowiedzialności') }}</h2>
    <p>{{ __('Jeśli AI wygeneruje kod, który spowoduje wyciek danych albo utratę pieniędzy klientów — AI nie będzie siedział na przesłuchaniu z regulatorem.') }}</p>
    <p>{{ __('Ty będziesz. Albo Twój zespół. Albo Twoja firma.') }}</p>
    <p>{{ __('AI to narzędzie. Narzędzie nie podpisuje kontraktów. Nie bierze odpowiedzialności. Nie powie "przepraszam, mogliśmy to sprawdzić lepiej".') }}</p>
</div>

<div class="page-section">
    <h2><span class="prefix">!</span> {{ __('Wdrożyć to nie to samo co napisać') }}</h2>
    <p>{{ __('AI pisze funkcje. Ale wdrażanie to:') }}</p>
    <ul>
        <li>{{ __('Migracja bazy danych bez downtime\'u') }}</li>
        <li>{{ __('Rollback plan jeśli coś pójdzie nie tak') }}</li>
        <li>{{ __('Monitoring — co patrzysz, żeby wiedzieć, że coś złego się dzieje') }}</li>
        <li>{{ __('Performance testing pod obciążeniem, który faktycznie będzie') }}</li>
        <li>{{ __('Dokumentacja dla zespołu obsługi') }}</li>
        <li>{{ __('I 20 rzeczy więcej, które AI wygeneruje pobieżnie, a Ty odkryjesz, że ich brakuje, w 3 nad ranem kiedy system pada') }}</li>
    </ul>
</div>

<div class="page-section">
    <h2><span class="prefix">!</span> {{ __('Pieniądze na narzędzia') }}</h2>
    <p>{{ __('AI to jest cheap (albo free, jeśli wyciągniesz z API na bakso). Ale jeśli coś idzie źle, będziesz chciał rozwiązania, a to kosztuje.') }}</p>
    <p>{{ __('Senior developer co potrzebuje 2 dni na zdiagnozowanie problemu? 2000-4000 zł. Ale z tego wychodzisz. Z AI solo możesz się obudzić z 10k problemem, którymi będziesz dłubać 3 tygodnie.') }}</p>
</div>

<div class="page-section">
    <h2><span class="prefix">$</span> {{ __('OK, ale co gdy masz AI + dobrą osobę?') }}</h2>
    <p>{{ __('To jest inna historia.') }}</p>
    <p>{{ __('Osoba pisze architekturę. Pisze brudnopis bazy danych. Pisze dokumentację co ma się stać. Wtedy AI pisze funkcje szybciej. Osoba czyta, testuje, pyta się "a co jeśli...". AI generuje warianty.') }}</p>
    <p>{{ __('Osoba pisze testy pod edge case-y. AI písze resztę testów. Osoba wdrażania — AI pisze scriptu. Osoba robi performance testing — AI analizuje wyniki.') }}</p>
    <p>{{ __('W tej kombinacji: AI robi 70% pracy. Osoba robi 30%, ale 30% to są decyzje. Decyzje to jest to, co faktycznie się liczy.') }}</p>
</div>

<div class="page-section">
    <h2><span class="prefix">!</span> {{ __('Czemu my nie robimy tego całym AI?') }}</h2>
    <p>{{ __('Bo nas pytają. Klienci przychodzą i mówią: "generowałem kod przez 6 miesięcy, wydałem 200 zł na API, ale system jest nieczytelny, nikt nie wie jak go zmienić, i co drugi feature ma bug".') }}</p>
    <p>{{ __('My wiemy co robić. Znamy legacy. Znamy edge case-y. Wiemy co się stanie jak baza ma milion wierszy. Wiemy jak to zmienić bez zbijania serwera.') }}</p>
    <p>{{ __('I tak, używamy AI. Do generowania testów. Do analizy kodu. Do generowania dokumentacji. Ale AI się nie decyduje. Decyzje bierze osoba.') }}</p>
</div>

<div class="page-section">
    <h2><span class="prefix">$</span> {{ __('Podsumowanie') }}</h2>
    <p style="font-size:var(--fs-body);line-height:var(--lh-loose);color:var(--text);margin-bottom:1rem">
        <strong style="color:var(--orange)">{{ __('AI to najfajniejsza zabawka od chleba z masłem.') }}</strong>
        <br>
        {{ __('Ale "najfajniejsza zabawka" to nie to samo co "kompletne rozwiązanie".') }}
    </p>
    <p>{{ __('Jeśli chcesz zmienić architekturę — musisz mieć kogoś, kto zna się na architekturach.') }}</p>
    <p>{{ __('Jeśli chcesz wdrożyć bez psucia bazy — musisz mieć kogoś, kto wie jak się robi migracje.') }}</p>
    <p>{{ __('Jeśli chcesz żeby kod żył 5 lat i nikt nie stracił rozumu czytając go — musisz mieć kogoś, kto wie co to znaczy.') }}</p>
    <p>{{ __('AI ci w tym pomoże. Ale to osoba decyduje.') }}</p>
</div>

<section class="cta-section">
    <div class="prompt">$ {{ __('Pytania?') }}</div>
    <h2>{{ __('Gadajmy. Albo napisz.') }}</h2>
    <p>{{ __('Bez zobowiązań, bez sprzedaży. Pogadamy o kodzie.') }}</p>
    <a href="mailto:hello@web-plumber.dev" class="cta-link">hello@web-plumber.dev</a>
</section>
@endsection
