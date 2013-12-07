<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){

  //przeczyszczenie tablicy $_SESSION['form_tab']
  include('./inc/czysc_tablice_form_tab.inc.php');
  czysc_tablice_form_tab();

/*
  if( isset($_REQUEST['dataD']) && isset($_REQUEST['dataM']) && isset($_REQUEST['dataY']) && isset($_REQUEST['godzG']) && isset($_REQUEST['godzM']) ){
  //********session
    $dataoddaniazlecenia=$_REQUEST['dataY'].'-'.$_REQUEST['dataM'].'-'.$_REQUEST['dataD'];
 //echo $dataoddaniazlecenia.'<br>';
    $godzoddaniazlecenia=$_REQUEST['godzG'].':'.$_REQUEST['godzM'];
    $_SESSION['form_tab']['zwrotzleceniadata']=$dataoddaniazlecenia;
    $_SESSION['form_tab']['zwrotzleceniagodz']=$godzoddaniazlecenia;
  //****************
  }
*/
    if( isset($_REQUEST['zlecenie']) ){
      $_SESSION['form_tab']['zlecenie']=$_REQUEST['zlecenie'];
    }
    //  echo $_SESSION['form_tab']['zlecenie'].'<br>';

  if($_REQUEST['rodzaj']=='porcelana'){
    //$smarty->assign('rodzaj', $_REQUEST['rodzaj']);
    $smarty->display('addform_4_porcelana_1.tpl');
  }
  elseif( isset($_REQUEST['porcelana']) ){//zrobic case`a i przekazywac zapamietane zmienne
    //$smarty->assign('rodzaj', 'wywolana strona');
    $smarty->display('addform_4_porcelana_'.$_REQUEST['porcelana'].'.tpl');
  }
  elseif($_REQUEST['rodzaj']=='proteza'){
    //$smarty->assign('rodzaj', $_REQUEST['rodzaj']);
    $smarty->display('addform_4_proteza_1.tpl');
  }
  elseif( isset($_REQUEST['proteza']) ){
    //$smarty->assign('rodzaj', 'wywolana strona');
    $smarty->display('addform_4_proteza_'.$_REQUEST['proteza'].'.tpl');
  }
  elseif($_REQUEST['rodzaj']=='niesklasyfikowane'){
    //$smarty->assign('rodzaj', $_REQUEST['rodzaj']);
    $smarty->display('addform_4_niesklasyfikowane_1.tpl');
  }
  elseif( isset($_REQUEST['niesklasyfikowane']) ){
    //$smarty->assign('rodzaj', 'wywolana strona');
    $smarty->display('addform_4_niesklasyfikowane_'.$_REQUEST['niesklasyfikowane'].'.tpl');
  }

}
else{
  header("Location: ./index.php");
}
?>
