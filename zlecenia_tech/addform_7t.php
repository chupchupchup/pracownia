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

 //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 require_once('./inc/filtr_formularzy.inc.php');

 //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

 //$idzlecenianr = czysc_zmienne_formularza($_SESSION['form_tab']['idzlecenianr']);
 $idzlecenianr = czysc_zmienne_formularza($_REQUEST['zlecenienr']);
   //echo $idzlecenianr.' - id zlecenia NR<br>';
 //$idzleceniapoz = czysc_zmienne_formularza($_REQUEST['idzleceniapoz']);
 $idzleceniapoz = czysc_zmienne_formularza($_REQUEST['zleceniepoz']);
   //echo $idzleceniapoz.' - id zlecenia POZ<br>';
 $pacjent = czysc_zmienne_formularza($_SESSION['form_tab']['pacjent']);
 $datawpisania = czysc_zmienne_formularza($_REQUEST['datawpisania']);
 $zwrotzleceniadata = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzleceniadata']);
 $zwrotzleceniagodz = czysc_zmienne_formularza($_SESSION['form_tab']['zwrotzleceniagodz']);
 //$punkty = czysc_zmienne_formularza($_REQUEST['punkty']);
 $punkty = $_SESSION['punkty_all'];
 //$cena = czysc_zmienne_formularza($_REQUEST['cena']);
 $cena = $_SESSION['cena_all'];
 $wagazlota = czysc_zmienne_formularza($_REQUEST['wagazlota']);
 //$opiszlecenia = czysc_zmienne_formularza($_REQUEST['opiszlecenia']);
 $opiszlecenia = $_SESSION['opis_all'];
 $wartosc_zlota = czysc_zmienne_formularza($_REQUEST['wartosc_zlota']);

 //$tabela = $_SESSION['form_tab']['kategoria'];
 $tabela = $_REQUEST['kategoria'];
 
    $smarty->assign('idzlecenianr', $idzlecenianr);
    $smarty->assign('idzleceniapoz', $idzleceniapoz);
    $smarty->assign('pacjent', $pacjent);
    $smarty->assign('punkty', $punkty);
    $smarty->assign('zwrotzleceniadata', $zwrotzleceniadata);

    $cena_zlota=$wagazlota*$wartosc_zlota;

    //     echo 'punkty: '.$punkty.'<br>';
    $_SESSION['form_tab']['punkty']=$punkty;
    $smarty->assign('punkty', $_SESSION['form_tab']['punkty']);
    //      echo 'cena: '.$cena.'<br>';
    $cena=$cena+$cena_zlota;//razem z cen± z³ota
    $_SESSION['form_tab']['cena']=$cena;
    $smarty->assign('cena', $_SESSION['form_tab']['cena']);
    //      echo 'wagazlota: '.$wagazlota.'<br>';
    $smarty->assign('wagazlota', $wagazlota);
    //      echo 'opiszlecenia: '.$opiszlecenia.'<br>';
    $smarty->assign('opiszlecenia', $opiszlecenia);
    $smarty->assign('etykieta_materialu', $etykieta_materialu);


// ----------------------------------------------------------------------------------------------
// PUNKTY
/*
  //zapisac punkty do tabeli rozlicz_technicy,
  //wyszukiwanie czy zlecenie nie jest juz dopisane
  $s="SELECT * FROM rozlicz_technicy WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' AND technik='".$_SESSION['idusera']."' ";
  $w=myquery($s);
  $czyjuzzleceniewpisane = mysql_numrows($w);
  if($czyjuzzleceniewpisane==0){
     //echo ' INSERT <br />';
     $sq="INSERT INTO rozlicz_technicy (idzlecenianr,idzleceniapoz,technik,punkty,roz_tech) VALUES  ( '".$idzlecenianr."', '".$idzleceniapoz."', '".$_SESSION['idusera']."', '".$punkty."', 'tak' ) ";
     myquery($sq);

     $sql="UPDATE zlecenieinfo SET wpis='roz' WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' AND wpis!='del' ";
     myquery($sql);
  }
  else {
     //echo ' UPDATE <br />';
     $sq="UPDATE rozlicz_technicy SET punkty='".$punkty."', roz_tech='tak' WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' AND technik='".$_SESSION['idusera']."' ";
     myquery($sq);

     $sql="UPDATE zlecenieinfo SET wpis='roz' WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' AND wpis!='del' ";
     myquery($sql);
  }
*/
// KONIEC PUNKTÓW ----------------------------------------------------------------------------------------------

// ----------------------------------------------------------------------------------------------
// CENA
	  //wyszukiwanie zlecen dopisanych
	  $s1="SELECT * FROM rozlicz_zleceniodawca WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' ";
	  $w1=myquery($s1);
          $czyjuzzleceniewpisane = mysql_numrows($w1);

          //szukanie WZki
            $tablica_id_zlec = explode('/', $idzleceniapoz);
            //echo $tablica_id_zlec[1].' - tablica_id_zlec[1]<br>';
	    $sqll="SELECT wz_ost FROM zleceniodawca WHERE idzleceniodawcy='".$tablica_id_zlec[1]."' ";
	    $wynikk=myquery($sqll);
            $arrrr = mysql_fetch_assoc($wynikk);

            $tablica_wz_ost = explode('/', $arrrr['wz_ost']);   //echo $arrrr['wz_ost'].' - arrrr[wz_ost] <br>';

            if($tablica_wz_ost[2]==date('Y')){
              $pom=($tablica_wz_ost[0]+1);
              $stara_wz=$arrrr['wz_ost'];
            }
            elseif($tablica_wz_ost[2]<date('Y')){
              $pom=1;
              $tablica_wz_ost[2]=date('Y');
              $stara_wz='0/'.$tablica_wz_ost[1].'/'.$tablica_wz_ost[2];
            }

            $wz=$pom.'/'.$tablica_wz_ost[1].'/'.$tablica_wz_ost[2];//nastepny nr wzki
          //koniec ustawiania aktualnego nr WZki

 if($czyjuzzleceniewpisane==0){
//??? echo 'WZ: '.$wz.'<br>';
   $smarty->assign('wz', $wz);

         //echo 'INSERT';
         $sq="INSERT INTO rozlicz_zleceniodawca (idzlecenianr,idzleceniapoz,zwrotzlecenia,kwota,wzk,opiszlecenia,roz_lek) VALUES  ('".$idzlecenianr."', '".$idzleceniapoz."', '".$zwrotzleceniadata."', '".$cena."', '".$wz."', '".$opiszlecenia."', 'tak') ";
         myquery($sq);

         $sql="UPDATE zlecenieinfo SET wagazlota='".$wagazlota."', wpis='roz' WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' AND wpis!='del' ";
         myquery($sql);

         $tablica_id_zlec0 = explode('/', $idzleceniapoz);
         $sqll="UPDATE zleceniodawca SET wz_ost='".$wz."' WHERE idzleceniodawcy='".$tablica_id_zlec0[1]."' ";
     //echo $tablica_id_zlec0[1].' - tablica_id_zlec0[1] <br>';
         myquery($sqll);
      }
 else {
         //echo 'UPDATE_<br>';
//???            echo 'WZ: '.$stara_wz.'<br>';
  $smarty->assign('wz', $stara_wz);

             $sq="UPDATE rozlicz_zleceniodawca SET kwota='".$cena."', opiszlecenia='".$opiszlecenia."', roz_lek='tak' WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' ";
             myquery($sq);

             $sqll="UPDATE zlecenieinfo SET wagazlota='".$wagazlota."', wpis='roz' WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' AND wpis!='del' ";
             myquery($sqll);
}
// KONIEC CENA -----------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------





	  //usuniecie tablicy przechowyjacej info do jakich tablic w bazie by³y dodawane dane
 	  //unset($_SESSION['zakladka']);

    $smarty->assign('tablica_wynikow', $_SESSION['form_tab']);
    $smarty->display('addform_7t.tpl');
}
else{
  header("Location: ./index.php");
}
?>
