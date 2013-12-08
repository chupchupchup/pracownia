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

//----------- D A T Y -----------------
          $dzien=array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');
          $smarty->assign('dzien', $dzien);

          $miesiac=array('01','02','03','04','05','06','07','08','09','10','11','12');
          $smarty->assign('miesiac', $miesiac);

          $M=date('m');//aktualny miesiac
          if($M<10){$M='0'.$M;}
          $smarty->assign('M', $M);

          $Y=date('Y');//aktualny rok
          $smarty->assign('Y', $Y);

          for($i=2008;$i<=$Y+1;$i++){
             $rok[]=$i;
          }
          $smarty->assign('rok', $rok);

//----------- S T A T U S -----------------
          $status=array('dowolny', 'niezap³acona', 'zap³acona','anulowana');
          $smarty->assign('status', $status);

//----------- K L I E N C I -----------------
/*
      $sql_pom="SELECT distinct z.idzleceniodawcy, f.kontrahent_nazwa FROM zleceniodawca z,faktury f WHERE z.nazwa=f.kontrahent_nazwa ";
	  $wy_pom=myquery($sql_pom);
echo mysql_num_rows($wy_pom).'<br />';

          while( $ar_pom = mysql_fetch_assoc($wy_pom) ) {
            echo myquery("UPDATE faktury SET idzleceniodawcy = '".$ar_pom['idzleceniodawcy']."' WHERE kontrahent_nazwa='".$ar_pom['kontrahent_nazwa']."' ").'<br />';;
          }
*/
/*
      $sql_pom="SELECT distinct z.idzleceniodawcy, f.kontrahent_adres FROM zleceniodawca z,faktury f WHERE z.adres=f.kontrahent_adres ";
	  $wy_pom=myquery($sql_pom);
echo mysql_num_rows($wy_pom).'<br />';

          while( $ar_pom = mysql_fetch_assoc($wy_pom) ) {
            echo myquery("UPDATE faktury SET idzleceniodawcy = '".$ar_pom['idzleceniodawcy']."' WHERE kontrahent_adres='".$ar_pom['kontrahent_adres']."' AND idzleceniodawcy='' ").'<br />';;
          }
*/
/*
      $sql_pom="SELECT distinct z.idzleceniodawcy, f.kontrahent_nip FROM zleceniodawca z,faktury f WHERE z.nip=f.kontrahent_nip ";
	  $wy_pom=myquery($sql_pom);
echo mysql_num_rows($wy_pom).'<br />';

          while( $ar_pom = mysql_fetch_assoc($wy_pom) ) {
            echo myquery("UPDATE faktury SET idzleceniodawcy = '".$ar_pom['idzleceniodawcy']."' WHERE kontrahent_nip='".$ar_pom['kontrahent_nip']."' AND idzleceniodawcy='' ").'<br />';;
          }
*/


    $sql="SELECT DISTINCT idzleceniodawcy FROM faktury ORDER BY idzleceniodawcy";

	  $wy=myquery($sql);
          //zrobic z tego normalna tablice
          $tablica_klientow[]='dowolny'; //jezeli tablica_klientow nie jest ustawiona lub ma bya to opcja pusta
          while( $ar = mysql_fetch_assoc($wy) ) {
            $tablica_klientow[]=$ar['idzleceniodawcy'];
          }

    $smarty->assign('tablica_klientow', $tablica_klientow);

//----------------------------------------------------

  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'faktury_main.tpl');

  $smarty->assign('ID', 'faktury');

  $smarty->assign('log', $_SESSION['idusera'] );
  $smarty->display('biuro_rozliczenia.tpl');

}
else{
  header("Location: index.php");
}
?>
