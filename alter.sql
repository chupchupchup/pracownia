alter table protetyka.porcelana_wkladykk
add column liczba_wzornik int default 1 after wzornik;

alter table protetyka.porcelana_korona_licowana_na_metalu
add column liczba_wzornik int default 1 after wzornik;

alter table protetyka.porcelana_wkladykk
add column lyzka_indywidualna varchar(20) after poprawka;

alter table protetyka.porcelana_wkladykk
add column liczba_lyzka_indywidualna int default 1 after lyzka_indywidualna;

alter table protetyka.porcelana_wkladykk_cennik
add column lyzka_indywidualna float after wzornik;

alter table protetyka.porcelana_wkladykk_punkty
add column lyzka_indywidualna float after wzornik;

alter table protetyka.porcelana_korona_licowana_na_metalu
add column liczba_lyzka int default 1 after lyzka;

alter table protetyka.porcelana_korona_licowana_na_metalu
add column liczba_rozowe_dziaslo int default 1 after rozowe_dziaslo;

alter table protetyka.porcelana_korona_licowana_na_metalu
add column liczba_stopien_porcelanowy int default 1 after stopien_porcelanowy;

alter table protetyka.porcelana_korona_licowana_na_metalu
add column liczba_frezowane_podparcie int default 1 after frezowane_podparcie;

alter table protetyka.porcelana_korona_pelnoceramiczna
add column liczba_szklane_podparcie int default 1 after szklane_podparcie;

alter table protetyka.porcelana_korona_pelnoceramiczna
add column ponowne_napalenie_porcelany varchar(30);

alter table protetyka.porcelana_korona_pelnoceramiczna_cennik
add column ponowne_napalenie_porcelany float;

alter table protetyka.porcelana_korona_pelnoceramiczna_punkty
add column ponowne_napalenie_porcelany float;

alter table protetyka.porcelana_implanty
add column przedzial_malowanie varchar(10) after malowanie;

alter table protetyka.porcelana_implanty
add column klucz_do_implantow varchar(20);

alter table protetyka.porcelana_implanty
add column liczba_klucz_do_implantow int default 1;

alter table protetyka.porcelana_implanty
add column lacznik_hybrydowy varchar(20);

alter table protetyka.porcelana_implanty
add column liczba_lacznik_hybrydowy int default 1;

alter table protetyka.porcelana_implanty_cennik
add column klucz_do_implantow float;

alter table protetyka.porcelana_implanty_punkty
add column klucz_do_implantow float;

alter table protetyka.porcelana_implanty_cennik
add column lacznik_hybrydowy float;

alter table protetyka.porcelana_implanty_punkty
add column lacznik_hybrydowy float;

alter table protetyka.proteza_calkowita_cennik
add column `proteza na lokatorach` float;

alter table protetyka.proteza_calkowita_punkty
add column `proteza na lokatorach` float;

alter table protetyka.porcelana_korony_inne
add column liczba_waxup int default 1;

alter table protetyka.porcelana_korony_inne
add column szyna_na_prowizorium varchar(25);

alter table protetyka.proteza_szyny
add column deprogramator_koisa varchar(20);

alter table protetyka.proteza_szyny_cennik
add column deprogramator_koisa float;

alter table protetyka.proteza_szyny_punkty
add column deprogramator_koisa float;

alter table protetyka.faktury
add column data_wystawienia date;

update protetyka.faktury
set data_wystawienia=data_fv;