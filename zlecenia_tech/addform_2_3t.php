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

 //id zlecenia wczesniej ju¿ wykonywanego 
 $idpoz=$_SESSION['form_tab']['idzleceniapoz_tmp'].$_REQUEST['rok'];

// $idzewnetrzne= czysc_zmienne_formularza($_REQUEST['idzewnetrzny']);
// $pacjent= czysc_zmienne_formularza($_REQUEST['pacjent']);

//wyszukanie pasujacych zlecen
// $sql="select DISTINCT z.*,rt.idzleceniapoz as rtpoz, rz.idzleceniapoz as rzpoz FROM zlecenieinfo z, rozlicz_technicy rt, rozlicz_zleceniodawca rz WHERE z.idzlecenianr LIKE '$idlok%' AND z.idzleceniapoz = '$idpoz' AND z.pacjent LIKE '%$pacjent%' AND z.idzewnetrzne LIKE '%$idzewnetrzne%' AND z.idzleceniapoz=rt.idzleceniapoz AND rt.idzleceniapoz=rz.idzleceniapoz AND z.idzleceniapoz=rz.idzleceniapoz AND z.idzlecenianr=rt.idzlecenianr AND rt.idzlecenianr=rz.idzlecenianr AND z.idzlecenianr=rz.idzlecenianr";
// $sql="select * FROM zlecenieinfo WHERE idzlecenianr LIKE '$idlok%' AND idzleceniapoz = '$idpoz' AND pacjent LIKE '%$pacjent%' AND idzewnetrzne LIKE '%$idzewnetrzne%' AND NOT IN (SELECT z.*,rt.idzleceniapoz as rtpoz, rz.idzleceniapoz as rzpoz FROM zlecenieinfo z, rozlicz_technicy rt, rozlicz_zleceniodawca rz WHERE z.idzleceniapoz=rt.idzleceniapoz AND rt.idzleceniapoz=rz.idzleceniapoz AND z.idzleceniapoz=rz.idzleceniapoz AND z.idzlecenianr=rt.idzlecenianr AND rt.idzlecenianr=rz.idzlecenianr AND z.idzlecenianr=rz.idzlecenianr)";

 $sql="select * FROM zlecenieinfo WHERE idzlecenianr = '$idlok' AND idzleceniapoz = '$idpoz' AND wpis!='del' ORDER BY idzlecenianr";
 //echo $sql.'<br>';
 $wynik=pobierz_dane($sql);
 
 //
 $wyn=myquery($sql);
    while($arr_ = mysql_fetch_assoc($wyn)){
      $_SESSION['tabele_to_go'][]=$arr_['kategoria']; 
	}
//	echo 'tabele - '; print_r($_SESSION['tabele_to_go']);
 //----------

 $smarty->assign('visible', "tak" );
 $smarty->assign('liczbastron', 0 );
 $smarty->assign('tablica_wynikow', $wynik );
 $smarty->display('addform_2_3t.tpl');
}
else{
  header("Location: ./index.php");
}
?>
