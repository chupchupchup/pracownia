<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){
$_SESSION['form_tab']=array();

 $smarty->display('addform_2.tpl');
  
}
else{
  header("Location: ./index.php");
}
?>