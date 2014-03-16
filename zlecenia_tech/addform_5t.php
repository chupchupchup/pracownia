<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

require_once('./inc/common.php');

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){
//------------------------------------------------------------------------------------------------------------------
//funkcja zapisuj�ca kt�re z�by zosta�y wybrane
function zab () {
  $zab="";
  for ($i = 1; $i <= 8; $i++) 
  {
    if( isset($_REQUEST['zab_gora_lewo'.$i])!="" ){
      $zab=$_REQUEST['zab_gora_lewo'.$i].','.$zab;
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

  unset($_SESSION['form_tab']['zeby']);
  $_SESSION['form_tab']['zeby'] = substr($zab, 0, strlen($string)-1);
}
//------------------------------------------------------------------------------------------------------------------
function dentyna ($rodzaj_dentyny) {

    $dentyna="";

      if( $_REQUEST[$rodzaj_dentyny.'_A1']=="A1" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_A1'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_A2']=="A2" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_A2'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_A3']=="A3" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_A3'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny."_A3i5"]=="A3.5" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny."_A3i5"].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_A4']=="A4" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_A4'].','.$dentyna;
      }

      if( $_REQUEST[$rodzaj_dentyny.'_B1']=="B1" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_B1'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_B2']=="B2" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_B2'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_B3']=="B3" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_B3'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_B3i5']=="B3.5" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_B3i5'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_B4']=="B4" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_B4'].','.$dentyna;
      }

      if( $_REQUEST[$rodzaj_dentyny.'_C1']=="C1" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_C1'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_C2']=="C2" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_C2'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_C3']=="C3" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_C3'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_C3i5']=="C3.5" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_C3i5'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_C4']=="C4" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_C4'].','.$dentyna;
      }

      if( $_REQUEST[$rodzaj_dentyny.'_D1']=="D1" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_D1'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_D2']=="D2" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_D2'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_D3']=="D3" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_D3'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_D3i5']=="D3.5" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_D3i5'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_D4']=="D4" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_D4'].','.$dentyna;
      }

      if( $_REQUEST[$rodzaj_dentyny.'_S1']=="S1" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_S1'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_S2']=="S2" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_S2'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_S3']=="S3" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_S3'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_S4']=="S4" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_S4'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_S5']=="S5" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_S5'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_S6']=="S6" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_S6'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_SBY']=="SBY" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_SBY'].','.$dentyna;
      }
      if( $_REQUEST[$rodzaj_dentyny.'_TC']=="TC" ){
        $dentyna=$_REQUEST[$rodzaj_dentyny.'_TC'].','.$dentyna;
      }
      
  unset($_SESSION['form_tab'][$rodzaj_dentyny]);
  $_SESSION['form_tab'][$rodzaj_dentyny] = substr($dentyna, 0, strlen($string)-1);
  //echo $_SESSION['form_tab'][$rodzaj_dentyny].' /_/_/_/<br>';
}
//------------------------------------------------------------------------------------------------------------------

 //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 require_once('./inc/filtr_formularzy.inc.php');
 //zmienna do czyszczenia
 $add = czysc_zmienne_formularza($_REQUEST['add']);

 $e = extra_pack($_REQUEST);
 extra_copy_to_session($_REQUEST);
 
 if (count($e)) {
 	$_SESSION['form_tab']['extra'] = $e;
 } 
 
 if($add=="addform_4t_porcelana_1.php"){

    $_SESSION['form_tab']['kategoria']="porcelana_wkladykk";
  	 $_SESSION['form_tab']['zakladka']="porcelana_1";
    $_SESSION['form_tab']['material']=$_REQUEST['material'];
    $_SESSION['form_tab']['rodzajwkladu']=$_REQUEST['rodzajwkladu'];
    $_SESSION['form_tab']['liczba_wkladow']=$_REQUEST['liczba_wkladow'];
    $_SESSION['form_tab']['wzornik']=$_REQUEST['wzornik'];
    $_SESSION['form_tab']['liczba_wzornik']=$_REQUEST['liczba_wzornik'];
    $_SESSION['form_tab']['poprawka']=$_REQUEST['poprawka'];
    $_SESSION['form_tab']['lyzka_indywidualna']=$_REQUEST['lyzka_indywidualna'];
    $_SESSION['form_tab']['liczba_lyzka_indywidualna']=$_REQUEST['liczba_lyzka_indywidualna'];
	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 
 elseif($add=="addform_4t_porcelana_2.php"){

    $_SESSION['form_tab']['kategoria']="porcelana_korona_licowana_na_metalu";
  	 $_SESSION['form_tab']['zakladka']="porcelana_2";
    $_SESSION['form_tab']['material']=$_REQUEST['material'];
    $_SESSION['form_tab']['rodzajkolornika']=$_REQUEST['rodzajkolornika'];
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
	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
         dentyna('dentyna_kiss');
         dentyna('dentyna_na_zloto');
	
 }
 elseif($add=="addform_4t_porcelana_3.php"){

    $_SESSION['form_tab']['kategoria']="porcelana_korona_pelnoceramiczna";
  	 $_SESSION['form_tab']['zakladka']="porcelana_3";
    $_SESSION['form_tab']['material']=$_REQUEST['material'];
    $_SESSION['form_tab']['czapeczka_cerkon']=$_REQUEST['czapeczka_cerkon'];
    $_SESSION['form_tab']['szklane_podparcie']=$_REQUEST['szklane_podparcie'];
    $_SESSION['form_tab']['liczba_szklane_podparcie']=$_REQUEST['liczba_szklane_podparcie'];
    $_SESSION['form_tab']['rodzajkolornika']=$_REQUEST['rodzajkolornika'];
    $_SESSION['form_tab']['kolor']=$_REQUEST['kolor'];

    $_SESSION['form_tab']['przymiarka']=$_REQUEST['przymiarka'];
    $_SESSION['form_tab']['przymiarka_kompozytu']=$_REQUEST['przymiarka_kompozytu'];
    $_SESSION['form_tab']['gotowa']=$_REQUEST['gotowa'];
    $_SESSION['form_tab']['liczba_gotowa']=$_REQUEST['liczba_gotowa'];
    $_SESSION['form_tab']['malowanie']=$_REQUEST['malowanie'];
    $_SESSION['form_tab']['przedzial_malowanie']=$_REQUEST['przedzial_malowanie'];
    $_SESSION['form_tab']['dobor_koloru']=$_REQUEST['dobor_koloru'];
    $_SESSION['form_tab']['poprawka']=$_REQUEST['poprawka'];
    $_SESSION['form_tab']['ponowne_napalenie_porcelany']=$_REQUEST['ponowne_napalenie_porcelany'];
	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
         dentyna('dentyna_na_cerkon');
         dentyna('dentyna_na_emax');
 }
 elseif($add=="addform_4t_porcelana_4.php"){

    $_SESSION['form_tab']['kategoria']="porcelana_inlay_onlay_licowka";
  	 $_SESSION['form_tab']['zakladka']="porcelana_4";
    $_SESSION['form_tab']['rodzajkolornika']=$_REQUEST['rodzajkolornika'];
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

	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 elseif($add=="addform_4t_porcelana_5.php"){

    $_SESSION['form_tab']['kategoria']="porcelana_implanty";
  	 $_SESSION['form_tab']['zakladka']="porcelana_5";
     $_SESSION['form_tab']['material']=$_REQUEST['material'];
    $_SESSION['form_tab']['rodzajkolornika']=$_REQUEST['rodzajkolornika'];
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
    $_SESSION['form_tab']['przedzial_malowanie']=$_REQUEST['przedzial_malowanie'];
    $_SESSION['form_tab']['dobor_koloru']=$_REQUEST['dobor_koloru'];
    $_SESSION['form_tab']['poprawka']=$_REQUEST['poprawka'];
    $_SESSION['form_tab']['elementy']=$_REQUEST['elementy'];
    $_SESSION['form_tab']['zakupione_cena']=$_REQUEST['zakupione_cena'];
    $_SESSION['form_tab']['klucz_do_implantow']=$_REQUEST['klucz_do_implantow'];
    $_SESSION['form_tab']['liczba_klucz_do_implantow']=$_REQUEST['liczba_klucz_do_implantow'];
    $_SESSION['form_tab']['lacznik_hybrydowy']=$_REQUEST['lacznik_hybrydowy'];
    $_SESSION['form_tab']['liczba_lacznik_hybrydowy']=$_REQUEST['liczba_lacznik_hybrydowy'];
	zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
         dentyna('dentyna_na_cerkon');
         dentyna('dentyna_na_metal');
 }
/*
 elseif($add=="addform_4t_porcelana_6.php"){

    $_SESSION['form_tab']['kategoria']="porcelana_kombinowana";
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
 elseif($add=="addform_4t_porcelana_7.php"){

    $_SESSION['form_tab']['kategoria']="porcelana_korony_inne";
  	 $_SESSION['form_tab']['zakladka']="porcelana_7";
    $_SESSION['form_tab']['lana']=$_REQUEST['lana'];
    $_SESSION['form_tab']['rodzaj']=$_REQUEST['rodzaj'];
    $_SESSION['form_tab']['korona_akryl']=$_REQUEST['korona_akryl'];
    $_SESSION['form_tab']['liczba_korona_akryl']=$_REQUEST['liczba_korona_akryl'];
    $_SESSION['form_tab']['korona_kompozyt']=$_REQUEST['korona_kompozyt'];
    $_SESSION['form_tab']['liczba_korona_kompozyt']=$_REQUEST['liczba_korona_kompozyt'];
    $_SESSION['form_tab']['wlokno_szklane']=$_REQUEST['wlokno_szklane'];
    $_SESSION['form_tab']['liczba_wlokno_szklane']=$_REQUEST['liczba_wlokno_szklane'];
    $_SESSION['form_tab']['maryland']=$_REQUEST['maryland'];
    $_SESSION['form_tab']['poprawka']=$_REQUEST['poprawka'];
    $_SESSION['form_tab']['rodzajkolornika']=$_REQUEST['rodzajkolornika'];
    $_SESSION['form_tab']['kolor']=$_REQUEST['kolor'];
    $_SESSION['form_tab']['teleskop']=$_REQUEST['teleskop'];
    $_SESSION['form_tab']['liczba_teleskop']=$_REQUEST['liczba_teleskop'];
    $_SESSION['form_tab']['akryl_skan']=$_REQUEST['akryl_skan'];
    $_SESSION['form_tab']['liczba_akryl_skan']=$_REQUEST['liczba_akryl_skan'];
     $_SESSION['form_tab']['liczba_waxup']=$_REQUEST['liczba_waxup'];
     $_SESSION['form_tab']['szyna_na_prowizorium']=$_REQUEST['szyna_na_prowizorium'];
     $_SESSION['form_tab']['liczba_szyna_na_prowizorium']=$_REQUEST['liczba_szyna_na_prowizorium'];
	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
/*
 elseif($add=="addform_4t_porcelana_8.php"){

    $_SESSION['form_tab']['kategoria']="porcelana_naprawa";
  	 $_SESSION['form_tab']['zakladka']="porcelana_8";
    $_SESSION['form_tab']['naprawa']=$_REQUEST['naprawa'];
	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
*/
 elseif($add=="addform_4t_proteza_1.php"){

 	$_SESSION['form_tab']['kategoria']="proteza_szkielet_szynoproteza";
    $_SESSION['form_tab']['zakladka']="proteza_1";
    $_SESSION['form_tab']['proteza']=$_REQUEST['proteza'];
    $_SESSION['form_tab']['liczba_proteza']=$_REQUEST['liczba_proteza'];
    $_SESSION['form_tab']['wzornik']=$_REQUEST['wzornik'];
    $_SESSION['form_tab']['lyzka']=$_REQUEST['lyzka'];
    $_SESSION['form_tab']['rodzajkolornika']=$_REQUEST['rodzajkolornika'];
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
    $_SESSION['form_tab']['futura_press']=$_REQUEST['futura_press'];
    $_SESSION['form_tab']['triplex_cold']=$_REQUEST['triplex_cold'];
    $_SESSION['form_tab']['probase_cold']=$_REQUEST['probase_cold'];
    $_SESSION['form_tab']['plynproszek']=$_REQUEST['plynproszek'];
    $_SESSION['form_tab']['material']=$_REQUEST['material'];
    zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 elseif($add=="addform_4t_proteza_2.php"){

    $_SESSION['form_tab']['kategoria']="proteza_calkowita";
  	 $_SESSION['form_tab']['zakladka']="proteza_2";
    $_SESSION['form_tab']['proteza']=$_REQUEST['proteza'];
    $_SESSION['form_tab']['liczba_proteza']=$_REQUEST['liczba_proteza'];
    $_SESSION['form_tab']['lyzka']=$_REQUEST['lyzka'];
    $_SESSION['form_tab']['wzornik']=$_REQUEST['wzornik'];
    $_SESSION['form_tab']['etap']=$_REQUEST['etap'];
    $_SESSION['form_tab']['rodzajkolornika']=$_REQUEST['rodzajkolornika'];
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
    $_SESSION['form_tab']['futura_gen']=$_REQUEST['futura_gen'];
    $_SESSION['form_tab']['triplex_hot']=$_REQUEST['triplex_hot'];
    $_SESSION['form_tab']['probase_hot']=$_REQUEST['probase_hot'];
    $_SESSION['form_tab']['plynproszek']=$_REQUEST['plynproszek'];
    zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 elseif($add=="addform_4t_proteza_3.php"){

    $_SESSION['form_tab']['kategoria']="proteza_czesciowa";
  	 $_SESSION['form_tab']['zakladka']="proteza_3";
    $_SESSION['form_tab']['proteza']=$_REQUEST['proteza'];
    $_SESSION['form_tab']['liczba_proteza']=$_REQUEST['liczba_proteza'];
    $_SESSION['form_tab']['lyzka']=$_REQUEST['lyzka'];
    $_SESSION['form_tab']['wzornik']=$_REQUEST['wzornik'];
    $_SESSION['form_tab']['etap']=$_REQUEST['etap'];
    $_SESSION['form_tab']['rodzajkolornika']=$_REQUEST['rodzajkolornika'];
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
    $_SESSION['form_tab']['futura_gen']=$_REQUEST['futura_gen'];
    $_SESSION['form_tab']['triplex_hot']=$_REQUEST['triplex_hot'];
    $_SESSION['form_tab']['probase_hot']=$_REQUEST['probase_hot'];
    $_SESSION['form_tab']['plynproszek']=$_REQUEST['plynproszek'];
    zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 elseif($add=="addform_4t_proteza_4.php"){

    $_SESSION['form_tab']['kategoria']="proteza_szyny";
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
     $_SESSION['form_tab']['deprogramator_koisa']=$_REQUEST['deprogramator_koisa'];
 }
 elseif($add=="addform_4t_proteza_5.php"){

    $_SESSION['form_tab']['kategoria']="proteza_naprawa";
  	 $_SESSION['form_tab']['zakladka']="proteza_5";
    $_SESSION['form_tab']['sklejenie']=$_REQUEST['sklejenie'];
    $_SESSION['form_tab']['naprawa_z_siatka']=$_REQUEST['naprawa_z_siatka'];
    $_SESSION['form_tab']['dostawienie_zeba']=$_REQUEST['dostawienie_zeba'];
    $_SESSION['form_tab']['dostawienie_zeba_ilosc']=$_REQUEST['dostawienie_zeba_ilosc'];
    $_SESSION['form_tab']['dostawienie_klamry']=$_REQUEST['dostawienie_klamry'];
    $_SESSION['form_tab']['dostawienie_klamry_ilosc']=$_REQUEST['dostawienie_klamry_ilosc'];
    $_SESSION['form_tab']['element_lany']=$_REQUEST['element_lany'];
    $_SESSION['form_tab']['element_lany_ilosc']=$_REQUEST['element_lany_ilosc'];
    $_SESSION['form_tab']['podsypanie_zebow']=$_REQUEST['podsypanie_zebow'];
    $_SESSION['form_tab']['lutowanie']=$_REQUEST['lutowanie'];
    $_SESSION['form_tab']['wymiana_akrylu']=$_REQUEST['wymiana_akrylu'];
    $_SESSION['form_tab']['podscielenie']=$_REQUEST['podscielenie'];
    $_SESSION['form_tab']['matryca']=$_REQUEST['matryca'];
    $_SESSION['form_tab']['miekkie_podscielenie']=$_REQUEST['miekkie_podscielenie'];
    $_SESSION['form_tab']['lutowanie_wymiana_akrylu']=$_REQUEST['lutowanie_wymiana_akrylu'];
    $_SESSION['form_tab']['lutowanie_szkieletu']=$_REQUEST['lutowanie_szkieletu'];
 }
 elseif($add=="addform_4t_proteza_6.php"){

    $_SESSION['form_tab']['kategoria']="proteza_prace_pomocnicze";
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
 }
	//echo 'tabele- '; print_r($_SESSION['tabele_to_go']);

    $zakladka = explode('_', $_SESSION['form_tab']['zakladka']);
	// echo '<br>zakladka0: '.$zakladka[0].', zakladka1: '.$zakladka[1].'<br>';
    $smarty->assign('cofnij0', $zakladka[0]);
    $smarty->assign('cofnij1', $zakladka[1]);

    $smarty->assign('tablica_wynikow', $_SESSION['form_tab']);
    $smarty->display('addform_5t.tpl');

}
else{
  header("Location: ./index.php");
}
?>
