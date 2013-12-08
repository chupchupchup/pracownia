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
