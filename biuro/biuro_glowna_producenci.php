<?
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){

require_once('./inc/common.php');
	
if($_REQUEST['wpis']=='producenci'){

  $smarty->assign('ID', 'producenci');

  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'producenci.tpl');
}
elseif($_REQUEST['wpis']=='dodaj_form'){

  $smarty->assign('ID', 'producenci');

  $nazwa = $_POST['nazwa'];

  $sql="SELECT id,nazwa FROM material_producenci WHERE nazwa='".$nazwa."' ORDER BY id";
  $wyn=myquery($sql);
  $spr= mysql_num_rows($wyn);
 
  if($spr>0){
    $tablica_wynikow=pobierz_dane($sql);
    $smarty->assign('tablica_wynikow', $tablica_wynikow);

    $t_opis=array('Nazwa'=>'200');
    $smarty->assign('tablica_opisy', $t_opis);

    $smarty->assign('lokalizacja', 'dodaj_producenta');
    $smarty->assign('komunikat', '&nbsp;<b>Istnieje producent o tej nazwie:</b><br />');
    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'producenci_wyszukaj.tpl');
  } else {
    $sql="INSERT INTO material_producenci (nazwa) 
						VALUES ('".$nazwa."') ";
  	
    include('./inc/db_connect.inc.php');
    $result = mysql_query($sql);

    if (mysql_errno()) {
	    echo "MySQL error ".mysql_errno().": ".htmlspecialchars (mysql_error())."\n<br>When executing:<br>\n<b>$query\n</b><br>";
    }

	header("Location: biuro.php?strona=glowna_producenci&wpis=edycja_producenta&id=".mysql_insert_id()."&komunikat=Producent zosta³ dodany.&amp");    
    
    include('./inc/db_close.inc.php');  
  }
}
elseif($_REQUEST['wpis']=='wyszukaj_form'){
  $smarty->assign('ID', 'producenci');

  $nazwa = $_POST['nazwa'];

  $sql="SELECT id, nazwa FROM material_producenci WHERE nazwa LIKE '%".$nazwa."%' ORDER BY id";
  $wyn=myquery($sql);
  $spr= mysql_num_rows($wyn);

  if($spr>0){
    $tablica_wynikow=pobierz_dane($sql);
    $smarty->assign('tablica_wynikow', $tablica_wynikow);

    $t_opis=array('Nazwa'=>'100');
    $smarty->assign('tablica_opisy', $t_opis);

    $smarty->assign('lokalizacja', 'wyszukaj_producenta');
    $smarty->assign('komunikat', '&nbsp;<b>Wyniki wyszukiwania:</b><br />');
    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'producenci_wyszukaj.tpl');
  }
  else{
    $smarty->assign('nazwa', $nazwa);

    $smarty->assign('komunikat', '&nbsp;<b>Brak wyników wyszukiwania:</b><br />');
    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'producenci.tpl');
  }

}
elseif($_REQUEST['wpis']=='edycja_producenta'){
  
  $smarty->assign('ID', 'producenci');

    $id = $_REQUEST['id']; 

  $sql="SELECT * FROM material_producenci WHERE id = '".$id."' ";
  $wyn=myquery($sql);
  $spr= mysql_num_rows($wyn);
  $arr = mysql_fetch_assoc($wyn);

  if($spr>0){
    $smarty->assign('id', $arr['id']);
    $smarty->assign('nazwa', $arr['nazwa']);

    $smarty->assign('komunikat', '&nbsp;<b>'.$_REQUEST['komunikat'].'</b><br />');
    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'producenci_edycja.tpl');
  }
  else{
    $smarty->assign('nazwa', $nazwa);

    $smarty->assign('komunikat', '&nbsp;<b>Nie mozna edytowaæ (sprawd¼ ponownie):</b><br />');
    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'producenci.tpl');
  }

}
elseif($_REQUEST['wpis']=='aktualizuj_form'){

  $smarty->assign('ID', 'producenci');

  $id = $_POST['id'];
  $nazwa = $_POST['nazwa'];

  $sql="UPDATE material_producenci SET nazwa='".$nazwa."' WHERE id='".$id."' ";
    $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna_producenci&wpis=edycja_producenta&id=".$id."&komunikat=Dane producenta zostaly zaktualizowane.&amp");
}

else{
//------------------------------------------------------------------------------------------------------------------
	  //wyszukiwanie zlecen dopisanych
	  $sql="SELECT count(*) as count FROM zlecenieinfo WHERE wpis='new' ";
          $sql_result=myquery($sql);
          $arr = mysql_fetch_assoc($sql_result);
	  $smarty->assign('liczba_nowych', $arr['count']);
//------------------------------------------------------------------------------------------------------------------

  $smarty->assign('sub', 'tak');
  $smarty->assign('log', $_SESSION['idusera'] );
  $smarty->assign('plik', 'glowna.tpl');
}


$smarty->display('biuro_glowna.tpl');
}
else{
  header("Location: index.php");
}
?>
