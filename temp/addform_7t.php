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

//------------------------------------------------------------------------------------------------------------------
//funkacja wykonujaca zapytanie SQL i przepisujaca tablice wynikow do tablicy ktora zostaje przeslana do szablonu
function pobierz_dane ($sql) {

   $sql_result=myquery($sql);

   $f=array();
   while ($row = mysql_fetch_row($sql_result)) {
        $f[] = $row;
   }
   echo '<br />';
  return $f;
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

 //zmienne do czyszczenia
 $idzlecenianr = czysc_zmienne_formularza($_SESSION['form_tab']['idzlecenianr']);
 $idzleceniapoz = czysc_zmienne_formularza($_SESSION['form_tab']['idzleceniapoz']);

 for ($i = 0; $i < sizeof($_SESSION['zakladka']); $i++){
	  //wyszukiwanie zlecen dopisanych
	  $sql="SELECT * FROM ".$_SESSION['zakladka'][$i]." WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."'";
	  $tablica_wynikow=pobierz_dane($sql);
	  //tablice dopisanych wierszy
	  $t[]=$tablica_wynikow;
 } 
 
	  $smarty->assign('tablica_wynikow', $t);
	  $smarty->display('addform_7i.tpl');

	  //usuniecie tablicy przechowyjacej info do jakich tablic w bazie by�y dodawane dane
 	  unset($_SESSION['zakladka']);

}
else{
  header("Location: ./index.php");
}
?>
