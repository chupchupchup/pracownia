<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){
	
//------------------------------------------------------------------------------------------------------------------
//funkcja posredniczaca w zapytaniu SQL - zwraca kod bledu zapytania
    function myquery ($query) {
    include('./inc/db_connect.inc.php');
        $result = mysql_query($query);
        if (mysql_errno()){
            echo "MySQL error ".mysql_errno().": ".htmlspecialchars (mysql_error())."\n<br>";//When executing:<br>\n<b>$query\n</b><br>";
        }
        if (mysql_errno()==1062){
        	echo "Zlecenie z takim identyfikatorem ju¿ istnieje, dodanie nie jest mo¿liwe - popraw zlecenie<br /><br /><br /><br />";
		  }        

    include('./inc/db_close.inc.php');

        return $result;
    }
//------------------------------------------------------------------------------------------------------------------
/*
$limit=2;

if(!isset($_REQUEST['limitstart'])){
   $_REQUEST['limitstart']=0;
}
else{
   $_REQUEST['limitstart']=($_REQUEST['limitstart']-1)*$limit;
}
*/
//------------------------------------------------------------------------------------------------------------------

 //plik z funkcjami do czyszczenia zmiennych z niebezpiecznego kodu !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 require_once('./inc/filtr_formularzy.inc.php');

 //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 $idzlecenianr = czysc_zmienne_formularza($_SESSION['form_tab']['idzlecenianr']);
 $idzleceniapoz = czysc_zmienne_formularza($_SESSION['form_tab']['idzleceniapoz']);

function spr_zlecenie($tabela){

 //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 $idzlecenianr = czysc_zmienne_formularza($_SESSION['form_tab']['idzlecenianr']);
 $idzleceniapoz = czysc_zmienne_formularza($_SESSION['form_tab']['idzleceniapoz']);
 $pacjent = czysc_zmienne_formularza($_SESSION['form_tab']['pacjent']);
 $technik = czysc_zmienne_formularza($_SESSION['form_tab']['technik']);
 $idzewnetrzny = czysc_zmienne_formularza($_SESSION['form_tab']['idzewnetrzny']);
 $datawpisania = $_SESSION['datawpisania'];
 $zwrotzleceniadata = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzleceniadata']);
 $zwrotzleceniagodz = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzleceniagodz']);
 $zlecenie = czysc_zmienne_formularza($_SESSION['form_tab']['zlecenie']);
 //$zakladka = czysc_zmienne_formularza($_SESSION['form_tab']['zakladka']);

 //sprawdzanie czy info o zleceniu jest ju¿ w bazie
 $sql="SELECT idzlecenianr,idzleceniapoz FROM zlecenieinfo WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' AND datawpisania='".$datawpisania."' AND kategoria='".$tabela."' ";
 $wynik=myquery($sql);
 //$arr = mysql_fetch_assoc($wynik);

 if(mysql_numrows($wynik)==0){
 
   //wpisac dla lekarza technika
   //sprawdzenie czy jest to porcelana -> dodac technika
   $zlecenie_kat = explode('_', $tabela);
   if($zlecenie_kat[0]=='porcelana'){
      //tutaj zrobic wybor technika w zaleznosci od lekarza
      $zlecenie_lekarz = explode('/', $idzleceniapoz);//wyodrebnienie lekarza z identyfikatora zlecenia
      //echo $zlecenie_lekarz[1].'<br>';
      $s="SELECT pracownikid FROM zleceniodawca_technik WHERE idzleceniodawcy='".$zlecenie_lekarz[1]."' AND praca='porcelana' ";
      $w=myquery($s);
      $arr = mysql_fetch_assoc($w);
   }

   //tworzymy kod kreskowy ----------------------
   $sql_kod="SELECT max(kod_kreskowy) as max_kod FROM zlecenieinfo WHERE 1 ";
   $wynik_kod=myquery($sql_kod);
   $arr_kod = mysql_fetch_assoc($wynik_kod);
   if($arr_kod['max_kod']<=2000000000){
     $kod_kreskowy=2000000000+1;
   }
   else{
     $kod_kreskowy=$arr_kod['max_kod']+1;
   }
   $_SESSION['form_tab']['kod_kreskowy']=$kod_kreskowy;
   //echo $kod_kreskowy.'<br>';
   //------koniec kodu kreskowego----------------
   
   //dodawanie info o zleceniu do bazy
   $sql="INSERT INTO zlecenieinfo (idzlecenianr,idzleceniapoz,datawpisania,zwrotzleceniadata,zwrotzleceniagodz,pacjent,idzewnetrzne,kategoria,kod_kreskowy,zlecenie,pracownikid) VALUES ('".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$zwrotzleceniadata."','".$zwrotzleceniagodz."','".$pacjent."','".$idzewnetrzny."','".$tabela."','".$kod_kreskowy."','".$zlecenie."','".$technik."') ";
   myquery($sql);
 }
}

// PORCELANA WKLADY K-K
if($_SESSION['form_tab']['zakladka']=="porcelana_1"){
 //zmienne do czyszczenia
 $material = czysc_zmienne_formularza($_SESSION['form_tab']['material']);
 $rodzajwkladu = czysc_zmienne_formularza($_SESSION['form_tab']['rodzajwkladu']);
 $liczba_wkladow = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_wkladow']);
 $wzornik = czysc_zmienne_formularza($_SESSION['form_tab']['wzornik']);
 $liczba_wzornik = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_wzornik']);
 $poprawka = czysc_zmienne_formularza($_SESSION['form_tab']['poprawka']);
 $lyzka_indywidualna = czysc_zmienne_formularza($_SESSION['form_tab']['lyzka_indywidualna']);
 $liczba_lyzka_indywidualna = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_lyzka_indywidualna']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Porcelana Wk³ady K-K";
 $_SESSION['form_tab']['kategoria']='porcelana_wkladykk';//potrzebne do drukowania etykiety

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="porcelana_wkladykk";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("porcelana_wkladykk");
 
 //dodawanie zlecenia do bazy
 $sql="INSERT INTO porcelana_wkladykk ( kategoria,idzlecenianr,idzleceniapoz,datawpisania,wpisujacy,
                                        material,rodzajwkladu,liczba_wkladow,wzornik,liczba_wzornik,poprawka,lyzka_indywidualna,liczba_lyzka_indywidualna,zeby)
	    VALUES ('".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
					'".$material."','".$rodzajwkladu."','".$liczba_wkladow."','".$wzornik."','".$liczba_wzornik."','".$poprawka."','".$lyzka_indywidualna."','".$liczba_lyzka_indywidualna."','"."','".$zeby."'
					)";
 myquery($sql);
}

//PORCELANA KORONA LICOWANA
elseif($_SESSION['form_tab']['zakladka']=="porcelana_2"){
 //zmienne do czyszczenia
 $material = czysc_zmienne_formularza($_SESSION['form_tab']['material']);
 $kolornik = czysc_zmienne_formularza($_SESSION['form_tab']['kolornik']);
 $kolor = czysc_zmienne_formularza($_SESSION['form_tab']['kolor']);
 $lyzka = czysc_zmienne_formularza($_SESSION['form_tab']['lyzka']);
 $liczba_lyzka = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_lyzka']);
 $wzornik = czysc_zmienne_formularza($_SESSION['form_tab']['wzornik']);
 $liczba_wzornik = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_wzornik']);
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
 $liczba_frezowane_podparcie = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_frezowane_podparcie']);
 $zatrzaski = czysc_zmienne_formularza($_SESSION['form_tab']['zatrzaski']);
 $liczbazatrzaskow = czysc_zmienne_formularza($_SESSION['form_tab']['liczbazatrzaskow']);
 $zasuwy = czysc_zmienne_formularza($_SESSION['form_tab']['zasuwy']);
 $liczbazasow = czysc_zmienne_formularza($_SESSION['form_tab']['liczbazasow']);

   $szklane_podparcie = czysc_zmienne_formularza($_SESSION['form_tab']['szklane_podparcie']);
   $liczba_szklane_podparcie = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_szklane_podparcie']);
   $rozowe_dziaslo = czysc_zmienne_formularza($_SESSION['form_tab']['rozowe_dziaslo']);
   $liczba_rozowe_dziaslo = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_rozowe_dziaslo']);
   $stopien_porcelanowy = czysc_zmienne_formularza($_SESSION['form_tab']['stopien_porcelanowy']);
   $liczba_stopien_porcelanowy = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_stopien_porcelanowy']);
   $poprawka = czysc_zmienne_formularza($_SESSION['form_tab']['poprawka']);

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Porcelana Korona Licowana Na Metalu";
 $_SESSION['form_tab']['kategoria']='porcelana_korona_licowana_na_metalu';//potrzebne do drukowania etykiety

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="porcelana_korona_licowana_na_metalu";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("porcelana_korona_licowana_na_metalu");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO porcelana_korona_licowana_na_metalu (kategoria , idzlecenianr , idzleceniapoz , datawpisania , wpisujacy ,
                                              material , rodzajkolornika , kolor, lyzka, wzornik, liczba_wzornik, metal, surowa,
                                              gotowa, powt_metalu, ponowne_nap_porcel,
                                              malowanie, przedzial_malowanie, dobor_koloru,
                                              zatrzaski, liczbazatrzaskow, zasuwy, liczbazasow, zeby,
                                              liczba_gotowa,liczba_ponowne_nap_porcel,frezowane_podparcie,szklane_podparcie,
                                              liczba_szklane_podparcie,rozowe_dziaslo,stopien_porcelanowy,poprawka,
                                              liczba_lyzka, liczba_rozowe_dziaslo, liczba_stopien_porcelanowy, liczba_frezowane_podparcie
                                              )  
       VALUES (
	      '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$material."','".$kolornik."','".$kolor."','".$lyzka."','".$wzornik."','".$liczba_wzornik."','".$metal."','".$surowa."'
              ,'".$gotowa."','".$powt_metalu."','".$ponowne_nap_porcel."',
              '".$malowanie."','".$przedzial_malowanie."','".$dobor_koloru."',
              '".$zatrzaski."','".$liczbazatrzaskow."','".$zasuwy."','".$liczbazasow."', '".$zeby."',
              '".$liczba_gotowa."','".$liczba_ponowne_nap_porcel."', '".$frezowane_podparcie."', '".$szklane_podparcie."',
              '".$liczba_szklane_podparcie."','".$rozowe_dziaslo."', '".$stopien_porcelanowy."', '".$poprawka."',
              '".$liczba_lyzka."','".$liczba_rozowe_dziaslo."', '".$liczba_stopien_porcelanowy."', '".$liczba_frezowane_podparcie."'
               )";
              
 myquery($sql);
}

//PORCELANA KORONA PE£NOCERAMICZNA
elseif($_SESSION['form_tab']['zakladka']=="porcelana_3"){
 //zmienne do czyszczenia
 $material = czysc_zmienne_formularza($_SESSION['form_tab']['material']);
 $czapeczka_cerkon = czysc_zmienne_formularza($_SESSION['form_tab']['czapeczka_cerkon']);
 $szklane_podparcie = czysc_zmienne_formularza($_SESSION['form_tab']['szklane_podparcie']);
 $liczba_szklane_podparcie = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_szklane_podparcie']);
 $kolornik = czysc_zmienne_formularza($_SESSION['form_tab']['kolornik']);
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
 $ponowne_napalenie_porcelany = czysc_zmienne_formularza($_SESSION['form_tab']['ponowne_napalenie_porcelany']);
 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Porcelana Korona Pe³noceramiczna";
 $_SESSION['form_tab']['kategoria']='porcelana_korona_pelnoceramiczna';//potrzebne do drukowania etykiety

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="porcelana_korona_pelnoceramiczna";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("porcelana_korona_pelnoceramiczna");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO porcelana_korona_pelnoceramiczna ( kategoria , idzlecenianr , idzleceniapoz , datawpisania , 
		wpisujacy , material, czapeczka_cerkon, szklane_podparcie, liczba_szklane_podparcie, rodzajkolornika , kolor , przymiarka,
                przymiarka_kompozytu, gotowa, liczba_gotowa, malowanie, przedzial_malowanie, dobor_koloru, poprawka,
                zeby, ponowne_napalenie_porcelany
                )
       VALUES (
	      '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$material."','".$czapeczka_cerkon."','".$szklane_podparcie."','".$liczba_szklane_podparcie."','".$kolornik."','".$kolor."','".$przymiarka."',
              '".$przymiarka_kompozytu."','".$gotowa."','".$liczba_gotowa."','".$malowanie."','".$przedzial_malowanie."',
              '".$dobor_koloru."','".$poprawka."', '".$zeby."', '".$ponowne_napalenie_porcelany."'
              )";

 myquery($sql);
}

//PORCELANA INLAY / ONLAY / LICÓWKA
elseif($_SESSION['form_tab']['zakladka']=="porcelana_4"){
 //zmienne do czyszczenia
 $kolornik = czysc_zmienne_formularza($_SESSION['form_tab']['kolornik']);
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
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Porcelana Inlay/Onlay/Licówka";
 $_SESSION['form_tab']['kategoria']='porcelana_inlay_onlay_licowka';//potrzebne do drukowania etykiety

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="porcelana_inlay_onlay_licowka";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("porcelana_inlay_onlay_licowka");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO porcelana_inlay_onlay_licowka ( kategoria , idzlecenianr , idzleceniapoz , datawpisania , wpisujacy ,
 		        rodzajkolornika , kolor, licowka_kompozyt, liczba_licowka_kompozyt, licowka_Empress, liczba_licowka_Empress,
				licowka_cerkon, liczba_licowka_cerkon, licowka_wypalana, liczba_licowka_wypalana,
				licowka_Gradia, liczba_licowka_Gradia, inlay_onlay_zloto, liczba_inlay_onlay_zloto,
				inlay_onlay_Gradia, liczba_inlay_onlay_Gradia, inlay_onlay_kompozyt, liczba_inlay_onlay_kompozyt,
				inlay_onlay_Empress, liczba_inlay_onlay_Empress, inlay_onlay_cerkon, liczba_inlay_onlay_cerkon,
				inlay_onlay_metal, liczba_inlay_onlay_metal,
                malowanie, dobor_koloru, poprawka, zeby)
       VALUES (
    	      '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$kolornik."','".$kolor."','".$licowka_kompozyt."','".$liczba_licowka_kompozyt."',
              '".$licowka_Empress."','".$liczba_licowka_Empress."',
              '".$licowka_cerkon."','".$liczba_licowka_cerkon."',
              '".$licowka_wypalana."','".$liczba_licowka_wypalana."',
              '".$licowka_Gradia."','".$liczba_licowka_Gradia."',
              '".$inlay_onlay_zloto."','".$liczba_inlay_onlay_zloto."',
              '".$inlay_onlay_Gradia."','".$liczba_inlay_onlay_Gradia."',
              '".$inlay_onlay_kompozyt."','".$liczba_inlay_onlay_kompozyt."',
              '".$inlay_onlay_Empress."','".$liczba_inlay_onlay_Empress."',
              '".$inlay_onlay_cerkon."','".$liczba_inlay_onlay_cerkon."',
              '".$inlay_onlay_metal."','".$liczba_inlay_onlay_metal."',
              '".$malowanie."','".$dobor_koloru."','".$poprawka."','".$zeby."'
	      )";

 myquery($sql);
}
//PORCELANA IMPLANTY
elseif($_SESSION['form_tab']['zakladka']=="porcelana_5"){
 //zmienne do czyszczenia
 $material = czysc_zmienne_formularza($_SESSION['form_tab']['material']);
 $kolornik = czysc_zmienne_formularza($_SESSION['form_tab']['kolornik']);
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
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 $malowanie = czysc_zmienne_formularza($_SESSION['form_tab']['malowanie']);
 $przedzial_malowanie = czysc_zmienne_formularza($_SESSION['form_tab']['przedzial_malowanie']);
 $dobor_koloru = czysc_zmienne_formularza($_SESSION['form_tab']['dobor_koloru']);
 $poprawka = czysc_zmienne_formularza($_SESSION['form_tab']['poprawka']);
 $elementy = czysc_zmienne_formularza($_SESSION['form_tab']['elementy']);
 $zakupione_cena = czysc_zmienne_formularza($_SESSION['form_tab']['zakupione_cena']);

 $klucz_do_implantow = czysc_zmienne_formularza($_SESSION['form_tab']['klucz_do_implantow']);
 $liczba_klucz_do_implantow = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_klucz_do_implantow']);
 $lacznik_hybrydowy = czysc_zmienne_formularza($_SESSION['form_tab']['lacznik_hybrydowy']);
 $liczba_lacznik_hybrydowy = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_lacznik_hybrydowy']);


    //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Porcelana Implanty";
 $_SESSION['form_tab']['kategoria']='porcelana_implanty';//potrzebne do drukowania etykiety

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="porcelana_implanty";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("porcelana_implanty");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO porcelana_implanty ( kategoria , idzlecenianr , idzleceniapoz , datawpisania , wpisujacy ,
			material, rodzajkolornika , kolor, korona_implant, liczba_korona_implant, przeslo, liczba_przeslo,
                        lyzka,wzornik, przymiarka, surowa, gotowa, malowanie, przedzial_malowanie, dobor_koloru,
                        poprawka, elementy, zakupione_cena, zeby,klucz_do_implantow, liczba_klucz_do_implantow,
                lacznik_hybrydowy, liczba_lacznik_hybrydowy  )
       VALUES (
	      '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$material."','".$kolornik."','".$kolor."','".$korona_implant."','".$liczba_korona_implant."','".$przeslo."','".$liczba_przeslo."',
              '".$lyzka."','".$wzornik."','".$przymiarka."','".$surowa."','".$gotowa."',
              '".$malowanie."','".$przedzial_malowanie."','".$dobor_koloru."','".$poprawka."','".$elementy."','".$zakupione_cena."','".$zeby."',
              '".$klucz_do_implantow."','".$liczba_klucz_do_implantow."','".$lacznik_hybrydowy."','".$liczba_lacznik_hybrydowy."'
	      )";
	
 myquery($sql);
}

/*
//PORCELANA PRACA KOMBINOWANA
elseif($_SESSION['form_tab']['zakladka']=="porcelana_6"){
 //zmienne do czyszczenia
 $zatrzaski = czysc_zmienne_formularza($_SESSION['form_tab']['zatrzaski']);
 $liczbazatrzaskow = czysc_zmienne_formularza($_SESSION['form_tab']['liczbazatrzaskow']);
 $zasuwy = czysc_zmienne_formularza($_SESSION['form_tab']['zasuwy']);
 $liczbazasow = czysc_zmienne_formularza($_SESSION['form_tab']['liczbazasow']);
 $belka = czysc_zmienne_formularza($_SESSION['form_tab']['belka']);
 $wzornik = czysc_zmienne_formularza($_SESSION['form_tab']['wzornik']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Porcelana Praca Kombinowana";
 $_SESSION['form_tab']['kategoria']='porcelana_kombinowana';//potrzebne do drukowania etykiety

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="porcelana_kombinowana";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("porcelana_kombinowana");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO porcelana_kombinowana ( kategoria , idzlecenianr , idzleceniapoz , datawpisania , wpisujacy , 
 				  		 							  	 zatrzaski , zatrzaskiilosc , zasuwy , zasuwyilosc , belka , wzornik , 
 														 zeby
 				  		 							  )
       VALUES (
		 		  '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$zatrzaski."','".$liczbazatrzaskow."','".$zasuwy."','".$liczbazasow."','".$belka."','".$wzornik."',
				  '".$zeby."'
				  )";
 myquery($sql);
}
*/

//PORCELANA KORONY INNE
elseif($_SESSION['form_tab']['zakladka']=="porcelana_7"){
 //zmienne do czyszczenia
 $lana = czysc_zmienne_formularza($_SESSION['form_tab']['lana']);
 $rodzaj = czysc_zmienne_formularza($_SESSION['form_tab']['rodzaj']);
 $korona_akryl = czysc_zmienne_formularza($_SESSION['form_tab']['korona_akryl']);
 $liczba_korona_akryl = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_korona_akryl']);
 $korona_kompozyt = czysc_zmienne_formularza($_SESSION['form_tab']['korona_kompozyt']);
 $liczba_korona_kompozyt = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_korona_kompozyt']);
 $wlokno = czysc_zmienne_formularza($_SESSION['form_tab']['wlokno']);
 $liczba_wlokno = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_wlokno']);
 $maryland = czysc_zmienne_formularza($_SESSION['form_tab']['maryland']);
 $poprawka = czysc_zmienne_formularza($_SESSION['form_tab']['poprawka']);
 $kolornik = czysc_zmienne_formularza($_SESSION['form_tab']['kolornik']);
 $kolor = czysc_zmienne_formularza($_SESSION['form_tab']['kolor']);
 $teleskop = czysc_zmienne_formularza($_SESSION['form_tab']['teleskop']);
 $liczba_teleskop = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_teleskop']);
 $akryl_skan = czysc_zmienne_formularza($_SESSION['form_tab']['akryl_skan']);
 $liczba_akryl_skan = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_akryl_skan']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);

 $liczba_waxup = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_waxup']);
 $szyna_na_prowizorium = czysc_zmienne_formularza($_SESSION['form_tab']['szyna_na_prowizorium']);
 $liczba_szyna_na_prowizorium = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_szyna_na_prowizorium']);

 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Porcelana Korony Inne";
 $_SESSION['form_tab']['kategoria']='porcelana_korony_inne';//potrzebne do drukowania etykiety

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="porcelana_korony_inne";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("porcelana_korony_inne");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO porcelana_korony_inne ( kategoria , idzlecenianr , idzleceniapoz , datawpisania , wpisujacy , 
                                           lana, korona_akryl, liczba_korona_akryl, korona_kompozyt,liczba_korona_kompozyt,
                                           wlokno_szklane, liczba_wlokno_szklane, maryland, poprawka,
                                           rodzajkolornika, kolor, teleskop, liczba_teleskop, zeby, rodzaj,
										   akryl_skan, liczba_akryl_skan, liczba_waxup, szyna_na_prowizorium, liczba_szyna_na_prowizorium
                                         )
       VALUES (
              '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$lana."','".$korona_akryl."','".$liczba_korona_akryl."','".$korona_kompozyt."','".$liczba_korona_kompozyt."',
              '".$wlokno."','".$liczba_wlokno."','".$maryland."','".$poprawka."','".$kolornik."','".$kolor."',
              '".$teleskop."','".$liczba_teleskop."','".$zeby."','".$rodzaj."','".$akryl_skan."','".$liczba_akryl_skan."',
              '".$liczba_waxup."','".$szyna_na_prowizorium."','".$liczba_szyna_na_prowizorium."'
              )";
 myquery($sql);
}
/*
//PORCELANA NAPRAWA
elseif($_SESSION['form_tab']['zakladka']=="porcelana_8"){
 //zmienne do czyszczenia
 $naprawa = czysc_zmienne_formularza($_SESSION['form_tab']['naprawa']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Porcelana Naprawa";
 $_SESSION['form_tab']['kategoria']='porcelana_naprawa';//potrzebne do drukowania etykiety

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="porcelana_naprawa";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("porcelana_naprawa");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO porcelana_naprawa ( kategoria , idzlecenianr , idzleceniapoz , datawpisania , wpisujacy ,
 				  		 						    naprawa , zeby
 				  		 						  )
       VALUES (
		 		  '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$naprawa."','".$zeby."'
				  )";
 myquery($sql);
}
*/
//PROTEZA SZKIELET SZYNOPROTEZA
elseif($_SESSION['form_tab']['zakladka']=="proteza_1"){
 //zmienne do czyszczenia
 $proteza = czysc_zmienne_formularza($_SESSION['form_tab']['proteza']);
 $liczba_proteza = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_proteza']);
 $wzornik = czysc_zmienne_formularza($_SESSION['form_tab']['wzornik']);
 $lyzka = czysc_zmienne_formularza($_SESSION['form_tab']['lyzka']);
 $kolornik = czysc_zmienne_formularza($_SESSION['form_tab']['kolornik']);
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
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 $belka = czysc_zmienne_formularza($_SESSION['form_tab']['belka']);
 $zeby_ivoclar = czysc_zmienne_formularza($_SESSION['form_tab']['zeby_ivoclar']);
 $liczba_zeby_ivoclar = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_zeby_ivoclar']);

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Proteza Szkielet Szynoproteza";
 $_SESSION['form_tab']['kategoria']='proteza_szkielet_szynoproteza';//potrzebne do drukowania etykiety

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="proteza_szkielet_szynoproteza";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("proteza_szkielet_szynoproteza");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO proteza_szkielet_szynoproteza ( kategoria, idzlecenianr, idzleceniapoz, datawpisania, wpisujacy,
		 	proteza, liczba_proteza, wzornik, lyzka, rodzajkolornika, kolor,
	                klamra_lana, klamra_doginana, ciern, pelota,  metal, akryl, przymiarka, gotowa, liczba_gotowa,
                        poprawka, ponowne_ust_zebow, belka, zeby_ivoclar, liczba_zeby_ivoclar, zeby
                        )
       VALUES (
	      '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$proteza."','".$liczba_proteza."','".$wzornik."','".$lyzka."','".$kolornik."','".$kolor."',
	      '".$klamralana."','".$klamradoginana."','".$ciern."','".$pelota."','".$metal."','".$akryl."',
	      '".$przymiarka."','".$gotowa."','".$liczba_gotowa."','".$poprawka."','".$ponowne_ust_zebow."',
              '".$belka."','".$zeby_ivoclar."','".$liczba_zeby_ivoclar."','".$zeby."'
	      )";

 myquery($sql);
}

//PROTEZA CA£KOWITA
elseif($_SESSION['form_tab']['zakladka']=="proteza_2"){
 //zmienne do czyszczenia
 $proteza = czysc_zmienne_formularza($_SESSION['form_tab']['proteza']);
 $liczba_proteza = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_proteza']);
 $lyzka = czysc_zmienne_formularza($_SESSION['form_tab']['lyzka']);
 $wzornik = czysc_zmienne_formularza($_SESSION['form_tab']['wzornik']);
 $etap = czysc_zmienne_formularza($_SESSION['form_tab']['etap']);
 $kolornik = czysc_zmienne_formularza($_SESSION['form_tab']['kolornik']);
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

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Proteza Ca³kowita";
 $_SESSION['form_tab']['kategoria']='proteza_calkowita';//potrzebne do drukowania etykiety

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="proteza_calkowita";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("proteza_calkowita");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO proteza_calkowita ( kategoria , idzlecenianr , idzleceniapoz , datawpisania , wpisujacy , 
	                             proteza, liczba_proteza , wzornik , lyzka , etap , rodzajkolornika , kolor ,
 				     wzmocnienie, naklady, liczba_naklady, ponowne_ust_zebow, miekkie_podniebienie,
                                     bezbarwne_podniebienie, poprawka, belka, zeby_ivoclar, liczba_zeby_ivoclar, zeby
                                     )
       VALUES (
   	      '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$proteza."','".$liczba_proteza."','".$wzornik."','".$lyzka."','".$etap."','".$kolornik."','".$kolor."',
	      '".$wzmocnienie."','".$naklady."','".$liczba_naklady."','".$ponowne_ust_zebow."','".$miekkie_podniebienie."',
              '".$bezbarwne_podniebienie."','".$poprawka."', '".$belka."','".$zeby_ivoclar."','".$liczba_zeby_ivoclar."',
              '".$zeby."'
	      )";
	      
 myquery($sql);
}

//PROTEZA CZÊ¦CIOWA
elseif($_SESSION['form_tab']['zakladka']=="proteza_3"){
 //zmienne do czyszczenia
 $proteza = czysc_zmienne_formularza($_SESSION['form_tab']['proteza']);
 $liczba_proteza = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_proteza']);
 $lyzka = czysc_zmienne_formularza($_SESSION['form_tab']['lyzka']);
 $wzornik = czysc_zmienne_formularza($_SESSION['form_tab']['wzornik']);
 $etap = czysc_zmienne_formularza($_SESSION['form_tab']['etap']);
 $kolornik = czysc_zmienne_formularza($_SESSION['form_tab']['kolornik']);
 $kolor = czysc_zmienne_formularza($_SESSION['form_tab']['kolor']);
 $klamralana = czysc_zmienne_formularza($_SESSION['form_tab']['klamralana']);
 $ciern = czysc_zmienne_formularza($_SESSION['form_tab']['ciern']);
 $wzmocnienie = czysc_zmienne_formularza($_SESSION['form_tab']['wzmocnienie']);
 $miekkie_podniebienie = czysc_zmienne_formularza($_SESSION['form_tab']['miekkie_podniebienie']);
 $ponowne_ust_zebow = czysc_zmienne_formularza($_SESSION['form_tab']['ponowne_ust_zebow']);
 $poprawka = czysc_zmienne_formularza($_SESSION['form_tab']['poprawka']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 $belka = czysc_zmienne_formularza($_SESSION['form_tab']['belka']);
 $zeby_ivoclar = czysc_zmienne_formularza($_SESSION['form_tab']['zeby_ivoclar']);
 $liczba_zeby_ivoclar = czysc_zmienne_formularza($_SESSION['form_tab']['liczba_zeby_ivoclar']);

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Proteza Czê¶ciowa";
 $_SESSION['form_tab']['kategoria']='proteza_czesciowa';//potrzebne do drukowania etykiety

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="proteza_czesciowa";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("proteza_czesciowa");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO proteza_czesciowa ( kategoria , idzlecenianr , idzleceniapoz , datawpisania , wpisujacy ,
			 	proteza, liczba_proteza, wzornik , lyzka , etap , rodzajkolornika , kolor ,
				klamra_lana , ciern , wzmocnienie, miekkie_podniebienie,
				ponowne_ust_zebow, poprawka, belka, zeby_ivoclar, liczba_zeby_ivoclar, zeby
                                )
       VALUES (
	      '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$proteza."','".$liczba_proteza."','".$wzornik."','".$lyzka."','".$etap."','".$kolornik."',
              '".$kolor."', '".$klamralana."','".$ciern."','".$wzmocnienie."','".$miekkie_podniebienie."',
              '".$ponowne_ust_zebow."','".$poprawka."','".$belka."','".$zeby_ivoclar."','".$liczba_zeby_ivoclar."',
              '".$zeby."'
	      )";
	
 myquery($sql);
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
 $deprogramator_koisa = czysc_zmienne_formularza($_SESSION['form_tab']['deprogramator_koisa']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Proteza Szyny";
 $_SESSION['form_tab']['kategoria']='proteza_szyny';//potrzebne do drukowania etykiety

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="proteza_szyny";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("proteza_szyny");

 //dodawanie zlecenia do bazy
 //dodawanie zlecenia do bazy
 $sql="INSERT INTO proteza_szyny ( kategoria , idzlecenianr , idzleceniapoz , datawpisania , wpisujacy ,
			  wybielajaca , liczbawybielajacych , relaksacyjnatm, liczbarelaksacyjnatm,
			  relaksacyjnatn, liczbarelaksacyjnatn, relaksacyjnam, liczbarelaksacyjnam,
                          relaksacyjnampk, liczbarelaksacyjnampk, ochronna, liczbaochronna,
			  pozycjonowanie, liczbapozycjonowanie,
                          nagryzowa_w_artykulatorze, liczbanagryzowa_w_artykulatorze, nti, liczbanti,
                          aparat_ortodontyczny, liczbaaparat_ortodontyczny, szyna_korony_tymczasowe, liczbaszyna_korony_tymczasowe,
                          szyna_zabiegi_implantologiczne, liczbaszyna_zabiegi_implantologiczne,
                          plyta_podjezykowa, liczbaplyta_podjezykowa, aparat_przeciw_chrapaniu, liczbaaparat_przeciw_chrapaniu,
                          inne, liczbainne, deprogramator_koisa  )
       VALUES (
	      '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$wybielajaca."','".$liczbawybielajacych."','".$relaksacyjnatm."','".$liczbarelaksacyjnatm."',
	      '".$relaksacyjnatn."','".$liczbarelaksacyjnatn."','".$relaksacyjnam."','".$liczbarelaksacyjnam."',
              '".$relaksacyjnampk."','".$liczbarelaksacyjnampk."','".$ochronna."','".$liczbaochronna."',
	      '".$pozycjonowanie."','".$liczbapozycjonowanie."','".$nagryzowa_w_artykulatorze."','".$liczbanagryzowa_w_artykulatorze."',
              '".$nti."','".$liczbanti."','".$aparat_ortodontyczny."','".$liczbaaparat_ortodontyczny."',
              '".$szyna_korony_tymczasowe."','".$liczbaszyna_korony_tymczasowe."',
              '".$szyna_zabiegi_implantologiczne."','".$liczbaszyna_zabiegi_implantologiczne."',
              '".$plyta_podjezykowa."','".$liczbaplyta_podjezykowa."','".$aparat_przeciw_chrapaniu."','".$liczbaaparat_przeciw_chrapaniu."',
              '".$inne."','".$liczbainne."','".$deprogramator_koisa."'
	      )";
	
 myquery($sql);
}

//PROTEZA NAPRAWA
elseif($_SESSION['form_tab']['zakladka']=="proteza_5"){
 //zmienne do czyszczenia
 $sklejenie = czysc_zmienne_formularza($_SESSION['form_tab']['sklejenie']);
 $naprawasiatka = czysc_zmienne_formularza($_SESSION['form_tab']['naprawasiatka']);
 $dostzeba = czysc_zmienne_formularza($_SESSION['form_tab']['dostzeba']);
 $liczbadostzeba = czysc_zmienne_formularza($_SESSION['form_tab']['liczbadostzeba']);
 $dostklamry = czysc_zmienne_formularza($_SESSION['form_tab']['dostklamry']);
 $liczbadostklamry = czysc_zmienne_formularza($_SESSION['form_tab']['liczbadostklamry']);
 $elementlany = czysc_zmienne_formularza($_SESSION['form_tab']['elementlany']);
 $liczbaelementlany = czysc_zmienne_formularza($_SESSION['form_tab']['liczbaelementlany']);
 $podsypanie = czysc_zmienne_formularza($_SESSION['form_tab']['podsypanie']);
 $lutowanie = czysc_zmienne_formularza($_SESSION['form_tab']['lutowanie']);
 $akryl = czysc_zmienne_formularza($_SESSION['form_tab']['akryl']);
 $podprotezy = czysc_zmienne_formularza($_SESSION['form_tab']['podprotezy']);
 $matryca = czysc_zmienne_formularza($_SESSION['form_tab']['matryca']);
 $miekkie_podscielenie = czysc_zmienne_formularza($_SESSION['form_tab']['miekkie_podscielenie']);
 $lutowanie_wymiana_akrylu = czysc_zmienne_formularza($_SESSION['form_tab']['lutowanie_wymiana_akrylu']);
 $lutowanie_szkieletu = czysc_zmienne_formularza($_SESSION['form_tab']['lutowanie_szkieletu']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Proteza Naprawa";
 $_SESSION['form_tab']['kategoria']='proteza_naprawa';//potrzebne do drukowania etykiety

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="proteza_naprawa";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("proteza_naprawa");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO proteza_naprawa ( kategoria , idzlecenianr , idzleceniapoz , datawpisania , wpisujacy , 
			  	 sklejenie , naprawa_z_siatka , dostawienie_zeba ,
				 dostawienie_zeba_ilosc , dostawienie_klamry , dostawienie_klamry_ilosc ,
				 element_lany , element_lany_ilosc , podsypanie_zebow , lutowanie ,
				 wymiana_akrylu , podscielenie, matryca, miekkie_podscielenie,
                                 lutowanie_wymiana_akrylu, lutowanie_szkieletu
                                 )
       VALUES (
 	      '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$sklejenie."','".$naprawasiatka."','".$dostzeba."',
	      '".$liczbadostzeba."','".$dostklamry."','".$liczbadostklamry."','".$elementlany."',
	      '".$liczbaelementlany."','".$podsypanie."','".$lutowanie."','".$akryl."','".$podprotezy."',
              '".$matryca."','".$miekkie_podscielenie."','".$lutowanie_wymiana_akrylu."','".$lutowanie_szkieletu."'
	      )";
	      
 myquery($sql);
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
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Proteza Prace Pomocnicze";
 $_SESSION['form_tab']['kategoria']='proteza_prace_pomocnicze';//potrzebne do drukowania etykiety

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="proteza_prace_pomocnicze";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("proteza_prace_pomocnicze");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO proteza_prace_pomocnicze ( kategoria , idzlecenianr , idzleceniapoz , datawpisania , wpisujacy ,
			  	 model_diag_orient , liczba_model_diag_orient , dodatkowy_wzornik ,
				 liczba_dodatkowy_wzornik , wax_up , liczba_wax_up ,
				 model_dzielony_dodatkowy , liczba_model_dzielony_dodatkowy, lyzka_indywidualna,
                                 liczba_lyzka_indywidualna, wypozyczenie_luku_twarzowego
                                 )
       VALUES (
 	      '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$model_diag_orient."','".$liczba_model_diag_orient."','".$dodatkowy_wzornik."',
	      '".$liczba_dodatkowy_wzornik."','".$wax_up."','".$liczba_wax_up."',
	      '".$model_dzielony_dodatkowy."','".$liczba_model_dzielony_dodatkowy."','".$lyzka_indywidualna."',
              '".$liczba_lyzka_indywidualna."','".$wypozyczenie_luku_twarzowego."'
	      )";
	
 myquery($sql);
}

 $_SESSION['zakladka']=array_unique($_SESSION['zakladka']); //usuniecie duplikatów komórek tabeli zapisywanych zleceñ
/* for ($i = 0; $i < sizeof($_SESSION['zakladka']); $i++){
 	  echo $_SESSION['zakladka'][$i].', ';	
 }
 echo '<br />'; */

$smarty->assign('tablica_wynikow', $_SESSION['form_tab']);
$smarty->display('addform_6.tpl');

}
else{
  header("Location: ./index.php");
}
?>
