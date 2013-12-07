<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){

require_once('./inc/common.php');	
	
//------------------------------------------------------------------------------------------------------------------
//funkcja ustawiajaca które zêby zosta³y wybrane
function zeby ($zeby_lista) {
}

function dentyna ($rodzaj_dentyna){
  $smarty = new Smarty();
  global $smarty;

    $dentyna = explode(',', $_SESSION['form_tab'][$rodzaj_dentyna]);
    //echo print_r($dentyna).'<br>';

    foreach($dentyna as $klucz => $wartosc){
      //echo $rodzaj_dentyna.'_'.$wartosc.'|';
      if($wartosc == "A3.5"){
        $wartosc1 = "A3i5";
        $smarty->assign($rodzaj_dentyna.'_'.$wartosc1, $wartosc);
      }
      elseif($wartosc == "B3.5"){
        $wartosc1 = "B3i5";
        $smarty->assign($rodzaj_dentyna.'_'.$wartosc1, $wartosc);
      }
      elseif($wartosc == "C3.5"){
        $wartosc1 = "C3i5";
        $smarty->assign($rodzaj_dentyna.'_'.$wartosc1, $wartosc);
      }
      elseif($wartosc == "D3.5"){
        $wartosc1 = "D3i5";
        $smarty->assign($rodzaj_dentyna.'_'.$wartosc1, $wartosc);
      }
      elseif($wartosc != ""){
        $smarty->assign($rodzaj_dentyna.'_'.$wartosc, $wartosc);
      }
    }

}
//------------------------------------------------------------------------------------------------------------------

if(isset($_REQUEST['zlecenienr']) && isset($_REQUEST['zleceniepoz']) ){

 //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 require_once('./inc/filtr_formularzy.inc.php');
 //zmienna do czyszczenia
$idzleceniapoz=czysc_zmienne_formularza($_REQUEST['zleceniepoz']);
//echo $idzleceniapoz.'<br>';
$idzlecenianr=czysc_zmienne_formularza($_REQUEST['zlecenienr']);
//echo $idzlecenianr.'<br>';
$datawpisania=czysc_zmienne_formularza($_REQUEST['datawpisania']);
echo $datawpisania.'<br>';
$kategoria=czysc_zmienne_formularza($_REQUEST['kategoria']);
//echo 'kategoria: '.$kategoria.'<br>';

  
if($_REQUEST['z_linku_bezposredniego']=='tak'){
  unset($_SESSION['tabele_to_go']);
  unset($_SESSION['form_tab']);
  unset($_SESSION['punkty_all']);
  unset($_SESSION['cena_all']);
  unset($_SESSION['opis_all']);

 $sql="SELECT * FROM zlecenieinfo WHERE idzlecenianr = '".$idzlecenianr."' AND idzleceniapoz = '".$idzleceniapoz."' AND wpis!='del' ORDER BY idzlecenianr ";
 //echo $sql.'<br>';
 $wynik=pobierz_dane($sql);
 
 $wyn=myquery($sql);
    while($arr_ = mysql_fetch_assoc($wyn)){
      $_SESSION['tabele_to_go'][]=$arr_['kategoria']; 
	}
	//echo 'tabele - '; print_r($_SESSION['tabele_to_go']);
}

if($_REQUEST['dalsze_rozliczanie']=='tak'){
  $_SESSION['punkty_all'] = $_SESSION['punkty_all']+$_REQUEST['punkty_all'];
  $_SESSION['cena_all'] = $_SESSION['cena_all']+$_REQUEST['cena_all'];
  $_SESSION['opis_all'] = $_SESSION['opis_all'].$_REQUEST['opis_all'];
}

//wyszukiwanie informacji o zleceniu                                                                               AND datawpisania = '".$datawpisania."'            
$sql="SELECT * FROM zlecenieinfo WHERE idzlecenianr = '".$idzlecenianr."' AND idzleceniapoz = '".$idzleceniapoz."' AND kategoria = '".$kategoria."' ";
//echo '<br>'.$sql.'<br>';
$wynik=myquery($sql);
$arr = mysql_fetch_assoc($wynik);
//$arr["nr"] - nr ostatniego zlecenia

//********session
  $_SESSION['form_tab']['kategoria_wybor']=$arr['kategoria'];
   //echo $_SESSION['form_tab']['kategoria_wybor'].'<br>';
//***************
  
//wyszukiwanie szczegolowych informacji o zleceniu
  $sql1="SELECT * FROM ".$arr['kategoria']." WHERE idzlecenianr = '".$arr['idzlecenianr']."' AND idzleceniapoz = '".$arr['idzleceniapoz']."' AND datawpisania = '".$arr['datawpisania']."' ";
  $wynik1=myquery($sql1);
  $arr1 = mysql_fetch_assoc($wynik1);
  //$arr["nr"] - nr ostatniego zlecenia

  //do tablicy sesyjnej form_tab zpisujemy dane z tabeli zlecenieinfo
    //print_r($arr);
  foreach($arr as $klucz => $wartosc){
    if($wartosc!=''){
      //echo $klucz.'='.$wartosc.'<br>';
      $_SESSION['form_tab'][$klucz]=$wartosc;
      $smarty->assign($klucz, $wartosc);
    }
  }

  //do tablicy sesyjnej form_tab dodajemy dane z tabeli z danymi zlecenia
    //print_r($arr1);
    //echo '<br><br><br>';
  foreach($arr1 as $klucz => $wartosc){
    if($wartosc!=''){
      //echo $klucz.'='.$wartosc.'<br>';
      $_SESSION['form_tab'][$klucz]=$wartosc;
      $smarty->assign($klucz, $wartosc);
    }
  }
  //echo 'zeby='.$arr1['zeby'].'<br>';
  //zeby($arr1['zeby']);
  $zab = explode(',', $arr1['zeby']);
  foreach($zab as $klucz => $wartosc){
    // echo $zab[$klucz].'|';
    $zab_1=substr($zab[$klucz], 0, 1);
    $zab_2=substr($zab[$klucz], 1, 1);
    if( $zab_1=="1" ){
      //echo '1|'.$zab_2.'<br>';
      $smarty->assign('zab_gora_lewo'.$zab_2, $zab[$klucz]);
    }
    elseif( $zab_1=="2" ){
      //echo '2|'.$zab_2.'<br>';
      $smarty->assign('zab_gora_prawo'.$zab_2, $zab[$klucz]);
    }
    elseif( $zab_1=="3" ){
      //echo '3|'.$zab_2.'<br>';
      $smarty->assign('zab_dol_prawo'.$zab_2, $zab[$klucz]);
    }
    elseif( $zab_1=="4" ){
      //echo '4|'.$zab_2.'<br>';
      $smarty->assign('zab_dol_lewo'.$zab_2, $zab[$klucz]);
    }
  }

  // doczytujemy informacje o kliencie
  $zlecenie_parts = explode('/', $idzleceniapoz);  
  
  $sql = 'SELECT nazwa FROM zleceniodawca WHERE idzleceniodawcy = \''.$zlecenie_parts[1].'\'';
  
  $wynik = myquery($sql);
  $arr = mysql_fetch_row($wynik);
  
  if ($arr) {
  	$_SESSION['form_tab']['klient'] = $arr[0];
  }
}
if(isset($_REQUEST['cofka']) ){

  foreach($_SESSION['form_tab'] as $klucz => $wartosc){
      //echo $klucz.'='.$wartosc.'<br>';
      $smarty->assign($klucz, $wartosc);
  }

  $zab = explode(',', $_SESSION['form_tab']['zeby']);
  foreach($zab as $klucz => $wartosc){
    // echo $zab[$klucz].'|';
    $zab_1=substr($zab[$klucz], 0, 1);
    $zab_2=substr($zab[$klucz], 1, 1);
    if( $zab_1=="1" ){
      //echo '1|'.$zab_2.'<br>';
      $smarty->assign('zab_gora_lewo'.$zab_2, $zab[$klucz]);
    }
    elseif( $zab_1=="2" ){
      //echo '2|'.$zab_2.'<br>';
      $smarty->assign('zab_gora_prawo'.$zab_2, $zab[$klucz]);
    }
    elseif( $zab_1=="3" ){
      //echo '3|'.$zab_2.'<br>';
      $smarty->assign('zab_dol_prawo'.$zab_2, $zab[$klucz]);
    }
    elseif( $zab_1=="4" ){
      //echo '4|'.$zab_2.'<br>';
      $smarty->assign('zab_dol_lewo'.$zab_2, $zab[$klucz]);
    }
  }

}
    //print_r($_SESSION['form_tab']);
  $smarty->assign(wys, $_SESSION['form_tab']);
  //$smarty->display('addform_3t.tpl');
  
  // materialy extra
  $smarty->assign('producenci', pobierz_producentow());
  $extra = extra_dbload($idzlecenianr, $idzleceniapoz, $kategoria);
  $extra_u=array();
  extra_unpack($extra, $extra_u);
  foreach ($extra_u as $key => $value) {
  	$_SESSION['form_tab'][$key] = $value;
  	$smarty->assign($key, $value);
  }
  //--------------------
  
  
  if($_SESSION['form_tab']['kategoria_wybor']=='porcelana_wkladykk'){
    $smarty->display('addform_4t_porcelana_1.tpl');
  }
  elseif($_SESSION['form_tab']['kategoria_wybor']=='porcelana_korona_licowana_na_metalu'){
    dentyna('dentyna_kiss');
    dentyna('dentyna_na_zloto');
    $smarty->display('addform_4t_porcelana_2.tpl');
  }
  elseif($_SESSION['form_tab']['kategoria_wybor']=='porcelana_korona_pelnoceramiczna'){
    dentyna('dentyna_na_cerkon');
    dentyna('dentyna_na_empress');
    $smarty->display('addform_4t_porcelana_3.tpl');
  }
  elseif($_SESSION['form_tab']['kategoria_wybor']=='porcelana_inlay_onlay_licowka'){
    $smarty->display('addform_4t_porcelana_4.tpl');
  }
  elseif($_SESSION['form_tab']['kategoria_wybor']=='porcelana_implanty'){
    dentyna('dentyna_na_cerkon');
    dentyna('dentyna_na_metal');
    $smarty->display('addform_4t_porcelana_5.tpl');
  }
//  elseif($_SESSION['form_tab']['kategoria_wybor']=='porcelana_kombinowana'){
//    $smarty->display('addform_4t_porcelana_6.tpl');
//  }
  elseif($_SESSION['form_tab']['kategoria_wybor']=='porcelana_korony_inne'){
    $smarty->display('addform_4t_porcelana_7.tpl');
  }
//  elseif($_SESSION['form_tab']['kategoria_wybor']=='porcelana_naprawa'){
//    $smarty->display('addform_4t_porcelana_8.tpl');
//  }
  elseif($_SESSION['form_tab']['kategoria_wybor']=='proteza_szkielet_szynoproteza'){
    $smarty->display('addform_4t_proteza_1.tpl');
  }
  elseif($_SESSION['form_tab']['kategoria_wybor']=='proteza_calkowita'){
    $smarty->display('addform_4t_proteza_2.tpl');
  }
  elseif($_SESSION['form_tab']['kategoria_wybor']=='proteza_czesciowa'){
    $smarty->display('addform_4t_proteza_3.tpl');
  }
  elseif($_SESSION['form_tab']['kategoria_wybor']=='proteza_szyny'){
    $smarty->display('addform_4t_proteza_4.tpl');
  }
  elseif($_SESSION['form_tab']['kategoria_wybor']=='proteza_naprawa'){
    $smarty->display('addform_4t_proteza_5.tpl');
  }
  elseif($_SESSION['form_tab']['kategoria_wybor']=='proteza_prace_pomocnicze'){
    $smarty->display('addform_4t_proteza_6.tpl');
  }
}
else{
  header("Location: ./index.php");
}
?>
