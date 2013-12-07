<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

require_once('./inc/common.php');

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){
	
//------------------------------------------------------------------------------------------------------------------

 //plik z funkcjami do czyszczenia zmiennych z niebezpiecznego kodu !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 require_once('./inc/filtr_formularzy.inc.php');

 //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 $idzlecenianr = czysc_zmienne_formularza($_SESSION['form_tab']['idzlecenianr']);
 $idzleceniapoz = czysc_zmienne_formularza($_SESSION['form_tab']['idzleceniapoz']);
 $pacjent = czysc_zmienne_formularza($_SESSION['form_tab']['pacjent']);
 $idzewnetrzny = czysc_zmienne_formularza($_SESSION['form_tab']['idzewnetrzny']);
 $datawpisania = czysc_zmienne_formularza($_SESSION['form_tab']['datawpisania']);
 $zwrotzleceniadata = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzleceniadata']);
 $zwrotzleceniagodz = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzleceniagodz']);

 $smarty->assign('idzlecenianr', $idzlecenianr);
 $smarty->assign('idzleceniapoz', $idzleceniapoz);
 $smarty->assign('pacjent', $pacjent);
 $smarty->assign('zwrotzleceniadata', $zwrotzleceniadata);

 //czyscimy etykiete
  unset($_SESSION['etykieta_materialu']);
  unset($_SESSION['etykieta']);
  
 if (array_key_exists('extra', $_SESSION['form_tab'])) {
    $sql_main="SELECT kategoria FROM zlecenieinfo WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' AND wpis!='del'";
    $wyn_main=myquery($sql_main);
    while($arr_main = mysql_fetch_assoc($wyn_main)){
    	$kategoria = $arr_main['kategoria'];
    }
 	extra_dbstore($idzlecenianr, $idzleceniapoz, $kategoria, $_SESSION['form_tab']['extra']);
 	$smarty->assign('extra',$_SESSION['form_tab']['extra']);
 }
 


// PORCELANA WKLADY K-K
if($_SESSION['form_tab']['zakladka']=="porcelana_1"){
 //zmienne do czyszczenia
 $material = czysc_zmienne_formularza($_SESSION['form_tab']['material']);
 $rodzajwkladu = czysc_zmienne_formularza($_SESSION['form_tab']['rodzajwkladu']);
 $liczba_wkladow = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_wkladow']);
 $wzornik = czysc_zmienne_formularza($_SESSION['form_tab']['wzornik']);
 $poprawka = czysc_zmienne_formularza($_SESSION['form_tab']['poprawka']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $kategoria = "Porcelana Wk³ady K-K";

 //update zlecenia po zakonczeniu
 $sql="UPDATE porcelana_wkladykk SET material='".$material."', rodzajwkladu='".$rodzajwkladu."',
                                     liczba_wkladow='".$liczba_wkladow."', wzornik='".$wzornik."',
                                     poprawka='".$poprawka."', zeby='".$zeby."'
                                     WHERE kategoria='".$kategoria."' AND idzlecenianr='".$idzlecenianr."' AND
                                     idzleceniapoz='".$idzleceniapoz."' AND datawpisania='".$datawpisania."' ";
 myquery($sql);

//-------------tworzenie etykiety materia³ów

material_etykiety($material, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania);

//-------------------------------------------

}

//PORCELANA KORONA LICOWANA NA METALU
elseif($_SESSION['form_tab']['zakladka']=="porcelana_2"){

 //zmienne do czyszczenia
 $material = czysc_zmienne_formularza($_SESSION['form_tab']['material']);
 $rodzajkolornika = czysc_zmienne_formularza($_SESSION['form_tab']['rodzajkolornika']);
 $kolor = czysc_zmienne_formularza($_SESSION['form_tab']['kolor']);
 $lyzka = czysc_zmienne_formularza($_SESSION['form_tab']['lyzka']);
 $wzornik = czysc_zmienne_formularza($_SESSION['form_tab']['wzornik']);
 $metal = czysc_zmienne_formularza($_SESSION['form_tab']['metal']);
 $surowa = czysc_zmienne_formularza($_SESSION['form_tab']['surowa']);
// $przymiarka_kompozytu = czysc_zmienne_formularza($_SESSION['form_tab']['przymiarka_kompozytu']);
 $gotowa = czysc_zmienne_formularza($_SESSION['form_tab']['gotowa']);
   $liczba_gotowa = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_gotowa']);
 $powt_metalu = czysc_zmienne_formularza($_SESSION['form_tab']['powt_metalu']);
 $ponowne_nap_porcel = czysc_zmienne_formularza($_SESSION['form_tab']['ponowne_nap_porcel']);
   $liczba_ponowne_nap_porcel = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_ponowne_nap_porcel']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 $malowanie = czysc_zmienne_formularza($_SESSION['form_tab']['malowanie']);
 $przedzial_malowanie = czysc_zmienne_formularza($_SESSION['form_tab']['przedzial_malowanie']);
 $dobor_koloru = czysc_zmienne_formularza($_SESSION['form_tab']['dobor_koloru']);
   $frezowane_podparcie = czysc_zmienne_formularza($_SESSION['form_tab']['frezowane_podparcie']);
 $zatrzaski = czysc_zmienne_formularza($_SESSION['form_tab']['zatrzaski']);
 $liczbazatrzaskow = czysc_zmienne_formularza($_SESSION['form_tab']['liczbazatrzaskow']);
 $zasuwy = czysc_zmienne_formularza($_SESSION['form_tab']['zasuwy']);
 $liczbazasow = czysc_zmienne_formularza($_SESSION['form_tab']['liczbazasow']);

   $szklane_podparcie = czysc_zmienne_formularza($_SESSION['form_tab']['szklane_podparcie']);
   $liczba_szklane_podparcie = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_szklane_podparcie']);
   $rozowe_dziaslo = czysc_zmienne_formularza($_SESSION['form_tab']['rozowe_dziaslo']);
   $stopien_porcelanowy = czysc_zmienne_formularza($_SESSION['form_tab']['stopien_porcelanowy']);
   $poprawka = czysc_zmienne_formularza($_SESSION['form_tab']['poprawka']);

 $dentyna_kiss = czysc_zmienne_formularza($_SESSION['form_tab']['dentyna_kiss']);
 $dentyna_na_zloto = czysc_zmienne_formularza($_SESSION['form_tab']['dentyna_na_zloto']);

 //dodatkowe zmienne
 $kategoria = "Porcelana Korona Licowana Na Metalu";
 //$_SESSION['form_tab']['kategoria']="porcelana_korona_licowana";

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 //$_SESSION['zakladka'][]="porcelana_korona_licowana";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 //spr_zlecenie("porcelana_korona_licowana");

 //dodawanie zlecenia do bazy
 $sql="UPDATE porcelana_korona_licowana_na_metalu SET kategoria='".$kategoria."', idzlecenianr='".$idzlecenianr."',
                                         idzleceniapoz='".$idzleceniapoz."', datawpisania='".$datawpisania."',
                                         wpisujacy='".$idusera."',
                                         material='".$material."',
                                         rodzajkolornika='".$rodzajkolornika."',
                                         kolor='".$kolor."',
                                         lyzka='".$lyzka."',
                                         wzornik='".$wzornik."',
                                         metal='".$metal."',
                                         surowa='".$surowa."',
                                         gotowa='".$gotowa."', liczba_gotowa='".$liczba_gotowa."',
                                         powt_metalu='".$powt_metalu."',
                                         ponowne_nap_porcel='".$ponowne_nap_porcel."', liczba_ponowne_nap_porcel='".$liczba_ponowne_nap_porcel."',
                                         malowanie='".$malowanie."',
                                         przedzial_malowanie='".$przedzial_malowanie."',
                                         dobor_koloru='".$dobor_koloru."',
                                         frezowane_podparcie='".$frezowane_podparcie."',
                                         zatrzaski='".$zatrzaski."', liczbazatrzaskow='".$liczbazatrzaskow."',
                                         zasuwy='".$zasuwy."', liczbazasow='".$liczbazasow."',
                                         szklane_podparcie='".$szklane_podparcie."',
                                         liczba_szklane_podparcie='".$liczba_szklane_podparcie."',
                                         rozowe_dziaslo='".$rozowe_dziaslo."',
                                         stopien_porcelanowy='".$stopien_porcelanowy."',
                                         poprawka='".$poprawka."',
                                         dentyna_kiss='".$dentyna_kiss."',
                                         dentyna_na_zloto='".$dentyna_na_zloto."',
                                         zeby='".$zeby."'
                                     WHERE kategoria='".$kategoria."' AND idzlecenianr='".$idzlecenianr."' AND
                                     idzleceniapoz='".$idzleceniapoz."' AND datawpisania='".$datawpisania."' ";

 myquery($sql);

//-------------tworzenie etykiety materia³ów
if ($dentyna_kiss) {
	material_dentyna('dentyna_kiss', $material, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania);
}
if ($dentyna_na_zloto) {
	material_dentyna('dentyna_na_zloto', $material, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania);
}
material_etykiety($material, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania);

//-------------------------------------------
}

//PORCELANA KORONA PE£NOCERAMICZNA
elseif($_SESSION['form_tab']['zakladka']=="porcelana_3"){
 //zmienne do czyszczenia
 $material = czysc_zmienne_formularza($_SESSION['form_tab']['material']);
 $czapeczka_cerkon = czysc_zmienne_formularza($_SESSION['form_tab']['czapeczka_cerkon']);
 $szklane_podparcie = czysc_zmienne_formularza($_SESSION['form_tab']['szklane_podparcie']);
 $rodzajkolornika = czysc_zmienne_formularza($_SESSION['form_tab']['rodzajkolornika']);
 $kolor = czysc_zmienne_formularza($_SESSION['form_tab']['kolor']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 $przymiarka = czysc_zmienne_formularza($_SESSION['form_tab']['przymiarka']);
 $przymiarka_kompozytu = czysc_zmienne_formularza($_SESSION['form_tab']['przymiarka_kompozytu']);
 $gotowa = czysc_zmienne_formularza($_SESSION['form_tab']['gotowa']);
 $liczba_gotowa = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_gotowa']);
 $malowanie = czysc_zmienne_formularza($_SESSION['form_tab']['malowanie']);
 $przedzial_malowanie = czysc_zmienne_formularza($_SESSION['form_tab']['przedzial_malowanie']);
 $dobor_koloru = czysc_zmienne_formularza($_SESSION['form_tab']['dobor_koloru']);
 $poprawka = czysc_zmienne_formularza($_SESSION['form_tab']['poprawka']);

 $dentyna_na_cerkon = czysc_zmienne_formularza($_SESSION['form_tab']['dentyna_na_cerkon']);
 $dentyna_na_empress = czysc_zmienne_formularza($_SESSION['form_tab']['dentyna_na_empress']);

 //dodatkowe zmienne
// $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Porcelana Korona Pe³noceramiczna";

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
// $_SESSION['zakladka'][]="porcelana_korona_pelnoceramiczna";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
// spr_zlecenie("porcelana_korona_pelnoceramiczna");

 //dodawanie zlecenia do bazy
 $sql="UPDATE porcelana_korona_pelnoceramiczna SET kategoria='".$kategoria."', idzlecenianr='".$idzlecenianr."',
                                         idzleceniapoz='".$idzleceniapoz."', datawpisania='".$datawpisania."',
                                         wpisujacy='".$idusera."', material='".$material."', rodzajkolornika='".$rodzajkolornika."',
                                         kolor='".$kolor."', czapeczka_cerkon='".$czapeczka_cerkon."', szklane_podparcie='".$szklane_podparcie."',
                                         przymiarka='".$przymiarka."', przymiarka_kompozytu='".$przymiarka_kompozytu."',
                                         gotowa='".$gotowa."',liczba_gotowa='".$liczba_gotowa."',
                                         malowanie='".$malowanie."',przedzial_malowanie='".$przedzial_malowanie."',
                                         dobor_koloru='".$dobor_koloru."', poprawka='".$poprawka."',
                                         dentyna_na_cerkon='".$dentyna_na_cerkon."',
                                         dentyna_na_empress='".$dentyna_na_empress."',
                                         zeby='".$zeby."'
                                     WHERE kategoria='".$kategoria."' AND idzlecenianr='".$idzlecenianr."' AND
                                     idzleceniapoz='".$idzleceniapoz."' AND datawpisania='".$datawpisania."' ";

 myquery($sql);

//-------------tworzenie etykiety materia³ów
if ($dentyna_na_cerkon) {
	material_dentyna('dentyna_na_cerkon', $material, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania);
}
if ($dentyna_na_empress) {
	material_dentyna('dentyna_na_empress', $material, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania);
}
material_etykiety($material, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania);
//-------------------------------------------

}
//PORCELANA INLAY / ONLAY / LICÓWKA
elseif($_SESSION['form_tab']['zakladka']=="porcelana_4"){
 //zmienne do czyszczenia
 $rodzajkolornika = czysc_zmienne_formularza($_SESSION['form_tab']['rodzajkolornika']);
 $kolor = czysc_zmienne_formularza($_SESSION['form_tab']['kolor']);
 $licowka_kompozyt = czysc_zmienne_formularza($_SESSION['form_tab']['licowka_kompozyt']);
 $liczba_licowka_kompozyt = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_licowka_kompozyt']);
 $licowka_Empress = czysc_zmienne_formularza($_SESSION['form_tab']['licowka_Empress']);
 $liczba_licowka_Empress = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_licowka_Empress']);
 $licowka_cerkon = czysc_zmienne_formularza($_SESSION['form_tab']['licowka_cerkon']);
 $liczba_licowka_cerkon = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_licowka_cerkon']);
 $licowka_wypalana = czysc_zmienne_formularza($_SESSION['form_tab']['licowka_wypalana']);
 $liczba_licowka_wypalana = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_licowka_wypalana']);
 $licowka_Gradia = czysc_zmienne_formularza($_SESSION['form_tab']['licowka_Gradia']);
 $liczba_licowka_Gradia = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_licowka_Gradia']);
 $inlay_onlay_zloto = czysc_zmienne_formularza($_SESSION['form_tab']['inlay_onlay_zloto']);
 $liczba_inlay_onlay_zloto = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_inlay_onlay_zloto']);
 $inlay_onlay_Gradia = czysc_zmienne_formularza($_SESSION['form_tab']['inlay_onlay_Gradia']);
 $liczba_inlay_onlay_Gradia = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_inlay_onlay_Gradia']);
 $inlay_onlay_kompozyt = czysc_zmienne_formularza($_SESSION['form_tab']['inlay_onlay_kompozyt']);
 $liczba_inlay_onlay_kompozyt = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_inlay_onlay_kompozyt']);
 $inlay_onlay_Empress = czysc_zmienne_formularza($_SESSION['form_tab']['inlay_onlay_Empress']);
 $liczba_inlay_onlay_Empress = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_inlay_onlay_Empress']);
 $inlay_onlay_cerkon = czysc_zmienne_formularza($_SESSION['form_tab']['inlay_onlay_cerkon']);
 $liczba_inlay_onlay_cerkon = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_inlay_onlay_cerkon']);
 $inlay_onlay_metal = czysc_zmienne_formularza($_SESSION['form_tab']['inlay_onlay_metal']);
 $liczba_inlay_onlay_metal = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_inlay_onlay_metal']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 $malowanie = czysc_zmienne_formularza($_SESSION['form_tab']['malowanie']);
 $dobor_koloru = czysc_zmienne_formularza($_SESSION['form_tab']['dobor_koloru']);
 $poprawka = czysc_zmienne_formularza($_SESSION['form_tab']['poprawka']);

 //dodatkowe zmienne
// $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Porcelana Inlay/Onlay/Licówka";

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
// $_SESSION['zakladka'][]="porcelana_inlay_onlay_licowka";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
// spr_zlecenie("porcelana_inlay_onlay_licowka");

 //dodawanie zlecenia do bazy
 $sql="UPDATE porcelana_inlay_onlay_licowka SET kategoria='".$kategoria."', idzlecenianr='".$idzlecenianr."',
                                         idzleceniapoz='".$idzleceniapoz."', datawpisania='".$datawpisania."',
                                         wpisujacy='".$idusera."', licowka_kompozyt='".$licowka_kompozyt."',
										 liczba_licowka_kompozyt ='".$liczba_licowka_kompozyt."', licowka_Empress='".$licowka_Empress."',
										 liczba_licowka_Empress ='".$liczba_licowka_Empress."', licowka_cerkon='".$licowka_cerkon."',
										 liczba_licowka_cerkon ='".$liczba_licowka_cerkon."', licowka_wypalana='".$licowka_wypalana."',
										 liczba_licowka_wypalana ='".$liczba_licowka_wypalana."', licowka_Gradia='".$licowka_Gradia."',
										 liczba_licowka_Gradia ='".$liczba_licowka_Gradia."', inlay_onlay_zloto='".$inlay_onlay_zloto."',
										 liczba_inlay_onlay_zloto ='".$liczba_inlay_onlay_zloto."', inlay_onlay_Gradia='".$inlay_onlay_Gradia."',
										 liczba_inlay_onlay_Gradia ='".$liczba_inlay_onlay_Gradia."', inlay_onlay_kompozyt='".$inlay_onlay_kompozyt."',
										 liczba_inlay_onlay_kompozyt ='".$liczba_inlay_onlay_kompozyt."', inlay_onlay_Empress='".$inlay_onlay_Empress."',
										 liczba_inlay_onlay_Empress ='".$liczba_inlay_onlay_Empress."', inlay_onlay_cerkon='".$inlay_onlay_cerkon."',
										 liczba_inlay_onlay_cerkon ='".$liczba_inlay_onlay_cerkon."', inlay_onlay_metal='".$inlay_onlay_metal."',
										 liczba_inlay_onlay_metal ='".$liczba_inlay_onlay_metal."',
                                         rodzajkolornika='".$rodzajkolornika."', kolor='".$kolor."',
                                         malowanie='".$malowanie."', dobor_koloru='".$dobor_koloru."',
                                         poprawka='".$poprawka."', zeby='".$zeby."'
                                     WHERE kategoria='".$kategoria."' AND idzlecenianr='".$idzlecenianr."' AND
                                     idzleceniapoz='".$idzleceniapoz."' AND datawpisania='".$datawpisania."' ";
 myquery($sql);

//-------------tworzenie etykiety materia³ów

material_etykiety($material, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania);
 
//-------------------------------------------

}
//PORCELANA IMPLANTY
elseif($_SESSION['form_tab']['zakladka']=="porcelana_5"){
 //zmienne do czyszczenia
 $material = czysc_zmienne_formularza($_SESSION['form_tab']['material']);
 $rodzajkolornika = czysc_zmienne_formularza($_SESSION['form_tab']['rodzajkolornika']);
 $kolor = czysc_zmienne_formularza($_SESSION['form_tab']['kolor']);
 $korona_implant = czysc_zmienne_formularza($_SESSION['form_tab']['korona_implant']);
 $liczba_korona_implant = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_korona_implant']);
 $przeslo = czysc_zmienne_formularza($_SESSION['form_tab']['przeslo']);
 $liczba_przeslo = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_przeslo']);
 $lyzka = czysc_zmienne_formularza($_SESSION['form_tab']['lyzka']);
 $wzornik = czysc_zmienne_formularza($_SESSION['form_tab']['wzornik']);
 $przymiarka = czysc_zmienne_formularza($_SESSION['form_tab']['przymiarka']);
 $surowa = czysc_zmienne_formularza($_SESSION['form_tab']['surowa']);
 $gotowa = czysc_zmienne_formularza($_SESSION['form_tab']['gotowa']);
 $malowanie = czysc_zmienne_formularza($_SESSION['form_tab']['malowanie']);
 $dobor_koloru = czysc_zmienne_formularza($_SESSION['form_tab']['dobor_koloru']);
 $poprawka = czysc_zmienne_formularza($_SESSION['form_tab']['poprawka']);
 $elementy = czysc_zmienne_formularza($_SESSION['form_tab']['elementy']);
 $zakupione_cena = czysc_zmienne_formularza($_SESSION['form_tab']['zakupione_cena']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 $dentyna_na_cerkon = czysc_zmienne_formularza($_SESSION['form_tab']['dentyna_na_cerkon']);
 $dentyna_na_metal = czysc_zmienne_formularza($_SESSION['form_tab']['dentyna_na_metal']);

 //dodatkowe zmienne
// $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Porcelana Implanty";

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
// $_SESSION['zakladka'][]="porcelana_implanty";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
// spr_zlecenie("porcelana_implanty");

 //dodawanie zlecenia do bazy
 $sql="UPDATE porcelana_implanty SET kategoria='".$kategoria."', idzlecenianr='".$idzlecenianr."',
                                         idzleceniapoz='".$idzleceniapoz."', datawpisania='".$datawpisania."',
                                         wpisujacy='".$idusera."', material='".$material."',
                                         rodzajkolornika='".$rodzajkolornika."', kolor='".$kolor."',
                                         korona_implant='".$korona_implant."', liczba_korona_implant='".$liczba_korona_implant."',
                                         przeslo='".$przeslo."',liczba_przeslo='".$liczba_przeslo."',
                                         lyzka='".$lyzka."',wzornik='".$wzornik."',przymiarka='".$przymiarka."',
                                         surowa='".$surowa."', gotowa='".$gotowa."',
                                         elementy='".$elementy."', zakupione_cena='".$zakupione_cena."',
                                         malowanie='".$malowanie."', dobor_koloru='".$dobor_koloru."',
                                         poprawka='".$poprawka."',
                                         dentyna_na_cerkon='".$dentyna_na_cerkon."',
                                         dentyna_na_metal='".$dentyna_na_metal."',
                                         zeby='".$zeby."'
                                     WHERE kategoria='".$kategoria."' AND idzlecenianr='".$idzlecenianr."' AND
                                     idzleceniapoz='".$idzleceniapoz."' AND datawpisania='".$datawpisania."' ";

 myquery($sql);

//-------------tworzenie etykiety materia³ów
if ($dentyna_na_cerkon) {
	material_dentyna('dentyna_na_cerkon', $material, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania);
}
if ($dentyna_na_metal) {
	material_dentyna('dentyna_kiss', $material, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania);
}
material_etykiety($material, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania);

//-------------------------------------------

}
//PORCELANA KORONY INNE
elseif($_SESSION['form_tab']['zakladka']=="porcelana_7"){
 //zmienne do czyszczenia
 $lana = czysc_zmienne_formularza($_SESSION['form_tab']['lana']);
 $rodzaj = czysc_zmienne_formularza($_SESSION['form_tab']['rodzaj']);
 $korona_akryl = czysc_zmienne_formularza($_SESSION['form_tab']['korona_akryl']);
 $liczba_korona_akryl = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_korona_akryl']);
 $korona_kompozyt = czysc_zmienne_formularza($_SESSION['form_tab']['korona_kompozyt']);
 $liczba_korona_kompozyt = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_korona_kompozyt']);
 $wlokno_szklane = czysc_zmienne_formularza($_SESSION['form_tab']['wlokno_szklane']);
 $liczba_wlokno_szklane = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_wlokno_szklane']);
 $maryland = czysc_zmienne_formularza($_SESSION['form_tab']['maryland']);
 $poprawka = czysc_zmienne_formularza($_SESSION['form_tab']['poprawka']);
 $rodzajkolornika = czysc_zmienne_formularza($_SESSION['form_tab']['rodzajkolornika']);
 $kolor = czysc_zmienne_formularza($_SESSION['form_tab']['kolor']);
 $teleskop = czysc_zmienne_formularza($_SESSION['form_tab']['teleskop']);
 $liczba_teleskop = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_teleskop']);
 $akryl_skan = czysc_zmienne_formularza($_SESSION['form_tab']['akryl_skan']);
 $liczba_akryl_skan = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_akryl_skan']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
// $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Porcelana Korony Inne";

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
// $_SESSION['zakladka'][]="porcelana_korony_inne";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
// spr_zlecenie("porcelana_korony_inne");

 //dodawanie zlecenia do bazy
 $sql="UPDATE porcelana_korony_inne SET kategoria='".$kategoria."', idzlecenianr='".$idzlecenianr."',
                                         idzleceniapoz='".$idzleceniapoz."', datawpisania='".$datawpisania."',
                                         wpisujacy='".$idusera."', lana='".$lana."',
                                         korona_akryl='".$korona_akryl."', liczba_korona_akryl='".$liczba_korona_akryl."',
                                         korona_kompozyt='".$korona_kompozyt."', liczba_korona_kompozyt='".$liczba_korona_kompozyt."',
                                         wlokno_szklane='".$wlokno_szklane."', liczba_wlokno_szklane='".$liczba_wlokno_szklane."',
                                         maryland='".$maryland."',poprawka='".$poprawka."',
                                         rodzajkolornika='".$rodzajkolornika."',kolor='".$kolor."',
                                         teleskop='".$teleskop."',liczba_teleskop='".$liczba_teleskop."',
                                         zeby='".$zeby."', rodzaj='".$rodzaj."',
                                         akryl_skan='".$akryl_skan."', liczba_akryl_skan='".$liczba_akryl_skan."'
                                     WHERE kategoria='".$kategoria."' AND idzlecenianr='".$idzlecenianr."' AND
                                     idzleceniapoz='".$idzleceniapoz."' AND datawpisania='".$datawpisania."' ";
 myquery($sql);

//-------------tworzenie etykiety materia³ów

$_SESSION['etykieta_materialu']='';

//-------------------------------------------

}
//PROTEZA SZKIELET SZYNOPROTEZA
elseif($_SESSION['form_tab']['zakladka']=="proteza_1"){
 //zmienne do czyszczenia
 $material = czysc_zmienne_formularza($_SESSION['form_tab']['material']);
 $proteza = czysc_zmienne_formularza($_SESSION['form_tab']['proteza']);
 $liczba_proteza = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_proteza']);
 $wzornik = czysc_zmienne_formularza($_SESSION['form_tab']['wzornik']);
 $lyzka = czysc_zmienne_formularza($_SESSION['form_tab']['lyzka']);
 $rodzajkolornika = czysc_zmienne_formularza($_SESSION['form_tab']['rodzajkolornika']);
 $kolor = czysc_zmienne_formularza($_SESSION['form_tab']['kolor']);
 $klamralana = czysc_zmienne_formularza($_SESSION['form_tab']['klamralana']);
 $klamradoginana = czysc_zmienne_formularza($_SESSION['form_tab']['klamradoginana']);
 $ciern = czysc_zmienne_formularza($_SESSION['form_tab']['ciern']);
 $pelota = czysc_zmienne_formularza($_SESSION['form_tab']['pelota']);
 $metal = czysc_zmienne_formularza($_SESSION['form_tab']['metal']);
 $akryl = czysc_zmienne_formularza($_SESSION['form_tab']['akryl']);
 $przymiarka = czysc_zmienne_formularza($_SESSION['form_tab']['przymiarka']);
 $gotowa = czysc_zmienne_formularza($_SESSION['form_tab']['gotowa']);
 $liczba_gotowa = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_gotowa']);
 $poprawka = czysc_zmienne_formularza($_SESSION['form_tab']['poprawka']);
 $ponowne_ust_zebow = czysc_zmienne_formularza($_SESSION['form_tab']['ponowne_ust_zebow']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 $belka = czysc_zmienne_formularza($_SESSION['form_tab']['belka']);
 $zeby_ivoclar = czysc_zmienne_formularza($_SESSION['form_tab']['zeby_ivoclar']);
 $liczba_zeby_ivoclar = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_zeby_ivoclar']);
 $futura_press = czysc_zmienne_formularza($_SESSION['form_tab']['futura_press']);
 $triplex_cold = czysc_zmienne_formularza($_SESSION['form_tab']['triplex_cold']);
 $probase_cold = czysc_zmienne_formularza($_SESSION['form_tab']['probase_cold']);
 $plynproszek = czysc_zmienne_formularza($_SESSION['form_tab']['plynproszek']);
 
 
 //dodatkowe zmienne
 $kategoria = "Proteza Szkielet Szynoproteza";

 //dodawanie zlecenia do bazy

 $sql="UPDATE proteza_szkielet_szynoproteza SET kategoria='".$kategoria."', idzlecenianr='".$idzlecenianr."',
                                         idzleceniapoz='".$idzleceniapoz."', datawpisania='".$datawpisania."',
                                         wpisujacy='".$idusera."', proteza='".$proteza."',
                                         liczba_proteza='".$liczba_proteza."', wzornik='".$wzornik."',
                                         lyzka='".$lyzka."',rodzajkolornika='".$rodzajkolornika."',
                                         kolor='".$kolor."',klamra_lana='".$klamralana."',klamra_doginana='".$klamradoginana."',
                                         ciern='".$ciern."', pelota='".$pelota."', metal='".$metal."', akryl='".$akryl."',
                                         przymiarka='".$przymiarka."', gotowa='".$gotowa."',
                                         liczba_gotowa='".$liczba_gotowa."', poprawka='".$poprawka."',
                                         ponowne_ust_zebow='".$ponowne_ust_zebow."', belka='".$belka."',
                                         zeby_ivoclar='".$zeby_ivoclar."', liczba_zeby_ivoclar='".$liczba_zeby_ivoclar."',
                                         zeby='".$zeby."',futura_press='".$futura_press."',triplex_cold='".$triplex_cold."',
                                         probase_cold='".$probase_cold."', plynproszek='".$plynproszek."',
                                         material='".$material."'
                                     WHERE kategoria='".$kategoria."' AND idzlecenianr='".$idzlecenianr."' AND
                                     idzleceniapoz='".$idzleceniapoz."' AND datawpisania='".$datawpisania."' ";

 myquery($sql);

//-------------tworzenie etykiety materia³ów

material_etykiety($plynproszek, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania);
material_etykiety($material, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania);

//-------------------------------------------

}
//PROTEZA CA£KOWITA
elseif($_SESSION['form_tab']['zakladka']=="proteza_2"){
 //zmienne do czyszczenia
 $proteza = czysc_zmienne_formularza($_SESSION['form_tab']['proteza']);
 $liczba_proteza = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_proteza']);
 $lyzka = czysc_zmienne_formularza($_SESSION['form_tab']['lyzka']);
 $wzornik = czysc_zmienne_formularza($_SESSION['form_tab']['wzornik']);
 $etap = czysc_zmienne_formularza($_SESSION['form_tab']['etap']);
 $rodzajkolornika = czysc_zmienne_formularza($_SESSION['form_tab']['rodzajkolornika']);
 $kolor = czysc_zmienne_formularza($_SESSION['form_tab']['kolor']);
 $wzmocnienie = czysc_zmienne_formularza($_SESSION['form_tab']['wzmocnienie']);
 $naklady = czysc_zmienne_formularza($_SESSION['form_tab']['naklady']);
 $liczba_naklady = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_naklady']);
 $ponowne_ust_zebow = czysc_zmienne_formularza($_SESSION['form_tab']['ponowne_ust_zebow']);
 $miekkie_podniebienie = czysc_zmienne_formularza($_SESSION['form_tab']['miekkie_podniebienie']);
 $bezbarwne_podniebienie = czysc_zmienne_formularza($_SESSION['form_tab']['bezbarwne_podniebienie']);
 $poprawka = czysc_zmienne_formularza($_SESSION['form_tab']['poprawka']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 $belka = czysc_zmienne_formularza($_SESSION['form_tab']['belka']);
 $zeby_ivoclar = czysc_zmienne_formularza($_SESSION['form_tab']['zeby_ivoclar']);
 $liczba_zeby_ivoclar = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_zeby_ivoclar']);
 $futura_gen = czysc_zmienne_formularza($_SESSION['form_tab']['futura_gen']);
 $triplex_hot = czysc_zmienne_formularza($_SESSION['form_tab']['triplex_hot']);
 $probase_hot = czysc_zmienne_formularza($_SESSION['form_tab']['probase_hot']);
 $plynproszek = czysc_zmienne_formularza($_SESSION['form_tab']['plynproszek']);
 
 //dodatkowe zmienne
 $kategoria = "Proteza Ca³kowita";

 //dodawanie zlecenia do bazy
 $sql="UPDATE proteza_calkowita SET kategoria='".$kategoria."', idzlecenianr='".$idzlecenianr."',
                                         idzleceniapoz='".$idzleceniapoz."', datawpisania='".$datawpisania."',
                                         wpisujacy='".$idusera."', proteza='".$proteza."',
                                         liczba_proteza='".$liczba_proteza."', wzornik='".$wzornik."',
                                         lyzka='".$lyzka."',etap='".$etap."',rodzajkolornika='".$rodzajkolornika."',
                                         kolor='".$kolor."',wzmocnienie='".$wzmocnienie."',naklady='".$naklady."',
                                         liczba_naklady='".$liczba_naklady."', ponowne_ust_zebow='".$ponowne_ust_zebow."',
                                         miekkie_podniebienie='".$miekkie_podniebienie."',bezbarwne_podniebienie='".$bezbarwne_podniebienie."',
                                         poprawka='".$poprawka."', zeby_ivoclar='".$zeby_ivoclar."',
                                         liczba_zeby_ivoclar='".$liczba_zeby_ivoclar."', belka='".$belka."',
                                         zeby='".$zeby."',futura_gen='".$futura_gen."',triplex_hot='".$triplex_hot."',
                                         probase_hot='".$probase_hot."', plynproszek='".$plynproszek."'
                                     WHERE kategoria='".$kategoria."' AND idzlecenianr='".$idzlecenianr."' AND
                                     idzleceniapoz='".$idzleceniapoz."' AND datawpisania='".$datawpisania."' ";
 myquery($sql);

//-------------tworzenie etykiety materia³ów

material_etykiety($plynproszek, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania);
 
//-------------------------------------------

}
//PROTEZA CZÊ¦CIOWA
elseif($_SESSION['form_tab']['zakladka']=="proteza_3"){
 //zmienne do czyszczenia
 $proteza = czysc_zmienne_formularza($_SESSION['form_tab']['proteza']);
 $liczba_proteza = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_proteza']);
 $lyzka = czysc_zmienne_formularza($_SESSION['form_tab']['lyzka']);
 $wzornik = czysc_zmienne_formularza($_SESSION['form_tab']['wzornik']);
 $etap = czysc_zmienne_formularza($_SESSION['form_tab']['etap']);
 $rodzajkolornika = czysc_zmienne_formularza($_SESSION['form_tab']['rodzajkolornika']);
 $kolor = czysc_zmienne_formularza($_SESSION['form_tab']['kolor']);
 $klamralana = czysc_zmienne_formularza($_SESSION['form_tab']['klamralana']);
 $ciern = czysc_zmienne_formularza($_SESSION['form_tab']['ciern']);
 $wzmocnienie = czysc_zmienne_formularza($_SESSION['form_tab']['wzmocnienie']);
 $miekkie_podniebienie = czysc_zmienne_formularza($_SESSION['form_tab']['miekkie_podniebienie']);
 $ponowne_ust_zebow = czysc_zmienne_formularza($_SESSION['form_tab']['ponowne_ust_zebow']);
 $poprawka = czysc_zmienne_formularza($_SESSION['form_tab']['poprawka']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 $belka = czysc_zmienne_formularza($_SESSION['form_tab']['belka']);
 $zeby_ivoclar = czysc_zmienne_formularza($_SESSION['form_tab']['zeby_ivoclar']);
 $liczba_zeby_ivoclar = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_zeby_ivoclar']);
 $futura_gen = czysc_zmienne_formularza($_SESSION['form_tab']['futura_gen']);
 $triplex_hot = czysc_zmienne_formularza($_SESSION['form_tab']['triplex_hot']);
 $probase_hot = czysc_zmienne_formularza($_SESSION['form_tab']['probase_hot']);
 $plynproszek = czysc_zmienne_formularza($_SESSION['form_tab']['plynproszek']);
 
 //dodatkowe zmienne
 $kategoria = "Proteza Czê¶ciowa";

 //dodawanie zlecenia do bazy
 $sql="UPDATE proteza_czesciowa SET kategoria='".$kategoria."', idzlecenianr='".$idzlecenianr."',
                                         idzleceniapoz='".$idzleceniapoz."', datawpisania='".$datawpisania."',
                                         wpisujacy='".$idusera."', proteza='".$proteza."',
                                         liczba_proteza='".$liczba_proteza."', wzornik='".$wzornik."',
                                         lyzka='".$lyzka."',etap='".$etap."',rodzajkolornika='".$rodzajkolornika."',
                                         kolor='".$kolor."',wzmocnienie='".$wzmocnienie."',klamra_lana='".$klamralana."',
                                         ciern='".$ciern."', ponowne_ust_zebow='".$ponowne_ust_zebow."',
                                         miekkie_podniebienie='".$miekkie_podniebienie."',
                                         poprawka='".$poprawka."', zeby_ivoclar='".$zeby_ivoclar."',
                                         liczba_zeby_ivoclar='".$liczba_zeby_ivoclar."', belka='".$belka."',
                                         zeby='".$zeby."',futura_gen='".$futura_gen."',triplex_hot='".$triplex_hot."',
                                         probase_hot='".$probase_hot."', plynproszek='".$plynproszek."'
                                     WHERE kategoria='".$kategoria."' AND idzlecenianr='".$idzlecenianr."' AND
                                     idzleceniapoz='".$idzleceniapoz."' AND datawpisania='".$datawpisania."' ";
 myquery($sql);

//-------------tworzenie etykiety materia³ów

material_etykiety($plynproszek, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania);
 
//-------------------------------------------

}
//PROTEZA SZYNY
elseif($_SESSION['form_tab']['zakladka']=="proteza_4"){
 //zmienne do czyszczenia
 $wybielajaca = czysc_zmienne_formularza($_SESSION['form_tab']['wybielajaca']);
 $liczbawybielajacych = czysc_zmienne_formularza($_SESSION['form_tab']['liczbawybielajacych']);
 $relaksacyjnatm = czysc_zmienne_formularza($_SESSION['form_tab']['relaksacyjnatm']);
 $liczbarelaksacyjnatm = czysc_zmienne_formularza($_SESSION['form_tab']['liczbarelaksacyjnatm']);
 $relaksacyjnatn = czysc_zmienne_formularza($_SESSION['form_tab']['relaksacyjnatn']);
 $liczbarelaksacyjnatn = czysc_zmienne_formularza($_SESSION['form_tab']['liczbarelaksacyjnatn']);
 $relaksacyjnam = czysc_zmienne_formularza($_SESSION['form_tab']['relaksacyjnam']);
 $liczbarelaksacyjnam = czysc_zmienne_formularza($_SESSION['form_tab']['liczbarelaksacyjnam']);
 $relaksacyjnampk = czysc_zmienne_formularza($_SESSION['form_tab']['relaksacyjnampk']);
 $liczbarelaksacyjnampk = czysc_zmienne_formularza($_SESSION['form_tab']['liczbarelaksacyjnampk']);
 $ochronna = czysc_zmienne_formularza($_SESSION['form_tab']['ochronna']);
 $liczbaochronna = czysc_zmienne_formularza($_SESSION['form_tab']['liczbaochronna']);
 $pozycjonowanie = czysc_zmienne_formularza($_SESSION['form_tab']['pozycjonowanie']);
 $liczbapozycjonowanie = czysc_zmienne_formularza($_SESSION['form_tab']['liczbapozycjonowanie']);
 $nagryzowa_w_artykulatorze = czysc_zmienne_formularza($_SESSION['form_tab']['nagryzowa_w_artykulatorze']);
 $liczbanagryzowa_w_artykulatorze = czysc_zmienne_formularza($_SESSION['form_tab']['liczbanagryzowa_w_artykulatorze']);
 $nti = czysc_zmienne_formularza($_SESSION['form_tab']['nti']);
 $liczbanti = czysc_zmienne_formularza($_SESSION['form_tab']['liczbanti']);
 $aparat_ortodontyczny = czysc_zmienne_formularza($_SESSION['form_tab']['aparat_ortodontyczny']);
 $liczbaaparat_ortodontyczny = czysc_zmienne_formularza($_SESSION['form_tab']['liczbaaparat_ortodontyczny']);
 $szyna_korony_tymczasowe = czysc_zmienne_formularza($_SESSION['form_tab']['szyna_korony_tymczasowe']);
 $liczbaszyna_korony_tymczasowe = czysc_zmienne_formularza($_SESSION['form_tab']['liczbaszyna_korony_tymczasowe']);
 $szyna_zabiegi_implantologiczne = czysc_zmienne_formularza($_SESSION['form_tab']['szyna_zabiegi_implantologiczne']);
 $liczbaszyna_zabiegi_implantologiczne = czysc_zmienne_formularza($_SESSION['form_tab']['liczbaszyna_zabiegi_implantologiczne']);
 $plyta_podjezykowa = czysc_zmienne_formularza($_SESSION['form_tab']['plyta_podjezykowa']);
 $liczbaplyta_podjezykowa = czysc_zmienne_formularza($_SESSION['form_tab']['liczbaplyta_podjezykowa']);
 $aparat_przeciw_chrapaniu = czysc_zmienne_formularza($_SESSION['form_tab']['aparat_przeciw_chrapaniu']);
 $liczbaaparat_przeciw_chrapaniu = czysc_zmienne_formularza($_SESSION['form_tab']['liczbaaparat_przeciw_chrapaniu']);
 $inne = czysc_zmienne_formularza($_SESSION['form_tab']['inne']);
 $liczbainne = czysc_zmienne_formularza($_SESSION['form_tab']['liczbainne']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $kategoria = "Proteza Szyny";

 //dodawanie zlecenia do bazy
 $sql="UPDATE proteza_szyny SET kategoria='".$kategoria."', idzlecenianr='".$idzlecenianr."',
                                         idzleceniapoz='".$idzleceniapoz."', datawpisania='".$datawpisania."',
                                         wpisujacy='".$idusera."',
                                         wybielajaca='".$wybielajaca."',
                                         liczbawybielajacych='".$liczbawybielajacych."', relaksacyjnatm='".$relaksacyjnatm."',
                                         liczbarelaksacyjnatm='".$liczbarelaksacyjnatm."',relaksacyjnatn='".$relaksacyjnatn."',
                                         liczbarelaksacyjnatn='".$liczbarelaksacyjnatn."',relaksacyjnam='".$relaksacyjnam."',
                                         liczbarelaksacyjnam='".$liczbarelaksacyjnam."',relaksacyjnampk='".$relaksacyjnampk."',
                                         liczbarelaksacyjnampk='".$liczbarelaksacyjnampk."', ochronna='".$ochronna."',
                                         liczbaochronna='".$liczbaochronna."',pozycjonowanie='".$pozycjonowanie."',
                                         liczbapozycjonowanie='".$liczbapozycjonowanie."',nagryzowa_w_artykulatorze='".$nagryzowa_w_artykulatorze."',
                                         liczbanagryzowa_w_artykulatorze='".$liczbanagryzowa_w_artykulatorze."', nti='".$nti."',
                                         liczbanti='".$liczbanti."', aparat_ortodontyczny='".$aparat_ortodontyczny."',
                                         liczbaaparat_ortodontyczny='".$liczbaaparat_ortodontyczny."', szyna_korony_tymczasowe='".$szyna_korony_tymczasowe."',
                                         liczbaszyna_korony_tymczasowe='".$liczbaszyna_korony_tymczasowe."', szyna_zabiegi_implantologiczne='".$szyna_zabiegi_implantologiczne."',
                                         liczbaszyna_zabiegi_implantologiczne='".$liczbaszyna_zabiegi_implantologiczne."', plyta_podjezykowa='".$plyta_podjezykowa."',
                                         liczbaplyta_podjezykowa='".$liczbaplyta_podjezykowa."', aparat_przeciw_chrapaniu='".$aparat_przeciw_chrapaniu."',
                                         liczbaaparat_przeciw_chrapaniu='".$liczbaaparat_przeciw_chrapaniu."', inne='".$inne."',
                                         liczbainne='".$liczbainne."'
                                     WHERE kategoria='".$kategoria."' AND idzlecenianr='".$idzlecenianr."' AND
                                     idzleceniapoz='".$idzleceniapoz."' AND datawpisania='".$datawpisania."' ";


 myquery($sql);

//-------------tworzenie etykiety materia³ów

$_SESSION['etykieta_materialu']='';

//-------------------------------------------
}
//PROTEZA NAPRAWA
elseif($_SESSION['form_tab']['zakladka']=="proteza_5"){
 //zmienne do czyszczenia
 $sklejenie = czysc_zmienne_formularza($_SESSION['form_tab']['sklejenie']);
 $naprawa_z_siatka = czysc_zmienne_formularza($_SESSION['form_tab']['naprawa_z_siatka']);
 $dostawienie_zeba = czysc_zmienne_formularza($_SESSION['form_tab']['dostawienie_zeba']);
 $dostawienie_zeba_ilosc = czysc_zmienne_formularza($_SESSION['form_tab']['dostawienie_zeba_ilosc']);
 $dostawienie_klamry = czysc_zmienne_formularza($_SESSION['form_tab']['dostawienie_klamry']);
 $dostawienie_klamry_ilosc = czysc_zmienne_formularza($_SESSION['form_tab']['dostawienie_klamry_ilosc']);
 $element_lany = czysc_zmienne_formularza($_SESSION['form_tab']['element_lany']);
 $element_lany_ilosc = czysc_zmienne_formularza($_SESSION['form_tab']['element_lany_ilosc']);
 $podsypanie_zebow = czysc_zmienne_formularza($_SESSION['form_tab']['podsypanie_zebow']);
 $lutowanie = czysc_zmienne_formularza($_SESSION['form_tab']['lutowanie']);
 $wymiana_akrylu = czysc_zmienne_formularza($_SESSION['form_tab']['wymiana_akrylu']);
 $podscielenie = czysc_zmienne_formularza($_SESSION['form_tab']['podscielenie']);
 $matryca = czysc_zmienne_formularza($_SESSION['form_tab']['matryca']);
 $miekkie_podscielenie = czysc_zmienne_formularza($_SESSION['form_tab']['miekkie_podscielenie']);
 $lutowanie_wymiana_akrylu = czysc_zmienne_formularza($_SESSION['form_tab']['lutowanie_wymiana_akrylu']);
 $lutowanie_szkieletu = czysc_zmienne_formularza($_SESSION['form_tab']['lutowanie_szkieletu']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $kategoria = "Proteza Naprawa";

 //dodawanie zlecenia do bazy
 $sql="UPDATE proteza_naprawa SET kategoria='".$kategoria."', idzlecenianr='".$idzlecenianr."',
                                         idzleceniapoz='".$idzleceniapoz."', datawpisania='".$datawpisania."',
                                         wpisujacy='".$idusera."', naprawa_z_siatka='".$naprawa_z_siatka."',
                                         dostawienie_zeba_ilosc='".$dostawienie_zeba_ilosc."', dostawienie_klamry='".$dostawienie_klamry."',
                                         dostawienie_klamry_ilosc='".$dostawienie_klamry_ilosc."',element_lany='".$element_lany."',
                                         element_lany_ilosc='".$element_lany_ilosc."',podsypanie_zebow='".$podsypanie_zebow."',
                                         lutowanie='".$lutowanie."',wymiana_akrylu='".$wymiana_akrylu."',
                                         podscielenie='".$podscielenie."', matryca='".$matryca."',
                                         miekkie_podscielenie='".$miekkie_podscielenie."',sklejenie='".$sklejenie."',
                                         lutowanie_wymiana_akrylu='".$lutowanie_wymiana_akrylu."',
                                         lutowanie_szkieletu='".$lutowanie_szkieletu."'
                                     WHERE kategoria='".$kategoria."' AND idzlecenianr='".$idzlecenianr."' AND
                                     idzleceniapoz='".$idzleceniapoz."' AND datawpisania='".$datawpisania."' ";
 myquery($sql);

//-------------tworzenie etykiety materia³ów

$_SESSION['etykieta_materialu']='';

//-------------------------------------------
}

//PROTEZA PRACE POMOCNICZE
elseif($_SESSION['form_tab']['zakladka']=="proteza_6"){
 //zmienne do czyszczenia
 $model_diag_orient = czysc_zmienne_formularza($_SESSION['form_tab']['model_diag_orient']);
 $liczba_model_diag_orient = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_model_diag_orient']);
 $dodatkowy_wzornik = czysc_zmienne_formularza($_SESSION['form_tab']['dodatkowy_wzornik']);
 $liczba_dodatkowy_wzornik = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_dodatkowy_wzornik']);
 $wax_up = czysc_zmienne_formularza($_SESSION['form_tab']['wax_up']);
 $liczba_wax_up = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_wax_up']);
 $model_dzielony_dodatkowy = czysc_zmienne_formularza($_SESSION['form_tab']['model_dzielony_dodatkowy']);
 $liczba_model_dzielony_dodatkowy = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_model_dzielony_dodatkowy']);
 $lyzka_indywidualna = czysc_zmienne_formularza($_SESSION['form_tab']['lyzka_indywidualna']);
 $liczba_lyzka_indywidualna = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_lyzka_indywidualna']);
 $wypozyczenie_luku_twarzowego = czysc_zmienne_formularza($_SESSION['form_tab']['wypozyczenie_luku_twarzowego']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $kategoria = "Proteza Prace Pomocnicze";

 //dodawanie zlecenia do bazy
 $sql="UPDATE proteza_prace_pomocnicze SET kategoria='".$kategoria."', idzlecenianr='".$idzlecenianr."',
                                         idzleceniapoz='".$idzleceniapoz."', datawpisania='".$datawpisania."',
                                         wpisujacy='".$idusera."', model_diag_orient='".$model_diag_orient."',
                                         liczba_model_diag_orient='".$liczba_model_diag_orient."',
                                         dodatkowy_wzornik='".$dodatkowy_wzornik."',
                                         liczba_dodatkowy_wzornik='".$liczba_dodatkowy_wzornik."',
                                         wax_up='".$wax_up."', liczba_wax_up='".$liczba_wax_up."',
                                         model_dzielony_dodatkowy='".$model_dzielony_dodatkowy."',
                                         liczba_model_dzielony_dodatkowy='".$liczba_model_dzielony_dodatkowy."',
                                         lyzka_indywidualna='".$lyzka_indywidualna."',
                                         liczba_lyzka_indywidualna='".$liczba_lyzka_indywidualna."',
                                         wypozyczenie_luku_twarzowego='".$wypozyczenie_luku_twarzowego."'
                                     WHERE kategoria='".$kategoria."' AND idzlecenianr='".$idzlecenianr."' AND
                                     idzleceniapoz='".$idzleceniapoz."' AND datawpisania='".$datawpisania."' ";
	
 myquery($sql);

//-------------tworzenie etykiety materia³ów

$_SESSION['etykieta_materialu']='';

//-------------------------------------------
}


//------------------------------------------------------------------------------------------------------------------
include('./inc/oblicz_punkty.inc.php');

$punkty = new PunktyCount;

//------------------------------------------------------------------------------------------------------------------
//OBLICZANIE PUNKTÓW

//  $s="SELECT * FROM rozlicz_technicy WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' AND technik='".$_SESSION['idusera']."' ";
//  $w=myquery($s);
//  $a = mysql_fetch_assoc($w);

//??? echo 'idzlecenianr: '.$idzlecenianr.', idzleceniapoz: '.$idzleceniapoz.'<br>';
    $sql_main="SELECT * FROM zlecenieinfo WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' AND wpis!='del' ";
    $wyn_main=myquery($sql_main);
//??? echo  'liczba etapów: '.mysql_numrows($wyn_main).'<br>';
    $punkty_fin=0;
    while($arr_main = mysql_fetch_assoc($wyn_main)){
     //echo 'kategoria: '.$arr_main['kategoria'].', datawpisania: '.$arr_main['datawpisania'].'<br>';
     //punkty naliczamy wylacznie dla normalnych zleceñ
     if($arr_main['zlecenie']!='reklamacja' && $arr_main['zlecenie']!='naprawa gwarancyjna' && $_SESSION['form_tab']['kategoria_wybor']==$arr_main['kategoria']){
       //echo 'nie reklamacja<br>';
       $p=$punkty->punkty($idzlecenianr, $idzleceniapoz, $arr_main['kategoria'], $arr_main['datawpisania']);
       $punkty_fin=$punkty_fin+$p;
     }
   }

    $_SESSION['form_tab']['punkty']=$punkty_fin;

//  echo $_SESSION['idusera'].'<br>liczba punktów='.$punkty_fin.'<br>';
    $smarty->assign('idtechnika', $_SESSION['idusera']);
    $smarty->assign('punkty', $_SESSION['form_tab']['punkty']);

//KONIEC OBLICZANIA PUNKTÓW ----------------------------------------------------------------------------------------


//Z£OTO -------------------------------------------------------------------------------------------------------------

    $sql_zloto="SELECT wagazlota FROM zlecenieinfo WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' AND wpis!='del' ";
    $wyn_zloto=myquery($sql_zloto);
    $arr_zloto = mysql_fetch_assoc($wyn_zloto);
    $smarty->assign('wagazlota', $arr_zloto['wagazlota']);
    //pobrac z z bazy wartosc zlota
    $sql="SELECT ilosc,cena_materialu FROM material_user WHERE nazwa='z³oto' AND osoba_wykorzystujaca='".$_SESSION['idusera']."' AND status='act' ";
    $w=myquery($sql); $arr = mysql_fetch_array($w);
    //echo $sql.'<br>';
	if($arr['ilosc']==0){
      $wartosc_zlota=0;
	}
	else{
      $wartosc_zlota=$arr['cena_materialu']/$arr['ilosc'];
	}
    $smarty->assign('wartosc_zlota', round($wartosc_zlota, 2));

//------------------------------------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------------------------------------
include('./inc/oblicz_cene.inc.php');

$cena = new CenaCount;
// CENA ZLECENIA
 //echo 'idzlecenianr: '.$idzlecenianr.', idzleceniapoz: '.$idzleceniapoz.'<br>';
	  //wyszukiwanie zlecen dopisanych
	  $s1="SELECT * FROM rozlicz_zleceniodawca WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' ";
	  $w1=myquery($s1);
          $b = mysql_fetch_assoc($w1);

          $czyjuzzleceniewpisane = mysql_numrows($w1);

    $sql_main="SELECT * FROM zlecenieinfo WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' AND wpis!='del' ";
    $wyn_main=myquery($sql_main);
//??? echo  'liczba etapów do ceny: '.mysql_numrows($wyn_main).'<br>';
    $cena_fin=0;
    while($arr_main = mysql_fetch_assoc($wyn_main)){
//???     echo 'kategoria: '.$arr_main['kategoria'].', datawpisania: '.$arr_main['datawpisania'].'<br>';
      if($arr_main['zlecenie']!='reklamacja' && $arr_main['zlecenie']!='naprawa gwarancyjna' && $_SESSION['form_tab']['kategoria_wybor']==$arr_main['kategoria']){
        $c=$cena->cena($idzlecenianr, $idzleceniapoz, $arr_main['kategoria'], $arr_main['datawpisania']);
        $cena_fin=$cena_fin+$c;
      }
    }

    $_SESSION['form_tab']['cena']=$cena_fin;
//???     echo 'cena fin: '.$cena_fin.'<br>';
    $smarty->assign('cena', $_SESSION['form_tab']['cena']);

  // tworzenie INFo o Zleceniu
  if($czyjuzzleceniewpisane==0){
	  //wyszukiwanie zlecen dopisanych
	  $sql="SELECT * FROM ".$_SESSION['form_tab']['kategoria']." WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' AND datawpisania='".$datawpisania."' ";
//echo $sql.'<br>';
	  $wynik=myquery($sql);
          $opiszlecenia='';
          while($arr_pom = mysql_fetch_array($wynik)){

            $info=$arr_pom[0];
            $size=(sizeof($arr_pom)/2); //na koncu bylo jeszcze -1
            for($j=5;$j<$size;$j++) {                    //&& substr($arr_pom[$j], 0, 8)!='dentyna_'
                //wywalam  dentyny z opisu i inne materia³y bo drukuj± siê na etykietach
                if($arr_pom[$j]!='' && $arr_pom[$j]!='0' && $arr_pom[$j]!=$dentyna_na_zloto && $arr_pom[$j]!=$dentyna_kiss
                   && $arr_pom[$j]!=$dentyna_na_cerkon && $arr_pom[$j]!=$dentyna_na_empress && $arr_pom[$j]!=$dentyna_na_metal
                   && $arr_pom[$j]!=$zakupione_cena && $arr_pom[$j]!=$plynproszek && $arr_pom[$j]!=$material
                   ){
                  $info=$info.'; '.$arr_pom[$j];
                }
            }
            //echo $info;
            $opiszlecenia=$opiszlecenia.' '.$info.' -------';
          }

 $smarty->assign('opiszlecenia', $opiszlecenia);
 }
 else{
	  $s1="SELECT opiszlecenia FROM rozlicz_zleceniodawca WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' ";
           $wyn=myquery($s1);
           $arr = mysql_fetch_array($wyn);
  $smarty->assign('opiszlecenia', $arr['opiszlecenia']);

 }
//------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------
//NOWE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

while( list($klucz, $wartosc) = each($_SESSION['tabele_to_go']) ){
   //echo "$klucz ===> $wartosc<BR>";
  if ($wartosc == $_SESSION['form_tab']['kategoria_wybor']) {
    unset ( $_SESSION['tabele_to_go'][$klucz] );
  }
}

//echo 'tabele- '; print_r($_SESSION['tabele_to_go']); echo '<br>';

reset($_SESSION['tabele_to_go']);//ustawiamy sie na poczatku tabeli
while( list($klucz, $wartosc) = each($_SESSION['tabele_to_go']) ){
  if ($wartosc != '') {
    $kategoria=$_SESSION['tabele_to_go'][$klucz];
  }
}
//    echo 'kategoria: '.$kategoria.'<br>';

if(count($_SESSION['tabele_to_go'])>0){

  $smarty->assign('next', 'dalej');
  $smarty->assign('zlecenienr', $idzlecenianr);
  $smarty->assign('zleceniepoz', $idzleceniapoz);
  $smarty->assign('datawpisania', $datawpisania);
  $smarty->assign('kategoria', $kategoria);

  $smarty->assign('punkty_all', $_SESSION['form_tab']['punkty']);
  $smarty->assign('cena_all', $_SESSION['form_tab']['cena']);
  $smarty->assign('opis_all', $opiszlecenia);
  
  $smarty->assign('tablica_wynikow', $_SESSION['form_tab']);
  unset($_SESSION['form_tab']);//wyczyszczenie tablicy info o zleceniu
  $smarty->display('addform_6t.tpl');

}
//------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------
else{
  $smarty->assign('zlecenienr', $idzlecenianr);
  $smarty->assign('zleceniepoz', $idzleceniapoz);
  $smarty->assign('datawpisania', $datawpisania);
  $smarty->assign('kategoria', $kategoria);

  $_SESSION['punkty_all'] = $_SESSION['punkty_all']+$_SESSION['form_tab']['punkty'];
  $_SESSION['cena_all'] = $_SESSION['cena_all']+$_SESSION['form_tab']['cena'];
  $_SESSION['opis_all'] = $_SESSION['opis_all'].$opiszlecenia;
  $smarty->assign('next', 'koniec');
  $smarty->assign('tablica_wynikow', $_SESSION['form_tab']);
  //unset($_SESSION['form_tab']);//wyczyszczenie tablicy info o zleceniu
  $smarty->display('addform_6t.tpl');
}

}
else{
  header("Location: ./index.php");
}
?>
