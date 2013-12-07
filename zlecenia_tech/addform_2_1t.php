<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){

unset($_SESSION['tabele_to_go']);
//unset($_SESSION['form_tab']);
unset($_SESSION['punkty_all']);
unset($_SESSION['cena_all']);
unset($_SESSION['opis_all']);

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
 $litera = czysc_zmienne_formularza($_REQUEST['litera']);
 //echo $litera.' - litera<br>';

//wyszukanie pasujacych zleceniodawcow
 $sql="select idzleceniodawcy,nazwa,adres from zleceniodawca where idzleceniodawcy LIKE '$litera%' ";//OR  nazwa LIKE '$litera%'
 $wynik=pobierz_dane($sql);

 $smarty->assign('visible', "tak" );
 $smarty->assign('liczbastron', 1 );
 $smarty->assign('litera', $litera );
 $smarty->assign('tablica_wynikow', $wynik );
 $smarty->display('addform_2_1t.tpl');
}
else{
  header("Location: ./index.php");
}
?>
