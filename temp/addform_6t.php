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
 $idzewnetrzny = czysc_zmienne_formularza($_SESSION['form_tab']['idzewnetrzny']);
 $datawpisania = $_SESSION['datawpisania'];
 $zwrotzleceniadata = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzleceniadata']);
 $zwrotzleceniagodz = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzleceniagodz']);
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

   //dodawanie info o zleceniu do bazy
   $sql="INSERT INTO zlecenieinfo (idzlecenianr,idzleceniapoz,datawpisania,zwrotzleceniadata,zwrotzleceniagodz,pacjent,idzewnetrzne,kategoria,pracownikid) VALUES ('".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$zwrotzleceniadata."','".$zwrotzleceniagodz."','".$pacjent."','".$idzewnetrzny."','".$tabela."','".$arr['pracownikid']."') ";
   myquery($sql);
 }
}

// PORCELANA WKLADY K-K
if($_SESSION['form_tab']['zakladka']=="porcelana_1"){
 //zmienne do czyszczenia
 $material = czysc_zmienne_formularza($_SESSION['form_tab']['material']);
 $rodzajwkladu = czysc_zmienne_formularza($_SESSION['form_tab']['rodzajwkladu']);
 $zatrzask = czysc_zmienne_formularza($_SESSION['form_tab']['zatrzask']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Porcelana Wk³ady K-K";

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="porcelana_wkladykk";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("porcelana_wkladykk");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO porcelana_wkladykk ( kategoria,idzlecenianr,idzleceniapoz,datawpisania,wpisujacy,
 				  		 						  	 material,rodzajwkladu,zatrzask,zeby
 													)
	    VALUES ('".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
					'".$material."','".$rodzajwkladu."','".$zatrzask."','".$zeby."'
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
 $wzornik = czysc_zmienne_formularza($_SESSION['form_tab']['wzornik']);
 $metal = czysc_zmienne_formularza($_SESSION['form_tab']['metal']);
 $surowa = czysc_zmienne_formularza($_SESSION['form_tab']['surowa']);
 $gotowa = czysc_zmienne_formularza($_SESSION['form_tab']['gotowa']);
 $powt_metalu = czysc_zmienne_formularza($_SESSION['form_tab']['powt_metalu']);
 $ponowne_nap_porcel = czysc_zmienne_formularza($_SESSION['form_tab']['ponowne_nap_porcel']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Porcelana Korona Licowana";

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="porcelana_korona_licowana";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("porcelana_korona_licowana");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO porcelana_korona_licowana (kategoria , idzlecenianr , idzleceniapoz , datawpisania , wpisujacy ,
                                              material , rodzajkolornika , kolor, lyzka, wzornik, metal, surowa,
                                              gotowa, powt_metalu, ponowne_nap_porcel, zeby  )
       VALUES (
		 		  '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$material."','".$kolornik."','".$kolor."','".$lyzka."','".$wzornik."','".$metal."','".$surowa."'
              ,'".$gotowa."','".$powt_metalu."','".$ponowne_nap_porcel."','".$zeby."'
				  )";
 myquery($sql);
}
//PORCELANA KORONA PE£NOCERAMICZNA
elseif($_SESSION['form_tab']['zakladka']=="porcelana_3"){
 //zmienne do czyszczenia
 $kolornik = czysc_zmienne_formularza($_SESSION['form_tab']['kolornik']);
 $kolor = czysc_zmienne_formularza($_SESSION['form_tab']['kolor']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Porcelana Korona Pe³noceramiczna";

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="porcelana_korona_pelnoceramiczna";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("porcelana_korona_pelnoceramiczna");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO porcelana_korona_pelnoceramiczna ( kategoria , idzlecenianr , idzleceniapoz , datawpisania ,
 																		wpisujacy , rodzajkolornika , kolor , zeby
																	 )
       VALUES (
		 		  '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$kolornik."','".$kolor."','".$zeby."'
				  )";
 myquery($sql);
}
//PORCELANA INLAY / ONLAY / LICÓWKA
elseif($_SESSION['form_tab']['zakladka']=="porcelana_4"){
 //zmienne do czyszczenia
 $material = czysc_zmienne_formularza($_SESSION['form_tab']['material']);
 $kolornik = czysc_zmienne_formularza($_SESSION['form_tab']['kolornik']);
 $kolor = czysc_zmienne_formularza($_SESSION['form_tab']['kolor']);
 $licowka_porcelana = czysc_zmienne_formularza($_SESSION['form_tab']['licowka_porcelana']);
 $licowka_kompozyt = czysc_zmienne_formularza($_SESSION['form_tab']['licowka_kompozyt']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Porcelana Inlay/Onlay/Licówka";

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="porcelana_inlay_onlay";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("porcelana_inlay_onlay");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO porcelana_inlay_onlay ( kategoria , idzlecenianr , idzleceniapoz , datawpisania , wpisujacy ,
 				  	 material , rodzajkolornika , kolor, licowka_porcelana, licowka_kompozyt,zeby
 				  		 							  )
       VALUES (
		 		  '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$material."','".$kolornik."','".$kolor."','".$licowka_porcelana."','".$licowka_kompozyt."','".$zeby."'
				  )";
 myquery($sql);
}
//PORCELANA IMPLANTY
elseif($_SESSION['form_tab']['zakladka']=="porcelana_5"){
 //zmienne do czyszczenia
 $praca = czysc_zmienne_formularza($_SESSION['form_tab']['praca']);
 $lyzka = czysc_zmienne_formularza($_SESSION['form_tab']['lyzka']);
 $wzornik = czysc_zmienne_formularza($_SESSION['form_tab']['wzornik']);
 $metal = czysc_zmienne_formularza($_SESSION['form_tab']['metal']);
 $surowa = czysc_zmienne_formularza($_SESSION['form_tab']['surowa']);
 $gotowa = czysc_zmienne_formularza($_SESSION['form_tab']['gotowa']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Porcelana Implanty";

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="porcelana_implanty";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("porcelana_implanty");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO porcelana_implanty ( kategoria , idzlecenianr , idzleceniapoz , datawpisania , wpisujacy ,
				    implanty , lyzka,wzornik,metal,surowa,gotowa,zeby
 				  		 						  )
       VALUES (
		 		  '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$praca."','".$lyzka."','".$wzornik."','".$metal."','".$surowa."','".$gotowa."','".$zeby."'
				  )";
 myquery($sql);
}
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
//PORCELANA KORONY INNE
elseif($_SESSION['form_tab']['zakladka']=="porcelana_7"){
 //zmienne do czyszczenia
 $lana = czysc_zmienne_formularza($_SESSION['form_tab']['lana']);
 $korona_akryl = czysc_zmienne_formularza($_SESSION['form_tab']['korona_akryl']);
 $korona_kompozyt = czysc_zmienne_formularza($_SESSION['form_tab']['korona_kompozyt']);
 $wlokno = czysc_zmienne_formularza($_SESSION['form_tab']['wlokno']);
 $maryland = czysc_zmienne_formularza($_SESSION['form_tab']['maryland']);
 $teleskop = czysc_zmienne_formularza($_SESSION['form_tab']['teleskop']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Porcelana Korony Inne";

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="porcelana_korony_inne";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("porcelana_korony_inne");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO porcelana_korony_inne ( kategoria , idzlecenianr , idzleceniapoz , datawpisania , wpisujacy ,
 				    	 lana, korona_akryl, korona_kompozyt, wlokno_szklane, maryland, teleskop, zeby )
       VALUES (
		 		  '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$lana."','".$korona_akryl."','".$korona_kompozyt."','".$wlokno."','".$maryland."','".$teleskop."','".$zeby."'
				  )";
 myquery($sql);
}
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
//PROTEZA SZKIELET SZYNOPROTEZA
elseif($_SESSION['form_tab']['zakladka']=="proteza_1"){
 //zmienne do czyszczenia
 $proteza = czysc_zmienne_formularza($_SESSION['form_tab']['proteza']);
 $liczbaprotez = czysc_zmienne_formularza($_SESSION['form_tab']['liczbaprotez']);
 $wzornik = czysc_zmienne_formularza($_SESSION['form_tab']['wzornik']);
 $lyzka = czysc_zmienne_formularza($_SESSION['form_tab']['lyzka']);
 $kolornik = czysc_zmienne_formularza($_SESSION['form_tab']['kolornik']);
 $kolor = czysc_zmienne_formularza($_SESSION['form_tab']['kolor']);
 $klamralana = czysc_zmienne_formularza($_SESSION['form_tab']['klamralana']);
 $klamradoginana = czysc_zmienne_formularza($_SESSION['form_tab']['klamradoginana']);
 $ciern = czysc_zmienne_formularza($_SESSION['form_tab']['ciern']);
 $pelota = czysc_zmienne_formularza($_SESSION['form_tab']['pelota']);
 $metal = czysc_zmienne_formularza($_SESSION['form_tab']['metal']);
 $przymiarka = czysc_zmienne_formularza($_SESSION['form_tab']['przymiarka']);
 $gotowa = czysc_zmienne_formularza($_SESSION['form_tab']['gotowa']);
 $poprawka = czysc_zmienne_formularza($_SESSION['form_tab']['poprawka']);
 $ponowne_ust_zebow = czysc_zmienne_formularza($_SESSION['form_tab']['ponowne_ust_zebow']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Proteza Szkielet Szynoproteza";

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="proteza_szkielet_szynoproteza";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("proteza_szkielet_szynoproteza");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO proteza_szkielet_szynoproteza ( kategoria, idzlecenianr, idzleceniapoz, datawpisania, wpisujacy,
		 	proteza, iloscprotez, wzornik, lyzka, rodzajkolornika, kolor,
	                klamra_lana, klamra_doginana, ciern, pelota,  metal, przymiarka, gotowa, poprawka,
                        ponowne_ust_zebow,zeby
					 )
       VALUES (
		 		  '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$proteza."','".$liczbaprotez."','".$wzornik."','".$lyzka."','".$kolornik."','".$kolor."',
				  '".$klamralana."','".$klamradoginana."','".$ciern."','".$pelota."','".$metal."',
				  '".$przymiarka."','".$gotowa."','".$poprawka."','".$ponowne_ust_zebow."','".$zeby."'
				  )";
 myquery($sql);
}
//PROTEZA CA£KOWITA
elseif($_SESSION['form_tab']['zakladka']=="proteza_2"){
 //zmienne do czyszczenia
 $liczbaprotez = czysc_zmienne_formularza($_SESSION['form_tab']['liczbaprotez']);
 $lyzka = czysc_zmienne_formularza($_SESSION['form_tab']['lyzka']);
 $wzornik = czysc_zmienne_formularza($_SESSION['form_tab']['wzornik']);
 $etap = czysc_zmienne_formularza($_SESSION['form_tab']['etap']);
 $kolornik = czysc_zmienne_formularza($_SESSION['form_tab']['kolornik']);
 $kolor = czysc_zmienne_formularza($_SESSION['form_tab']['kolor']);
 $wzmocnieniesiatka = czysc_zmienne_formularza($_SESSION['form_tab']['wzmocnieniesiatka']);
 $wzmocnieniedrut = czysc_zmienne_formularza($_SESSION['form_tab']['wzmocnieniedrut']);
 $ponowne_ust_zebow = czysc_zmienne_formularza($_SESSION['form_tab']['ponowne_ust_zebow']);
 $poprawka = czysc_zmienne_formularza($_SESSION['form_tab']['poprawka']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Proteza Ca³kowita";

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="proteza_calkowita";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("proteza_calkowita");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO proteza_calkowita ( kategoria , idzlecenianr , idzleceniapoz , datawpisania , wpisujacy ,
				 	iloscprotez , wzornik , lyzka , etap , rodzajkolornika , kolor ,
				wzmocnienie_siatka , wzmocnienie_drut, ponowne_ust_zebow, poprawka, zeby
 				  		 						 )
       VALUES (
		 		  '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$liczbaprotez."','".$wzornik."','".$lyzka."','".$etap."','".$kolornik."','".$kolor."',
				  '".$wzmocnieniesiatka."','".$wzmocnieniedrut."','".$ponowne_ust_zebow."','".$poprawka."','".$zeby."'
				  )";
 myquery($sql);
}
//PROTEZA CZÊ¦CIOWA
elseif($_SESSION['form_tab']['zakladka']=="proteza_3"){
 //zmienne do czyszczenia
 $liczbaprotez = czysc_zmienne_formularza($_SESSION['form_tab']['liczbaprotez']);
 $lyzka = czysc_zmienne_formularza($_SESSION['form_tab']['lyzka']);
 $wzornik = czysc_zmienne_formularza($_SESSION['form_tab']['wzornik']);
 $etap = czysc_zmienne_formularza($_SESSION['form_tab']['etap']);
 $kolornik = czysc_zmienne_formularza($_SESSION['form_tab']['kolornik']);
 $kolor = czysc_zmienne_formularza($_SESSION['form_tab']['kolor']);
 $klamralana = czysc_zmienne_formularza($_SESSION['form_tab']['klamralana']);
 $klamradoginana = czysc_zmienne_formularza($_SESSION['form_tab']['klamradoginana']);
 $ciern = czysc_zmienne_formularza($_SESSION['form_tab']['ciern']);
 $pelota = czysc_zmienne_formularza($_SESSION['form_tab']['pelota']);
 $wzmocnieniesiatka = czysc_zmienne_formularza($_SESSION['form_tab']['wzmocnieniesiatka']);
 $wzmocnieniedrut = czysc_zmienne_formularza($_SESSION['form_tab']['wzmocnieniedrut']);
 $ponowne_ust_zebow = czysc_zmienne_formularza($_SESSION['form_tab']['ponowne_ust_zebow']);
 $poprawka = czysc_zmienne_formularza($_SESSION['form_tab']['poprawka']);
 $zeby = czysc_zmienne_formularza($_SESSION['form_tab']['zeby']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Proteza Czê¶ciowa";

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="proteza_czesciowa";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("proteza_czesciowa");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO proteza_czesciowa ( kategoria , idzlecenianr , idzleceniapoz , datawpisania , wpisujacy ,
			 	iloscprotez , wzornik , lyzka , etap , rodzajkolornika , kolor ,
				klamra_lana , klamra_doginana , ciern , pelota , wzmocnienie_siatka ,
				wzmocnienie_drut , ponowne_ust_zebow, poprawka, zeby
 				  		 						 )
       VALUES (
		 		  '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$liczbaprotez."','".$wzornik."','".$lyzka."','".$etap."','".$kolornik."','".$kolor."',
				  '".$klamralana."','".$klamradoginana."','".$ciern."','".$pelota."','".$wzmocnieniesiatka."',
				  '".$wzmocnieniedrut."','".$ponowne_ust_zebow."','".$poprawka."','".$zeby."'
				  )";
 myquery($sql);
}
//PROTEZA SZYNY
elseif($_SESSION['form_tab']['zakladka']=="proteza_4"){
 //zmienne do czyszczenia
 $liczbaprotez = czysc_zmienne_formularza($_SESSION['form_tab']['liczbaprotez']);
 $wybielajaca = czysc_zmienne_formularza($_SESSION['form_tab']['wybielajaca']);
 $liczbawybielajacych = czysc_zmienne_formularza($_SESSION['form_tab']['liczbawybielajacych']);
 $relaksacyjnatm = czysc_zmienne_formularza($_SESSION['form_tab']['relaksacyjnatm']);
 $relaksacyjnatn = czysc_zmienne_formularza($_SESSION['form_tab']['relaksacyjnatn']);
 $relaksacyjnam = czysc_zmienne_formularza($_SESSION['form_tab']['relaksacyjnam']);
 $relaksacyjnampk = czysc_zmienne_formularza($_SESSION['form_tab']['relaksacyjnampk']);
 $ochronna = czysc_zmienne_formularza($_SESSION['form_tab']['ochronna']);
 $pozycjonowanie = czysc_zmienne_formularza($_SESSION['form_tab']['pozycjonowanie']);
 $okluzyjna = czysc_zmienne_formularza($_SESSION['form_tab']['okluzyjna']);
 $nti = czysc_zmienne_formularza($_SESSION['form_tab']['nti']);
 $modele = czysc_zmienne_formularza($_SESSION['form_tab']['modele']);
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Proteza Szyny";

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="proteza_szyny";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("proteza_szyny");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO proteza_szyny ( kategoria , idzlecenianr , idzleceniapoz , datawpisania , wpisujacy ,
 				  		 					  iloscprotez , wybielajaca , wybielajacailosc , relaksacyjna_tm ,
											  relaksacyjna_tn , relaksacyjna_m , relaksacyjna_mpk , ochronna ,
											  pozycjonowanie_implantow , okluzyjna , nti, modele
 				  		 					)
       VALUES (
		 		  '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$liczbaprotez."','".$wybielajaca."','".$liczbawybielajacych."','".$relaksacyjnatm."',
				  '".$relaksacyjnatn."','".$relaksacyjnam."','".$relaksacyjnampk."','".$ochronna."',
				  '".$pozycjonowanie."','".$okluzyjna."','".$nti."','".$modele."'
				  )";
 myquery($sql);
}
//PROTEZA NAPRAWA
elseif($_SESSION['form_tab']['zakladka']=="proteza_5"){
 //zmienne do czyszczenia
 $liczbaprotez = czysc_zmienne_formularza($_SESSION['form_tab']['liczbaprotez']);
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
 //$zwrotzlecenia = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzlecenia']);
 $idusera = czysc_zmienne_formularza($_SESSION['idusera']);

 //dodatkowe zmienne
 $datawpisania = $_SESSION['datawpisania'];
 $kategoria = "Proteza Naprawa";

 //zapisanie do tabicy identyfikatorow tablic w bazie do których zostaly zapisane dane ¿eby na koncu
 //latwiej je by³o wyswietlic w podsumowaniu
 $_SESSION['zakladka'][]="proteza_naprawa";

 //dopisywanie do tabeli zlecenieinfo informacji o nowym zleceniu
 spr_zlecenie("proteza_naprawa");

 //dodawanie zlecenia do bazy
 $sql="INSERT INTO proteza_naprawa ( kategoria , idzlecenianr , idzleceniapoz , datawpisania , wpisujacy ,
 				  		 					  	 iloscprotez , sklejenie , naprawa_z_siatka , dostawienie_zeba ,
 												 dostawienie_zeba_ilosc , dostawienie_klamry , dostawienie_klamry_ilosc ,
 												 element_lany , element_lany_ilosc , podsypanie_zebow , lutowanie ,
 												 wymiana_akrylu , podscielenie, matryca
 				  		 					  )
       VALUES (
		 		  '".$kategoria."','".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$idusera."',
              '".$liczbaprotez."','".$sklejenie."','".$naprawasiatka."','".$dostzeba."',
				  '".$liczbadostzeba."','".$dostklamry."','".$liczbadostklamry."','".$elementlany."',
				  '".$liczbaelementlany."','".$podsypanie."','".$lutowanie."','".$akryl."','".$podprotezy."','".$matryca."'
				  )";
 myquery($sql);
}


 $_SESSION['zakladka']=array_unique($_SESSION['zakladka']); //usuniecie duplikatów komórek tabeli zapisywanych zleceñ
/* for ($i = 0; $i < sizeof($_SESSION['zakladka']); $i++){
 	  echo $_SESSION['zakladka'][$i].', ';	
 }
 echo '<br />'; */

$smarty->assign('tablica_wynikow', $_SESSION['form_tab']);
$smarty->display('addform_6i.tpl');

}
else{
  header("Location: ./index.php");
}
?>
