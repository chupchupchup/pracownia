<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){
unset($_SESSION['strona']);
unset($_SESSION['form_tab']);
//echo $_SESSION['form_tab']['cena'].'-cena<br>';
// include('./inc/smarty_path.inc.php');
// $smarty->assign('', $);

//------------------------------------------------------------------------------------------------------------------
//funkcja posredniczaca w zapytaniu SQL - zwraca kod bledu zapytania
    function myquery ($query) {
    include('./inc/db_connect.inc.php');
        $result = mysql_query($query);

        if (mysql_errno()){
            echo "MySQL error ".mysql_errno().": ".htmlspecialchars (mysql_error())."\n<br>When executing:<br>\n<b>$query\n</b><br>";
        }
    include('./inc/db_close.inc.php');
        //echo mysql_numrows($result).'<br>';
        return $result;
    }
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
																																						//'Technik'=>'150',
  $t_opis=array('Nr Zlecenia'=>'80','ID Zlecenia'=>'250','Data Wpisania'=>'120','Zwrot Data'=>'100','Zwrot Godz'=>'60', 'Pacjent'=>'100','Tabela'=>'300','Etap'=>'50');

	  //wyszukiwanie zlecen dopisanych
	  $sql="SELECT * FROM zlecenieinfo WHERE wpis='new' AND pracownikid='".$_SESSION['idusera']."' ORDER BY zwrotzleceniadata ASC";
	  $tablica_wynikow=pobierz_dane($sql);
	  //tablice dopisanych wierszy
	  $smarty->assign('tablica_wynikow', $tablica_wynikow);

  $smarty->assign('sub', 'tak');
  $smarty->assign('tablica_opisy', $t_opis);
  $smarty->assign('edycja', 'edycja');

  $smarty->assign('ID', 'wtrakcie');

  $smarty->assign('plik', 'tabela_wynik_zapytania_sql_tech_1st_page.tpl');

 $smarty->display('addform_2t.tpl');
  
}
else{
  header("Location: ./index.php");
}
?>
