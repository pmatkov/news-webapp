PWA - projektni zadatak

Instalacija
------------
- sadrzaj weba nalazi se u mapi 'www'. Navedenu mapu je potrebno staviti u mapu 'xamp/htdocs'. Naslovnica se u tom slucaju otvara upisom adrese http://localhost/www
- instalacijska skripta za bazu se nalazi u datoteci 'db/pwa_projekt.sql' (baza ima dvije dvije tablice - 'news' i 'users'). Bazu je potrebno uvesti preko web aplikacije phpMyAdmin ili kopiranjem sadrzaja skripte u prostor za unos SQL naredbi i izvrsavanjem skripte
- u konfiguracijskim postavkama za pristup bazi baza ima naziv: 'pwa_projekt', korisnicko ime je: 'root', a lozinka je '' (podatci se mogu promijeniti u datoteci 'projekt/www/includes/db_utils.php'

Informacije o projektnom zadatku i koristenje aplikacije
------------
- prema projektnom zadatku trebalo je napraviti web stranicu/ aplikaciju s vijestima (predlozak "Le monde" prikazuje naslovnicu novinskog portala i clanka)
- prema navedenom predlosku napravljen je portal znanstvenih novosti "Scientist" (tri kategorije vijesti - "Energy", "Technology" i "Space")
- na naslovnici se inicijalno prikazuje devet clanaka, tri u svakoj kategoriji
- u bazu je vec uneseno nekoliko korisnika - prijava u web aplikaciju moze se izvrsiti sa sljedecim podatcima:
	> user: tom, password: tom12345 (level: 1) - ima ovlast pristupa administrativnom dijelu stranice
	> user: steve, password: steve12345 (level: 0) - NEMA ovlast pristupa administrativnom dijelu stranice
- takodjer se moze napraviti registracija novog korisnika. U tom slucaju aplikacija standardno postavlja ovlastenje na razinu 0 koja ne daje administrativni pristup. Za administrativni pristup ovlastenje treba postaviti na razinu 1 u bazi









