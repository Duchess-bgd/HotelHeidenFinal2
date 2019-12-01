# HotelHeidenFinal2

Naslov: Hotel Heiden
Završni rad za kurs PHP programiranja u Code Academy  

članovi tima: 
Jovana Matijević,
Gordana Radović i
Jovan Nikolić

Ovaj rad predsatvlja web sajt zamišljenog hotela, koji u sebi ima ne samo predstavljen hotel vec i aplikaciju za online odabir i rezervaciju soba i apartmana. 
U izradi kompletnog projekta korišćeni su HTML, CSS (Bootstrap), Java Script, PDO i PHP.
U fronend delu projekta kombinovani su HTML, klasičan CSS i Bootstrap, zatim JS.
Za neke delove, kao što su slike za galeriju, informacije o sobama i cene, korišćen je SQL jezik preko čijih upita su podaci povučeni iz baze i pomoću PHP-a vrćani, na taj način je omugućeno njihovo prikazivanje na klijentskoj strani.

Kada je u pitanju backend, sve je zasnovano na PHP-u, uz pomoć JS-a, a glavnu ulogu igra upravo online pregled i rezervisanje soba.
Na glavnoj strani klijent može odabrati da li sobe u vreme kada njemu odgovara, za 1,2 ili 3 osobe, a zatim ga aplikacija vodi na novu stranu sa svim sobama koje odgovaraju unetim kriterijumima.
Ovde krotisnik može odabrati opciju koja mu najviše odgovara, ali je neophodno i da bude registrovan korisnik. Naime, projekat je predvideo 3 nivoa korisnika: neregistrovan posetilac, registrovan korisnik i admin. 
Neregistrovanom korisniku omogućeno je da pregleda prezentaciju hotela i da vidi da li je smeštaj koji njemu odgovara dostupan i po kojoj ceni, ali samo registrovanom korisniku je omogućeno da i stvarno rezerviše sobu. Ovo se radi preko stranice Sign up/Log in, gde se podaci koje korisnik ukuca upisuju u bazu ukolko je u piranju registracija, ili proveravaju sa postojećim, ukoliko je upitanju vec registrovani korisnik. Posebna uloga namenjena je adminu, koji jedini ima pristup admin panelu.
Admin panel je poseban deo aplikacije koji omogučava pregled gotovo svih podataka iz baze, ali i vršenje promena u bazi preko posebnih, Izmeni i Obriši funkcionalnosti. U panelu su prikazane tabele za pregled (izmenu i brisanje) smeštaja, pregled rezervacija i svih korisnika. 



