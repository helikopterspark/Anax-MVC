Redovisning
====================================
[Kmom01](#Kmom01) | [Kmom02](#Kmom02) | [Kmom03](#Kmom03) | [Kmom04](#Kmom04) | [Kmom05](#Kmom05) | [Kmom06](#Kmom06) | [Kmom07/10](#Kmom07) | [Kommentarer](#comments)

<a id="Kmom01"></a>Kmom01: PHP-baserade och MVC-inspirerade ramverk
------------------------------------

Kursmoment 1 påbörjades lite före den officiella terminsstarten genom att läsa litteraturen och informationen på webben. Det var en hel del att ta sig igenom och jag tror att jag får gå tillbaka och repetera en del under kursens gång.

Därefter tog jag tag i det praktiska och det löpte ganska smärtfritt. Jag började med att forka Anax-MVC från github enligt instruktionen. Jag gick igenom övningen och gjorde sedan uppgiften och la även in tärningsspelet som följde med Anax-MVC. Jag stötte inte på några egentliga problem förrän jag gjorde extrauppgifterna med att lägga in mina gamla klasser från förra kursen.

Jag började med kalendern och där behövde jag egentligen bara lägga till namespaces sedan funkade koden direkt. Lite googlande krävdes för att reda ut hur man instansierar en klass från det globala scopet. Det var dock så enkelt att man bara lägger till en backslash före klassnamnet.

Jag la mitt tärningspel från oophp-kursen under Tärningsmenyn. Tärningsspelet 100 funkade också bra att lägga in sånär som på snygga länkar. Vid reload av sidan försvann den snygga länken. Jag fick till en fungerande lösning men den känns lite som ett hack då den explicit tar bort index.php från url:en. Det kanske finns en snyggare och enklare lösning? I vilket fall som helst så funkade det bra att lägga in klasserna till tärningsspelet i ramverket, trots den i min mening något röriga koden jag åstadkom till tärningsspelet.

Det var bra att göra dessa två extrauppgifter då de gav extra övning i att förstå ramverkets uppbyggnad och vilka filer man måste skapa och vilka filer man måste in och skriva i.

Jag har även lagt upp mitt klonade Anax-MVC på github.

##### Vilken utvecklingsmiljö använder du?

Jag använder OS X 10.10.5 på en Mac Mini. Jag brukar uppdatera operativsystemet så snart det kommer en ny version och har även tillgång till 10.11 El Capitan DP på en separat installation.

Som kodeditor använder jag Sublime Text 3 med en plugin för kodkomplettering. Jag ska försöka lägga in phpcs också som det tipsas om i en forumtråd. Git kör jag via kommandorad och Filezilla för överföring till bth-servern. Jag testar sidorna i Firefox, Safari och Opera. Jag kan även testa i Windows 10 och Ubuntu som virtuella maskiner. Lokalt på Macen kör jag XAMPP men testar även att lägga sidorna på en Raspberry Pi emellanåt.

##### Är du bekant med ramverk sedan tidigare?

Jag har viss erfarenhet av ramverk sedan tidigare. Dels enklare ramverk för webb från ett tidigare jobb (utöver Anax i förra kursen) och Apples kodramverk för iOS. När jag läste C\++ ingick det bl a i kursen att skriva ett enklare ramverk och plugins till detta. Konceptet med ramverk är därför inte direkt nytt för mig.

##### Är du sedan tidigare bekant med de lite mer avancerade begrepp som introduceras?

Callbacks och anonyma funktioner är något jag har nosat lite på tidigare med känner inte att jag behärskar riktigt. Så jag hoppas att jag får djupare förståelse av den här kursen.

Abstrakta klasser och interface känner jag igen från objektorienterad programmering i C\++. Traits är dock nytt och det verkar vara en användbar teknik.

MVC-konceptet kände jag till sedan tidigare från iOS då mobilappar i regel byggs upp enligt MVC-mönster.

##### Din uppfattning om Anax och speciellt Anax-MVC?

Det tog lite tid att lära sig hitta rätt i Anax i förra kursen. Nu tyckte jag att det gick betydligt snabbare att förstå Anax-MVC. Det verkar vara ett mer komplett ramverk och att det separerar html-koden bättre är en stor fördel tycker jag. Det kommer att ta lite tid att sätta sig in helt i Anax-MVC också men första intrycket är bra.

[Upp](#)

<a id="Kmom02"></a> Kmom02: Kontroller och modeller
-------------------------------

Kursmoment 2 var precis som i den föregående kursen ganska mastigt att ta in och genomföra. Övningarna gick visserligen enkelt att ta sig igenom men att lösa uppgiften var svårare. Det var kanske inte så mycket rent kodande totalt sett men det tog tid att förstå hur allt hänger ihop för att få till den koden. Det blev en hel del detektivarbete i ramverket, läsande i forumet och mycket trial and error i kodandet. Dessbättre har andra gjort misstag före mig så forumet gav svar när jag körde fast.

Jag är någorlunda nöjd med resultatet i alla fall. Funktionaliteten har sina begränsningar utan databas men funkar utefter förutsättningarna. Jag försökte få till en Disqus-liknande design på kommentarerna. Jag har lagt till kommentarsfunktionen på startsidan och på redovisningssidan. Sidorna har separata kommentarsflöden och det skulle vara lätt att lägga till kommentarer på fler sidor. Inmatningen har felhantering och validering och själva kommentarstexten körs genom markdown-filter. Notera att knappen Radera alla tar bort kommentarerna för alla sidor (borde egentligen vara en ren admin-funktion).

Jag lärde mig f ö att `foreach` jobbar med en kopia av arrayen, vilket kan ställa till en del huvudbry när man vill ändra värden. Jag såg inte ändringarna med `strip-tags` slå igenom först men jag misstänkte att det hade med kopia istället för referens att göra. Lite läsning i php-manualen och på stackoverflow bekräftade detta.

##### Hur känns det att jobba med Composer?

Det känns enkelt, så pass att man kan komma ihåg nödvändiga kommandon utan att leta fram instruktionerna varje gång. Eftersom jag installerade det så att det funkar globalt så är det enkla kommandon att skriva. Har man lagt till en require-rad i sin composer.json så sker nedladdningen av filerna snabbt och enkelt. Det gäller bara att komma ihåg att köra update-kommandot efter att ha "deployat" sitt ramverk någonstans.

##### Vad tror du om de paket som finns i Packagist, är det något du kan tänka dig att använda och hittade du något spännande att inkludera i ditt ramverk?

Det verkar finnas massor av paket att välja bland. Det kan kanske ta lite tid att hitta något passande och många paket verkar vara beroende av andra eller menade för vissa ramverk. Det är dessutom svårt att veta vilket som är bra och vilket som är mindre bra när man hittar flera med snarlik funktion. Jag hittade dock ett paket för validering, vlucas/valitron, som inte hade några beroenden. Jag valde att inkludera det i min lösning och det fungerar utmärkt till att validera inmatade kommentarer innan de sparas. Det är troligt att jag kommer att leta efter fler paket där i framtiden.

##### Hur var begreppen att förstå med klasser som kontroller som tjänster som dispatchas, fick du ihop allt?

Det jag hade svårast att greppa var hur dispatchern fungerar i praktiken. Jag vet inte om jag fullt greppat flödet i ramverket än. Ett problem jag brottades med var vid redirect, där sidhänvisningen tycktes falla bort och man antingen hamnade på förstasidan eller fick ett felmeddelande. Jag insåg till slut att detta värde måste skickas med som en parameter med dispatchern.

##### Hittade du svagheter i koden som följde med phpmvc/comment? Kunde du förbättra något?

Koden var väldigt rudimentär och jag skrev utökade klasser som ersätter de flesta av metoderna i basklasserna. Basklasserna ligger dock kvar oförändrade i vendor-mappen och används. Jag lade till felhantering med hjälp av det externa paketet med valideringsfunktioner. Jag gjorde även extrauppgifterna med Gravatar-bild och dolt formulär. Jag fick inte Gravatar-bilderna att visas först men det visade sig bero på att jag vid något tidigare tillfälle blockerat dessa via Ghostery...

En större svaghet är dock att kommentarerna sparas i en array i sessionen. Det blir ganska kortlivade kommentarer som dessutom bara syns för den som lagt in dem. Jag försökte lägga till en funktion för att ändra sortering men det faktum att sorteringen gjordes på array-index ställde till problem vid uppdatering av en befintlig kommentar efter att man vänt på ordningen mha `array_reverse()`. Eftersom det inte var något krav i uppgiften så bestämde jag mig för att spara den finessen till senare kursmoment där databasen finns till hands.

[Upp](#)

<a id="Kmom03"></a> Kmom03: Bygg ett eget tema
-------------------------------

Kursmoment 3 behandlar ett intressant ämne tycker jag. Att kunna använda mallar för ett tema och med dessa sedan snabbt kunna skapa nya sidor är väl en del av vitsen med ett ramverk.

Just tema-biten var inte så svår att sätta sig in i men det har varit ett väldigt tidsödande kursmoment med många sena kvällar. Så pass att jag halkat efter lite i min planering. Det har gått åt en hel del tid åt att lösa saker som inte direkt berört temat. Jag ville bl a få till snygga länkar för mer än en sidkontroller och lade en del tid på det. Sedan som en följd av detta fick jag dyka djupare i mod\_rewrite eftersom jag ville få det att funka i webservern på min Raspberry Pi. Det anknyter kanske inte direkt till kursmomentet men i viss mån till kursen och det var väldigt lärorikt. Jag har i alla fall fått till snygga länkar även för theme.php som hanterar temasidorna.

Under arbetets gång har jag dessutom fått en duvning i att använda git. Jag brukar committa lokalt, sedan `push` till github. Därefter gör jag `clone` på min Pi och `pull` vid varje uppdatering. Samma procedur på studentservern sedan. Där fixar jag .htaccess-filen för mod\_rewrite. Denna ändring orsakar en konflikt vid nästa `pull`, men då lärde jag mig att göra `git reset —-hard origin/master` för att ignorera alla ändringar. Då är det bara att göra `pull` och sedan ta bort ett ynka tecken i .htaccess igen.

Jag vill tillägga att valideringen felar för Font Awesome och vissa konstruktioner som följde med LESS-filerna. Jag antar att det inte är mycket att göra åt detta i dagsläget. Jag har sett till att html-koden är ok och att jag inte infört några egna CSS-fel.

##### Vad tycker du om CSS-ramverk i allmänhet och vilka tidigare erfarenheter har du av dem?

Jag har inga större erfarenheter av rena CSS-ramverk sedan tidigare men det är förstås bra att ha något att utgå ifrån. Att skapa en design genom att bygga upp CSS-filer från grunden är något som tar väldigt lång tid för mig. Jag är inte riktigt vän med CSS av någon anledning och även i tidigare kurser har just CSS-biten stulit enormt mycket tid av den totala arbetstiden.

##### Vad tycker du om LESS, lessphp och Semantic.gs?

LESS förenklar handhavandet med CSS på framförallt två punkter. Dels att man kan använda sig av variabler för att snabbt ändra värden, ändringar som dessutom slår igenom i flera filer, är mycket smidigt.

Jag tyckte dessutom att det blev lättare att hålla reda på i vilken ordning filerna laddades in i style.less. Jag tycker ofta annars att CSS blir väldigt rörigt och svårt att hitta rätt i när filerna börjar växa.

lessphp är ju väldigt smidigt då det funkar mer eller mindre automatiskt.

Semantic Grid förenklar avsevärt. Jag har tittat lite på 960 Grid System tidigare och tyckte det var aningen för rörigt med alla klasser för kolumner. Allt som förenklar hanteringen av CSS är bra.

Temat är responsivt vid tre brytpunkter och ser dessutom bra ut på mobila enheter, genom att lägga till `name='viewport' content='width=device-width initial-scale=1'` i `<meta>`-taggen.

##### Vad tycker du om gridbaserad layout, vertikalt och horisontellt?

Jag tycker det är utmärkt att ha som riktlinjer att utgå ifrån. Det är inte helt enkelt att hitta rätt proportioner för element på en sida genom att bara på gå känsla. Är man inte designer med bra öga för proportioner så är det bra att ha ett rutnät att hålla sig till för att få till en bra symmetri.

Det var bra att få lära sig lite om typografi och jag hade gärna dykt lite djupare i det om tiden hade tillåtit. Framför allt den matematiska delen. Återigen, det är bra att det finns vissa grundregler att hålla sig till, så att man inte behöver köra på känsla om man inte är konstnär.

##### Har du några kommentarer om Font Awesome, Bootstrap, Normalize?

Jag gillar framför allt Font Awesome. En bildbank med snygga skalbara ikoner är mycket bra att ha till hands. Jag kommer högst troligt att använda dessa ikoner framöver.

Bootstrap verkar vara en bra hjälp att ha att utgå ifrån när man skapar teman. Jag dök dock inte så djupt i det denna gång.

Normalize är också bra. Allt som kan nollställa och ge konsekventa resultat är bra när man jobbar med CSS tycker jag.

##### Beskriv ditt tema, hur tänkte du när du gjorde det, gjorde du några utsvävningar?

Jag försökte återskapa den look som jag hade skapat tidigare för ramverket genom att använda LESS istället för CSS. Som en följd av detta så applicerade jag temat på alla sidor som jag skapat för föregående kursmoment. Det funkade bra och utsvävningen jag gjorde var att få kalenderns alla div-element att vara responsiva, utan att kalendern gick sönder. Jag lade nog för mycket tid på att få till det men nu ser den bra ut, från full bredd till smalaste  bredden. Så jag vill speciellt framhäva min elastiska kalender.

Jag har även sett till att temat anpassar sig till mobila enheter och ser bra ut på dessa. Det är rätt snyggt när man ändrar orienteringen på en iPad och kalendern anpassar sig efter skärmbredden.

##### Antog du utmaningen som extra uppgift?

Jag har gjort bägge extrauppgifterna.

För att göra sidor och regioner lättare att styla har jag lagt till ett par metoder, som kan anropas dels från sidkontrollern och dels från själva html-sidan. Jag utgick från ett förslag på upplägg som fanns i forumet: [url ur Anax-MVC](http://dbwebb.se/forum/viewtopic.php?f=40&t=3293).

Jag utökade alltså ramverksklasserna med klasserna CThemeExtended och CDIFactoryExtended och skapade en ny config\_with\_app\_CR.php. CThemeExtended innehåller metoderna `getClassAttributeFor()` och `addClassAttributeFor()`. Den förstnämnda läggs till i önskad element-tag i html-sidan. Den andra metoden används i sidkontrollern för att sätta klasser. Jag har även utökat `render()`-metoden. Om man inte sätter ett tema för `<html>`-taggen via sidkontrollern så kollar den istället i config-filen efter temat. Jag har lagt till några länkar som ändrar färgschemat för att demonstrera funktionen på Tema-sidan.

Jag gjorde en fristående variant av temat som inte är kopplat till något ramverk. Det är baserat på PHP, lessphp, Font Awesome och The Semantic Grid.
Det är upplagt på github här: [https://github.com/helikopterspark/orbit-theme](https://github.com/helikopterspark/orbit-theme)

Jag har även lagt upp det på studentservern för påseende här: [http://www.student.bth.se/~carb14/phpmvc/orbit-theme/index.php](http://www.student.bth.se/~carb14/phpmvc/orbit-theme/index.php)

Om temat är till användning för någon är väl tveksamt. Det var dock en bra övning att bryta ut det nödvändiga för att få tema och sidor att fungera fristående från ramverket.

[Upp](#)

<a id="Kmom04"></a> Kmom04: Databasdrivna modeller
-------------------------------

Kursmoment 4 har varit arbetsamt men också roligt att genomföra. Det har inte inneburit några större svårigheter egentligen, mer än det vanliga strulet pga rena felskrivningar. Koncepten med formulärhantering, databashantering och modellklasser känns ganska naturliga. Förståelsen för hur ramverket fungerar har också ökat i och med detta kursmoment.

##### Vad tycker du om formulärhantering som visas i kursmomentet?

Det är utmärkt att ha formulärskapandet separat i egna klasser. Alternativet är att bygga upp formulären med HTML direkt i vyerna och det är inte lika snyggt och lättjobbat. Här bygger man upp formuläret i konstruktorn och hanterar validering och sparande av inmatad data i samma klass. Det är lättare att hålla reda på vilka formulär man har på detta sätt än när de ligger utspridda i diverse HTML-filer.

Jag saknade stöd för attributet `formnovalidate` för att kunna skapa en Avbryt-knapp. Valideringen hindrade knappens funktion. Efter att ha påpekat detta i chatten så fixade Mikael detta på stört. Så därför finns nu Avbryt-knappar som i `check()` bara gör redirect och därmed stänger formulären.

##### Vad tycker du om databashanteringen som visas, föredrar du kanske traditionell SQL?

Rent logiskt måste man tänka på samma sätt när man bygger upp en fråga men det blir en betydligt mer renodlad PHP-kod med denna hantering. Jag tyckte det var lätt att greppa konceptet och koden blir mer lättläst utan SQL-satserna, plus att man inte behöver tänka på eventuella SQL-dialekter.

Jag har valt SQLite som databas för kursmomentet då jag vill hålla ner antalet tabeller i databasen på studentservern.

##### Gjorde du några vägval, eller extra saker, när du utvecklade basklassen för modeller?

Jag följde i princip exemplet i övningen och skapade en ”tom” modellklass för User. Metoderna hamnade i CDatabaseModel, där jag också lade till metoder för orderBy, groupBy, limit och offset. Det fick bli en specifik kontrollerklass, UsersController, jag skapade ingen basklass för kontroller. Vid eftertanke kanske detta hade varit en bra idé.

Eftersom jag redan hade en utökad CDIFactoryExtended-klass så lade jag till databas-hantering som tjänst i ramverket. Jag gjorde samma sak med user och comments också, så att funktionaliteten blir lättåtkomlig.

##### Beskriv vilka vägval du gjorde och hur du valde att implementera kommentarer i databasen.

Jag valde att skapa nya klasser enligt User-varianten, en tom modellklass som nyttjar metoderna i CDatabaseModel, och en kontrollerklass. Det brukar vara lättare att börja om från scratch än att modifiera befintlig kod. Det blev en del jobb med att modifiera vyerna dock men jag är nöjd med resultatet. Genom att lägga in ankare på väl valda ställen så hoppar sidan till rätt position vid omladdning. Dvs vid öppnande och stängande av formulär så hoppar sidan till toppen av kommentarerna eller till det inlägg man nyss sparat.

En extra funktion som jag lagt till mha orderBy är att man kan ändra sortering på kommentarerna, fallande eller stigande tidslinje utifrån created-datumet.

##### Gjorde du extrauppgiften? Beskriv i så fall hur du tänkte och vilket resultat du fick.

Jag har gjort extrauppgiften. Ett litet enkelt skript, anax-scaffold.php, som tar klassnamn som argument från kommandoraden. Skriptet skapar ett antal filer utifrån boilerplate-kod: en ren modellfil, en kontrollerfil med metoder i /app/src/klassnamn och tre basala vy-filer i /app/view/klassnamn. Dessutom skapar det en CDatabaseModel.php-fil i /src/MVC, om filen inte redan existerar. Det skapas också en log-fil över vilka filer som skapats. Loggfilen fylls på varje gång man kör skriptet, dvs tidigare körningar skrivs inte över så att man har historik.

Tanken är att man står i Anax-MVC-katalogen och kör skriptet med  `php anax-scaffold.php klassnamn1 klassnamn2 etc` för att få filerna direkt på rätt plats. Man kan såklart flytta skriptet och skapa filerna utanför katalogen om man hellre vill kopiera in dem manuellt i strukturen.

Det blev väl lite av ett snabbt hack men skriptet fungerar för att snabbt generera klassfiler i mitt nuvarande Anax-MVC. Det har inte fått ett eget github-repo utan ligger i ramverket direkt under Anax-MVC-katalogen. Jag kanske vidareutvecklar applikationen och ger den ett eget repo i samband med nästa kursmoment.

[Upp](#)

<a id="Kmom05"></a> Kmom05: Bygg ut ramverket
-------------------------------

Det blev ett lite mindre arbetssamt kursmoment denna gång, vilket nästan kändes lite snopet efter det förra som var så mastigt. Eftersom jag redan fått in vanan med Github så var det egentligen bara Packagist som var nytt för mig i det här momentet.

Jag har även testat Atom under detta kursmoment istället för Sublime Text 3 som jag har använt tidigare under kursen.

##### Var hittade du inspiration till ditt val av modul och var hittade du kodbasen som du använde?
Jag valde, som flertalet andra gjort, ett av förslagen i uppgiften, flashmeddelanden. Modulen heter helikopterspark/FlashMsg. Det är en relativt enkel modul och jag började med att titta lite på koden i Phalcon. Det blev dock en enklare lösning än Phalcons som ju har två varianter med direct och session. Min modul använder sig bara av sessionen och jag skapade kodbasen från scratch. Jag ville inte sväva ut alltför mycket för att undvika att utsätta mig för alltför stora svårigheter i nästa kursmoment.

##### Hur gick det att utveckla modulen och integrera i ditt ramverk?

Det blev inte så mycket kod i modulen så det gick ganska snabbt och enkelt att utveckla den. Jag hade lite problem med konstruktorn först vid kontroll av huruvida sessionsvariabeln är satt. Efter en frustrerande felsökning kom jag fram till att koden måste läggas i en `initialize()`-funktion istället för i en konstruktor.

Modulen är byggd med fokus på att passa in i Anax-MVC och använder sig av ramverkets inbyggda sessionstjänst (CSession). Detta fungerar bra och ger lite snyggare kod än att anropa `$_SESSION` direkt.

##### Hur gick det att publicera paketet på Packagist?

Det fungerade helt utan problem faktiskt. Jag registrerade mig och följde sedan bara instruktionerna och allt flöt på. Jag fick googla lite för att klura ut hur man kopplar ihop tjänsterna men det var ju också väldigt enkelt. Läser man bara instruktionerna så brukar det mesta gå att lösa.

Jag upplevde inte någon nämnbar fördröjning mellan Github och Packagist heller, högst någon minut efter push till mitt github-repo. Det beror kanske på att modulen är liten till omfattningen.

Modulen på Packagist ligger här: [helikopterspark/flashmsg](https://packagist.org/packages/helikopterspark/flashmsg).

På Github ligger den här: [helikopterspark/FlashMsg](https://github.com/helikopterspark/FlashMsg) och är taggad med v1.0.

##### Hur gick det att skriva dokumentationen och testa att modulen fungerade tillsammans med Anax MVC?

Det var inga problem att dokumentera. Jag fick kolla upp hur man skriver Githubs variant av markdown för att få kodexemplen att bli rätt formaterade.

Jag testade att lägga in modulen i en standardinstallation av Anax MVC och det var inga problem. Jag har lagt upp ett exempel här: [Anax-MVC med FlashMsg-modul](http://www.student.bth.se/~carb14/phpmvc/kmom05/moduledemo/Anax-MVC/webroot/flashmessages.php).

Jag har även gjort en exempelsida med flashmeddelanden i mitt eget Anax-MVC [här](http://www.student.bth.se/~carb14/phpmvc/kmom05/Anax-MVC/webroot/flash). I detta fall är modulen tillagd som tjänst i ramverket via CDIFactoryExtended-klassen.

##### Gjorde du extrauppgiften? Beskriv i så fall hur du tänkte och vilket resultat du fick.

Jag lade till loggningsmodulen toeswade/log för att kunna mäta lite prestanda. Jag brukar testa mitt ramverk på min Raspberry Pi vars prestanda är ganska begränsad. Efter kmom03 går ramverket ganska segt på Pi:n och därför blev jag nyfiken på att mäta lite och se var det går segt.

Det var inga problem att lägga in modulen och få den att funka. Exempel på logg-funktionen finns längst ned på tema-sidan [här](http://www.student.bth.se/~carb14/phpmvc/kmom05/Anax-MVC/webroot/theme-).

[Upp](#)

<a id="Kmom06"></a> Kmom06: Verktyg och CI
-------------------------------

Ämnet för detta kursmoment är mycket intressant tycker jag. Automatiserade byggen och tester är väl standardförfarande i de flesta verksamheter numera, så det är viktigt att kunna hantera sådana verktyg.

##### Var du bekant med några av dessa tekniker innan du började med kursmomentet?

Jag har testat att skriva lite unittester i XCode för en iOS-app. Så jag hade en hum om vad unittester är. Jag är bekant med termerna unittest, funktionstest, regressionstest och acceptanstest sedan tidigare, men har inte direkt praktisk erfarenhet av dem.

##### Hur gick det att göra testfall med PHPUnit?

Det gick ganska lätt tycker jag, tack vare en enkel modul från förra kursmomentet. Modulen är beroende av CSession i Anax-MVC så jag fick gå efter guiden på kurswebben. Tack vare den var det inga nämnvärda problem med att inkludera ramverket och få testerna att fungera.

##### Hur gick det att integrera med Travis?

Det gick bra att koppla ihop Travis med Github-repot men sedan började det krångla när Travis skulle bygga. Anax-MVC installerades inte av någon anledning och jag var till slut tvungen att ställa en fråga i forumet. Pga att jag lyckats checka in composer.lock och vendor-mappen så ignorerade Travis att installera Anax-MVC och testkörningen felade. Efter att ha uppdaterat .gitignore-filen så fungerade Travis-bygget utan problem.

##### Hur gick det att integrera med Scrutinizer?

Scrutinizer-integrationen med Github-repot fungerade bra på första försöket. Jag upplevde dock att tjänsten går segt ibland, speciellt på kvällstid, vilket kan få processen att tima ut emellanåt. Jag antar att det är många användare under vissa tider på dygnet.

Jag körde ett antal byggen för att försöka förstå hur rapporterna fungerar och vad som påverkar statistiken.

##### Hur känns det att jobba med dessa verktyg, krångligt, bekvämt, tryggt? Kan du tänka dig att fortsätta använda dem?

Vid första försöken kan det kännas krångligt att få igång ett bygge och att få det att gå igenom. Jag tycker dock att det gick förhållandevis smärtfritt och när man väl lärt känna verktygen så känns de som en bra hjälp.

Det är en trygghet att se att ett bygge går igenom och veta att testerna är körda. Alternativet att testa manuellt enligt någon checklista känns hemskt ineffektivt i jämförelse. Vid eventuella fel är det lätt att se exakt vilket test som gick fel och man kan påbörja felsökningen därifrån. Att kunna mäta code coverage är också en trygghet och en måttstock på huruvida man testat tillräckligt. Är man nöjd med sin testsvit så är det också en indikation på när man kan anse sig vara klar med utveckling och test, dvs när man uppnått "good enough".

Etiketterna ger även en viss indikation på kodkvaliteten i ett repo, om man nu litar på Scrutinizers algoritmer för detta. Jag kan absolut tänka mig att fortsätta använda dessa verktyg i fortsättningen.

##### Gjorde du extrauppgiften? Beskriv i så fall hur du tänkte och vilket resultat du fick.

Jag fick högt resultat på kodkvaliteten redan från början och ville också få testerna att täcka all kod. Jag lyckades få 100% coverage på min modul också. Den består bara av en enda klass så det var inga större problem att uppnå, men jag fick exkludera några av de övriga filerna i paketet (autoloadern för testerna och democontrollern i /webroot) för att dessa inte skulle räknas med av Scrutinizer.

Jag har även integrerat hela min Anax-MVC-klon för kursen med Travis och Scrutinizer, mest för att få ett utlåtande om kodkvaliteten på de klasser jag lagt till. Jag kanske fortsätter att laborera med att skriva några unittester för mina klasser också, om jag vill återanvända någon klass i projektet sedan.

Så här ser resultatet ut för mitt Anax-MVC:

[![Build Status](https://travis-ci.org/helikopterspark/Anax-MVC.svg?branch=master)](https://travis-ci.org/helikopterspark/Anax-MVC)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/helikopterspark/Anax-MVC/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/helikopterspark/Anax-MVC/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/helikopterspark/Anax-MVC/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/helikopterspark/Anax-MVC/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/helikopterspark/Anax-MVC/badges/build.png?b=master)](https://scrutinizer-ci.com/g/helikopterspark/Anax-MVC/build-status/master)

Länk till [Travis](https://travis-ci.org/helikopterspark/Anax-MVC)

Länk till [Scrutinizer](https://scrutinizer-ci.com/g/helikopterspark/Anax-MVC/)

[Upp](#)

<a id="Kmom07"></a> Kmom07/10: Projektet
----------------------------------------

### Webbplatsen

Webbplatsen heter Red Planet och är ett forum avsett för folk med planeten Mars som specialintresse.

Red Planet på bth-servern
Webbplatsen finns i drift på BTH-servern med ett visst innehåll.
Länk: [WGTOTW - Red Planet](http://www.student.bth.se/~carb14/phpmvc/WGTOTW/webroot/)

Admin loggar in som admin/admin. Övriga användare kan logga in med sina akronymer som lösenord.

 
### Krav 1, 2, 3: Grunden
 

##### Användare

Webbsidan är skyddad av inloggning. Innehållet går att läsa för utomstående men vill man skriva något krävs registrering och inloggning. Det går att skapa nya användare och profilen kan redigeras. Användarnamn, namn, email, hemsida (URL) och lösenord kan uppdateras. Det går även att välja färgschema (mer om detta under optionella krav).

Man kan inte välja ett redan upptaget användarnamn och det går inte att registrera flera användare på samma email-adress.

En inloggad användare kan skapa nya frågor, svara på frågor och skriva kommentarer. Användaren kan även redigera sina egna inlägg. Kommentarer kan raderas men frågor och svar kan endast redigeras.

Användaren kan också avsluta sitt konto. Detta sker genom soft delete. Ett avslutat konto kan återaktiveras av admin. En admin kan skapa nya admin-användare.

En vanlig användare kan redigera sina egna inlägg. Admin kan redigera alla inlägg och även skapa nya ämnestaggar och redigera dessa.

Klasserna User och UserController hanterar användare. Klassen UserloginController hanterar in och utloggning. Dessutom finns CForm-klasserna CFormAddUser, CFormEditUser, CFormLogin, CFormConfirmLogout och CFormConfirmDeleteUser för hantering av användarrelaterad inmatning.

##### Förstasidan
Första sidan ger en översikt över de åtta senaste frågorna, de tre användarna med högst rank och de populäraste ämnestaggarna.

Förstasidan skapas av index.php som anropar respektive kontrollerklass för informationen, dvs QuestionController, UserController och TagController, där metoder finns för att hämta en variabel delmängd ur databasen.

##### Frågesidan
Översiktsidan över frågor listar alla frågor i datumordning. Man kan välja antal frågor att visa per sida och vilken sida som ska visas. Pagineringen beskrivs under optionella krav.

Klickar man på en frågerubrik så visas frågan med alla dess svar och kommentarer. Ämnena som frågan är kopplad till visas också. En inloggad användare kan klicka på Svara och ett formulär öppnas i flödet på sidan där svaret kan skrivas in.

Kommentarer fungerar på samma sätt, klicka på Ny kommentar och ett formulär öppnas på den plats i flödet där kommentaren kommer att ligga. Det går att kommentera både frågor och svar.

Redigering av svar och kommentarer sker också i formulär i flödet.

Alla frågor, svar och kommentarer kan (bör) skrivas i Markdown och filtreras innan presentation. Det går att lägga in bilder och storleken på dessa begränsas för att inte bryta layouten.

Frågor hanteras av klasserna Question, QuestionController, CFormAddQuestion och CFormEditQuestion.

Svar hanteras av klasserna Answer, AnswerController, CFormAddAnswer och CFormEditAnswer.

Kommentarer hanteras av klasserna Comment, CommentController, CFormAddComment och CFormEditComment. Två hjälptabeller används för att koppla en kommentar till en fråga eller ett svar, där kommentar-ID och fråge-ID eller svars-ID används som sammansatt nyckel.

Användar-ID sparas som främmande nyckel i tabellen för respektive inlägg som en användare gör för att koppla inlägget till denna.

##### Ämnen
Ämnestaggar listas i bokstavsordning på en översiktssida där antalet frågor kopplade till respektive ämne också visas. Man kan välja antal ämnestaggar att visa per sida och vilken sida som ska visas.

Klickar man på en ämnestagg så listas alla frågor kopplade till ämnet. Kopplingen mellan ämne och fråga sparas i en hjälptabell med fråge-ID och ämnes-ID som sammansatt nyckel.

Ämnen hanteras av klasserna Tag och TagController. En admin kan lägga in nya frågor och redigera dessa via klasserna CFormAddTag och CFormEditTag.

##### Användare
Det finns en alfabetiskt sorterad översikt över användare där man kan välja antal per sida och vilken sida som ska visas.

Klackar man på en användare så visas en detaljvy för användaren. Tre flikar ger en översikt över vilka frågor, svar och kommentarer användaren har gjort, sorterade på rank. Användarbilden hämtas från Gravatar.

##### Om-sidan
Det finns en Om-sida med information om webbplatsen och mig själv via en länk sidfoten.

##### Github
Webbplatsen finns på Github med en installationsinstruktion i README-filen.
Github-länk: [Projektet på Github](https://github.com/helikopterspark/WGTOTW)

Kan även nås från en länk i sidfoten på webbplatsen.

### Krav 4: Frågor (optionell)

##### Acceptera svar
En användare som fått sin fråga besvarad kan markera något av svaren som accepterat genom att klicka på bocken. Accepterat svar sparas för svaret i answer-tabellen och får en grön bock. Användaren kan ändra sig och antingen ta bort markeringen genom att klicka på den gröna bocken eller genom att acceptera ett annat svar.

##### Rösta på inlägg
En inloggad användare kan rösta på fråga, svar eller kommentar, genom att klicka på upp eller nedpilen. För att förhindra missbruk och fusk så går det endast att rösta en gång per inlägga och lagd röst ligger, dvs kan inte ångras eller ändras. Gröna eller röda pilar visar att det går att rösta, annars är de gråa.

Rösterna summeras sedan för att ranka inlägget. Rösterna räknas även in i användarens totala rykte/karma. Det ges dock inte något poäng för att rösta, bara de röster användarens inlägg får räknas.

Rösterna sparas i tre hjälptabeller där användar-ID och ID för fråga, svar eller kommentar sparas i respektive tabell. Klassen Vote innehåller metoder för röstningsfunktionen och de är allmänt skrivna så de kan användas oavsett inläggstyp.

##### Sortera svar
Svaren under en fråga kan sorteras på datum eller rank genom att klicka på flikarna ovanför svaren. Kommentarer kan f ö sorteras på stigande eller fallande datum.

##### Rank och antal frågor i översikt
Antal svar och rank på respektive fråga visas i frågeöversikten på frågesidan och även på förstasidan, och på frågefliken i användarens detaljvy.

### Krav 5: Användare (optionell)

##### Poängsystem
En användares rykte eller karma beräknas för varje sidladdning för att alltid vara aktuellt, så någon totalsumma sparas alltså inte.

Antalet frågor, svar och kommentarer summeras. Accepterade svar ger ytterligare en poäng per svar. Slutligen summeras rank på alla inlägg, vilket alltså kan höja eller sänka totalt karma för en användare. Många skräpinlägg kan alltså straffa sig i form av dåligt karma.

UserController har en metod för uträkning av användarens totala aktivitet och dess kvalitet, dvs karma.

##### Användarens aktivitet
I detaljvyn för en användare summeras all aktivitet. Under användarens Gravatar visas dennas karma och antal röstningar. Tre flikar visar alla svar, frågor och kommentarer.

### Krav 6: Valfritt (optionell)

##### Sökfunktion
I översta menyraden finns ett sökformulär i form av en ruta till höger. Denna söker efter frågor som matchar söksträngen. Sökningen görs på frågetitel och innehåll.

Jag hade lite problem med detta först då CForm inte kunde hantera två olika formulär på samma sida. Jag löste det genom att göra ett vanligt HTML-formulär av sökrutan. Sedan kom dock en uppdatering av CForm för ett par dagar sedan där problemet var löst. Jag återgick då till första lösningen och sökformuläret skapas nu med klassen CFormSearch.

Det fungerar lokalt på min dator och på en Raspberry Pi som jag testar på. På student-servern får jag dock felet Headers already sent. Detta fick mig att gå tillbaka till den gamla lösningen då den fungerar på studentservern.

##### Paginering
Med klassen CPaginator skapas paginering på översiktssidorna för frågor, svar och användare.

Jag lade en hel jobb på detta (mer än 8h) för att kunna använda samma klass till olika typer av sidor. Den fungerar även för sökresultat och filtrering på ämnestaggar. Klassen måste därför också hantera $\_GET-variabler och olika sidantal beroende på om det ska vara 5, 10, 15 eller 4, 8, 12 etc. Mottagna variabler skickas sedan tillbaka till kontrollerklasserna för att styra limit och offset i SQL-frågorna.

Valet för respektive sida sparas i sessionen. Väljer man 5 poster per sida för frågor så kvarstår det valet för frågesidan och man kan välja ett annat antal för t ex ämnestaggar.

##### Toppmeny
För att skapa toppmenyn har jag gjort en klass CTopbar och lagt till den som en tjänst i DI. Filen theme-grid.php anropar metoden create som bygger upp menyn m h a CFormSearch och sedan returnerar den som HTML. Jag utgick från hur navbar skapas och gjorde en liknande lösning.

Man kan registrera sig eller logga in via länkarna i menyn. Är man inloggad har man en genväg till sin användarprofil och till utloggning.

Jag fick dessutom forska lite i hur man gör för att få menyn att alltid ligga kvar överst vid scrollning.

##### Byta färgtema
En användare kan välja vilket färgtema denna föredrar. Det finns ett ljust och ett mörkt tema som man väljer i redigeringsformuläret. Detta sparas i databasen för användaren och väljs automatisk vid inloggning.

Funktionen är implementerad genom att utöka klassen CThemeBasic med klassen CThemeExtended. Den har två nya metoder för att hämta och sätta klassattribut.

Metoden render() från basklassen har utökats och lägger till klassattributet för taggen `html` m h a add-metoden. Vyn hämtar valt tema med get-metoden. Vilket tema som valts anges i theme-grip.php som kollar om det finns i sessionen, annars väljs det ljus temat som förval.

Det mörka temat blev kanske inte alltför snyggt (tidsbrist igen) men det demonstrerar i alla fall att funktionen med att byta tema fungerar väl.

##### LESS
Jag har använt LESS och Semantic.gs för att skapa layouten. Webbplatsen är i viss mån responsiv också men är kanske inte helt perfekt på den punkten p g a tidsbrist på slutet.

Font Awesome används för att lägga till ikoner.

Det blir en hel del issues när man validerar via Unicorn men de verkar vara relaterade till det som genereras av LESS-filerna och Font Awesome.

##### Travis och Scrutinizer
Projektet är ihopkopplat med både Travis och Scrutinizer. P g a begränsad tid så är det ganska blygsamt med unit-tester. Jag har mest koncentrerat mig på kodkvaliteten. Den är runt 9 så det får anses vara bra med så mycket kod. Jag har begränsat inspektionen till min egen kod, dvs filtrerat bort de klasser som ingår i Anax MVC.

Länk till Travis: [WGTOTW på Travis](https://travis-ci.org/helikopterspark/WGTOTW)

Länk till Scrutinizer: [WGTOTW på Scrutinizer](https://scrutinizer-ci.com/g/helikopterspark/WGTOTW/)

##### Admin-meny
En inloggad admin får även ett extra val i menyraden med några extra val. Visa källkod, skapa ny ämnestagg och skapa ny användare. Genom att klicka i admin-boxen så skapas en ny admin-användare.

##### Lägga till ämnestaggar
Lägga till nya ämnestaggar finns inte med i kravspecifikationen men jag valde att lägga till funktionen för admin, som kan skapa nya ämnestaggar, redigera och ta bort (soft delete).

##### Övrigt
Alla klasser skapade för projektet är placerade i mappen app och har sina egna namespaces, för att enklare hålla isär dem från standardklasserna i Anax MVC.

Modellklasserna Answer, Comment, Question, Tag och User är i princip tomma och är utökningar av klassen CDatabaseModel som innehåller metoder för databashantering.

Via composer har paketen cdatabase, cform och mitt egna paket flashmsg installerats och de anropas från vendor-mappen.

Jag har gjort en utökning av CDIFactoryDefault-klassen i form av CDIFactoryExtended för att kunna lägga till mina egna tjänster i DI.

Webbplatsen stöder "fina länkar".

### Projektet
För att uppnå grundkraven så känns projektet som en lagom stor uppgift och inte alls oöverkomlig om man tillgodogjort sig innehållet i kursmomenten. De optionella kraven är inte heller oöverstigliga men innebär lite mer jobb. Sedan på de valfria kraven kan man egentligen jobba hur mycket som helst och aldrig bli klar. Att hinna med att t ex skriva unit-tester för all kod känns inte riktigt görbart på den tid man har, om man ska försöka få själva webbplatsen klar. En positiv sak är att man lätt kommer på nya funktioner som man kan lägga in och det känns fullt görbart med ramverket.

Det känns som att jag levt med det här projektet länge och mycket av den tiden har gått åt till tankearbete.

För mig går väldigt mycket tid åt till att få layouten att bli någorlunda jämn och symmetrisk. Trots grid-systemet med Semantic.gs så tycker jag att det är krångligt. LESS etc. ger kanske lite mer möjligheter men känns inte som någon tidsbesparande teknik för mig.

### Kursen

På det hela taget en bra och mycket lärorik kurs. Den är mastig till sitt innehåll och inte helt triviala koncept. Det känns dock som att den innehåller väldigt relevanta saker som man bör kunna ute i verkligheten. Några av de saker som behandlas skulle nästan behöva sina egna kurser, såsom LESS, responsiv design och unit-tester. Det hade varit värt att kunna gå lite mer på djupet med dessa ämnen. Allt sammantaget känns det mastigt och som ganska dyrköpta 7,5 poäng. Å andra sidan känns det som verkligt värdefulla kunskaper jag tar med mig från kursen. MVC-konceptet är nu någorlunda klart för mig och jag kan tänka mig att ta mig an ett annat ramverk efter detta. Kursen får nog en 9:a av mig i betyg.

