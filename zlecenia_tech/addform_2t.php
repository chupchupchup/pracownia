<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){
unset($_SESSION['tabele_to_go']);
unset($_SESSION['form_tab']);
unset($_SESSION['punkty_all']);
unset($_SESSION['cena_all']);
unset($_SESSION['opis_all']);

$_SESSION['form_tab']=array();

 $smarty->display('addform_2t.tpl');
  
}
else{
  header("Location: ./index.php");
}
?>
