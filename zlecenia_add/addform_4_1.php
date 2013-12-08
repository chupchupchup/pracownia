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
            echo "MySQL error ".mysql_errno().": ".htmlspecialchars (mysql_error())."\n<br>When executing:<br>\n<b>$query\n</b><br>";
        }
    include('./inc/db_close.inc.php');
        //echo mysql_numrows($result).'<br>';
        return $result;
    }
//------------------------------------------------------------------------------------------------------------------
//funkcja zapisuj±ca które zêby zosta³y wybrane
function zab () {
  $zab="";
  for ($i = 1; $i <= 8; $i++)
  {
    if( isset($_REQUEST['zab_dol_lewo'.$i])!="" ){
      $zab=$_REQUEST['zab_dol_lewo'.$i].','.$zab;
    }
  }  
  for ($i = 1; $i <= 8; $i++) 
  {
    if( isset($_REQUEST['zab_dol_prawo'.$i])!="" ){
      $zab=$_REQUEST['zab_dol_prawo'.$i].','.$zab;
    }
  }
  for ($i = 1; $i <= 8; $i++)
  {
    if( isset($_REQUEST['zab_gora_prawo'.$i])!="" ){
      $zab=$_REQUEST['zab_gora_prawo'.$i].','.$zab;
    }
  }
  for ($i = 1; $i <= 8; $i++)
  {
    if( isset($_REQUEST['zab_gora_lewo'.$i])!="" ){
      $zab=$_REQUEST['zab_gora_lewo'.$i].','.$zab;
    }
  }

  unset($_SESSION['form_tab']['zeby']);
  $_SESSION['form_tab']['zeby'] = substr($zab, 0, strlen($string)-1);
}
//------------------------------------------------------------------------------------------------------------------

 //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 require_once('./inc/filtr_formularzy.inc.php');
 //zmienna do czyszczenia
 $add = czysc_zmienne_formularza($_REQUEST['add']);

 if($add=="addform_4_porcelana_1.php"){

  	 $_SESSION['form_tab']['zakladka']="porcelana_1";
 	  //echo '<br />zakladka: <b>'.$_SESSION['form_tab']['zakladka'].'</b>';
    $_SESSION['form_tab']['material']=$_REQUEST['material'];
 	  //echo '<br />materia³: <b>'.$_SESSION['form_tab']['material'].'</b>';
    $_SESSION['form_tab']['rodzajwkladu']=$_REQUEST['rodzajwkladu'];
 	  //echo '<br />rodzaj wkladu: <b>'.$_SESSION['form_tab']['rodzajwkladu'].'</b>';
    $_SESSION['form_tab']['liczba_wkladow']=$_REQUEST['liczba_wkladow'];
    $_SESSION['form_tab']['wzornik']=$_REQUEST['wzornik'];
    $_SESSION['form_tab']['liczba_wzornik']=$_REQUEST['liczba_wzornik'];
    $_SESSION['form_tab']['poprawka']=$_REQUEST['poprawka'];
    $_SESSION['form_tab']['lyzka_indywidualna']=$_REQUEST['lyzka_indywidualna'];
    $_SESSION['form_tab']['liczba_lyzka_indywidualna']=$_REQUEST['liczba_lyzka_indywidualna'];

    $termin_realizacji=3; //domy¶lna liczba dni realizacji zlecenia
    
 	  //echo '<br />zatrzask: <b>'.$_SESSION['form_tab']['zatrzask'].'</b>';

	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 
 elseif($add=="addform_4_porcelana_2.php"){
  	 $_SESSION['form_tab']['zakladka']="porcelana_2";
    $_SESSION['form_tab']['material']=$_REQUEST['material'];
    $_SESSION['form_tab']['kolornik']=$_REQUEST['kolornik'];
    $_SESSION['form_tab']['kolor']=$_REQUEST['kolor'];
    $_SESSION['form_tab']['lyzka']=$_REQUEST['lyzka'];
    $_SESSION['form_tab']['liczba_lyzka']=$_REQUEST['liczba_lyzka'];
    $_SESSION['form_tab']['wzornik']=$_REQUEST['wzornik'];
    $_SESSION['form_tab']['liczba_wzornik']=$_REQUEST['liczba_wzornik'];
    $_SESSION['form_tab']['metal']=$_REQUEST['metal'];
    $_SESSION['form_tab']['surowa']=$_REQUEST['surowa'];
//    $_SESSION['form_tab']['przymiarka_kompozytu']=$_REQUEST['przymiarka_kompozytu'];
    $_SESSION['form_tab']['gotowa']=$_REQUEST['gotowa'];
    $_SESSION['form_tab']['liczba_gotowa']=$_REQUEST['liczba_gotowa'];
    $_SESSION['form_tab']['powt_metalu']=$_REQUEST['powt_metalu'];
    $_SESSION['form_tab']['ponowne_nap_porcel']=$_REQUEST['ponowne_nap_porcel'];
    $_SESSION['form_tab']['liczba_ponowne_nap_porcel']=$_REQUEST['liczba_ponowne_nap_porcel'];

    $_SESSION['form_tab']['malowanie']=$_REQUEST['malowanie'];
    $_SESSION['form_tab']['przedzial_malowanie']=$_REQUEST['przedzial_malowanie'];
    $_SESSION['form_tab']['dobor_koloru']=$_REQUEST['dobor_koloru'];
    $_SESSION['form_tab']['frezowane_podparcie']=$_REQUEST['frezowane_podparcie'];
    $_SESSION['form_tab']['liczba_frezowane_podparcie']=$_REQUEST['liczba_frezowane_podparcie'];
    $_SESSION['form_tab']['zatrzaski']=$_REQUEST['zatrzaski'];
    $_SESSION['form_tab']['liczbazatrzaskow']=$_REQUEST['liczbazatrzaskow'];
    $_SESSION['form_tab']['zasuwy']=$_REQUEST['zasuwy'];
    $_SESSION['form_tab']['liczbazasow']=$_REQUEST['liczbazasow'];
    $_SESSION['form_tab']['szklane_podparcie']=$_REQUEST['szklane_podparcie'];
    $_SESSION['form_tab']['liczba_szklane_podparcie']=$_REQUEST['liczba_szklane_podparcie'];
    $_SESSION['form_tab']['rozowe_dziaslo']=$_REQUEST['rozowe_dziaslo'];
    $_SESSION['form_tab']['liczba_rozowe_dziaslo']=$_REQUEST['liczba_rozowe_dziaslo'];
    $_SESSION['form_tab']['stopien_porcelanowy']=$_REQUEST['stopien_porcelanowy'];
    $_SESSION['form_tab']['liczba_stopien_porcelanowy']=$_REQUEST['liczba_stopien_porcelanowy'];
    $_SESSION['form_tab']['poprawka']=$_REQUEST['poprawka'];

    if($_SESSION['form_tab']['metal']=='metal' || $_SESSION['form_tab']['powt_metalu']=='powtórka metalu'){
      $termin_realizacji=4; //domy¶lna liczba dni realizacji zlecenia
    }
    elseif($_SESSION['form_tab']['gotowa']=='gotowa'){
      $termin_realizacji=7; //domy¶lna liczba dni realizacji zlecenia
    }
    elseif($_SESSION['form_tab']['surowa']=='surowa'){
      $termin_realizacji=3; //domy¶lna liczba dni realizacji zlecenia
    }
    else{
      $termin_realizacji=0; //domy¶lna liczba dni realizacji zlecenia
    }

	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 elseif($add=="addform_4_porcelana_3.php"){
  	 $_SESSION['form_tab']['zakladka']="porcelana_3";
    $_SESSION['form_tab']['material']=$_REQUEST['material'];
    $_SESSION['form_tab']['czapeczka_cerkon']=$_REQUEST['czapeczka_cerkon'];
    $_SESSION['form_tab']['szklane_podparcie']=$_REQUEST['szklane_podparcie'];
    $_SESSION['form_tab']['kolornik']=$_REQUEST['kolornik'];
    $_SESSION['form_tab']['kolor']=$_REQUEST['kolor'];

    $_SESSION['form_tab']['przymiarka']=$_REQUEST['przymiarka'];
    $_SESSION['form_tab']['przymiarka_kompozytu']=$_REQUEST['przymiarka_kompozytu'];
    $_SESSION['form_tab']['gotowa']=$_REQUEST['gotowa'];
    $_SESSION['form_tab']['liczba_gotowa']=$_REQUEST['liczba_gotowa'];
    $_SESSION['form_tab']['malowanie']=$_REQUEST['malowanie'];
    $_SESSION['form_tab']['przedzial_malowanie']=$_REQUEST['przedzial_malowanie'];
    $_SESSION['form_tab']['dobor_koloru']=$_REQUEST['dobor_koloru'];
    $_SESSION['form_tab']['poprawka']=$_REQUEST['poprawka'];

    if($_SESSION['form_tab']['metal']=='metal' || $_SESSION['form_tab']['powt_metalu']=='powtórka metalu'){
      $termin_realizacji=4; //domy¶lna liczba dni realizacji zlecenia
    }
    elseif($_SESSION['form_tab']['gotowa']=='gotowa'){
      $termin_realizacji=7; //domy¶lna liczba dni realizacji zlecenia
    }
    elseif($_SESSION['form_tab']['surowa']=='surowa'){
      $termin_realizacji=3; //domy¶lna liczba dni realizacji zlecenia
    }
    else{
      $termin_realizacji=0; //domy¶lna liczba dni realizacji zlecenia
    }

	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 elseif($add=="addform_4_porcelana_4.php"){
  	 $_SESSION['form_tab']['zakladka']="porcelana_4";
    $_SESSION['form_tab']['kolornik']=$_REQUEST['kolornik'];
    $_SESSION['form_tab']['kolor']=$_REQUEST['kolor'];
    $_SESSION['form_tab']['licowka_kompozyt']=$_REQUEST['licowka_kompozyt'];
    $_SESSION['form_tab']['liczba_licowka_kompozyt']=$_REQUEST['liczba_licowka_kompozyt'];
    $_SESSION['form_tab']['licowka_Empress']=$_REQUEST['licowka_Empress'];
    $_SESSION['form_tab']['liczba_licowka_Empress']=$_REQUEST['liczba_licowka_Empress'];
    $_SESSION['form_tab']['licowka_cerkon']=$_REQUEST['licowka_cerkon'];
    $_SESSION['form_tab']['liczba_licowka_cerkon']=$_REQUEST['liczba_licowka_cerkon'];
    $_SESSION['form_tab']['licowka_wypalana']=$_REQUEST['licowka_wypalana'];
    $_SESSION['form_tab']['liczba_licowka_wypalana']=$_REQUEST['liczba_licowka_wypalana'];
    $_SESSION['form_tab']['licowka_Gradia']=$_REQUEST['licowka_Gradia'];
    $_SESSION['form_tab']['liczba_licowka_Gradia']=$_REQUEST['liczba_licowka_Gradia'];
    $_SESSION['form_tab']['inlay_onlay_zloto']=$_REQUEST['inlay_onlay_zloto'];
    $_SESSION['form_tab']['liczba_inlay_onlay_zloto']=$_REQUEST['liczba_inlay_onlay_zloto'];
    $_SESSION['form_tab']['inlay_onlay_Gradia']=$_REQUEST['inlay_onlay_Gradia'];
    $_SESSION['form_tab']['liczba_inlay_onlay_Gradia']=$_REQUEST['liczba_inlay_onlay_Gradia'];
    $_SESSION['form_tab']['inlay_onlay_kompozyt']=$_REQUEST['inlay_onlay_kompozyt'];
    $_SESSION['form_tab']['liczba_inlay_onlay_kompozyt']=$_REQUEST['liczba_inlay_onlay_kompozyt'];
    $_SESSION['form_tab']['inlay_onlay_Empress']=$_REQUEST['inlay_onlay_Empress'];
    $_SESSION['form_tab']['liczba_inlay_onlay_Empress']=$_REQUEST['liczba_inlay_onlay_Empress'];
    $_SESSION['form_tab']['inlay_onlay_cerkon']=$_REQUEST['inlay_onlay_cerkon'];
    $_SESSION['form_tab']['liczba_inlay_onlay_cerkon']=$_REQUEST['liczba_inlay_onlay_cerkon'];
    $_SESSION['form_tab']['inlay_onlay_metal']=$_REQUEST['inlay_onlay_metal'];
    $_SESSION['form_tab']['liczba_inlay_onlay_metal']=$_REQUEST['liczba_inlay_onlay_metal'];

    $_SESSION['form_tab']['malowanie']=$_REQUEST['malowanie'];
    $_SESSION['form_tab']['dobor_koloru']=$_REQUEST['dobor_koloru'];
    $_SESSION['form_tab']['poprawka']=$_REQUEST['poprawka'];

    $termin_realizacji=5; //domy¶lna liczba dni realizacji zlecenia

	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 elseif($add=="addform_4_porcelana_5.php"){
  	 $_SESSION['form_tab']['zakladka']="porcelana_5";
    $_SESSION['form_tab']['material']=$_REQUEST['material'];
    $_SESSION['form_tab']['kolornik']=$_REQUEST['kolornik'];
    $_SESSION['form_tab']['kolor']=$_REQUEST['kolor'];
    $_SESSION['form_tab']['korona_implant']=$_REQUEST['korona_implant'];
    $_SESSION['form_tab']['liczba_korona_implant']=$_REQUEST['liczba_korona_implant'];
    $_SESSION['form_tab']['przeslo']=$_REQUEST['przeslo'];
    $_SESSION['form_tab']['liczba_przeslo']=$_REQUEST['liczba_przeslo'];
    $_SESSION['form_tab']['lyzka']=$_REQUEST['lyzka'];
    $_SESSION['form_tab']['wzornik']=$_REQUEST['wzornik'];
    $_SESSION['form_tab']['przymiarka']=$_REQUEST['przymiarka'];
    $_SESSION['form_tab']['surowa']=$_REQUEST['surowa'];
    $_SESSION['form_tab']['gotowa']=$_REQUEST['gotowa'];
    $_SESSION['form_tab']['malowanie']=$_REQUEST['malowanie'];
    $_SESSION['form_tab']['dobor_koloru']=$_REQUEST['dobor_koloru'];
    $_SESSION['form_tab']['poprawka']=$_REQUEST['poprawka'];
    $_SESSION['form_tab']['elementy']=$_REQUEST['elementy'];
    $_SESSION['form_tab']['zakupione_cena']=$_REQUEST['zakupione_cena'];

    $termin_realizacji=5; //domy¶lna liczba dni realizacji zlecenia

	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
/*
 elseif($add=="addform_4_porcelana_6.php"){
  	 $_SESSION['form_tab']['zakladka']="porcelana_6";
    $_SESSION['form_tab']['zatrzaski']=$_REQUEST['zatrzaski'];
    $_SESSION['form_tab']['liczbazatrzaskow']=$_REQUEST['liczbazatrzaskow'];
    $_SESSION['form_tab']['zasuwy']=$_REQUEST['zasuwy'];
    $_SESSION['form_tab']['liczbazasow']=$_REQUEST['liczbazasow'];
    $_SESSION['form_tab']['belka']=$_REQUEST['belka'];
    $_SESSION['form_tab']['wzornik']=$_REQUEST['wzornik'];
	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
*/
 elseif($add=="addform_4_porcelana_7.php"){
  	 $_SESSION['form_tab']['zakladka']="porcelana_7";
    $_SESSION['form_tab']['lana']=$_REQUEST['lana'];
    $_SESSION['form_tab']['rodzaj']=$_REQUEST['rodzaj'];
    $_SESSION['form_tab']['korona_akryl']=$_REQUEST['korona_akryl'];
    $_SESSION['form_tab']['liczba_korona_akryl']=$_REQUEST['liczba_korona_akryl'];
    $_SESSION['form_tab']['korona_kompozyt']=$_REQUEST['korona_kompozyt'];
    $_SESSION['form_tab']['liczba_korona_kompozyt']=$_REQUEST['liczba_korona_kompozyt'];
    $_SESSION['form_tab']['wlokno']=$_REQUEST['wlokno'];
    $_SESSION['form_tab']['liczba_wlokno']=$_REQUEST['liczba_wlokno'];
    $_SESSION['form_tab']['maryland']=$_REQUEST['maryland'];
    $_SESSION['form_tab']['poprawka']=$_REQUEST['poprawka'];
    $_SESSION['form_tab']['kolornik']=$_REQUEST['kolornik'];
    $_SESSION['form_tab']['kolor']=$_REQUEST['kolor'];
    $_SESSION['form_tab']['teleskop']=$_REQUEST['teleskop'];
    $_SESSION['form_tab']['liczba_teleskop']=$_REQUEST['liczba_teleskop'];
    $_SESSION['form_tab']['akryl_skan']=$_REQUEST['akryl_skan'];
    $_SESSION['form_tab']['liczba_akryl_skan']=$_REQUEST['liczba_akryl_skan'];

    $termin_realizacji=5; //domy¶lna liczba dni realizacji zlecenia

	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
/*
 elseif($add=="addform_4_porcelana_8.php"){
  	 $_SESSION['form_tab']['zakladka']="porcelana_8";
    $_SESSION['form_tab']['naprawa']=$_REQUEST['naprawa'];
	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
*/
 elseif($add=="addform_4_proteza_1.php"){
  	 $_SESSION['form_tab']['zakladka']="proteza_1";
    $_SESSION['form_tab']['proteza']=$_REQUEST['proteza'];
    $_SESSION['form_tab']['liczba_proteza']=$_REQUEST['liczba_proteza'];
    $_SESSION['form_tab']['wzornik']=$_REQUEST['wzornik'];
    $_SESSION['form_tab']['lyzka']=$_REQUEST['lyzka'];
    $_SESSION['form_tab']['kolornik']=$_REQUEST['kolornik'];
    $_SESSION['form_tab']['kolor']=$_REQUEST['kolor'];
    $_SESSION['form_tab']['klamralana']=$_REQUEST['klamralana'];
    $_SESSION['form_tab']['klamradoginana']=$_REQUEST['klamradoginana'];
    $_SESSION['form_tab']['ciern']=$_REQUEST['ciern'];
    $_SESSION['form_tab']['pelota']=$_REQUEST['pelota'];
    $_SESSION['form_tab']['metal']=$_REQUEST['metal'];
    $_SESSION['form_tab']['akryl']=$_REQUEST['akryl'];
    $_SESSION['form_tab']['przymiarka']=$_REQUEST['przymiarka'];
    $_SESSION['form_tab']['gotowa']=$_REQUEST['gotowa'];
    $_SESSION['form_tab']['liczba_gotowa']=$_REQUEST['liczba_gotowa'];
    $_SESSION['form_tab']['poprawka']=$_REQUEST['poprawka'];
    $_SESSION['form_tab']['ponowne_ust_zebow']=$_REQUEST['ponowne_ust_zebow'];
    $_SESSION['form_tab']['belka']=$_REQUEST['belka'];
    $_SESSION['form_tab']['zeby_ivoclar']=$_REQUEST['zeby_ivoclar'];
    $_SESSION['form_tab']['liczba_zeby_ivoclar']=$_REQUEST['liczba_zeby_ivoclar'];

    $termin_realizacji=5; //domy¶lna liczba dni realizacji zlecenia

	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 elseif($add=="addform_4_proteza_2.php"){
  	 $_SESSION['form_tab']['zakladka']="proteza_2";
    $_SESSION['form_tab']['proteza']=$_REQUEST['proteza'];
    $_SESSION['form_tab']['liczba_proteza']=$_REQUEST['liczba_proteza'];
    $_SESSION['form_tab']['lyzka']=$_REQUEST['lyzka'];
    $_SESSION['form_tab']['wzornik']=$_REQUEST['wzornik'];
    $_SESSION['form_tab']['etap']=$_REQUEST['etap'];
    $_SESSION['form_tab']['kolornik']=$_REQUEST['kolornik'];
    $_SESSION['form_tab']['kolor']=$_REQUEST['kolor'];
    $_SESSION['form_tab']['wzmocnienie']=$_REQUEST['wzmocnienie'];
    $_SESSION['form_tab']['naklady']=$_REQUEST['naklady'];
    $_SESSION['form_tab']['liczba_naklady']=$_REQUEST['liczba_naklady'];
    $_SESSION['form_tab']['ponowne_ust_zebow']=$_REQUEST['ponowne_ust_zebow'];
    $_SESSION['form_tab']['miekkie_podniebienie']=$_REQUEST['miekkie_podniebienie'];
    $_SESSION['form_tab']['bezbarwne_podniebienie']=$_REQUEST['bezbarwne_podniebienie'];
    $_SESSION['form_tab']['belka']=$_REQUEST['belka'];
    $_SESSION['form_tab']['zeby_ivoclar']=$_REQUEST['zeby_ivoclar'];
    $_SESSION['form_tab']['liczba_zeby_ivoclar']=$_REQUEST['liczba_zeby_ivoclar'];
    $_SESSION['form_tab']['poprawka']=$_REQUEST['poprawka'];

    $termin_realizacji=5; //domy¶lna liczba dni realizacji zlecenia

	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 elseif($add=="addform_4_proteza_3.php"){
  	 $_SESSION['form_tab']['zakladka']="proteza_3";
    $_SESSION['form_tab']['proteza']=$_REQUEST['proteza'];
    $_SESSION['form_tab']['liczba_proteza']=$_REQUEST['liczba_proteza'];
    $_SESSION['form_tab']['lyzka']=$_REQUEST['lyzka'];
    $_SESSION['form_tab']['wzornik']=$_REQUEST['wzornik'];
    $_SESSION['form_tab']['etap']=$_REQUEST['etap'];
    $_SESSION['form_tab']['kolornik']=$_REQUEST['kolornik'];
    $_SESSION['form_tab']['kolor']=$_REQUEST['kolor'];
    $_SESSION['form_tab']['klamralana']=$_REQUEST['klamralana'];
    $_SESSION['form_tab']['ciern']=$_REQUEST['ciern'];
    $_SESSION['form_tab']['wzmocnienie']=$_REQUEST['wzmocnienie'];
    $_SESSION['form_tab']['miekkie_podniebienie']=$_REQUEST['miekkie_podniebienie'];
    $_SESSION['form_tab']['ponowne_ust_zebow']=$_REQUEST['ponowne_ust_zebow'];
    $_SESSION['form_tab']['poprawka']=$_REQUEST['poprawka'];
    $_SESSION['form_tab']['belka']=$_REQUEST['belka'];
    $_SESSION['form_tab']['zeby_ivoclar']=$_REQUEST['zeby_ivoclar'];
    $_SESSION['form_tab']['liczba_zeby_ivoclar']=$_REQUEST['liczba_zeby_ivoclar'];

    $termin_realizacji=5; //domy¶lna liczba dni realizacji zlecenia

	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 elseif($add=="addform_4_proteza_4.php"){
  	 $_SESSION['form_tab']['zakladka']="proteza_4";
    $_SESSION['form_tab']['wybielajaca']=$_REQUEST['wybielajaca'];
    $_SESSION['form_tab']['liczbawybielajacych']=$_REQUEST['liczbawybielajacych'];
    $_SESSION['form_tab']['relaksacyjnatm']=$_REQUEST['relaksacyjnatm'];
    $_SESSION['form_tab']['liczbarelaksacyjnatm']=$_REQUEST['liczbarelaksacyjnatm'];
    $_SESSION['form_tab']['relaksacyjnatn']=$_REQUEST['relaksacyjnatn'];
    $_SESSION['form_tab']['liczbarelaksacyjnatn']=$_REQUEST['liczbarelaksacyjnatn'];
    $_SESSION['form_tab']['relaksacyjnam']=$_REQUEST['relaksacyjnam'];
    $_SESSION['form_tab']['liczbarelaksacyjnam']=$_REQUEST['liczbarelaksacyjnam'];
    $_SESSION['form_tab']['relaksacyjnampk']=$_REQUEST['relaksacyjnampk'];
    $_SESSION['form_tab']['liczbarelaksacyjnampk']=$_REQUEST['liczbarelaksacyjnampk'];
    $_SESSION['form_tab']['ochronna']=$_REQUEST['ochronna'];
    $_SESSION['form_tab']['liczbaochronna']=$_REQUEST['liczbaochronna'];
    $_SESSION['form_tab']['pozycjonowanie']=$_REQUEST['pozycjonowanie'];
    $_SESSION['form_tab']['liczbapozycjonowanie']=$_REQUEST['liczbapozycjonowanie'];
    $_SESSION['form_tab']['nagryzowa_w_artykulatorze']=$_REQUEST['nagryzowa_w_artykulatorze'];
    $_SESSION['form_tab']['liczbanagryzowa_w_artykulatorze']=$_REQUEST['liczbanagryzowa_w_artykulatorze'];
    $_SESSION['form_tab']['nti']=$_REQUEST['nti'];
    $_SESSION['form_tab']['liczbanti']=$_REQUEST['liczbanti'];
    $_SESSION['form_tab']['aparat_ortodontyczny']=$_REQUEST['aparat_ortodontyczny'];
    $_SESSION['form_tab']['liczbaaparat_ortodontyczny']=$_REQUEST['liczbaaparat_ortodontyczny'];
    $_SESSION['form_tab']['szyna_korony_tymczasowe']=$_REQUEST['szyna_korony_tymczasowe'];
    $_SESSION['form_tab']['liczbaszyna_korony_tymczasowe']=$_REQUEST['liczbaszyna_korony_tymczasowe'];
    $_SESSION['form_tab']['szyna_zabiegi_implantologiczne']=$_REQUEST['szyna_zabiegi_implantologiczne'];
    $_SESSION['form_tab']['liczbaszyna_zabiegi_implantologiczne']=$_REQUEST['liczbaszyna_zabiegi_implantologiczne'];
    $_SESSION['form_tab']['plyta_podjezykowa']=$_REQUEST['plyta_podjezykowa'];
    $_SESSION['form_tab']['liczbaplyta_podjezykowa']=$_REQUEST['liczbaplyta_podjezykowa'];
    $_SESSION['form_tab']['aparat_przeciw_chrapaniu']=$_REQUEST['aparat_przeciw_chrapaniu'];
    $_SESSION['form_tab']['liczbaaparat_przeciw_chrapaniu']=$_REQUEST['liczbaaparat_przeciw_chrapaniu'];
    $_SESSION['form_tab']['inne']=$_REQUEST['inne'];
    $_SESSION['form_tab']['liczbainne']=$_REQUEST['liczbainne'];

    $termin_realizacji=5; //domy¶lna liczba dni realizacji zlecenia
 }
 elseif($add=="addform_4_proteza_5.php"){
  	 $_SESSION['form_tab']['zakladka']="proteza_5";
    $_SESSION['form_tab']['sklejenie']=$_REQUEST['sklejenie'];
    $_SESSION['form_tab']['naprawasiatka']=$_REQUEST['naprawasiatka'];
    $_SESSION['form_tab']['dostzeba']=$_REQUEST['dostzeba'];
    $_SESSION['form_tab']['liczbadostzeba']=$_REQUEST['liczbadostzeba'];
    $_SESSION['form_tab']['dostklamry']=$_REQUEST['dostklamry'];
    $_SESSION['form_tab']['liczbadostklamry']=$_REQUEST['liczbadostklamry'];
    $_SESSION['form_tab']['elementlany']=$_REQUEST['elementlany'];
    $_SESSION['form_tab']['liczbaelementlany']=$_REQUEST['liczbaelementlany'];
    $_SESSION['form_tab']['podsypanie']=$_REQUEST['podsypanie'];
    $_SESSION['form_tab']['lutowanie']=$_REQUEST['lutowanie'];
    $_SESSION['form_tab']['akryl']=$_REQUEST['akryl'];
    $_SESSION['form_tab']['podprotezy']=$_REQUEST['podprotezy'];
    $_SESSION['form_tab']['matryca']=$_REQUEST['matryca'];
    $_SESSION['form_tab']['miekkie_podscielenie']=$_REQUEST['miekkie_podscielenie'];
    $_SESSION['form_tab']['lutowanie_wymiana_akrylu']=$_REQUEST['lutowanie_wymiana_akrylu'];
    $_SESSION['form_tab']['lutowanie_szkieletu']=$_REQUEST['lutowanie_szkieletu'];

    $termin_realizacji=5; //domy¶lna liczba dni realizacji zlecenia
 }
 elseif($add=="addform_4_proteza_6.php"){
  	 $_SESSION['form_tab']['zakladka']="proteza_6";
    $_SESSION['form_tab']['model_diag_orient']=$_REQUEST['model_diag_orient'];
    $_SESSION['form_tab']['liczba_model_diag_orient']=$_REQUEST['liczba_model_diag_orient'];
    $_SESSION['form_tab']['dodatkowy_wzornik']=$_REQUEST['dodatkowy_wzornik'];
    $_SESSION['form_tab']['liczba_dodatkowy_wzornik']=$_REQUEST['liczba_dodatkowy_wzornik'];
    $_SESSION['form_tab']['wax_up']=$_REQUEST['wax_up'];
    $_SESSION['form_tab']['liczba_wax_up']=$_REQUEST['liczba_wax_up'];
    $_SESSION['form_tab']['model_dzielony_dodatkowy']=$_REQUEST['model_dzielony_dodatkowy'];
    $_SESSION['form_tab']['liczba_model_dzielony_dodatkowy']=$_REQUEST['liczba_model_dzielony_dodatkowy'];
    $_SESSION['form_tab']['lyzka_indywidualna']=$_REQUEST['lyzka_indywidualna'];
    $_SESSION['form_tab']['liczba_lyzka_indywidualna']=$_REQUEST['liczba_lyzka_indywidualna'];
    $_SESSION['form_tab']['wypozyczenie_luku_twarzowego']=$_REQUEST['wypozyczenie_luku_twarzowego'];

    $termin_realizacji=5; //domy¶lna liczba dni realizacji zlecenia
 }

    $zakladka = explode('_', $_SESSION['form_tab']['zakladka']);
	 //echo '<br>zakladka0: '.$zakladka[0].', zakladka1: '.$zakladka[1].'<br>';
    $smarty->assign('pacjent', $_SESSION['form_tab']['pacjent']);

      //tablica technikow
	  $sql="SELECT pracownikid FROM pracownicy WHERE stanowisko='technik' OR stanowisko='' ";
	  $wy=myquery($sql);
          while( $ar = mysql_fetch_assoc($wy) ) {
            $technicy[]=$ar['pracownikid'];
          }
    $smarty->assign('technicy', $technicy);

    $smarty->assign('cofnij0', $zakladka[0]);
    $smarty->assign('cofnij1', $zakladka[1]);

    //ustawiæ date realizacji zlecenia
    if( isset($_SESSION['form_tab']['zwrotzleceniadata']) ){
      $tablica_date_oddania = explode('-', $_SESSION['form_tab']['zwrotzleceniadata']);
      $Y=$tablica_date_oddania[0];
      $m=$tablica_date_oddania[1];
      $d=$tablica_date_oddania[2];
      $smarty->assign('D', $d);
      $smarty->assign('M', $m);
      $smarty->assign('Y', $Y);
    }
    else {
      $date_oddania=date("Y-m-d",strtotime("+$termin_realizacji days"));
      $tablica_date_oddania = explode('-', $date_oddania);
      $Y=$tablica_date_oddania[0];
      $m=$tablica_date_oddania[1];
      $d=$tablica_date_oddania[2];
      $smarty->assign('D', $d);
      $smarty->assign('M', $m);
      $smarty->assign('Y', $Y);
    }
    //ustawic godzine oddania
    if( isset($_SESSION['form_tab']['zwrotzleceniagodz']) ){
      $tablica_godz = explode(':', $_SESSION['form_tab']['zwrotzleceniagodz']);
      $godz=$tablica_godz[0];
      $min=$tablica_godz[1];
    }
    else {
      $godz='brak';
      $min='';
    }
    $smarty->assign('godz', $godz);
    $smarty->assign('min', $min);

    $smarty->display('addform_4_1.tpl');
}
else{
  header("Location: ./index.php");
}
?>
