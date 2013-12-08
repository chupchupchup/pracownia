<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){

require_once('../filterek/class.inputfilter_clean.php');

function czysc_zmienne_formularza($input)
{
	$myFilter = new InputFilter($tags, $attr, $tag_method, $attr_method, $xss_auto);

        //zmienna do czyszczenia
	$input = stripslashes($input);

	// process input
	$result = $myFilter->process($input);

        //czysta zmienna
        $input=strip_tags($result);

        //zwrocenie wyniku
        return $input;
}
//koniec podstawowej funkcji czyszczenia zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//------------------------------------------------------------------------------------------------------------------
//funkcja posredniczaca w zapytaniu SQL - zwraca kod bledu zapytania
    function myquery ($query) {
    include('../inc/db_connect.inc.php');
        $result = mysql_query($query);

        if (mysql_errno()){
            echo "MySQL error ".mysql_errno().": ".htmlspecialchars (mysql_error())."\n<br>When executing:<br>\n<b>$query\n</b><br>";
        }
    include('../inc/db_close.inc.php');

        return $result;
    }
//------------------------------------------------------------------------------------------------------------------

//include('../inc/smarty_path.inc.php');
  require('../libs/Smarty.class.php');
  $smarty=& new Smarty;
  global $smarty;

//------------------------------------------------------------------------------------------------------------------
//Zmienne
    $sprzedawca_nazwa='Uslugi Protetyczne Jerzy Andryskowski';
    $sprzedawca_adres='80-246 Gdañsk, ul.Jaskowa Dolina 9/1';
    $sprzedawca_nip='PL 584-000-01-05';
//------------------------------------------------------------------------------------------------------------------
    $liczba_el_fv=$_SESSION['liczba_el_fv'];

      //pobieram dane kontrahenta potrzebne do wystawienia faktury
      $sql1="SELECT nazwa, adres, nip, idzleceniodawcy  FROM zleceniodawca WHERE idzleceniodawcy='".$_SESSION['kontrahent']."' ";
      $sql_result1=myquery($sql1);
      $arr1 = mysql_fetch_assoc($sql_result1);

    $smarty->assign('tab_suma', $_SESSION['tab_suma']);
                           //'PKWiU'=>'50',
    $t_opis=array('l.p.'=>'20','Nazwa towaru/us³ugi'=>'150','Ilo¶æ'=>'60', 'jm'=>'50', 'Cena <br />netto'=>'80', 'Stawka <br />VAT %'=>'80','Warto¶æ <br />netto'=>'80','Warto¶æ <br />VAT'=>'80','Warto¶æ <br />brutto'=>'80');
    $smarty->assign('tablica_opisy', $t_opis);

    $smarty->assign('tab_el_fv', $_SESSION['tab_el_fv']);

    $smarty->assign('data_faktury', $_SESSION['data_faktury']);

    $smarty->assign('sposob_zaplaty', $_SESSION['sposob_zaplaty']);

    $smarty->assign('termin_zaplaty', $_SESSION['termin_zaplaty']);

    $smarty->assign('konto_bankowe', $_SESSION['konto_bankowe']);

    $smarty->assign('kontrahent_nazwa', $arr1['nazwa']);
    $smarty->assign('kontrahent_adres', $arr1['adres']);
    $smarty->assign('kontrahent_nip', $arr1['nip']);

    $smarty->assign('sprzedawca_nazwa', $sprzedawca_nazwa);
    $smarty->assign('sprzedawca_adres', $sprzedawca_adres);
    $smarty->assign('sprzedawca_nip', $sprzedawca_nip);

//echo $_SESSION['czy_wystawic_fakture'].'<br>';

if($_SESSION['czy_wystawic_fakture']!='nie'){
//echo 'aaaaaaaaaaaa<br>';
    //pobranie z tabeli faktury - ostatniego nr faktury z aktualnego miesiaca i roku
    $sql222="SELECT  SUBSTRING( fv_nr, 1, LOCATE('/', fv_nr)-1 )  as max_nr_fv FROM faktury WHERE SUBSTRING(fv_nr, -4)='".$_SESSION['fv_rok']."' AND SUBSTRING(fv_nr, -7,2)='".$_SESSION['fv_miesiac']."'";
        //echo $sql222.'<br>';
    $sql_result222=myquery($sql222);
	
	$tab_nr_fak=array();
    while($arr222 = mysql_fetch_assoc($sql_result222)){
	  $tab_nr_fak[]=$arr222['max_nr_fv'];
	}
	rsort($tab_nr_fak);
    //echo 'rsort- '.$tab_nr_fak[0].'<br><br>';

	 if($tab_nr_fak[0]>0){
        $nr_fv=($tab_nr_fak[0]+1).'/'.$_SESSION['fv_miesiac'].'/'.$_SESSION['fv_rok'];
        //echo $nr_fv.'<br>';
      }else{
        $nr_fv='1/'.$_SESSION['fv_miesiac'].'/'.$_SESSION['fv_rok'];
      }
}else{
//echo 'bbbbbbbbbbbbbb<br>';
    //pobranie z tabeli faktury - ostatniego nr faktury z aktualnego miesiaca i roku
    $sql222="SELECT  SUBSTRING( fv_nr, 1, LOCATE('/', fv_nr)-1 )  as max_nr_fv FROM faktury WHERE SUBSTRING(fv_nr, -4)='9999' ";
        //echo $sql222.'<br>';
    $sql_result222=myquery($sql222);

	$tab_nr_fak=array();
    while($arr222 = mysql_fetch_assoc($sql_result222)){
	  $tab_nr_fak[]=$arr222['max_nr_fv'];
	}
	rsort($tab_nr_fak);
    //echo 'rsort- '.$tab_nr_fak[0].'<br><br>';

	 if($tab_nr_fak[0]>0){
        $nr_fv=($tab_nr_fak[0]+1).'/9999';
        //echo $nr_fv.'<br>';
      }else{
        $nr_fv='1/9999';
      }
}

		$nazwa=mysql_escape_string($arr1['nazwa']);
		//echo $nazwa.'<br>';
		//$nazwa=$arr1['nazwa'];
    $sql3="INSERT INTO faktury (fv_nr,wartosc_netto_fv,data_fv,sposob_zaplaty,termin_zaplaty,kontrahent_nazwa,kontrahent_adres,kontrahent_nip,wartosc_brutto_fv,konto_bankowe,idzleceniodawcy,uwagi_fv)
                  VALUES ('".$nr_fv."', '".$_SESSION['tab_suma'][0]."', '".$_SESSION['data_faktury']."',
                          '".$_SESSION['sposob_zaplaty']."', '".$_SESSION['termin_zaplaty']."', '".czysc_zmienne_formularza($nazwa)."',
                          '".$arr1['adres']."','".$arr1['nip']."', '".$_SESSION['tab_suma'][0]."', '".$_SESSION['konto_bankowe']."', '".$arr1['idzleceniodawcy']."', '".addslashes($_SESSION['uwagi_fv'])."') ";
        echo $sql3.'<br>';
    $sql_result3=myquery($sql3);
    //-----------------------------------------------------------------------------------------------------------
    
unset($_SESSION['czy_wystawic_fakture']);
unset($_SESSION['fv_miesiac']);
unset($_SESSION['fv_rok']);

//zapisac do tabeli faktury dane o tej fakturze i przy zamowieniach wpisac w pole fv odpowiedni nr faktury
    for ($i=0;$i<count($_SESSION['tab_el_fv']);$i+=1){
        $sql2="UPDATE rozlicz_zleceniodawca SET fv_nr='".$nr_fv."' WHERE idzlecenianr='".$_SESSION['tab_el_fv'][$i][6]."' AND idzleceniapoz='".$_SESSION['tab_el_fv'][$i][7]."' ";
        //echo $sql2.'<br>';
        $sql_result2=myquery($sql2);
    }


    $smarty->assign('nr_fv', $nr_fv);
    $smarty->display('faktury_wydruk.tpl');
}
else{
  header("Location: ./index.php");
}
?>
