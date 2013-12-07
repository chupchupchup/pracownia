<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){

  	 $_SESSION['form_tab']['pacjent']=$_REQUEST['pacjent'];
  	 $_SESSION['form_tab']['technik']=$_REQUEST['technik'];
    $_SESSION['form_tab']['idzewnetrzny']=$_REQUEST['id'];

  if( isset($_REQUEST['dataD']) && isset($_REQUEST['dataM']) && isset($_REQUEST['dataY']) && isset($_REQUEST['godzG']) && isset($_REQUEST['godzM']) ){
  //********session
    $dataoddaniazlecenia=$_REQUEST['dataY'].'-'.$_REQUEST['dataM'].'-'.$_REQUEST['dataD'];
 //echo $dataoddaniazlecenia.'<br>';
    $godzoddaniazlecenia=$_REQUEST['godzG'].':'.$_REQUEST['godzM'];
    $_SESSION['form_tab']['zwrotzleceniadata']=$dataoddaniazlecenia;
    $_SESSION['form_tab']['zwrotzleceniagodz']=$godzoddaniazlecenia;
  //****************
  }


    $zakladka = explode('_', $_SESSION['form_tab']['zakladka']);
	 //echo '<br>zakladka0: '.$zakladka[0].', zakladka1: '.$zakladka[1].'<br>';
    $smarty->assign('cofnij0', $zakladka[0]);
    $smarty->assign('cofnij1', $zakladka[1]);

    $smarty->assign('tablica_wynikow', $_SESSION['form_tab']);
    $smarty->display('addform_5.tpl');

}
else{
  header("Location: ./index.php");
}
?>
