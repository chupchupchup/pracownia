<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']!='razdwatrzybabajagapatrzy'){
  header("Location: index.php");
}

//czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// funkcja czyszczaca zmienne formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

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

  //zmienne do czyszczenia
  $fv_nr = czysc_zmienne_formularza($_REQUEST['fv_nr']);
  //echo $fv_nr.'<br>';
//koniec czyszczenia zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

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

//------------------------------------------------------------------------------------------------------------------
//funkacja wykonujaca zapytanie SQL i przepisujaca tablice wynikow do tablicy ktora zostaje przeslana do szablonu
function pobierz_dane ($sql) {

   $sql_result=myquery($sql);

   $f=array();
   while ($row = mysql_fetch_row($sql_result)) {
        $f[] = $row;
   }
  return $f;
}
//------------------------------------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------------------------------------

//include('../inc/smarty_path.inc.php');
  require('../libs/Smarty.class.php');
  $smarty=& new Smarty;
  global $smarty;

//------------------------------------------------------------------------------------------------------------------

    $sql="SELECT * FROM faktury WHERE fv_nr='".$fv_nr."' ";
    $tablica_wynikow=pobierz_dane($sql);
    $smarty->assign('tablica_wynikow', $tablica_wynikow);

/*
  if( $status_zamowienia=='niezap�acona' ){
    $komunikat='STATUS FAKTURY: <b style="font-size:11px;color:#A90000;">FAKTURA NIE ZOSTA�A JESZCZE ZAP�ACONA !!!</b> ';
  }
  elseif( $status_zamowienia=='zap�acona' ){
    $komunikat='STATUS FAKTURY: <b style="font-size:11px;color:#A90000;">FAKTURA ZOSTA�A JU� ZAP�ACONA !!!</b> ';
  }
  elseif( $status_zamowienia=='w trakcie realizacji' ){
    $komunikat='STATUS FAKTURY: <b style="font-size:11px;color:#A90000;">FAKTURA ZOSTA�A ANULOWANA !!!</b> ';
  }
  else{
    $komunikat='';
  }
  $smarty->assign('komunikat', $komunikat);
*/

  $smarty->assign('komunikat', $_REQUEST['komunikat']);

//----------- S T A T U S -----------------
          $status=array('niezap�acona','zap�acona','anulowana','usun');
          $smarty->assign('status', $status);
//----------- S P O S O B   Z A P L A T Y -----------------
          $sposob_zaplaty=array('przelew','got�wka');
          $smarty->assign('sposob_zaplaty', $sposob_zaplaty);
//-----------------------------------------

  $smarty->display('./faktury_info.tpl');

//--------------------------------------------
?>
