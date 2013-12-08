<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){

  $smarty->assign('technicy', '');
  $smarty->assign('lekarze', '');

  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'biuro_rozliczenia_poz.tpl');

  $smarty->assign('ID', 'pozostale');

  $smarty->assign('log', $_SESSION['idusera'] );
  $smarty->display('biuro_rozliczenia.tpl');

}
else{
  header("Location: index.php");
}
?>
