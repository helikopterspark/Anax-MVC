Redovisning
====================================
[Kmom01](#Kmom01) | [Kmom02](#Kmom02) | [Kommentarer](#comments)
 
<a id="Kmom01"></a>Kmom01: PHP-baserade och MVC-inspirerade ramverk
------------------------------------
 
Kursmoment 1 påbörjades lite före den officiella terminsstarten genom att läsa litteraturen och informationen på webben. Det var en hel del att ta sig igenom och jag tror att jag får gå tillbaka och repetera en del under kursens gång.

Därefter tog jag tag i det praktiska och det löpte ganska smärtfritt. Jag började med att forka Anax-MVC från github enligt instruktionen. Jag gick igenom övningen och gjorde sedan uppgiften och la även in tärningsspelet som följde med Anax-MVC. Jag stötte inte på några egentliga problem förrän jag gjorde extrauppgifterna med att lägga in mina gamla klasser från förra kursen.

Jag började med kalendern och där behövde jag egentligen bara lägga till namespaces sedan funkade koden direkt. Lite googlande krävdes för att reda ut hur man instansierar en klass från det globala scopet. Det var dock så enkelt att man bara lägger till en backslash före klassnamnet.

Jag la mitt tärningspel från oophp-kursen under Tärningsmenyn. Tärningsspelet 100 funkade också bra att lägga in sånär som på snygga länkar. Vid reload av sidan försvann den snygga länken. Jag fick till en fungerande lösning men den känns lite som ett hack då den explicit tar bort index.php från url:en. Det kanske finns en snyggare och enklare lösning? I vilket fall som helst så funkade det bra att lägga in klasserna till tärningsspelet i ramverket, trots den i min mening något röriga koden jag åstadkom till tärningsspelet.

Det var bra att göra dessa två extrauppgifter då de gav extra övning i att förstå ramverkets uppbyggnad och vilka filer man måste skapa och vilka filer man måste in och skriva i.

Jag har även lagt upp mitt klonade Anax-MVC på github.

### Vilken utvecklingsmiljö använder du?
Jag använder OS X 10.10.5 på en Mac Mini. Jag brukar uppdatera operativsystemet så snart det kommer en ny version och har även tillgång till 10.11 El Capitan DP på en separat installation.

Som kodeditor använder jag Sublime Text 3 med en plugin för kodkomplettering. Jag ska försöka lägga in phpcs också som det tipsas om i en forumtråd. Git kör jag via kommandorad och Filezilla för överföring till bth-servern. Jag testar sidorna i Firefox, Safari och Opera. Jag kan även testa i Windows 10 och Ubuntu som virtuella maskiner. Lokalt på Macen kör jag XAMPP men testar även att lägga sidorna på en Raspberry Pi emellanåt.

### Är du bekant med ramverk sedan tidigare?
Jag har viss erfarenhet av ramverk sedan tidigare. Dels enklare ramverk för webb från ett tidigare jobb (utöver Anax i förra kursen) och Apples kodramverk för iOS. När jag läste C\++ ingick det bl a i kursen att skriva ett enklare ramverk och plugins till detta. Konceptet med ramverk är därför inte direkt nytt för mig.
### Är du sedan tidigare bekant med de lite mer avancerade begrepp som introduceras?
Callbacks och anonyma funktioner är något jag har nosat lite på tidigare med känner inte att jag behärskar riktigt. Så jag hoppas att jag får djupare förståelse av den här kursen.

Abstrakta klasser och interface känner jag igen från objektorienterad programmering i C\++. Traits är dock nytt och det verkar vara en användbar teknik.

MVC-konceptet kände jag till sedan tidigare från iOS då mobilappar i regel byggs upp enligt MVC-mönster.

### Din uppfattning om Anax och speciellt Anax-MVC?
Det tog lite tid att lära sig hitta rätt i Anax i förra kursen. Nu tyckte jag att det gick betydligt snabbare att förstå Anax-MVC. Det verkar vara ett mer komplett ramverk och att det separerar html-koden bättre är en stor fördel tycker jag. Det kommer att ta lite tid att sätta sig in helt i Anax-MVC också men första intrycket är bra.

[Upp](#)

<a id="Kmom02"></a> Kmom02: Kontroller och modeller
-------------------------------

Kursmoment 2 var precis som i den föregående kursen ganska mastigt att ta in och genomföra. Övningarna gick visserligen enkelt att ta sig igenom men att lösa uppgiften var svårare. Det var kanske inte så mycket rent kodande totalt sett men det tog tid att förstå hur allt hänger ihop för att få till den koden. Det blev en hel del detektivarbete i ramverket, läsande i forumet och mycket trial and error i kodandet. Dessbättre har andra gjort misstag före mig så forumet gav svar när jag körde fast.

Jag är någorlunda nöjd med resultatet i alla fall. Funktionaliteten har sina begränsningar utan databas men funkar utefter förutsättningarna. Jag försökte få till en Disqus-liknande design på kommentarerna. Jag har lagt till kommentarsfunktionen på startsidan och på redovisningssidan. Sidorna har separata kommentarsflöden och det skulle vara lätt att lägga till kommentarer på fler sidor. Inmatningen har felhantering och validering och själva kommentarstexten körs genom markdown-filter. Notera att knappen Radera alla tar bort kommentarerna för alla sidor (borde egentligen vara en ren admin-funktion). 

Jag lärde mig f ö att `foreach` jobbar med en kopia av arrayen, vilket kan ställa till en del huvudbry när man vill ändra värden. Jag såg inte ändringarna med `strip-tags` slå igenom först men jag misstänkte att det hade med kopia istället för referens att göra. Lite läsning i php-manualen och på stackoverflow bekräftade detta.

### Hur känns det att jobba med Composer?

Det känns enkelt, så pass att man kan komma ihåg nödvändiga kommandon utan att leta fram instruktionerna varje gång. Eftersom jag installerade det så att det funkar globalt så är det enkla kommandon att skriva. Har man lagt till en require-rad i sin composer.json så sker nedladdningen av filerna snabbt och enkelt. Det gäller bara att komma ihåg att köra update-kommandot efter att ha "deployat" sitt ramverk någonstans.

### Vad tror du om de paket som finns i Packagist, är det något du kan tänka dig att använda och hittade du något spännande att inkludera i ditt ramverk?

Det verkar finnas massor av paket att välja bland. Det kan kanske ta lite tid att hitta något passande och många paket verkar vara beroende av andra eller menade för vissa ramverk. Det är dessutom svårt att veta vilket som är bra och vilket som är mindre bra när man hittar flera med snarlik funktion. Jag hittade dock ett paket för validering, vlucas/valitron, som inte hade några beroenden. Jag valde att inkludera det i min lösning och det fungerar utmärkt till att validera inmatade kommentarer innan de sparas. Det är troligt att jag kommer att leta efter fler paket där i framtiden.

### Hur var begreppen att förstå med klasser som kontroller som tjänster som dispatchas, fick du ihop allt?

Det jag hade svårast att greppa var hur dispatchern fungerar i praktiken. Jag vet inte om jag fullt greppat flödet i ramverket än. Ett problem jag brottades med var vid redirect, där sidhänvisningen tycktes falla bort och man antingen hamnade på förstasidan eller fick ett felmeddelande. Jag insåg till slut att detta värde måste skickas med som en parameter med dispatchern.

### Hittade du svagheter i koden som följde med phpmvc/comment? Kunde du förbättra något?

Koden var väldigt rudimentär och jag skrev utökade klasser som ersätter de flesta av metoderna i basklasserna. Basklasserna ligger dock kvar oförändrade i vendor-mappen och används. Jag lade till felhantering med hjälp av det externa paketet med valideringsfunktioner. Jag gjorde även extrauppgifterna med Gravatar-bild och dolt formulär. Jag fick inte Gravatar-bilderna att visas först men det visade sig bero på att jag vid något tidigare tillfälle blockerat dessa via Ghostery... 

En större svaghet är dock att kommentarerna sparas i en array i sessionen. Det blir ganska kortlivade kommentarer som dessutom bara syns för den som lagt in dem. Jag försökte lägga till en funktion för att ändra sortering men det faktum att sorteringen gjordes på array-index ställde till problem vid uppdatering av en befintlig kommentar efter att man vänt på ordningen mha `array_reverse()`. Eftersom det inte var något krav i uppgiften så bestämde jag mig för att spara den finessen till senare kursmoment där databasen finns till hands.

[Upp](#)