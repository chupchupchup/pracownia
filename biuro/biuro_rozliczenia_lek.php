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
        //echo mysql_numrows($result).'<br>';
        return $result;
    }
//------------------------------------------------------------------------------------------------------------------

          $sql="SELECT idzleceniodawcy FROM zleceniodawca";
	  $wy=myquery($sql);
          while( $ar = mysql_fetch_assoc($wy) ) {
            $zleceniodawca[]=$ar['idzleceniodawcy'];
          }
          $smarty->assign('zleceniodawca', $zleceniodawca);

  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'biuro_rozliczenia_lek.tpl');

  $smarty->assign('ID', 'rozlek');

  $smarty->assign('log', $_SESSION['idusera'] );
  $smarty->display('biuro_rozliczenia.tpl');

}
else{
  header("Location: index.php");
}
?>
