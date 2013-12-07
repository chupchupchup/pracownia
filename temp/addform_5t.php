<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

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

 //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 require_once('./inc/filtr_formularzy.inc.php');
 //zmienna do czyszczenia
 $add = czysc_zmienne_formularza($_REQUEST['add']);

 if($add=="addform_4i_porcelana_1.php"){

  	 $_SESSION['form_tab']['zakladka']="porcelana_1";
    $_SESSION['form_tab']['material']=$_REQUEST['material'];
    $_SESSION['form_tab']['rodzajwkladu']=$_REQUEST['rodzajwkladu'];
    $_SESSION['form_tab']['zatrzask']=$_REQUEST['zatrzask'];
	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 
 elseif($add=="addform_4i_porcelana_2.php"){
  	 $_SESSION['form_tab']['zakladka']="porcelana_2";
    $_SESSION['form_tab']['material']=$_REQUEST['material'];
    $_SESSION['form_tab']['kolornik']=$_REQUEST['kolornik'];
    $_SESSION['form_tab']['lyzka']=$_REQUEST['lyzka'];
    $_SESSION['form_tab']['wzornik']=$_REQUEST['wzornik'];
    $_SESSION['form_tab']['metal']=$_REQUEST['metal'];
    $_SESSION['form_tab']['surowa']=$_REQUEST['surowa'];
    $_SESSION['form_tab']['gotowa']=$_REQUEST['gotowa'];
    $_SESSION['form_tab']['powt_metalu']=$_REQUEST['powt_metalu'];
    $_SESSION['form_tab']['ponowne_nap_porcel']=$_REQUEST['ponowne_nap_porcel'];
    $_SESSION['form_tab']['kolor']=$_REQUEST['kolor'];
	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 elseif($add=="addform_4i_porcelana_3.php"){
  	 $_SESSION['form_tab']['zakladka']="porcelana_3";
    $_SESSION['form_tab']['kolornik']=$_REQUEST['kolornik'];
    $_SESSION['form_tab']['kolor']=$_REQUEST['kolor'];
	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 elseif($add=="addform_4i_porcelana_4.php"){
  	 $_SESSION['form_tab']['zakladka']="porcelana_4";
    $_SESSION['form_tab']['material']=$_REQUEST['material'];
    $_SESSION['form_tab']['kolornik']=$_REQUEST['kolornik'];
    $_SESSION['form_tab']['licowka_porcelana']=$_REQUEST['licowka_porcelana'];
    $_SESSION['form_tab']['licowka_kompozyt']=$_REQUEST['licowka_kompozyt'];
    $_SESSION['form_tab']['kolor']=$_REQUEST['kolor'];
	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 elseif($add=="addform_4i_porcelana_5.php"){
  	 $_SESSION['form_tab']['zakladka']="porcelana_5";
    $_SESSION['form_tab']['praca']=$_REQUEST['praca'];
    $_SESSION['form_tab']['lyzka']=$_REQUEST['lyzka'];
    $_SESSION['form_tab']['wzornik']=$_REQUEST['wzornik'];
    $_SESSION['form_tab']['metal']=$_REQUEST['metal'];
    $_SESSION['form_tab']['surowa']=$_REQUEST['surowa'];
    $_SESSION['form_tab']['gotowa']=$_REQUEST['gotowa'];
	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 elseif($add=="addform_4i_porcelana_6.php"){
  	 $_SESSION['form_tab']['zakladka']="porcelana_6";
    $_SESSION['form_tab']['zatrzaski']=$_REQUEST['zatrzaski'];
    $_SESSION['form_tab']['liczbazatrzaskow']=$_REQUEST['liczbazatrzaskow'];
    $_SESSION['form_tab']['zasuwy']=$_REQUEST['zasuwy'];
    $_SESSION['form_tab']['liczbazasow']=$_REQUEST['liczbazasow'];
    $_SESSION['form_tab']['belka']=$_REQUEST['belka'];
    $_SESSION['form_tab']['wzornik']=$_REQUEST['wzornik'];
	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 elseif($add=="addform_4i_porcelana_7.php"){
  	 $_SESSION['form_tab']['zakladka']="porcelana_7";
    $_SESSION['form_tab']['lana']=$_REQUEST['lana'];
    $_SESSION['form_tab']['korona_akryl']=$_REQUEST['korona_akryl'];
    $_SESSION['form_tab']['korona_kompozyt']=$_REQUEST['korona_kompozyt'];
    $_SESSION['form_tab']['wlokno']=$_REQUEST['wlokno'];
    $_SESSION['form_tab']['maryland']=$_REQUEST['maryland'];
    $_SESSION['form_tab']['teleskop']=$_REQUEST['teleskop'];
	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 elseif($add=="addform_4i_porcelana_8.php"){
  	 $_SESSION['form_tab']['zakladka']="porcelana_8";
    $_SESSION['form_tab']['naprawa']=$_REQUEST['naprawa'];
	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 elseif($add=="addform_4i_proteza_1.php"){
  	 $_SESSION['form_tab']['zakladka']="proteza_1";
    $_SESSION['form_tab']['proteza']=$_REQUEST['proteza'];
    $_SESSION['form_tab']['liczbaprotez']=$_REQUEST['liczbaprotez'];
    $_SESSION['form_tab']['wzornik']=$_REQUEST['wzornik'];
    $_SESSION['form_tab']['lyzka']=$_REQUEST['lyzka'];
    $_SESSION['form_tab']['kolornik']=$_REQUEST['kolornik'];
    $_SESSION['form_tab']['kolor']=$_REQUEST['kolor'];
    $_SESSION['form_tab']['klamralana']=$_REQUEST['klamralana'];
    $_SESSION['form_tab']['klamradoginana']=$_REQUEST['klamradoginana'];
    $_SESSION['form_tab']['ciern']=$_REQUEST['ciern'];
    $_SESSION['form_tab']['pelota']=$_REQUEST['pelota'];
    $_SESSION['form_tab']['metal']=$_REQUEST['metal'];
    $_SESSION['form_tab']['przymiarka']=$_REQUEST['przymiarka'];
    $_SESSION['form_tab']['gotowa']=$_REQUEST['gotowa'];
    $_SESSION['form_tab']['poprawka']=$_REQUEST['poprawka'];
    $_SESSION['form_tab']['ponowne_ust_zebow']=$_REQUEST['ponowne_ust_zebow'];
	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 elseif($add=="addform_4i_proteza_2.php"){
  	 $_SESSION['form_tab']['zakladka']="proteza_2";
    $_SESSION['form_tab']['liczbaprotez']=$_REQUEST['liczbaprotez'];
    $_SESSION['form_tab']['lyzka']=$_REQUEST['lyzka'];
    $_SESSION['form_tab']['wzornik']=$_REQUEST['wzornik'];
    $_SESSION['form_tab']['etap']=$_REQUEST['etap'];
    $_SESSION['form_tab']['kolornik']=$_REQUEST['kolornik'];
    $_SESSION['form_tab']['kolor']=$_REQUEST['kolor'];
    $_SESSION['form_tab']['wzmocnieniesiatka']=$_REQUEST['wzmocnieniesiatka'];
    $_SESSION['form_tab']['wzmocnieniedrut']=$_REQUEST['wzmocnieniedrut'];
    $_SESSION['form_tab']['ponowne_ust_zebow']=$_REQUEST['ponowne_ust_zebow'];
    $_SESSION['form_tab']['poprawka']=$_REQUEST['poprawka'];
	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 elseif($add=="addform_4i_proteza_3.php"){
  	 $_SESSION['form_tab']['zakladka']="proteza_3";
    $_SESSION['form_tab']['liczbaprotez']=$_REQUEST['liczbaprotez'];
    $_SESSION['form_tab']['lyzka']=$_REQUEST['lyzka'];
    $_SESSION['form_tab']['wzornik']=$_REQUEST['wzornik'];
    $_SESSION['form_tab']['etap']=$_REQUEST['etap'];
    $_SESSION['form_tab']['kolornik']=$_REQUEST['kolornik'];
    $_SESSION['form_tab']['kolor']=$_REQUEST['kolor'];
    $_SESSION['form_tab']['klamralana']=$_REQUEST['klamralana'];
    $_SESSION['form_tab']['klamradoginana']=$_REQUEST['klamradoginana'];
    $_SESSION['form_tab']['ciern']=$_REQUEST['ciern'];
    $_SESSION['form_tab']['pelota']=$_REQUEST['pelota'];
    $_SESSION['form_tab']['wzmocnieniesiatka']=$_REQUEST['wzmocnieniesiatka'];
    $_SESSION['form_tab']['wzmocnieniedrut']=$_REQUEST['wzmocnieniedrut'];
    $_SESSION['form_tab']['ponowne_ust_zebow']=$_REQUEST['ponowne_ust_zebow'];
    $_SESSION['form_tab']['poprawka']=$_REQUEST['poprawka'];
	 zab();//funkcja zab() zapisuje do zmiennej sesyjnej wybrane zeby
 }
 elseif($add=="addform_4i_proteza_4.php"){
  	 $_SESSION['form_tab']['zakladka']="proteza_4";
    $_SESSION['form_tab']['liczbaprotez']=$_REQUEST['liczbaprotez'];
    $_SESSION['form_tab']['wybielajaca']=$_REQUEST['wybielajaca'];
    $_SESSION['form_tab']['liczbawybielajacych']=$_REQUEST['liczbawybielajacych'];
    $_SESSION['form_tab']['relaksacyjnatm']=$_REQUEST['relaksacyjnatm'];
    $_SESSION['form_tab']['relaksacyjnatn']=$_REQUEST['relaksacyjnatn'];
    $_SESSION['form_tab']['relaksacyjnam']=$_REQUEST['relaksacyjnam'];
    $_SESSION['form_tab']['relaksacyjnampk']=$_REQUEST['relaksacyjnampk'];
    $_SESSION['form_tab']['ochronna']=$_REQUEST['ochronna'];
    $_SESSION['form_tab']['pozycjonowanie']=$_REQUEST['pozycjonowanie'];
    $_SESSION['form_tab']['okluzyjna']=$_REQUEST['okluzyjna'];
    $_SESSION['form_tab']['nti']=$_REQUEST['nti'];
    $_SESSION['form_tab']['modele']=$_REQUEST['modele'];
 }
 elseif($add=="addform_4i_proteza_5.php"){
  	 $_SESSION['form_tab']['zakladka']="proteza_5";
    $_SESSION['form_tab']['liczbaprotez']=$_REQUEST['liczbaprotez'];
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
 }

    $zakladka = explode('_', $_SESSION['form_tab']['zakladka']);
	 //echo '<br>zakladka0: '.$zakladka[0].', zakladka1: '.$zakladka[1].'<br>';
    $smarty->assign('cofnij0', $zakladka[0]);
    $smarty->assign('cofnij1', $zakladka[1]);

    $smarty->assign('tablica_wynikow', $_SESSION['form_tab']);
    $smarty->display('addform_5i.tpl');

}
else{
  header("Location: ./index.php");
}
?>
