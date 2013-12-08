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
