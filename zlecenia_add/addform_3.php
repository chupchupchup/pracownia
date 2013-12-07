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

        return $result;
    }
//------------------------------------------------------------------------------------------------------------------

if(isset($_REQUEST['zleceniodawca']) ){

$idzlecenia="/".$_REQUEST['zleceniodawca']."/".date('Y');

//wyszukiwanie najwiekszego nr zlecenia danego zleceniodawcy
$sql="SELECT max(idzlecenianr) as nr FROM zlecenieinfo WHERE idzleceniapoz LIKE '".$idzlecenia."' ";
$wynik=myquery($sql);
$arr = mysql_fetch_assoc($wynik);
//$arr["nr"] - nr ostatniego zlecenia

//********session
  $_SESSION['form_tab']['idzleceniapoz']=$idzlecenia;
  $_SESSION['form_tab']['idzlecenianr']=$arr['nr']+1;
  $_SESSION['datawpisania'] = date('Y-m-d H:i');
  //echo date('Y-m-d H:i').'<br>';
//***************
  
  $smarty->assign('idzlecenianr', $arr['nr']+1);
  $smarty->assign('idzlecenia', $idzlecenia);

/*
  $smarty->assign('D', date('d'));
  $smarty->assign('M', date('m'));
  $smarty->assign('Y', date('Y'));
*/
}
elseif(isset($_SESSION['form_tab']['idzleceniapoz'])!="" && isset($_SESSION['form_tab']['idzlecenianr'])!="" && !isset($_REQUEST['zleceniodawca']) ){
  
  //przeczyszczenie tablicy $_SESSION['form_tab']
  include('./inc/czysc_tablice_form_tab.inc.php');
  czysc_tablice_form_tab();

  $smarty->assign('idzlecenianr', $_SESSION['form_tab']['idzlecenianr']);
  $smarty->assign('idzlecenia', $_SESSION['form_tab']['idzleceniapoz']);

/*
  $tablica_datazlec = explode('-', $_SESSION['form_tab']['zwrotzleceniadata']);
  $Y=$tablica_datazlec[0];
  $m=$tablica_datazlec[1];
  $d=$tablica_datazlec[2];
  $smarty->assign('D', $d);
  $smarty->assign('M', $m);
  $smarty->assign('Y', $Y);


  $tablica_datazlec1 = explode(':', $_SESSION['form_tab']['zwrotzleceniagodz']);
  $godz=$tablica_datazlec1[0];
  $min=$tablica_datazlec1[1];
  $smarty->assign('godz', $godz);
  $smarty->assign('min', $min);
*/
}

 $smarty->display('addform_3.tpl');
  
}
else{
  header("Location: ./index.php");
}
?>
