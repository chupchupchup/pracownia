<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){

//------------------------------------------------------------------------------------------------------------------
//funkcja posredniczaca w zapytaniu SQL - zwraca kod bledu zapytania
    function myquery ($query) {
    include('./inc/db_connect.inc.php');
        $result = mysql_query($query);
    include('./inc/db_close.inc.php');

        if (mysql_errno()){
            echo "MySQL error ".mysql_errno().": ".htmlspecialchars (mysql_error())."\n<br>When executing:<br>\n<b>$query\n</b><br>";
        }
        return $result;
    }
//------------------------------------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------------------------------------
//funkacja wykonujaca zapytanie SQL i przepisujaca tablice wynikow do tablicy ktora zostaje przeslana do szablonu
function pobierz_dane ($sql) {

   $sql_result=myquery($sql);

   $tablica_wynikow_zapytania=array();
   while ($row = mysql_fetch_row($sql_result)) {
        $tablica_wynikow_zapytania[] = $row;
   }
  return $tablica_wynikow_zapytania;
}
//------------------------------------------------------------------------------------------------------------------
$limit=2;

if(!isset($_REQUEST['limitstart'])){
   $_REQUEST['limitstart']=0;
}
else{
   $_REQUEST['limitstart']=($_REQUEST['limitstart']-1)*$limit;
}
//------------------------------------------------------------------------------------------------------------------

 //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 require_once('./inc/filtr_formularzy.inc.php');
 //zmienna do czyszczenia
 $idlok = czysc_zmienne_formularza($_REQUEST['nridlokalnego']);
if($idlok==''){
  $idzlecenianr_warunek="LIKE '%' ";
}
else{
  $idzlecenianr_warunek="= '".$idlok."' ";
}

 //id zlecenia wczesniej ju¿ wykonywanego 
 $idpoz=$_SESSION['form_tab']['idzleceniapoz_tmp'].$_REQUEST['rok'];

 //$idzewnetrzne= czysc_zmienne_formularza($_REQUEST['idzewnetrzny']);
 $pacjent= czysc_zmienne_formularza($_REQUEST['pacjent']);

//wyszukanie pasujacych zlecen
 $sql="select * from zlecenieinfo 
                where idzlecenianr ".$idzlecenianr_warunek." AND idzleceniapoz LIKE '$idpoz%' AND pacjent LIKE '%$pacjent%' 
				AND wpis!='del' ORDER BY idzlecenianr"; // AND ( wpis='new' OR wpis='out' ) ";
//echo $sql.'<br>';
 $wynik=pobierz_dane($sql);

 $smarty->assign('visible', "tak" );
 $smarty->assign('liczbastron', 0 );
 $smarty->assign('tablica_wynikow', $wynik );
 $smarty->display('addform_2_3i.tpl');
}
else{
  header("Location: ./index.php");
}
?>
